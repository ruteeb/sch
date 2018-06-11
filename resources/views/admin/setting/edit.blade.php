@extends('admin.layouts.app')

@section('title')
    Edit Setting
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
                    <a href="{{ url('admin/setting') }}">Setting</a>
                    <i class="fa fa-circle"></i>
                </li>

                <li>
                    <span>Edit Setting</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Edit Setting</h3>
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
                            <span class="caption-subject bold uppercase"> Edit Setting</span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body form">
                        <form role="form" method="post" action="{{ url('admin/setting/update') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('site_name') ? ' has-error' : '' }}">
                                            <label for="site_name">Site Name:</label>
                                            <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $setting->site_name }}" placeholder="Site Name">
                                            @if ($errors->has('site_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('site_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label for="phone">Phone:</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $setting->phone }}" placeholder="Phone">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->


                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email">E-mail:</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $setting->email }}" placeholder="E-mail">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-12 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                            <label for="logo">Logo:</label>
                                            <div>
                                                <img style="width: 150px; margin-bottom: 10px;" src="{{ asset('admin/files/images/setting/').'/'.$setting->logo }}" alt="Oranje Ster Logo">
                                            </div>
                                            <input type="file" class="form-control" id="logo" name="logo">
                                            @if ($errors->has('logo'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('logo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('favicon') ? ' has-error' : '' }}">
                                            <label for="logo">Favicon:</label>
                                            <div>
                                                <img style="height: 49px; margin-bottom: 10px;" src="{{ asset('admin/files/images/setting/').'/'.$setting->favicon }}" alt="Oranje Ster Favicon">
                                            </div>
                                            <input type="file" class="form-control" id="favicon" name="favicon">
                                            @if ($errors->has('favicon'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('favicon') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->


                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label for="address">Address:</label>
                                            <textarea class="form-control" id="address" name="address" placeholder="Address">{{ $setting->address }}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-12 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                                            <label for="keywords">Keywords:</label>
                                            <textarea class="form-control" id="keywords" name="keywords" placeholder="Keywords">{{ $setting->keywords }}</textarea>
                                            @if ($errors->has('keywords'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('keywords') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label for="description">Description:</label>
                                            <textarea class="form-control" id="description" name="description" placeholder="Description">{{ $setting->description }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
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