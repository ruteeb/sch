@extends('layouts.app')


@section('title')
    Oranje Ster
@stop


@section('content')

    <main>
        <section class="hero_single version_2">
            <div class="wrapper">
                <div class="container">
                    <h3>WAT ZOU JE LEREN?</h3>
                    <p>Vergroot uw expertise in zaken, technologie en persoonlijke ontwikkeling</p>
                    <form>
                        <div id="custom-search-input">
                            <div class="input-group">
                                <input type="text" class=" search-query" placeholder="Ex. Architectuur, specialisatie...">
                                <input type="submit" class="btn_search" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /hero_single -->

        <div class="features clearfix">
            <div class="container">
                <ul>
                    <li><i class="pe-7s-study"></i>
                        <h4>+200 Cursussen</h4><span>Verken verschillende verse onderwerpen</span>
                    </li>
                    <li><i class="pe-7s-cup"></i>
                        <h4>Deskundige Leraren</h4><span>Vind de juiste instructeur voor jou</span>
                    </li>
                    <li><i class="pe-7s-target"></i>
                        <h4>Focus op doelwit</h4><span>Vergroot uw persoonlijke expertise</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /features -->

        <div class="container-fluid margin_120_0 courses_home">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>Oranje Populaire Cursussen</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div id="reccomended" class="owl-carousel owl-theme">

                @foreach($courses as $course)
                <div class="item">
                    <div class="box_grid">
                        <figure>
                            <a href="{{ url('courses/'.$course->id.'/details') }}">
                                <div class="preview"><span>Preview course</span></div>
                                <img src="{{ asset('admin/files/images/courses/') }}/{{ $course->image }}" class="img-fluid" alt=""></a>
                        </figure>

                        <div class="wrapper">
                            <small>Categorie</small>
                            <h3>{{ str_limit($course->title,30) }}</h3>
                            <p>{{ str_limit($course->description, 140) }}</p>
                        </div>
                        <ul>
                            <li><a href="{{ url('courses/'.$course->id.'/details') }}">Deatile Course</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /item -->
                @endforeach

            </div>
            <!-- /carousel -->
            <div class="container">
                <p class="btn_home_align"><a href="{{ url('courses') }}" class="btn_1 rounded">Bekijk alle cursussen</a></p>
            </div>
            <!-- /container -->
            <hr>
        </div>
        <!-- /container -->

        @if(!empty($materials))
        <div class="container margin_30_95 courses_home">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>Oranje Categorieën Cursussen</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div class="row">

                @foreach($materials as $material)
                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="{{ url('materials/'.$material->id.'/details') }}" class="grid_item">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="{{ asset('admin/files/images/materials') }}/{{ $material->image }}" class="img-fluid" alt="">
                            <div class="info">
                                <h3>{{ $material->title }}</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
        @endif


        @if(!empty($events))
        <div class="call_section events">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>Our Events</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div class="container clearfix">
                <div class="row">
                    @foreach($events as $event)
                    <div class=" col-md-6 wow" data-wow-offset="250">
                        <div class="block-reveal">
                            <div class="block-vertical"></div>
                            <div class="box_1">
                                <h3>{{ $event->title }}</h3>
                                <p>{{ str_limit($event->content, 200) }} </p>
                                <a href="{{ url('events/'.$event->id.'/details') }}" class="btn_1 rounded">Read more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!-- /.row -->
            </div>
        </div>
        <!--/call_section-->
        @endif

    </main>
    <!-- /main -->
@stop