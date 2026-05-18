<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wilson Fabian | Portfolio</title>

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
        }

        .skill-card:hover {
            transform: translateY(-8px);
        }

        .skill-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
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
        }

        .skill-card p {
            color: #64748b;
            line-height: 1.7;
            font-size: 14px;
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
            <div class="logo">portofolio</div>

            <div class="menu">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#projects">Projek</a>
                <a href="#contact">Kontak</a>
                <a href="/admin">Admin</a>
            </div>
        </div>
    </nav>

    <section class="hero" id="home">
        <div class="container hero-wrapper">

            <div class="hero-text">
                <span>Junior Laravel Developer</span>

                <h1>
                    Halo, Saya <br>
                    Wilson Fabian 👋
                </h1>

                <p>
                    Mahasiswa Teknik Informatika yang fokus mempelajari Laravel,
                    Filament V3, Docker, MariaDB, dan pengembangan web modern.
                    Saya tertarik membangun aplikasi web yang clean, scalable,
                    dan modern.
                </p>

                <div class="hero-buttons">
                    <a href="#projects" class="btn btn-primary">
                        Lihat Projek
                    </a>

                    <a href="https://github.com/wilson092" target="_blank" class="btn btn-secondary">
                        GitHub
                    </a>
                </div>
            </div>

            <div class="hero-card">
                <h3>Tech Stack</h3>

                <ul>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 17L12 22L22 17" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Laravel
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4H20V20H4V4Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 8H16V16H8V8Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Filament V3
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#FBBF24" stroke="#FBBF24" stroke-width="1"/>
                        </svg>
                        Livewire
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#38BDF8" stroke="#38BDF8" stroke-width="1"/>
                        </svg>
                        Blade
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4L20 4" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M4 12L20 12" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M4 20L20 20" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                            <circle cx="7" cy="4" r="1.5" fill="#2496ED"/>
                            <circle cx="7" cy="12" r="1.5" fill="#2496ED"/>
                            <circle cx="7" cy="20" r="1.5" fill="#2496ED"/>
                        </svg>
                        Docker
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="12" cy="5" rx="9" ry="3" stroke="#00758D" stroke-width="1.5"/>
                            <path d="M3 5V19C3 20.66 7 22 12 22C17 22 21 20.66 21 19V5" stroke="#00758D" stroke-width="1.5"/>
                            <path d="M3 12C3 13.66 7 15 12 15C17 15 21 13.66 21 12" stroke="#00758D" stroke-width="1.5"/>
                        </svg>
                        MariaDB
                    </li>
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
               Nama saya Wilson Fabian, mahasiswa Teknik Informatika semester 4. Saya mulai tertarik dengan dunia 
               programming sejak masa SMK, dan sekarang saya terus mengembangkan kemampuan saya di Universitas Esa Unggul.
                Saya senang mengerjakan project-project yang bermanfaat, 
                karena saya percaya teknologi bisa membantu mempermudah kehidupan banyak orang. 
              
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
                <div class="skill-card">
                    <div class="skill-icon">
                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 17L12 22L22 17" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Laravel</h3>
                    <p>PHP Framework untuk aplikasi enterprise</p>
                </div>

                <div class="skill-card">
                    <div class="skill-icon">
                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4H20V20H4V4Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 8H16V16H8V8Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Filament V3</h3>
                    <p>Admin panel modern untuk Laravel</p>
                </div>

                <div class="skill-card">
                    <div class="skill-icon">
                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#FBBF24" stroke="#FBBF24" stroke-width="1"/>
                        </svg>
                    </div>
                    <h3>Livewire</h3>
                    <p>Full-stack reactive components</p>
                </div>

                <div class="skill-card">
                    <div class="skill-icon">
                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#38BDF8" stroke="#38BDF8" stroke-width="1"/>
                        </svg>
                    </div>
                    <h3>Blade</h3>
                    <p>Template engine Laravel</p>
                </div>

                <div class="skill-card">
                    <div class="skill-icon">
                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4L20 4" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M4 12L20 12" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M4 20L20 20" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/>
                            <circle cx="7" cy="4" r="1.5" fill="#2496ED"/>
                            <circle cx="7" cy="12" r="1.5" fill="#2496ED"/>
                            <circle cx="7" cy="20" r="1.5" fill="#2496ED"/>
                        </svg>
                    </div>
                    <h3>Docker</h3>
                    <p>Containerization & deployment</p>
                </div>

                <div class="skill-card">
                    <div class="skill-icon">
                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="12" cy="5" rx="9" ry="3" stroke="#00758D" stroke-width="1.5"/>
                            <path d="M3 5V19C3 20.66 7 22 12 22C17 22 21 20.66 21 19V5" stroke="#00758D" stroke-width="1.5"/>
                            <path d="M3 12C3 13.66 7 15 12 15C17 15 21 13.66 21 12" stroke="#00758D" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <h3>MariaDB</h3>
                    <p>Relational database management</p>
                </div>

                <div class="skill-card">
                    <div class="skill-icon">
                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 0C5.37 0 0 5.37 0 12C0 17.3 3.44 21.8 8.21 23.39C8.81 23.5 9.03 23.13 9.03 22.81C9.03 22.51 9.02 21.8 9.02 20.95C6.68 21.42 5.91 19.96 5.66 19.23C5.52 18.86 4.96 17.63 4.46 17.34C4.05 17.11 3.48 16.64 4.45 16.63C5.38 16.62 6.04 17.48 6.28 17.86C7.29 19.54 8.92 19.09 9.07 18.77C9.18 18.34 9.34 17.97 9.51 17.75C7.83 17.58 6.07 16.86 6.07 12.65C6.07 11.44 6.48 10.44 7.15 9.67C7.03 9.49 6.66 8.35 7.23 6.82C7.23 6.82 8.04 6.62 9.03 7.36C9.79 7.07 10.61 6.93 11.42 6.92C12.23 6.93 13.05 7.07 13.81 7.36C14.8 6.62 15.61 6.82 15.61 6.82C16.18 8.35 15.81 9.49 15.69 9.67C16.36 10.44 16.77 11.43 16.77 12.65C16.77 16.87 15 17.58 13.31 17.74C13.52 17.93 13.7 18.26 13.7 18.78C13.7 19.54 13.68 20.8 13.68 20.95C13.68 21.27 13.9 21.64 14.5 21.51C19.27 19.93 22.72 15.41 22.72 10.08C22.72 4.79 17.87 0.13 12.02 0.13L12 0Z" fill="#24292E"/>
                        </svg>
                    </div>
                    <h3>Git</h3>
                    <p>Version control system</p>
                </div>

                <div class="skill-card">
                    <div class="skill-icon">
                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2Z" stroke="#06B6D4" stroke-width="1.5"/>
                            <path d="M8 12L11 15L16 9" stroke="#06B6D4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>TailwindCSS</h3>
                    <p>Utility-first CSS framework</p>
                </div>
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

    <!-- Project 1: WeatherInsight (Proyek Akhir) -->
    <div class="project-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <h3 style="margin-bottom: 0;">🌤️ WeatherInsight</h3>
            <span style="background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 600;">⭐ PROYEK AKHIR</span>
        </div>
        <p>
            Website monitoring cuaca realtime berbasis Laravel dan Filament.
            <strong>Proyek ini merupakan tugas akhir mata kuliah Pemrograman Web (CR002).</strong>
        </p>
        <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: 20px;">
            <a href="https://github.com/wilson092/WeatherInsight" target="_blank" style="color: #667eea; font-weight: 600; text-decoration: none;">
                Lihat GitHub →
            </a>
            <a href="/docs/Laporan%20Awal%20Projek%20Akhir%20-20240801098%20Wilson%20Fabian.pdf" target="_blank" style="background: #667eea; color: white; padding: 8px 18px; border-radius: 10px; font-weight: 500; text-decoration: none; font-size: 14px; display: inline-block;">
                📄 Lihat Laporan →
            </a>
        </div>
    </div>

    <!-- Project 2: Currency Converter -->
    <div class="project-card">
        <h3>💱 Currency Converter</h3>
        <p>
            Aplikasi konversi mata uang secara realtime dengan data kurs terkini.
        </p>
        <a href="https://github.com/wilson092/PROJECT-AKHIR-PBO-CR001-" target="_blank" style="color: #667eea; font-weight: 600; text-decoration: none;">
            Lihat GitHub →
        </a>
    </div>

    <!-- Project 3: Grafik Kalkulus 2D -->
    <div class="project-card">
        <h3>📈 Grafik Kalkulus 2D</h3>
        <p>
            Aplikasi visualisasi grafik fungsi matematika dua dimensi interaktif.
        </p>
        <a href="https://github.com/wilson092/Grafik-Kalkulus-2D" target="_blank" style="color: #667eea; font-weight: 600; text-decoration: none;">
            Lihat GitHub →
        </a>
    </div>

    <!-- Project 4: Chatbot Sederhana -->
    <div class="project-card">
        <h3>🤖 Chatbot Sederhana</h3>
        <p>
            Aplikasi chatbot sederhana untuk belajar API dan integrasi AI.
        </p>
        <a href="https://github.com/wilson092/Chatbot" target="_blank" style="color: #667eea; font-weight: 600; text-decoration: none;">
            Lihat GitHub →
        </a>
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
                        <p>Wilson Fabian</p>
                    </div>

                    <div class="contact-item">
                        <strong>Email</strong>
                        <p>wilsonfabian6218@student.esaunggul.ac.id</p>
                    </div>

                    <div class="contact-item">
                        <strong>No Telpon</strong>
                        <p>081218619215</p>
                    </div>

                    <div class="contact-item">
                        <strong>GitHub</strong>
                        <a href="https://github.com/wilson092" target="_blank">
                            github.com/wilson092
                        </a>
                    </div>
                </div>

                <div class="contact-form">
                    <h3>Kirim Pesan</h3>

                    <form>
                        <div class="form-group">
                            <input type="text" placeholder="Nama">
                        </div>

                        <div class="form-group">
                            <input type="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <textarea placeholder="Pesan"></textarea>
                        </div>

                        <button class="btn btn-primary">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </section>

    <footer>
        <div class="container">
            © 2026 Wilson Fabian — Junior Laravel Developer Portfolio
        </div>
    </footer>

</body>
</html>
