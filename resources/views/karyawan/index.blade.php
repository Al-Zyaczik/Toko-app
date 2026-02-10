<x-app-layout>

    <div class="max-w-5xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Karyawan</h1>

            <a href="{{ route('karyawan.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                + Tambah Karyawan
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-xl p-6">

            <table class="min-w-full border">
                <thead>
                    <tr class="bg-gray-100 text-gray-600">
                        <th class="py-2 px-3 text-left">Nama</th>
                        <th class="py-2 px-3 text-left">Email</th>
                        <th class="py-2 px-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($karyawan as $k)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-3">{{ $k->name }}</td>
                        <td class="py-2 px-3">{{ $k->email }}</td>
                        <td class="py-2 px-3">
                            <div class="flex space-x-2">

                                <a href="{{ route('karyawan.edit', $k->id) }}"
                                   class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('karyawan.destroy', $k->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin mau hapus?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</x-app-layout>
