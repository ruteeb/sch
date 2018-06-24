@extends('layouts.app')


@section('title')
    Lesson Recording
@stop


@section('content')


    <main>
        <section id="hero_in" class="general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Lesson Recording</h1>
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

                            <div style="height: 385px;" class="section-messages">
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
                        </div>
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