@extends('layouts.app')

@section('content')
<div class="h-100 w-100 position-absolute" style="top: 0;z-index: -1">
    <div style="background-size: cover;background-position: center center ;height: 100%;background-image: url({{asset('assets/logo.jpg')}});" class="bg-primary w-100 position-relative">
        <div class="layer"></div>
    </div>
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has("message"))
            <div class="alert alert-success" role="alert">
                {{session()->get("message")}}
              </div>
            @endif
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Register Barber') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('saveBarber') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Barber') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="NIP" class="col-md-4 col-form-label text-md-right">{{ __('NIP') }}</label>

                            <div class="col-md-6">
                                <input id="NIP" type="text" class="form-control @error('NIP') is-invalid @enderror" name="NIP" value="{{ old('NIP') }}" required autocomplete="NIP" autofocus>

                                @error('NIP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="specialist" class="col-md-4 col-form-label text-md-right">{{ __('Specialis') }}</label>

                            <div class="col-md-6">
                                <input id="specialist" type="text" class="form-control @error('specialist') is-invalid @enderror" name="specialist" value="{{ old('specialist') }}" required autocomplete="specialist" autofocus>

                                @error('specialist')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="practice" class="col-md-4 col-form-label text-md-right">{{ __('Jadwal Potong') }}</label>

                            <div class="col-md-6">
                                <input id="practice" type="date" class="form-control @error('practice') is-invalid @enderror" name="practice" value="{{ old('practice') }}" required autocomplete="practice" autofocus>

                                @error('practice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price_consultation" class="col-md-4 col-form-label text-md-right">{{ __('Harga Potong') }}</label>

                            <div class="col-md-6">
                                <input id="price_consultation" type="text" class="form-control @error('price_consultation') is-invalid @enderror" name="price_consultation" value="{{ old('price_consultation') }}" required autocomplete="price_consultation" autofocus>

                                @error('price_consultation')
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