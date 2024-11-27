<!-- resources/views/farm_groups/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Kelompok Tani</h1>
        <a href="{{ route('farm_groups.create') }}" class="btn btn-primary">Tambah Kelompok Tani</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Kontak Person</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($farmGroups as $farmGroup)
                    <tr>
                        <td>{{ $farmGroup->name }}</td>
                        <td>{{ $farmGroup->location }}</td>
                        <td>{{ $farmGroup->contact_person }}</td>
                        <td>
                            <a href="{{ route('farm_groups.edit', $farmGroup->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('farm_groups.destroy', $farmGroup->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}
        </table>
    </div>
@endsection
