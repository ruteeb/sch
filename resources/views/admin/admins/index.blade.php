@extends('admin.layouts.app')

@section('title')
    Admins
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
                    <a href="{{ url('admin/admins') }}">Admins</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Admins </h3>
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
                            <span class="caption-subject bold uppercase"> Admins </span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ url('admin/admins/create') }}" id="sample_editable_1_new" class="btn sbold green"> Add New
                                            <i class="fa fa-plus"></i>
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

                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> Username </th>
                                <th> E-mail </th>
                                <th> Phone </th>
                                <th> Created at </th>
                                <th> Control </th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" name="multidelet[]" class="checkboxes" value="{{ $admin->id }}" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->phone }}</td>
                                    <td>{{ $admin->created_at->format('d M Y') }}</td>
                                    @if(auth()->guard('admin')->user()->level == 2)
                                        <td>
                                            <a href="{{ url('admin/admins/'.$admin->id.'/edit') }}" class="btn btn-info"><i class="fa fa-refresh"></i> Edit</a>
                                            <a href="{{ url('admin/admins/'.$admin->id.'/delete') }}" class="confirm btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    @else
                                       <td> Not Permission</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                            <button type="submit" class="confirm delete-selected btn btn-danger"><i class="fa fa-trash"></i> Delete Selected</button>
                        </form>


                    </div><!-- /.portlet-body -->
                </div><!-- /.portlet -->
                <!-- END EXAMPLE TABLE PORTLET-->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@stop