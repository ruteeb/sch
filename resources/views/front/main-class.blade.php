@extends('layouts.app')


@section('title')
    Main Class
@stop


@section('content')


    <main>
        <section id="hero_in" class="general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Main Class</h1>
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
                                <div class="col-md-4" style="float: right">
                                    <h4>Online Lessons</h4>
                                    <div class="sec-class">
                                        <a href="#">online 1 | time 10:00 am</a>
                                        <a href="#">online 2 | time 20:00 am</a>
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