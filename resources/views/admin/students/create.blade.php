@extends('admin.layouts.app')

@section('title')
    Add Student
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
                    <a href="{{ url('admin/students/create') }}">Add Student</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Student </h3>
        <!-- END PAGE TITLE-->



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


        <div class="portlet light bordered" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-red"></i>
                    <span class="caption-subject font-red bold uppercase"> Add Student -
                        <span class="step-title"> Step 1 of 3 </span>
                    </span>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" method="post"  action="{{ url('admin/students/store') }}" id="submit_form" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li>
                                    <a href="#tab1" data-toggle="tab" class="step">
                                        <span class="number"> 1 </span>
                                        <span class="desc">
                                        <i class="fa fa-check"></i> Student Info </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number"> 2 </span>
                                        <span class="desc">
                                        <i class="fa fa-check"></i> Student Address </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step">
                                        <span class="number"> 3 </span>
                                        <span class="desc">
                                        <i class="fa fa-check"></i> Other Information </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="bar" class="progress progress-striped" role="progressbar">
                                <div class="progress-bar progress-bar-success"> </div>
                            </div>

                            <div class="tab-content">
                                <div class="alert alert-danger display-none">
                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below.
                                </div>

                                <div class="alert alert-success display-none">
                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful!
                                </div>


                                <div class="tab-pane active" id="tab1">
                                    <h3 class="block">Student Info</h3>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                            <label class="control-label" for="first_name">First Name <span class="required"> * </span></label>
                                            <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name" id="first_name" placeholder="First Name">
                                            @if ($errors->has('first_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                            <label class="control-label" for="last_name">Last Name <span class="required"> * </span></label>
                                            <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" id="last_name" placeholder="Last Name">
                                            @if ($errors->has('last_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="control-label" for="email">E-mail <span class="required"> * </span></label>
                                            <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="E-mail">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label class="control-label" for="phone">Phone <span class="required"> * </span></label>
                                            <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Phone">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label class="control-label" for="password">Password <span class="required"> * </span></label>
                                            <input type="password" class="form-control" value="{{ old('password') }}" name="password" id="password" placeholder="Password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label class="control-label" for="image">Image <span class="required"> * </span></label>
                                            <input type="file" class="form-control" value="{{ old('image') }}" name="image" id="image" placeholder="Image">
                                            @if ($errors->has('image'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                            <label class="control-label" for="birthday">Birthday <span class="required"> * </span></label>
                                            <input type="date" class="form-control" value="{{ old('birthday') }}" name="birthday" id="birthday" placeholder="Birthday">
                                            @if ($errors->has('birthday'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('birthday') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('bsn_number') ? ' has-error' : '' }}">
                                            <label class="control-label" for="bsn_number">Bsn Number <span class="required"> * </span></label>
                                            <input type="text" class="form-control" value="{{ old('bsn_number') }}" name="bsn_number" id="bsn_number" placeholder="Bsn Number">
                                            @if ($errors->has('bsn_number'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('bsn_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="clear"></div><!-- /.clear -->
                                </div>


                                <div class="tab-pane" id="tab2">
                                    <h3 class="block">Student Address</h3>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
                                            <label class="control-label" for="post_code">Post Code <span class="required"> * </span></label>
                                            <input type="text" class="form-control" value="{{ old('post_code') }}" name="post_code" id="post_code" placeholder="Post Code">
                                            @if ($errors->has('post_code'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('post_code') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('home_number') ? ' has-error' : '' }}">
                                            <label class="control-label" for="home_number">Home Number <span class="required"> * </span></label>
                                            <input type="text" class="form-control" value="{{ old('home_number') }}" name="home_number" id="home_number" placeholder="Home Number">
                                            @if ($errors->has('home_number'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('home_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('extension') ? ' has-error' : '' }}">
                                            <label class="control-label" for="extension">Extension <span class="required"> * </span></label>
                                            <input type="text" class="form-control" value="{{ old('extension') }}" name="extension" id="extension" placeholder="Extension">
                                            @if ($errors->has('extension'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('extension') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('street_name') ? ' has-error' : '' }}">
                                            <label class="control-label" for="street_name">Street Name <span class="required"> * </span></label>
                                            <input type="text" class="form-control" value="{{ old('street_name') }}" name="street_name" id="street_name" placeholder="Street Name">
                                            @if ($errors->has('street_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('street_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                            <label class="control-label" for="city">City <span class="required"> * </span></label>
                                            <input type="text" class="form-control" value="{{ old('city') }}" name="city" id="city" placeholder="City">
                                            @if ($errors->has('city'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                                            <label class="control-label" for="province">Province <span class="required"> * </span></label>
                                            <input type="text" class="form-control" value="{{ old('province') }}" name="province" id="province" placeholder="Province">
                                            @if ($errors->has('province'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('province') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="clear"></div><!-- /.clear -->
                                </div>


                                <div class="tab-pane" id="tab3">
                                    <h3 class="block">Other Information</h3>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('start_borrow') ? ' has-error' : '' }}">
                                            <label class="control-label" for="start_borrow">Start Borrow <span class="required"> * </span></label>
                                            <input type="date" class="form-control" value="{{ old('start_borrow') }}" name="start_borrow" id="start_borrow" placeholder="Start Borrow">
                                            @if ($errors->has('start_borrow'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('start_borrow') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('end_borrow') ? ' has-error' : '' }}">
                                            <label class="control-label" for="end_borrow">End Borrow <span class="required"> * </span></label>
                                            <input type="date" class="form-control" value="{{ old('end_borrow') }}" name="end_borrow" id="end_borrow" placeholder="End Borrow">
                                            @if ($errors->has('end_borrow'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('end_borrow') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('start_residence') ? ' has-error' : '' }}">
                                            <label class="control-label" for="start_residence">Start Residence <span class="required"> * </span></label>
                                            <input type="date" class="form-control" value="{{ old('start_residence') }}" name="start_residence" id="start_residence" placeholder="Start Residence">
                                            @if ($errors->has('start_residence'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('start_residence') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('end_residence') ? ' has-error' : '' }}">
                                            <label class="control-label" for="end_residence">End Residence <span class="required"> * </span></label>
                                            <input type="date" class="form-control" value="{{ old('end_residence') }}" name="end_residence" id="end_residence" placeholder="End Residence">
                                            @if ($errors->has('end_residence'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('end_residence') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->

                                    <div class="clear"></div><!-- /.clear -->
                                </div>

                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-9">
                                    <a href="javascript:;" class="btn default button-previous">
                                        <i class="fa fa-angle-left"></i> Back
                                    </a>

                                    <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                    <button type="submit" class="btn green button-submit"> Submit
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div><!-- /.page-content -->
@stop