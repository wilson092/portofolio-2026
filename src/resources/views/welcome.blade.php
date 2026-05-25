<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profil->nama ?? 'Portfolio' }} | Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #1e293b;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        /* Navbar */
        nav {
            position: sticky;
            top: 0;
            z-index: 999;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .menu {
            display: flex;
            gap: 30px;
        }

        .menu a {
            color: #334155;
            font-weight: 500;
            transition: .3s;
        }

        .menu a:hover {
            color: #667eea;
        }

        .btn {
            display: inline-block;
            padding: 14px 28px;
            border-radius: 14px;
            font-weight: 600;
            transition: .3s;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 10px 30px rgba(102,126,234,0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102,126,234,0.4);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 1px solid #e2e8f0;
        }

        .btn-secondary:hover {
            background: #f8fafc;
            transform: translateY(-3px);
        }

        /* Hero */
        .hero {
            padding: 100px 0 120px;
        }

        .hero-wrapper {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            align-items: center;
            gap: 60px;
        }

        .hero-text span {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            color: white;
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .hero-text h1 {
            font-size: 64px;
            line-height: 1.1;
            margin-bottom: 25px;
            color: white;
        }

        .hero-text p {
            font-size: 18px;
            line-height: 1.8;
            color: rgba(255,255,255,0.9);
            margin-bottom: 35px;
        }

        .hero-buttons {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
        }

        .hero-card {
            background: rgba(255,255,255,0.95);
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            backdrop-filter: blur(10px);
        }

        .hero-card h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1e293b;
        }

        .hero-card ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .hero-card li {
            background: #f8fafc;
            padding: 16px 18px;
            border-radius: 14px;
            color: #334155;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: .3s;
            border-left: 3px solid transparent;
        }

        .hero-card li:hover {
            background: #f1f5f9;
            border-left-color: #667eea;
            transform: translateX(6px);
        }

        .hero-card li img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }

        /* About */
        .section {
            padding: 90px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 42px;
            margin-bottom: 15px;
            color: white;
        }

        .section-title p {
            color: rgba(255,255,255,0.8);
            font-size: 17px;
        }

        .about-box {
            background: rgba(255,255,255,0.95);
            padding: 50px;
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            line-height: 1.9;
            color: #475569;
            font-size: 17px;
        }

        /* Skills */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
        }

        .skill-card {
            background: rgba(255,255,255,0.95);
            padding: 35px;
            border-radius: 24px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            transition: .3s;
            text-align: center;
            border-top: 4px solid #667eea;
            position: relative;
            overflow: hidden;
        }

        .skill-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
            pointer-events: none;
        }

        .skill-card:hover::before {
            left: 100%;
        }

        .skill-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.15);
        }

        .skill-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea15, #764ba215);
            border-radius: 16px;
            transition: .3s;
        }

        .skill-card:hover .skill-icon {
            background: linear-gradient(135deg, #667eea25, #764ba225);
            transform: scale(1.1) rotate(5deg);
        }

        .skill-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .skill-card h3 {
            margin-bottom: 12px;
            color: #1e293b;
            font-size: 20px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .skill-card p {
            color: #64748b;
            line-height: 1.7;
            font-size: 14px;
            transition: .3s;
        }

        .skill-card:hover p {
            color: #475569;
            font-size: 14.5px;
        }

        /* Projects */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 28px;
        }

        .project-card {
            background: rgba(255,255,255,0.95);
            padding: 35px;
            border-radius: 28px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            transition: .3s;
        }

        .project-card:hover {
            transform: translateY(-10px);
        }

        .project-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #1e293b;
        }

        .project-card p {
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .project-card a {
            color: #667eea;
            font-weight: 600;
        }

        /* Contact */
        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 35px;
        }

        .contact-box,
        .contact-form {
            background: rgba(255,255,255,0.95);
            padding: 40px;
            border-radius: 28px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        .contact-box h3,
        .contact-form h3 {
            margin-bottom: 25px;
            font-size: 28px;
            color: #1e293b;
        }

        .contact-item {
            margin-bottom: 20px;
        }

        .contact-item strong {
            display: block;
            margin-bottom: 6px;
            color: #1e293b;
        }

        .contact-item p,
        .contact-item a {
            color: #64748b;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 16px 18px;
            border-radius: 14px;
            border: 1px solid #cbd5e1;
            outline: none;
            font-size: 15px;
            background: white;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
        }

        .form-group textarea {
            min-height: 130px;
            resize: vertical;
        }

        /* Footer */
        footer {
            padding: 40px 0;
            text-align: center;
            color: rgba(255,255,255,0.8);
            border-top: 1px solid rgba(255,255,255,0.2);
        }

        /* Responsive */
        @media(max-width: 900px) {
            .hero-wrapper,
            .contact-wrapper {
                grid-template-columns: 1fr;
            }

            .hero-text h1 {
                font-size: 46px;
            }

            .menu {
                gap: 18px;
            }
        }

        @media(max-width: 600px) {
            .navbar {
                flex-direction: column;
                gap: 20px;
            }

            .hero {
                padding-top: 60px;
            }

            .hero-text h1 {
                font-size: 38px;
            }

            .section-title h2 {
                font-size: 34px;
            }

            .about-box,
            .hero-card,
            .contact-box,
            .contact-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>

    <nav>
        <div class="container navbar">
            <div class="logo">{{ $profil->nama ?? 'Portfolio' }}</div>

            <div class="menu">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#projects">Projek</a>
                <a href="#contact">Kontak</a>
                
            </div>
        </div>
    </nav>

    <section class="hero" id="home">
        <div class="container hero-wrapper">

            <div class="hero-text">
              

                <h1>
                    Halo, Saya <br>
                    {{ $profil->nama ?? '-' }} 👋
                </h1>

                <p>
                    {{ $profil->deskripsi ?? '-' }}
                </p>

                <div class="hero-buttons">
                    <a href="#projects" class="btn btn-primary">
                        Lihat Projek
                    </a>

                    <a href="{{ $profil->github ?? '#' }}" target="_blank" class="btn btn-secondary">
                        GitHub
                    </a>
                </div>
            </div>

            <div class="hero-card">
                <h3>Tech Stack</h3>

                <ul>
                    @if($profil && $profil->tech_stack && is_array($profil->tech_stack))
                        @foreach($profil->tech_stack as $tech)
                            @php
                                $techName = is_array($tech) ? ($tech['name'] ?? $tech) : $tech;
                                $techNameLower = strtolower($techName);
                            @endphp
                            <li>
                                @if(strpos($techNameLower, 'laravel') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2 17L12 22L22 17" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2 12L12 17L22 12" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'filament') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 4H20V20H4V4Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8 8H16V16H8V8Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'livewire') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#FBBF24" stroke="#FBBF24" stroke-width="1"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'blade') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#38BDF8" stroke="#38BDF8" stroke-width="1"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'docker') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 4L20 4" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M4 12L20 12" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M4 20L20 20" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                                        <circle cx="7" cy="4" r="1.5" fill="#2496ED"/>
                                        <circle cx="7" cy="12" r="1.5" fill="#2496ED"/>
                                        <circle cx="7" cy="20" r="1.5" fill="#2496ED"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'mariadb') !== false || strpos($techNameLower, 'mysql') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="12" cy="5" rx="9" ry="3" stroke="#00758D" stroke-width="1.5"/>
                                        <path d="M3 5V19C3 20.66 7 22 12 22C17 22 21 20.66 21 19V5" stroke="#00758D" stroke-width="1.5"/>
                                        <path d="M3 12C3 13.66 7 15 12 15C17 15 21 13.66 21 12" stroke="#00758D" stroke-width="1.5"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'git') !== false && strpos($techNameLower, 'github') === false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 0C5.37 0 0 5.37 0 12C0 17.3 3.44 21.8 8.21 23.39C8.81 23.5 9.03 23.13 9.03 22.81C9.03 22.51 9.02 21.8 9.02 20.95C6.68 21.42 5.91 19.96 5.66 19.23C5.52 18.86 4.96 17.63 4.46 17.34C4.05 17.11 3.48 16.64 4.45 16.63C5.38 16.62 6.04 17.48 6.28 17.86C7.29 19.54 8.92 19.09 9.07 18.77C9.18 18.34 9.34 17.97 9.51 17.75C7.83 17.58 6.07 16.86 6.07 12.65C6.07 11.44 6.48 10.44 7.15 9.67C7.03 9.49 6.66 8.35 7.23 6.82C7.23 6.82 8.04 6.62 9.03 7.36C9.79 7.07 10.61 6.93 11.42 6.92C12.23 6.93 13.05 7.07 13.81 7.36C14.8 6.62 15.61 6.82 15.61 6.82C16.18 8.35 15.81 9.49 15.69 9.67C16.36 10.44 16.77 11.43 16.77 12.65C16.77 16.87 15 17.58 13.31 17.74C13.52 17.93 13.7 18.26 13.7 18.78C13.7 19.54 13.68 20.8 13.68 20.95C13.68 21.27 13.9 21.64 14.5 21.51C19.27 19.93 22.72 15.41 22.72 10.08C22.72 4.79 17.87 0.13 12.02 0.13L12 0Z" fill="#24292E"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'github') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="#1F2937" stroke-width="1.5"/>
                                        <path d="M9 16C8 14.5 7.5 13 9 12" stroke="#1F2937" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M15 16C16 14.5 16.5 13 15 12" stroke="#1F2937" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M10 10H10.01M14 10H14.01" stroke="#1F2937" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'tailwind') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2Z" stroke="#06B6D4" stroke-width="1.5"/>
                                        <path d="M8 12L11 15L16 9" stroke="#06B6D4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'php') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 4C2 4 2 6 4 6H8C8 6 8 4 8 4H4Z" stroke="#777BB4" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M4 8C2 8 2 10 4 10H8C8 10 8 8 8 8H4Z" stroke="#777BB4" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M4 12C2 12 2 14 4 14H8C8 14 8 12 8 12H4Z" stroke="#777BB4" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'javascript') !== false || strpos($techNameLower, 'js') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="3" width="18" height="18" rx="2" stroke="#F7DF1E" stroke-width="1.5"/>
                                        <path d="M8 13C8 14.5 7.5 16 6 16" stroke="#F7DF1E" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M16 13C16 14.5 16.5 16 18 16" stroke="#F7DF1E" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'react') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="2" stroke="#61DAFB" stroke-width="1.5"/>
                                        <ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5"/>
                                        <ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5" transform="rotate(60 12 12)"/>
                                        <ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5" transform="rotate(120 12 12)"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'vue') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L3 20H9L12 14L15 20H21L12 2Z" stroke="#4FC08D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 10.5L8 19" stroke="#4FC08D" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'bootstrap') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="3" width="18" height="18" rx="2" stroke="#7952B3" stroke-width="1.5"/>
                                        <path d="M8 9H12C13.1 9 14 9.9 14 11C14 12.1 13.1 13 12 13H8V9Z" stroke="#7952B3" stroke-width="1.5"/>
                                        <path d="M8 13H12C13.1 13 14 13.9 14 15C14 16.1 13.1 17 12 17H8V13Z" stroke="#7952B3" stroke-width="1.5"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'rest api') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 4H20V20H4V4Z" stroke="#009B77" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8 8L16 16M16 8L8 16" stroke="#009B77" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'html') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 2L5 20L12 22L19 20L21 2H3Z" stroke="#E34C26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 19V4M8 8H16M8 12H14M8 16H12" stroke="#E34C26" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'css') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 2L5 20L12 22L19 20L21 2H3Z" stroke="#563D7C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 8L12 14L15 8M9 12H15M10 16H14" stroke="#563D7C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'figma') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="8" r="3.5" stroke="#F24E1E" stroke-width="1.5"/>
                                        <path d="M8.5 14.5C8.5 12.567 9.567 11 12 11C14.433 11 15.5 12.567 15.5 14.5C15.5 16.433 14.433 17 12 17C9.567 17 8.5 16.433 8.5 14.5Z" stroke="#F24E1E" stroke-width="1.5"/>
                                        <path d="M5 14.5L7 12V17L5 14.5Z" stroke="#F24E1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M19 14.5L17 12V17L19 14.5Z" stroke="#F24E1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @else
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#667eea" stroke="#667eea" stroke-width="1"/>
                                    </svg>
                                @endif
                                {{ $techName }}
                            </li>
                        @endforeach
                    @else
                        <li>Tech stack tidak tersedia</li>
                    @endif
                </ul>
            </div>

        </div>
    </section>

    <section class="section" id="about">
        <div class="container">

            <div class="section-title">
                <h2>Tentang Saya</h2>
                <p>Profil singkat dan fokus pembelajaran saya</p>
            </div>

            <div class="about-box">
               {{ $profil->deskripsi ?? 'Konten tidak tersedia' }}
            </div>

        </div>
    </section>

    <section class="section" id="skills">
        <div class="container">

            <div class="section-title">
                <h2>Skill & Tech Stack</h2>
                <p>Teknologi yang saya kuasai</p>
            </div>

            <div class="skills-grid">
                @if($profil && $profil->tech_stack && is_array($profil->tech_stack))
                    @foreach($profil->tech_stack as $tech)
                        @php
                            $techName = is_array($tech) ? ($tech['name'] ?? 'Tech') : $tech;
                            $techDesc = is_array($tech) ? ($tech['description'] ?? 'Teknologi yang dikuasai') : 'Teknologi yang dikuasai';
                            $techNameLower = strtolower($techName);
                            
                            // Set border color based on tech
                            $borderColor = '#667eea';
                            if(strpos($techNameLower, 'laravel') !== false) $borderColor = '#FF2D20';
                            elseif(strpos($techNameLower, 'filament') !== false) $borderColor = '#10B981';
                            elseif(strpos($techNameLower, 'livewire') !== false) $borderColor = '#FBBF24';
                            elseif(strpos($techNameLower, 'blade') !== false) $borderColor = '#38BDF8';
                            elseif(strpos($techNameLower, 'docker') !== false) $borderColor = '#2496ED';
                            elseif(strpos($techNameLower, 'mariadb') !== false || strpos($techNameLower, 'mysql') !== false) $borderColor = '#00758D';
                            elseif(strpos($techNameLower, 'git') !== false && strpos($techNameLower, 'github') === false) $borderColor = '#24292E';
                            elseif(strpos($techNameLower, 'github') !== false) $borderColor = '#1F2937';
                            elseif(strpos($techNameLower, 'tailwind') !== false) $borderColor = '#06B6D4';
                            elseif(strpos($techNameLower, 'php') !== false) $borderColor = '#777BB4';
                            elseif(strpos($techNameLower, 'javascript') !== false || strpos($techNameLower, 'js') !== false) $borderColor = '#F7DF1E';
                            elseif(strpos($techNameLower, 'react') !== false) $borderColor = '#61DAFB';
                            elseif(strpos($techNameLower, 'vue') !== false) $borderColor = '#4FC08D';
                            elseif(strpos($techNameLower, 'bootstrap') !== false) $borderColor = '#7952B3';
                            elseif(strpos($techNameLower, 'rest api') !== false) $borderColor = '#009B77';
                            elseif(strpos($techNameLower, 'html') !== false) $borderColor = '#E34C26';
                            elseif(strpos($techNameLower, 'css') !== false) $borderColor = '#563D7C';
                            elseif(strpos($techNameLower, 'figma') !== false) $borderColor = '#F24E1E';
                        @endphp
                        <div class="skill-card" style="border-top-color: {{ $borderColor }};">
                            <div class="skill-icon">
                                @if(strpos($techNameLower, 'laravel') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2 17L12 22L22 17" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2 12L12 17L22 12" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'filament') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 4H20V20H4V4Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8 8H16V16H8V8Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'livewire') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#FBBF24" stroke="#FBBF24" stroke-width="1"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'blade') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#38BDF8" stroke="#38BDF8" stroke-width="1"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'docker') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 4L20 4" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M4 12L20 12" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M4 20L20 20" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                                        <circle cx="7" cy="4" r="1.5" fill="#2496ED"/>
                                        <circle cx="7" cy="12" r="1.5" fill="#2496ED"/>
                                        <circle cx="7" cy="20" r="1.5" fill="#2496ED"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'mariadb') !== false || strpos($techNameLower, 'mysql') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <ellipse cx="12" cy="5" rx="9" ry="3" stroke="#00758D" stroke-width="1.5"/>
                                        <path d="M3 5V19C3 20.66 7 22 12 22C17 22 21 20.66 21 19V5" stroke="#00758D" stroke-width="1.5"/>
                                        <path d="M3 12C3 13.66 7 15 12 15C17 15 21 13.66 21 12" stroke="#00758D" stroke-width="1.5"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'git') !== false && strpos($techNameLower, 'github') === false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 0C5.37 0 0 5.37 0 12C0 17.3 3.44 21.8 8.21 23.39C8.81 23.5 9.03 23.13 9.03 22.81C9.03 22.51 9.02 21.8 9.02 20.95C6.68 21.42 5.91 19.96 5.66 19.23C5.52 18.86 4.96 17.63 4.46 17.34C4.05 17.11 3.48 16.64 4.45 16.63C5.38 16.62 6.04 17.48 6.28 17.86C7.29 19.54 8.92 19.09 9.07 18.77C9.18 18.34 9.34 17.97 9.51 17.75C7.83 17.58 6.07 16.86 6.07 12.65C6.07 11.44 6.48 10.44 7.15 9.67C7.03 9.49 6.66 8.35 7.23 6.82C7.23 6.82 8.04 6.62 9.03 7.36C9.79 7.07 10.61 6.93 11.42 6.92C12.23 6.93 13.05 7.07 13.81 7.36C14.8 6.62 15.61 6.82 15.61 6.82C16.18 8.35 15.81 9.49 15.69 9.67C16.36 10.44 16.77 11.43 16.77 12.65C16.77 16.87 15 17.58 13.31 17.74C13.52 17.93 13.7 18.26 13.7 18.78C13.7 19.54 13.68 20.8 13.68 20.95C13.68 21.27 13.9 21.64 14.5 21.51C19.27 19.93 22.72 15.41 22.72 10.08C22.72 4.79 17.87 0.13 12.02 0.13L12 0Z" fill="#24292E"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'github') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="#1F2937" stroke-width="1.5"/>
                                        <path d="M9 16C8 14.5 7.5 13 9 12" stroke="#1F2937" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M15 16C16 14.5 16.5 13 15 12" stroke="#1F2937" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M10 10H10.01M14 10H14.01" stroke="#1F2937" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'rest api') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 4H20V20H4V4Z" stroke="#009B77" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8 8L16 16M16 8L8 16" stroke="#009B77" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'html') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 2L5 20L12 22L19 20L21 2H3Z" stroke="#E34C26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 19V4M8 8H16M8 12H14M8 16H12" stroke="#E34C26" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'css') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 2L5 20L12 22L19 20L21 2H3Z" stroke="#563D7C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 8L12 14L15 8M9 12H15M10 16H14" stroke="#563D7C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'figma') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="8" r="3.5" stroke="#F24E1E" stroke-width="1.5"/>
                                        <path d="M8.5 14.5C8.5 12.567 9.567 11 12 11C14.433 11 15.5 12.567 15.5 14.5C15.5 16.433 14.433 17 12 17C9.567 17 8.5 16.433 8.5 14.5Z" stroke="#F24E1E" stroke-width="1.5"/>
                                        <path d="M5 14.5L7 12V17L5 14.5Z" stroke="#F24E1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M19 14.5L17 12V17L19 14.5Z" stroke="#F24E1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'tailwind') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2Z" stroke="#06B6D4" stroke-width="1.5"/>
                                        <path d="M8 12L11 15L16 9" stroke="#06B6D4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'php') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 4C2 4 2 6 4 6H8C8 6 8 4 8 4H4Z" stroke="#777BB4" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M4 8C2 8 2 10 4 10H8C8 10 8 8 8 8H4Z" stroke="#777BB4" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M4 12C2 12 2 14 4 14H8C8 14 8 12 8 12H4Z" stroke="#777BB4" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M12 4C10 4 10 6 12 6H16C16 6 16 4 16 4H12Z" stroke="#777BB4" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M12 8C10 8 10 10 12 10H16C16 10 16 8 16 8H12Z" stroke="#777BB4" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M12 12C10 12 10 14 12 14H16C16 14 16 12 16 12H12Z" stroke="#777BB4" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'javascript') !== false || strpos($techNameLower, 'js') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="3" width="18" height="18" rx="2" stroke="#F7DF1E" stroke-width="1.5"/>
                                        <path d="M8 13C8 14.5 7.5 16 6 16" stroke="#F7DF1E" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M16 13C16 14.5 16.5 16 18 16" stroke="#F7DF1E" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'react') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="2" stroke="#61DAFB" stroke-width="1.5"/>
                                        <ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5"/>
                                        <ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5" transform="rotate(60 12 12)"/>
                                        <ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5" transform="rotate(120 12 12)"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'vue') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L3 20H9L12 14L15 20H21L12 2Z" stroke="#4FC08D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 10.5L8 19" stroke="#4FC08D" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif(strpos($techNameLower, 'bootstrap') !== false)
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="3" width="18" height="18" rx="2" stroke="#7952B3" stroke-width="1.5"/>
                                        <path d="M8 9H12C13.1 9 14 9.9 14 11C14 12.1 13.1 13 12 13H8V9Z" stroke="#7952B3" stroke-width="1.5"/>
                                        <path d="M8 13H12C13.1 13 14 13.9 14 15C14 16.1 13.1 17 12 17H8V13Z" stroke="#7952B3" stroke-width="1.5"/>
                                    </svg>
                                @else
                                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#667eea" stroke="#667eea" stroke-width="1"/>
                                    </svg>
                                @endif
                            </div>
                            <h3>{{ $techName }}</h3>
                            <p>{{ $techDesc }}</p>
                        </div>
                    @endforeach
                @else
                    <p style="grid-column: 1 / -1; text-align: center; color: white;">Tech stack tidak tersedia</p>
                @endif
            </div>

        </div>
    </section>

    <section class="section" id="projects">

    <div class="container">

        <div class="section-title">
            <h2>Projek Saya</h2>
            <p>Beberapa project yang pernah saya kerjakan</p>
        </div>

        <div class="projects-grid">

            @if($projeks->count() > 0)
                @foreach($projeks as $projek)

                    <div class="project-card">

                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px; gap:10px;">

                            <h3 style="margin-bottom:0;">
                                {{ $projek->judul ?? '-' }}
                            </h3>

                            <span
                                style="
                                    background:
                                    {{ $projek->status_progress == 'Selesai'
                                        ? 'linear-gradient(135deg,#22c55e,#16a34a)'
                                        : 'linear-gradient(135deg,#ef4444,#dc2626)' }};

                                    color:white;
                                    padding:6px 14px;
                                    border-radius:20px;
                                    font-size:11px;
                                    font-weight:600;
                                    white-space:nowrap;
                                "
                            >
                                {{ $projek->status_progress ?? '-' }}
                            </span>

                        </div>

                        <p>
                            {{ $projek->deskripsi ?? '-' }}
                        </p>

                        <div style="margin-top:25px;">

                            <a
                                href="/projek/{{ $projek->id }}"
                                style="
                                    background:#667eea;
                                    color:white;
                                    padding:10px 20px;
                                    border-radius:12px;
                                    text-decoration:none;
                                    font-weight:600;
                                    display:inline-block;
                                "
                            >
                                Detail Projek →
                            </a>

                        </div>

                    </div>

                @endforeach
            @else
                <p style="grid-column: 1 / -1; text-align: center; color: white;">Projek tidak tersedia</p>
            @endif

        </div>

    </div>

</section>

    <section class="section" id="contact">
        <div class="container">

            <div class="section-title">
                <h2>Kontak</h2>
                <p>Hubungi saya melalui informasi berikut</p>
            </div>

            <div class="contact-wrapper">

                <div class="contact-box">
                    <h3>Informasi Kontak</h3>

                    <div class="contact-item">
                        <strong>Nama</strong>
                        <p>{{ $profil->nama ?? '-' }}</p>
                    </div>

                    <div class="contact-item">
                        <strong>Email</strong>
                        <p>{{ $profil->email ?? '-' }}</p>
                    </div>

                    <div class="contact-item">
                        <strong>No Telpon</strong>
                        <p>{{ $profil->no_telpon ?? '-' }}</p>
                    </div>

                    <div class="contact-item">
                        <strong>GitHub</strong>
                        <a href="{{ $profil->github ?? '#' }}" target="_blank">
                            {{ $profil->github ?? '-' }}
                        </a>
                    </div>
                </div>

                <div class="contact-form">
                    <h3>Kirim Pesan</h3>

                    @if(session('success'))
                        <div style="
                            background: linear-gradient(135deg, #22c55e, #16a34a);
                            color: white;
                            padding: 16px 18px;
                            border-radius: 14px;
                            margin-bottom: 20px;
                            font-weight: 600;
                            text-align: center;
                        ">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <span style="color: #ef4444; font-size: 13px; margin-top: 4px; display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            @error('email')
                                <span style="color: #ef4444; font-size: 13px; margin-top: 4px; display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="pesan" placeholder="Pesan" required>{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <span style="color: #ef4444; font-size: 13px; margin-top: 4px; display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </section>

    <footer>
        <div class="container">
            © {{ date('Y') }} {{ $profil->nama ?? 'Portfolio' }} — Junior Laravel Developer Portfolio
        </div>
    </footer>

</body>
</html>
