@extends('layouts.admin.app')

@section('content')
    <h4>Daftar Pesanan</h4>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Status</th>
                <th>Tracking Number</th> 
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? '-' }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->tracking_number ?? '-' }}</td> {{-- Tambahan --}}
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
