@extends('Layout.main')
@section('content')
<!-- Main content -->
<div class="col-xs-12">
    <div class="panel">
        <header class="panel-heading">
            Management Hotel

        </header>
        <!-- <div class="box-header"> -->
            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

        <!-- </div> -->
        <div class="panel-body table-responsive">


            <div class="box-tools m-b-15">

                <div class="input-group">
                    <button type="button" class="btn btn-danger input-sm pull-left" ><a style='color: white;' href="/admin/hotel/create">Create a Hotel</a></button>
                    <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Address</th>
                    <th>Location</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Action</th>
                </tr>
                @if($hotels->count() > 0)
                    @foreach($hotels as $hotel)
                    <tr>
                        <td>{{$hotel['id']}}</td>
                        <td>{{$hotel['name']}}</td>
                        <td>{{number_format($hotel['price'])}}</td>
                        <td>{{$hotel['address']}}</td>
                        <td>{{$hotel['ward']['name']}},{{$hotel['district']['name']}},{{$hotel['city']['desc']}}</td>
                        <td>{{$hotel['stock']}}</td>
                        <td>
                             @if($hotel['status'] === 1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">DeActive</span>
                            @endif
                        </td>
                        <td>{{$hotel['created_at']}}</td>
                        <td>{{$hotel['updated_at']}}</td>
                        <td>
                            <div class="pull-center hidden-phone">
                              <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                              <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </table>
            <section class="panel">
                <div class="text-center">
                    <ul class="pagination">
                        <li> {!! $hotels->render() !!}</li>
                    </ul>
                </div>
            </section>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
@endsection