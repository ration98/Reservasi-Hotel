@extends('layouts.template')
@section('title', 'List Fasilitas Kamar')
@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header">
            <h2>List Fasilitas Kamar</h2>
            <a href="{{ route('admin.addFasilitasKamar') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data1">
                    <thead>
                        <tr class="text-center">
                            <th>NAMA FASILITAS TAMBAHAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr class="text-center">
                                <td>{{ $dt->barang }}</td>
                                <td>{{ $dt->aksi }}
                                    <a class="btn btn-warning" href="{{ route('admin.editFasilitasKamar', $dt->id) }}">Edit</a>
                                    <a class="btn btn-secondary" href="{{ route('admin.hapusFasilitasKamar', $dt->id) }}">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
