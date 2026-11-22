@extends('layouts.app')

@php
    $isAr = app()->getLocale() == 'ar';
@endphp

@section('title', $isAr ? 'مهارات العرب | استشارات وتطوير التعليم الفني وتشغيل المدارس التطبيقية' : 'ArabSkills | Leading TVET Development & Applied Technology Schools Management')

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
        {{ $isAr ? 'left: -10%;' : 'right: -10%;' }}
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
        {{ $isAr ? 'right: -10%;' : 'left: -10%;' }}
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(217, 119, 6, 0.25) 0%, rgba(217, 119, 6, 0) 70%);
        pointer-events: none;
    }
    .hero-title {
        font-size: clamp(2.3rem, 4.4vw, 3.8rem);
        font-weight: 800;
        line-height: {{ $isAr ? '1.3' : '1.15' }};
        color: #ffffff;
        margin-bottom: 24px;
        letter-spacing: {{ $isAr ? '0' : '-0.03em' }};
    }
    .hero-title span {
        background: linear-gradient(120deg, #f59e0b 0%, #fbbf24 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .hero-subtitle {
        font-size: 1.15rem;
        color: #cbd5e1;
        line-height: 1.8;
        margin-bottom: 36px;
        max-width: 640px;
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
        {{ $isAr ? 'left: 25px;' : 'right: 25px;' }}
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
                        <span>
                            @if($isAr)
                                الشريك الرائد لتطوير التعليم الفني والمدارس التطبيقية بمصر
                            @else
                                Egypt’s Premier TVET & Applied Education Leader
                            @endif
                        </span>
                    </div>

                    <h1 class="hero-title">
                        @if($isAr)
                            نُحدث تحولاً جذرياً في التعليم الفني.. لنبني <span>كوادر مصر التطبيقية</span>
                        @else
                            Transforming Technical Education. Building Egypt’s <span>Applied Workforce</span>.
                        @endif
                    </h1>

                    <p class="hero-subtitle">
                        @if($isAr)
                            تتعاون شركة مهارات العرب مع الوزارات المعنية، ووكالات الأمم المتحدة الإنمائية، والجهات المانحة الدولية، وكبرى الشركات الصناعية لتأسيس وإدارة وتوسيع نطاق <strong>مدارس التكنولوجيا التطبيقية (ATS)</strong> وبرامج التدريب المهني القائمة على احتياجات سوق العمل الفعلية.
                        @else
                            ArabSkills partners with government ministries, UN development agencies, international donors, and industry leaders to establish, manage, and scale <strong>Applied Technology Schools (ATS)</strong> and demand-driven vocational ecosystems.
                        @endif
                    </p>

                    <div class="d-flex flex-wrap gap-3 mb-4">
                        <a href="#services" class="btn btn-as-primary py-3 px-4 fs-6">
                            <i class="fa-solid fa-compass {{ $isAr ? 'ms-2' : 'me-2' }}"></i>
                            {{ $isAr ? 'استكشف حلولنا وخدماتنا' : 'Explore Our Solutions' }}
                        </a>
                        <a href="#projects" class="btn btn-outline-light py-3 px-4 fs-6 rounded-3" style="border-width: 1.5px; font-weight: 600;">
                            <i class="fa-solid fa-school {{ $isAr ? 'ms-2' : 'me-2' }}"></i>
                            {{ $isAr ? 'مدارسنا ومشروعاتنا' : 'Our ATS Schools' }}
                        </a>
                    </div>

                    <!-- Quick Certificate Search in Hero -->
                    <div class="hero-verify-box" id="heroVerify">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="fa-solid fa-shield-halved text-warning"></i>
                            <span class="fw-bold small text-white">
                                {{ $isAr ? 'بوابة التحقق الفوري من الشهادات والاعتمادات' : 'Instant Credential Verification Portal' }}
                            </span>
                            <span class="badge bg-success-subtle text-success small {{ $isAr ? 'me-auto' : 'ms-auto' }}">
                                {{ $isAr ? 'نظام نشط' : 'Online' }}
                            </span>
                        </div>
                        <form onsubmit="handleVerifySubmit(event, 'heroCodeInput')" class="row g-2 align-items-center">
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary text-secondary"><i class="fa-solid fa-barcode"></i></span>
                                    <input type="text" id="heroCodeInput" class="form-control bg-dark text-white border-secondary py-2" placeholder="{{ $isAr ? 'أدخل كود شهادة المتدرب (مثال: DEMO100)' : 'Enter Learner Certificate Code (e.g. DEMO100)' }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-as-accent w-100 py-2">
                                    {{ $isAr ? 'تحقق الآن' : 'Verify Now' }}
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
                                <div class="stat-number text-warning mb-0 fs-2">+20</div>
                                <div class="small">
                                    <div class="fw-bold text-white">{{ $isAr ? 'مدرسة تكنولوجيا تطبيقية (ATS)' : 'Applied Technology Schools (ATS)' }}</div>
                                    <div class="text-slate-300">{{ $isAr ? 'تم تأسيسها وتشغيلها وإدارتها في مختلف محافظات مصر' : 'Established & transformed across Egypt' }}</div>
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
                        <div class="stat-number">+17</div>
                        <p class="stat-label">{{ $isAr ? 'عاماً من الخبرة في TVET' : 'Years TVET Experience' }}</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">+20</div>
                        <p class="stat-label">{{ $isAr ? 'مدرسة تكنولوجيا تطبيقية' : 'Applied Technology Schools' }}</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">+4</div>
                        <p class="stat-label">{{ $isAr ? 'مراكز تدريب مهني متطورة' : 'Vocational Training Centers' }}</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-number">4</div>
                        <p class="stat-label">{{ $isAr ? 'اعتمادات دولية مرموقة' : 'Global Accreditations' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== STRATEGIC PARTNERS & CLIENTS ==================== -->
    <section class="py-section bg-light-soft" id="partners">
        <div class="container text-center">
            <div class="section-badge"><i class="fa-solid fa-handshake"></i> {{ $isAr ? 'شركاء النجاح' : 'Trusted by Leaders' }}</div>
            <h2 class="section-title">{{ $isAr ? 'شركاؤنا الاستراتيجيون وعملاؤنا' : 'Our Strategic Partners & Clients' }}</h2>
            <p class="section-subtitle">
                @if($isAr)
                    نفخر بشراكاتنا الممتدة مع وكالات الأمم المتحدة، وصناديق التنمية الأوروبية والدولية، والوزارات الوطنية، وكبرى المؤسسات الصناعية والخدمية في مصر.
                @else
                    Proudly partnering with United Nations agencies, European development funds, national ministries, and Egypt's foremost industrial conglomerates.
                @endif
            </p>

            <!-- Band 1: UN & International Donors -->
            <div class="text-{{ $isAr ? 'end' : 'start' }} mb-3">
                <span class="badge bg-secondary-subtle text-secondary px-3 py-2 fw-bold text-uppercase small">
                    <i class="fa-solid fa-earth-americas {{ $isAr ? 'ms-1' : 'me-1' }}"></i>
                    {{ $isAr ? 'منظمات الأمم المتحدة والجهات المانحة الدولية' : 'International Development & UN Agencies' }}
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
            <div class="text-{{ $isAr ? 'end' : 'start' }} mb-3 mt-4">
                <span class="badge bg-secondary-subtle text-secondary px-3 py-2 fw-bold text-uppercase small">
                    <i class="fa-solid fa-industry {{ $isAr ? 'ms-1' : 'me-1' }}"></i>
                    {{ $isAr ? 'رواد الصناعة والمؤسسات الوطنية' : 'Industry Leaders & National Foundations' }}
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
                <div class="col-lg-6" data-aos="fade-{{ $isAr ? 'left' : 'right' }}">
                    <div class="section-badge"><i class="fa-solid fa-compass-drafting"></i> {{ $isAr ? 'من نحن' : 'Who We Are' }}</div>
                    <h2 class="section-title">
                        @if($isAr)
                            تحول مؤسسي يصنع التميز والريادة في التعليم الفني
                        @else
                            Institutional Transformation for Technical Excellence
                        @endif
                    </h2>
                    <p class="lead text-dark mb-3 fw-semibold">
                        @if($isAr)
                            مهارات العرب (ArabSkills) هي بيت الخبرة المصري الرائد المتخصص في تطوير التعليم الفني والتدريب المهني (TVET)، وتشغيل مدارس التكنولوجيا التطبيقية، والتأهيل للاعتمادات الدولية.
                        @else
                            ArabSkills is an Egypt-based education development and consulting firm specialized in Technical and Vocational Education and Training (TVET).
                        @endif
                    </p>
                    <p class="text-muted mb-4">
                        @if($isAr)
                            نعمل جنباً إلى جنب مع وزارة التربية والتعليم والتعليم الفني (MoETE)، والجهات المانحة الدولية، والشركاء الصناعيين لتصميم وتنفيذ نماذج تعليمية تطبيقية قائمة على الجدارات. تغطي خبرتنا تحليل المنظومات، والمشاركة في تطوير المناهج مع القطاع الصناعي، وبناء أطر ضمان الجودة، والربط بالمعايير الدولية، وإعادة تأهيل البنية التحتية والورش.
                        @else
                            We work alongside government bodies (Ministry of Education & Technical Education - MoETE), international development agencies, and industrial conglomerates to build demand-driven, competency-based educational ecosystems. Our expertise spans system analysis, curriculum co-development, international accreditation alignment, digital management systems, and turnkey school renovation.
                        @endif
                    </p>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                                <i class="fa-solid fa-graduation-cap fs-3 text-danger"></i>
                                <div>
                                    <div class="fw-bold text-dark">{{ $isAr ? 'تكنولوجيا تطبيقية' : 'Applied Technology' }}</div>
                                    <small class="text-muted">{{ $isAr ? 'مدارس ATS ثنائية حديثة' : 'Modern ATS Dual Schools' }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                                <i class="fa-solid fa-stamp fs-3 text-warning"></i>
                                <div>
                                    <div class="fw-bold text-dark">{{ $isAr ? 'اعتمادات دولية' : 'Global Accreditations' }}</div>
                                    <small class="text-muted">Pearson, City & Guilds, Omnia</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('/about') }}" class="btn btn-as-primary">
                        {{ $isAr ? 'الملف التعريفي الكامل للشركة' : 'Read Full Company Profile' }}
                        <i class="fa-solid {{ $isAr ? 'fa-arrow-left ms-2' : 'fa-arrow-right ms-2' }}"></i>
                    </a>
                </div>

                <div class="col-lg-6" data-aos="fade-{{ $isAr ? 'right' : 'left' }}">
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
                <div class="section-badge"><i class="fa-solid fa-screwdriver-wrench"></i> {{ $isAr ? 'خدماتنا المتخصصة' : 'What We Do' }}</div>
                <h2 class="section-title">{{ $isAr ? 'حلول متكاملة لمنظومة التعليم الفني والمدارس التطبيقية' : 'Comprehensive TVET & School Solutions' }}</h2>
                <p class="section-subtitle">
                    @if($isAr)
                        خبرة شاملة تغطي تأسيس المدارس، وتدريب المعلمين، والمشاركة في صياغة المناهج مع القطاع الصناعي، وإدارة العمليات الميدانية والأنظمة الرقمية.
                    @else
                        End-to-end expertise covering school establishment, teacher coaching, curriculum co-creation with industry, and digital operations.
                    @endif
                </p>
            </div>

            <div class="row g-4">
                <!-- Service 1 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-school"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">{{ $isAr ? 'إدارة المدارس التطبيقية (ATS)' : 'Technical Schools Management' }}</h4>
                        <p class="small text-muted mb-3">
                            {{ $isAr ? 'إدارة تشغيلية شاملة لمدارس التكنولوجيا التطبيقية والمدارس الفنية المزدوجة داخل المصانع، وضمان التوافق مع معايير وزارة التعليم الفني.' : 'Full operational management of Applied Technology Schools (ATS) and in-factory micro dual schools, ensuring alignment with MoETE and international benchmarks.' }}
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'حوكمة وإدارة مدارس ATS' : 'ATS School Governance' }}</li>
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'التنسيق مع الشريك الصناعي' : 'Industry Partner Alignment' }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-diagram-project"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">{{ $isAr ? 'إدارة مشروعات TVET والمانحين' : 'TVET Projects Management' }}</h4>
                        <p class="small text-muted mb-3">
                            {{ $isAr ? 'إدارة احترافية للمشروعات الممولة من الجهات المانحة والمبادرات الوطنية، بدءاً من دراسات الحالة والمسار الحرج وصولاً للتقييم والأثر الاجتماعي.' : 'Rigorous management of donor-funded and national development projects from baseline study and critical path planning to M&E and socio-economic impact.' }}
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'الامتثال لمعايير المانحين والتقارير' : 'Donor Compliance & Reporting' }}</li>
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'دراسات قياس الأثر التنموي' : 'Impact Assessment Studies' }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-book-open-reader"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">{{ $isAr ? 'تطوير المناهج والجدارات' : 'Curriculum Development' }}</h4>
                        <p class="small text-muted mb-3">
                            {{ $isAr ? 'تصميم مناهج وحقائب تدريبية قائمة على الجدارات (Competency-Based) ومصممة بالشراكة مع المصانع والشركات لتلبية متطلبات الوظائف.' : 'Designing competency-based learning packages and practical session guides co-created with industrial partners across diverse technical sectors.' }}
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'إطار الجدارات الصناعية' : 'Industry Competency Framework' }}</li>
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'أدلة المعلم وأوراق عمل الطالب' : 'Student & Teacher Handouts' }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">{{ $isAr ? 'تدريب وتأهيل المعلمين' : 'Teacher Training & Coaching' }}</h4>
                        <p class="small text-muted mb-3">
                            {{ $isAr ? 'تمكين المعلمين والمدربين الفنيين من أحدث استراتيجيات التدريس الحديثة، وإدارة الفصول الرقمية، والتدريب العملي، والتقييم الدوري.' : 'Empowering technical instructors with modern pedagogical methodologies, digital classroom tools, practical demonstrations, and ongoing performance coaching.' }}
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'الملاحظة الصفية والتوجيه المستمر' : 'Classroom Observation & Feedback' }}</li>
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'تقييمات الأداء السنوية للمعلمين' : 'Yearly Performance Evaluations' }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 5 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="250">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-certificate"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">{{ $isAr ? 'ضمان الجودة والاعتماد الدولي' : 'Quality Assurance & Accreditation' }}</h4>
                        <p class="small text-muted mb-3">
                            {{ $isAr ? 'بناء القدرات المؤسسية وتطوير أدلة الجودة المتوافقة مع جهات الاعتماد الدولية: بيرسون وبيرسون آشورد، سيتي آند جيلدز، وأومنيا فنلندا.' : 'Institutional capacity building and quality manuals aligned with Pearson UK, City & Guilds UK, Edexcel BTEC, and Omnia Finland accreditation standards.' }}
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'نظام التحقق الداخلي (IV)' : 'Internal Verification (IV) Systems' }}</li>
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'التجهيز لملفات الاعتماد الأجنبي' : 'Accreditation Preparation' }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 6 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">{{ $isAr ? 'برنامج إدارة المدارس الرقمي' : 'School Management Software' }}</h4>
                        <p class="small text-muted mb-3">
                            {{ $isAr ? 'تطبيق إلكتروني متكامل لمتابعة مؤشر السلوك الطلابي، والخطط الدراسية، والحضور والغياب، وتقارير الزيارات التفتيشية، وتواصل أولياء الأمور.' : 'Proprietary digital management system tracking student behavioral indices, academic plans, delivery schedules, quality inspections, and parent communication.' }}
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'مؤشر السلوك والترتيب الطلابي' : 'Student Behavioral Index' }}</li>
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'تطبيق لكافة الأجهزة (iOS, Android, PC)' : 'Cross-Platform (iOS, Android, Web)' }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 7 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="350">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-building-circle-check"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">{{ $isAr ? 'تطوير وتجهيز البنية التحتية والورش' : 'Infrastructure Renovation' }}</h4>
                        <p class="small text-muted mb-3">
                            {{ $isAr ? 'تأهيل الورش والمعامل والقاعات التدريسية ومطابقتها لأعلى معايير السلامة المهنية ومواصفات مدارس التكنولوجيا التطبيقية الحديثة.' : 'Full overhaul of workshops, scientific laboratories, smart classrooms, and recreational areas to meet rigorous ATS and industrial safety standards.' }}
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'التصميم المعماري والهندسي للورش' : 'Workshop Architectural Design' }}</li>
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'شراء وتوريد المعدات الفنية المعتمدة' : 'Technical Equipment Procurement' }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Service 8 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="as-card">
                        <div class="as-icon-box">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <h4 class="fs-5 fw-bold mb-3">{{ $isAr ? 'خدمات التوظيف والإرشاد المهني' : 'Employment & Career Services' }}</h4>
                        <p class="small text-muted mb-3">
                            {{ $isAr ? 'منهج الإرشاد المهني وكتابة السيرة الذاتية والمقابلات الشخصية، وتنظيم ملتقيات التوظيف والربط المباشر مع أصحاب الأعمال والشركات.' : 'Career guidance curriculum, interview preparation, job fairs, and direct placement connections between technical graduates and corporate employers.' }}
                        </p>
                        <ul class="feature-check-list small">
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'تدريب التلمذة الصناعية والتعليم المزدوج' : 'Dual Education Apprenticeships' }}</li>
                            <li><i class="fa-solid fa-check"></i> {{ $isAr ? 'تسهيل الانتقال لسوق العمل' : 'Labor Market Transition' }}</li>
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
                <div class="section-badge"><i class="fa-solid fa-route"></i> {{ $isAr ? 'منهجية العمل' : 'How We Deliver' }}</div>
                <h2 class="section-title">{{ $isAr ? 'منهجيتنا المبتكرة القائمة على ركيزتين' : 'Our Rigorous Two-Pillar Methodology' }}</h2>
                <p class="section-subtitle">
                    @if($isAr)
                        إطار عمل متكامل يدمج بين الانضباط والمنهجية الصارمة لإدارة مشروعات المانحين والتميز التشغيلي الميداني اليومي للمدارس الفنية.
                    @else
                        A holistic framework that integrates donor project management rigor with day-to-day school operational excellence.
                    @endif
                </p>

                <!-- Methodology Nav Tabs -->
                <ul class="nav nav-pills justify-content-center nav-methodology mb-5" id="methodologyTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-project-tab" data-bs-toggle="pill" data-bs-target="#pills-project" type="button" role="tab">
                            <i class="fa-solid fa-chart-gantt {{ $isAr ? 'ms-2' : 'me-2' }}"></i>
                            {{ $isAr ? 'الركيزة الأولى: إدارة مشروعات TVET والمانحين' : 'Pillar 1: TVET Project Management' }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-school-tab" data-bs-toggle="pill" data-bs-target="#pills-school" type="button" role="tab">
                            <i class="fa-solid fa-school-flag {{ $isAr ? 'ms-2' : 'me-2' }}"></i>
                            {{ $isAr ? 'الركيزة الثانية: إدارة وتشغيل المدارس الفنية' : 'Pillar 2: Technical Schools Operations' }}
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
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'دراسة الحالة والتحليل' : 'Case Study' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'دراسة متعمقة لكراسة الشروط ومتطلبات المشروع، وتحليل احتياجات سوق العمل والوضع الاجتماعي والاقتصادي للمستفيدين.' : 'Thorough analysis of proposal requirements, labor market dynamics, industry demand trends, and beneficiary socioeconomic context.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg">
                            <div class="step-card">
                                <div class="step-number">02</div>
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'التخطيط والمسار الحرج' : 'Planning & CPM' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'بناء مخطط جانت مفصل لكافة الأنشطة والتبعيات وتحديد المسار الحرج (Critical Path) ودراسة التكاليف والموازنات بدقة.' : 'Detailed Gantt scheduling, critical path identification, risk dependency mapping, and rigorous cost accounting for financial precision.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg">
                            <div class="step-card">
                                <div class="step-number">03</div>
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'التنفيذ المتمحور حول المستفيد' : 'Implementation' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'تنفيذ دقيق لجميع الأنشطة مع الحفاظ على مرونة التكيف الميداني بالتعاون المستمر والشفاف مع الجهة المالكة للمشروع.' : 'Beneficiary-centered execution with agile field adjustments, stakeholder coordination, and high-efficiency workflow management.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg">
                            <div class="step-card">
                                <div class="step-number">04</div>
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'المتابعة والتقييم M&E' : 'Monitoring & M&E' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'تطبيق نظم متابعة شاملة ومؤشرات أداء رقمية لقياس التقدم وضمان الجودة في كل مرحلة من مراحل المشروع.' : 'Continuous milestone evaluations, KPI tracking, and real-time field data collection to maintain quality and timely completion.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg">
                            <div class="step-card">
                                <div class="step-number">05</div>
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'قياس الأثر التنموي' : 'Impact Study' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'تقييم الآثار طويلة المدى على معدلات التشغيل، وزيادة الإنتاجية، والمردود الاقتصادي والاجتماعي المستدام على الأفراد والمجتمع.' : 'Qualitative & quantitative assessment of employment rates, employer satisfaction, productivity increases, and community ROI.' }}
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
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'اختيار المدرسة والتقييم' : 'School Selection' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'التعاون مع وزارة التعليم الفني والشريك الصناعي، والتقييم الميداني للورش والبنية التحتية وإعداد تقرير خط الأساس.' : 'MoETE collaboration, on-site infrastructure audits, workshop compatibility assessments, and comprehensive baseline reports.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-pen-ruler"></i></div>
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'صياغة المناهج والأدلة' : 'Curriculum Design' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'تصميم مصفوفات الجدارات الفنية وأدلة الجلسات العملية وأوراق عمل الطالب واعتمادها أكاديمياً وصناعياً.' : 'Competency frameworks, practical student workbooks, lesson plans, and academic validation aligned with industry partners.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-users-gear"></i></div>
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'القيادة والحوكمة المدرسية' : 'Leadership & Governance' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'بناء الهيكل التنظيمي والوصف الوظيفي الدقيق، والتنسيق الإداري المحكم مع مسؤولي الوزارة والشركاء.' : 'Custom organizational structures, job descriptions, MoETE liaison, and performance-based school administration.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-shield-halved"></i></div>
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'ضمان الجودة والاعتماد' : 'Quality & Accreditation' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'منظومة التحقق الداخلي والملاحظات التفتيشية، وإعداد ملفات التجهيز لاعتمادات بيرسون، سيتي آند جيلدز، وأومنيا فنلندا.' : 'Internal verification, observational audits, quality manual adherence, and preparation for Pearson, City & Guilds, or Omnia.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-user-graduate"></i></div>
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'مؤشر السلوك الطلابي' : 'Student Behavioral Index' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'تتبع الأنشطة الإيجابية والسلبية رقمياً، وإطلاق برامج القيادة الطلابية، والرحلات الصناعية، ومناهج التوجيه المهني.' : 'Tracking positive & negative activities digitally, student leadership programs, career fairs, and soft-skills coaching.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-person-chalkboard"></i></div>
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'تدريب وتوجيه المعلمين' : 'Staff Coaching' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'اختيار الكوادر من معلمي الوزارة والخبراء الخارجيين، وتطبيق زيارات الملاحظة الصفية وتقديم التغذية الراجعة والتقييم السنوي.' : 'Selecting ministry & external teachers, conducting continuous classroom coaching, and administering yearly evaluations.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-hammer"></i></div>
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'تطوير وتجهيز الورش' : 'Infrastructure Renovation' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'تجديد الورش الفنية والمعامل التخصصية وتجهيزها بالمعدات الحديثة وشروط السلامة والصحة المهنية.' : 'Complete workshop re-engineering, lab equipment setup, safety compliance, and modernized educational spaces.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="step-card">
                                <div class="step-number"><i class="fa-solid fa-mobile-screen"></i></div>
                                <h5 class="fw-bold mb-2">{{ $isAr ? 'التطبيق الإلكتروني الذكي' : 'Digital Application' }}</h5>
                                <p class="small text-muted mb-0">
                                    {{ $isAr ? 'المتابعة اللحظية للجلسات التدريسية، والدرجات، والسلوك، والحضور، وسجلات التفتيش عبر الحاسوب والهاتف.' : 'Real-time tracking of sessions, grades, behavioral indices, attendance, and quality audit logs on iOS, Android, and PC.' }}
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
                <div class="col-lg-6" data-aos="fade-{{ $isAr ? 'left' : 'right' }}">
                    <div class="section-badge" style="background: rgba(255,255,255,0.08); color: #f59e0b; border-color: rgba(245,158,11,0.3);">
                        <i class="fa-solid fa-code"></i> {{ $isAr ? 'تقنية خاصة وحصرية' : 'Proprietary Technology' }}
                    </div>
                    <h2 class="text-white fw-bold mb-3 fs-1">
                        {{ $isAr ? 'منصة ArabSkills الرقمية لإدارة المدارس التطبيقية' : 'ArabSkills Digital School Management Platform' }}
                    </h2>
                    <p class="text-slate-300 mb-4" style="line-height: 1.8;">
                        @if($isAr)
                            تم تطوير المنصة بالكامل بواسطة فريق التحول الرقمي والتطوير بمهارات العرب، لتوفر نظاماً تشغيلياً شاملاً مصمماً خصيصاً لتلبية متطلبات حوكمة ومدارس التكنولوجيا التطبيقية في مصر، بواجهة عربية ذكية ومتكاملة.
                        @else
                            Developed entirely in-house by ArabSkills’ Citizen Development team, our cross-platform application provides an end-to-end operational backbone tailored specifically for the governance of Applied Technology Schools in Egypt.
                        @endif
                    </p>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                <div class="d-flex align-items-center gap-2 mb-2 text-warning fw-bold">
                                    <i class="fa-solid fa-id-card"></i> {{ $isAr ? 'وحدة الطلاب' : 'Student Module' }}
                                </div>
                                <p class="small text-slate-300 mb-0">
                                    {{ $isAr ? 'ملف الطالب الشامل، تتبع مؤشر السلوك والترتيب الأكاديمي، سجلات تواصل أولياء الأمور، والملف الصحي.' : 'Comprehensive profile tracking, behavioral indices, parent communication log, and health records.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                <div class="d-flex align-items-center gap-2 mb-2 text-warning fw-bold">
                                    <i class="fa-solid fa-chalkboard-user"></i> {{ $isAr ? 'وحدة المعلمين' : 'Teachers Module' }}
                                </div>
                                <p class="small text-slate-300 mb-0">
                                    {{ $isAr ? 'قاعدة بيانات المعلمين، سجلات الملاحظة والتقييم، تتبع تنفيذ المناهج، وقائمة المهام المشتركة.' : 'Teacher credential database, observation logs, lesson delivery tracking, and shared tasks.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                <div class="d-flex align-items-center gap-2 mb-2 text-warning fw-bold">
                                    <i class="fa-solid fa-list-check"></i> {{ $isAr ? 'إدارة الجودة والتفتيش' : 'Quality & Audits' }}
                                </div>
                                <p class="small text-slate-300 mb-0">
                                    {{ $isAr ? 'توثيق زيارات مسؤولي الجودة، بنك تقارير الزيارات المبدئية، تحليل الدرجات وخطط التدخل السريع.' : 'Quality inspection logs, initial visit report bank, grade analysis, and intervention tracking.' }}
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                <div class="d-flex align-items-center gap-2 mb-2 text-warning fw-bold">
                                    <i class="fa-solid fa-shield-virus"></i> {{ $isAr ? 'يعمل بدون إنترنت وبأمان تام' : 'Multi-Platform & Offline' }}
                                </div>
                                <p class="small text-slate-300 mb-0">
                                    {{ $isAr ? 'يعمل دون اتصال مع مزامنة تلقائية فور توفر الشبكة، ويدعم نظام الصلاحيات والأمان لكافة الأجهزة.' : 'Arabic interface, works offline with automatic sync, role-based security, accessible on iOS, Android, and PC.' }}
                                </p>
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

                <div class="col-lg-6" data-aos="fade-{{ $isAr ? 'right' : 'left' }}">
                    <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1);">
                        <div class="d-flex align-items-center justify-content-between pb-3 border-bottom border-secondary mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-danger rounded-circle p-1"></span>
                                <span class="badge bg-warning rounded-circle p-1"></span>
                                <span class="badge bg-success rounded-circle p-1"></span>
                                <span class="small text-slate-400 {{ $isAr ? 'me-2' : 'ms-2' }}">ArabSkills School Management System v3.2</span>
                            </div>
                            <span class="badge bg-success text-white small"><i class="fa-solid fa-lock me-1"></i> {{ $isAr ? 'مشفر وآمن' : 'Encrypted' }}</span>
                        </div>
                        <img src="{{ asset('images/profile/profile_img_05.jpg') }}" alt="ArabSkills Software Application" class="img-fluid rounded-3 mb-3 w-100" style="height: 320px; object-fit: cover;">
                        <div class="text-center text-slate-400 small">
                            <em>{{ $isAr ? 'تمكين القيادات المدرسية ومسؤولي الجودة من متابعة لحظية دقيقة للعملية التعليمية.' : 'Empowering ATS school leaders and quality officers with real-time operational transparency.' }}</em>
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
                <div class="section-badge"><i class="fa-solid fa-briefcase"></i> {{ $isAr ? 'سجل الإنجازات' : 'Track Record' }}</div>
                <h2 class="section-title">{{ $isAr ? 'مدارس التكنولوجيا التطبيقية والمشروعات الكبرى' : 'Applied Technology Schools & Landmark Projects' }}</h2>
                <p class="section-subtitle">
                    @if($isAr)
                        سجل حافل من النجاحات في تأسيس وإدارة مدارس التكنولوجيا التطبيقية في قطاعات الأدوية، والصناعات الهندسية، والاتصالات، والزراعة الحديثة.
                    @else
                        A proven portfolio transforming education across industrial, pharmaceutical, technological, and agricultural sectors.
                    @endif
                </p>
            </div>

            <div class="row g-4">
                <!-- Project 1 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">{{ $isAr ? 'الصناعات الدوائية' : 'Pharmaceutical Industry' }}</span>
                            <h4 class="fs-5 fw-bold mb-2">{{ $isAr ? 'مدرسة أرابكوميد للتكنولوجيا التطبيقية' : 'ArabcoMed Applied Technology School' }}</h4>
                            <p class="small text-muted mb-3">
                                <strong>{{ $isAr ? 'العميل الشريك:' : 'Client:' }}</strong> Arab Company for Medical Products (ArabcoMed)<br>
                                <strong>{{ $isAr ? 'الموقع:' : 'Location:' }}</strong> {{ $isAr ? 'مدينة العبور - القاهرة' : 'Obour City, Cairo' }}<br>
                                <strong>{{ $isAr ? 'نطاق العمل:' : 'Scope:' }}</strong> {{ $isAr ? 'إدارة المدرسة بالكامل، تطوير مناهج الكيمياء الدوائية، اختبار وتدريب المدرسين، ومتابعة جودة الأداء.' : 'Complete school management, specialized Chemist & Pharma curricula, teacher selection, and MoETE quality assurance.' }}
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> {{ $isAr ? 'إدارة وتشغيل كامل للمدرسة' : 'Full School Operations & Management' }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">{{ $isAr ? 'التكنولوجيا الزراعية والاستدامة' : 'Agri-Tech & Sustainability' }}</span>
                            <h4 class="fs-5 fw-bold mb-2">{{ $isAr ? 'مدرسة إي إف جي هيرميس الزراعية' : 'EFG Hermes Agri-Tech ATS' }}</h4>
                            <p class="small text-muted mb-3">
                                <strong>{{ $isAr ? 'العميل الشريك:' : 'Client:' }}</strong> EFG Foundation for Social Development<br>
                                <strong>{{ $isAr ? 'الموقع:' : 'Location:' }}</strong> {{ $isAr ? 'الأقصر - صعيد مصر' : 'Luxor, Upper Egypt' }}<br>
                                <strong>{{ $isAr ? 'نطاق العمل:' : 'Scope:' }}</strong> {{ $isAr ? 'تأسيس أول مدرسة ثانوية للتكنولوجيا الزراعية الحديثة بالأقصر، وصياغة المناهج مع خبراء الصناعة والجهات الأكاديمية.' : 'Full establishment of Egypt\'s landmark Agri-Tech secondary school, curriculum co-development, and legal accreditation.' }}
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> {{ $isAr ? 'شهادة توصية رسمية معتمدة' : 'Official Letter of Recommendation Received' }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">{{ $isAr ? 'الزراعة الحديثة والآلات' : 'Modern Agriculture' }}</span>
                            <h4 class="fs-5 fw-bold mb-2">{{ $isAr ? 'مدرسة د. سمير النجار للتكنولوجيا التطبيقية' : 'Dr. Samir Nagar ATS (Daltex)' }}</h4>
                            <p class="small text-muted mb-3">
                                <strong>{{ $isAr ? 'العميل الشريك:' : 'Client:' }}</strong> Daltex Agricultural Conglomerate<br>
                                <strong>{{ $isAr ? 'الموقع:' : 'Location:' }}</strong> {{ $isAr ? 'محافظة البحيرة' : 'Behera Governorate' }}<br>
                                <strong>{{ $isAr ? 'نطاق العمل:' : 'Scope:' }}</strong> {{ $isAr ? 'إدارة المدرسة بالكامل، تطوير مناهج الميكنة والتقنيات الزراعية، تأهيل الورش، وتدريب وتطوير المعلمين.' : 'Full school management, modern agricultural machinery curricula, workshop renovation, and teacher coaching.' }}
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> {{ $isAr ? 'إدارة شاملة ومتكاملة للمدرسة' : 'Comprehensive Turnkey Management' }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">{{ $isAr ? 'الصناعات الدوائية والرعاية الصحية' : 'Pharma & Regulatory TVET' }}</span>
                            <h4 class="fs-5 fw-bold mb-2">{{ $isAr ? 'مدرسة هيئة الدواء وفياتريس التطبيقية' : 'Egyptian Drug Authority & Viatris ATS' }}</h4>
                            <p class="small text-muted mb-3">
                                <strong>{{ $isAr ? 'العميل الشريك:' : 'Client:' }}</strong> EDA & Viatris Healthcare<br>
                                <strong>{{ $isAr ? 'الموقع:' : 'Location:' }}</strong> {{ $isAr ? 'شبرا - القاهرة' : 'Shobra, Cairo' }}<br>
                                <strong>{{ $isAr ? 'نطاق العمل:' : 'Scope:' }}</strong> {{ $isAr ? 'إدارة المدرسة بالكامل وتصميم المناهج الفنية للتصنيع الدوائي وتأهيل الكوادر الفنية المعتمدة.' : 'End-to-end technical school governance, industry-aligned pharmaceutical manufacturing syllabus, and teacher training.' }}
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> {{ $isAr ? 'تكنولوجيا الرعاية الصحية المتخصصة' : 'Specialized Healthcare Technology' }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 5 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">{{ $isAr ? 'الاتصالات وتطوير البرمجيات' : 'ICT & Software Engineering' }}</span>
                            <h4 class="fs-5 fw-bold mb-2">{{ $isAr ? 'مدارس وي للتكنولوجيا التطبيقية (7 محافظات)' : 'WE Applied Technology Schools (7 Governorates)' }}</h4>
                            <p class="small text-muted mb-3">
                                <strong>{{ $isAr ? 'العميل الشريك:' : 'Client:' }}</strong> Telecom Egypt (WE)<br>
                                <strong>{{ $isAr ? 'المحافظات:' : 'Locations:' }}</strong> {{ $isAr ? 'مدينة نصر، الشيخ زايد، الإسكندرية، المنصورة، السويس، المنيا، الوادي الجديد' : 'Nasr City, Sheikh Zayed, Alexandria, Mansoura, Suez, Minya, New Valley' }}<br>
                                <strong>{{ $isAr ? 'نطاق العمل:' : 'Scope:' }}</strong> {{ $isAr ? 'المشاركة في تأسيس المدارس، وتجديد المباني والورش، وتطوير مناهج تكنولوجيا المعلومات، وبناء القدرات والقيادة الاستراتيجية.' : 'School initiation, infrastructure renovation, IT & software curriculum, and strategic leadership.' }}
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> {{ $isAr ? '7 مدارس على مستوى الجمهورية' : '7 Schools Nationwide' }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project 6 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="350">
                    <div class="project-card">
                        <div class="card-body">
                            <span class="project-badge">{{ $isAr ? 'التدريب المهني وسبل المعيشة' : 'Humanitarian & Refugee Livelihoods' }}</span>
                            <h4 class="fs-5 fw-bold mb-2">{{ $isAr ? 'مشروع التدريب المهني مع WFP ومؤسسة أم حبيبة' : 'WFP & Om Habibeh Foundation TVET' }}</h4>
                            <p class="small text-muted mb-3">
                                <strong>{{ $isAr ? 'العميل الشريك:' : 'Client:' }}</strong> UN World Food Programme (WFP)<br>
                                <strong>{{ $isAr ? 'الموقع:' : 'Location:' }}</strong> {{ $isAr ? 'القاهرة' : 'Cairo' }}<br>
                                <strong>{{ $isAr ? 'نطاق العمل:' : 'Scope:' }}</strong> {{ $isAr ? 'تنفيذ برامج تدريب مهني مكثفة لأكثر من 600 متدرب في مجالات الكهرباء، التيار الخفيف، صناعة الحلي والمجوهرات، والضيافة.' : 'Practical vocational training and employment transition for 600+ refugees in electrical, light current, jewelry, and hospitality.' }}
                            </p>
                            <div class="pt-2 border-top small text-secondary">
                                <i class="fa-solid fa-check-double text-success me-1"></i> {{ $isAr ? 'أكثر من 600 خريج معتمد' : '600+ Trainees Empowered' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accreditations Row -->
            <div class="mt-5 p-4 rounded-4 bg-white border shadow-sm">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-center text-lg-{{ $isAr ? 'end' : 'start' }} mb-3 mb-lg-0">
                        <h5 class="fw-bold text-dark mb-1">{{ $isAr ? 'التأهيل والجاهزية للاعتماد الدولي' : 'International Accreditation Readiness' }}</h5>
                        <p class="small text-muted mb-0">
                            {{ $isAr ? 'أنظمة الجودة لدينا مطابقة لأرقى جهات التقييم والاعتماد الدولية:' : 'Our quality systems are fully aligned with premier global awarding bodies:' }}
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <div class="row g-2 text-center">
                            <div class="col-6 col-sm-3">
                                <div class="accred-badge">
                                    <div class="small text-muted text-uppercase" style="font-size: 0.7rem;">{{ $isAr ? 'المملكة المتحدة' : 'United Kingdom' }}</div>
                                    <div class="fw-bold">Pearson Assured</div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="accred-badge">
                                    <div class="small text-muted text-uppercase" style="font-size: 0.7rem;">{{ $isAr ? 'المملكة المتحدة' : 'United Kingdom' }}</div>
                                    <div class="fw-bold">City & Guilds</div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="accred-badge">
                                    <div class="small text-muted text-uppercase" style="font-size: 0.7rem;">{{ $isAr ? 'فنلندا' : 'Finland' }}</div>
                                    <div class="fw-bold">Omnia Finland</div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="accred-badge">
                                    <div class="small text-muted text-uppercase" style="font-size: 0.7rem;">{{ $isAr ? 'المملكة المتحدة' : 'United Kingdom' }}</div>
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
                <div class="section-badge"><i class="fa-solid fa-quote-left"></i> {{ $isAr ? 'شهادات وتوصيات الشركاء' : 'Verified Endorsements' }}</div>
                <h2 class="section-title">{{ $isAr ? 'ماذا يقول شركاؤنا عن مهارات العرب؟' : 'What Our Partners Say' }}</h2>
                <p class="section-subtitle">
                    {{ $isAr ? 'مقتطفات من خطابات التوصية الرسمية وعقود التعاون المعتمدة.' : 'Excerpts from official letters of recommendation and partnership agreements.' }}
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up">
                    <div class="quote-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="{{ asset('images/clients/sawiris.png') }}" alt="EFG Foundation" style="height: 38px;">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">{{ $isAr ? 'مؤسسة إي إف جي للتنمية الاجتماعية' : 'EFG Foundation for Social Development' }}</h6>
                                <small class="text-muted">{{ $isAr ? 'خطاب توصية رسمي' : 'Recommendation Letter' }}</small>
                            </div>
                        </div>
                        <p class="text-muted small mb-0" style="line-height: 1.8;">
                            @if($isAr)
                                "أظهرت شركة مهارات العرب احترافية استثنائية وخبرة واسعة خلال المرحلة التحضيرية لتأسيس أول مدرسة تكنولوجيا زراعية في الأقصر. إنهم يقودون جهود تطوير مناهج مستقبلية تركز على احتياجات السوق بالتعاون مع الخبراء والجهات الأكاديمية والمجتمع المدني."
                            @else
                                "ArabSkills has demonstrated exceptional professionalism and expertise throughout the preparatory phase for the first Agri-Tech Secondary School in Luxor. They are leading efforts to develop a future-focused curriculum in collaboration with industry experts, academia, and civil society."
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="quote-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="{{ asset('images/clients/arabcomed.webp') }}" alt="ArabcoMed" style="height: 38px;">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">{{ $isAr ? 'الشركة العربية للمستحضرات الطبية (أرابكوميد)' : 'ArabcoMed Medical Products' }}</h6>
                                <small class="text-muted">{{ $isAr ? 'إفادة تعاقد وتشغيل رسمية' : 'Official Partnership Statement' }}</small>
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
                                <small class="text-muted">{{ $isAr ? 'خطاب شكر وتوصية' : 'Recommendation Letter' }}</small>
                            </div>
                        </div>
                        <p class="text-muted small mb-0" style="line-height: 1.8;">
                            @if($isAr)
                                "أظهرت مهارات العرب كفاءة فنية عالية واحترافية بالغة في تصميم دليل المهارات الفنية الخضراء. وبناءً على تجربتنا الناجحة، فإن مهارات العرب شريك موثوق ومبادر وقادر على تحقيق الأثر الإيجابي في تطوير التعليم والتدريب الفني."
                            @else
                                "ArabSkills demonstrated a high level of technical competence and professionalism. Based on our experience, ArabSkills has proven to be a reliable, knowledgeable, and impact-driven partner for technical curriculum design and capacity building."
                            @endif
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
                    <div class="col-lg-5" data-aos="fade-{{ $isAr ? 'left' : 'right' }}">
                        <div class="position-relative">
                            <img src="{{ asset('images/profile/profile_img_03.jpg') }}" alt="Eng. Khaled Aziz signing ceremony with NTI" class="img-fluid rounded-4 shadow-lg w-100" style="border: 2px solid rgba(255, 255, 255, 0.15);">
                            <div class="mt-2 text-center text-slate-400 small">
                                <em>{{ $isAr ? 'م. خالد عزيز أثناء توقيع بروتوكول التعاون مع المعهد القومي للاتصالات NTI' : 'Eng. Khaled Aziz signing cooperation agreement with NTI' }}</em>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7" data-aos="fade-{{ $isAr ? 'right' : 'left' }}">
                        <div class="section-badge" style="background: rgba(255,255,255,0.08); color: #f59e0b; border-color: rgba(245,158,11,0.3);">
                            <i class="fa-solid fa-user-tie"></i> {{ $isAr ? 'المؤسس والمدير التنفيذي' : 'Founder & Managing Director' }}
                        </div>
                        <h2 class="text-white fw-bold mb-2">{{ $isAr ? 'المهندس / خالد عزيز زغلول' : 'Eng. Khaled Aziz Zaghloul' }}</h2>
                        <h5 class="text-warning fw-semibold mb-3">
                            {{ $isAr ? 'خبير التعليم الفني والتحول المؤسسي ومطور المنظومات الرقمية' : 'TVET Expert, School Transformation Leader & Citizen Developer' }}
                        </h5>

                        <p class="text-slate-300 small mb-3" style="line-height: 1.8;">
                            @if($isAr)
                                يمتلك المهندس خالد عزيز خبرة قيادية تمتد لأكثر من <strong>17 عاماً</strong> في مجال التعليم والتدريب الفني والمهني (TVET) والتحول المؤسسي في مصر. تخرج من كلية الهندسة (قسم العمارة) بجامعة القاهرة، وحصل على دبلوم الدراسات العليا في إدارة الجودة الشاملة (TQM) من الجامعة الأمريكية بالقاهرة. قاد وأسس أكثر من <strong>20 مدرسة تكنولوجيا تطبيقية (ATS)</strong> و<strong>4 مراكز تدريب مهني كبرى (VTC)</strong>.
                            @else
                                With over <strong>17 years of leadership</strong> in technical and vocational education and training (TVET), Eng. Khaled has been at the forefront of elevating technical education across Egypt. Holding a Bachelor of Engineering (Architecture, Cairo University) and a Postgraduate Diploma in Total Quality Management (AUC), he has led and established more than <strong>20 Applied Technology Schools (ATS)</strong> and <strong>4 Vocational Training Centers (VTC)</strong>.
                            @endif
                        </p>

                        <p class="text-slate-300 small mb-4" style="line-height: 1.8;">
                            @if($isAr)
                                يشغل حالياً منصب عضو لجنة إدارة مجمع VTEC بجمعية رجال أعمال الإسكندرية (ABA)، وأدار مشروعات تدريب وتشغيل دولية مع USAID، GIZ، منظمة العمل الدولية (ILO)، برنامج الأغذية العالمي (WFP)، إكسون موبيل، والبنك الأهلي المصري. كما يقود الابتكار الرقمي بالشركة كمطور خبير (Citizen Developer) للمنظومة الرقمية لإدارة المدارس.
                            @else
                                Currently serving as a <strong>VTEC Management Committee Member</strong> at the Alexandria Business Association (ABA), he manages vocational projects with USAID, GIZ, ILO, WFP, Exxon Mobil, NBE, and the Japanese Embassy. As an accomplished Citizen Developer, he directly architects the digital applications driving ArabSkills’ educational management systems.
                            @endif
                        </p>

                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-secondary-subtle text-light small px-3 py-2"><i class="fa-solid fa-graduation-cap me-1"></i> {{ $isAr ? 'خريج جامعة القاهرة والجامعة الأمريكية بالقاهرة' : 'Cairo University & AUC Alumni' }}</span>
                            <span class="badge bg-secondary-subtle text-light small px-3 py-2"><i class="fa-solid fa-building-columns me-1"></i> {{ $isAr ? 'عضو لجنة إدارة VTEC - جمعية رجال أعمال الإسكندرية' : 'ABA VTEC Committee' }}</span>
                            <span class="badge bg-secondary-subtle text-light small px-3 py-2"><i class="fa-solid fa-award me-1"></i> {{ $isAr ? 'قيادة اعتمادات Pearson وCity & Guilds' : 'Pearson & City & Guilds Lead' }}</span>
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
                    <div class="section-badge"><i class="fa-solid fa-shield-check"></i> {{ $isAr ? 'السجل الرقمي للاعتماد والشهادات' : 'Digital Credential Registry' }}</div>
                    <h2 class="section-title">{{ $isAr ? 'التحقق من صحة شهادات مهارات العرب' : 'Verify ArabSkills Issued Certificates' }}</h2>
                    <p class="section-subtitle mb-4">
                        {{ $isAr ? 'نوفر بوابة استعلام وتحقق رقمية موثوقة ومباشرة لجميع خريجي مدارس التكنولوجيا التطبيقية وبرامج التدريب المهني والمنح التنموية.' : 'We provide an immutable, transparent online credential registry for all graduates of our Applied Technology Schools and vocational donor training programs.' }}
                    </p>

                    <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 bg-white text-{{ $isAr ? 'end' : 'start' }}">
                        <form onsubmit="handleVerifySubmit(event, 'sectionCodeInput')">
                            <label class="form-label fw-bold text-dark mb-2">{{ $isAr ? 'أدخل كود الشهادة أو الرمز التعريفي للمتدرب' : 'Enter Certificate Identification Code' }}</label>
                            <div class="input-group input-group-lg mb-3">
                                <span class="input-group-text bg-light text-muted border-{{ $isAr ? 'start' : 'end' }}-0"><i class="fa-solid fa-qrcode fs-4"></i></span>
                                <input type="text" id="sectionCodeInput" class="form-control bg-light border-{{ $isAr ? 'end' : 'start' }}-0" placeholder="{{ $isAr ? 'مثال: DEMO100 أو WFP100' : 'e.g. DEMO100 or WFP100' }}" required>
                                <button type="submit" class="btn btn-as-primary px-4 fw-bold">
                                    <i class="fa-solid fa-magnifying-glass {{ $isAr ? 'ms-2' : 'me-2' }}"></i>
                                    {{ $isAr ? 'تحقق الآن' : 'Verify Now' }}
                                </button>
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between text-muted small">
                                <div><i class="fa-solid fa-circle-info text-primary me-1"></i> {{ $isAr ? 'أكواد اختبار تجريبية:' : 'Test demo codes available:' }} <a href="{{ url('/ec/DEMO100') }}" class="text-primary fw-bold text-decoration-none">DEMO100</a> {{ $isAr ? 'أو' : 'or' }} <a href="{{ url('/wfpc01/WFP100') }}" class="text-primary fw-bold text-decoration-none">WFP100</a></div>
                                <div class="mt-2 mt-sm-0"><span class="badge bg-success-subtle text-success"><i class="fa-solid fa-lock me-1"></i> {{ $isAr ? 'تحقق رقمي آمن وموثق' : '256-Bit Secure Verification' }}</span></div>
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
                <div class="col-lg-5" data-aos="fade-{{ $isAr ? 'left' : 'right' }}">
                    <div class="section-badge"><i class="fa-solid fa-envelope-open-text"></i> {{ $isAr ? 'تواصل معنا' : 'Get in Touch' }}</div>
                    <h2 class="section-title">
                        {{ $isAr ? 'معاً نبني مستقبلاً ملهماً للتعليم الفني في مصر' : 'Let’s Transform Technical Education Together' }}
                    </h2>
                    <p class="text-muted mb-4">
                        @if($isAr)
                            سواء كنت شريكاً صناعياً تتطلع لتأسيس مدرسة تكنولوجيا تطبيقية، أو جهة مانحة دولية تُطلق برنامج تدريب مهني، أو مؤسسة تسعى للاعتماد الدولي.. يسعدنا التعاون معكم.
                        @else
                            Whether you are an industrial partner looking to establish an Applied Technology School, an international donor launching a vocational program, or an institution seeking accreditation, we are ready to collaborate.
                        @endif
                    </p>

                    <div class="d-flex flex-column gap-3 mb-4">
                        <div class="d-flex align-items-start gap-3 p-3 rounded-3 bg-light border">
                            <i class="fa-solid fa-phone text-warning fs-4 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">{{ $isAr ? 'الاتصال المباشر' : 'Direct Phone' }}</h6>
                                <p class="text-muted small mb-0" dir="ltr">+20 100 021 4421</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-3 rounded-3 bg-light border">
                            <i class="fa-solid fa-envelope text-warning fs-4 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">{{ $isAr ? 'البريد الإلكتروني' : 'Official Email' }}</h6>
                                <p class="text-muted small mb-0">info@arabskills.com / kaziz@arabskills.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 p-3 rounded-3 bg-light border">
                            <i class="fa-solid fa-map-location-dot text-warning fs-4 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">{{ $isAr ? 'عنوان المقر' : 'Office Address' }}</h6>
                                <p class="text-muted small mb-0">{{ $isAr ? '11 شارع يوسف الجندي - باب اللوق - القاهرة' : '11 Youssef El Gendy St., Bab El Louk, Cairo, Egypt' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-{{ $isAr ? 'right' : 'left' }}">
                    <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 bg-white border">
                        <h4 class="fw-bold text-dark mb-4">{{ $isAr ? 'طلب استشارة أو شراكة' : 'Request a Consultation' }}</h4>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark small">{{ $isAr ? 'الاسم الكامل *' : 'Full Name *' }}</label>
                                    <input type="text" name="name" class="form-control bg-light py-2" placeholder="{{ $isAr ? 'مثال: أ.د. أحمد حسن' : 'e.g. Dr. Ahmed Hassan' }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark small">{{ $isAr ? 'البريد الإلكتروني للعمل *' : 'Work Email *' }}</label>
                                    <input type="email" name="email" class="form-control bg-light py-2" placeholder="name@company.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark small">{{ $isAr ? 'رقم الهاتف' : 'Phone Number' }}</label>
                                    <input type="tel" name="phone" class="form-control bg-light py-2" placeholder="+20 10x xxx xxxx">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark small">{{ $isAr ? 'المؤسسة / الشركة / الجهة' : 'Organization / Entity' }}</label>
                                    <input type="text" name="company" class="form-control bg-light py-2" placeholder="{{ $isAr ? 'اسم الشركة أو الوزارة أو المنظمة' : 'Company, Ministry, or Agency' }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold text-dark small">{{ $isAr ? 'تفاصيل المشروع أو الاستشارة المطلوبة *' : 'Project or Inquiry Details *' }}</label>
                                    <textarea name="message" class="form-control bg-light py-2" rows="4" placeholder="{{ $isAr ? 'يرجى تقديم نبذة عن مشروع المدرسة، احتياجات التدريب، أو متطلبات الشراكة...' : 'Briefly describe your school project, training needs, or partnership request...' }}" required></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-as-primary w-100 py-3 fw-bold">
                                        <i class="fa-solid fa-paper-plane {{ $isAr ? 'ms-2' : 'me-2' }}"></i>
                                        {{ $isAr ? 'إرسال طلب الاستشارة' : 'Submit Consultation Request' }}
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
