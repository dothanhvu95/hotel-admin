<?php
  
namespace App\Http\Middleware;
  
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()){
            return $next($request);
        }
   
        $request->session()->flash('success',"You don't have admin access.");
        return redirect('login');

    }
}