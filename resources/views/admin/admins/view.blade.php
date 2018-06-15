@extends('admin.layouts.app')

@section('title')
    {{ $about->title }}
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
                    <span>{{ $about->title }}</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> {{ $about->title }}</h3>
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
                            <span class="caption-subject bold uppercase"> {{ $about->title }}</span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body">
                        <div class="item">
                            <h4>
                                <strong>Title: </strong><br>
                            </h4>

                            <p>{{ $about->title }}</p>
                        </div><!-- /.item -->

                        <div class="item">
                            <h4>
                                <strong>Content: </strong><br>
                            </h4>

                            <p>
                                {!! nl2br($about->content) !!}
                            </p>
                        </div><!-- /.item -->

                        <div class="item">
                            <h4>
                                <strong>Image: </strong><br>
                            </h4>

                            <img src="{{ asset('admin') }}/images/about/{{ $about->image }}">
                        </div><!-- /.item -->

                        <div class="item">
                            <h4>
                                <strong>Created at: </strong><br>
                            </h4>

                            <p>{{ $about->created_at->format('d M Y') }}</p>
                        </div><!-- /.item -->
                    </div>

                    <div class="control-item">
                        <a href="{{ url('admin/about') }}" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Back</a>
                        <a href="{{ url('admin/about/'.$about->id.'/edit') }}" class="btn btn-info"><i class="fa fa-refresh"></i> Edit</a>
                        <a href="{{ url('admin/about/'.$about->id.'/delete') }}" class="confirm btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    </div><!-- /.item -->
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@stop