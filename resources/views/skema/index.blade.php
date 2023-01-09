@extends('layout')
@section('title')
    - Skema
@endsection
@section('content')
    <div class="container mb-5">

      @if (\Session::has('success'))
          <div class="alert alert-success mt-3">{!! \Session::get('success') !!}
          </div>
      @endif

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-outline-primary mt-3 text-end" data-bs-toggle="modal" data-bs-target="#modalId">
          <i class="bi-plus"></i> Tambah Data Skema
        </button>
      </div>
      
      <table class="table table-borderless mt-3">
        <thead>
          <tr>
            <th scope="col">Kode Skema</th>
            <th scope="col">Nama Skema</th>
            <th scope="col">Jenis</th>
            <th scope="col">Jumlah Unit</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          @foreach ($list as $item)
            <tr>
              <th scope="row">{{$item->Kd_skema}}</th>
              <td>{{$item->Nm_skema}}</td>
              <td>{{$item->Jenis}}</td>
              <td>{{$item->Jml_unit}}</td>
              <td>
                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalIdEdit" onclick="ubah('{{$item->Kd_skema}}')">
                  <i class="bi bi-pencil-fill"></i>
                </button>
                <form action="{{route('sertifikasi.destroy', $item->Kd_skema)}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">Tambah Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{route('sertifikasi.store')}}" method="POST">
          <div class="modal-body">
              @csrf
              <div class="form-group mb-3">
                <label for="">Kode Skema <sup class="text-danger" title="Wajib diisi">*</sup></label>
                <input type="text" class="form-control {{ $errors->has('Kd_skema') ? ' is-invalid' : '' }}" name="Kd_skema" value="{{old('Kd_skema', 'SKM-')}}" placeholder="Kode Skema" aria-label="Kode Skema" aria-describedby="basic-addon1">
                @if ($errors->has('Kd_skema'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Kd_skema') }}.</small>
                    </span>
                @endif
              </div>
              <div class="form-group mb-3">
                <label for="">Nama Skema <sup class="text-danger" title="Wajib diisi">*</sup></label>
                <input type="text" name="Nm_skema" value="{{old('Nm_skema')}}" class="form-control {{ $errors->has('Nm_skema') ? ' is-invalid' : '' }}" placeholder="Masukan Nama Skema">
                @if ($errors->has('Nm_skema'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Nm_skema') }}.</small>
                    </span>
                @endif
              </div>
              <div class="form-group mb-3">
                <label for="">Jenis <sup class="text-danger" title="Wajib diisi">*</sup></label>
                <input type="text" name="Jenis" value="{{old('Jenis')}}" class="form-control {{ $errors->has('Jenis') ? ' is-invalid' : '' }}" placeholder="Masukan Jenis">
                @if ($errors->has('Jenis'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Jenis') }}.</small>
                    </span>
                @endif
              </div>
              <div class="form-group mb-3">
                <label for="">Jumlah Unit <sup class="text-danger" title="Wajib diisi">*</sup></label>
                <input type="number" name="Jml_unit" value="{{old('Jml_unit')}}" class="form-control {{ $errors->has('Jml_unit') ? ' is-invalid' : '' }}" placeholder="Masukan Jumlah Unit">
                @if ($errors->has('Jml_unit'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Jml_unit') }}.</small>
                    </span>
                @endif
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalIdEdit" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">Edit Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="POST" id="form">
          <div class="modal-body">
              @method('PUT')
              @csrf
              <div class="form-group mb-3">
                <label for="">Kode Skema <sup class="text-danger" title="Wajib diisi">*</sup></label>
                <input type="text" id="Kd_skema" value="{{old('Kd_skema', 'SKM-')}}" class="form-control {{ $errors->has('Kd_skema') ? ' is-invalid' : '' }}" name="Kd_skema" value="SKM-" placeholder="Kode Skema" aria-label="Kode Skema" aria-describedby="basic-addon1">
                @if ($errors->has('Kd_skema'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Kd_skema') }}.</small>
                    </span>
                @endif
              </div>
              <div class="form-group mb-3">
                <label for="">Nama Skema <sup class="text-danger" title="Wajib diisi">*</sup></label>
                <input type="text" id="Nm_skema" value="{{old('Nm_skema')}}" name="Nm_skema" class="form-control {{ $errors->has('Nm_skema') ? ' is-invalid' : '' }}" placeholder="Masukan Nama Skema">
                @if ($errors->has('Nm_skema'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Nm_skema') }}.</small>
                    </span>
                @endif
              </div>
              <div class="form-group mb-3">
                <label for="">Jenis <sup class="text-danger" title="Wajib diisi">*</sup></label>
                <input type="text" id="Jenis" value="{{old('Jenis')}}" name="Jenis" class="form-control {{ $errors->has('Jenis') ? ' is-invalid' : '' }}" placeholder="Masukan Jenis">
                @if ($errors->has('Jenis'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Jenis') }}.</small>
                    </span>
                @endif
              </div>
              <div class="form-group mb-3">
                <label for="">Jumlah Unit <sup class="text-danger" title="Wajib diisi">*</sup></label>
                <input type="number" id="Jml_unit" value="{{old('Jml_unit')}}" name="Jml_unit" class="form-control {{ $errors->has('Jml_unit') ? ' is-invalid' : '' }}" placeholder="Masukan Jumlah Unit">
                @if ($errors->has('Jml_unit'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Jml_unit') }}.</small>
                    </span>
                @endif
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
@endsection
@section('scripts')
     <!-- Optional: Place to the bottom of scripts -->
     <script>
      const myModal = new bootstrap.Modal(document.getElementById('modalId'))
      const myModalEdit = new bootstrap.Modal(document.getElementById('modalIdEdit'))

      function ubah(id) {
        fetch("{{ url('sertifikasi') }}/" + id).then(function(response) {
            response.json().then(function(resp) {

              document.getElementById('Kd_skema').value = resp.Kd_skema;
              document.getElementById('Nm_skema').value = resp.Nm_skema;
              document.getElementById('Jenis').value = resp.Jenis;
              document.getElementById('Jml_unit').value = resp.Jml_unit;

              let route = "{{route('sertifikasi.update', ':id')}}";
              route = route.replace(':id', resp.Kd_skema);

              document.getElementById('form').setAttribute('action', route);

            });
        });
      }
    </script>

    @if ($errors->any() && \Session::has('err') == 0)
        <script>
          myModal.show();
        </script>
    @endif

    @if ($errors->any() && \Session::has('err') == 1)
        <script>
          myModalEdit.show();
        </script>
    @endif
@endsection