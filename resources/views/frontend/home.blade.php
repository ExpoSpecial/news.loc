@extends('layouts.frontend')

@section('content')
<div class="section" id="carousel">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Lorem ipsum</h2>
                <hr>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium 
                doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore 
                veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam 
                voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur 
                magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, 
                qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia 
                non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam 
                quaerat voluptatem. Neque porro quisquam est, 
                qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia 
                non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam 
                quaerat voluptatem</p>
            </div>
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <?php $i = 0; ?>
                        @foreach($posts as $post)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="@if($i==0)  {{ 'active' }} @endif"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php $i = 0; ?>
                        @foreach($posts as $post)
                        <div class="carousel-item @if($i==0)  {{ 'active' }} @endif">
                            <img class="d-block" src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $post->title }}</h5>
                            </div>
                        </div>
                        <?php $i++; ?>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <i class="now-ui-icons arrows-1_minimal-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="now-ui-icons arrows-1_minimal-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection