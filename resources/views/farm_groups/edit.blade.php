<!-- resources/views/farm_groups/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Kelompok Tani</h1>

        <form action="{{ route('farm_groups.update', $farmGroup->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kelompok Tani</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $farmGroup->name }}" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Lokasi</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $farmGroup->location }}" required>
            </div>
            <div class="mb-3">
                <label for="contact_person" class="form-label">Kontak Person</label>
                <input type="text" name="contact_person" id="contact_person" class="form-control" value="{{ $farmGroup->contact_person }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
