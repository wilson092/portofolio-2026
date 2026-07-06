<!DOCTYPE html>
<html lang="id">
<head>

    @php
        use Illuminate\Support\Facades\Storage;
    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $projek->judul }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,300&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f5f3ef;
            --bg2: #edeae3;
            --ink: #1a1816;
            --ink2: #3d3a35;
            --ink3: #7a756c;
            --accent: #c9a84c;
            --accent2: #e8c96e;
            --accent-dim: rgba(201,168,76,0.12);
            --white: #ffffff;
            --border: rgba(201,168,76,0.18);
            --border2: rgba(26,24,22,0.08);
            --shadow-sm: 0 2px 12px rgba(26,24,22,0.06);
            --shadow-md: 0 8px 40px rgba(26,24,22,0.10);
            --shadow-lg: 0 24px 80px rgba(26,24,22,0.13);
            --radius: 20px;
            --radius-sm: 12px;
            --radius-pill: 999px;
            --transition: 0.35s cubic-bezier(0.4,0,0.2,1);
        }

        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html { scroll-behavior: smooth; }

        body {
            background-color: var(--bg);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a { text-decoration: none; color: inherit; }

        /* ── BG DECORATION ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 800px 500px at 5% 0%, rgba(201,168,76,0.07) 0%, transparent 70%),
                radial-gradient(ellipse 600px 400px at 95% 100%, rgba(201,168,76,0.05) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .noise-overlay {
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 180px;
            pointer-events: none;
            z-index: 0;
            opacity: 0.4;
        }

        /* ── NAVBAR ── */
        nav {
            position: sticky;
            top: 0;
            z-index: 999;
            padding: 0;
        }

        .navbar-inner {
            margin: 18px auto;
            max-width: 1100px;
            width: 92%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 28px;
            background: rgba(245,243,239,0.88);
            backdrop-filter: blur(18px) saturate(1.4);
            -webkit-backdrop-filter: blur(18px) saturate(1.4);
            border: 1px solid var(--border2);
            border-radius: var(--radius-pill);
            box-shadow: var(--shadow-sm), 0 0 0 1px rgba(201,168,76,0.08) inset;
            position: relative;
            z-index: 1;
        }

        .nav-logo {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--ink);
        }

        .nav-logo::after {
            content: '.';
            color: var(--accent);
        }

        .nav-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
            color: var(--ink2);
            padding: 8px 18px;
            border-radius: var(--radius-pill);
            border: 1px solid var(--border2);
            background: var(--white);
            transition: all var(--transition);
        }

        .nav-back:hover {
            background: var(--ink);
            color: var(--white);
            border-color: var(--ink);
            transform: translateX(-2px);
        }

        .nav-back svg {
            transition: transform var(--transition);
        }

        .nav-back:hover svg {
            transform: translateX(-3px);
        }

        /* ── MAIN LAYOUT ── */
        main {
            flex: 1;
            display: flex;
            align-items: center;
            padding: 60px 20px 80px;
            position: relative;
            z-index: 1;
        }

        .container {
            max-width: 820px;
            width: 100%;
            margin: 0 auto;
        }

        /* ── BREADCRUMB ── */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 36px;
            font-size: 13px;
            color: var(--ink3);
        }

        .breadcrumb a {
            color: var(--ink3);
            font-weight: 500;
            transition: color var(--transition);
        }

        .breadcrumb a:hover { color: var(--accent); }

        .breadcrumb-sep {
            color: var(--border2);
            font-size: 16px;
        }

        .breadcrumb-current {
            color: var(--ink2);
            font-weight: 600;
            max-width: 260px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ── CARD ── */
        .card {
            background: var(--white);
            border-radius: 28px;
            border: 1px solid var(--border2);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            animation: fadeUp 0.6s cubic-bezier(0.4,0,0.2,1) both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── CARD TOP STRIPE ── */
        .card-stripe {
            height: 4px;
            background: linear-gradient(90deg, var(--accent), var(--accent2), transparent);
        }

        /* ── CARD BODY ── */
        .card-body {
            padding: 52px 56px 48px;
        }

        /* ── STATUS BADGE ── */
        .status-row {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 28px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 16px;
            border-radius: var(--radius-pill);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
        }

        .badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .badge-done {
            background: rgba(34,197,94,0.1);
            color: #15803d;
            border: 1px solid rgba(34,197,94,0.2);
        }

        .badge-done::before { background: #22c55e; }

        .badge-progress {
            background: rgba(234,179,8,0.1);
            color: #854d0e;
            border: 1px solid rgba(234,179,8,0.2);
        }

        .badge-progress::before {
            background: #eab308;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(234,179,8,0.4); }
            50%       { box-shadow: 0 0 0 4px rgba(234,179,8,0.1); }
        }

        .project-number {
            font-size: 12px;
            font-weight: 600;
            color: var(--ink3);
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 6px 14px;
            background: var(--bg);
            border-radius: var(--radius-pill);
            border: 1px solid var(--border2);
        }

        /* ── TITLE ── */
        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(30px, 4vw, 46px);
            font-weight: 700;
            color: var(--ink);
            line-height: 1.15;
            letter-spacing: -1px;
            margin-bottom: 24px;
        }

        /* ── DIVIDER ── */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, var(--accent-dim), var(--border2) 40%, transparent);
            margin: 28px 0;
        }

        /* ── DESCRIPTION ── */
        .desc-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--ink3);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .desc-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border2);
        }

        .card-desc {
            color: var(--ink3);
            line-height: 1.9;
            font-size: 16px;
            font-weight: 300;
            margin-bottom: 40px;
        }

        /* ── SECTION STYLES (NEW) ── */
        .info-section {
            margin-bottom: 40px;
        }

        .section-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--ink3);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border2);
        }

        .section-content {
            color: var(--ink3);
            line-height: 1.9;
            font-size: 16px;
            font-weight: 300;
            margin-bottom: 24px;
        }

        .tech-stack-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 12px;
        }

        .tech-badge {
            background: var(--bg);
            padding: 4px 12px;
            border-radius: var(--radius-pill);
            font-size: 12px;
            font-weight: 500;
            color: var(--ink2);
            border: 1px solid var(--border2);
            letter-spacing: 0.01em;
        }

        .diagram-image {
            margin-top: 8px;
            max-width: 100%;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border2);
            box-shadow: var(--shadow-sm);
        }

        /* ── ACTIONS ── */
        .btn-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 13px 26px;
            border-radius: var(--radius-pill);
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            font-size: 14.5px;
            transition: all var(--transition);
            border: none;
            cursor: pointer;
            letter-spacing: 0.01em;
        }

        .btn-primary {
            background: var(--ink);
            color: var(--white);
            box-shadow: 0 4px 20px rgba(26,24,22,0.18);
        }

        .btn-primary:hover {
            background: var(--ink2);
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(26,24,22,0.22);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--ink);
            border: 1.5px solid var(--border2);
            box-shadow: var(--shadow-sm);
        }

        .btn-secondary:hover {
            background: var(--bg);
            border-color: var(--border);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-disabled {
            background: var(--bg2);
            color: var(--ink3);
            border: 1.5px solid var(--border2);
            cursor: not-allowed;
            opacity: 0.7;
        }

        .btn svg {
            flex-shrink: 0;
            transition: transform var(--transition);
        }

        .btn-primary:hover svg,
        .btn-secondary:hover svg {
            transform: translateX(2px);
        }

        /* ── FOOTER ── */
        footer {
            border-top: 1px solid var(--border2);
            padding: 28px 20px;
            background: var(--white);
            position: relative;
            z-index: 1;
        }

        .footer-inner {
            max-width: 820px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--ink);
        }

        .footer-logo::after {
            content: '.';
            color: var(--accent);
        }

        .footer-copy {
            font-size: 13px;
            color: var(--ink3);
            font-weight: 300;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 640px) {
            .card-body {
                padding: 32px 26px 28px;
            }

            .card-title {
                font-size: 28px;
            }

            .navbar-inner {
                margin: 10px;
                width: calc(100% - 20px);
                padding: 12px 18px;
            }

            main {
                padding: 40px 14px 60px;
            }

            .footer-inner {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>

</head>
<body>

<div class="noise-overlay" aria-hidden="true"></div>

<!-- ── NAVBAR ── -->
<nav>
    <div class="navbar-inner">
        <div class="nav-logo">Portfolio</div>
        <a href="/" class="nav-back">
            <svg width="15" height="15" fill="none" viewBox="0 0 24 24">
                <path d="M19 12H5M12 5l-7 7 7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Kembali
        </a>
    </div>
</nav>

<!-- ── MAIN ── -->
<main>
    <div class="container">

        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="/">Home</a>
            <span class="breadcrumb-sep">/</span>
            <a href="/#projects">Projek</a>
            <span class="breadcrumb-sep">/</span>
            <span class="breadcrumb-current">{{ $projek->judul }}</span>
        </div>

        <!-- Card -->
        <div class="card">
            <div class="card-stripe"></div>

            <div class="card-body">

                <!-- Status + number -->
                <div class="status-row">
                    <span class="badge {{ $projek->status_progress === 'Selesai' ? 'badge-done' : 'badge-progress' }}">
                        {{ $projek->status_progress }}
                    </span>
                    <span class="project-number">Detail Projek</span>
                </div>

                <!-- Title -->
                <h1 class="card-title">{{ $projek->judul }}</h1>

                <div class="divider"></div>

                <!-- Description -->
                <div class="desc-label">Deskripsi</div>
                <p class="card-desc">{{ $projek->deskripsi }}</p>

                <!-- NEW SECTIONS: Analisis Masalah, Kebutuhan Sistem, Arsitektur & Tech Stack, Diagram -->
                
                @php
                    // Decode tech_stack if it's a JSON string
                    $techStackArray = [];
                    if (!empty($projek->tech_stack)) {
                        if (is_string($projek->tech_stack)) {
                            $decoded = json_decode($projek->tech_stack, true);
                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                $techStackArray = $decoded;
                            } elseif (is_array($projek->tech_stack)) {
                                $techStackArray = $projek->tech_stack;
                            }
                        } elseif (is_array($projek->tech_stack)) {
                            $techStackArray = $projek->tech_stack;
                        }
                    }
                @endphp

                <!-- 1. Analisis Masalah -->
                @if(!empty($projek->analisis_masalah))
                <div class="info-section">
                    <div class="section-label">Analisis Masalah</div>
                    <div class="section-content">
                        {{ $projek->analisis_masalah }}
                    </div>
                </div>
                @endif

                <!-- 2. Kebutuhan Sistem -->
                @if(!empty($projek->kebutuhan_sistem))
                <div class="info-section">
                    <div class="section-label">Kebutuhan Sistem</div>
                    <div class="section-content">
                        {{ $projek->kebutuhan_sistem }}
                    </div>
                </div>
                @endif

                <!-- 3. Arsitektur & Tech Stack -->
                @if(!empty($projek->arsitektur) || !empty($techStackArray))
                <div class="info-section">
                    <div class="section-label">Arsitektur & Tech Stack</div>
                    
                    @if(!empty($projek->arsitektur))
                    <div class="section-content">
                        {{ $projek->arsitektur }}
                    </div>
                    @endif
                    
                    @if(!empty($techStackArray))
                    <div class="tech-stack-list">
                        @foreach($techStackArray as $tech)
                            <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endif

                <!-- 4. Diagram (ERD / Flowchart) -->
                @if(!empty($projek->diagram))
                <div class="info-section">
                    <div class="section-label">Diagram</div>
                    <img src="{{ Storage::url($projek->diagram) }}" alt="Diagram" class="diagram-image">
                </div>
                @endif

                <!-- Buttons -->
                <div class="btn-row">

                    <a href="{{ $projek->link }}" target="_blank" class="btn btn-primary">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.23 1.84 1.23 1.07 1.84 2.81 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23A11.5 11.5 0 0 1 12 6.8c1.02 0 2.04.14 3 .4 2.28-1.55 3.29-1.23 3.29-1.23.66 1.66.25 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57C20.57 21.8 24 17.3 24 12 24 5.37 18.63 0 12 0z"/>
                        </svg>
                        GitHub
                    </a>

                    @if($projek->laporan_pdf)
                        <a href="{{ Storage::url($projek->laporan_pdf) }}" target="_blank" class="btn btn-secondary">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <polyline points="14 2 14 8 20 8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <line x1="9" y1="15" x2="15" y2="15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                                <line x1="9" y1="11" x2="15" y2="11" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                            </svg>
                            Lihat Laporan
                        </a>
                    @else
                        <span class="btn btn-disabled">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
                                <line x1="15" y1="9" x2="9" y2="15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <line x1="9" y1="9" x2="15" y2="15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            Tidak Ada Laporan
                        </span>
                    @endif

                </div>

            </div>
        </div>

    </div>
</main>

<!-- ── FOOTER ── -->
<footer>
    <div class="footer-inner">
        <div class="footer-logo">Portfolio</div>
        <p class="footer-copy">© {{ date('Y') }} — Junior Laravel Developer</p>
    </div>
</footer>

</body>
</html>