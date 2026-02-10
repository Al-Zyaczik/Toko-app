<x-app-layout>

<div class="max-w-6xl mx-auto">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        {{-- FOTO PRODUK --}}
        <div>
            <img src="{{ asset('storage/'.$produk->foto) }}"
                 class="w-full h-96 object-cover rounded-2xl shadow">
        </div>

        {{-- DETAIL PRODUK --}}
        <div class="flex flex-col justify-center">

            <h1 class="text-4xl font-bold mb-3">{{ $produk->nama }}</h1>

            <p class="text-3xl text-green-600 font-semibold mb-4">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </p>

            <p class="text-gray-700 mb-6">
                Stok tersedia: <strong>{{ $produk->stok }}</strong>
            </p>

            {{-- BUTTON ADD TO CART --}}
            <form method="POST" action="#" class="space-y-4">
                @csrf

                <div>
                    <label class="font-semibold">Jumlah:</label>
                    <input type="number" name="jumlah" value="1" min="1"
                           class="w-24 p-2 border rounded-lg ml-2">
                </div>

                <button
                    type="button"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl text-lg hover:bg-blue-700 shadow">
                    Tambah ke Keranjang
                </button>
            </form>

        </div>

    </div>

    {{-- DESKRIPSI OPSIONAL --}}
    <div class="mt-10 bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-bold mb-3">Deskripsi Produk</h2>

        <p class="text-gray-700 leading-relaxed">
            {{ $produk->deskripsi ?? 'Belum ada deskripsi untuk produk ini.' }}
        </p>
    </div>

</div>

</x-app-layout>
