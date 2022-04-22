@extends('layouts.template')
@section('title', 'List Kamar')
@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header">
            <h2>List Tipe Kamar</h2>
            <a href="{{ route('admin.addKamar') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data1">
                    <thead>
                        <tr class="text-center">
                            <th>TIPE</th>
                            <th>NO KAMAR</th>
                            <th>STATUS KAMAR</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                        <tr class="text-center">
                            <td>{{ $dt->id_tipe }}</td>
                            <td>{{ $dt->nomor }}</td>
                            <td>{{ $dt->status }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.editKamar', $dt->id) }}">Edit</a>
                                <a class="btn btn-secondary" href="{{ route('admin.hapusKamar', $dt->id) }}">Hapus</a>
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
