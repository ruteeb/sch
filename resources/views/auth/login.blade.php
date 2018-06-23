<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Aspiraties">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- BASE CSS -->
    <link href="{{ asset('front') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/vendors.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">
    <?php $setting = \App\Model\Setting::first(); ?>
    <link rel="shortcut icon" href="{{ asset('admin/files/images/setting/')."/".$setting->favicon }}">


    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('front') }}/css/custom.css" rel="stylesheet">

    @yield('css')

</head>

<body id="login_bg">

<nav id="menu" class="fake_menu"></nav>

<div id="preloader">
    <div data-loader="circle-side"></div>
</div>
<!-- End Preload -->

<div id="login">
    <aside>
        <figure>
            <a href="{{ url('/') }}"><img src="{{ asset('admin/files/images/setting/')."/".$setting->logo }}" width="149" height="42" data-retina="true" alt=""></a>
        </figure>
        <form class="login-form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <span class="input">
                    <input class="input_field" id="email" type="email" name="email" value="{{ old('email') }}" required>
                    <label class="input_label">
                        <span class="input__label-content">Your email</span>
                    </label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </span>
            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <span class="input">
					<input class="input_field" id="password" type="password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
                </span>
                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                    <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />Remember
                    <span></span>
                </label>
                <small><a href="{{ url('password/reset') }}">Forgot password?</a></small>
            </div>

            <button type="submit" class="btn_1 rounded full-width add_top_60">Login to Oranje</button>
        </form>
        <div class="copy">© 2018 <a style="color:#999; font-size: 14px;" href="http://cs-aspiraties.nl/">Aspiraties</a> </div>
    </aside>
</div>
<!-- /login -->

<!-- COMMON SCRIPTS -->
<script src="{{ asset('front') }}/js/jquery-2.2.4.min.js"></script>
<script src="{{ asset('front') }}/js/common_scripts.js"></script>
<script src="{{ asset('front') }}/js/main.js"></script>
<script src="{{ asset('front') }}/assets/validate.js"></script>
@yield('js')

</body>
</html>