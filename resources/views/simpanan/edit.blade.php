@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Edit Simpanan</h1>
            <form action="{{ route('simpanan.update', $simpanan->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $simpanan->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_simpanan_id">Jenis Simpanan</label>
                    <select name="jenis_simpanan_id" id="jenis_simpanan_id" class="form-control" required>
                        @foreach($jenis_simpanans as $jenis_simpanan)
                            <option value="{{ $jenis_simpanan->id }}" {{ $simpanan->jenis_simpanan_id == $jenis_simpanan->id ? 'selected' : '' }}>{{ $jenis_simpanan->nama_jenis_simpanan }} - {{ $jenis_simpanan->nominal }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_simpan">Tanggal Simpan</label>
                    <input type="date" name="tanggal_simpan" id="tanggal_simpan" class="form-control" value="{{ $simpanan->tanggal_simpan }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection