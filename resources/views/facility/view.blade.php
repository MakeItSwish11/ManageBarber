@extends('layouts.app')

@section('content')
<div class="h-100 w-100 position-absolute" style="top: 0;z-index: -1">
  <div style="background-size: cover;background-position: center center ;height: 100%;background-image: url({{asset('assets/facility.jpg')}});" class="bg-primary w-100 position-relative">
      <div class="layer"></div>
  </div>
</div>
<div class="container pb-4">
    <h4 class="text-white">Facility</h4>
<hr class="bg-white">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      @foreach ($facilities as $key => $item)
    <div class="carousel-item {{$key === 0 ? "active" : ""}}">
        <img style="height: 500px;object-fit: contain;" class="d-block w-100" src = "{{Storage::url($item->image)}}" alt="First slide">
        <div class="carousel-caption d-none d-md-flex justify-content-center">
          <div class="bg-white p-3" style="width: fit-content;box-shadow: 0 0 4px 1px rgba(0,0,0,.1);border-radius: 5px;">
            <h5 class="text-primary">{{$item->name}}</h5>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
</div>
</div>
@endsection