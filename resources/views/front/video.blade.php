@extends('layouts.app')


@section('title')
    Live Video
@stop


@section('content')


    <main>
        <section id="hero_in" class="general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Over  Oranje</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_120_95">

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <video style="background: #fff; width:100%" src="{{ asset('front/11.mp4') }}" controls ></video>
                    </div><!-- /.col-md-9 -->

                    <div class="col-md-3">
                        <div class="chat-video">
                            <h3>Chat</h3>

                            <div class="section-messages">
                                <p>
                                    <strong>Ahmed:</strong><br>
                                    Hello Test Hello Hello
                                </p>

                                <p class="color-message">
                                    <strong>Ahmed:</strong><br>
                                    Hello Test Hello Hello
                                </p>

                                <p>
                                    <strong>Ahmed:</strong><br>
                                    Hello Test Hello Hello
                                </p>

                                <p class="color-message">
                                    <strong>Ahmed:</strong><br>
                                    Hello Test Hello Hello
                                </p>


                                <p>
                                    <strong>Ahmed:</strong><br>
                                    Hello Test Hello Hello
                                </p>

                                <p class="color-message">
                                    <strong>Ahmed:</strong><br>
                                    Hello Test Hello Hello
                                </p>


                                <p>
                                    <strong>Ahmed:</strong><br>
                                    Hello Test Hello Hello
                                </p>

                                <p class="color-message">
                                    <strong>Ahmed:</strong><br>
                                    Hello Test Hello Hello
                                </p>
                            </div><!-- /.section-messages -->


                            <div class="send-message">
                                <form>
                                    <input type="text" name="message">
                                    <button type="submit"><img src="{{ asset('front/img/icons/send.png') }}" ></button>
                                    <div class="clear"></div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-md-3">
                        <video class="small-video" src="{{ asset('front/11.mp4') }}" controls ></video>
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3">
                        <video class="small-video" src="{{ asset('front/11.mp4') }}" controls ></video>
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3">
                        <video class="small-video" src="{{ asset('front/11.mp4') }}" controls ></video>
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3">
                        <div class="text-center hand-style">
                            <img class="hand-hold-white" src="{{ asset('front/img/icons/hold2.png') }}">
                            <img class="hand-hold-red" src="{{ asset('front/img/icons/hold.png') }}">
                        </div>
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3">
                        <video class="small-video" src="{{ asset('front/11.mp4') }}" controls ></video>
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3">
                        <video class="small-video" src="{{ asset('front/11.mp4') }}" controls ></video>
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3">
                        <video class="small-video" src="{{ asset('front/11.mp4') }}" controls ></video>
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3">
                        <video class="small-video" src="{{ asset('front/11.mp4') }}" controls ></video>
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->


                <div class="row">
                    <div class="col-md-12">
                        <div class="user-notes">
                            <h3>Student notice privet of student</h3>

                            <textarea name="message"></textarea>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /container -->

    </main>
    <!--/main-->



@stop