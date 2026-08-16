@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
                    <p class="mt-1 text-gray-500">Ringkasan data SekolahKita</p>
                </div>
                <a href="{{ route('home') }}" class="rounded-lg bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-200 transition">Lihat Website</a>
            </div>

            <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-600">
                    <div class="text-sm font-medium text-gray-500">Total Pendaftar PPDB</div>
                    <div class="mt-2 text-3xl font-extrabold text-gray-900">{{ $totalRegistrations }}</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-600">
                    <div class="text-sm font-medium text-gray-500">Total Berita</div>
                    <div class="mt-2 text-3xl font-extrabold text-gray-900">{{ $totalPosts }}</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 border-l-4 border-amber-500">
                    <div class="text-sm font-medium text-gray-500">Total Guru</div>
                    <div class="mt-2 text-3xl font-extrabold text-gray-900">{{ $totalTeachers }}</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 border-l-4 border-purple-600">
                    <div class="text-sm font-medium text-gray-500">Total Siswa</div>
                    <div class="mt-2 text-3xl font-extrabold text-gray-900">{{ $totalStudents }}</div>
                </div>
            </div>

            <div class="mt-8 bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900">Pendaftar Terbaru</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">No. Pendaftaran</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Asal Sekolah</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($recentRegistrations as $registration)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $registration->registration_number }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $registration->full_name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $registration->previous_school }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="inline-block rounded-full px-3 py-1 text-xs font-semibold {{ $registration->status === 'pending' ? 'bg-amber-100 text-amber-700' : 'bg-green-100 text-green-700' }}">{{ $registration->status }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-sm text-gray-500">Belum ada pendaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
