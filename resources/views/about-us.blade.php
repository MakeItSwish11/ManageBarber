@extends('layouts.app')

@section('content')
<div class="h-100 w-100 position-absolute" style="top: 0;z-index: -1">
    <div style="background-size: cover;background-position: center center ;height: 100%;background-image: url({{asset('assets/bg-cartoon-hospital.jpg')}});" class="bg-primary w-100 position-relative">
        <div class="layer"></div>
    </div>
  </div>
    <div class="container text-white" style="font-size: 26px;">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia blanditiis, sint excepturi esse dolorem, laborum optio quos accusantium eligendi ipsam repellendus dignissimos earum fugiat. Voluptatibus doloribus nisi illum dolor quasi!
    </div>
@endsection