<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotReadableException;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * @param $source
     * @param $targetPath
     * @param $filenamePrefix
     * @param array $sizes
     * @return array
     */
    function upload_images($source, $targetPath, $filenamePrefix, $sizes = [])
    {
        if (!($source instanceof UploadedFile) || filter_var($source, FILTER_VALIDATE_URL)) {
            return false;
        }

        $targetPath = rtrim($targetPath, '/');
        $filenamePrefix = Str::slug(ltrim($filenamePrefix, '/'));
        $extension = '';
        $disk = Storage::disk(env('FILESYSTEM_CLOUD', 's3'));

        try {
            if ($source->getMimeType() === 'image/svg+xml') {
                $filepath = "{$targetPath}/{$filenamePrefix}.svg";
                $disk->put($filepath, file_get_contents($source), 'public');
                $result['original'] = $disk->url($filepath);
                return $result + [
                        'small' => $result['original'],
                        'medium' => $result['original'],
                        'large' => $result['original'],
                        'fhd' => $result['original'],
                    ];
            }
            $image = Image::make($source);
        } catch (NotReadableException $ex) {
            throw $ex;
        }
        $result = [];

        if (!$image->mime()) {
            $image->setFileInfoFromPath($source);
        }

        switch ($image->mime()) {
            case 'image/png':
                $extension = 'png';

                break;
            case 'image/gif':
                $extension = 'gif';

                break;
            case 'image/tif':
                $extension = 'tif';

                break;
            case 'image/bmp':
                $extension = 'bmp';

                break;
            case 'image/jpeg':
            default:
                $extension = 'jpg';

                break;
        }

        // Store raw image
        $filepath = "{$targetPath}/{$filenamePrefix}.{$extension}";
        $disk->put($filepath, file_get_contents($source), 'public');
        $result['raw'] = $disk->url($filepath);

        $image->orientate();

        // Store orientated original image
        $filepath = "{$targetPath}/{$filenamePrefix}_o.{$extension}";
        $disk->put($filepath, (string)$image->encode($extension), 'public');
        $result['original'] = $disk->url($filepath);

        if (!empty($sizes)) {
            foreach ($sizes as $key => $size) {
                $hasResized = $this->resize_image($image, $size['width'], $size['height']);

                if (!$hasResized) {
                    $result[$key] = null;

                    continue;
                }

                $filepath = "{$targetPath}/{$filenamePrefix}_{$size['suffix']}_{$size['width']}x{$size['height']}.{$extension}";
                $disk->put(
                    $filepath,
                    (string)$image->encode($extension, 'jpg' !== $extension ? 95 : null),
                    'public'
                );
                $result[$key] = $disk->url($filepath);
            }
        }

        return $result;
    }


    /**
     * Resize images.
     *
     * @param Image $image
     * @param int $targetWidth
     * @param int $targetHeight
     *
     * @return bool
     */
    function resize_image(&$image, $targetWidth, $targetHeight)
    {
        $targetImageRatio = $image->width() / $image->height();
        $imageRatio = $image->width() / $image->height();
        $resizeWidth = null;
        $resizeHeight = null;

        if ($targetImageRatio > $imageRatio) {
            if ($targetWidth > $image->width()) {
                return false;
            }

            $resizeWidth = $targetWidth;
        } else {
            if ($targetHeight > $image->height()) {
                return false;
            }

            $resizeHeight = $targetHeight;
        }

        $image->resize($resizeWidth, $resizeHeight, function ($constraint) {
            $constraint->aspectRatio();
        });

        return true;
    }

}
