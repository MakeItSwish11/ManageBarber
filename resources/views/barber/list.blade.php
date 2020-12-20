@extends('layouts.app')

@section('content')
<div class="h-100 w-100 position-absolute" style="top: 0;z-index: -1">
  <div style="background-size: cover;background-position: center center ;height: 100%;background-image: url({{asset('assets/logo.jpg')}});" class="bg-primary w-100 position-relative">
      <div class="layer"></div>
  </div>
</div>
<div class="container bg-white py-3 rounded">
    @if (session()->has("message"))
    <div class="alert alert-info" role="alert">
        {{session()->get("message")}}
      </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="barber-table">
          <thead>
            <tr>
              <th class="bg-primary text-white" scope="col">Nama</th>
              <th class="bg-primary text-white" scope="col">NIP</th>
              <th class="bg-primary text-white" scope="col">Spesialis</th>
              <th class="bg-primary text-white" scope="col">Jadwal Potong</th>
              <th class="bg-primary text-white" scope="col">Biaya Potong</th>
              <th class="bg-primary text-white" scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if (count($barbers) > 0)
                @foreach ($barbers as $item)
                <tr>
                  <th scope="row">
                  <a class="text-danger" href="{{route('showBarber', ['id' => $item->id])}}">{{$item->name}}</a>
                  </th>
                  <td>{{$item->NIP}}</td>
                  <td>{{$item->specialist}}</td>
                  <td>{{$item->practice}}</td>
                  <td>{{$item->price_consultation}}</td>
                  <td>
                    <form method="POST" action="{{route('deleteBarber',['id' => $item->id])}}">
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

@section('script')
    <script>
        $(document).ready(function () {
            $("#barber-table").DataTable();
        })
    </script>
@endsection