<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profil->nama ?? 'Portfolio' }} | Portfolio </title>

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
            grid-template-columns: repeat(3, 1fr);
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

@include('home.hero')

@include('home.about')

@include('home.skills')

@include('home.projects')

@include('home.contact')

@include('home.footer')

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