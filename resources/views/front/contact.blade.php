@extends('layouts.app')


@section('title')
    Contact
@stop


@section('content')

    <main>
        <section id="hero_in" class="contacts">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Contact Oranje</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="contact_info">
            <div class="container">
                <ul class="clearfix">
                    <?php $setting = \App\Model\Setting::first() ?>
                    <li>
                        <i class="pe-7s-map-marker"></i>
                        <h4>Address</h4>
                        <span>{{ $setting->address }}</span>
                    </li>
                    <li>
                        <i class="pe-7s-mail-open-file"></i>
                        <h4>Email address</h4>
                        <span><a href="#" class="__cf_email__">{{ $setting->email }}</a> </span>

                    </li>
                    <li>
                        <i class="pe-7s-phone"></i>
                        <h4>Contacts info</h4>
                        <span>{{ $setting->phone }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <!--/contact_info-->

        <div class="bg_color_1">
            <div class="container margin_120_95">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="map_contact">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2504353.449975403!2d3.0363707795063086!3d52.19509505953633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c609c3db87e4bb%3A0xb3a175ceffbd0a9f!2sNetherlands!5e0!3m2!1sen!2seg!4v1529716763270" frameborder="0" style="width:100%; height: 465px; border:0" allowfullscreen></iframe>
                        </div>
                        <!-- /map -->
                    </div>


                    <div class="col-lg-6">
                        <h4>Send a message</h4>
                        <p>Ex quem dicta delicata usu, zril vocibus maiestatis in qui.</p>
                        <div id="message-contact"></div>
                        <form method="post" action="{{ url('contact/send/message') }}">

                            {{ csrf_field() }}

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
                                </div>

                                <div class="col-md-6">
									<span class="input{{ $errors->has('name') ? ' has-error' : '' }}">
										<input class="input_field" type="text" value="{{ old('name') }}" id="name_contact" name="name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <label class="input_label">
											<span class="input__label-content">Uw naam</span>
										</label>
									</span>
                                </div>
                                <div class="col-md-6">
									<span class="input{{ $errors->has('subject') ? ' has-error' : '' }}">
										<input class="input_field" type="text" value="{{ old('subject') }}" id="lastname_contact" name="subject">
                                        @if ($errors->has('subject'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('subject') }}</strong>
                                            </span>
                                        @endif
                                        <label class="input_label">
											<span class="input__label-content">Onderwerpen</span>
										</label>
									</span>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">

                                <div class="col-md-6">
									<span class="input{{ $errors->has('email') ? ' has-error' : '' }}">
										<input class="input_field" type="email" value="{{ old('email') }}" id="email_contact" name="email">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <label class="input_label">
											<span class="input__label-content">Jouw E-mail</span>
										</label>
									</span>
                                </div>
                                <div class="col-md-6">
									<span class="input{{ $errors->has('phone') ? ' has-error' : '' }}">
										<input class="input_field" type="text" value="{{ old('phone') }}" id="phone_contact" name="phone">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                        <label class="input_label">
											<span class="input__label-content">Jouw telefoon</span>
										</label>
									</span>
                                </div>
                            </div>
                            <!-- /row -->
                            <span style="width: 100% !important;" class="input{{ $errors->has('message') ? ' has-error' : '' }}">
                                <textarea class="input_field" id="message_contact" value="{{ old('message') }}" name="message" style="width: 100%; height:150px;"></textarea>
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                                <label class="input_label">
                                    <span class="input__label-content">Jouw Bericht</span>
                                </label>
							</span>
                            <p class="add_top_30"><input type="submit" value="Submit" class="btn_1"></p>
                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
    </main>
    <!--/main-->

@stop