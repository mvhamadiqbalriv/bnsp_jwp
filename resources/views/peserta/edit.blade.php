@extends('layout')
@section('title')
    - Pendaftaran
@endsection
@section('content')
    <div class="container mt-5">
        <form action="{{route('peserta.update', $detail->Id_peserta)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group mb-3">
                <label for="">Nama Peserta <sup class="text-danger" title="Wajib diisi">*</sup></label>
                <input type="text" name="Nm_peserta" value="{{$detail->Nm_peserta}}" class="form-control {{ $errors->has('Nm_peserta') ? ' is-invalid' : '' }}" placeholder="Masukan Nama Peserta">
                @if ($errors->has('Nm_peserta'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Nm_peserta') }}.</small>
                    </span>
                @endif
              </div>
            <div class="form-group mb-3">
                <label for="">Skema <sup class="text-danger" title="Wajib diisi">*</sup></label>
                <select name="Kd_skema" id="" class="form-control {{ $errors->has('Kd_skema') ? ' is-invalid' : '' }}">
                    @foreach ($skema as $item)
                        <option value="{{$item->Kd_skema}}">{{$item->Nm_skema}}</option>
                    @endforeach
                </select>
                @if ($errors->has('Kd_skema'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Kd_skema') }}.</small>
                    </span>
                @endif
              </div>
              <div class="form-group mb-3">
                <label for="">Jenis Kelamin<sup class="text-danger" title="Wajib diisi">*</sup></label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Jekel" id="opsi1" value="{{old('Jekel', 'Laki-laki')}}" {{($detail->Jekel == 'Laki-laki') ? 'checked' : null}}>
                    <label class="form-check-label" for="opsi1">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Jekel" id="opsi2" value="{{old('Jekel', 'Perempuan')}}" {{($detail->Jekel == 'Perempuan') ? 'checked' : null}}>
                    <label class="form-check-label" for="opsi2">Perempuan</label>
                </div>
                @if ($errors->has('Jekel'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Jekel') }}.</small>
                    </span>
                @endif
              </div>
              <div class="form-group mb-3">
                <label for="">Alamat<sup class="text-danger" title="Wajib diisi">*</sup></label>
                <textarea name="Alamat" class="form-control {{ $errors->has('Alamat') ? ' is-invalid' : '' }}" id="" cols="30" rows="3">{{$detail->Alamat}}</textarea>
                @if ($errors->has('Alamat'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('Alamat') }}.</small>
                    </span>
                @endif
              </div>
              <div class="form-group mb-3">
                <label for="">No HP <sup class="text-danger" title="Wajib diisi">*</sup></label>
                <input type="number" name="No_hp" value="{{$detail->No_hp}}" class="form-control {{ $errors->has('No_hp') ? ' is-invalid' : '' }}" placeholder="Masukan No HP">
                <small class="text-muted">Rule : Input dengan angka dan diawali dengan 0</small>
                @if ($errors->has('No_hp'))
                    <span class="invalid feedback" role="alert">
                        <small class="text-danger">{{ $errors->first('No_hp') }}.</small>
                    </span>
                @endif
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-outline-primary mt-3 text-end" data-bs-toggle="modal" data-bs-target="#modalId">
                  Simpan
                </button>
              </div>
        </form>
    </div>
@endsection