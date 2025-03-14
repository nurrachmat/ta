@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Simpanan</h1>
            <a href="{{ route('simpanan.create') }}" class="btn btn-primary">Tambah Simpanan</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User ID</th>
                        <th>Jenis Simpanan ID</th>
                        <th>Nominal</th> <!-- Tambahkan kolom ini -->
                        <th>Tanggal Simpan</th>
                        <th>Admin ID</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($simpanans as $key => $simpanan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $simpanan->user->name }}</td>
                        <td>{{ $simpanan->jenisSimpanan->nama_jenis_simpanan }}</td>
                        <td>{{ $simpanan->jenisSimpanan->nominal }}</td>
                        <td>{{ $simpanan->tanggal_simpan }}</td>
                        <td>{{ $simpanan->admin->name }}</td>
                        <td>
                            <a href="{{ route('simpanan.edit', $simpanan->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('simpanan.destroy', $simpanan->id) }}" method="post" style="display: inline;">
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
</div>
@endsection