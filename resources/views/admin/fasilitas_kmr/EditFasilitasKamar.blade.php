@extends('layouts.template')
@section('title','Edit Fasilitas')
@section('content')
<div class="col md-8">
    <div class="card border-left-primary shadow">
        <div class="card-header"><h2>Edit Fasilitas Kamar</h2></div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.updateFasilitasKamar', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="barang">{{ __('Nama Fasilitas Tambahan') }}</label>
                    <input id="barang" type="text" class="form-control" name="barang" value="{{ $data->barang }}" required autocomplete="barang">

                    @error('barang')
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
