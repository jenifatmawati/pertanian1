<!-- resources/views/farmers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Petani</h1>
        <a href="{{ route('farmers.create') }}" class="btn btn-primary">Tambah Petani</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Kelompok Tani</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($farmers as $farmer)
                    <tr>
                        <td>{{ $farmer->name }}</td>
                        <td>{{ $farmer->address }}</td>
                        <td>{{ $farmer->farmGroup->name }}</td>
                        <td>
                            <a href="{{ route('farmers.edit', $farmer->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('farmers.destroy', $farmer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
