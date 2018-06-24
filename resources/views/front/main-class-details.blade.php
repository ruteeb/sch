@extends('layouts.app')


@section('title')
    Main Class Gegevens
@stop


@section('content')


    <main>
        <section id="hero_in" class="general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Main Class Gegevens</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_120_95">

            <div class="container">

                <div class="row">
                    <div class="col-md-9">
                        <div class="sections-class">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Online Lessons</h4>
                                    <div class="sec-class">
                                        <a href="#">Online 1 | time 06:00 am</a>
                                        <a href="#">Online 2 | time 08:00 am</a>
                                    </div><!-- /.sec-class -->
                                </div><!-- /.col-md-4 -->

                                <div class="col-md-4">
                                    <h4>Recording Lessons</h4>
                                    <div class="sec-class">
                                        <a href="#">rec 1 | date 15-7-2018</a>
                                        <a href="#">rec 2 | date 20-8-2018</a>
                                    </div><!-- /.sec-class -->
                                </div><!-- /.col-md-4 -->

                                <div class="col-md-4">
                                    <h4>Extra Training</h4>
                                    <div class="sec-class">
                                        <a href="#">extra 1 | date 15-7-2018</a>
                                        <a href="#">extra 2 | date 20-8-2018</a>
                                    </div><!-- /.sec-class -->
                                </div><!-- /.col-md-4 -->
                                <div class="clear"></div>
                            </div>
                        </div><!-- /.sections-class -->
                    </div><!-- /.col-md-9 -->

                    <div class="col-md-3">
                        <div class="join-classes">
                            <div class="course-with-classes">
                                <p>Course name 2</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> class name 1</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> class name 2</a></li>
                                </ul>
                            </div>

                            <div class="course-with-classes">
                                <p>Course name 2</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> class name 3</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> class name 4</a></li>
                                </ul>
                            </div>
                        </div><!-- /.join-classes -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->

            </div>

        </div>
        <!-- /container -->

    </main>
    <!--/main-->



@stop