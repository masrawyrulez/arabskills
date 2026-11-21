<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'ArabSkills | Technical & Vocational Education Development & School Management')</title>
    <meta name="description" content="@yield('meta_description', 'ArabSkills is Egypt’s leading TVET development and consulting firm specialized in Applied Technology Schools (ATS), vocational centers, international accreditation, and institutional transformation.')">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Google Fonts: Plus Jakarta Sans & Cairo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --as-primary: #7b2240;
            --as-primary-dark: #58142b;
            --as-primary-light: #943253;
            --as-primary-soft: #fcf1f4;
            --as-accent: #d97706;
            --as-accent-hover: #b45309;
            --as-dark: #0f172a;
            --as-slate: #334155;
            --as-muted: #64748b;
            --as-light-bg: #f8fafc;
            --as-white: #ffffff;
            --as-card-border: rgba(123, 34, 64, 0.09);
            --as-shadow-sm: 0 2px 8px rgba(15, 23, 42, 0.04);
            --as-shadow: 0 10px 30px rgba(123, 34, 64, 0.08);
            --as-shadow-lg: 0 20px 45px rgba(15, 23, 42, 0.1);
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: var(--as-slate);
            background-color: var(--as-white);
            overflow-x: hidden;
            line-height: 1.65;
        }

        h1, h2, h3, h4, h5, h6 {
            color: var(--as-dark);
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        /* Top Bar */
        .topbar {
            background-color: #0f172a;
            color: #94a3b8;
            font-size: 0.85rem;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .topbar a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .topbar a:hover {
            color: var(--as-accent);
        }

        /* Navbar */
        .navbar-main {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(123, 34, 64, 0.08);
            transition: all 0.3s ease;
            padding: 12px 0;
        }
        .navbar-main.scrolled {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            padding: 8px 0;
        }
        .navbar-brand img {
            height: 48px;
            width: auto;
            object-fit: contain;
            transition: transform 0.2s ease;
        }
        .navbar-brand:hover img {
            transform: scale(1.02);
        }
        .navbar-nav .nav-link {
            font-weight: 600;
            font-size: 0.92rem;
            color: #1e293b;
            padding: 8px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--as-primary);
            background-color: var(--as-primary-soft);
        }

        /* Buttons */
        .btn-as-primary {
            background: linear-gradient(135deg, var(--as-primary) 0%, var(--as-primary-dark) 100%);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.92rem;
            padding: 10px 22px;
            border-radius: 10px;
            border: 1px solid transparent;
            box-shadow: 0 4px 14px rgba(123, 34, 64, 0.25);
            transition: all 0.25s ease;
        }
        .btn-as-primary:hover {
            background: linear-gradient(135deg, var(--as-primary-light) 0%, var(--as-primary) 100%);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(123, 34, 64, 0.35);
        }
        .btn-as-outline {
            background: transparent;
            color: var(--as-primary);
            font-weight: 600;
            font-size: 0.92rem;
            padding: 10px 22px;
            border-radius: 10px;
            border: 1.5px solid var(--as-primary);
            transition: all 0.25s ease;
        }
        .btn-as-outline:hover {
            background-color: var(--as-primary-soft);
            color: var(--as-primary-dark);
            border-color: var(--as-primary-dark);
            transform: translateY(-2px);
        }
        .btn-as-accent {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.92rem;
            padding: 10px 22px;
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 14px rgba(217, 119, 6, 0.3);
            transition: all 0.25s ease;
        }
        .btn-as-accent:hover {
            color: #ffffff;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(217, 119, 6, 0.4);
        }

        /* Section Badges & Titles */
        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: var(--as-primary-soft);
            color: var(--as-primary);
            font-weight: 700;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 6px 14px;
            border-radius: 50px;
            border: 1px solid rgba(123, 34, 64, 0.15);
            margin-bottom: 14px;
        }
        .section-title {
            font-size: clamp(1.8rem, 3.2vw, 2.6rem);
            font-weight: 800;
            color: var(--as-dark);
            margin-bottom: 16px;
            line-height: 1.25;
        }
        .section-subtitle {
            font-size: 1.05rem;
            color: var(--as-muted);
            max-width: 680px;
            margin: 0 auto 3rem auto;
            line-height: 1.7;
        }

        /* Card Styles */
        .as-card {
            background: #ffffff;
            border: 1px solid var(--as-card-border);
            border-radius: 16px;
            padding: 28px;
            box-shadow: var(--as-shadow-sm);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
            height: 100%;
        }
        .as-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--as-shadow);
            border-color: rgba(123, 34, 64, 0.25);
        }
        .as-icon-box {
            width: 58px;
            height: 58px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--as-primary-soft);
            color: var(--as-primary);
            font-size: 1.5rem;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .as-card:hover .as-icon-box {
            background: var(--as-primary);
            color: #ffffff;
            transform: scale(1.08);
        }

        /* Stats Counter Card */
        .stat-card {
            background: #ffffff;
            border: 1px solid rgba(123, 34, 64, 0.1);
            border-radius: 16px;
            padding: 24px 20px;
            text-align: center;
            box-shadow: var(--as-shadow-sm);
            transition: transform 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--as-shadow);
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--as-primary);
            line-height: 1;
            margin-bottom: 6px;
        }
        .stat-label {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--as-slate);
            margin: 0;
        }

        /* Client Logo Card */
        .logo-item {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 14px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 95px;
            transition: all 0.25s ease;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        }
        .logo-item img {
            max-height: 54px;
            max-width: 135px;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.78;
            transition: all 0.3s ease;
        }
        .logo-item:hover {
            border-color: rgba(123, 34, 64, 0.25);
            box-shadow: 0 8px 20px rgba(123, 34, 64, 0.08);
            transform: translateY(-3px);
        }
        .logo-item:hover img {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.06);
        }

        /* Footer */
        .footer-main {
            background-color: #0b1120;
            color: #94a3b8;
            padding: 70px 0 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 0.92rem;
        }
        .footer-main h5 {
            color: #ffffff;
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 22px;
            position: relative;
            padding-bottom: 10px;
        }
        .footer-main h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 32px;
            height: 2.5px;
            background: var(--as-primary);
            border-radius: 2px;
        }
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-links li {
            margin-bottom: 10px;
        }
        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .footer-links a:hover {
            color: #ffffff;
            transform: translateX(4px);
        }
        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 14px;
            color: #cbd5e1;
        }
        .footer-contact-item i {
            color: var(--as-accent);
            font-size: 1.1rem;
            margin-top: 3px;
        }
        .social-btn {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.06);
            color: #cbd5e1;
            margin-right: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .social-btn:hover {
            background: var(--as-primary);
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* Back to top button */
        #backToTop {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 44px;
            height: 44px;
            background: var(--as-primary);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(123, 34, 64, 0.35);
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 999;
            transition: all 0.25s ease;
        }
        #backToTop:hover {
            background: var(--as-primary-dark);
            transform: translateY(-3px);
        }

        /* Certificate verification badge pulse */
        .pulse-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #22c55e;
            box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7);
            animation: pulse-green 1.8s infinite;
        }
        @keyframes pulse-green {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 8px rgba(34, 197, 94, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
        }
    </style>
    @yield('extra_css')
</head>
<body>

    <!-- Top Announcement & Contact Bar -->
    <div class="topbar d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-flex align-items-center gap-4">
                        <span><i class="fa-solid fa-phone me-1 text-warning"></i> +20 100 021 4421</span>
                        <span><i class="fa-solid fa-envelope me-1 text-warning"></i> info@arabskills.com</span>
                        <span><i class="fa-solid fa-location-dot me-1 text-warning"></i> Cairo, Egypt</span>
                    </div>
                </div>
                <div class="col-md-5 text-end">
                    <div class="d-inline-flex align-items-center gap-3">
                        <a href="https://linkedin.com/company/arabskills" target="_blank" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://facebook.com/arabskills.eg" target="_blank" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <span class="text-secondary opacity-50">|</span>
                        <a href="#verifySection" class="text-decoration-none fw-semibold text-warning" onclick="openVerifyModal(event)">
                            <span class="pulse-dot me-1"></span> Verify Certificate
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-main sticky-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="ArabSkills Logo">
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars-staggered fs-4 text-dark"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#methodology">Methodology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#projects">Schools & Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#partners">Partners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#software">Digital Platform</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#founder">Founder</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-as-outline d-none d-sm-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#verifyModal">
                        <i class="fa-solid fa-certificate text-warning"></i>
                        <span>Verify Certificate</span>
                    </button>
                    <a href="{{ url('/') }}#contact" class="btn btn-as-primary">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash message alerts -->
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3 d-flex align-items-center gap-2" role="alert">
                <i class="fa-solid fa-circle-check fs-5"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Main Content Injection -->
    <main>
        @yield('content')
    </main>

    <!-- Certificate Verification Modal -->
    <div class="modal fade" id="verifyModal" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <div>
                        <div class="section-badge mb-1"><i class="fa-solid fa-shield-check"></i> Official Portal</div>
                        <h5 class="modal-title fw-bold" id="verifyModalLabel">Verify Learner Certificate</h5>
                        <p class="text-muted small mb-0">Enter the unique certificate code found on the issued credential.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="modalVerifyForm" onsubmit="handleVerifySubmit(event, 'modalCodeInput')">
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark small">Certificate / Learner Code</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-qrcode"></i></span>
                                <input type="text" id="modalCodeInput" class="form-control bg-light border-start-0 py-2" placeholder="e.g. DEMO100 or WFP100" required>
                            </div>
                            <div class="form-text text-muted">Try sample test codes: <code class="text-primary">DEMO100</code> or <code class="text-primary">WFP100</code></div>
                        </div>
                        <button type="submit" class="btn btn-as-primary w-100 py-2 d-flex align-items-center justify-content-center gap-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span>Search & Verify Credentials</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer -->
    <footer class="footer-main">
        <div class="container">
            <div class="row g-4 mb-5">
                <!-- Col 1: Brand & About -->
                <div class="col-lg-4 col-md-6">
                    <img src="{{ asset('images/logo.png') }}" alt="ArabSkills" style="height: 48px; filter: brightness(0) invert(1);" class="mb-3">
                    <p class="text-slate-300 small mb-3" style="line-height: 1.8;">
                        ArabSkills (شركة مهارات العرب للحلول المتكاملة) is Egypt’s premier educational transformation and TVET consulting firm. We specialize in Applied Technology Schools (ATS), vocational centers, international accreditation, and institutional transformation.
                    </p>
                    <div class="d-flex align-items-center gap-2">
                        <a href="https://linkedin.com/company/arabskills" target="_blank" class="social-btn" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://facebook.com/arabskills.eg" target="_blank" class="social-btn" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="mailto:info@arabskills.com" class="social-btn" title="Email Us"><i class="fa-solid fa-envelope"></i></a>
                        <a href="tel:+201000214421" class="social-btn" title="Call Us"><i class="fa-solid fa-phone"></i></a>
                    </div>
                </div>

                <!-- Col 2: Core Solutions -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Our Services</h5>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}#services"><i class="fa-solid fa-chevron-right text-xs"></i> ATS Management</a></li>
                        <li><a href="{{ url('/') }}#services"><i class="fa-solid fa-chevron-right text-xs"></i> TVET Consultations</a></li>
                        <li><a href="{{ url('/') }}#services"><i class="fa-solid fa-chevron-right text-xs"></i> Curriculum Design</a></li>
                        <li><a href="{{ url('/') }}#services"><i class="fa-solid fa-chevron-right text-xs"></i> Teacher Training</a></li>
                        <li><a href="{{ url('/') }}#services"><i class="fa-solid fa-chevron-right text-xs"></i> Quality & Accreditation</a></li>
                        <li><a href="{{ url('/') }}#software"><i class="fa-solid fa-chevron-right text-xs"></i> School Management App</a></li>
                    </ul>
                </div>

                <!-- Col 3: Quick Links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="{{ url('/about') }}"><i class="fa-solid fa-chevron-right text-xs"></i> About ArabSkills</a></li>
                        <li><a href="{{ url('/') }}#projects"><i class="fa-solid fa-chevron-right text-xs"></i> Our Projects</a></li>
                        <li><a href="{{ url('/') }}#partners"><i class="fa-solid fa-chevron-right text-xs"></i> Strategic Partners</a></li>
                        <li><a href="{{ url('/') }}#methodology"><i class="fa-solid fa-chevron-right text-xs"></i> Methodology</a></li>
                        <li><a href="{{ url('/') }}#founder"><i class="fa-solid fa-chevron-right text-xs"></i> Leadership</a></li>
                        <li><a href="#verifySection" onclick="openVerifyModal(event)"><i class="fa-solid fa-chevron-right text-xs"></i> Verify Certificate</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Registration -->
                <div class="col-lg-4 col-md-6">
                    <h5>Headquarters</h5>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>11 Youssef El Gendy St., Bab El Louk, Cairo, Egypt</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-phone"></i>
                        <span>+20 100 021 4421</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-envelope"></i>
                        <span>info@arabskills.com / kaziz@arabskills.com</span>
                    </div>
                    <div class="p-3 rounded-3 mt-3" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="small text-slate-400">
                            <strong>Commercial Registry:</strong> 238074<br>
                            <strong>Tax Card:</strong> 764-817-647<br>
                            <strong>Accreditation Alignment:</strong> Pearson, City & Guilds, Omnia Finland, Edexcel BTEC
                        </div>
                    </div>
                </div>
            </div>

            <hr style="border-color: rgba(255, 255, 255, 0.08);">

            <div class="row align-items-center py-2">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0 small">
                    © {{ date('Y') }} <strong>ArabSkills for Complete Solutions</strong>. All rights reserved.
                </div>
                <div class="col-md-6 text-center text-md-end small text-slate-400">
                    <span>Designed for Excellence in Technical & Vocational Education</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <button id="backToTop" title="Back to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 80
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('mainNavbar');
            const btt = document.getElementById('backToTop');
            if (window.scrollY > 40) {
                nav.classList.add('scrolled');
                btt.style.display = 'flex';
            } else {
                nav.classList.remove('scrolled');
                btt.style.display = 'none';
            }
        });

        // Back to top click
        document.getElementById('backToTop').addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Open verify modal helper
        function openVerifyModal(e) {
            if (e) e.preventDefault();
            const modal = new bootstrap.Modal(document.getElementById('verifyModal'));
            modal.show();
        }

        // Handle certificate verification redirect
        function handleVerifySubmit(e, inputId) {
            e.preventDefault();
            const code = document.getElementById(inputId).value.trim();
            if (code) {
                window.location.href = "{{ url('/verify') }}/" + encodeURIComponent(code);
            }
        }
    </script>
    @yield('extra_js')
</body>
</html>
