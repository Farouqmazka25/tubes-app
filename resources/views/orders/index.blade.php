@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Riwayat Pemesanan</h2>

    @if($orders->isEmpty())
        <div class="alert alert-info">Anda belum memiliki pesanan.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Jumlah Item</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>
    {{ $order->created_at ? $order->created_at->format('d M Y, H:i') : '-' }}
</td>
                            <td>{{ $order->items_count }}</td>
                            <td>{{ ucfirst(strtolower($order->status)) }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">Lihat Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
