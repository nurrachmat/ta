@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Pinjaman</h1>
            <a href="{{ route('pinjaman.create') }}" class="btn btn-primary">Tambah Pinjaman</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Admin</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jenis Pinjaman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pinjamans as $key => $pinjaman)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pinjaman->user->name }}</td>
                        <td>{{ $pinjaman->admin->name }}</td>
                        <td>{{ $pinjaman->jumlah_pinjaman }}</td>
                        <td>{{ $pinjaman->tanggal_pinjam }}</td>
                        <td>{{ $pinjaman->jenis_pinjaman }}</td>
                        <td>
                            <a href="{{ route('pinjaman.edit', $pinjaman->id) }}" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger" onclick="deletePinjaman({{ $pinjaman->id }})">Hapus</button>
                            <form id="delete-form-{{ $pinjaman->id }}" action="{{ route('pinjaman.destroy', $pinjaman->id) }}" method="post" style="display: none;">
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
    function deletePinjaman(id) {
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