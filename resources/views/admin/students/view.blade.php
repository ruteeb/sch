@extends('admin.layouts.app')

@section('title')
    View Student
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
                    <a href="{{ url('admin/students') }}">Students</a>
                    <i class="fa fa-circle"></i>
                </li>

                <li>
                    <span>View Student</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> View Student</h3>
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
                            <span class="caption-subject bold uppercase"> View Student</span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="list-unstyled profile-nav">
                                    <li>
                                        <img class="full_width"  src="{{ asset('admin/files/images/students') }}/{{ $student->image }}">
                                    </li>
                                </ul>
                            </div><!-- /.col-md-3 -->

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12 profile-info">
                                        <h1 class="font-orange sbold uppercase">{{ $student->first_name}} {{ $student->last_name }}</h1>

                                        <p>
                                            <strong>Email: </strong>
                                            {{ $student->email }}
                                        </p>

                                        <p>
                                            <strong>Phone: </strong>
                                            {{ $student->phone }}
                                        </p>

                                        <p>
                                            <strong>Birthday: </strong>
                                            {{ $student->birthday }}
                                        </p>

                                        <p>
                                            <strong>Bsn Number: </strong>
                                            {{ $student->bsn_number }}
                                        </p>

                                        <p>
                                            <strong>Post Code: </strong>
                                            {{ $student->post_code }}
                                        </p>

                                        <p>
                                            <strong>Home Number: </strong>
                                            {{ $student->home_number }}
                                        </p>

                                        <p>
                                            <strong>Extension: </strong>
                                            {{ $student->extension }}
                                        </p>

                                        <p>
                                            <strong>Street Name: </strong>
                                            {{ $student->street_name }}
                                        </p>

                                        <p>
                                            <strong>City: </strong>
                                            {{ $student->city }}
                                        </p>

                                        <p>
                                            <strong>Province: </strong>
                                            {{ $student->province }}
                                        </p>

                                        <p>
                                            <strong>Start Borrow: </strong>
                                            {{ $student->start_borrow }}
                                        </p>

                                        <p>
                                            <strong>End Borrow: </strong>
                                            {{ $student->end_borrow }}
                                        </p>

                                        <p>
                                            <strong>Start Residence: </strong>
                                            {{ $student->start_residence }}
                                        </p>

                                        <p>
                                            <strong>End Residence: </strong>
                                            {{ $student->end_residence }}



                                        <p>
                                            <strong>Classes: </strong><br>
                                            @foreach($studentClasses as $studentClass)
                                                <?php $classData = \App\Model\Classes::find($studentClass->class_id); ?>
                                                <span class="view_course">{{ $classData->title }} </span>
                                            @endforeach
                                        </p>


                                    </div><!-- /.col-md-8-->
                                </div><!-- /.row -->
                            </div><!-- /.col-md-9 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="control-item">
                        <a href="{{ url('admin/students') }}" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Back</a>
                        <a href="{{ url('admin/students/'.$student->id.'/edit') }}" class="btn btn-info"><i class="fa fa-refresh"></i> Edit</a>
                        @if($student->active == 1)
                            <a href="{{ url('admin/students/'.$student->id.'/inactive') }}" class="confirm_inactive btn btn-danger"><i class="fa fa-close"></i> Inactivation</a>
                        @else
                            <a href="{{ url('admin/students/'.$student->id.'/active') }}" class="confirm_active btn btn-success"><i class="fa fa-check"></i> Activation</a>
                        @endif
                    </div><!-- /.item -->
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@stop