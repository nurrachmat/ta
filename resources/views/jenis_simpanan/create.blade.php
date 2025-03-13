@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Tambah Jenis Simpanan</h1>
            <form action="{{ route('jenis_simpanan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_jenis_simpanan">Nama Jenis Simpanan</label>
                    <input type="text" name="nama_jenis_simpanan" id="nama_jenis_simpanan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="number" name="nominal" id="nominal" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection