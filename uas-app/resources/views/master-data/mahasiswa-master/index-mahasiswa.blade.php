<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="container p-4 mx-auto">f
        <div class="overflow-x-auto">

            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-50 p-4 text-green-500">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-red-500">
                    {{ session('error') }}
                </div>
            @endif

            <a href="{{ route('mahasiswa-create') }}">
                <button
                    class="px-6 py-4 text-white bg-green-500 border border-green-500 rounded-lg shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Add mahasiswa data
                </button>
            </a>
            <table class="min-w-full border border-collapse border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">ID</th>
                        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">NPM Mahasiswa</th>
                        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Nama Mahasiswa</th>
                        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Prodi Mahasiswa</th>
                        <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $item)
                        <tr class="bg-white">
                            <td class="px-4 py-2 border border-gray-200">{{ $item->id }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $item->npm }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $item->nama }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $item->prodi }}</td>
                            <td class="px-4 py-2 border border-gray-200">
                                <a href="{{ route('mahasiswa-edit', $item->id) }}"
                                    class="px-2 text-blue-600 hover:text-blue-800">Edit </a>
                                <button class="px-2 text-red-600 hover:text-red-800"
                                     onclick="confirmDelete('{{ route('mahasiswa-deleted', $item->id) }}')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach


                    <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>


    <script>
        function confirmDelete(deleteUrl) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                // Jika user mengonfirmasi, kita dapat membuat form dan mengirimkan permintaan delete
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;

                // Tambahkan CSRF token
                let csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);

                // Tambahkan method spoofing untuk DELETE (karena HTML form hanya mendukung GET dan POST)
                let methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                // Tambahkan form ke body dan submit
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>




</x-app-layout>
