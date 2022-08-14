@extends('Layout.main')
@section('content')
<!-- Main content -->
<div class="col-xs-12">
    <div class="panel">
        <header class="panel-heading">
            Management Booking

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
                <form method="GET" action="/admin/booking">
                    <div class="input-group">
                    
                        <input type="text" name="keyword" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search booking code"/>
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                
            </div>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Hotel</th>
                    <th>Payment</th>
                    <th>Code</th>
                    <th>Total Price</th>
                    <th>Guest</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
                @if(count($bookings) > 0)
                @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking['id']}}</td>
                    <td>{{$booking['user']['name']}}</td>
                    <td>{{$booking['hotel']['name']}}</td>
                    <td>{{$booking['payment']['name']}}</td>
                    <td>{{$booking['booking_code']}}</td>
                    <td>{{number_format($booking['money_total'])}}</td>
                    <td>{{$booking['guest']}}</td>
                    <td>{{$booking['check_in']}}</td>
                    <td>{{$booking['check_out']}}</td>
                    <td>
                        @if($booking['status'] ==1)
                            <span class="label label-success">On going</span></td>
                        @elseif($booking['status'] ==2)
                            <span class="label label-primary">Completed</span></td>
                        @else
                            <span class="label label-danger">Cancelled</span></td>
                        @endif
                    <td>{{$booking['created_at']}}</td>
                    <td>
                        <div class="pull-center hidden-phone">
                            <a data-toggle="modal" href="#myModalComplete" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Completed" id='click_completed' ><i class="fa fa-check"></i></a>

                            <a data-toggle='modal' href="#myModalCancel" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Cancelled" id='click_cancelled' ><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="myModalComplete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Completed booking</h4>
                            </div>
                            <div class="modal-body">

                                Are you sure complete booking???

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                <a href="/admin/booking/change/{{$booking['id']}}?status=completed" class="btn btn-success" >Completed</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModalCancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Cancelled booking</h4>
                            </div>
                            <div class="modal-body">

                                Are you sure Cancelled booking???

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                <a  href="/admin/booking/change/{{$booking['id']}}?status=cancelled" class="btn btn-danger" >Cancelled</a>
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
                        <li> {!! $bookings->render() !!}</li>
                    </ul>
                </div>
            </section>


        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        
    });
</script>
@endsection