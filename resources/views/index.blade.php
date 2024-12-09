<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platform E-Book</title>

    <style>
        /* General styling for the container */
        .feature-container {
            background-image: url('buku.jpg');
            /* Path to the background image */
            background-size: cover;
            background-position: center;
            height: 300px;
            /* Adjust height as needed */
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            /* Text color for contrast */
        }

        /* Style for the button */
        .feature-button {
            background-color: #ffc107;
            border: none;
            padding: 10px 20px;
            color: #000;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Platform E-Book</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                </ul>
                @if (Route::has('login'))
                    <div class="ms-3">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-light me-2">Dashboard</a>
                        @else
                            <!-- Link atau Tombol Login -->
                            <button id="loginButton" class="btn btn-outline-light me-2">Login</button>

                            <!-- Link atau Tombol Register -->
                            <button id="registerButton" class="btn btn-outline-light me-2">Register</button>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center"
        style="background: url('{{ asset('assets/images/book2.jpg') }}') no-repeat center center/cover;">
        <div class="container text-center text-white">
            <h1 class="display-4 fw-bold">Temukan Berbagai E-Book Menarik di Sini</h1>
            <p class="lead">Platform kami memberikan akses bagi siswa dan admin untuk membaca dan mengunduh e-book
                dengan mudah dan gratis.</p>
            <a href="#fitur" class="btn btn-warning btn-lg mt-3">Jelajahi Fitur</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="features py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Fitur Unggulan</h2>
            <div class="row text-center">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Fitur untuk Siswa</h5>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-book"></i> Baca buku kapan saja</li>
                                <li><i class="bi bi-download"></i> Unduh buku untuk akses offline</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Fitur untuk Admin</h5>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-pencil-square"></i> CRUD data buku</li>
                                <li><i class="bi bi-book"></i> Baca dan unduh buku</li>
                                <li><i class="bi bi-file-earmark-spreadsheet"></i> Export data pengguna ke Excel</li>
                                <li><i class="bi bi-file-earmark-spreadsheet"></i> Export data buku ke Excel</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="contact py-5 text-white" style="background-color: #333;">
        <div class="container text-center">
            <h2>Kontak</h2>
            <p>Hubungi kami melalui platform berikut:</p>
            <div class="d-flex justify-content-center mt-4">
                <a href="https://wa.me/08561310250" target="_blank" class="btn btn-outline-light me-3">
                    <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
                <a href="https://www.linkedin.com/in/abel-natanael-hutapea-13a750223/" target="_blank"
                    class="btn btn-outline-light me-3">
                    <i class="bi bi-linkedin"></i> LinkedIn
                </a>
                <a href="https://www.instagram.com/abelnata_?igshid=MXBqczRsNTFzZnh5cg==" target="_blank"
                    class="btn btn-outline-light">
                    <i class="bi bi-instagram"></i> Instagram
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-dark text-white py-3">
        <div class="container text-center">
            <p>&copy; 2024 Platform E-Book. Semua Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scroll for navbar links
        document.querySelectorAll('.navbar a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Menambahkan event listener untuk tombol Login
        document.getElementById('loginButton').addEventListener('click', function() {
            // Mengarahkan ke halaman login
            window.location.href = 'https://sistem-informasi-perpustakaan.test/login';
        });

        // Menambahkan event listener untuk tombol Register
        document.getElementById('registerButton').addEventListener('click', function() {
            // Mengarahkan ke halaman register
            window.location.href = 'https://sistem-informasi-perpustakaan.test/register';
        });
    </script>
</body>

</html>
