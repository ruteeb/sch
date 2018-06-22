@extends('admin.layouts.app')

@section('title')
    Add Teacher
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
                    <a href="{{ url('admin/teachers') }}">Teachers</a>
                    <i class="fa fa-circle"></i>
                </li>

                <li>
                    <a href="{{ url('admin/teachers/create') }}">Add Teacher</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Teacher </h3>
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
                    <span class="caption-subject font-red bold uppercase"> Add Teacher -
                        <span class="step-title"> Step 1 of 3 </span>
                    </span>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" method="post"  action="{{ url('admin/teachers/store') }}" id="submit_form" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li>
                                    <a href="#tab1" data-toggle="tab" class="step">
                                        <span class="number"> 1 </span>
                                        <span class="desc">
                                        <i class="fa fa-check"></i> Teacher Info </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number"> 2 </span>
                                        <span class="desc">
                                        <i class="fa fa-check"></i> Teacher Address </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step">
                                        <span class="number"> 3 </span>
                                        <span class="desc">
                                        <i class="fa fa-check"></i> Choose Classes </span>
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
                                    <h3 class="block">Teacher Info</h3>

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
                                    <h3 class="block">Teacher Address</h3>

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
                                    <h3 class="block">Choose Classes</h3>

                                    <div class="col-md-6 select_multi">
                                        <div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
                                            <label for="course">Course</label>
                                            <select class="bs-select form-control" data-live-search="true" data-size="8" name="course" id="course" >
                                                <option selected disabled="disabled" value="">Choose Course</option>

                                                @foreach($courses as $course)
                                                    <option {{ old('course') == $course->id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->title }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('course'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('course') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div><!-- /.col-md-6 -->



                                        <div class="col-md-6 select_multi">
                                            <div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}">
                                                <label for="classes">Class</label>
                                                <select disabled="disabled" class="bs-select form-control" data-live-search="true" data-size="8" id="classes" >
                                                    <option selected disabled="disabled" value="">Choose Class</option>
                                                </select>
                                                @if ($errors->has('class'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('class') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div><!-- /.col-md-6 -->



                                    <div class="col-md-12">
                                        <div id="data_classes" class="show_data">

                                        </div><!-- /.show-data -->
                                    </div><!-- /.col-md-12 -->

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



@section('js')
    <script>
        $(document).ready(function() {
            $('#course').on('change', function () {
                $("#classes").empty();
                $.ajax({
                    url: '{{ url("admin/teachers/getclasses") }}',
                    type: 'get',
                    dataType: 'json',
                    data: {'course': this.value, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        $("#classes").prop("disabled", false);
                        $("#classes").append('<option selected disabled="disabled" value="">Choose Class</option> ');
                        for (var x = 0; x < data.length; x++) {
                            $("#classes").append('<option data-name="' + data[x].title + '" value="' + data[x].id + '">' + data[x].title + '</option> ');
                            $("#classes").selectpicker("refresh");
                        }
                    }
                });
            });


            var arr = [];
            $('#classes').on('change', function () {
                if (this.value != "") {
                    if (arr.indexOf(this.value) > -1) {
                        alert('This item has already been selected');
                    } else {
                        arr.push(this.value);
                        var classDiv = $("<div class=\"class-div\" />");
                        var dataName = $("<p>" + $(this).find(':selected').attr('data-name') + "</p>");
                        var inputValue = $("<input type='hidden' value='"+this.value+"' name='classes[]'>");
                        var secriptCode = $("<script> $('.fa-close').click(function () {alert('delete');$(this).parent().remove();}); ");
                        var icon = $("<i class='fa fa-close'></i> ");
                        icon.click(function() {
                            $(this).parent().parent().remove();
                        });
                        classDiv.append(dataName);
                        dataName.append(icon);
                        classDiv.append(inputValue);
                        $("#data_classes").append(classDiv.append(secriptCode));
                    }

                }
            });

        });
    </script>
@stop
