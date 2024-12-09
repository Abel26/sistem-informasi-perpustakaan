@extends('../layouts.master')
@section('content')

    <body>
        <div class="main">
            <!-- Sign in form -->
            <section class="signin">
                <div class="container">
                    <div class="signin-content">
                        <div class="signin-form">
                            <h2 class="form-title">Sign Up</h2>
                            <form action="{{ route('register') }}" method="POST" class="login-form" id="login-form">
                                @csrf
                                <!-- NISN -->
                                <div class="form-group">
                                    <label for="nisn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                                            <path
                                                d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75z" />
                                        </svg>


                                    </label>
                                    <input type="text" name="nisn" id="nisn" placeholder="Your NISN"
                                        value="{{ old('nisn') }}" required autocomplete="nisn" />
                                </div>

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                        </svg>
                                    </label>
                                    <input type="text" name="name" id="name" placeholder="Your Name"
                                        value="{{ old('name') }}" required autocomplete="name" />
                                </div>

                                <!-- Kelas -->
                                <div class="form-group1">
                                    <label for="kelas">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-layers" viewBox="0 0 16 16">
                                            <path
                                                d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882zm3.515 7.008L14.438 10 8 13.433 1.562 10 4.25 8.567l3.515 1.874a.5.5 0 0 0 .47 0zM8 9.433 1.562 6 8 2.567 14.438 6z" />
                                        </svg>
                                    </label>
                                    <select id="kelas" name="kelas" required>
                                        <option>Your Class</option>
                                        <option value="x" {{ old('x') == 'x' ? 'selected' : '' }}>Kelas X</option>
                                        <option value="xi" {{ old('xi') == 'xi' ? 'selected' : '' }}>Kelas XI</option>
                                        <option value="xii" {{ old('xii') == 'xii' ? 'selected' : '' }}>Kelas XII
                                        </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
                                </div>

                                <!-- Status -->
                                <div class="form-group1">
                                    <label for="status">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path
                                                d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                                        </svg>
                                    </label>
                                    <select id="status" name="status" required>
                                        <option>Your Status</option>
                                        <option value="siswa" {{ old('status') == 'siswa' ? 'selected' : '' }}>Siswa
                                        </option>
                                        <option value="alumni" {{ old('status') == 'alumni' ? 'selected' : '' }}>Alumni
                                        </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>

                                <!-- email -->
                                <div class="form-group">
                                    <label for="email">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                        </svg>
                                    </label>
                                    <input type="email" name="email" id="email" placeholder="Your Email"
                                        value="{{ old('email') }}" required autocomplete="email" />
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                            <path
                                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
                                        </svg>
                                    </label>
                                    <input type="password" name="password" id="password" placeholder="Password" required
                                        autocomplete="current-password" />
                                </div>

                                <!-- Confirmation Password -->
                                <div class="form-group">
                                    <label for="password_confirmation">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                            <path
                                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
                                        </svg>
                                    </label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        placeholder="Confirmation Password" required autocomplete="current-password" />
                                </div>

                                <!-- Login Button -->
                                <div class="form-group form-button">
                                    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                                </div>
                            </form>
                        </div>

                        <!-- Sign Up Image -->
                        <div class="signin-image">
                            <figure><img src="{{ asset('assets/images/signin-image.jpg') }}" alt="sign up image">
                            </figure>
                            <a href="{{ route('login') }}" class="signup-image-link">Already Registered?</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- JS -->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
@endsection
