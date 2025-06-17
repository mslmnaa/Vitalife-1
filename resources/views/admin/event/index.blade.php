@extends('layouts.admin')

@section('judul-halaman', 'Daftar Event')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Daftar Event</h2>
        <a href="{{ route('admin.event.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Event
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Event Name</th>
                        <th class="py-2 px-4 border-b text-left">Description</th>
                        <th class="py-2 px-4 border-b text-left">Address</th>
                        <th class="py-2 px-4 border-b text-left">Date</th>
                        <th class="py-2 px-4 border-b text-left">Price</th>
                        <th class="py-2 px-4 border-b text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($events as $event)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $event->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ Str::limit($event->deskripsi, 50) }}</td>
                            <td class="py-2 px-4 border-b">{{ $event->alamat }}</td>
                            <td class="px-4 py-4 text-sm text-gray-700">
                                {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-700">
                                Rp {{ number_format($event->harga, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-4 text-sm font-medium">
                                <a href="{{ route('admin.event.edit', ['id_event' => $event->id_event]) }}"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                <form action="{{ route('admin.event.destroy', ['id_event' => $event->id_event]) }}"
                                    method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-900"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 px-4 text-center text-gray-500">Tidak ada data event.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
