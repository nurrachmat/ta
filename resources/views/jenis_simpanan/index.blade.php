@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Jenis Simpanan</h1>
            <a href="{{ route('jenis_simpanan.create') }}" class="btn btn-primary">Tambah</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenis_simpanan as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->nama_jenis_simpanan }}</td>
                        <td>{{ $value->nominal }}</td>
                        <td>
                            <a href="{{ route('jenis_simpanan.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('jenis_simpanan.destroy', $value->id) }}" method="post" style="display: inline;">
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