@extends('../layouts.master')
@section('content')

    <body>
        <div class="main">
            <!-- Sign in form -->
            <section class="signin">
                <div class="container">
                    <div class="signin-content">
                        <div class="signin-form">
                            <h2 class="form-title">Sign in</h2>
                            <form action="{{ route('login') }}" method="POST" class="login-form" id="login-form">
                                @csrf
                                <!-- Email Address -->
                                <div class="form-group">
                                    <label for="email">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                        </svg>
                                    </label>
                                    <input type="email" name="email" id="email" placeholder="Your Email"
                                        value="{{ old('email') }}" required autocomplete="username" />
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

                                <!-- Login Button -->
                                <div class="form-group form-button">
                                    <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                                </div>
                            </form>
                        </div>

                        <!-- Sign Up Image -->
                        <div class="signin-image">
                            <figure><img src="{{ asset('assets/images/signup-image.jpg') }}" alt="sign up image"></figure>
                            <a href="{{ route('register') }}" class="signup-image-link">I am already member</a>
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
