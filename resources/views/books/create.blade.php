<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container my-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h3 class="text-center mb-4">Tambah Data Buku</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <!-- Judul Field -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Buku</label>
                                    <input name="title" type="text" class="form-control" id="title"
                                        aria-describedby="title">
                                </div>

                                <!-- Deskripsi Field -->
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Buku</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5"></textarea>
                                </div>

                                <!-- Penulis Field -->
                                <div class="mb-3">
                                    <label for="author" class="form-label">Penulis Buku</label>
                                    <input name="author" type="text" class="form-control" id="author"
                                        aria-describedby="author">
                                </div>

                                <!-- Cover Field -->
                                <div class="mb-3">
                                    <label for="cover" class="form-label">Cover Buku</label>
                                    <input name="cover" type="file" class="form-control" id="cover"
                                        aria-describedby="cover">
                                </div>

                                <!-- Pdf Field -->
                                <div class="mb-3">
                                    <label for="file_path" class="form-label">File Buku</label>
                                    <input name="file_path" type="file" class="form-control" id="file_path"
                                        aria-describedby="file_path">
                                </div>

                                <!-- Category Buku Field -->
                                <div class="mb-3">
                                    <label for="kategori_buku" class="form-label">Kategori Buku</label>
                                    <select name="kategori_buku" id="">
                                        <option value="mapel">Mata Pelajaran</option>
                                        <option value="umum">Pengetahuan Umum</option>
                                    </select>
                                </div>

                                <!-- Category Kelas Field -->
                                <div class="mb-3">
                                    <label for="kategori_kelas" class="form-label">Kategori Kelas</label>
                                    <select name="kategori_kelas" id="">
                                        <option value="x">X</option>
                                        <option value="xi">XI</option>
                                        <option value="xii">XII</option>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success mx-2">Submit</button>
                                    <a href="{{ route('books.index') }}" class="btn btn-primary mx-2">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
