@extends('layouts.template')
@section('title','Edit Kamar')
@section('content')
<div class="col md-8">
    <div class="card border-left-primary shadow">
        <div class="card-header"><h2>Edit Kamar</h2></div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.updateKamar', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                    <div class="form-group">
                        <label for="id_tipe">{{ __('Tipe Kamar') }}</label>
                        <select name="id_tipe" id="id_tipe" class="form-control" value="{{ $data->id_tipe }}" required autocomplete="id_tipe" autofocus>
                            <option disabled selected>Select Type of Room...</option>
                            @foreach ($tipeKamar as $dt)
                                <option {{ ($dt->id == $data->id_tipe) ? 'selected' : '' }} value="{{ $dt->id }}">{{ $dt->nama }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nomor">{{ __('Nomor Kamar') }}</label>
                            <input id="nomor" type="number" class="form-control" name="nomor" value="{{ $data->nomor }}" required autocomplete="nomor" autofocus>
                            @error('nomor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="status">{{ __('Status Kamar') }}</label>
                            <input id="status" type="text" class="form-control" name="status" value="{{ $data->status }}" required autocomplete="status" autofocus>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                <button type="submit" class="btn btn-primary float-right">
                    <i class=""></i>
                    Tambahkan
                </button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
