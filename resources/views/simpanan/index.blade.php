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
                        <th>Nominal</th>
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
                            <button class="btn btn-danger" onclick="deleteSimpanan({{ $simpanan->id }})">Hapus</button>
                            <form id="delete-form-{{ $simpanan->id }}" action="{{ route('simpanan.destroy', $simpanan->id) }}" method="post" style="display: none;">
                                @csrf
                                @method('delete')
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

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteSimpanan(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
        });
    @endif
</script>
@endsection