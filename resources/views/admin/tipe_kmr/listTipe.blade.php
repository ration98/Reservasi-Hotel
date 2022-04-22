@extends('layouts.template')
@section('title', 'List Tipe Kamar')
@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header">
            <h2>List Tipe Kamar</h2>
            <a href="{{ route('admin.addTipe') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data1">
                    <thead>
                        <tr class="text-center">
                            <th>NAMA</th>
                            <th>FASILITAS</th>
                            <th>FOTO</th>
                            <th>HARGA</th>
                            <th>INFORMASI</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                        <tr class="text-center">
                            <td>{{ $dt->nama }}</td>
                            <td>{{ $dt->fasilitas }}</td>
                            <td width="30%">
                                <a href="{{ asset('foto/'. $dt->foto) }}" target="_blank" rel="noopener noreferrer">Lihat Gambar</a>
                            </td>
                            <td>{{ $dt->harga }}</td>
                            <td>{{$dt->informasi}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.editTipe', $dt->id) }}">Edit</a>
                                <a class="btn btn-secondary" href="{{ route('admin.hapusTipe', $dt->id) }}">Hapus</a>
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
