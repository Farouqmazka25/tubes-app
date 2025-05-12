@extends('layouts.admin.app')

@section('content')
    <h4>Daftar Pesanan</h4>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Status</th>
                <th>Total</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? '-' }}</td>
                    <td>{{ $order->status }}</td>
                    <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                    <td>{{ $order->created_at ? $order->created_at->format('d M Y H:i') : '-' }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
