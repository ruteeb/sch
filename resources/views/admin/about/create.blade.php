@extends('admin.layouts.app')

@section('title')
    Add Data About
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
                    <a href="{{ url('admin/about') }}">About</a>
                    <i class="fa fa-circle"></i>
                </li>

                <li>
                    <a href="{{ url('admin/about/create') }}">Add Data About</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Data About </h3>
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
                            <span class="caption-subject bold uppercase"> Add Data About</span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body form">
                        <form role="form" method="post" action="{{ url('admin/about/store') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                                            <label for="language">Choose Language</label>
                                            <select class="form-control" id="language" name="language">
                                                <option value="">Choose Language</option>

                                                @foreach($languages as $language)
                                                    <option {{ old('language') == $language->language ? 'selected' : '' }} value="{{ $language->id }}">
                                                        {{ $language->language }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('language'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('language') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-12 -->


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="title" placeholder="Title">
                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" name="image" id="image" placeholder="Choose Image">
                                            @if ($errors->has('image'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                            <label for="content">Content</label>
                                            <textarea class="form-control" id="content" name="content" placeholder="Content">{{ old('content') }}</textarea>
                                            @if ($errors->has('content'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('content') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn blue">Submit</button>
                                <a href="{{ url('admin/about') }}" class="btn default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@stop