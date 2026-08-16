@extends('layouts.app')

@section('title', 'Pendaftaran PPDB')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">Pendaftaran Peserta Didik Baru</h1>
                <p class="mt-2 text-gray-500">Isi formulir berikut untuk mendaftar di SekolahKita</p>
            </div>

            @if (session('success'))
                <div class="mt-6 rounded-lg bg-green-50 border border-green-300 text-green-800 p-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-6 rounded-lg bg-red-50 border border-red-300 p-4">
                    <ul class="text-sm text-red-700 list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('ppdb.store') }}" class="mt-8 bg-white rounded-xl shadow p-8">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label for="full_name" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                        <input id="full_name" type="text" name="full_name" value="{{ old('full_name') }}" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('full_name') border-red-500 @enderror">
                        @error('full_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nisn" class="block text-sm font-semibold text-gray-700">NISN</label>
                        <input id="nisn" type="text" name="nisn" value="{{ old('nisn') }}" required class="mt-1 block w-full rounded-lg border-gray-300 focus:outline-none focus:ring-blue-500 @error("nisn") border-red-500 @enderror">
                        @error('nisn')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="previous_school" class="block text-sm font-semibold text-gray-700">Asal Sekolah</label>
                        <input id="previous_school" type="text" name="previous_school" value="{{ old('previous_school') }}" required class="mt-1 block w-full rounded-lg border-gray-300 focus:outline-none focus:ring-blue-500 @error("previous_school") border-red-500 @enderror">
                        @error('previous_school')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="parent_name" class="block text-sm font-semibold text-gray-700">Nama Orang Tua</label>
                        <input id="parent_name" type="text" name="parent_name" value="{{ old('parent_name') }}" required class="mt-1 block w-full rounded-lg border-gray-300 focus:outline-none focus:ring-blue-500 @error("parent_name") border-red-500 @enderror">
                        @error('parent_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700">Nomor Telepon/WhatsApp</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required placeholder="08xxxxxxxxxx" class="mt-1 block w-full rounded-lg border-gray-300 focus:outline-none focus:ring-blue-500 @error("phone") border-red-500 @enderror">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="w-full inline-flex justify-center items-center rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 transition">Daftar Sekarang</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
