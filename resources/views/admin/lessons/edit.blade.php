@extends('admin.layouts.app')

@section('title')
    Edit Lesson
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
                    <a href="{{ url('admin/lessons') }}">Lessons</a>
                    <i class="fa fa-circle"></i>
                </li>

                <li>
                    <a href="{{ url('admin/lessons/create') }}">Edit Lesson</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Edit Lesson </h3>
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
                            <span class="caption-subject bold uppercase"> Edit Lesson</span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body form">
                        <form role="form" method="post" action="{{ url('admin/lessons/'.$lesson->id.'/update') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">


                                    <div style="margin-bottom: 15px;" class="col-md-12 select_multi">
                                        <div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}">
                                            <label for="class">Choose Class</label>
                                            <select class="bs-select form-control" name="class" data-live-search="true" data-size="8" id="class" >
                                                <option selected disabled="disabled" value="">Choose Class</option>

                                                @foreach($classes as $class)
                                                    <option {{ $lesson->class_id == $class->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->title }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('class'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('class') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-12 -->


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" value="{{ $lesson->title }}" name="title" id="title" placeholder="Title">
                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
                                            <label for="video">Video Lesson</label>
                                            <input type="file" class="form-control" value="{{ old('video') }}" name="video" id="video" placeholder="Video Lesson">
                                            @if ($errors->has('video'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('video') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                            <label for="content">Content</label>
                                            <textarea class="form-control" name="content" id="content" placeholder="Content">{{ $lesson->content }}</textarea>
                                            @if ($errors->has('content'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('content') }}</strong>
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