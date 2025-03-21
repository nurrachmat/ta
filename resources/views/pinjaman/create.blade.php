@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Tambah Pinjaman</h1>
            <form action="{{ route('pinjaman.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                    <input type="number" name="jumlah_pinjaman" id="jumlah_pinjaman" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="jenis_pinjaman">Jenis Pinjaman</label>
                    <input type="text" name="jenis_pinjaman" id="jenis_pinjaman" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection