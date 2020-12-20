@extends('layouts.app')

@section('content')
<div class="h-100 w-100 position-absolute" style="top: 0;z-index: -1">
  <div style="background-size: cover;background-position: center center ;height: 100%;background-image: url({{asset('assets/customer.svg')}});" class="bg-primary w-100 position-relative">
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
        <table class="table" id="customer-table">
          <thead>
            <tr>
              <th class="bg-primary text-white"scope="col">Barber</th>
              <th class="bg-primary text-white"scope="col">Nama Depan</th>
              <th class="bg-primary text-white"scope="col">Nama Belakang</th>
              <th class="bg-primary text-white"scope="col">Alamat</th>
              <th class="bg-primary text-white"scope="col">Telepon</th>
              <th class="bg-primary text-white"scope="col">KTP</th>
              <th class="bg-primary text-white"scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if (count($customers) > 0)
                @foreach ($customers as $item)
                <tr>
                  <th class="text-danger" scope="row">{{$item->Barber->name}}</th>
                  <th>
                    <a style="color: black;" href="{{route('showCustomers', ['id' => $item->id])}}">{{$item->first_name}}</a>
                  </th>
                  <td>{{$item->last_name}}</td>
                  <td>{{$item->address}}</td>
                  <td>{{$item->phone}}</td>
                  <td>{{$item->ktp}}</td>
                  <td>{{$item->entrance}}</td>
                  <td>
                    <form method="POST" action="{{route('deletePatient',['id' => $item->id])}}">
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
            $("#customer-table").DataTable();
        })
    </script>
@endsection