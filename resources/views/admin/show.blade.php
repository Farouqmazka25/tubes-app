@extends('layouts.admin.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Detail Pesanan</h2>

    <div class="mb-4">
        <p><strong>Nama User:</strong> {{ $order->user->name ?? '-' }}</p>
        <p><strong>Status Saat Ini:</strong> {{ $order->status }}</p>
        <p><strong>Total Harga:</strong> Rp{{ number_format($order->total, 0, ',', '.') }}</p>
      <p><strong>Dibuat:</strong> {{ $order->created_at ? $order->created_at->format('d M Y H:i') : '-' }}</p>
        <p><strong>Nomor Resi:</strong> {{ $order->tracking_number ?? '-' }}</p>
    </div>

    <hr class="my-4">

   <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PATCH')

        <div>
            <label for="status" class="block font-medium text-sm text-gray-700">Status Pesanan</label>
            <select name="status" id="status" class="form-select mt-1 block w-full border border-gray-300 rounded p-2">
                <option value="MENUNGGU" {{ $order->status == 'MENUNGGU' ? 'selected' : '' }}>MENUNGGU</option>
                <option value="DIPROSES" {{ $order->status == 'DIPROSES' ? 'selected' : '' }}>DIPROSES</option>
                <option value="TERKIRIM" {{ $order->status == 'TERKIRIM' ? 'selected' : '' }}>TERKIRIM</option>
            </select>
        </div>

        <div>
            <label for="tracking_number" class="block font-medium text-sm text-gray-700">Nomor Resi (Jika Terkirim)</label>
            <input type="text" name="tracking_number" id="tracking_number"
                   value="{{ $order->tracking_number }}"
                   class="form-input mt-1 block w-full border border-gray-300 rounded p-2">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
