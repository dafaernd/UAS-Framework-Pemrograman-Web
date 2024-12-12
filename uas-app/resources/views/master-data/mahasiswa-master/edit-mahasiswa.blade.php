<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">
                        <h2 class="mb-5 text-2xl font-bold">Update Mahasiswa</h2>
                        <x-auth-session-status class="mb-4" :status="session('success')" />

                        @if ($errors->any())
                            <div class="mb-5 text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('mahasiswa-update', $mahasiswa->id) }}" method="POST"
                            class="p-6 bg-white rounded shadow-md">
                            @csrf
                            @method('PUT')


                            <div class="mb-4">
                                <label for="npm" class="block font-medium text-gray-700">NPM Mahasiswa:</label>
                                <input type="text" id="npm" name="npm"
                                    value="{{ old('npm', $mahasiswa->npm) }}" required
                                    class="w-full p-2 mt-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="mb-4">
                                <label for="nama" class="block font-medium text-gray-700">Nama Mahasiswa:</label>
                                <input type="text" id="nama" name="nama"
                                    value="{{ old('nama', $mahasiswa->nama) }}" required
                                    class="w-full p-2 mt-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="mb-4">
                                <label for="prodi" class="block font-medium text-gray-700">Prodi Mahasiswa:</label>
                                <input type="text" id="prodi" name="prodi"
                                    value="{{ old('prodi', $mahasiswa->prodi) }}" required
                                    class="w-full p-2 mt-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 text-white bg-indigo-500 rounded hover:bg-indigo-600 focus:ring-2 focus:ring-indigo-500">Update
                                    Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
