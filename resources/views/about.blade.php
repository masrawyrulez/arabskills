@extends('layouts.app')

@php
    $isAr = app()->getLocale() == 'ar';
@endphp

@section('title', $isAr ? 'عن الشركة وسجل الإنجازات | شركة مهارات العرب للاستشارات التعليمية' : 'About Us & Track Record | ArabSkills Educational Consulting')

@section('content')

    <!-- Hero Header -->
    <section class="py-5 bg-dark text-white position-relative" style="background: linear-gradient(135deg, #0b1120 0%, #1e111d 100%);">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="section-badge mb-2" style="background: rgba(255,255,255,0.08); color: #f59e0b; border-color: rgba(245,158,11,0.3);">
                        <i class="fa-solid fa-landmark"></i> {{ $isAr ? 'عن مهارات العرب' : 'About ArabSkills' }}
                    </div>
                    <h1 class="display-5 fw-bold text-white mb-3">
                        {{ $isAr ? 'التحول المؤسسي والتعليم التطبيقي المبتكر' : 'Institutional Transformation & Applied Learning' }}
                    </h1>
                    <p class="lead text-slate-300 mb-0" style="max-width: 720px; font-size: 1.15rem; line-height: 1.8;">
                        @if($isAr)
                            شركة مهارات العرب للحلول المتكاملة هي بيت خبرة واستشارات تعليمية رائد في مصر، متخصص في تطوير التعليم الفني والتدريب المهني (TVET)، وتأسيس وإدارة مدارس التكنولوجيا التطبيقية (ATS)، والاعتماد المؤسسي والدولي وفق أرقى المعايير العالمية.
                        @else
                            ArabSkills (شركة مهارات العرب للحلول المتكاملة) is an Egypt-based educational development and consulting firm specialized in Technical and Vocational Education and Training (TVET), Applied Technology Schools (ATS), and international quality accreditation.
                        @endif
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
                    <div class="section-badge"><i class="fa-solid fa-bullseye"></i> {{ $isAr ? 'رسالتنا وأهدافنا' : 'Our Purpose' }}</div>
                    <h2 class="section-title">
                        {{ $isAr ? 'ريادة تطوير التعليم الفني والتطبيقي في مصر' : 'Pioneering Applied Technical Education in Egypt' }}
                    </h2>
                    <p class="text-muted" style="line-height: 1.8;">
                        @if($isAr)
                            تعمل مهارات العرب بالتعاون الوثيق مع الوزارات والجهات الحكومية، شركاء التنمية الدوليين، وقادة الصناعة ومقدمي الخدمات التعليمية لتصميم وتطبيق ونمذجة برامج مهارية وتطبيقية تعتمد على الاحتياج الفعلي لسوق العمل.
                        @else
                            ArabSkills works with government entities, international development partners, industry leaders, and education providers to design, implement, and scale demand-driven skills and applied learning models aligned with labor-market needs.
                        @endif
                    </p>
                    <p class="text-muted" style="line-height: 1.8;">
                        @if($isAr)
                            قادت مهارات العرب تأسيس وتطوير والتشغيل الفني لأكثر من <strong>20 مدرسة تكنولوجيا تطبيقية (ATS)</strong> ومراكز تدريب مهني متعددة وبرامج تأهيلية متكاملة داخل المنشآت الصناعية في مختلف أنحاء الجمهورية، تشمل قطاعات حيوية مثل الصناعات الدوائية، الرعاية الصحية، التشييد والبناء، الاتصالات وتكنولوجيا المعلومات، الطاقة، والتقنيات الصناعية.
                        @else
                            ArabSkills has led the establishment, transformation, and operational support of multiple <strong>Applied Technology Schools (ATS)</strong>, vocational training centres, and industry-embedded training programmes across Egypt, covering sectors such as manufacturing, healthcare, construction, ICT, energy, and industrial technologies.
                        @endif
                    </p>
                    <div class="p-3 rounded-3 bg-light {{ $isAr ? 'border-end' : 'border-start' }} border-4 border-danger">
                        <strong class="text-dark">{{ $isAr ? 'فلسفتنا الجوهرية:' : 'Our Core Philosophy:' }}</strong>
                        <p class="small text-muted mb-0 mt-1">
                            @if($isAr)
                                تحويل البيئة المدرسية التقليدية إلى منظومة مهنية حديثة ومحفزة تُعلي من شأن الطالب، وترسخ قيم الاحترام والاحترافية، وتكسبه جدارات عملية جاهزة للانطلاق الفوري في سوق العمل.
                            @else
                                Transform traditional governmental school cultures into modern professional environments that prioritize student-centric values, respect, and market-ready practical competence.
                            @endif
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
                            <strong>{{ $isAr ? 'م. خالد عزيز زغلول' : 'Eng. Khaled Aziz Zaghloul' }}</strong><br>
                            {{ $isAr ? 'المؤسس وخبير التعليم الفني' : 'Founder & TVET Expert' }}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="section-badge mb-2"><i class="fa-solid fa-user-tie"></i> {{ $isAr ? 'المؤسس والقيادة' : 'Founder & Leadership' }}</div>
                        <h3 class="fw-bold text-dark mb-2">
                            {{ $isAr ? 'م. خالد عزيز: خبير التعليم الفني ومطور المنظومات الرقمية' : 'Khaled Aziz: TVET Expert and Citizen Developer' }}
                        </h3>
                        <p class="text-muted small mb-2" style="line-height: 1.8;">
                            @if($isAr)
                                يتمتع المهندس خالد عزيز بخبرة تتجاوز <strong>17 عاماً</strong> في مجالات التعليم الفني والتدريب المهني (TVET)، والتحول المؤسسي وإدارة جودة التعليم. حصل على بكالوريوس الهندسة (قسم العمارة) من جامعة القاهرة ودبلوم الدراسات العليا في إدارة الجودة الشاملة (TQM) من الجامعة الأمريكية بالقاهرة (AUC)، ليكون في طليعة مطوري التعليم الفني والتدريب المتقدم في مصر.
                            @else
                                Khaled Aziz is a distinguished expert with over <strong>17 years of experience</strong> in technical and vocational education and training (TVET), and school transformation. With a Bachelor of Engineering (Architecture department) from Cairo University and a Postgraduate Diploma in Total Quality Management from the American University in Cairo (AUC), Khaled has been at the forefront of elevating technical educational and training across Egypt.
                            @endif
                        </p>
                        <p class="text-muted small mb-3" style="line-height: 1.8;">
                            @if($isAr)
                                على مدار مسيرته المهنية، قاد وأسس أكثر من <strong>20 مدرسة تكنولوجيا تطبيقية (ATS)</strong> و<strong>4 مراكز تدريب مهني (VTC)</strong>. ويعمل حالياً كعضو لجنة إدارة مركز التكوين المهني (VTEC) بجمعية رجال أعمال الإسكندرية (ABA)، حيث يدير مشروعات تنموية بالتعاون مع الوكالة الأمريكية للتنمية الدولية (USAID)، والوكالة الألمانية للتعاون الدولي (GIZ)، ومنظمة العمل الدولية (ILO)، وبرنامج الأغذية العالمي (WFP)، وإكسون موبيل، والسفارة اليابانية. وباعتباره مطوراً ومبتكراً للنظم (Citizen Developer)، صمم المنظومات الرقمية الرائدة التي تدير تطبيقات مهارات العرب لإدارة المدارس بكفاءة استثنائية.
                            @else
                                Throughout his career, he has led and established more than <strong>20 Applied Technology Schools (ATS)</strong> and <strong>4 Vocational Training Centers (VTC)</strong>. Currently, as a VTEC Management Committee Member at the Alexandria Business Association (ABA), he manages vocational projects with USAID, GIZ, ILO, WFP, Exxon Mobil, and the Japanese Embassy. As a skilled Citizen Developer, he architects the digital tools that drive ArabSkills’ proprietary School Management Application.
                            @endif
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-white text-dark border px-3 py-2 small"><i class="fa-solid fa-building-columns text-primary me-1"></i> {{ $isAr ? 'جامعة القاهرة والجامعة الأمريكية' : 'Cairo University & AUC' }}</span>
                            <span class="badge bg-white text-dark border px-3 py-2 small"><i class="fa-solid fa-users text-primary me-1"></i> {{ $isAr ? 'عضو لجنة VTEC بجمعية رجال أعمال الإسكندرية' : 'ABA VTEC Committee Member' }}</span>
                            <span class="badge bg-white text-dark border px-3 py-2 small"><i class="fa-solid fa-certificate text-warning me-1"></i> {{ $isAr ? 'رائد اعتمادات بيرسون وسيتي آند جيلدز' : 'Pearson & City & Guilds Lead' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Complete Projects Tables -->
            <div class="mt-5" data-aos="fade-up">
                <div class="section-badge"><i class="fa-solid fa-list-check"></i> {{ $isAr ? 'سجل الإنجازات والمشروعات' : 'Historical Track Record' }}</div>
                <h2 class="section-title">{{ $isAr ? 'أبرز مشروعات التطوير والتعليم الفني والمهني' : 'Major Transformation & TVET Projects' }}</h2>
                <p class="text-muted mb-4">{{ $isAr ? 'نظرة شاملة ومفصلة على مدارس التكنولوجيا التطبيقية ومشروعات الجهات الدولية المانحة المنفذة بواسطة مهارات العرب وقيادتها.' : 'Complete overview of Applied Technology Schools and donor projects managed by ArabSkills and its leadership.' }}</p>

                <!-- Table 1: ATS Schools -->
                <div class="card border rounded-4 overflow-hidden shadow-sm mb-5">
                    <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-bold fs-6">
                            <i class="fa-solid fa-school me-2 text-warning"></i>
                            {{ $isAr ? 'مشروعات تأسيس وتطوير مدارس التكنولوجيا التطبيقية (ATS)' : 'Applied Technology Schools Transformation Projects' }}
                        </h5>
                        <span class="badge bg-warning text-dark">{{ $isAr ? '+20 مدرسة تطبيقية' : '20+ Schools' }}</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">{{ $isAr ? 'السنة' : 'Year' }}</th>
                                    <th>{{ $isAr ? 'المدرسة / المشروع' : 'School / Project' }}</th>
                                    <th>{{ $isAr ? 'الموقع / المحافظة' : 'Area / Governorate' }}</th>
                                    <th>{{ $isAr ? 'التخصصات الفنية' : 'Specializations' }}</th>
                                    <th>{{ $isAr ? 'نطاق العمل' : 'Scope of Work' }}</th>
                                </tr>
                            </thead>
                            <tbody class="small">
                                <tr>
                                    <td class="ps-4 fw-bold">2024</td>
                                    <td><strong>{{ $isAr ? 'مدرسة عربكوميد التطبيقية' : 'ArabcoMed ATS' }}</strong></td>
                                    <td>{{ $isAr ? 'العبور - القاهرة' : 'Obour - Cairo' }}</td>
                                    <td>{{ $isAr ? 'كيميائي وصناعات دوائية' : 'Chemist & Pharmaceutical' }}</td>
                                    <td>{{ $isAr ? 'تأسيس المدرسة، تطوير المناهج، والقيادة الاستراتيجية' : 'School establishment, curriculum development, and leadership' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2024</td>
                                    <td><strong>{{ $isAr ? 'مدرسة أنسي ساويرس التطبيقية' : 'Onsi Sawiris ATS' }}</strong></td>
                                    <td>{{ $isAr ? 'مدينة نصر - القاهرة' : 'Nasr City - Cairo' }}</td>
                                    <td>{{ $isAr ? 'التشييد والبناء وتكنولوجيا المقاولات' : 'Construction' }}</td>
                                    <td>{{ $isAr ? 'إطلاق وتأسيس المدرسة ووضع خطة العمل' : 'School Initiation' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–24</td>
                                    <td><strong>{{ $isAr ? 'مدرسة إبداع التطبيقية' : 'Ebdaa ATS' }}</strong></td>
                                    <td>{{ $isAr ? 'بدر - القاهرة' : 'Badr - Cairo' }}</td>
                                    <td>{{ $isAr ? 'الذكاء الاصطناعي وتكنولوجيا المعلومات' : 'Artificial Intelligence' }}</td>
                                    <td>{{ $isAr ? 'التأسيس، وتجديد الورش، والإعداد لاعتماد أمنيا الفنلندية' : 'Establishment, workshop renovation, Omnia Finland accreditation preparation' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–24</td>
                                    <td><strong>{{ $isAr ? 'مدرسة البنك الأهلي التطبيقية' : 'Ahly Bank ATS' }}</strong></td>
                                    <td>{{ $isAr ? 'بدر - القاهرة' : 'Badr - Cairo' }}</td>
                                    <td>{{ $isAr ? 'الكهرباء، والملابس الجاهزة' : 'Electrical, RMG' }}</td>
                                    <td>{{ $isAr ? 'التأسيس، تجهيز وتطوير الورش، والقيادة الاستراتيجية' : 'Establishment, workshop renovation, strategic leadership' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–24</td>
                                    <td><strong>{{ $isAr ? 'مدرسة بنك مصر التطبيقية' : 'Misr Bank ATS' }}</strong></td>
                                    <td>{{ $isAr ? 'بني سويف' : 'Beni Suef' }}</td>
                                    <td>{{ $isAr ? 'صناعة الرخام وتشكيل الأحجار' : 'Marble & Stonework' }}</td>
                                    <td>{{ $isAr ? 'التأسيس، تجديد الورش، والإشراف الفني' : 'Establishment, workshop renovation, strategic leadership' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–24</td>
                                    <td><strong>{{ $isAr ? 'مدرسة الفواخير التطبيقية' : 'Fawakheer ATS' }}</strong></td>
                                    <td>{{ $isAr ? 'الفسطاط - القاهرة' : 'Fostat - Cairo' }}</td>
                                    <td>{{ $isAr ? 'صناعة الخزف والفخار التراثي والحديث' : 'Pottery & Ceramic Crafts' }}</td>
                                    <td>{{ $isAr ? 'التأسيس، تأهيل المبنى التاريخي والورش، والقيادة المؤسسية' : 'Establishment, building renovation, strategic leadership' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–24</td>
                                    <td><strong>{{ $isAr ? 'مدرسة نهضة مصر التطبيقية' : 'Nahdit Misr ATS' }}</strong></td>
                                    <td>{{ $isAr ? '6 أكتوبر - الجيزة' : '6th October - Giza' }}</td>
                                    <td>{{ $isAr ? 'الأغذية والمشروبات وفنون الطهي' : 'Food & Beverage, Culinary' }}</td>
                                    <td>{{ $isAr ? 'التأسيس، تجهيز الورش، وتحقيق اعتماد أمنيا الفنلندية' : 'Establishment, workshop renovation, Omnia Finland accreditation' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2020–22</td>
                                    <td><strong>{{ $isAr ? 'مدارس وي WE التطبيقية (7 مدارس)' : 'WE ATS (7 Schools)' }}</strong></td>
                                    <td>{{ $isAr ? 'مدينة نصر، الشيخ زايد، الإسكندرية، المنصورة، السويس، المنيا، الوادي الجديد' : 'Nasr City, Zayed, Alex, Mansoura, Suez, Minya, New Valley' }}</td>
                                    <td>{{ $isAr ? 'الاتصالات، تكنولوجيا المعلومات، وتطوير البرمجيات' : 'Telecom, IT, Software Dev' }}</td>
                                    <td>{{ $isAr ? 'التأسيس الكامل، تصميم وتجهيز الورش، إعداد المناهج، والقيادة الفنية والإدارية' : 'School establishment, workshop renovation, curriculum design, strategic leadership' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2020–22</td>
                                    <td><strong>{{ $isAr ? 'مدرسة بي تك التطبيقية' : 'B.TECH ATS' }}</strong></td>
                                    <td>{{ $isAr ? 'المقطم - القاهرة' : 'Mokattam - Cairo' }}</td>
                                    <td>{{ $isAr ? 'تجارة التجزئة واللوجستيات' : 'Retail & Logistics' }}</td>
                                    <td>{{ $isAr ? 'التأسيس، الحصول على اعتماد City & Guilds البريطانية، المناهج وبناء القدرات' : 'Establishment, City & Guilds UK accreditation, curriculum, capacity building' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2018–22</td>
                                    <td><strong>{{ $isAr ? 'مدرسة طلعت مصطفى التطبيقية' : 'Talaat Moustafa ATS' }}</strong></td>
                                    <td>{{ $isAr ? 'القاهرة الجديدة' : 'New Cairo' }}</td>
                                    <td>{{ $isAr ? 'التشطيبات المعمارية، التكييف، والتركيبات الكهربائية' : 'Finishing, AC, Electrical' }}</td>
                                    <td>{{ $isAr ? 'التأسيس والإعداد لاعتمادات City & Guilds و Pearson الدولية' : 'Establishment, City & Guilds and Pearson accreditation preparation' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 2: Donor & Vocational Training Projects -->
                <div class="card border rounded-4 overflow-hidden shadow-sm mb-5">
                    <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-bold fs-6">
                            <i class="fa-solid fa-hand-holding-heart me-2 text-warning"></i>
                            {{ $isAr ? 'مشروعات الجهات الدولية المانحة والتشغيل المهني' : 'Donor & Vocational Employment Projects' }}
                        </h5>
                        <span class="badge bg-success">{{ $isAr ? 'برامج الأمم المتحدة والشركاء الدوليين' : 'UN & Bilateral Programs' }}</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">{{ $isAr ? 'الفترة' : 'Period' }}</th>
                                    <th>{{ $isAr ? 'الجهة المانحة / الشريك' : 'Donor / Client' }}</th>
                                    <th>{{ $isAr ? 'المستفيدون والمجال' : 'Beneficiaries & Field' }}</th>
                                    <th>{{ $isAr ? 'نطاق البرنامج' : 'Program Scope' }}</th>
                                </tr>
                            </thead>
                            <tbody class="small">
                                <tr>
                                    <td class="ps-4 fw-bold">2024–25</td>
                                    <td><strong>GIZ - EPP</strong></td>
                                    <td>{{ $isAr ? 'الهندسة الصناعية والسيارات' : 'Industrial Eng. & Automotive' }}</td>
                                    <td>{{ $isAr ? 'تطوير عمليات مراكز الكفاءة (CoC) من خلال تأسيس مركز تدريب تعليمي متطور' : 'Enhancing CoC operations by establishing an educational training center' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–25</td>
                                    <td><strong>Sequa - Skills4Trends</strong></td>
                                    <td>{{ $isAr ? 'الطاقة الشمسية (الإسكندرية)' : 'Solar Energy (Alexandria)' }}</td>
                                    <td>{{ $isAr ? 'تأهيل ورفع مهارات 250 باحثاً عن عمل ورائد أعمال على تطبيقات الطاقة الشمسية' : 'Upskilling 250 job seekers and entrepreneurs on solar energy trends' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–25</td>
                                    <td><strong>USAID - {{ $isAr ? 'مشروع قوى عاملة مصر' : 'Workforce Egypt' }}</strong></td>
                                    <td>{{ $isAr ? 'الدعم الفني والاستشارات المؤسسية' : 'Technical Assistance' }}</td>
                                    <td>{{ $isAr ? 'تعزيز نموذج أعمال VTEC، وتطوير أدوات المتابعة والتقييم والتسويق والاعتماد' : 'Strengthening VTEC business model, M&E tools, marketing and accreditation' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–25</td>
                                    <td><strong>WFP & Om Habibeh</strong></td>
                                    <td>{{ $isAr ? '+600 لاجئ ومجتمعات مضيفة (القاهرة)' : '600+ Refugees (Cairo)' }}</td>
                                    <td>{{ $isAr ? 'التدريب المهني المتخصص في صناعة الحلي، الضيافة، التمديدات الكهربائية والتيار الخفيف' : 'Vocational training in jewelry making, hospitality, electrical, and light current' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–25</td>
                                    <td><strong>{{ $isAr ? 'مشروعات إكسون موبيل المجتمعية' : 'ExxonMobil CSR Projects' }}</strong></td>
                                    <td>{{ $isAr ? 'الإسكندرية والدلتا' : 'Alexandria & Delta' }}</td>
                                    <td>{{ $isAr ? 'تدريب وتأهيل وتشغيل 15 فني صيانة معتمد وتيسير انتقالهم لسوق العمل' : 'Training and employment transition for 15 certified Handymen' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2023–25</td>
                                    <td><strong>{{ $isAr ? 'مشروعات البنك الأهلي المصري' : 'NBE CSR Projects' }}</strong></td>
                                    <td>{{ $isAr ? 'الإسكندرية' : 'Alexandria' }}</td>
                                    <td>{{ $isAr ? 'تدريب وتشغيل 150 شاباً وفتاة من الباحثين عن عمل في الحرف والمهن الفنية' : 'Training and employment of 150 male and female job seekers in technical crafts' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2022–23</td>
                                    <td><strong>ILO - PROSPECTS EGYPT</strong></td>
                                    <td>{{ $isAr ? 'اللاجئون والمجتمعات المضيفة' : 'Refugees & Host Communities' }}</td>
                                    <td>{{ $isAr ? 'برامج التلمذة المهنية لـ 120 شاباً في صيانة السيارات والملابس والحرف الفنية' : 'Apprenticeships for 120 job seekers in automotive, RMG, and crafts' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2024</td>
                                    <td><strong>KNAUF Egypt</strong></td>
                                    <td>{{ $isAr ? 'مركز تدريب المعادي' : 'Maadi Training Center' }}</td>
                                    <td>{{ $isAr ? 'تأسيس النظام التشغيلي وإعداد مناهج الجدارات المتوافقة مع متطلبات الصناعة' : 'Operational system establishment and industry-aligned competency curricula' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 3: International Accreditation Projects -->
                <div class="card border rounded-4 overflow-hidden shadow-sm">
                    <div class="card-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-bold fs-6">
                            <i class="fa-solid fa-stamp me-2 text-warning"></i>
                            {{ $isAr ? 'مشروعات الجودة والاعتمادات الدولية' : 'International Quality & Accreditation Projects' }}
                        </h5>
                        <span class="badge bg-info text-dark">{{ $isAr ? 'معايير عالمية' : 'Global Standards' }}</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">{{ $isAr ? 'السنة' : 'Year' }}</th>
                                    <th>{{ $isAr ? 'المؤسسة / الجهة' : 'Organization / Institution' }}</th>
                                    <th>{{ $isAr ? 'جهة منح الاعتماد' : 'Awarding Body' }}</th>
                                    <th>{{ $isAr ? 'نطاق الاعتماد' : 'Accreditation Scope' }}</th>
                                </tr>
                            </thead>
                            <tbody class="small">
                                <tr>
                                    <td class="ps-4 fw-bold">2024</td>
                                    <td><strong>VTEC - ABA</strong></td>
                                    <td>{{ $isAr ? 'وزارة العمل' : 'Ministry of Manpower' }}</td>
                                    <td>{{ $isAr ? 'الإشراف على الاعتماد المؤسسي الوطني الشامل' : 'Overseeing national institutional accreditation' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2024</td>
                                    <td><strong>{{ $isAr ? 'مدرسة إبداع ومدرسة نهضة مصر' : 'Ebdaa ATS & Nahdit Misr ATS' }}</strong></td>
                                    <td>{{ $isAr ? 'أمنيا Omnia (فنلندا)' : 'Omnia (Finland)' }}</td>
                                    <td>{{ $isAr ? 'جاهزية الاعتماد الدولي، دليل جودة المدرسة، ومنظومة المتابعة الداخلية' : 'Accreditation readiness, school manual, internal follow-up system' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2021</td>
                                    <td><strong>{{ $isAr ? 'مدرسة بي تك ومدرسة طلعت مصطفى' : 'B.TECH ATS & Talaat Moustafa ATS' }}</strong></td>
                                    <td>City & Guilds (UK)</td>
                                    <td>{{ $isAr ? 'متطلبات الاعتماد الدولي، دليل الجودة المدرسية، وتطبيق نظام إدارة الجودة' : 'Accreditation requirements, school quality manual, quality management system' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2016</td>
                                    <td><strong>{{ $isAr ? 'مركز أمان للتدريب' : 'Amaan Training Center' }}</strong></td>
                                    <td>Pearson Assured (UK)</td>
                                    <td>{{ $isAr ? 'دليل الجودة المؤسسية والتحقق الدولي من مطابقة معايير المركز' : 'Institutional quality manual and international center verification' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-4 fw-bold">2012–14</td>
                                    <td><strong>{{ $isAr ? 'جمعية وطنية وأكاديمية سيركلز' : 'Wataneya Society & Circles Academy' }}</strong></td>
                                    <td>Edexcel BTEC (UK)</td>
                                    <td>{{ $isAr ? 'نظام إدارة الجودة والحصول على اعتماد مراكز BTEC الدولية' : 'Quality management system and BTEC center approval' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
