@extends('layouts.app')



@section('title')
    Profile
@stop



@section('content')


    <main>
        <section id="hero_in" class="courses">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Profile</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->


        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-header-icon card-header-rose">
                                <h4 class="card-title">Edit Profile </h4>
                            </div>

                            <div style="padding: 0 20px;">
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

                            <div class="card-body">
                                <form role="form" method="post" action="{{ url('profile/update') }}" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label class="bmd-label-floating">Voornaam</label>
                                                <input type="text" name="first_name" value="{{ auth()->user()->first_name }}" class="form-control">
                                                @if ($errors->has('first_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <label class="bmd-label-floating">Achternaam</label>
                                                <input type="text" name="last_name" value="{{ auth()->user()->last_name }}" class="form-control">
                                                @if ($errors->has('last_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="bmd-label-floating">E-mail</label>
                                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control">
                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label class="bmd-label-floating">Telefoon</label>
                                                <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="form-control">
                                                @if ($errors->has('phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label class="bmd-label-floating">Wachtwoord</label>
                                                <input type="password" name="password" class="form-control">
                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                                <label class="bmd-label-floating">Beeld</label>
                                                <input type="file" name="image" class="form-control">
                                                @if ($errors->has('image'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <button style="margin-top: 20px" type="submit" class="btn btn-rose pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <img class="img img-user-profile" src="{{ asset('admin/files/images/users/') }}/{{ auth()->user()->image }}" />
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ auth()->user()->first_name . ' ' .auth()->user()->last_name }}</h4>
                                <p class="card-description">
                                    <span><strong>E-mail:</strong> {{ auth()->user()->email }}</span>
                                    <span><strong>Telefoon:</strong> {{ auth()->user()->phone }}</span>
                                    <span><strong>Verjaardag:</strong> {{ auth()->user()->birthday }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

@stop



@section('css')
    <link href="{{ asset('front/css/') }}/material-dashboard.min.css" rel="stylesheet" />
    <link href="{{ asset('front/css/') }}/demo.css" rel="stylesheet" />
@stop