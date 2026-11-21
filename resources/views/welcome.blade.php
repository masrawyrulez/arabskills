@extends('layouts.app')

@section('title', 'ArabSkills | Leading TVET Development & Applied Technology Schools Management')

@section('extra_css')
<style>
    /* Hero Section */
    .hero-section {
        position: relative;
        padding: 90px 0 110px 0;
        background: linear-gradient(135deg, #0b1120 0%, #1a162b 50%, #2e111d 100%);
        color: #ffffff;
        overflow: hidden;
    }
    .hero-section::before {
        content: '';
        position: absolute;
        top: -30%;
        right: -10%;
        width: 600px;
        height: 600px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(123, 34, 64, 0.4) 0%, rgba(123, 34, 64, 0) 70%);
        pointer-events: none;
    }
    .hero-section::after {
        content: '';
        position: absolute;
        bottom: -20%;
        left: -10%;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(217, 119, 6, 0.25) 0%, rgba(217, 119, 6, 0) 70%);
        pointer-events: none;
    }
    .hero-title {
        font-size: clamp(2.3rem, 4.4vw, 3.8rem);
        font-weight: 800;
        line-height: 1.15;
        color: #ffffff;
        margin-bottom: 24px;
        letter-spacing: -0.03em;
    }
    .hero-title span {
        background: linear-gradient(120deg, #f59e0b 0%, #fbbf24 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .hero-subtitle {
        font-size: 1.18rem;
        color: #cbd5e1;
        line-height: 1.75;
        margin-bottom: 36px;
        max-width: 620px;
    }
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #fcd34d;
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 24px;
        backdrop-filter: blur(8px);
    }
    .hero-img-card {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.45);
        border: 1px solid rgba(255, 255, 255, 0.15);
    }
    .hero-img-card img {
        width: 100%;
        height: 480px;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }
    .hero-img-card:hover img {
        transform: scale(1.03);
    }
    .hero-floating-badge {
        position: absolute;
        bottom: 24px;
        left: 24px;
        right: 24px;
        background: rgba(15, 23, 42, 0.88);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 16px;
        padding: 16px 20px;
        color: #ffffff;
    }

    /* Verification Quick Search Box in Hero */
    .hero-verify-box {
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 16px;
        padding: 18px 22px;
        backdrop-filter: blur(10px);
        margin-top: 35px;
    }

    /* Section Styling */
    .py-section {
        padding: 90px 0;
    }
    .bg-light-soft {
        background-color: #f8fafc;
    }
    .bg-plum-tint {
        background-color: #fdf6f8;
    }

    /* Feature List items */
    .feature-check-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .feature-check-list li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 12px;
        font-size: 0.95rem;
    }
    .feature-check-list i {
        color: var(--as-primary);
        font-size: 1.1rem;
        margin-top: 2px;
    }

    /* Methodology Tabs */
    .nav-methodology .nav-link {
        font-weight: 700;
        font-size: 1.05rem;
        color: var(--as-slate);
        padding: 14px 26px;
        border-radius: 12px;
        border: 1px solid rgba(123, 34, 64, 0.1);
        background: #ffffff;
        margin: 0 6px 12px 6px;
        transition: all 0.25s ease;
    }
    .nav-methodology .nav-link.active {
        background: var(--as-primary);
        color: #ffffff;
        border-color: var(--as-primary);
        box-shadow: 0 6px 20px rgba(123, 34, 64, 0.25);
    }

    /* Step Card */
    .step-card {
        background: #ffffff;
        border: 1px solid rgba(123, 34, 64, 0.08);
        border-radius: 16px;
        padding: 24px;
        height: 100%;
        position: relative;
        transition: all 0.25s ease;
    }
    .step-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(123, 34, 64, 0.08);
        border-color: rgba(123, 34, 64, 0.2);
    }
    .step-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: var(--as-primary-soft);
        color: var(--as-primary);
        font-weight: 800;
        font-size: 0.95rem;
        border-radius: 10px;
        margin-bottom: 14px;
    }

    /* Project Cards */
    .project-card {
        background: #ffffff;
        border: 1px solid rgba(123, 34, 64, 0.08);
        border-radius: 18px;
        overflow: hidden;
        box-shadow: var(--as-shadow-sm);
        transition: all 0.3s ease;
        height: 100%;
    }
    .project-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--as-shadow);
        border-color: rgba(123, 34, 64, 0.25);
    }
    .project-card .card-body {
        padding: 24px;
    }
    .project-badge {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 4px 10px;
        border-radius: 6px;
        background: var(--as-primary-soft);
        color: var(--as-primary);
        display: inline-block;
        margin-bottom: 12px;
    }

    /* Testimonial Quote Card */
    .quote-card {
        background: #ffffff;
        border: 1px solid rgba(123, 34, 64, 0.1);
        border-radius: 20px;
        padding: 32px;
        height: 100%;
        box-shadow: var(--as-shadow-sm);
        position: relative;
    }
    .quote-card::before {
        content: "\201C";
        position: absolute;
        top: 15px;
        right: 25px;
        font-size: 5rem;
        color: rgba(123, 34, 64, 0.08);
        font-family: serif;
        line-height: 1;
        pointer-events: none;
    }

    /* Accreditation Banner */
    .accred-badge {
        background: #ffffff;
        border: 1.5px solid rgba(123, 34, 64, 0.15);
        border-radius: 14px;
        padding: 16px 22px;
        text-align: center;
        font-weight: 700;
        color: var(--as-dark);
        box-shadow: var(--as-shadow-sm);
        transition: transform 0.2s ease;
    }
    .accred-badge:hover {
        transform: translateY(-3px);
        border-color: var(--as-primary);
    }
</style>
@endsection

@section('content')

    <!-- ==================== HERO SECTION ==================== -->
    <section class="hero-section">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center g-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <div class="hero-badge">
                        <i class="fa-solid fa-award text-warning"></i>
                        <span>Egypt’s Premier TVET & Applied Education Leader</span>
                    </div>

                    <h1 class="hero-title">
                        Transforming Technical Education. Building Egypt’s <span>Applied Workforce</span>.
                    </h1>

                    <p class="hero-subtitle">
                        ArabSkills partners with government ministries, UN development agencies, international donors, and industry leaders to establish, manage, and scale <strong>Applied Technology Schools (ATS)</strong> and demand-driven vocational ecosystems.
                    </p>

                    <div class="d-flex flex-wrap gap-3 mb-4">
                        <a href="#services" class="btn btn-as-primary py-3 px-4 fs-6">
                            <i class="fa-solid fa-compass me-2"></i> Explore Our Solutions
                        </a>
                        <a href="#projects" class="btn btn-outline-light py-3 px-4 fs-6 rounded-3" style="border-width: 1.5px; font-weight: 600;">
                            <i class="fa-solid fa-school me-2"></i> Our ATS Schools
                        </a>
                    </div>

                    <!-- Quick Certificate Search in Hero -->
                    <div class="hero-verify-box" id="heroVerify">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-shield-halved text-warning"></i>
                            <span class="fw-bold small text-white">Instant Credential Verification Portal</span>
                            <span class="badge bg-success-subtle text-success small ms-auto">Online</span>
                        </div>
                        <form onsubmit="handleVerifySubmit(event, 'heroCodeInput')" class="row g-2 align-items-center">
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary text-secondary"><i class="fa-solid fa-barcode"></i></span>
                                    <input type="text" id="heroCodeInput" class="form-control bg-dark text-white border-secondary py-2" placeholder="Enter Learner Certificate Code (e.g. DEMO100)" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-as-accent w-100 py-2">
                                    Verify Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
                    <div class="hero-img-card">
                        <img src="{{ asset('images/profile/profile_img_07.jpg') }}" alt="ArabSkills Technical Training Workshop">
                        <div class="hero-floating-badge">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-number text-warning mb-0 fs-2">20+</div>
                                <div class="small">
                                    <div class="fw-bold text-white">Applied Technology Schools (ATS)</div>
                                    <div class="text-slate-300">Established & transformed across Egypt</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Bar -->
            <div class="row g-3 mt-5" data-aos="fade-up" data-aos-delay="200">
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">17+</div>
                        <p class="stat-label">Years TVET Experience</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">20+</div>
                        <p class="stat-label">Applied Technology Schools</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">4+</div>
                        <p class="stat-label">Vocational Training Centers</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">4</div>
                        <p class="stat-label">Global Accreditations</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== STRATEGIC PARTNERS & CLIENTS ==================== -->
    <section class="py-section bg-light-soft" id="partners">
        <div class="container text-center">
            <div class="section-badge"><i class="fa-solid fa-handshake"></i> Trusted by Leaders</div>
            <h2 class="section-title">Our Strategic Partners & Clients</h2>
            <p class="section-subtitle">
                Proudly partnering with United Nations agencies, European development funds, national ministries, and Egypt's foremost industrial conglomerates.
            </p>

            <!-- Band 1: UN & International Donors -->
            <div class="text-start mb-3">
                <span class="badge bg-secondary-subtle text-secondary px-3 py-2 fw-bold text-uppercase small">
                    <i class="fa-solid fa-earth-americas me-1"></i> International Development & UN Agencies
                </span>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="50">
                    <div class="logo-item" title="UN World Food Programme">
                        <img src="{{ asset('images/clients/wfp.png') }}" alt="WFP">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="logo-item" title="UNHCR - The UN Refugee Agency">
                        <img src="{{ asset('images/clients/unhcr.png') }}" alt="UNHCR">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="150">
                    <div class="logo-item" title="IOM - UN Migration">
                        <img src="{{ asset('images/clients/iom.png') }}" alt="IOM">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="logo-item" title="GIZ - German Development Cooperation">
                        <span class="fw-bold text-dark fs-4">giz</span>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="250">
                    <div class="logo-item" title="Plan International">
                        <img src="{{ asset('images/clients/plan.png') }}" alt="Plan International">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="logo-item" title="Colleges and Institutes Canada (CICan)">
                        <img src="{{ asset('images/clients/cican.png') }}" alt="CICan">
                    </div>
                </div>
            </div>

            <!-- Band 2: Industrial Leaders & Foundations -->
            <div class="text-start mb-3 mt-4">
                <span class="badge bg-secondary-subtle text-secondary px-3 py-2 fw-bold text-uppercase small">
                    <i class="fa-solid fa-industry me-1"></i> Industry Leaders & National Foundations
                </span>
            </div>
            <div class="row g-3">
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="50">
                    <div class="logo-item" title="Sawiris Foundation for Social Development">
                        <img src="{{ asset('images/clients/sawiris.png') }}" alt="Sawiris Foundation">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="logo-item" title="SODIC Developments">
                        <img src="{{ asset('images/clients/sodic.png') }}" alt="SODIC">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="150">
                    <div class="logo-item" title="KNAUF Egypt">
                        <img src="{{ asset('images/clients/knauf.png') }}" alt="Knauf">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="logo-item" title="Viatris Healthcare">
                        <img src="{{ asset('images/clients/viatris.png') }}" alt="Viatris">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="250">
                    <div class="logo-item" title="ArabcoMed Medical Products">
                        <img src="{{ asset('images/clients/arabcomed.webp') }}" alt="ArabcoMed">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="logo-item" title="Daltex Agriculture">
                        <img src="{{ asset('images/clients/daltex.png') }}" alt="Daltex">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="350">
                    <div class="logo-item" title="Om Habibeh Foundation">
                        <img src="{{ asset('images/clients/om-habibeh.png') }}" alt="Om Habibeh">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <div class="logo-item" title="Egyptian Drug Authority (EDA)">
                        <img src="{{ asset('images/clients/eda.png') }}" alt="EDA">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="450">
                    <div class="logo-item" title="EFE Egypt (Education for Employment)">
                        <img src="{{ asset('images/clients/efe.png') }}" alt="EFE Egypt">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="500">
                    <div class="logo-item" title="Life Makers Foundation">
                        <img src="{{ asset('images/clients/lifemakers.jpg') }}" alt="Life Makers">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="550">
                    <div class="logo-item" title="IECD">
                        <img src="{{ asset('images/clients/iecd.png') }}" alt="IECD">
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="600">
                    <div class="logo-item" title="EgyCopt Foundation">
                        <img src="{{ asset('images/clients/egycopt.png') }}" alt="EgyCopt">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== ABOUT SUMMARY ==================== -->
    <section class="py-section" id="about">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="section-badge"><i class="fa-solid fa-compass-drafting"></i> Who We Are</div>
                    <h2 class="section-title">Institutional Transformation for Technical Excellence</h2>
                    <p class="lead text-dark mb-3 fw-semibold">
                        ArabSkills is an Egypt-based education development and consulting firm specialized in Technical and Vocational Education and Training (TVET).
                    </p>
                    <p class="text-muted mb-4">
                        We work alongside government bodies (Ministry of Education & Technical Education - MoETE), international development agencies, and industrial conglomerates to build demand-driven, competency-based educational ecosystems. Our expertise spans system analysis, curriculum co-development, international accreditation alignment, digital management systems, and turnkey school renovation.
                    </p>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                                <i class="fa-solid fa-graduation-cap fs-3 text-danger"></i>
                                <div>
                                    <div class="fw-bold text-dark">Applied Technology</div>
                                    <small class="text-muted">Modern ATS Dual Schools</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                                <i class="fa-solid fa-stamp fs-3 text-warning"></i>
                                <div>
                                    <div class="fw-bold text-dark">Global Accreditations</div>
                                    <small class="text-muted">Pearson, City & Guilds, Omnia</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('/about') }}" class="btn btn-as-primary">
                        Read Full Company Profile <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="position-relative">
                        <div class="row g-3">
                            <div class="col-6">
                                <img src="{{ asset('images/profile/profile_img_06.jpg') }}" alt="Classroom Training" class="img-fluid rounded-4 shadow-sm w-100 mb-3" style="height: 250px; object-fit: cover;">
                                <img src="{{ asset('images/profile/profile_img_08.jpg') }}" alt="Vocational Workshop" class="img-fluid rounded-4 shadow-sm w-100" style="height: 190px; object-fit: cover;">
                            </div>
                            <div class="col-6 pt-4">
                                <img src="{{ asset('images/profile/profile_img_05.jpg') }}" alt="Interactive Session" class="img-fluid rounded-4 shadow-sm w-100 mb-3" style="height: 190px; object-fit: cover;">
                                <img src="{{ asset('images/profile/profile_img_04.jpg') }}" alt="ArabSkills Team" class="img-fluid rounded-4 shadow-sm w-100" style="height: 250px; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CORE SERVICES ==================== -->
    <section class="py-section bg-plum-tint" id="services">
        <div class="container">
            <div class="text-center">
                <div class="section-badge"><i class="fa-solid fa-screwdriver-wrench"></i> What We Do</div>
                <h2 class="section-title">Comprehensive TVET & School Solutions</h2>
                <p class="section-subtitle">
                    End-to-end expertise covering school establishment, teacher coaching, curriculum co-creation with industry, and digital operations.
                </p>
            </div>

            <div class="row g-4">
                <!-- Service 1 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-school"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">Technical Schools Management</h4>
                        <p class="small text-muted mb-3">
                            Full operational management of Applied Technology Schools (ATS) and in-factory micro dual schools, ensuring alignment with MoETE and international benchmarks.
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> ATS School Governance</li>
                            <li><i class="fa-solid fa-check"></i> Industry Partner Alignment</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-diagram-project"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">TVET Projects Management</h4>
                        <p class="small text-muted mb-3">
                            Rigorous management of donor-funded and national development projects from baseline study and critical path planning to M&E and socio-economic impact.
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> Donor Compliance & Reporting</li>
                            <li><i class="fa-solid fa-check"></i> Impact Assessment Studies</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-book-open-reader"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">Curriculum Development</h4>
                        <p class="small text-muted mb-3">
                            Designing competency-based learning packages and practical session guides co-created with industrial partners across diverse technical sectors.
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> Industry Competency Framework</li>
                            <li><i class="fa-solid fa-check"></i> Student & Teacher Handouts</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">Teacher Training & Coaching</h4>
                        <p class="small text-muted mb-3">
                            Empowering technical instructors with modern pedagogical methodologies, digital classroom tools, practical demonstrations, and ongoing performance coaching.
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> Classroom Observation & Feedback</li>
                            <li><i class="fa-solid fa-check"></i> Yearly Performance Evaluations</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 5 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="250">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-certificate"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">Quality Assurance & Accreditation</h4>
                        <p class="small text-muted mb-3">
                            Institutional capacity building and quality manuals aligned with Pearson UK, City & Guilds UK, Edexcel BTEC, and Omnia Finland accreditation standards.
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> Internal Verification (IV) Systems</li>
                            <li><i class="fa-solid fa-check"></i> Accreditation Preparation</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 6 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">School Management Software</h4>
                        <p class="small text-muted mb-3">
                            Proprietary digital management system tracking student behavioral indices, academic plans, delivery schedules, quality inspections, and parent communication.
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> Student Behavioral Index</li>
                            <li><i class="fa-solid fa-check"></i> Cross-Platform (iOS, Android, Web)</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 7 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="350">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-building-circle-check"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">Infrastructure Renovation</h4>
                        <p class="small text-muted mb-3">
                            Full overhaul of workshops, scientific laboratories, smart classrooms, and recreational areas to meet rigorous ATS and industrial safety standards.
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> Workshop Architectural Design</li>
                            <li><i class="fa-solid fa-check"></i> Technical Equipment Procurement</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 8 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">Employment & Career Services</h4>
                        <p class="small text-muted mb-3">
                            Career guidance curriculum, interview preparation, job fairs, and direct placement connections between technical graduates and corporate employers.
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> Dual Education Apprenticeships</li>
                            <li><i class="fa-solid fa-check"></i> Labor Market Transition</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== METHODOLOGY ==================== -->
    <section class="py-section" id="methodology">
        <div class="container">
            <div class="text-center">
                <div class="section-badge"><i class="fa-solid fa-route"></i> How We Deliver</div>
                <h2 class="section-title">Our Rigorous Two-Pillar Methodology</h2>
                <p class="section-subtitle">
                    A holistic framework that integrates donor project management rigor with day-to-day school operational excellence.
                </p>

                <!-- Methodology Nav Tabs -->
                <ul class="nav nav-pills justify-content-center nav-methodology mb-5" id="methodologyTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-project-tab" data-bs-toggle="pill" data-bs-target="#pills-project" type="button" role="tab">
                            <i class="fa-solid fa-chart-gantt me-2"></i> Pillar 1: TVET Project Management
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-school-tab" data-bs-toggle="pill" data-bs-target="#pills-school" type="button" role="tab">
                            <i class="fa-solid fa-school-flag me-2"></i> Pillar 2: Technical Schools Operations
                        </button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="methodologyTabContent">
                <!-- Pillar 1 Content -->
                <div class="tab-pane fade show active" id="pills-project" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg">
                            <div class="step-card">
                                <div class="step-number">01</div>
                                <h5 class="fw-bold mb-2">Case Study</h5>
                                <p class="small text-muted mb-0">
                                    Thorough analysis of proposal requirements, labor market dynamics, industry demand trends, and beneficiary socioeconomic context.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg">
                            <div class="step-card">
                                <div class="step-number">02</div>
                                <h5 class="fw-bold mb-2">Planning & CPM</h5>
                                <p class="small text-muted mb-0">
                                    Detailed Gantt scheduling, critical path identification, risk dependency mapping, and rigorous cost accounting for financial precision.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg">
                            <div class="step-card">
                                <div class="step-number">03</div>
                                <h5 class="fw-bold mb-2">Implementation</h5>
                                <p class="small text-muted mb-0">
                                    Beneficiary-centered execution with agile field adjustments, stakeholder coordination, and high-efficiency workflow management.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg">
                            <div class="step-card">
                                <div class="step-number">04</div>
                                <h5 class="fw-bold mb-2">Monitoring & M&E</h5>
                                <p class="small text-muted mb-0">
                                    Continuous milestone evaluations, KPI tracking, and real-time field data collection to maintain quality and timely completion.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg">
                            <div class="step-card">
                                <div class="step-number">05</div>
                                <h5 class="fw-bold mb-2">Impact Study</h5>
                                <p class="small text-muted mb-0">
                                    Qualitative & quantitative assessment of employment rates, employer satisfaction, productivity increases, and community ROI.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pillar 2 Content -->
                <div class="tab-pane fade" id="pills-school" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-magnifying-glass-location"></i></div>
                                <h5 class="fw-bold mb-2">School Selection</h5>
                                <p class="small text-muted mb-0">
                                    MoETE collaboration, on-site infrastructure audits, workshop compatibility assessments, and comprehensive baseline reports.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-pen-ruler"></i></div>
                                <h5 class="fw-bold mb-2">Curriculum Design</h5>
                                <p class="small text-muted mb-0">
                                    Competency frameworks, practical student workbooks, lesson plans, and academic validation aligned with industry partners.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-users-gear"></i></div>
                                <h5 class="fw-bold mb-2">Leadership & Governance</h5>
                                <p class="small text-muted mb-0">
                                    Custom organizational structures, job descriptions, MoETE liaison, and performance-based school administration.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-shield-halved"></i></div>
                                <h5 class="fw-bold mb-2">Quality & Accreditation</h5>
                                <p class="small text-muted mb-0">
                                    Internal verification, observational audits, quality manual adherence, and preparation for Pearson, City & Guilds, or Omnia.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-user-graduate"></i></div>
                                <h5 class="fw-bold mb-2">Student Behavioral Index</h5>
                                <p class="small text-muted mb-0">
                                    Tracking positive & negative activities digitally, student leadership programs, career fairs, and soft-skills coaching.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-person-chalkboard"></i></div>
                                <h5 class="fw-bold mb-2">Staff Coaching</h5>
                                <p class="small text-muted mb-0">
                                    Selecting ministry & external teachers, conducting continuous classroom coaching, and administering yearly evaluations.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-hammer"></i></div>
                                <h5 class="fw-bold mb-2">Infrastructure Renovation</h5>
                                <p class="small text-muted mb-0">
                                    Complete workshop re-engineering, lab equipment setup, safety compliance, and modernized educational spaces.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-mobile-screen"></i></div>
                                <h5 class="fw-bold mb-2">Digital Application</h5>
                                <p class="small text-muted mb-0">
                                    Real-time tracking of sessions, grades, behavioral indices, attendance, and quality audit logs on iOS, Android, and PC.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== DIGITAL SCHOOL MANAGEMENT APP SHOWCASE ==================== -->
    <section class="py-section bg-dark text-white position-relative" id="software" style="background: linear-gradient(135deg, #090e1a 0%, #151d30 100%);">
        <div class="container position-relative">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="section-badge" style="background: rgba(255,255,255,0.08); color: #f59e0b; border-color: rgba(245,158,11,0.3);">
                        <i class="fa-solid fa-code"></i> Proprietary Technology
                    </div>
                    <h2 class="text-white fw-bold mb-3 fs-1">ArabSkills Digital School Management Platform</h2>
                    <p class="text-slate-300 mb-4" style="line-height: 1.8;">
                        Developed entirely in-house by ArabSkills’ Citizen Development team, our cross-platform application provides an end-to-end operational backbone tailored specifically for the governance of Applied Technology Schools in Egypt.
                    </p>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                <div class="d-flex align-items-center gap-2 mb-2 text-warning fw-bold">
                                    <i class="fa-solid fa-id-card"></i> Student Module
                                </div>
                                <p class="small text-slate-300 mb-0">Comprehensive profile tracking, behavioral indices, parent communication log, and health records.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                <div class="d-flex align-items-center gap-2 mb-2 text-warning fw-bold">
                                    <i class="fa-solid fa-chalkboard-user"></i> Teachers Module
                                </div>
                                <p class="small text-slate-300 mb-0">Teacher credential database, observation logs, lesson delivery tracking, and shared tasks.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                <div class="d-flex align-items-center gap-2 mb-2 text-warning fw-bold">
                                    <i class="fa-solid fa-list-check"></i> Quality & Audits
                                </div>
                                <p class="small text-slate-300 mb-0">Quality inspection logs, initial visit report bank, grade analysis, and intervention tracking.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                <div class="d-flex align-items-center gap-2 mb-2 text-warning fw-bold">
                                    <i class="fa-solid fa-shield-virus"></i> Multi-Platform & Offline
                                </div>
                                <p class="small text-slate-300 mb-0">Arabic interface, works offline with automatic sync, role-based security, accessible on iOS, Android, and PC.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <span class="badge bg-primary px-3 py-2"><i class="fa-brands fa-apple me-1"></i> iOS</span>
                        <span class="badge bg-success px-3 py-2"><i class="fa-brands fa-android me-1"></i> Android</span>
                        <span class="badge bg-info px-3 py-2 text-dark"><i class="fa-brands fa-windows me-1"></i> Windows PC</span>
                        <span class="badge bg-warning px-3 py-2 text-dark"><i class="fa-solid fa-globe me-1"></i> Cloud Web</span>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1);">
                        <div class="d-flex align-items-center justify-content-between pb-3 border-bottom border-secondary mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-danger rounded-circle p-1"></span>
                                <span class="badge bg-warning rounded-circle p-1"></span>
                                <span class="badge bg-success rounded-circle p-1"></span>
                                <span class="small text-slate-400 ms-2">ArabSkills School Management System v3.2</span>
                            </div>
                            <span class="badge bg-success text-white small"><i class="fa-solid fa-lock me-1"></i> Encrypted</span>
                        </div>
                        <img src="{{ asset('images/profile/profile_img_05.jpg') }}" alt="ArabSkills Software Application" class="img-fluid rounded-3 mb-3 w-100" style="height: 320px; object-fit: cover;">
                        <div class="text-center text-slate-400 small">
                            <em>Empowering ATS school leaders and quality officers with real-time operational transparency.</em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FEATURED PROJECTS & ATS SCHOOLS ==================== -->
    <section class="py-section bg-light-soft" id="projects">
        <div class="container">
            <div class="text-center">
                <div class="section-badge"><i class="fa-solid fa-briefcase"></i> Track Record</div>
                <h2 class="section-title">Applied Technology Schools & Landmark Projects</h2>
                <p class="section-subtitle">
                    A proven portfolio transforming education across industrial, pharmaceutical, technological, and agricultural sectors.
                </p>
            </div>

            <div class="row g-4">
                <!-- Project 1 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">Pharmaceutical Industry</span>
                            <h4 class="fs-5 fw-bold mb-2">ArabcoMed Applied Technology School</h4>
                            <p class="small text-muted mb-3">
                                <strong>Client:</strong> Arab Company for Medical Products (ArabcoMed)<br>
                                <strong>Location:</strong> Obour City, Cairo<br>
                                <strong>Scope:</strong> Complete school management, specialized Chemist & Pharma curricula, teacher selection, and MoETE quality assurance.
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> Full School Operations & Management
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">Agri-Tech & Sustainability</span>
                            <h4 class="fs-5 fw-bold mb-2">EFG Hermes Agri-Tech ATS</h4>
                            <p class="small text-muted mb-3">
                                <strong>Client:</strong> EFG Foundation for Social Development<br>
                                <strong>Location:</strong> Luxor, Upper Egypt<br>
                                <strong>Scope:</strong> Full establishment of Egypt's landmark Agri-Tech secondary school, curriculum co-development, and legal accreditation.
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> Official Letter of Recommendation Received
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">Modern Agriculture</span>
                            <h4 class="fs-5 fw-bold mb-2">Dr. Samir Nagar ATS (Daltex)</h4>
                            <p class="small text-muted mb-3">
                                <strong>Client:</strong> Daltex Agricultural Conglomerate<br>
                                <strong>Location:</strong> Behera Governorate<br>
                                <strong>Scope:</strong> Full school management, modern agricultural machinery curricula, workshop renovation, and teacher coaching.
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> Comprehensive Turnkey Management
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">Pharma & Regulatory TVET</span>
                            <h4 class="fs-5 fw-bold mb-2">Egyptian Drug Authority & Viatris ATS</h4>
                            <p class="small text-muted mb-3">
                                <strong>Client:</strong> EDA & Viatris Healthcare<br>
                                <strong>Location:</strong> Shobra, Cairo<br>
                                <strong>Scope:</strong> End-to-end technical school governance, industry-aligned pharmaceutical manufacturing syllabus, and teacher training.
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> Specialized Healthcare Technology
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 5 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">ICT & Software Engineering</span>
                            <h4 class="fs-5 fw-bold mb-2">WE Applied Technology Schools (7 Governorates)</h4>
                            <p class="small text-muted mb-3">
                                <strong>Client:</strong> Telecom Egypt (WE)<br>
                                <strong>Locations:</strong> Nasr City, Sheikh Zayed, Alexandria, Mansoura, Suez, Minya, New Valley<br>
                                <strong>Scope:</strong> School initiation, infrastructure renovation, IT & software curriculum, and strategic leadership.
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> 7 Schools Nationwide
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 6 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="350">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">Humanitarian & Refugee Livelihoods</span>
                            <h4 class="fs-5 fw-bold mb-2">WFP & Om Habibeh Foundation TVET</h4>
                            <p class="small text-muted mb-3">
                                <strong>Client:</strong> UN World Food Programme (WFP)<br>
                                <strong>Location:</strong> Cairo<br>
                                <strong>Scope:</strong> Practical vocational training and employment transition for 600+ refugees in electrical, light current, jewelry, and hospitality.
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> 600+ Trainees Empowered
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accreditations Row -->
            <div class="mt-5 p-4 rounded-4 bg-white border shadow-sm">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-center text-lg-start mb-3 mb-lg-0">
                        <h5 class="fw-bold text-dark mb-1">International Accreditation Readiness</h5>
                        <p class="small text-muted mb-0">Our quality systems are fully aligned with premier global awarding bodies:</p>
                    </div>
                    <div class="col-lg-8">
                        <div class="row g-2 text-center">
                            <div class="col-6 col-sm-3">
                                <div class="accred-badge">
                                    <div class="small text-muted text-uppercase" style="font-size: 0.7rem;">United Kingdom</div>
                                    <div class="fw-bold">Pearson Assured</div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="accred-badge">
                                    <div class="small text-muted text-uppercase" style="font-size: 0.7rem;">United Kingdom</div>
                                    <div class="fw-bold">City & Guilds</div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="accred-badge">
                                    <div class="small text-muted text-uppercase" style="font-size: 0.7rem;">Finland</div>
                                    <div class="fw-bold">Omnia Finland</div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="accred-badge">
                                    <div class="small text-muted text-uppercase" style="font-size: 0.7rem;">United Kingdom</div>
                                    <div class="fw-bold">Edexcel BTEC</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== OFFICIAL ENDORSEMENTS & LETTERS ==================== -->
    <section class="py-section bg-plum-tint">
        <div class="container">
            <div class="text-center">
                <div class="section-badge"><i class="fa-solid fa-quote-left"></i> Verified Endorsements</div>
                <h2 class="section-title">What Our Partners Say</h2>
                <p class="section-subtitle">
                    Excerpts from official letters of recommendation and partnership agreements.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up">
                    <div class="quote-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="{{ asset('images/clients/sawiris.png') }}" alt="EFG Foundation" style="height: 38px;">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">EFG Foundation for Social Development</h6>
                                <small class="text-muted">Recommendation Letter</small>
                            </div>
                        </div>
                        <p class="text-muted small mb-0" style="line-height: 1.8;">
                            "ArabSkills has demonstrated exceptional professionalism and expertise throughout the preparatory phase for the first Agri-Tech Secondary School in Luxor. They are leading efforts to develop a future-focused curriculum in collaboration with industry experts, academia, and civil society."
                        </p>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="quote-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="{{ asset('images/clients/arabcomed.webp') }}" alt="ArabcoMed" style="height: 38px;">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">ArabcoMed Medical Products</h6>
                                <small class="text-muted">Official Partnership Statement</small>
                            </div>
                        </div>
                        <p class="text-muted small mb-0" style="line-height: 1.8;">
                            "تفيد الشركة بأن شركة مهارات العرب للحلول المتكاملة هي الجهة المتعاقدة معنا لتأسيس وإدارة مدرسة أرابكوميد للتكنولوجيا التطبيقية بمدينة العبور، وقد قامت بتنفيذ إدارة المدرسة، واختبار وتدريب المدرسين، ووضع الإطار التعليمي ومتابعة جودة الأداء بكفاءة واقتدار."
                        </p>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="quote-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="{{ asset('images/clients/knauf.png') }}" alt="Knauf" style="height: 32px;">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">youthinkgreen (YTG)</h6>
                                <small class="text-muted">Recommendation Letter</small>
                            </div>
                        </div>
                        <p class="text-muted small mb-0" style="line-height: 1.8;">
                            "ArabSkills demonstrated a high level of technical competence and professionalism. Based on our experience, ArabSkills has proven to be a reliable, knowledgeable, and impact-driven partner for technical curriculum design and capacity building."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== LEADERSHIP SPOTLIGHT ==================== -->
    <section class="py-section" id="founder">
        <div class="container">
            <div class="p-5 rounded-4 bg-dark text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #1e111d 0%, #0f172a 100%); border: 1px solid rgba(255, 255, 255, 0.1);">
                <div class="row align-items-center g-5">
                    <div class="col-lg-5" data-aos="fade-right">
                        <div class="position-relative">
                            <img src="{{ asset('images/profile/profile_img_03.jpg') }}" alt="Eng. Khaled Aziz signing ceremony with NTI" class="img-fluid rounded-4 shadow-lg w-100" style="border: 2px solid rgba(255, 255, 255, 0.15);">
                            <div class="mt-2 text-center text-slate-400 small">
                                <em>Eng. Khaled Aziz signing cooperation agreement with NTI</em>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7" data-aos="fade-left">
                        <div class="section-badge" style="background: rgba(255,255,255,0.08); color: #f59e0b; border-color: rgba(245,158,11,0.3);">
                            <i class="fa-solid fa-user-tie"></i> Founder & Managing Director
                        </div>
                        <h2 class="text-white fw-bold mb-2">Eng. Khaled Aziz Zaghloul</h2>
                        <h5 class="text-warning fw-semibold mb-3">TVET Expert, School Transformation Leader & Citizen Developer</h5>

                        <p class="text-slate-300 small mb-3" style="line-height: 1.8;">
                            With over <strong>17 years of leadership</strong> in technical and vocational education and training (TVET), Eng. Khaled has been at the forefront of elevating technical education across Egypt. Holding a Bachelor of Engineering (Architecture, Cairo University) and a Postgraduate Diploma in Total Quality Management (AUC), he has led and established more than <strong>20 Applied Technology Schools (ATS)</strong> and <strong>4 Vocational Training Centers (VTC)</strong>.
                        </p>

                        <p class="text-slate-300 small mb-4" style="line-height: 1.8;">
                            Currently serving as a <strong>VTEC Management Committee Member</strong> at the Alexandria Business Association (ABA), he manages vocational projects with USAID, GIZ, ILO, WFP, Exxon Mobil, NBE, and the Japanese Embassy. As an accomplished Citizen Developer, he directly architects the digital applications driving ArabSkills’ educational management systems.
                        </p>

                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-secondary-subtle text-light small px-3 py-2"><i class="fa-solid fa-graduation-cap me-1"></i> Cairo University & AUC Alumni</span>
                            <span class="badge bg-secondary-subtle text-light small px-3 py-2"><i class="fa-solid fa-building-columns me-1"></i> ABA VTEC Committee</span>
                            <span class="badge bg-secondary-subtle text-light small px-3 py-2"><i class="fa-solid fa-award me-1"></i> Pearson & City & Guilds Lead</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CERTIFICATE VERIFICATION SECTION ==================== -->
    <section class="py-section bg-plum-tint" id="verifySection">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <div class="section-badge"><i class="fa-solid fa-shield-check"></i> Digital Credential Registry</div>
                    <h2 class="section-title">Verify ArabSkills Issued Certificates</h2>
                    <p class="section-subtitle mb-4">
                        We provide an immutable, transparent online credential registry for all graduates of our Applied Technology Schools and vocational donor training programs.
                    </p>

                    <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 bg-white text-start">
                        <form onsubmit="handleVerifySubmit(event, 'sectionCodeInput')">
                            <label class="form-label fw-bold text-dark mb-2">Enter Certificate Identification Code</label>
                            <div class="input-group input-group-lg mb-3">
                                <span class="input-group-text bg-light text-muted border-end-0"><i class="fa-solid fa-qrcode fs-4"></i></span>
                                <input type="text" id="sectionCodeInput" class="form-control bg-light border-start-0" placeholder="e.g. DEMO100 or WFP100" required>
                                <button type="submit" class="btn btn-as-primary px-4 fw-bold">
                                    <i class="fa-solid fa-magnifying-glass me-2"></i> Verify Now
                                </button>
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between text-muted small">
                                <div><i class="fa-solid fa-circle-info text-primary me-1"></i> Test demo codes available: <a href="{{ url('/ec/DEMO100') }}" class="text-primary fw-bold text-decoration-none">DEMO100</a> or <a href="{{ url('/wfpc01/WFP100') }}" class="text-primary fw-bold text-decoration-none">WFP100</a></div>
                                <div class="mt-2 mt-sm-0"><span class="badge bg-success-subtle text-success"><i class="fa-solid fa-lock me-1"></i> 256-Bit Secure Verification</span></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CONTACT US ==================== -->
    <section class="py-section" id="contact">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="section-badge"><i class="fa-solid fa-envelope-open-text"></i> Get in Touch</div>
                    <h2 class="section-title">Let’s Transform Technical Education Together</h2>
                    <p class="text-muted mb-4">
                        Whether you are an industrial partner looking to establish an Applied Technology School, an international donor launching a vocational program, or an institution seeking accreditation, we are ready to collaborate.
                    </p>

                    <div class="d-flex flex-column gap-3 mb-4">
                        <div class="d-flex align-items-start gap-3 p-3 rounded-3 bg-light border">
                            <i class="fa-solid fa-phone text-warning fs-4 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Direct Phone</h6>
                                <p class="text-muted small mb-0">+20 100 021 4421</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-3 rounded-3 bg-light border">
                            <i class="fa-solid fa-envelope text-warning fs-4 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Official Email</h6>
                                <p class="text-muted small mb-0">info@arabskills.com / kaziz@arabskills.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-3 rounded-3 bg-light border">
                            <i class="fa-solid fa-map-location-dot text-warning fs-4 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Office Address</h6>
                                <p class="text-muted small mb-0">11 Youssef El Gendy St., Bab El Louk, Cairo, Egypt</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 bg-white border">
                        <h4 class="fw-bold text-dark mb-4">Request a Consultation</h4>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark small">Full Name *</label>
                                    <input type="text" name="name" class="form-control bg-light py-2" placeholder="e.g. Dr. Ahmed Hassan" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark small">Work Email *</label>
                                    <input type="email" name="email" class="form-control bg-light py-2" placeholder="name@company.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark small">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control bg-light py-2" placeholder="+20 10x xxx xxxx">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark small">Organization / Entity</label>
                                    <input type="text" name="company" class="form-control bg-light py-2" placeholder="Company, Ministry, or Agency">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold text-dark small">Project or Inquiry Details *</label>
                                    <textarea name="message" class="form-control bg-light py-2" rows="4" placeholder="Briefly describe your school project, training needs, or partnership request..." required></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-as-primary w-100 py-3 fw-bold">
                                        <i class="fa-solid fa-paper-plane me-2"></i> Submit Consultation Request
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection