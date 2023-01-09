@extends('layout')
@section('title')
    - Skema
@endsection
@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container mb-5">

      @if (\Session::has('success'))
          <div class="alert alert-success mt-3">{!! \Session::get('success') !!}
          </div>
      @endif

      <br><br><br>

      <table class="table table-borderless" id="table_peserta">
        <thead>
          <tr>
            <th scope="col">Nama Peserta</th>
            <th scope="col">Skema</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">No HP</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          @forelse ($list as $item)
            <tr>
              <th scope="row">{{$item->Nm_peserta}}</th>
              <td>{{$item->skema->Nm_skema}}</td>
              <td>{{$item->Jekel}}</td>
              <td>{{$item->Alamat}}</td>
              <td>{{$item->No_hp}}</td>
              <td>
                <a href="{{url('peserta/edit/'.$item->Id_peserta)}}" type="button" class="btn btn-outline-primary btn-sm">
                  <i class="bi bi-pencil-fill"></i>
                </a>
                <form action="{{route('peserta.destroy', $item->Id_peserta)}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                </form>
              </td>
            </tr>
          @empty 
          <tr>
            <td>Belum ada data</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
        $('#table_peserta').DataTable();
    });
  </script>
@endsection