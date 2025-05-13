@extends('layouts.admin.app')

@section('content')
<h4>Tambah Produk</h4>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="name" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" name="description" rows="3" required></textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Harga</label>
        <input type="number" class="form-control" name="price" required>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" class="form-control" name="stock" required>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Gambar Produk (opsional)</label>
        <input type="file" class="form-control" name="image" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Produk</button>
</form>
@endsection
    