@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Detail Transaksi #{{ $penjualan->id }}</h2>

    <p><strong>Tanggal:</strong> {{ $penjualan->tanggal_penjualan }}</p>
    <p><strong>Status:</strong> {{ $penjualan->status_pesanan }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</p>

    <h4 class="mt-4">Produk yang Dibeli</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualan->detail as $d)
                <tr>
                    <td>{{ $d->produk->nama }}</td>
                    <td>Rp {{ number_format($d->harga_saat_itu, 0, ',', '.') }}</td>
                    <td>{{ $d->jumlah }}</td>
                    <td>Rp {{ number_format($d->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('pelanggan.riwayat') }}" class="btn btn-secondary mt-3">
        Kembali ke Riwayat
    </a>

</div>
@endsection
