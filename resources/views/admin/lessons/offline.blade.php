@extends('admin.layouts.app')

@section('title')
    Lessons
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
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Lessons </h3>
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
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Lessons </span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ url('admin/lessons/create') }}" id="sample_editable_1_new" class="btn sbold green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </a>

                                        <a href="{{ url('admin/lessons') }}" style="margin-left: 15px;" id="sample_editable_1_new" class="btn sbold btn-warning"> View Lessons Online
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div><!-- /.btn-group -->
                                </div><!-- /.col-md-6 -->

                                <div class="col-md-6">
                                    <div class="btn-group pull-right">

                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.table-toolbar -->

                        <form action="{{ url('admin/admins/multidelete') }}" method="post">
                            {{ csrf_field() }}

                            <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th> Title </th>
                                <th style="width: 300px;"> Content </th>
                                <th> Class </th>
                                <th> Created at </th>
                                <th> Control </th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{ $lesson->title }}</td>
                                    <td>{{ str_limit($lesson->content, 100) }}</td>
                                    <td>{{ $lesson->ClassName }}</td>
                                    <td>{{ $lesson->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ url('admin/lessons/'.$lesson->id.'/edit') }}" class="btn btn-info"><i class="fa fa-refresh"></i> Edit</a>
                                        <a href="{{ url('admin/lessons/'.$lesson->id.'/view') }}" class="btn btn-warning"><i class="fa fa-eye"></i> View</a>
                                        @if($lesson->active == 1)
                                            <a href="{{ url('admin/lessons/'.$lesson->id.'/inactive') }}" class="confirm_inactive btn btn-danger"><i class="fa fa-close"></i> Inactivation</a>
                                        @else
                                            <a href="{{ url('admin/lessons/'.$lesson->id.'/active') }}" class="confirm_active btn btn-success"><i class="fa fa-check"></i> Activation</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        </form>


                    </div><!-- /.portlet-body -->
                </div><!-- /.portlet -->
                <!-- END EXAMPLE TABLE PORTLET-->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@stop