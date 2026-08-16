<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Registration;
use App\Models\Teacher;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Tampilkan dashboard admin.
     */
    public function index()
    {
        $totalRegistrations = Registration::count();
        $totalPosts = Post::count();
        $totalTeachers = Teacher::count();
        $totalStudents = User::where('role', 'siswa')->count();
        $recentRegistrations = Registration::latest()->take(5)->get();

        return view('admin.dashboard', [
            'totalRegistrations' => $totalRegistrations,
            'totalPosts' => $totalPosts,
            'totalTeachers' => $totalTeachers,
            'totalStudents' => $totalStudents,
            'recentRegistrations' => $recentRegistrations,
        ]);
    }
}
