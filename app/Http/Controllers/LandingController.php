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
            'sekolah' => $this->sekolah(),
            'hero' => config('landing.hero'),
            'apps' => config('landing.apps'),
            'stats' => $this->fetchStats(),
        ]);
    }

    /**
     * Identitas sekolah untuk landing page. Nama & logo diambil dari Data Center
     * (sumber tunggal) bila tersedia, dengan fallback ke konfigurasi env lokal
     * (SEKOLAH_NAMA / SEKOLAH_LOGO) supaya landing tetap tampil walau Data
     * Center mati.
     */
    protected function sekolah(): array
    {
        $sekolah = config('landing.sekolah');
        $branding = $this->fetchBranding();

        $sekolah['nama'] = $branding['school_name'] ?? $sekolah['nama'];
        $sekolah['logo_url'] = $branding['logo']
            ?? (! empty($sekolah['logo']) ? asset('images/'.$sekolah['logo']) : null);
        $sekolah['favicon_url'] = $branding['favicon'] ?? $sekolah['logo_url'];

        return $sekolah;
    }

    protected function fetchBranding(): array
    {
        return Cache::remember('landing:branding', now()->addMinutes(5), function () {
            try {
                $response = Http::timeout(3)->get(config('landing.branding_api_url'));
                if ($response->successful()) {
                    return (array) $response->json('data', []);
                }
            } catch (\Throwable $e) {
                Log::warning('Gagal mengambil branding Data Center untuk landing page', ['error' => $e->getMessage()]);
            }

            return [];
        });
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
