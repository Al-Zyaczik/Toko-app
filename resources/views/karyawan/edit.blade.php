<x-app-layout>

    <div class="max-w-md mx-auto">

        <h1 class="text-2xl font-bold mb-6">Edit Karyawan</h1>

        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST"
              class="bg-white p-6 shadow rounded-xl">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="font-semibold">Nama</label>
                <input type="text" name="name" value="{{ $karyawan->name }}"
                       class="w-full border rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label class="font-semibold">Email</label>
                <input type="email" name="email" value="{{ $karyawan->email }}"
                       class="w-full border rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label class="font-semibold">Password Baru (opsional)</label>
                <input type="password" name="password"
                       class="w-full border rounded-lg p-2">
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update
            </button>
        </form>

    </div>

</x-app-layout>
