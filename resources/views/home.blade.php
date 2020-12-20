@extends('layouts.app')

@section('style')
    <style>
      .home-card{
          width: 200px;
          box-shadow: 0 0 4px 1px rgba(0, 0, 0, .2);
          border-radius: 4px;
          height: 300px;
          background-color: black;
          display: flex;
          flex-direction: column;
      }
      .home-card-header{
        display: flex;
        height: 100px;
      }

      .home-card-body{
        height: 100%;
        color: black;
        padding: 0 1rem;
      }
      
    </style>
@endsection
@section('content')

<div class="container">
  <div class="row" style="padding-top: 40px;">
    <div class="col-md-6 d-flex justify-content-around">
      <a href="{{route('showListBarber')}}" class="btn-container btn-inline animate_when_almost_visible bottom-t-top start_animation">
        <div class="home-card" style="margin-right: 100px;">
          <div class="home-card">
            <img src="{{asset('assets/scissors.svg')}}" class="w-100" alt="">
          </div>
          <div class="home-card-body">
            <h1>01</h1>
          <p>Terdapat {{count($barbers)}} barber</p>
            <p>Lihat semua Barber</p>
          </div>
      </div>
      </a>
      <a href="{{route('showListCustomer')}}" class="btn-container btn-inline animate_when_almost_visible bottom-t-top start_animation">
        <div class="home-card" style="margin-right: 50px;">
          <div class="home-card-header">
            <img src="{{asset('assets/customer.svg')}}" class="w-100" alt="">
          </div>
          <div class="home-card-body">
            <h1>02</h1>
          <p>Terdapat {{count($customers)}} Customer</p>

            <p>Lihat semua Customer</p>
          </div>
      </div>
      </a>
      
    </div>
    </div>
    </div>
</div>
@endsection
