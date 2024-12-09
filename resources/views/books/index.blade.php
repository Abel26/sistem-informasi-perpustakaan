<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Data Buku</h1>
                    <div class="container">
                        <div class="d-flex justify-content-end mb-4">
                            <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="row">
                            @foreach ($books as $book)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 shadow-sm">
                                        <img src="{{ asset('storage/covers/' . $book->cover) }}" class="card-img-top"
                                            alt="Cover Buku" style="img-fluid">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $book->title }}</h5>
                                            <p class="card-text text-muted">{{ Str::limit($book->deskripsi, 100) }}</p>
                                            <p class="card-text"><small class="text-muted">Penulis: {{ $book->author }}</small></p>
                                            <div class="mt-3">
                                                <a href="{{ route('siswa.read', $book->id) }}" class="btn btn-sm btn-primary me-2">Baca</a>
                                                <a href="{{ route('books.edit', $book->id) }}"
                                                    class="btn btn-sm btn-warning me-2">Edit</a>
            
                                                <!-- DELETE FORM -->
                                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
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
