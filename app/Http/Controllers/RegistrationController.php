<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    /**
     * Tampilkan form pendaftaran PPDB.
     */
    public function create()
    {
        return view('ppdb.register');
    }

    /**
     * Simpan data pendaftaran PPDB.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'nisn' => ['required', 'string', 'max:20'],
            'previous_school' => ['required', 'string', 'max:255'],
            'parent_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
        ]);

        $registration = Registration::create([
            'registration_number' => 'PPDB-' . date('Ymd') . '-' . strtoupper(Str::random(6)),
            'full_name' => $validated['full_name'],
            'nisn' => $validated['nisn'],
            'previous_school' => $validated['previous_school'],
            'parent_name' => $validated['parent_name'],
            'phone' => $validated['phone'],
            'status' => 'pending',
        ]);

        return redirect()
            ->route('ppdb.create')
            ->with('success', 'Pendaftaran berhasil! Nomor pendaftaran Anda: ' . $registration->registration_number);
    }
}
