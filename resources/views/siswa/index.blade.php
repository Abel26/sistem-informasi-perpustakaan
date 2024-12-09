<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <div class="p-6 text-gray-900">
                        <div class="row">
                            @foreach ($books as $book)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ asset('storage/covers/' . $book->cover) }}" class="card-img-top"
                                        alt="Cover Buku" style="height: 250px; object-fit: cover;">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $book->title }}</h5>
                                        <p class="card-text text-muted">{{ Str::limit($book->deskripsi, 100) }}</p>
                                        <p class="card-text"><small class="text-muted">Penulis: {{ $book->author }}</small></p>
                                        <div class="mt-auto">
                                            <a href="{{ route('siswa.read', $book->id) }}" class="btn btn-sm btn-primary me-2">Baca</a>
                                            <a href="{{ route('siswa.download', $book->id) }}" class="btn btn-sm btn-primary me-2">Unduh</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
