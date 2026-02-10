@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Riwayat Belanja Anda</h2>

    @if ($riwayat->isEmpty())
        <p>Belum ada transaksi.</p>
    @else

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($riwayat as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->tanggal_penjualan }}</td>
                    <td>Rp {{ number_format($r->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $r->status_pesanan }}</td>
                    <td>
                        <a href="{{ route('pelanggan.riwayat.show', $r->id) }}"
                           class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @endif
</div>
@endsection
