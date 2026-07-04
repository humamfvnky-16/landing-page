<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
    /**
     * Halaman portal publik sekolah — pintu masuk ke aplikasi-aplikasi
     * terpisah (Data Center, CBT, Presensi, Perpustakaan). Statistik siswa/guru
     * diambil live dari API publik Data Center (lihat config/landing.php),
     * di-cache singkat supaya landing page tetap cepat walau app Data Center
     * lambat/mati.
     */
    public function index()
    {
        return view('landing', [
            'sekolah' => config('landing.sekolah'),
            'hero' => config('landing.hero'),
            'apps' => config('landing.apps'),
            'stats' => $this->fetchStats(),
        ]);
    }

    protected function fetchStats(): array
    {
        return Cache::remember('landing:stats', now()->addMinutes(5), function () {
            try {
                $response = Http::timeout(3)->get(config('landing.stats_api_url'));
                if ($response->successful()) {
                    return (array) $response->json('data', ['siswa' => 0, 'guru' => 0]);
                }
            } catch (\Throwable $e) {
                Log::warning('Gagal mengambil statistik Data Center untuk landing page', ['error' => $e->getMessage()]);
            }

            return ['siswa' => 0, 'guru' => 0];
        });
    }
}
