@extends('layouts.app')

@section('title')
    Details Cursus
@stop



@section('content')

    <main>
        <section id="hero_in" class="courses">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Details Cursus</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="bg_color_1">
            <div class="container margin_60_35">
                <div class="row">
                    <div class="col-lg-8">

                        <section id="description">
                            <h2 class="title-color">{{ $course->title }}</h2>

                            <h3>Description:</h3>
                            <p>{!! nl2br($course->description) !!}</p>
                        </section>
                        <!-- /section -->
                    </div>
                    <!-- /col -->

                    <aside class="col-lg-4" id="sidebar">
                        <div class="box_detail">
                            <img src="{{ asset('admin/files/images/courses') }}/{{ $course->image }}" alt="" class="img-fluid">
                        </div>
                    </aside>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
    </main>
    <!--/main-->

@stop