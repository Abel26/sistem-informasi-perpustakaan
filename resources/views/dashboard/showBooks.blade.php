<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1>Data Buku</h1>
                        <a href="{{ route('export-book') }}" class="btn btn-primary">Export Excel</a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Kategori Buku</th>
                                <th scope="col">Kategori Kelas</th>
                                <th scope="col">Cover</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($books as $book)
                          <tr>
                            <th scope="row">{{ $i++  }}</th>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->kategori_buku }}</td>
                            <td>{{ $book->kategori_kelas }}</td>
                            <td><img src="{{ asset('storage/covers/' . $book->cover) }}" alt="Cover Buku" style="height: 400px; object-fit: cover; width: 400px"></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                      <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
