<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        body{
            height: 100vh;
        }
        .layer {
    background-color: rgb(240, 248, 255);
    position: absolute;
    top: 20;
    left: 10;
    width: 100%;
    height: 100%;
}
    </style>
</head>
<body class="position-relative">
    <div class="h-100 w-100 position-absolute" style="top: 0;z-index: -1">
        <div style="background-size: cover;background-position: center center ;height: 100%;background-image: url({{asset('assets/logo.jpg')}});" class="bg-primary w-100 position-relative">
            <div class="layer"></div>
        </div>
      </div>

    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-sm-12 col-md-6" style="max-width: 400px;">
                <div class="card" style="box-shadow: 0 0 5px 1px rgba(0,0,0,.1);border-radius: 5px;">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-center mb-3">
                                <i class="fa fa-scissors" aria-hidden="true" style="font-size: 40px;"></i>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">
                                      <i class="fa fa-user" aria-hidden="true"></i>
                                  </span>
                                </div>
                                <input id="name" type="name" placeholder="Username" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              </div>

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">
                                      <i class="fa fa-lock" aria-hidden="true"></i>
                                  </span>
                                </div>
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
    
                            <div class="form-group">
                                <a href="/register">Tidak punya Akun?</a>
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>