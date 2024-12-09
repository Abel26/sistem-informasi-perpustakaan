<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Baca Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <iframe src="{{ asset('storage/buku/' . $book->file_path) }}" width="100%" height="800px"></iframe>
            </div>
            <div>
                <a href="{{ route('siswa.index') }}" class="btn btn-primary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>
