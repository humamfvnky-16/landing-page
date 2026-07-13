<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ Config::get('constants.title') }} | DIGITAL LEARNING MANAGEMENT SYSTEM</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

        <!--Favicon-->
        <link rel="icon" href="../public/img/favicon/favicon.ico">
        
        <!-- Font awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.4.2-web/css/all.min.css') }}" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <style>
            /* Plus Jakarta Sans — self-hosted (public/fonts), tidak butuh koneksi internet */
            @font-face { font-family:'Plus Jakarta Sans'; font-style:normal; font-weight:400; font-display:swap; src:url('{{ asset('fonts/plus-jakarta-sans-latin-400.woff2') }}') format('woff2'); }
            @font-face { font-family:'Plus Jakarta Sans'; font-style:normal; font-weight:500; font-display:swap; src:url('{{ asset('fonts/plus-jakarta-sans-latin-500.woff2') }}') format('woff2'); }
            @font-face { font-family:'Plus Jakarta Sans'; font-style:normal; font-weight:600; font-display:swap; src:url('{{ asset('fonts/plus-jakarta-sans-latin-600.woff2') }}') format('woff2'); }
            @font-face { font-family:'Plus Jakarta Sans'; font-style:normal; font-weight:700; font-display:swap; src:url('{{ asset('fonts/plus-jakarta-sans-latin-700.woff2') }}') format('woff2'); }
            @font-face { font-family:'Plus Jakarta Sans'; font-style:normal; font-weight:800; font-display:swap; src:url('{{ asset('fonts/plus-jakarta-sans-latin-800.woff2') }}') format('woff2'); }

            .pjs-landing{
                --ink:#181414; --ink-700:#57504f; --ink-500:#8c8482;
                --red:#dc2626; --red-dark:#b91c1c; --amber:#f59e0b; --line:#eee2df;
                --navy:#1e2f5c; --navy-2:#3b5bab;
                font-family:'Plus Jakarta Sans',system-ui,sans-serif;color:var(--ink);
            }
            .pjs-landing .wrap{max-width:1140px;margin:0 auto;padding:0 24px;}

            .pjs-landing .hero{position:relative;overflow:hidden;min-height:520px;background-size:cover;background-position:center;}
            .pjs-landing .hero-inner{position:relative;z-index:2;padding:80px 56px 70px;max-width:620px;color:#fff;}
            .pjs-landing h1{font-size:40px;font-weight:800;line-height:1.18;margin:0 0 16px;letter-spacing:-.01em;}
            .pjs-landing .hero p.lead{font-size:15.5px;color:rgba(255,255,255,.82);line-height:1.7;margin:0 0 26px;max-width:460px;}
            .pjs-landing .proof{margin-top:30px;}
            .pjs-landing .proof .txt b{display:block;font-size:15px;}
            .pjs-landing .proof .txt span{font-size:12.5px;color:rgba(255,255,255,.7);}

            .pjs-landing .float-strip{margin:-56px 40px 0;position:relative;z-index:3;background:#fff;border-radius:22px;
                box-shadow:0 30px 60px -24px rgba(24,20,20,.25);padding:30px 36px;
                display:grid;grid-template-columns:repeat(3,1fr);gap:10px;}
            .pjs-landing .float-strip .item{display:flex;align-items:flex-start;gap:14px;padding:0 16px;position:relative;}
            .pjs-landing .float-strip .item + .item::before{content:"";position:absolute;left:0;top:6px;bottom:6px;width:1px;background:var(--line);}
            .pjs-landing .float-strip .ic{width:42px;height:42px;border-radius:12px;background:#fdece9;color:var(--red);display:grid;place-items:center;font-size:19px;flex-shrink:0;}
            .pjs-landing .float-strip b{display:block;font-size:14px;margin-bottom:3px;}
            .pjs-landing .float-strip span{font-size:12px;color:var(--ink-500);line-height:1.5;}

            .pjs-landing .modules-v2{padding:100px 0 80px;background:linear-gradient(180deg,#fff 0%,#f6f7fb 100%);}
            .pjs-landing .m-head{text-align:center;max-width:560px;margin:0 auto 44px;}
            .pjs-landing .m-head .kicker{font-size:12px;font-weight:800;letter-spacing:.12em;color:var(--red);text-transform:uppercase;margin-bottom:10px;}
            .pjs-landing .m-head h2{font-size:28px;font-weight:800;margin:0 0 8px;color:var(--ink);}
            .pjs-landing .m-head p{font-size:14px;color:var(--ink-700);}

            .pjs-landing .app-grid{display:grid;grid-template-columns:repeat(12,1fr);gap:20px;}
            .pjs-landing .app-card{
                grid-column:span var(--span-m, 6);
                background:#fff;
                border:1px solid #eef0f5;
                border-radius:20px;
                padding:30px 16px 24px;
                display:flex;
                flex-direction:column;
                align-items:center;
                text-align:center;
                text-decoration:none;
                position:relative;
                overflow:hidden;
                box-shadow:0 10px 24px -18px rgba(30,41,90,.18);
                transition:transform .22s cubic-bezier(.2,.8,.2,1), box-shadow .22s ease, border-color .22s ease;
            }
            @media(min-width:641px){
                .pjs-landing .app-card{grid-column:span var(--span-d, 3);}
            }
            .pjs-landing .app-card::before{content:"";position:absolute;inset:0 0 auto 0;height:4px;
                background:linear-gradient(90deg,var(--tint,#4f46e5),transparent 140%);
                opacity:0;transition:opacity .22s ease;}
            .pjs-landing a.app-card:hover{transform:translateY(-7px);box-shadow:0 26px 44px -20px rgba(30,41,90,.28);border-color:transparent;}
            .pjs-landing a.app-card:hover::before{opacity:1;}
            .pjs-landing a.app-card:hover .ic{transform:scale(1.08) rotate(-2deg);}
            .pjs-landing a.app-card:hover .go{opacity:1;transform:translateY(0);}

            .pjs-landing .app-card .ic{width:56px;height:56px;border-radius:16px;margin-bottom:16px;display:grid;place-items:center;flex-shrink:0;
                transition:transform .22s ease;}
            .pjs-landing .app-card .ic svg{width:26px;height:26px;}
            .pjs-landing .app-card .ic.c1{--tint:#4f46e5;background:linear-gradient(150deg,#eef1ff,#dbe1fb);color:#4338ca;box-shadow:0 10px 18px -10px rgba(79,70,229,.45);}
            .pjs-landing .app-card .ic.c2{--tint:#0284c7;background:linear-gradient(150deg,#e6f6ff,#cdedff);color:#0369a1;box-shadow:0 10px 18px -10px rgba(2,132,199,.4);}
            .pjs-landing .app-card .ic.c3{--tint:#16a34a;background:linear-gradient(150deg,#e9fbef,#d1f5dd);color:#15803d;box-shadow:0 10px 18px -10px rgba(22,163,74,.4);}
            .pjs-landing .app-card .ic.c4{--tint:#d97706;background:linear-gradient(150deg,#fff5df,#ffe8b8);color:#b45309;box-shadow:0 10px 18px -10px rgba(217,119,6,.4);}
            .pjs-landing .app-card .title{display:block;font-size:14.5px;font-weight:800;color:var(--ink);line-height:1.3;letter-spacing:-.01em;}
            .pjs-landing .app-card .sub{display:block;font-size:11.5px;color:var(--ink-500);margin-top:3px;}
            .pjs-landing .app-card .go{display:inline-flex;align-items:center;gap:4px;margin-top:12px;font-size:11px;font-weight:700;
                color:var(--tint,var(--navy-2));opacity:0;transform:translateY(3px);transition:opacity .22s ease, transform .22s ease;}

            @media(max-width:860px){
                .pjs-landing .hero{min-height:640px;}
                .pjs-landing .hero-inner{padding:100px 28px 60px;}
                .pjs-landing .float-strip{grid-template-columns:1fr;margin:-40px 20px 0;}
                .pjs-landing .float-strip .item + .item::before{display:none;}
                .pjs-landing h1{font-size:32px;}
            }
        </style>
    </head>
    <body class="bg-gray-100">

        <div class="pjs-landing">

            @php
                $heroImage = optional(Config::get('constants.main-banner'))[0]['image'] ?? 'img/headers/header-1.jpg';

                // Ikon & warna khusus untuk aplikasi yang memang terintegrasi dengan landing
                // page ini (lihat config/constants.php). Aplikasi lain tetap tampil dengan
                // ikon generik dari config-nya masing-masing kalau suatu saat ditambahkan.
                $iconCatalog = [
                    '../../datacenter' => ['color' => 'c1', 'suffix' => '/login', 'target' => null, 'icon' => <<<'SVG'
                        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="15" r="6"/><path d="M12 38c0-7 5-12 12-12s12 5 12 12"/><circle cx="9" cy="20" r="4"/><path d="M2 34c0-5 3-8.5 7-9.5"/><circle cx="39" cy="20" r="4"/><path d="M46 34c0-5-3-8.5-7-9.5"/></svg>
                        SVG],
                    '../../cbt' => ['color' => 'c2', 'suffix' => '/login', 'target' => null, 'icon' => <<<'SVG'
                        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="9" width="36" height="24" rx="3"/><path d="M18 40h12M24 33v7"/><path d="M24 15v8l6 4"/></svg>
                        SVG],
                    '../../presensi' => ['color' => 'c3', 'suffix' => '', 'target' => null, 'icon' => <<<'SVG'
                        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="17"/><path d="M24 14v10l7 5"/></svg>
                        SVG],
                    '../../perpus' => ['color' => 'c4', 'suffix' => '', 'target' => '_blank', 'icon' => <<<'SVG'
                        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6h18l6 6v30a2 2 0 0 1-2 2H12a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2Z"/><path d="M30 6v6h6"/><path d="M16 24h16M16 31h16M16 17h8"/></svg>
                        SVG],
                ];

                // is_dir() dengan path relatif ('../../datacenter') bergantung pada current
                // working directory PHP saat request diproses. Itu kebetulan = public/ di
                // `php artisan serve` (dev), tapi TIDAK selalu benar di PHP-FPM produksi
                // (tergantung setting `chdir` pool-nya) — makanya "Available Apps" bisa
                // kosong total di server walau folder app-nya benar-benar ada. base_path()
                // selalu absolut & tidak tergantung CWD, jadi dipakai sebagai basis cek di sini.
                $appsBaseDir = dirname(base_path());

                $availableApps = [];
                if (Config::get('constants.available-apps')) {
                    foreach (Config::get('constants.available-apps') as $app) {
                        $appDirName = ltrim(str_replace('../../', '', $app['directory']), '/');
                        if (is_dir($appsBaseDir.'/'.$appDirName)) {
                            $meta = $iconCatalog[$app['directory']] ?? ['color' => 'c1', 'suffix' => '', 'target' => null, 'icon' => $app['icon']];
                            $availableApps[] = [
                                'title' => $app['title'],
                                'subtitle' => $app['subtitle'],
                                'href' => "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}{$app['directory']}{$meta['suffix']}",
                                'target' => $meta['target'],
                                'colorClass' => $meta['color'],
                                'icon' => $meta['icon'],
                            ];
                        }
                    }
                }

                // Auto-layout grid 12 kolom: baris penuh diisi 4 tile rata, sisa tile di
                // baris terakhir melebar rata mengisi ruang yang ada.
                $appCount = count($availableApps);
                $normalRowCount = intdiv($appCount, 4);
                $lastRowColumnCount = $appCount % 4;
                $rowSlotsLeft = $normalRowCount * 4;
                $lastRowRemaining = $lastRowColumnCount;

                foreach ($availableApps as &$app) {
                    if ($rowSlotsLeft > 0) {
                        $app['spanMobile'] = 6;
                        $app['spanDesktop'] = 3;
                        $rowSlotsLeft--;
                        continue;
                    }
                    switch ($lastRowColumnCount) {
                        case 1:
                            $span = $normalRowCount === 0 ? 6 : 12;
                            $app['spanMobile'] = $span;
                            $app['spanDesktop'] = $span;
                            break;
                        case 2:
                            $app['spanMobile'] = 6;
                            $app['spanDesktop'] = 6;
                            break;
                        case 3:
                            $lastRowRemaining--;
                            $app['spanMobile'] = $lastRowRemaining === 0 ? 12 : 6;
                            $app['spanDesktop'] = 4;
                            break;
                    }
                }
                unset($app);

                $arrowIcon = <<<'SVG'
                    <svg width="11" height="11" viewBox="0 0 16 16" fill="currentColor"><path d="M4.646 2.646a.5.5 0 0 1 .708 0l5 5a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708-.708L9.293 8 4.646 3.354a.5.5 0 0 1 0-.708"/></svg>
                    SVG;
            @endphp

            <div style="position:relative;">
                <section class="hero" style="background-image:linear-gradient(100deg, rgba(10,8,8,.88) 10%, rgba(10,8,8,.55) 45%, rgba(10,8,8,.15) 75%), url('{{ asset($heroImage) }}')">
                    <div class="hero-inner">
                        <h1>Digital Learning<br>Management System</h1>
                        <p class="lead">Selamat datang di Sistem Manajemen Pembelajaran Digital {{ Config::get('constants.title') }}.</p>

                        <div class="proof">
                            <div class="txt">
                                <b>Sistem Informasi Sekolah Terintegrasi</b>
                                <span>★ Sistem terintegrasi &amp; aman</span>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="float-strip">
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 20 16">
                            <path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4M4.5 7A1.5 1.5 0 0 0 3 8.5v5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 11.5 7zM8 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3"/>
                        </svg>
                        <div><b>Login Protect</b><span>Keamanan Login akun</span></div>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 20 16">
                            <path d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56"/>
                        </svg>
                        <div><b>Protected</b><span>Ujian lebih aman &amp; terjaga</span></div>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 20 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/>
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                        </svg>
                        <div><b>Data Integration</b><span>Sinkron data real-time</span></div>
                    </div>
                </div>
            </div>

            <section class="modules-v2" id="modul">
                <div class="wrap">
                    <div class="m-head">
                        <div class="kicker">Available Apps</div>
                        <img src="{{ asset(Config::get('constants.headmaster_photo')) }}" alt="Logo {{ Config::get('constants.title') }}"
                             style="width:64px;height:64px;object-fit:contain;margin:0 auto 12px;display:block;">
                        <h2>{{ Config::get('constants.title') }}</h2>
                        <p>Sistem Informasi Sekolah Terintegrasi</p>
                    </div>
                    <div class="app-grid">
                        @foreach($availableApps as $app)
                            <a href="{{ $app['href'] }}"
                               @if($app['target']) target="{{ $app['target'] }}" rel="noopener noreferrer" @endif
                               class="app-card"
                               style="--span-m:{{ $app['spanMobile'] }};--span-d:{{ $app['spanDesktop'] }}">
                                <div class="ic {{ $app['colorClass'] }}">{!! $app['icon'] !!}</div>
                                <span class="title">{{ $app['title'] }}</span>
                                <span class="sub">{{ $app['subtitle'] }}</span>
                                <span class="go">Buka {!! $arrowIcon !!}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>

       <!-- <div class="py-6 lg:py-12" style="background-color:#1a2a5d!important;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
                
                <div class="grid grid-cols-12 p-5 text-white gap-y-8 lg:gap-12 text-center lg:text-left">
                    <div class="col-span-12 lg:col-span-4">
                        <div class="font-bold  text-gray-200 text-2xl mb-3">
                            ADDRESS
                        </div>
                        <div class="">
                            <?php echo Config::get('constants.address') ?>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-4">
                        <div class="font-bold  text-gray-200 text-2xl mb-3">
                            INFORMATION
                        </div>
                        <div class="">
                            <?php
                                if(Config::get('constants.information')) 
                                {
                                    foreach(Config::get('constants.information') as $information)
                                    {
                            ?>
                                    <div class="mb-1">
                                        <a href="<?php echo $information['url'] ?>" class="text-sm font-semibold text-gray-200 hover:text-white"><?php echo $information['title'] ?></a>
                                    </div>
                            <?php
                                    }
                                    
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-4">
                        <div class="font-bold text-gray-200 text-2xl">
                            CONTACT DETAILS
                        </div>
                        <div class="">
                            <div class="w-full py-2">
                                <svg class="inline w-5 h-5" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                
                                <?php echo Config::get('constants.contacts.email') ?>
                            </div>    
                            <div class="w-full py-2">
                                <svg class="inline w-5 h-5" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                
                                <?php echo Config::get('constants.contacts.phone') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="py-3" style="background-color:#ffffff!important;">
            <div class="text-center text-sm text-gray-900 font-semibold">
                Copyright ©<?php echo date("Y"); ?> | All Rights Reserved    
            </div>
        </div>

        @stack('modals')

        @livewireScripts 

        <!-- fontawesome -->
        <script src="{{ asset('vendor/fontawesome-free-6.4.2-web/js/all.min.js') }}"></script>

        <!-- Internal scripts -->
        <script type="module">
            const teacherSlider = new Swiper('.teacher-slider', {
                // Optional parameters
                slidesPerView: 2.25,
                spaceBetween: 20,
                height: 250,
                centeredSlides: true,
                direction: 'horizontal',
                loop: true,
                autoplay: {
                    delay: 3000,
                },
                breakpoints: {
                    // when window width is >= 640px
                    640: {
                        slidesPerView: 8,
                        spaceBetween: 20
                    }
                },
            });
        </script>
    </body>
</html>
