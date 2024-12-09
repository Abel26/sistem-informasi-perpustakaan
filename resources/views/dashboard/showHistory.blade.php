<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Data User</h1>
                    <div class="container">
                        <div class="row">
                            @if ($books->isEmpty())
                                <div class="alert alert-info" role="alert">
                                    Anda belum membaca buku apapun.
                                </div>
                            @else
                                @foreach ($books as $book)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img src="{{ asset('storage/book-covers/' . $book->cover_image) }}"
                                                class="card-img-top" alt="{{ $book->title }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $book->title }}</h5>
                                                <p class="card-text">Baca pada:
                                                    {{ $book->pivot->read_at->format('d M Y') }}</p>
                                                <a href="{{ route('books.show', $book->id) }}"
                                                    class="btn btn-primary">Lihat Detail Buku</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>


                    <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
