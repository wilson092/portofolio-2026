<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profil->nama ?? 'Portfolio' }} | Portfolio</title>

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
            --card: rgba(255,255,255,0.82);
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

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--bg);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        a { text-decoration: none; color: inherit; }

        /* ─── BACKGROUND DECORATION ─────────────────── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 900px 600px at 10% 0%, rgba(201,168,76,0.07) 0%, transparent 70%),
                radial-gradient(ellipse 700px 500px at 90% 80%, rgba(201,168,76,0.05) 0%, transparent 70%),
                radial-gradient(ellipse 500px 400px at 50% 50%, rgba(201,168,76,0.03) 0%, transparent 70%);
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

        .container {
            width: 90%;
            max-width: 1160px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* ─── NAVBAR ─────────────────────────────────── */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
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
            background: rgba(245,243,239,0.82);
            backdrop-filter: blur(18px) saturate(1.4);
            -webkit-backdrop-filter: blur(18px) saturate(1.4);
            border: 1px solid var(--border2);
            border-radius: var(--radius-pill);
            box-shadow: var(--shadow-sm), 0 0 0 1px rgba(201,168,76,0.08) inset;
            transition: background var(--transition), box-shadow var(--transition);
        }

        .navbar-inner.scrolled {
            background: rgba(245,243,239,0.96);
            box-shadow: var(--shadow-md);
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: -0.3px;
            position: relative;
        }

        .logo::after {
            content: '.';
            color: var(--accent);
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .menu a {
            color: var(--ink2);
            font-weight: 500;
            font-size: 14.5px;
            padding: 7px 16px;
            border-radius: var(--radius-pill);
            transition: background var(--transition), color var(--transition);
            letter-spacing: 0.01em;
        }

        .menu a:hover {
            background: var(--accent-dim);
            color: var(--ink);
        }

        .nav-cta {
            background: var(--ink) !important;
            color: var(--white) !important;
            padding: 8px 20px !important;
        }

        .nav-cta:hover {
            background: var(--ink2) !important;
            transform: none;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 6px;
        }

        .hamburger span {
            display: block;
            width: 22px;
            height: 2px;
            background: var(--ink);
            border-radius: 2px;
            transition: var(--transition);
        }

        /* ─── HERO ───────────────────────────────────── */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 140px 0 100px;
            position: relative;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 70px;
            align-items: center;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 18px;
            border: 1px solid var(--border);
            border-radius: var(--radius-pill);
            background: var(--accent-dim);
            color: var(--ink2);
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        .hero-eyebrow::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--accent);
            flex-shrink: 0;
            box-shadow: 0 0 0 3px rgba(201,168,76,0.25);
            animation: pulse 2.2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 0 3px rgba(201,168,76,0.25); }
            50% { box-shadow: 0 0 0 6px rgba(201,168,76,0.1); }
        }

        .hero-name {
            font-family: 'Playfair Display', serif;
            font-size: clamp(48px, 7vw, 82px);
            line-height: 1.05;
            letter-spacing: -2px;
            color: var(--ink);
            margin-bottom: 22px;
            font-weight: 700;
        }

        .hero-name .accent-word {
            color: var(--accent);
            font-style: italic;
        }

        .hero-desc {
            font-size: 17px;
            line-height: 1.85;
            color: var(--ink3);
            max-width: 520px;
            margin-bottom: 42px;
            font-weight: 300;
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            align-items: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border-radius: var(--radius-pill);
            font-weight: 600;
            font-size: 15px;
            transition: all var(--transition);
            border: none;
            cursor: pointer;
            letter-spacing: 0.01em;
        }

        .btn-primary {
            background: var(--ink);
            color: var(--white);
            box-shadow: 0 4px 24px rgba(26,24,22,0.2);
        }

        .btn-primary:hover {
            background: var(--ink2);
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(26,24,22,0.25);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--ink);
            border: 1px solid var(--border2);
            box-shadow: var(--shadow-sm);
        }

        .btn-secondary:hover {
            background: var(--bg2);
            border-color: var(--border);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-ghost {
            background: transparent;
            color: var(--accent);
            padding: 14px 0;
            border-radius: 0;
            border-bottom: 1.5px solid var(--accent);
            letter-spacing: 0.02em;
        }

        .btn-ghost:hover {
            color: var(--ink);
            border-color: var(--ink);
        }

        /* Hero Stack Card */
        .stack-card {
            background: var(--white);
            border-radius: 28px;
            padding: 36px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border2);
            position: relative;
            overflow: hidden;
        }

        .stack-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), var(--accent2), transparent);
        }

        .stack-card-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--ink3);
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stack-card-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border2);
        }

        .stack-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .stack-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: var(--radius-sm);
            color: var(--ink2);
            font-weight: 500;
            font-size: 14.5px;
            transition: background var(--transition), transform var(--transition);
            cursor: default;
        }

        .stack-list li:hover {
            background: var(--bg);
            transform: translateX(4px);
        }

        .stack-list li svg {
            flex-shrink: 0;
            opacity: 0.85;
        }

        .stack-list li .tech-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--accent);
            flex-shrink: 0;
            margin-left: auto;
            opacity: 0;
            transition: opacity var(--transition);
        }

        .stack-list li:hover .tech-dot {
            opacity: 1;
        }

        /* ─── SECTION COMMONS ────────────────────────── */
        .section {
            padding: 100px 0;
            position: relative;
        }

        .section-header {
            margin-bottom: 64px;
        }

        .section-tag {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 14px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(32px, 4.5vw, 52px);
            font-weight: 700;
            color: var(--ink);
            letter-spacing: -1.2px;
            line-height: 1.1;
        }

        .section-subtitle {
            color: var(--ink3);
            font-size: 16px;
            margin-top: 12px;
            font-weight: 300;
        }

        /* ─── ABOUT ──────────────────────────────────── */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: start;
        }

        .about-text-block {
            background: var(--white);
            border-radius: 24px;
            padding: 44px;
            border: 1px solid var(--border2);
            box-shadow: var(--shadow-md);
            line-height: 1.9;
            color: var(--ink3);
            font-size: 16px;
            font-weight: 300;
            position: relative;
        }

        .about-text-block::before {
            content: '\201C';
            font-family: 'Playfair Display', serif;
            font-size: 100px;
            color: var(--accent);
            opacity: 0.15;
            position: absolute;
            top: 10px;
            left: 30px;
            line-height: 1;
        }

        .about-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .stat-card {
            background: var(--white);
            border: 1px solid var(--border2);
            border-radius: 20px;
            padding: 28px 24px;
            box-shadow: var(--shadow-sm);
            transition: transform var(--transition), box-shadow var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .stat-card:first-child {
            grid-column: 1 / -1;
            background: linear-gradient(135deg, var(--ink) 0%, #2d2a26 100%);
            color: var(--white);
            border-color: transparent;
        }

        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            font-weight: 700;
            color: var(--accent);
            line-height: 1;
            margin-bottom: 6px;
        }

        .stat-card:first-child .stat-label {
            color: rgba(255,255,255,0.7);
        }

        .stat-label {
            font-size: 13px;
            color: var(--ink3);
            font-weight: 500;
            letter-spacing: 0.02em;
        }

        .stat-card .stat-body {
            font-size: 14px;
            color: rgba(255,255,255,0.6);
            margin-top: 8px;
            line-height: 1.6;
            font-weight: 300;
        }

        /* ─── SKILLS ─────────────────────────────────── */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 18px;
        }

        .skill-card {
            background: var(--white);
            padding: 28px 24px;
            border-radius: 20px;
            border: 1px solid var(--border2);
            box-shadow: var(--shadow-sm);
            transition: all var(--transition);
            text-align: center;
            position: relative;
            overflow: hidden;
            cursor: default;
        }

        .skill-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--tech-color, var(--accent)), transparent);
            opacity: 0;
            transition: opacity var(--transition);
        }

        .skill-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
            border-color: var(--border);
        }

        .skill-card:hover::after {
            opacity: 1;
        }

        .skill-icon-wrap {
            width: 52px;
            height: 52px;
            margin: 0 auto 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg);
            border-radius: 14px;
            border: 1px solid var(--border2);
            transition: all var(--transition);
        }

        .skill-card:hover .skill-icon-wrap {
            background: var(--accent-dim);
            border-color: var(--border);
            transform: scale(1.08) rotate(-3deg);
        }

        .skill-card h3 {
            font-size: 15px;
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 8px;
        }

        .skill-card p {
            font-size: 13px;
            color: var(--ink3);
            line-height: 1.6;
            font-weight: 300;
        }

        /* ─── PROJECTS ───────────────────────────────── */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 22px;
        }

        .project-card {
            background: var(--white);
            border-radius: 24px;
            padding: 36px;
            border: 1px solid var(--border2);
            box-shadow: var(--shadow-sm);
            transition: all var(--transition);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--accent), transparent);
            opacity: 0;
            transition: opacity var(--transition);
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: var(--border);
        }

        .project-card:hover::before {
            opacity: 1;
        }

        .project-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 16px;
        }

        .project-card h3 {
            font-size: 19px;
            font-weight: 700;
            color: var(--ink);
            line-height: 1.3;
            letter-spacing: -0.3px;
        }

        .project-status {
            flex-shrink: 0;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 5px 13px;
            border-radius: var(--radius-pill);
        }

        .status-done {
            background: rgba(34, 197, 94, 0.1);
            color: #15803d;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .status-progress {
            background: rgba(234, 179, 8, 0.1);
            color: #854d0e;
            border: 1px solid rgba(234, 179, 8, 0.2);
        }

        .project-card p {
            color: var(--ink3);
            font-size: 14.5px;
            line-height: 1.75;
            font-weight: 300;
            flex: 1;
            margin-bottom: 28px;
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
            color: var(--ink);
            padding: 10px 20px;
            border-radius: var(--radius-sm);
            border: 1.5px solid var(--border2);
            width: fit-content;
            transition: all var(--transition);
        }

        .project-link:hover {
            background: var(--ink);
            color: var(--white);
            border-color: var(--ink);
        }

        .project-link svg {
            transition: transform var(--transition);
        }

        .project-link:hover svg {
            transform: translateX(3px);
        }

        /* ─── CONTACT ────────────────────────────────── */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.4fr;
            gap: 28px;
        }

        .contact-info {
            background: linear-gradient(160deg, var(--ink) 0%, #24211e 100%);
            border-radius: 24px;
            padding: 44px;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .contact-info::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201,168,76,0.12) 0%, transparent 70%);
        }

        .contact-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .contact-info .contact-intro {
            color: rgba(255,255,255,0.5);
            font-size: 14.5px;
            font-weight: 300;
            margin-bottom: 40px;
            line-height: 1.7;
        }

        .contact-items {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .contact-item-row {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-item-text strong {
            display: block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            margin-bottom: 3px;
        }

        .contact-item-text span,
        .contact-item-text a {
            font-size: 14.5px;
            color: rgba(255,255,255,0.85);
            font-weight: 400;
        }

        .contact-form-box {
            background: var(--white);
            border-radius: 24px;
            padding: 44px;
            border: 1px solid var(--border2);
            box-shadow: var(--shadow-md);
        }

        .contact-form-box h3 {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 8px;
            letter-spacing: -0.4px;
        }

        .contact-form-box .form-intro {
            color: var(--ink3);
            font-size: 14px;
            font-weight: 300;
            margin-bottom: 30px;
        }

        .success-msg {
            background: rgba(34,197,94,0.08);
            border: 1px solid rgba(34,197,94,0.2);
            color: #166534;
            padding: 14px 18px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--ink3);
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px 18px;
            border-radius: var(--radius-sm);
            border: 1.5px solid var(--border2);
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            color: var(--ink);
            outline: none;
            transition: all var(--transition);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: var(--ink3);
            font-weight: 300;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--accent);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(201,168,76,0.1);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-error {
            color: #dc2626;
            font-size: 12.5px;
            margin-top: 5px;
            display: block;
        }

        /* ─── FOOTER ─────────────────────────────────── */
        footer {
            border-top: 1px solid var(--border2);
            padding: 40px 0;
            background: var(--white);
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--ink);
        }

        .footer-logo::after {
            content: '.';
            color: var(--accent);
        }

        .footer-copy {
            font-size: 13.5px;
            color: var(--ink3);
            font-weight: 300;
        }

        .footer-links {
            display: flex;
            gap: 6px;
        }

        .footer-links a {
            font-size: 13px;
            color: var(--ink3);
            font-weight: 500;
            padding: 6px 14px;
            border-radius: var(--radius-pill);
            transition: background var(--transition), color var(--transition);
        }

        .footer-links a:hover {
            background: var(--bg);
            color: var(--ink);
        }

        /* ─── DIVIDER ────────────────────────────────── */
        .divider {
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--border2) 30%, var(--border2) 70%, transparent);
            margin: 0;
        }

        /* ─── MOBILE MENU ────────────────────────────── */
        .mobile-menu {
            display: none;
            flex-direction: column;
            gap: 4px;
            padding: 16px 28px 20px;
            border-top: 1px solid var(--border2);
            margin-top: 12px;
        }

        .mobile-menu.open {
            display: flex;
        }

        .mobile-menu a {
            color: var(--ink2);
            font-weight: 500;
            font-size: 15px;
            padding: 10px 0;
            border-bottom: 1px solid var(--border2);
        }

        .mobile-menu a:last-child {
            border-bottom: none;
        }

        /* ─── RESPONSIVE ─────────────────────────────── */
        @media (max-width: 980px) {
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 48px;
            }

            .hero-name {
                font-size: clamp(40px, 8vw, 62px);
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .about-stats {
                grid-template-columns: repeat(3, 1fr);
            }

            .about-stats .stat-card:first-child {
                grid-column: 1 / -1;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .navbar-inner {
                border-radius: var(--radius);
                margin: 12px;
                width: calc(100% - 24px);
                padding: 12px 18px;
            }

            .menu {
                display: none;
            }

            .hamburger {
                display: flex;
            }

            .hero {
                padding: 110px 0 70px;
            }

            .hero-name {
                font-size: 38px;
                letter-spacing: -1px;
            }

            .about-stats {
                grid-template-columns: 1fr 1fr;
            }

            .contact-info,
            .contact-form-box,
            .about-text-block {
                padding: 28px;
            }

            .footer-inner {
                flex-direction: column;
                text-align: center;
            }

            .section {
                padding: 70px 0;
            }
        }

        /* ─── ANIMATIONS ─────────────────────────────── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .animate-up {
            animation: fadeUp 0.7s cubic-bezier(0.4,0,0.2,1) both;
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.22s; }
        .delay-3 { animation-delay: 0.34s; }
        .delay-4 { animation-delay: 0.46s; }
    </style>
</head>
<body>

<div class="noise-overlay" aria-hidden="true"></div>

<!-- ─── NAVBAR ─────────────────────────────── -->
<nav id="navbar">
    <div class="navbar-inner" id="navbarInner">
        <div class="logo">{{ $profil->nama ?? 'Portfolio' }}</div>

        <div class="menu">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#projects">Projek</a>
            <a href="#contact">Kontak</a>
            <a href="#contact" class="btn btn-secondary nav-cta" style="padding:8px 20px; font-size:14px;">Hire Me</a>
        </div>

        <button class="hamburger" id="hamburger" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <div id="mobileMenu" class="mobile-menu" style="max-width:calc(100% - 24px); margin:0 12px; background:rgba(245,243,239,0.98); border-radius:0 0 var(--radius) var(--radius); backdrop-filter:blur(18px); border:1px solid var(--border2); border-top:none; display:none; padding:12px 20px 16px;">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#skills">Skills</a>
        <a href="#projects">Projek</a>
        <a href="#contact">Kontak</a>
    </div>
</nav>

<!-- ─── HERO ────────────────────────────────── -->
<section class="hero" id="home">
    <div class="container">
        <div class="hero-grid">

            <div class="hero-text">
                <div class="hero-eyebrow animate-up">{{ $profil->profesi ?? 'Laravel Developer & Builder' }}</div>

                <h1 class="hero-name animate-up delay-1">
                    Halo, Saya<br>
                    <span class="accent-word">{{ $profil->nama ?? '-' }}</span> 👋
                </h1>

                <div class="hero-actions animate-up delay-3">
                    <a href="#projects" class="btn btn-primary">
                        Lihat Projek
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="{{ $profil->github ?? '#' }}" target="_blank" class="btn btn-secondary">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.23 1.84 1.23 1.07 1.84 2.81 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23A11.5 11.5 0 0 1 12 6.8c1.02 0 2.04.14 3 .4 2.28-1.55 3.29-1.23 3.29-1.23.66 1.66.25 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57C20.57 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg>
                        GitHub
                    </a>
                </div>
            </div>

            <div class="stack-card animate-up delay-4">
                <div class="stack-card-label">Tech Stack</div>
                <ul class="stack-list">
                    @if($profil && $profil->tech_stack && is_array($profil->tech_stack))
                        @foreach($profil->tech_stack as $tech)
                            @php
                                $techName = is_array($tech) ? ($tech['name'] ?? $tech) : $tech;
                                $techNameLower = strtolower($techName);
                            @endphp
                            <li>
                                @if(strpos($techNameLower, 'laravel') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 17L12 22L22 17" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 12L12 17L22 12" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                @elseif(strpos($techNameLower, 'filament') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4 4H20V20H4V4Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 8H16V16H8V8Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                @elseif(strpos($techNameLower, 'livewire') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#FBBF24" stroke="#FBBF24" stroke-width="1"/></svg>
                                @elseif(strpos($techNameLower, 'blade') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#38BDF8" stroke="#38BDF8" stroke-width="1"/></svg>
                                @elseif(strpos($techNameLower, 'docker') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4 4L20 4" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/><path d="M4 12L20 12" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/><path d="M4 20L20 20" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/><circle cx="7" cy="4" r="1.5" fill="#2496ED"/><circle cx="7" cy="12" r="1.5" fill="#2496ED"/><circle cx="7" cy="20" r="1.5" fill="#2496ED"/></svg>
                                @elseif(strpos($techNameLower, 'mariadb') !== false || strpos($techNameLower, 'mysql') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><ellipse cx="12" cy="5" rx="9" ry="3" stroke="#00758D" stroke-width="1.5"/><path d="M3 5V19C3 20.66 7 22 12 22C17 22 21 20.66 21 19V5" stroke="#00758D" stroke-width="1.5"/><path d="M3 12C3 13.66 7 15 12 15C17 15 21 13.66 21 12" stroke="#00758D" stroke-width="1.5"/></svg>
                                @elseif(strpos($techNameLower, 'github') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.23 1.84 1.23 1.07 1.84 2.81 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23A11.5 11.5 0 0 1 12 6.8c1.02 0 2.04.14 3 .4 2.28-1.55 3.29-1.23 3.29-1.23.66 1.66.25 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57C20.57 21.8 24 17.3 24 12 24 5.37 18.63 0 12 0z" fill="#24292E"/></svg>
                                @elseif(strpos($techNameLower, 'git') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.23 1.84 1.23 1.07 1.84 2.81 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23A11.5 11.5 0 0 1 12 6.8c1.02 0 2.04.14 3 .4 2.28-1.55 3.29-1.23 3.29-1.23.66 1.66.25 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57C20.57 21.8 24 17.3 24 12 24 5.37 18.63 0 12 0z" fill="#F05032"/></svg>
                                @elseif(strpos($techNameLower, 'tailwind') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2Z" stroke="#06B6D4" stroke-width="1.5"/><path d="M8 12L11 15L16 9" stroke="#06B6D4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                @elseif(strpos($techNameLower, 'php') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><ellipse cx="12" cy="12" rx="10" ry="6" stroke="#777BB4" stroke-width="1.5"/><path d="M9 10H11C12 10 13 10.5 13 12C13 13.5 12 14 11 14H9V10Z" stroke="#777BB4" stroke-width="1.2"/><path d="M15 10H17C18 10 19 10.5 19 12C19 13.5 18 14 17 14H15V10Z" stroke="#777BB4" stroke-width="1.2"/></svg>
                                @elseif(strpos($techNameLower, 'javascript') !== false || strpos($techNameLower, 'js') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="2" stroke="#F7DF1E" stroke-width="1.5"/><path d="M8 13C8 14.5 7.5 16 6 16" stroke="#F7DF1E" stroke-width="1.5" stroke-linecap="round"/><path d="M16 13C16 14.5 16.5 16 18 16" stroke="#F7DF1E" stroke-width="1.5" stroke-linecap="round"/></svg>
                                @elseif(strpos($techNameLower, 'react') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="2" stroke="#61DAFB" stroke-width="1.5"/><ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5"/><ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5" transform="rotate(60 12 12)"/><ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5" transform="rotate(120 12 12)"/></svg>
                                @elseif(strpos($techNameLower, 'vue') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 2L3 20H9L12 14L15 20H21L12 2Z" stroke="#4FC08D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                @elseif(strpos($techNameLower, 'html') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M3 2L5 20L12 22L19 20L21 2H3Z" stroke="#E34C26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                @elseif(strpos($techNameLower, 'css') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M3 2L5 20L12 22L19 20L21 2H3Z" stroke="#563D7C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                @elseif(strpos($techNameLower, 'figma') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.5" stroke="#F24E1E" stroke-width="1.5"/><path d="M8.5 14.5C8.5 12.567 9.567 11 12 11C14.433 11 15.5 12.567 15.5 14.5C15.5 16.433 14.433 17 12 17C9.567 17 8.5 16.433 8.5 14.5Z" stroke="#F24E1E" stroke-width="1.5"/></svg>
                                @elseif(strpos($techNameLower, 'bootstrap') !== false)
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="2" stroke="#7952B3" stroke-width="1.5"/><path d="M8 9H12C13.1 9 14 9.9 14 11C14 12.1 13.1 13 12 13H8V9Z" stroke="#7952B3" stroke-width="1.5"/><path d="M8 13H12C13.1 13 14 13.9 14 15C14 16.1 13.1 17 12 17H8V13Z" stroke="#7952B3" stroke-width="1.5"/></svg>
                                @else
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="4" fill="var(--accent)" opacity="0.6"/><circle cx="12" cy="12" r="9" stroke="var(--accent)" stroke-width="1.5" opacity="0.4"/></svg>
                                @endif
                                {{ $techName }}
                                <span class="tech-dot"></span>
                            </li>
                        @endforeach
                    @else
                        <li>Tech stack tidak tersedia</li>
                    @endif
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- ─── ABOUT ────────────────────────────────── -->
<section class="section" id="about" style="background: var(--bg2);">
    <div class="container">

        <div class="section-header">
            <div class="section-tag">Tentang</div>
            <h2 class="section-title">Tentang Saya</h2>
            <p class="section-subtitle">Profil singkat dan fokus pembelajaran saya</p>
        </div>

        <div class="about-grid">
            <div class="about-text-block">
                {{ $profil->deskripsi ?? 'Konten tidak tersedia' }}
            </div>

            <div class="about-stats">
                <div class="stat-card">
                    <div class="stat-number">{{ $projeks->count() }}</div>
                    <div class="stat-label">Proyek Dikerjakan</div>
                    <div class="stat-body">Dari berbagai skala dan kebutuhan bisnis, selalu berorientasi pada kualitas.</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $profil->tech_stack ? count($profil->tech_stack) : 0 }}</div>
                    <div class="stat-label">Tech Stack</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ date('Y') }}</div>
                    <div class="stat-label">Tahun Aktif</div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ─── SKILLS ───────────────────────────────── -->
<section class="section" id="skills">
    <div class="container">

        <div class="section-header">
            <div class="section-tag">Keahlian</div>
            <h2 class="section-title">Skill &amp; Tech Stack</h2>
            <p class="section-subtitle">Teknologi yang saya kuasai</p>
        </div>

        <div class="skills-grid">
            @if($profil && $profil->tech_stack && is_array($profil->tech_stack))
                @foreach($profil->tech_stack as $tech)
                    @php
                        $techName = is_array($tech) ? ($tech['name'] ?? 'Tech') : $tech;
                        $techDesc = is_array($tech) ? ($tech['description'] ?? 'Teknologi yang dikuasai') : 'Teknologi yang dikuasai';
                        $techNameLower = strtolower($techName);
                        $borderColor = '#c9a84c';
                        if(strpos($techNameLower, 'laravel') !== false) $borderColor = '#FF2D20';
                        elseif(strpos($techNameLower, 'filament') !== false) $borderColor = '#10B981';
                        elseif(strpos($techNameLower, 'livewire') !== false) $borderColor = '#FBBF24';
                        elseif(strpos($techNameLower, 'blade') !== false) $borderColor = '#38BDF8';
                        elseif(strpos($techNameLower, 'docker') !== false) $borderColor = '#2496ED';
                        elseif(strpos($techNameLower, 'mariadb') !== false || strpos($techNameLower, 'mysql') !== false) $borderColor = '#00758D';
                        elseif(strpos($techNameLower, 'git') !== false && strpos($techNameLower, 'github') === false) $borderColor = '#F05032';
                        elseif(strpos($techNameLower, 'github') !== false) $borderColor = '#24292E';
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
                    <div class="skill-card" style="--tech-color: {{ $borderColor }}">
                        <div class="skill-icon-wrap">
                            @if(strpos($techNameLower, 'laravel') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 17L12 22L22 17" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 12L12 17L22 12" stroke="#FF2D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'filament') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M4 4H20V20H4V4Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 8H16V16H8V8Z" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'livewire') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#FBBF24" stroke="#FBBF24" stroke-width="1"/></svg>
                            @elseif(strpos($techNameLower, 'blade') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 2L15 9H22L16 14L19 21L12 16.5L5 21L8 14L2 9H9L12 2Z" fill="#38BDF8" stroke="#38BDF8" stroke-width="1"/></svg>
                            @elseif(strpos($techNameLower, 'docker') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M4 4L20 4" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/><path d="M4 12L20 12" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/><path d="M4 20L20 20" stroke="#2496ED" stroke-width="1.5" stroke-linecap="round"/><circle cx="7" cy="4" r="1.5" fill="#2496ED"/><circle cx="7" cy="12" r="1.5" fill="#2496ED"/><circle cx="7" cy="20" r="1.5" fill="#2496ED"/></svg>
                            @elseif(strpos($techNameLower, 'mariadb') !== false || strpos($techNameLower, 'mysql') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><ellipse cx="12" cy="5" rx="9" ry="3" stroke="#00758D" stroke-width="1.5"/><path d="M3 5V19C3 20.66 7 22 12 22C17 22 21 20.66 21 19V5" stroke="#00758D" stroke-width="1.5"/><path d="M3 12C3 13.66 7 15 12 15C17 15 21 13.66 21 12" stroke="#00758D" stroke-width="1.5"/></svg>
                            @elseif(strpos($techNameLower, 'github') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="#24292E"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.23 1.84 1.23 1.07 1.84 2.81 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23A11.5 11.5 0 0 1 12 6.8c1.02 0 2.04.14 3 .4 2.28-1.55 3.29-1.23 3.29-1.23.66 1.66.25 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57C20.57 21.8 24 17.3 24 12 24 5.37 18.63 0 12 0z"/></svg>
                            @elseif(strpos($techNameLower, 'git') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="6" cy="6" r="2" stroke="#F05032" stroke-width="1.5"/><circle cx="18" cy="6" r="2" stroke="#F05032" stroke-width="1.5"/><circle cx="6" cy="18" r="2" stroke="#F05032" stroke-width="1.5"/><path d="M6 8v8M8 6h8M8 18h4" stroke="#F05032" stroke-width="1.5" stroke-linecap="round"/></svg>
                            @elseif(strpos($techNameLower, 'tailwind') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2Z" stroke="#06B6D4" stroke-width="1.5"/><path d="M8 12L11 15L16 9" stroke="#06B6D4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'php') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><ellipse cx="12" cy="12" rx="10" ry="6" stroke="#777BB4" stroke-width="1.5"/><path d="M9 10H11C12 10 13 10.5 13 12C13 13.5 12 14 11 14H9V10Z" stroke="#777BB4" stroke-width="1.2"/></svg>
                            @elseif(strpos($techNameLower, 'javascript') !== false || strpos($techNameLower, 'js') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="2" stroke="#F7DF1E" stroke-width="1.5"/><path d="M8 13C8 14.5 7.5 16 6 16" stroke="#F7DF1E" stroke-width="1.5" stroke-linecap="round"/><path d="M16 13C16 14.5 16.5 16 18 16" stroke="#F7DF1E" stroke-width="1.5" stroke-linecap="round"/></svg>
                            @elseif(strpos($techNameLower, 'react') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="2" stroke="#61DAFB" stroke-width="1.5"/><ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5"/><ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5" transform="rotate(60 12 12)"/><ellipse cx="12" cy="12" rx="8" ry="4" stroke="#61DAFB" stroke-width="1.5" transform="rotate(120 12 12)"/></svg>
                            @elseif(strpos($techNameLower, 'vue') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 2L3 20H9L12 14L15 20H21L12 2Z" stroke="#4FC08D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'bootstrap') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="2" stroke="#7952B3" stroke-width="1.5"/><path d="M8 9H12C13.1 9 14 9.9 14 11C14 12.1 13.1 13 12 13H8V9Z" stroke="#7952B3" stroke-width="1.5"/><path d="M8 13H12C13.1 13 14 13.9 14 15C14 16.1 13.1 17 12 17H8V13Z" stroke="#7952B3" stroke-width="1.5"/></svg>
                            @elseif(strpos($techNameLower, 'rest api') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M4 4H20V20H4V4Z" stroke="#009B77" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 8L16 16M16 8L8 16" stroke="#009B77" stroke-width="1.5" stroke-linecap="round"/></svg>
                            @elseif(strpos($techNameLower, 'html') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M3 2L5 20L12 22L19 20L21 2H3Z" stroke="#E34C26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'css') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M3 2L5 20L12 22L19 20L21 2H3Z" stroke="#563D7C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif(strpos($techNameLower, 'figma') !== false)
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.5" stroke="#F24E1E" stroke-width="1.5"/><path d="M8.5 14.5C8.5 12.567 9.567 11 12 11C14.433 11 15.5 12.567 15.5 14.5C15.5 16.433 14.433 17 12 17C9.567 17 8.5 16.433 8.5 14.5Z" stroke="#F24E1E" stroke-width="1.5"/></svg>
                            @else
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="4" fill="var(--accent)" opacity="0.6"/><circle cx="12" cy="12" r="9" stroke="var(--accent)" stroke-width="1.5" opacity="0.4"/></svg>
                            @endif
                        </div>
                        <h3>{{ $techName }}</h3>
                        <p>{{ $techDesc }}</p>
                    </div>
                @endforeach
            @else
                <p style="grid-column: 1 / -1; text-align: center; color: var(--ink3);">Tech stack tidak tersedia</p>
            @endif
        </div>

    </div>
</section>

<!-- ─── PROJECTS ─────────────────────────────── -->
<section class="section" id="projects" style="background: var(--bg2);">
    <div class="container">

        <div class="section-header">
            <div class="section-tag">Portfolio</div>
            <h2 class="section-title">Projek Saya</h2>
            <p class="section-subtitle">Beberapa project yang pernah saya kerjakan</p>
        </div>

        <div class="projects-grid">
            @if($projeks->count() > 0)
                @foreach($projeks as $projek)
                    <div class="project-card">
                        <div class="project-header">
                            <h3>{{ $projek->judul ?? '-' }}</h3>
                            <span class="project-status {{ $projek->status_progress == 'Selesai' ? 'status-done' : 'status-progress' }}">
                                {{ $projek->status_progress ?? '-' }}
                            </span>
                        </div>
                        <p>{{ $projek->deskripsi ?? '-' }}</p>
                        <a href="/projek/{{ $projek->id }}" class="project-link">
                            Detail Projek
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                @endforeach
            @else
                <p style="grid-column: 1 / -1; text-align: center; color: var(--ink3); padding: 60px 0;">Projek tidak tersedia</p>
            @endif
        </div>

    </div>
</section>

<!-- ─── CONTACT ──────────────────────────────── -->
<section class="section" id="contact">
    <div class="container">

        <div class="section-header">
            <div class="section-tag">Kontak</div>
            <h2 class="section-title">Hubungi Saya</h2>
            <p class="section-subtitle">Siap berkolaborasi? Mari terhubung</p>
        </div>

        <div class="contact-grid">

            <div class="contact-info">
                <h3>Mari Ngobrol</h3>
                <p class="contact-intro">Terbuka untuk peluang freelance, kolaborasi, maupun full-time. Jangan ragu untuk menghubungi saya.</p>

                <div class="contact-items">
                    <div class="contact-item-row">
                        <div class="contact-icon">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-linecap="round"/><circle cx="12" cy="7" r="4" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <strong>Nama</strong>
                            <span>{{ $profil->nama ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="contact-item-row">
                        <div class="contact-icon">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"/><polyline points="22,6 12,13 2,6" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-linecap="round"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <strong>Email</strong>
                            <span>{{ $profil->email ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="contact-item-row">
                        <div class="contact-icon">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <strong>No Telpon</strong>
                            <span>{{ $profil->no_telpon ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="contact-item-row">
                        <div class="contact-icon">
                            <svg width="18" height="18" fill="rgba(255,255,255,0.7)" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.23 1.84 1.23 1.07 1.84 2.81 1.3 3.49 1 .11-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.18 0 0 1.01-.32 3.3 1.23A11.5 11.5 0 0 1 12 6.8c1.02 0 2.04.14 3 .4 2.28-1.55 3.29-1.23 3.29-1.23.66 1.66.25 2.88.12 3.18.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.69.83.57C20.57 21.8 24 17.3 24 12 24 5.37 18.63 0 12 0z"/></svg>
                        </div>
                        <div class="contact-item-text">
                            <strong>GitHub</strong>
                            <a href="{{ $profil->github ?? '#' }}" target="_blank">{{ $profil->github ?? '-' }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-box">
                <h3>Kirim Pesan</h3>
                <p class="form-intro">Isi formulir di bawah dan saya akan segera merespons.</p>

                @if(session('success'))
                    <div class="success-msg">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke="#166534" stroke-width="1.5" stroke-linecap="round"/><polyline points="22 4 12 14.01 9 11.01" stroke="#166534" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('kontak.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" value="{{ old('nama') }}" required>
                        @error('nama')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="email@contoh.com" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="pesan">Pesan</label>
                        <textarea id="pesan" name="pesan" placeholder="Tuliskan pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                        @error('pesan')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center; margin-top:8px;">
                        Kirim Pesan
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><polygon points="22 2 15 22 11 13 2 9 22 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- ─── FOOTER ───────────────────────────────── -->
<footer>
    <div class="container">
        <div class="footer-inner">
            <div class="footer-logo">{{ $profil->nama ?? 'Portfolio' }}</div>

            <p class="footer-copy">© {{ date('Y') }} — Junior Laravel Developer</p>

            <div class="footer-links">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#projects">Projek</a>
                <a href="#contact">Kontak</a>
            </div>
        </div>
    </div>
</footer>

<script>
    // Navbar scroll effect
    const navbarInner = document.getElementById('navbarInner');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbarInner.classList.add('scrolled');
        } else {
            navbarInner.classList.remove('scrolled');
        }
    });

    // Hamburger menu
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');
    let menuOpen = false;

    hamburger.addEventListener('click', () => {
        menuOpen = !menuOpen;
        mobileMenu.style.display = menuOpen ? 'flex' : 'none';
        mobileMenu.style.flexDirection = 'column';
    });

    // Close mobile menu on link click
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            menuOpen = false;
            mobileMenu.style.display = 'none';
        });
    });

    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.skill-card, .project-card, .stat-card, .about-text-block').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.55s cubic-bezier(0.4,0,0.2,1), transform 0.55s cubic-bezier(0.4,0,0.2,1)';
        observer.observe(el);
    });
</script>

</body>
</html>