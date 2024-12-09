<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <h1>Halo, {{ Auth::user()->name }}</h1>

                    @can('manage book data')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mt-5">
                                    <div class="card-header">
                                        Jumlah User
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ Auth::user()->count() }}</h5>
                                        <p class="card-text mb-3">Klik tombol lihat untuk melihat seluruh data user yang ada
                                        </p>
                                        <a href="{{ route('dashboard.users') }}" class="btn btn-primary">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mt-5">
                                    <div class="card-header">
                                        Jumlah Buku
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $books->count() }}</h5>

                                        <p class="card-text mb-3">Klik tombol lihat untuk melihat seluruh data buku yang ada
                                        </p>
                                        <a href="{{ route('dashboard.books') }}" class="btn btn-primary">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
