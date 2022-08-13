@extends('Layout.main')
@section('dashboard')
<!-- Main content -->
<section class="content">
    <div class="row" style="margin-bottom:5px;">
        <div class="col-md-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                <div class="sm-st-info">
                    <span>
                        {{$totalUser}}
                    </span>
                    Total Users
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                <div class="sm-st-info">
                    <span>{{$totalHotel}}</span>
                    Total Hotels
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-blue"><i class="fa fa-paperclip "></i></span>
                <div class="sm-st-info">
                    <span>{{$totalBooking}}</span>
                    Total Booking
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-green"><i class="fa fa-dollar"></i></span>
                <div class="sm-st-info">
                    <span>{{number_format($turnover)}}</span>
                    Total Turnover
                </div>
            </div>
        </div>
    </div>
</section>
@endsection