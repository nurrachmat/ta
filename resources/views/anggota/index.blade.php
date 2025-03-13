@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Anggota</h1>
            <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>HP</th>
                        <th>TMT</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->alamat }}</td>
                        <td>{{ $value->hp }}</td>
                        <td>{{ $value->tmt }}</td>
                        <td>{{ $value->status }}</td>
                        <td>
                            <a href="{{ route('anggota.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('anggota.destroy', $value->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection