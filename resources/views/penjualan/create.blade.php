@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Transaksi Penjualan</h2>

    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Pelanggan (opsional)</label>
            <select name="pelanggan_id" class="form-control">
                <option value="">Umum / Tidak Dikenal</option>
                @foreach ($pelanggan as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="produk-list">
            <div class="row mb-2">
                <div class="col">
                    <select name="produk_id[]" class="form-control" required>
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($produk as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }} (Rp {{ $p->harga }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required>
                </div>
            </div>
        </div>

        <button type="button" onclick="addRow()" class="btn btn-secondary mb-3">
            + Tambah Produk
        </button>

        <button class="btn btn-primary">Simpan Transaksi</button>
    </form>
</div>

<script>
function addRow() {
    let row = `
    <div class="row mb-2">
        <div class="col">
            <select name="produk_id[]" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($produk as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }} (Rp {{ $p->harga }})</option>
                @endforeach
            </select>
        </div>

        <div class="col">
            <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required>
        </div>
    </div>
    `;
    
    document.getElementById('produk-list').insertAdjacentHTML('beforeend', row);
}
</script>
@endsection
