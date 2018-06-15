@extends('admin.layouts.app')

@section('title')
    View Course
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
                    <span>View Course</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> View Course</h3>
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
                            <span class="caption-subject bold uppercase"> View Course</span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="list-unstyled profile-nav">
                                    <li>
                                        <img class="full_width" src="{{ asset('admin/files/images/courses/') }}/{{ $course->image }}">
                                    </li>
                                </ul>
                            </div><!-- /.col-md-3 -->

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12 profile-info">
                                        <h1 class="font-orange sbold uppercase">{{ $course->title}}</h1>

                                        <p>
                                            <strong>Description: </strong> <br>
                                            {!! nl2br($course->description) !!}
                                        </p>

                                        <p>
                                            <strong>Created at: </strong>
                                            {{ $course->created_at->format('d M Y') }}
                                        </p>


                                    </div><!-- /.col-md-8-->
                                </div><!-- /.row -->
                            </div><!-- /.col-md-9 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="control-item">
                        <a href="{{ url('admin/courses') }}" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Back</a>
                        <a href="{{ url('admin/courses/'.$course->id.'/edit') }}" class="btn btn-info"><i class="fa fa-refresh"></i> Edit</a>
                        @if($course->active == 1)
                            <a href="{{ url('admin/courses/'.$course->id.'/inactive') }}" class="confirm_inactive btn btn-danger"><i class="fa fa-close"></i> Inactivation</a>
                        @else
                            <a href="{{ url('admin/courses/'.$course->id.'/active') }}" class="confirm_active btn btn-success"><i class="fa fa-check"></i> Activation</a>
                        @endif
                    </div><!-- /.item -->
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@stop