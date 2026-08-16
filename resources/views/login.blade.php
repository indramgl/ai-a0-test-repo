@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">Masuk</h1>
                <p class="mt-2 text-gray-500">Gunakan akun Anda untuk mengakses dashboard admin</p>
            </div>

            <form method="POST" action="{{ route('login.store') }}" class="mt-8 bg-white rounded-xl shadow p-8">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                        <input id="email" type="email" name="email" required autofocus class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        <input id="password" type="password" name="password" required class="mt-1 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <button type="submit" class="w-full inline-flex justify-center items-center rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 transition">Masuk</button>
                    </div>
                </div>
            @if ($errors->any())
                <div class="mt-4 rounded-lg bg-red-50 border border-red-300 p-4">
                    <ul class="text-sm text-red-700 list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </form>
        </div>
    </section>
@endsection
