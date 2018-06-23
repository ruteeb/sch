
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

    <title>Send Email</title>

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

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="login-form" method="POST" action="{{ route('password.email') }}">
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


            <button type="submit" class="btn_1 rounded full-width add_top_60">Send Password Reset Link</button>
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

