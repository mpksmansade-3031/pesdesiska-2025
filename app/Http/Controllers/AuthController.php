<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Candidate;
use App\Models\Setting;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'nis' => 'required'
        ]);

        $student = Student::where('nis', $request->nis)->first();

        if ($student) {
            session(['nis' => $student->nis]);

            $setting = Setting::first();

            // Cek apakah sudah memilih sesuai mode
            if ($setting && $setting->mode === 'Ketua MPK' && $student->pilih_mpk != -1) {
                return redirect('/terimakasih');
            }

            if ($setting && $setting->mode === 'Ketua OSIS' && $student->pilih_osis != -1) {
                return redirect('/terimakasih');
            }

            return redirect('/pemilihan');
        }

        return back()->withErrors(['nis' => 'NIS tidak ditemukan']);
    }

    public function pemilihan()
    {
        // Pastikan user sudah login
        if (!session('nis')) {
            return redirect('/login')->withErrors(['auth' => 'Silakan login terlebih dahulu']);
        }

        $student = Student::where('nis', session('nis'))->first();
        $setting = Setting::first();

        if (!$setting || !$setting->web_access) {
            return view('coming-soon');
        }

        if ($setting->mode === 'Ketua MPK' && $student->pilih_mpk != -1) {
            return redirect('/terimakasih');
        }

        if ($setting->mode === 'Ketua OSIS' && $student->pilih_osis != -1) {
            return redirect('/terimakasih');
        }

        // Ambil kandidat sesuai mode di settings
        $candidates = Candidate::where('type', $setting->mode)->get();

        return view('pemilihan', compact('student', 'setting', 'candidates'));
    }

    public function pilih($id)
    {
        // Pastikan user sudah login
        if (!session('nis')) {
            return redirect('/login')->withErrors(['auth' => 'Silakan login terlebih dahulu']);
        }

        $student = Student::where('nis', session('nis'))->first();
        $setting = Setting::first();

        if (!$student || !$setting) {
            return back()->withErrors(['auth' => 'Data tidak valid']);
        }

        // Cek mode pemilihan dan simpan pilihan
        if ($setting->mode === 'Ketua MPK') {
            $student->pilih_mpk = $id;
        } elseif ($setting->mode === 'Ketua OSIS') {
            $student->pilih_osis = $id;
        }

        $student->save();

        // Setelah memilih → direct ke halaman terimakasih
        return redirect('/terimakasih');
    }

    public function logout()
    {
        session()->forget('nis'); // hapus data session
        return redirect('/login');
    }
}
