@extends('layout')
@section('content')
    <h1 class="text-center">{{ $title }}</h1>
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/Super_max.jpg" class="d-block w-100" alt="SuperMax">
            </div>
            <div class="carousel-item">
                <img src="/images/CHARLES.jpg" class="d-block w-100" alt="Charles">
            </div>
            <div class="carousel-item">
                <img src="/images/Max_vs_Lec.jpg" class="d-block w-100" alt="Fight">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection