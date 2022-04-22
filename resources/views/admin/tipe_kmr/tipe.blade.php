@extends('layouts.template')
@section('title','Tambah Tipe Kamar')
@section('content')
<div class="col md-8">
    <div class="card border-left-primary shadow">
        <div class="card-header"><h2>Tambah Tipe Kamar</h2></div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.tipeStore') }}" enctype="multipart/form-data">
                @csrf
                @method('post')

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">{{ __('Nama Tipe Kamar') }}</label>
                        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fasilitas">{{ __('Fasilitas') }}</label>
                        <input id="fasilitas" type="text" class="form-control" name="fasilitas" value="{{ old('fasilitas') }}" required autocomplete="fasilitas" autofocus>

                        @error('fasilitas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="foto">{{ __('Foto') }}</label>
                    <input id="foto" type="file" class="form-control" name="foto" value="{{ old('foto') }}" required autocomplete="foto" autofocus>

                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="harga">{{ __('Harga') }}</label>
                        <input id="harga" type="number" class="form-control" name="harga" value="{{ old('harga') }}" required autocomplete="harga" autofocus>

                        @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="informasi">{{ __('Informasi') }}</label>
                        <input id="informasi" type="text" class="form-control" name="informasi" value="{{ old('informasi') }}" required autocomplete="informasi" autofocus>

                        @error('informasi')
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


