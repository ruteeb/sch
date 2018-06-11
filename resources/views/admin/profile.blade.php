@extends('admin.layouts.app')

@section('title')
    Profile
@stop

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url('admin/home') }}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>

                <li>
                    <a href="{{ url('admin/profile') }}">Profile</a>
                    <i class="fa fa-circle"></i>
                </li>

                <li>
                    <span>Edit Profile</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Edit Profile</h3>
        <!-- END PAGE TITLE-->

        <div class="row">
            <div class="col-md-12">

                <div>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{Session::get('success')}}
                        </div>
                    @endif

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Edit Profile</span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body form">
                        <form role="form" method="post" action="{{ url('admin/profile/update') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label for="username">Username:</label>
                                            <input type="text" class="form-control" id="username" name="username" value="{{ auth()->guard('admin')->user()->username }}" placeholder="Username">
                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email">E-mail:</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->guard('admin')->user()->email }}" placeholder="E-mail">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label for="phone">Phone:</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->guard('admin')->user()->phone }}" placeholder="Phone">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->


                                </div><!-- /.row -->
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn blue">Submit</button>
                                <a href="{{ url('admin/introtext') }}" class="btn default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@stop