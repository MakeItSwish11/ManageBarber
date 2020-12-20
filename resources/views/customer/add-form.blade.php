@extends('layouts.app')

@section('content')
<div class="h-100 w-100 position-absolute" style="top: 0;z-index: -1">
    <div style="background-size: cover;background-position: center center ;height: 100%;background-image: url({{asset('assets/customer.svg')}});" class="bg-primary w-100 position-relative">
        <div class="layer"></div>
    </div>
  </div>
<div class="container pb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has("message"))
            <div class="alert alert-success" role="alert">
                {{session()->get("message")}}
              </div>
            @endif
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Register Customer') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('saveCustomer') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="barber_id" class="col-md-4 col-form-label text-md-right">{{ __('Barber') }}</label>

                            <div class="col-md-6">
                                <select name="barber_id" class="form-control" id="barber_id">
                                    @foreach ($barbers as $item)
                                <option value={{$item->id}}>{{$item->name}}</option>
                                    @endforeach
                                  </select>

                                @error('barber_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Depan') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Belakang') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Handphone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ktp" class="col-md-4 col-form-label text-md-right">{{ __('KTP') }}</label>

                            <div class="col-md-6">
                                <input id="ktp" type="text" class="form-control @error('ktp') is-invalid @enderror" name="ktp" value="{{ old('ktp') }}" required autocomplete="ktp" autofocus>

                                @error('ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="place_dob" class="col-md-4 col-form-label text-md-right">{{ __('Tempat, Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="place_dob" type="text" class="form-control @error('place_dob') is-invalid @enderror" name="place_dob" value="{{ old('place_dob') }}" required autocomplete="place_dob" autofocus>

                                @error('place_dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="entrance" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Masuk Cukur') }}</label>

                            <div class="col-md-6">
                                <input id="entrance" type="date" class="form-control @error('entrance') is-invalid @enderror" name="entrance" value="{{ old('entrance') }}" required autocomplete="entrance" autofocus>

                                @error('entrance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="complaint" class="col-md-4 col-form-label text-md-right">{{ __('Kebutuhan') }}</label>

                            <div class="col-md-6">
                                <input id="complaint" type="text" class="form-control @error('complaint') is-invalid @enderror" name="complaint" value="{{ old('complaint') }}" required autocomplete="complaint" autofocus>

                                @error('complaint')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="offset-md-4 d-flex">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" onclick="window.history.back()">
                                        {{ __('Cancel') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection