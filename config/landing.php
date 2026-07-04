<?php

return [
    // Identitas sekolah — diedit langsung per deployment (tiap sekolah punya
    // salinan project ini sendiri), tidak butuh tabel/admin panel.
    'sekolah' => [
        'nama'    => env('SEKOLAH_NAMA', 'Nama Sekolah'),
        'tagline' => env('SEKOLAH_TAGLINE', 'Sistem Informasi Sekolah Terintegrasi'),
        'logo'    => env('SEKOLAH_LOGO'), // path di public/images, mis. "logo-sekolah.png"
    ],

    // Tampilan hero
    'hero' => [
        'judul'    => env('HERO_JUDUL', 'Digital Learning Management System'),
        'subjudul' => env('HERO_SUBJUDUL', 'Selamat Datang di Sistem Manajemen Pembelajaran Digital sekolah Anda.'),
        'bg_image' => env('HERO_BG_IMAGE'), // path di public/images, kosong = pakai gradient default
    ],

    // URL aplikasi-aplikasi yang dihubungkan dari landing page (semuanya app
    // terpisah, di-hosting di user Virtualmin "apps" — lihat DATACENTER_API_URL
    // di app CBT untuk pola yang sama).
    'apps' => [
        'datacenter' => env('DATACENTER_APP_URL', 'http://127.0.0.1:8001'),
        'cbt'        => env('CBT_APP_URL', 'http://127.0.0.1:8002'),
        'presensi'   => env('PRESENSI_APP_URL'), // null = tampil sebagai "Segera Hadir"
        'perpus'     => env('PERPUS_APP_URL'),
    ],

    // API publik Data Center untuk statistik jumlah siswa/guru (tanpa token,
    // lihat routes/api.php di app Datacenter: GET /api/v1/public/stats).
    'stats_api_url' => env('DATACENTER_API_URL', 'http://127.0.0.1:8001/api').'/v1/public/stats',

    // API publik Data Center untuk branding (nama sekolah + logo + favicon) —
    // sumber tunggal supaya seragam dengan CBT & Data Center.
    // (GET /api/v1/public/branding)
    'branding_api_url' => env('DATACENTER_API_URL', 'http://127.0.0.1:8001/api').'/v1/public/branding',
];
