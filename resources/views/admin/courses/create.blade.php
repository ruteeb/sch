@extends('admin.layouts.app')

@section('title')
    Add Course
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
                    <a href="{{ url('admin/courses') }}">Courses</a>
                    <i class="fa fa-circle"></i>
                </li>

                <li>
                    <a href="{{ url('admin/courses/create') }}">Add Course</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Course </h3>
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

                        @if(Session::has('warning'))
                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{Session::get('warning')}}
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
                            <span class="caption-subject bold uppercase"> Add Course</span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body form">
                        <form role="form" method="post" action="{{ url('admin/courses/store') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
                                            <label for="course">Course</label>
                                            <input type="text" class="form-control" value="{{ old('course') }}" name="course" id="course" placeholder="Course">
                                            @if ($errors->has('course'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('course') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" value="{{ old('image') }}" name="image" id="image" placeholder="Image">
                                            @if ($errors->has('image'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" placeholder="Description">{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-12 -->


                                </div><!-- /.row -->
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn blue">Submit</button>
                                <a href="{{ url('admin/courses') }}" class="btn default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@stop