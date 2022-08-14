@extends('Layout.main')
@section('content')
<!-- Main content -->
<div class="col-xs-12">
    <div class="panel">
        <header class="panel-heading">
            Management Hotel
            <div class="panel-footer bg-white">
                
                <button type="button" class="btn btn-primary btn-addon btn-sm " > <i class="fa fa-plus"></i><a style='color: white;' href="/admin/hotel/create"> Create a Hotel</a></button>
            </div>
        </header>

        <!-- <div class="box-header"> -->
            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

        <!-- </div> -->
        <div class="panel-body table-responsive">
            @if(session('success'))
            <div class="alert alert-success ">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="fa fa-times"></i>
                  </button>
                  <strong>Well done!</strong> {{session('success')}}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger ">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="fa fa-times"></i>
                  </button>
                  <strong>Warning!</strong> {{session('error')}}
            </div>
            @endif

            <div class="box-tools m-b-15">
                <form method="GET" action="/admin/hotel" >
                    <div class="input-group">
                       
                        <input type="text" name="keyword" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search name hotel"/>
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                        
                    </div>
                </form>
                    
                
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
                            <a data-toggle='modal' href="#myModalActive" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Active" id='click_cancelled' ><i class="fa fa-check"></i></a>
                              <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                              <a data-toggle='modal' href="#myModalDeactive" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Deactive" id='click_cancelled' ><i class="fa fa-times"></i></a>
                          </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="myModalActive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Active Hotel - {{$hotel['name']}}</h4>
                                </div>
                                <div class="modal-body">

                                    Are you sure Active Hotel??? 

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <a  href="/admin/hotel/change/{{$hotel['id']}}?status=active" class="btn btn-success" >Active</a>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="modal fade" id="myModalDeactive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Deactive Hotel - {{$hotel['name']}}</h4>
                                </div>
                                <div class="modal-body">

                                    Are you sure Deactive Hotel??? 

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <a  href="/admin/hotel/change/{{$hotel['id']}}?status=deactive" class="btn btn-danger" >Deactive</a>
                                </div>
                            </div>
                        </div>
                    </div>  
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