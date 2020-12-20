@extends('layouts.app')

@section('content')
    
<div class="container">
<form action="{{route('editBarber', ['id' => $barber->id])}}" method="post">
  @csrf
      <div class="row border p-2 rounded" style="box-shadow: 0 0 3px 1px rgba(0, 0, 0, .05);">
        <div class="col-sm-3">Nama Barber</div>
        <div class="col-sm-9">
          <input name="name" type="text" class="form-control @error('name') is-invalid @enderror my-2" value="{{$barber->name}}">
          @error('name')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
        </div>

        <div class="col-sm-3">NIP</div>
        <div class="col-sm-9">
          <input name="NIP" type="text" class="form-control @error('NIP') is-invalid @enderror my-2" value="{{$barber->NIP}}">
          @error('NIP')
          <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
          @enderror
        </div>

        <div class="col-sm-3">Specialist</div>
        <div class="col-sm-9">
          <input name="specialist" type="text" class="form-control @error('specialist') is-invalid @enderror my-2" value="{{$barber->specialist}}">
          @error('specialist')
          <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
          @enderror
        </div>

        <div class="col-sm-3">Jadwal Potong</div>
        <div class="col-sm-9">
          <input name="practice" type="date" class="form-control @error('practice') is-invalid @enderror my-2" value="{{$barber->practice}}">
          @error('practice')
          <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
          @enderror
        </div>

        <div class="col-sm-3">Harga Potong</div>
        <div class="col-sm-9">
          <input name="price_consultation" type="text" class="form-control @error('price_consultation') is-invalid @enderror my-2" value="{{$barber->price_consultation}}">
          @error('price_consultation')
          <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
          @enderror
        </div>

        <div class="col-sm-3"></div>
        <div class="col-sm-9">
          <input type="submit" value="Edit" class="btn btn-primary">
        </div>
    </div>
    </form>

    <h5  class="my-3">Customer</h5>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nama Depan</th>
            <th scope="col">Nama Belakang</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
            <th scope="col">KTP</th>
            <th scope="col">Tempat, Tanggal Lahir</th>
          </tr>
        </thead>
        <tbody>
          @if (count($barber->Customers) > 0)
              @foreach ($barber->Customers as $item)
              <tr>
                <th>{{$item->first_name}}</th>
                <td>{{$item->last_name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->ktp}}</td>
                <td>
                  <form method="POST" action="{{route('deleteCustomer',['id' => $item->id])}}">
                      @csrf
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
              </td>
              </tr>
              @endforeach
          @else
          <tr>
            <td colspan="13">Tidak ada data</td>
        </tr>
          @endif
        </tbody>
      </table>
    </div>
</div>
@endsection