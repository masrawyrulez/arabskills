@extends('layouts.app')

@section('title', 'About Us & Track Record | ArabSkills Educational Consulting')

@section('content')

    <!-- Hero Header -->
    <section class="py-5 bg-dark text-white position-relative" style="background: linear-gradient(135deg, #0b1120 0%, #1e111d 100%);">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="section-badge mb-2" style="background: rgba(255,255,255,0.08); color: #f59e0b; border-color: rgba(245,158,11,0.3);">
                        <i class="fa-solid fa-landmark"></i> About ArabSkills
                    </div>
                    <h1 class="display-5 fw-bold text-white mb-3">Institutional Transformation & Applied Learning</h1>
                    <p class="lead text-slate-300 mb-0" style="max-width: 700px; font-size: 1.15rem; line-height: 1.8;">
                        ArabSkills (شركة مهارات العرب للحلول المتكاملة) is an Egypt-based educational development and consulting firm specialized in Technical and Vocational Education and Training (TVET), Applied Technology Schools (ATS), and international quality accreditation.
                    </p>
                </div>
                <div class="col-lg-4 text-center mt-4 mt-lg-0" data-aos="fade-left">
                    <img src="{{ asset('images/logo.png') }}" alt="ArabSkills" style="height: 65px; filter: brightness(0) invert(1);">
                </div>
            </div>
        </div>
    </section>

    <!-- Company Story & Mission -->
    <section class="py-5">
        <div class="container py-3">
            <div class="row g-5 align-items-center mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="section-badge"><i class="fa-solid fa-bullseye"></i> Our Purpose</div>
                    <h2 class="section-title">Pioneering Applied Technical Education in Egypt</h2>
                    <p class="text-muted" style="line-height: 1.8;">
                        ArabSkills works with government entities, international development partners, industry leaders, and education providers to design, implement, and scale demand-driven skills and applied learning models aligned with labor-market needs.
                    </p>
                    <p class="text-muted" style="line-height: 1.8;">
                        ArabSkills has led the establishment, transformation, and operational support of multiple <strong>Applied Technology Schools (ATS)</strong>, vocational training centres, and industry-embedded training programmes across Egypt, covering sectors such as manufacturing, healthcare, construction, ICT, energy, and industrial technologies.
                    </p>
                    <div class="p-3 rounded-3 bg-light border-start border-4 border-danger">
                        <strong class="text-dark">Our Core Philosophy:</strong>
                        <p class="small text-muted mb-0 mt-1">
                            Transform traditional governmental school cultures into modern professional environments that prioritize student-centric values, respect, and market-ready practical competence.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="row g-3">
                        <div class="col-6">
                            <img src="{{ asset('images/profile/profile_img_08.jpg') }}" alt="ArabSkills Workshop" class="img-fluid rounded-4 shadow-sm w-100" style="height: 280px; object-fit: cover;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('images/profile/profile_img_09.jpg') }}" alt="ArabSkills Campus" class="img-fluid rounded-4 shadow-sm w-100" style="height: 280px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Founder Section -->
            <div class="p-4 p-md-5 rounded-4 bg-light border shadow-sm mb-5" data-aos="fade-up">
                <div class="row align-items-center g-4">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('images/profile/profile_img_03.jpg') }}" alt="Eng. Khaled Aziz" class="img-fluid rounded-4 shadow-sm w-100" style="max-height: 280px; object-fit: cover;">
                        <div class="mt-2 text-center text-muted small">
                            <strong>Eng. Khaled Aziz Zaghloul</strong><br>
                            Founder & TVET Expert
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="section-badge mb-2"><i class="fa-solid fa-user-tie"></i> Founder & Leadership</div>
                        <h3 class="fw-bold text-dark mb-2">Khaled Aziz: TVET Expert and Citizen Developer</h3>
                        <p class="text-muted small mb-2" style="line-height: 1.8;">
                            Khaled Aziz is a distinguished expert with over <strong>17 years of experience</strong> in technical and vocational education and training (TVET), and school transformation. With a Bachelor of Engineering (Architecture department) from Cairo University and a Postgraduate Diploma in Total Quality Management from the American University in Cairo (AUC), Khaled has been at the forefront of elevating technical educational and training across Egypt.
                        </p>
                        <p class="text-muted small mb-3" style="line-height: 1.8;">
                            Throughout his career, he has led and established more than <strong>20 Applied Technology Schools (ATS)</strong> and <strong>4 Vocational Training Centers (VTC)</strong>. Currently, as a VTEC Management Committee Member at the Alexandria Business Association (ABA), he manages vocational projects with USAID, GIZ, ILO, WFP, Exxon Mobil, and the Japanese Embassy. As a skilled Citizen Developer, he architects the digital tools that drive ArabSkills’ proprietary School Management Application.
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-white text-dark border px-3 py-2 small"><i class="fa-solid fa-building-columns text-primary me-1"></i> Cairo University & AUC</span>
                            <span class="badge bg-white text-dark border px-3 py-2 small"><i class="fa-solid fa-users text-primary me-1"></i> ABA VTEC Committee Member</span>
                            <span class="badge bg-white text-dark border px-3 py-2 small"><i class="fa-solid fa-certificate text-warning me-1"></i> Pearson & City & Guilds Lead</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Complete Projects Tables -->
            <div class="mt-5" data-aos="fade-up">
                <div class="section-badge"><i class="fa-solid fa-list-check"></i> Historical Track Record</div>
                <h2 class="section-title">Major Transformation & TVET Projects</h2>
                <p class="text-muted mb-4">Complete overview of Applied Technology Schools and donor projects managed by ArabSkills and its leadership.</p>

                <!-- Table 1: ATS Schools -->
                <div class="card border rounded-4 overflow-hidden shadow-sm mb-5">
                    <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-bold fs-6"><i class="fa-solid fa-school me-2 text-warning"></i> Applied Technology Schools Transformation Projects</h5>
                        <span class="badge bg-warning text-dark">20+ Schools</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Year</th>
                                    <th>School / Project</th>
                                    <th>Area / Governorate</th>
                                    <th>Specializations</th>
                                    <th>Scope of Work</th>
                                </tr>
                            </thead>
                            <tbody class="small">
                                <tr>
                                    <td class="ps-4 fw-bold">2024</td>
                                    <td><strong>ArabcoMed ATS</strong></td>
                                    <td>Obour - Cairo</td>
                                    <td>Chemist & Pharmaceutical</td>
                                    <td>School establishment, curriculum development, and leadership</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2024</td>
                                    <td><strong>Onsi Sawiris ATS</strong></td>
                                    <td>Nasr City - Cairo</td>
                                    <td>Construction</td>
                                    <td>School Initiation</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–24</td>
                                    <td><strong>Ebdaa ATS</strong></td>
                                    <td>Badr - Cairo</td>
                                    <td>Artificial Intelligence</td>
                                    <td>Establishment, workshop renovation, Omnia Finland accreditation preparation</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–24</td>
                                    <td><strong>Ahly Bank ATS</strong></td>
                                    <td>Badr - Cairo</td>
                                    <td>Electrical, RMG</td>
                                    <td>Establishment, workshop renovation, strategic leadership</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–24</td>
                                    <td><strong>Misr Bank ATS</strong></td>
                                    <td>Beni Suef</td>
                                    <td>Marble & Stonework</td>
                                    <td>Establishment, workshop renovation, strategic leadership</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–24</td>
                                    <td><strong>Fawakheer ATS</strong></td>
                                    <td>Fostat - Cairo</td>
                                    <td>Pottery & Ceramic Crafts</td>
                                    <td>Establishment, building renovation, strategic leadership</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–24</td>
                                    <td><strong>Nahdit Misr ATS</strong></td>
                                    <td>6th October - Giza</td>
                                    <td>Food & Beverage, Culinary</td>
                                    <td>Establishment, workshop renovation, Omnia Finland accreditation</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2020–22</td>
                                    <td><strong>WE ATS (7 Schools)</strong></td>
                                    <td>Nasr City, Zayed, Alex, Mansoura, Suez, Minya, New Valley</td>
                                    <td>Telecom, IT, Software Dev</td>
                                    <td>School establishment, workshop renovation, curriculum design, strategic leadership</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2020–22</td>
                                    <td><strong>B.TECH ATS</strong></td>
                                    <td>Mokattam - Cairo</td>
                                    <td>Retail & Logistics</td>
                                    <td>Establishment, City & Guilds UK accreditation, curriculum, capacity building</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2018–22</td>
                                    <td><strong>Talaat Moustafa ATS</strong></td>
                                    <td>New Cairo</td>
                                    <td>Finishing, AC, Electrical</td>
                                    <td>Establishment, City & Guilds and Pearson accreditation preparation</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 2: Donor & Vocational Training Projects -->
                <div class="card border rounded-4 overflow-hidden shadow-sm mb-5">
                    <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-bold fs-6"><i class="fa-solid fa-hand-holding-heart me-2 text-warning"></i> Donor & Vocational Employment Projects</h5>
                        <span class="badge bg-success">UN & Bilateral Programs</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Period</th>
                                    <th>Donor / Client</th>
                                    <th>Beneficiaries & Field</th>
                                    <th>Program Scope</th>
                                </tr>
                            </thead>
                            <tbody class="small">
                                <tr>
                                    <td class="ps-4 fw-bold">2024–25</td>
                                    <td><strong>GIZ - EPP</strong></td>
                                    <td>Industrial Eng. & Automotive</td>
                                    <td>Enhancing CoC operations by establishing an educational training center</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–25</td>
                                    <td><strong>Sequa - Skills4Trends</strong></td>
                                    <td>Solar Energy (Alexandria)</td>
                                    <td>Upskilling 250 job seekers and entrepreneurs on solar energy trends</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–25</td>
                                    <td><strong>USAID - Workforce Egypt</strong></td>
                                    <td>Technical Assistance</td>
                                    <td>Strengthening VTEC business model, M&E tools, marketing and accreditation</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–25</td>
                                    <td><strong>WFP & Om Habibeh</strong></td>
                                    <td>600+ Refugees (Cairo)</td>
                                    <td>Vocational training in jewelry making, hospitality, electrical, and light current</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–25</td>
                                    <td><strong>ExxonMobil CSR Projects</strong></td>
                                    <td>Alexandria & Delta</td>
                                    <td>Training and employment transition for 15 certified Handymen</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–25</td>
                                    <td><strong>NBE CSR Projects</strong></td>
                                    <td>Alexandria</td>
                                    <td>Training and employment of 150 male and female job seekers in technical crafts</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2022–23</td>
                                    <td><strong>ILO - PROSPECTS EGYPT</strong></td>
                                    <td>Refugees & Host Communities</td>
                                    <td>Apprenticeships for 120 job seekers in automotive, RMG, and crafts</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2024</td>
                                    <td><strong>KNAUF Egypt</strong></td>
                                    <td>Maadi Training Center</td>
                                    <td>Operational system establishment and industry-aligned competency curricula</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 3: International Accreditation Projects -->
                <div class="card border rounded-4 overflow-hidden shadow-sm">
                    <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-bold fs-6"><i class="fa-solid fa-stamp me-2 text-warning"></i> International Quality & Accreditation Projects</h5>
                        <span class="badge bg-info text-dark">Global Standards</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Year</th>
                                    <th>Organization / Institution</th>
                                    <th>Awarding Body</th>
                                    <th>Accreditation Scope</th>
                                </tr>
                            </thead>
                            <tbody class="small">
                                <tr>
                                    <td class="ps-4 fw-bold">2024</td>
                                    <td><strong>VTEC - ABA</strong></td>
                                    <td>Ministry of Manpower</td>
                                    <td>Overseeing national institutional accreditation</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2024</td>
                                    <td><strong>Ebdaa ATS & Nahdit Misr ATS</strong></td>
                                    <td>Omnia (Finland)</td>
                                    <td>Accreditation readiness, school manual, internal follow-up system</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2021</td>
                                    <td><strong>B.TECH ATS & Talaat Moustafa ATS</strong></td>
                                    <td>City & Guilds (UK)</td>
                                    <td>Accreditation requirements, school quality manual, quality management system</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2016</td>
                                    <td><strong>Amaan Training Center</strong></td>
                                    <td>Pearson Assured (UK)</td>
                                    <td>Institutional quality manual and international center verification</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2012–14</td>
                                    <td><strong>Wataneya Society & Circles Academy</strong></td>
                                    <td>Edexcel BTEC (UK)</td>
                                    <td>Quality management system and BTEC center approval</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection