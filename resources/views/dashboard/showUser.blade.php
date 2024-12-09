<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1>Data User</h1>
                        <a href="{{ route('export-user') }}" class="btn btn-primary">Export Excel</a>
                    </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">KELAS</th>
                                <th scope="col">EMAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($users as $key => $user)
                                @if ($key > 0)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->nisn }}</td>
                                        <td>{{ $user->kelas }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
