@extends('layouts.app')


@section('title')
    Evenementen
@stop




@section('content')

    <main>
        <section id="hero_in" class="courses">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Evenementen</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_60_35">
            <div class="row">

                @foreach($events as $event)

                <div class="col-lg-4 col-md-6 wow animated" data-wow-offset="150">
                    <a href="{{ url('events/'.$event->id.'/details') }}" class="grid_item">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="{{ asset('admin/files/images/events') }}/{{ $event->image }}" class="img-fluid" alt="">
                            <div class="info">
                                <h3>{{ str_limit($event->title, 25) }}</h3>
                            </div>
                        </figure>
                    </a>
                </div>

                @endforeach
            </div>
            <!-- /row -->
            <nav class="render-pages" aria-label="Page navigation">
                {!! $events->render() !!}
            </nav>
        </div>
        <!-- /container -->

    </main>
    <!--/main-->

@stop