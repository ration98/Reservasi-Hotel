@extends('layouts.template')
@section('title','Tambah Fasilitas Kamar')
@section('content')
<div class="col md-8">
    <div class="card border-left-primary shadow">
        <div class="card-header"><h2>Tambah Fasilitas Kamar</h2></div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.FasilitasKamarStore') }}" enctype="multipart/form-data">
                @csrf
                @method('post')

                    <div class="form-group">
                        <label for="barang">{{ __('Nama Fasilitas') }}</label>
                        <input id="barang" type="text" class="form-control" name="barang" value="{{ old('barang') }}" required autocomplete="barang" autofocus>
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
