@extends('admin.layouts.app')

@section('title')
    Add invoice
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
                    <a href="{{ url('admin/invoices') }}">Invoices</a>
                    <i class="fa fa-circle"></i>
                </li>

                <li>
                    <a href="{{ url('admin/invoices/create') }}">Add Invoice</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Invoice </h3>
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
                            <span class="caption-subject bold uppercase"> Add Invoice</span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body form">
                        <form role="form" method="post" action="{{ url('admin/invoices/store') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">


                                    <div style="margin-bottom: 20px;" class="col-md-12 select_multi">
                                        <div class="form-group{{ $errors->has('student') ? ' has-error' : '' }}">
                                            <label for="student">Student</label>
                                            <select class="form-control bs-select" data-live-search="true" data-size="8" name="student" id="student">
                                                <option value="">Choose Student</option>

                                                @foreach($contracts as $contract)
                                                    <?php $student = \App\User::find($contract->student_id); ?>

                                                    <option {{ $student->id == old('student') ? 'selected' : '' }} value="{{ $student->id }}">{{ $student->first_name . ' ' . $student->last_name }}</option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('student'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('student') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                            <label for="date">Date</label>
                                            <input type="date" class="form-control" value="{{ old('date') }}" name="date" id="date" placeholder="Date">
                                            @if ($errors->has('date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->


                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                                            <label for="value">Value</label>
                                            <input type="number" class="form-control" value="{{ old('value') }}" name="value" id="value" placeholder="Value">
                                            @if ($errors->has('value'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('value') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->


                                </div><!-- /.row -->
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn blue">Submit</button>
                                <a href="{{ url('admin/invoices') }}" class="btn default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@stop