@extends('layouts.template')
@section('title','Tambah Fasilitas')
@section('content')
<div class="col md-8">
    <div class="card border-left-primary shadow">
        <div class="card-header"><h2>Edit Fasilitas Umum</h2></div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.updateFasilitas', $data->id) }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="namaFasilitas">{{ __('Nama Fasilitas') }}</label>
                    <input id="namaFasilitas" type="text" class="form-control" name="namaFasilitas" value="{{ $data->namaFasilitas }}" required autocomplete="namaFasilitas">

                    @error('namaFasilitas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="info">{{ __('Info') }}</label>
                   <input type="text" id="info" class="form-control" name="info" value="{{ $data->info }}" required autocomplete="info">

                    @error('info')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
