<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Sekolah')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-blue-600 text-white font-bold text-lg">S</span>
                        <span class="text-xl font-extrabold text-gray-900">Sekolah<span class="text-blue-600">Kita</span></span>
                    </a>
                </div>

                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">Beranda</a>
                    <a href="#berita" class="text-gray-700 hover:text-blue-600 font-medium transition">Berita</a>
                    <a href="#profil" class="text-gray-700 hover:text-blue-600 font-medium transition">Profil</a>
                    <a href="{{ route('ppdb.create') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">PPDB</a>
                    <a href="#kontak" class="text-gray-700 hover:text-blue-600 font-medium transition">Kontak</a>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700 transition">Login</a>
                    <button type="button" id="mobile-menu-button" class="md:hidden rounded-lg p-2 text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-600" aria-label="Buka menu">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600">Beranda</a>
                <a href="#berita" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600">Berita</a>
                <a href="#profil" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600">Profil</a>
                <a href="{{ route('ppdb.create') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600">PPDB</a>
                <a href="#kontak" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600">Kontak</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-blue-600 hover:bg-blue-700">Login</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer id="kontak" class="bg-gray-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid gap-8 md:grid-cols-3">
            <div>
                <h3 class="text-white font-bold text-lg mb-3">SekolahKita</h3>
                <p class="text-sm leading-relaxed">Jl. Pendidikan No. 1, Kota Contoh, Indonesia 12345</p>
                <p class="text-sm mt-2">Telp/WA: (021) 1234-5678</p>
                <p class="text-sm">Email: info@sekolahkita.sch.id</p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Navigasi Cepat</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a></li>
                    <li><a href="{{ route('ppdb.create') }}" class="hover:text-blue-400 transition">Pendaftaran PPDB</a></li>
                    <li><a href="#berita" class="hover:text-blue-400 transition">Berita</a></li>
                    <li><a href="#profil" class="hover:text-blue-400 transition">Profil Sekolah</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Jam Operasional</h4>
                <p class="text-sm">Senin - Jumat: 07.00 - 15.00 WIB</p>
                <p class="text-sm mt-2">Sabtu: 07.00 - 12.00 WIB</p>
            </div>
        </div>
        <div class="border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 py-4 text-center text-sm">
                &copy; {{ date('Y') }} SekolahKita. Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
