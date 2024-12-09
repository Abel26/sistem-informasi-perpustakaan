<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- NISN -->
        <div>
            <x-input-label for="nisn" :value="__('Nisn')" />
            <x-text-input id="nisn" class="block mt-1 w-full" type="text" name="nisn" :value="old('nisn')" required
                autofocus autocomplete="nisn" />
            <x-input-error :messages="$errors->get('nisn')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Kelas -->
        <div>
            <x-input-label for="kelas" :value="__('Kelas')" />
            <select id="kelas" name="kelas" class="block mt-1 w-full" required autofocus>
                <option value="x" {{ old('x') == 'x' ? 'selected' : '' }}>Kelas X</option>
                <option value="xi" {{ old('xi') == 'xi' ? 'selected' : '' }}>Kelas XI</option>
                <option value="xii" {{ old('xii') == 'kii' ? 'selected' : '' }}>Kelas XII</option>
            </select>
            <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="status" :value="__('Status')" />
            <select id="status" name="status" class="block mt-1 w-full" required autofocus>
                <option value="siswa" {{ old('siswa') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                <option value="alumni" {{ old('alumni') == 'alumni' ? 'selected' : '' }}>Alumni</option>
            </select>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>