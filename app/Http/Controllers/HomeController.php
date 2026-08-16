<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Registration;
use App\Models\Teacher;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman beranda dengan artikel dan statistik.
     */
    public function index()
    {
        $posts = Post::latest()->take(3)->get();

        $stats = [
            'students' => User::where('role', 'siswa')->count(),
            'teachers' => Teacher::count(),
            'registrations' => Registration::count(),
        ];

        return view('home', [
            'posts' => $posts,
            'stats' => $stats,
        ]);
    }
}
