@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner">
        @foreach ($sliders as $key => $sliderItem)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            @if ($sliderItem->image)
            <img src="{{ asset(" $sliderItem->image") }}" class="d-block w-100" alt="...">
            @endif
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>
                        {!! $sliderItem->title !!}
                    </h1>
                    <p>
                        {!! $sliderItem->description !!}
                    </p>
                    <div>
                        <a href="#" class="btn btn-slider">
                            Get Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content center">
            <div class="col-md-8">
                <h4>Welcome to SR SHOP</h4>
                <div class="underline">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel quaerat non impedit.
                        Consequuntur provident debitis ex illo eum,
                        fuga sapiente, tempore distinctio ipsam alias
                        porro obcaecati qui voluptate voluptatibus magnam,
                        reprehenderit doloremque dignissimos. Et porro esse
                        architecto, reprehenderit ut officiis impedit illo magni
                        saepe, nesciunt omnis sequi temporibus nobis voluptates?</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</div>

@endsection
