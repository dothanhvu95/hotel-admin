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
            <div class="box-tools m-b-15">
                <div class="input-group">
                    <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
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
                        <li> {!! $bookings->render() !!}</li>
                    </ul>
                </div>
            </section>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
@endsection