@extends('Layout.main')
@section('content')
<!-- Main content -->
<div class="col-xs-12">
    <div class="panel">
        <header class="panel-heading">
            Management User

        </header>
        <!-- <div class="box-header"> -->
            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

        <!-- </div> -->
        <div class="panel-body table-responsive">
            <div class="box-tools m-b-15">
                <form method="GET" action="/admin/user">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search mail or phone"/>
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
                    <th>Nick Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Created_at</th>
                </tr>
                @if(count($users )>0)
                @foreach($users as $user)
                <tr>
                    <td>{{$user['id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['nickname']}}</td>
                    <td>
                        @if($user['gender'] === 1)
                            Male
                        @else
                            Female
                        @endif

                    </td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['birthday']}}</td>
                    <td>{{$user['phone']}}</td>
                    <td>
                        @if($user['status'] === 1)
                        <span class="label label-success">Active</span>
                        @else
                        <span class="label label-danger">InActive</span>
                        @endif
                    </td>
                    <td>{{$user['created_at']}}</td>
                </tr>
                @endforeach
                @endif
                
                                        
            </table>
            <section class="panel">
                <div class="text-center">
                    <ul class="pagination">
                        <li> {!! $users->render() !!}</li>
                    </ul>
                </div>
            </section>                        
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
@endsection