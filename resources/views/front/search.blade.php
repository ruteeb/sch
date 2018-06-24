@extends('layouts.app')


@section('title')
    Zoeken
@stop



@section('content')

    <main>
        <section id="hero_in" class="courses">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Zoeken</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_60_35">
            <div class="row">


                @if(count($courses) > 0)

                    @foreach($courses as $course)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="box_grid wow">
                                <figure class="block-reveal">
                                    <div class="block-horizzontal"></div>
                                    <a href="{{ url('courses/'.$course->id.'/details') }}"><img src="{{ asset('admin/files/images/courses') }}/{{ $course->image }}" class="img-fluid" alt=""></a>
                                    <div class="preview"><span>Preview course</span></div>
                                </figure>
                                <div class="wrapper">
                                    <h3>{{ $course->title }}</h3>
                                    <p>{!! str_limit($course->description, 100) !!}</p>
                                </div>
                                <ul>
                                    <li><a href="{{ url('courses/'.$course->id.'/details') }}">Details Course</a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                @else
                    <p class="not-search">Zoekgegevens niet gevonden</p>
                @endif

            </div>
            <!-- /row -->
            <nav class="render-pages" aria-label="Page navigation">
                {!! $courses->render() !!}
            </nav>
        </div>
        <!-- /container -->
    </main>
    <!--/main-->

@stop