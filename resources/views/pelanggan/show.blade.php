<x-app-layout>

<div class="max-w-4xl mx-auto">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- FOTO --}}
        <img src="{{ asset('storage/'.$produk->foto) }}"
             class="rounded-xl shadow w-full h-80 object-cover">

        {{-- DETAIL --}}
        <div>

            <h1 class="text-3xl font-bold">{{ $produk->nama }}</h1>

            <p class="text-2xl text-green-600 font-semibold mt-2">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </p>

            <p class="mt-3 text-gray-700">
                Stok tersedia: {{ $produk->stok }}
            </p>

            <form action="#" method="POST" class="mt-6">
                @csrf

                <input type="number" name="jumlah"
                       class="w-20 p-2 border rounded-lg"
                       placeholder="1" min="1">

                <button type="button"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Tambah ke Keranjang
                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>
