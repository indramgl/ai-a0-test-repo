@extends('layouts.app')

@section('title', 'Beranda | Website Sekolah')

@section('content')
    <!-- Hero Banner -->
    <section id="profil" class="relative bg-gradient-to-r from-blue-700 to-blue-500 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">Selamat Datang di SekolahKita</h1>
                <p class="mt-4 text-lg text-blue-100 leading-relaxed">Membangun generasi cerdas, berkarakter, dan berprestasi melalui pendidikan berkualitas yang menyenangkan dan bermakna.</p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('ppdb.create') }}" class="inline-flex items-center rounded-lg bg-white text-blue-700 px-6 py-3 font-semibold shadow hover:bg-blue-50 transition">Daftar PPDB</a>
                    <a href="#berita" class="inline-flex items-center rounded-lg border border-white/40 px-6 py-3 font-semibold hover:bg-white/10 transition">Lihat Berita</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-8 md:grid-cols-3 items-center">
            <div class="md:col-span-1">
                <div class="w-40 h-40 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-extrabold text-6xl">K</div>
            </div>
            <div class="md:col-span-2">
                <h2 class="text-2xl font-bold text-gray-900">Sambutan Kepala Sekolah</h2>
                <p class="mt-4 text-gray-600 leading-relaxed">Assalamualaikum wr. wb. Puji syukur kami panjatkan kehadirat Tuhan Yang Maha Esa atas rahmat-Nya website SekolahKita dapat hadir sebagai media informasi, komunikasi, dan layanan publik bagi seluruh warga sekolah dan masyarakat. Melalui website ini kami berkomitmen menghadirkan layanan pendidikan yang transparan dan mudah diakses. Selamat bergabung dengan keluarga besar SekolahKita.</p>
                <p class="mt-4 font-semibold text-gray-900">Drs. Ahmad Fauzi, M.Pd.</p>
            </div>
        </div>
    </section>

    <!-- Artikel Terbaru -->
    <section id="berita" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">Berita Terbaru</h2>
                <p class="mt-2 text-gray-500">Informasi terbaru seputar SekolahKita</p>
            </div>
            <div class="mt-10 grid gap-8 md:grid-cols-3">
                @forelse ($posts as $post)
                    <article class="bg-white rounded-xl shadow overflow-hidden hover:shadow-lg transition">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-4xl font-bold">S</div>
                        @endif
                        <div class="p-6">
                            <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $post->category }}</span>
                            <h3 class="mt-3 text-lg font-bold text-gray-900">{{ $post->title }}</h3>
                            <p class="mt-2 text-sm text-gray-500 line-clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}</p>
                        </div>
                    </article>
                @empty
                    <p class="md:col-span-3 text-gray-500">Belum ada berita.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Statistik -->
    <section class="py-16 bg-blue-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-8 md:grid-cols-3 text-center">
            <div>
                <div class="text-4xl font-extrabold">{{ $stats['students'] ?? 0 }}</div>
                <div class="mt-1 text-sm font-medium text-blue-200">Siswa</div>
            </div>
            <div>
                <div class="text-4xl font-extrabold">{{ $stats['teachers'] ?? 0 }}</div>
                <div class="mt-1 text-sm font-medium text-blue-200">Guru</div>
            </div>
            <div>
                <div class="text-4xl font-extrabold">{{ $stats['registrations'] ?? 0 }}</div>
                <div class="mt-1 text-sm font-medium text-blue-200">Pendaftar PPDB</div>
            </div>
        </div>
    </section>
@endsection
