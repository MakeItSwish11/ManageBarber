@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has("message"))
    <div class="alert alert-success" role="alert">
        {{session()->get("message")}}
      </div>
    @endif
<form action="{{route('editCustomer', ['id' => $customer->id])}}" method="post">
    @csrf
    <div class="row border p-2 rounded" style="box-shadow: 0 0 3px 1px rgba(0, 0, 0, .05);">
        <div class="col-sm-3">Nama Depan</div>
        <div class="col-sm-9">
            <input name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror my-2" value="{{$customer->first_name}}">
            @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    
        <div class="col-sm-3">Nama Belakang</div>
        <div class="col-sm-9">
            <input name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror my-2" value="{{$customer->last_name}}">
            @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    
        <div class="col-sm-3">Alamat</div>
        <div class="col-sm-9">
            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror my-2" value="{{$customer->address}}">
            @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    
        <div class="col-sm-3">Telepon</div>
        <div class="col-sm-9">
            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror my-2" value="{{$customer->phone}}">
            @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    
        <div class="col-sm-3">KTP</div>
        <div class="col-sm-9">
            <input name="ktp" type="text" class="form-control @error('ktp') is-invalid @enderror my-2" value="{{$customer->ktp}}">
            @error('ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>

        <div class="col-sm-3">Jadwal Tanggal Masuk</div>
        <div class="col-sm-9">
            <input name="entrance" type="date" class="form-control @error('entrance') is-invalid @enderror my-2" value="{{$patient->entrance}}">
            @error('entrance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        
        <div class="col-sm-3">Barber</div>
        <div class="col-sm-9">
            <select name="barber_id" class="form-control @error('barber_id') is-invalid @enderror my-2" value="{{$customer->Barber->name}}" id="">
                @foreach ($doctors as $item)
            <option value="{{$item->id}}" {{$item->id === $customer->Barber->id ? "selected" : ""}}>{{$item->name}}</option>
                @endforeach
            </select>
            @error('barber_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="col-sm-3">Tempat, Tanggal Lahir</div>
        <div class="col-sm-9">
            <input name="place_dob" type="text" class="form-control @error('place_dob') is-invalid @enderror my-2" value="{{$customer->place_dob}}">
            @error('place_dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>

        <div class="col-sm-3">Jenis Keluhan</div>
        <div class="col-sm-9">
            <input name="complaint" type="text" class="form-control @error('complaint') is-invalid @enderror my-2" value="{{$customer->complaint}}">
            @error('complaint')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>

        <div class="col-sm-3">Jenis Ruangan</div>
        <div class="col-sm-9">
            <input name="room_type" type="text" class="form-control @error('room_type') is-invalid @enderror my-2" value="{{$patient->room_type}}">
            @error('room_type')
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
</div></form>

@endsection