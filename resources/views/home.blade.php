<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aqua-Anita: Escuela de natación en Tláhuac, CDMX. Clases para bebés, niños y adultos con instructores certificados. Grupos reducidos, metodología personalizada y ambiente seguro.">
    <meta name="keywords" content="clases de natación, escuela de natación, natación Tláhuac, natación CDMX, natación bebés, natación niños, natación adultos, Aqua Anita, Zapotitlán">
    <meta name="author" content="Aqua-Anita">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Aqua-Anita - Escuela de Natación en CDMX">
    <meta property="og:description" content="Aprende a nadar con confianza y seguridad. Instructores certificados, grupos reducidos y atención personalizada para todas las edades.">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_MX">
    <title>Aqua-Anita | Escuela de Natación en Tláhuac, CDMX - Clases para todas las edades</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpeg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --green: #16a34a;
            --green-dark: #15803d;
            --green-light: #f0fdf4;
            --green-100: #dcfce7;
            --orange: #f97316;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; color: var(--gray-900); }
        
        /* ===== NAVBAR ===== */
        .navbar-custom {
            background: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            padding: 12px 0;
        }
        .navbar-custom .nav-link { color: var(--gray-600); font-size: 14px; font-weight: 500; }
        .navbar-custom .nav-link:hover { color: var(--green); }
        .navbar-brand img, .navbar-brand .logo {
            font-size: 20px; font-weight: 800; color: var(--green);
        }
        .btn-green {
            background-color: var(--green); color: #fff; border: none;
            border-radius: 8px; font-weight: 600; padding: 10px 24px; font-size: 14px;
            transition: all 0.2s;
        }
        .btn-green:hover { background-color: var(--green-dark); color: #fff; }
        .btn-green-outline {
            background: transparent; color: var(--green); border: 2px solid var(--green);
            border-radius: 8px; font-weight: 600; padding: 10px 24px; font-size: 14px;
            transition: all 0.2s;
        }
        .btn-green-outline:hover { background-color: var(--green-light); color: var(--green); }
        
        /* ===== HERO ===== */
        .hero {
            background: linear-gradient(135deg, var(--green-light) 0%, #fff 100%);
            padding: 80px 0 60px;
        }
        .hero h1 { font-size: 48px; font-weight: 800; line-height: 1.15; color: var(--gray-900); }
        .hero h1 span { color: var(--green); }
        .hero p { color: var(--gray-600); font-size: 16px; line-height: 1.7; margin: 20px 0 30px; }
        .hero-features { list-style: none; padding: 0; margin: 0 0 30px; }
        .hero-features li {
            display: flex; align-items: center; gap: 10px;
            color: var(--gray-700); font-size: 14px; margin-bottom: 8px;
        }
        .hero-features li i { color: var(--green); font-size: 12px; }
        .hero-img {
            border-radius: 16px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .hero-img img { width: 100%; height: 400px; object-fit: cover; }
        .hero-img .carousel-control-prev,
        .hero-img .carousel-control-next {
            width: 40px; height: 40px; background: rgba(0,0,0,0.4);
            border-radius: 50%; top: 50%; transform: translateY(-50%);
            opacity: 0; transition: opacity 0.3s;
        }
        .hero-img:hover .carousel-control-prev,
        .hero-img:hover .carousel-control-next { opacity: 1; }
        .hero-img .carousel-control-prev { left: 12px; }
        .hero-img .carousel-control-next { right: 12px; }
        .hero-img .carousel-indicators { margin-bottom: 12px; }
        .hero-img .carousel-indicators button {
            width: 10px; height: 10px; border-radius: 50%;
            background: rgba(255,255,255,0.6); border: none;
        }
        .hero-img .carousel-indicators button.active {
            background: var(--green); width: 28px; border-radius: 5px;
        }
        .hero-img picture { display: block; width: 100%; }
        .hero-img picture img { width: 100%; }
        
        /* ===== SECTIONS ===== */
        .section { padding: 80px 0; }
        .section-gray { background-color: var(--gray-50); }
        .section-title {
            font-size: 36px; font-weight: 800; text-align: center; margin-bottom: 8px;
        }
        .section-title span { color: var(--green); }
        .section-subtitle {
            text-align: center; color: var(--gray-500); font-size: 15px; margin-bottom: 48px;
        }
        .badge-label {
            display: inline-block; background: var(--green-100); color: var(--green);
            font-size: 12px; font-weight: 600; padding: 4px 14px; border-radius: 20px;
            margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.5px;
        }
        
        /* ===== POR QUÉ CARDS ===== */
        .feature-card {
            background: #fff; border: 1px solid var(--gray-200); border-radius: 12px;
            padding: 24px; transition: all 0.3s; height: 100%;
        }
        .feature-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.08); transform: translateY(-2px); }
        .feature-icon {
            width: 48px; height: 48px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 16px; font-size: 20px;
        }
        .feature-icon.green { background: var(--green-light); color: var(--green); }
        .feature-icon.orange { background: #fff7ed; color: var(--orange); }
        .feature-icon.blue { background: #eff6ff; color: #2563eb; }
        .feature-card h5 { font-size: 16px; font-weight: 700; margin-bottom: 8px; }
        .feature-card p { font-size: 13px; color: var(--gray-500); margin: 0; }
        
        /* ===== PROGRAMAS ===== */
        .program-card {
            background: #fff; border: 1px solid var(--gray-200); border-radius: 16px;
            overflow: hidden; transition: all 0.3s; height: 100%;
        }
        .program-card:hover { box-shadow: 0 12px 32px rgba(0,0,0,0.1); transform: translateY(-4px); }
        .program-card .card-header {
            padding: 20px 24px; border-bottom: 1px solid var(--gray-200);
        }
        .program-card .card-header h5 { font-size: 18px; font-weight: 700; margin: 0; }
        .program-card .card-header p { font-size: 13px; color: var(--gray-500); margin: 5px 0 0; }
        .program-card .card-body { padding: 24px; }
        .program-card .card-body ul { list-style: none; padding: 0; }
        .program-card .card-body li {
            display: flex; align-items: flex-start; gap: 10px;
            font-size: 13px; color: var(--gray-600); margin-bottom: 12px;
        }
        .program-card .card-body li i { color: var(--green); margin-top: 3px; font-size: 12px; }
        
        /* ===== METODOLOGÍA ===== */
        .method-step {
            display: flex; align-items: flex-start; gap: 16px; margin-bottom: 20px;
        }
        .method-num {
            width: 36px; height: 36px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 14px; flex-shrink: 0;
        }
        .method-num.active { background: var(--green); color: #fff; }
        .method-num.inactive { background: var(--gray-100); color: var(--gray-500); }
        .method-step h6 { font-size: 15px; font-weight: 700; margin-bottom: 4px; }
        .method-step p { font-size: 13px; color: var(--gray-500); margin: 0; }
        
        /* ===== HORARIOS ===== */
        .schedule-table { width: 100%; border-collapse: collapse; }
        .schedule-table th {
            background: var(--green); color: #fff; padding: 12px 16px;
            font-size: 13px; font-weight: 600;
        }
        .schedule-table td {
            padding: 10px 16px; font-size: 13px; border-bottom: 1px solid var(--gray-200);
        }
        .schedule-table tr:hover { background: var(--green-light); }
        .schedule-card {
            border: 2px solid var(--green); border-radius: 16px; overflow: hidden;
        }
        .location-card {
            background: #fff; border: 1px solid var(--gray-200); border-radius: 16px;
            overflow: hidden;
        }
        
        /* ===== NUESTRAS CLASES ACCORDION ===== */
        .clases-accordion .accordion-item {
            border: 1px solid var(--gray-200); border-radius: 16px !important;
            margin-bottom: 16px; overflow: hidden;
        }
        .clases-accordion .accordion-button {
            font-size: 16px; font-weight: 700; color: var(--gray-800);
            background: #fff; padding: 18px 24px; box-shadow: none;
            gap: 12px;
        }
        .clases-accordion .accordion-button i.clase-icon {
            width: 40px; height: 40px; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; flex-shrink: 0; transition: all 0.3s;
        }
        .clases-accordion .accordion-button:not(.collapsed) {
            color: var(--green); background: var(--green-light);
        }
        .clases-accordion .accordion-button:not(.collapsed) i.clase-icon {
            background: var(--green) !important; color: #fff !important;
        }
        .clases-accordion .accordion-button::after {
            background-size: 16px; width: 16px; height: 16px;
        }
        .clases-accordion .accordion-body { padding: 0 24px 24px; }
        .clase-main-img {
            width: 100%; height: 320px; object-fit: cover; border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }
        .clase-gallery {
            display: flex; gap: 8px; margin-top: 12px; flex-wrap: wrap;
        }
        .clase-gallery img {
            width: 80px; height: 80px; object-fit: cover; border-radius: 10px;
            cursor: pointer; border: 2px solid transparent; transition: all 0.3s;
        }
        .clase-gallery img:hover { border-color: var(--green); transform: scale(1.05); }
        .clase-gallery img.active-thumb { border-color: var(--green); }

        /* ===== TESTIMONIOS ===== */
        .testimonial-card {
            background: #fff; border: 1px solid var(--gray-200); border-radius: 12px;
            padding: 24px; height: 100%;
        }
        .stars { color: #fbbf24; font-size: 14px; margin-bottom: 12px; }
        .testimonial-card p { font-size: 14px; color: var(--gray-600); line-height: 1.6; }
        .testimonial-card .author { font-size: 14px; font-weight: 600; margin-top: 16px; }
        .testimonial-card .role { font-size: 12px; color: var(--gray-400); }
        
        /* ===== FAQ ===== */
        .faq-item {
            background: #fff; border: 1px solid var(--gray-200); border-radius: 12px;
            margin-bottom: 12px; overflow: hidden;
        }
        .faq-item .accordion-button {
            font-size: 14px; font-weight: 600; color: var(--gray-900);
            background: #fff; box-shadow: none; padding: 16px 20px;
        }
        .faq-item .accordion-button:not(.collapsed) { color: var(--green); background: var(--green-light); }
        .faq-item .accordion-body { font-size: 13px; color: var(--gray-600); padding: 0 20px 16px; }
        
        /* ===== CTA ===== */
        .cta-section {
            background: linear-gradient(135deg, var(--green) 0%, var(--green-dark) 100%);
            padding: 80px 0; color: #fff;
        }
        .cta-section h2 { font-size: 36px; font-weight: 800; }
        .cta-section p { font-size: 15px; opacity: 0.9; }
        .cta-badge {
            display: inline-block; background: rgba(255,255,255,0.2);
            padding: 6px 16px; border-radius: 20px; font-size: 13px; font-weight: 600;
        }
        
        /* ===== CONTACTO ===== */
        .contact-info-card {
            background: var(--gray-800); color: #fff; border-radius: 16px;
            padding: 32px; height: 100%;
        }
        .contact-info-card h5 { font-size: 18px; font-weight: 700; margin-bottom: 20px; }
        .contact-info-card .info-item {
            display: flex; align-items: center; gap: 12px; margin-bottom: 16px;
            font-size: 14px;
        }
        .contact-info-card .info-item i {
            width: 36px; height: 36px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,0.1); font-size: 14px;
        }
        .contact-form {
            background: #fff; border: 1px solid var(--gray-200); border-radius: 16px;
            padding: 32px;
        }
        .contact-form .form-control, .contact-form .form-select {
            border: 1px solid var(--gray-200); border-radius: 8px;
            padding: 10px 14px; font-size: 14px;
        }
        .contact-form .form-control:focus, .contact-form .form-select:focus {
            border-color: var(--green); box-shadow: 0 0 0 3px rgba(22,163,74,0.1);
        }
        .contact-form label { font-size: 13px; font-weight: 600; margin-bottom: 6px; }
        
        /* ===== FOOTER ===== */
        .footer {
            background: var(--gray-900); color: #fff; padding: 48px 0 24px;
        }
        .footer h6 { font-size: 14px; font-weight: 700; margin-bottom: 16px; }
        .footer a { color: var(--gray-400); text-decoration: none; font-size: 13px; }
        .footer a:hover { color: #fff; }
        .footer .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 24px; margin-top: 32px;
        }
        .footer .nav-links a { margin-right: 16px; }
        
        /* ===== FLOATING BUTTONS ===== */
        .floating-buttons {
            position: fixed; bottom: 30px; right: 30px;
            display: flex; flex-direction: column; gap: 12px; z-index: 999;
        }
        .float-btn {
            width: 56px; height: 56px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; color: #fff; text-decoration: none;
            transition: all 0.3s; box-shadow: 0 4px 16px rgba(0,0,0,0.2);
        }
        .float-btn.whatsapp { background: #25D366; }
        .float-btn.whatsapp:hover { background: #1aa044; transform: scale(1.1); }
        .float-btn.phone { background: var(--green); }
        .float-btn.phone:hover { background: var(--green-dark); transform: scale(1.1); }
        
        @media (max-width: 768px) {
            /* Hero */
            .hero { padding: 40px 0 30px; }
            .hero h1 { font-size: 28px; text-align: center; }
            .hero p { font-size: 14px; text-align: center; }
            .hero-features { margin-bottom: 20px; }
            .hero-features li { font-size: 13px; }
            .hero-img img { height: 250px; }
            .hero .d-flex.gap-3 { justify-content: center; }
            .hero .btn { font-size: 13px; padding: 10px 16px; width: 100%; text-align: center; }
            .hero .col-lg-6:first-child { text-align: center; }

            /* Carousel arrows always visible on mobile (no hover) */
            .hero-img .carousel-control-prev,
            .hero-img .carousel-control-next { opacity: 0.7; width: 32px; height: 32px; }

            /* Sections */
            .section { padding: 50px 0; }
            .section-title { font-size: 24px; }
            .section-subtitle { font-size: 13px; margin-bottom: 30px; }
            .badge-label { font-size: 11px; }

            /* Feature cards */
            .feature-card { padding: 18px; }
            .feature-card h5 { font-size: 15px; }

            /* Program cards */
            .program-card .card-header { padding: 16px; }
            .program-card .card-body { padding: 16px; }

            /* Methodology */
            .method-step { margin-bottom: 16px; }
            .method-num { width: 32px; height: 32px; font-size: 13px; }

            /* Schedule */
            .schedule-table th, .schedule-table td { padding: 8px 10px; font-size: 12px; }

            /* CTA section */
            .cta-section { padding: 50px 0; }
            .cta-section h2 { font-size: 26px; text-align: center; }
            .cta-section p { text-align: center; font-size: 14px; }
            .cta-section .d-flex.gap-3 { justify-content: center; }
            .cta-section .btn { width: 100%; text-align: center; }
            .cta-section ul li { font-size: 13px; }

            /* Contact */
            .contact-info-card { padding: 24px; margin-bottom: 16px; }
            .contact-info-card .info-item { font-size: 13px; }
            .contact-form { padding: 20px; }
            .contact-form label { font-size: 12px; }

            /* Footer */
            .footer { padding: 32px 0 16px; }
            .footer .footer-bottom { flex-direction: column; gap: 12px; text-align: center; }
            .footer .nav-links { display: flex; flex-wrap: wrap; justify-content: center; gap: 8px; }
            .footer .nav-links a { margin-right: 0; font-size: 12px; }

            /* Floating buttons */
            .floating-buttons { bottom: 16px; right: 16px; gap: 8px; }
            .float-btn { width: 48px; height: 48px; font-size: 18px; }

            /* Navbar */
            .navbar-custom { padding: 8px 0; }
            .navbar-brand img { height: 36px !important; }

            /* FAQ */
            .faq-item .accordion-button { font-size: 13px; padding: 14px 16px; }
            .faq-item .accordion-body { font-size: 12px; padding: 0 16px 14px; }

            /* Testimonials */
            .testimonial-card { padding: 18px; }
            .testimonial-card p { font-size: 13px; }

            /* Clases accordion */
            .clases-accordion .accordion-button { font-size: 15px; padding: 14px 18px; }
            .clases-accordion .accordion-body { padding: 0 18px 18px; }
            .clase-main-img { height: 220px; }
            .clase-gallery img { width: 60px; height: 60px; }
        }

        @media (max-width: 480px) {
            .hero h1 { font-size: 24px; }
            .hero-img img { height: 200px; }
            .section-title { font-size: 22px; }
            .section { padding: 40px 0; }
            .cta-section h2 { font-size: 22px; }
            .navbar-brand img { height: 32px !important; }
            .navbar-brand div span:first-child { font-size: 16px !important; }
            .navbar-brand div span:last-child { font-size: 8px !important; }
            .contact-info-card .info-item span { font-size: 12px; }
            .clase-main-img { height: 180px; }
            .clase-gallery img { width: 50px; height: 50px; }
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Aqua-Anita" style="height: 46px; border-radius: 6px; margin-right: 10px;">
                <div style="line-height: 1.1;">
                    <span style="font-size: 20px; font-weight: 800; color: var(--gray-900); display: block;">Aqua-Anita</span>
                    <span style="font-size: 10px; font-weight: 600; color: var(--gray-500); letter-spacing: 1.5px; text-transform: uppercase;">Escuela de Natación</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#nosotros">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#nuestras-clases">Clases</a></li>
                    <li class="nav-item"><a class="nav-link" href="#programas">Programas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#horarios">Horarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                </ul>
                <a href="#contacto" class="btn btn-green">Contáctanos</a>
            </div>
        </div>
    </nav>

    <!-- ===== HERO ===== -->
    <section id="inicio" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1>Aprende a nadar<br>con <span>confianza y<br>seguridad</span></h1>
                    <p>En Aqua-Anita, nuestros instructores certificados crean un ambiente seguro. Clases personalizadas para todas las edades y niveles, con una metodología probada que genera confianza en el agua.</p>
                    <ul class="hero-features">
                        <li><i class="fas fa-check-circle"></i> Instructores certificados y capacitados</li>
                        <li><i class="fas fa-check-circle"></i> Grupos reducidos para atención personalizada</li>
                        <li><i class="fas fa-check-circle"></i> Metodología adaptada a cada edad</li>
                        <li><i class="fas fa-check-circle"></i> Ambiente seguro y controlado</li>
                    </ul>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="https://wa.me/5215510722683" target="_blank" class="btn btn-green"><i class="fab fa-whatsapp me-2"></i>Inscríbete por WhatsApp</a>
                        <a href="#contacto" class="btn btn-green-outline"><i class="fas fa-calendar me-2"></i>Agenda una clase de prueba</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img">
                        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
                                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
                                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="4"></button>
                                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="5"></button>
                                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="6"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <picture><source srcset="{{ asset('images/hero-1.webp') }}" type="image/webp"><img src="{{ asset('images/hero-1.jpg') }}" alt="Alberca Aqua-Anita"></picture>
                                </div>
                                <div class="carousel-item">
                                    <picture><source srcset="{{ asset('images/hero-2.webp') }}" type="image/webp"><img src="{{ asset('images/hero-2.jpg') }}" alt="Clases de natación en grupo"></picture>
                                </div>
                                <div class="carousel-item">
                                    <picture><source srcset="{{ asset('images/hero-3.webp') }}" type="image/webp"><img src="{{ asset('images/hero-3.jpg') }}" alt="Niños aprendiendo a nadar"></picture>
                                </div>
                                <div class="carousel-item">
                                    <picture><source srcset="{{ asset('images/hero-4.webp') }}" type="image/webp"><img src="{{ asset('images/hero-4.jpg') }}" alt="Evento en la alberca"></picture>
                                </div>
                                <div class="carousel-item">
                                    <picture><source srcset="{{ asset('images/hero-5.webp') }}" type="image/webp"><img src="{{ asset('images/hero-5.jpg') }}" alt="Niños disfrutando la alberca"></picture>
                                </div>
                                <div class="carousel-item">
                                    <picture><source srcset="{{ asset('images/hero-6.webp') }}" type="image/webp"><img src="{{ asset('images/hero-6.jpg') }}" alt="Competencia de natación"></picture>
                                </div>
                                <div class="carousel-item">
                                    <picture><source srcset="{{ asset('images/hero-7.webp') }}" type="image/webp"><img src="{{ asset('images/hero-7.jpg') }}" alt="Familia en la alberca"></picture>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== POR QUÉ AQUA ANITA ===== -->
    <section id="nosotros" class="section">
        <div class="container">
            <div class="text-center">
                <span class="badge-label">Nuestras Ventajas</span>
                <h2 class="section-title">¿Por qué <span>Aqua-Anita</span>?</h2>
                <p class="section-subtitle">Más que una escuela de natación, somos un espacio donde cada persona descubre confianza, seguridad y diversión en el agua desde la primera clase.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon green"><i class="fas fa-shield-alt"></i></div>
                        <h5>Seguridad Garantizada</h5>
                        <p>Protocolos estrictos de seguridad, supervisión constante y equipos de rescate en cada sesión.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon orange"><i class="fas fa-heart"></i></div>
                        <h5>Ambiente Familiar</h5>
                        <p>Un espacio cálido donde las familias se sienten cómodas y los niños aprenden con alegría.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon blue"><i class="fas fa-certificate"></i></div>
                        <h5>Instructores Certificados</h5>
                        <p>Nuestro equipo cuenta con certificaciones internacionales en enseñanza acuática y rescate.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon green"><i class="fas fa-tag"></i></div>
                        <h5>Precios Justos</h5>
                        <p>Planes accesibles sin sacrificar la calidad. Opciones de pago flexibles para todas las familias.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon orange"><i class="fas fa-users"></i></div>
                        <h5>Grupos Reducidos</h5>
                        <p>Máximo 6 alumnos por clase para garantizar atención personalizada y progreso real.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon blue"><i class="fas fa-clock"></i></div>
                        <h5>Horarios Flexibles</h5>
                        <p>Múltiples opciones de horario para adaptarnos a tu rutina diaria y la de tu familia.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== NUESTRAS CLASES ===== -->
    <section id="nuestras-clases" class="section section-gray">
        <div class="container">
            <div class="text-center">
                <span class="badge-label">Nuestras Clases</span>
                <h2 class="section-title">Conoce nuestras <span>modalidades</span></h2>
                <p class="section-subtitle">Ofrecemos diferentes tipos de clases para adaptarnos a tus necesidades y las de tu familia</p>
            </div>

            @if($clases->count())
            <div class="clases-accordion">
                <div class="accordion" id="acordionClases">
                    @foreach($clases as $index => $clase)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#clase-{{ $clase->slug }}">
                                <i class="{{ $clase->icono }} clase-icon" style="background: var(--green-light); color: var(--green);"></i>
                                {{ $clase->nombre }}
                            </button>
                        </h2>
                        <div id="clase-{{ $clase->slug }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#acordionClases">
                            <div class="accordion-body">
                                <div class="row align-items-center g-4">
                                    <div class="col-lg-6">
                                        @if($clase->imagen_principal)
                                            <img src="{{ asset('storage/' . $clase->imagen_principal) }}" alt="{{ $clase->nombre }}" class="clase-main-img" id="mainImg-{{ $clase->slug }}">
                                        @else
                                            <div class="clase-main-img d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, var(--green-light) 0%, #e0f2fe 100%); border-radius: 16px;">
                                                <i class="{{ $clase->icono }}" style="font-size: 64px; color: var(--green); opacity: 0.4;"></i>
                                            </div>
                                        @endif

                                        @if($clase->imagenes->count())
                                        <div class="clase-gallery">
                                            @if($clase->imagen_principal)
                                            <img src="{{ asset('storage/' . $clase->imagen_principal) }}" alt="Principal" class="active-thumb" onclick="changeMainImg('{{ $clase->slug }}', this)">
                                            @endif
                                            @foreach($clase->imagenes as $img)
                                            <img src="{{ asset('storage/' . $img->imagen) }}" alt="Galería {{ $loop->iteration }}" onclick="changeMainImg('{{ $clase->slug }}', this)">
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div style="font-size: 15px; color: var(--gray-600); line-height: 1.8;">
                                            {!! nl2br(e($clase->descripcion)) !!}
                                        </div>
                                        <div class="mt-4 d-flex gap-3 flex-wrap">
                                            <a href="#contacto" class="btn btn-green"><i class="fas fa-calendar me-2"></i>Agendar Clase</a>
                                            <a href="https://wa.me/5215510722683?text=Hola,%20me%20interesa%20información%20sobre%20{{ urlencode($clase->nombre) }}" target="_blank" class="btn btn-green-outline"><i class="fab fa-whatsapp me-2"></i>Más Info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="text-center py-5">
                <p style="color: var(--gray-400); font-size: 15px;">Próximamente información sobre nuestras clases.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- ===== PROGRAMAS ===== -->
    <section id="programas" class="section">

        <div class="container">
            <div class="text-center">
                <span class="badge-label">Nuestros Programas</span>
                <h2 class="section-title">El programa perfecto para cada <span>etapa</span></h2>
                <p class="section-subtitle">Desde los primeros chapoteos hasta el dominio completo, tenemos el programa ideal para ti o tu pequeño.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="program-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center gap-3">
                                <div style="width: 40px; height: 40px; background: var(--green-light); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--green); font-size: 18px;">
                                    <i class="fas fa-baby"></i>
                                </div>
                                <div>
                                    <h5>Matriculación</h5>
                                    <p>Programa personalizado</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li><i class="fas fa-check"></i> Evaluación inicial del nivel</li>
                                <li><i class="fas fa-check"></i> Plan de desarrollo personalizado</li>
                                <li><i class="fas fa-check"></i> Seguimiento de progreso</li>
                                <li><i class="fas fa-check"></i> Acceso a todas las instalaciones</li>
                                <li><i class="fas fa-check"></i> Material didáctico incluido</li>
                                <li><i class="fas fa-check"></i> Certificado de nivel</li>
                            </ul>
                            <a href="#contacto" class="btn btn-green w-100 mt-2">Inscríbete Ahora</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="program-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center gap-3">
                                <div style="width: 40px; height: 40px; background: #eff6ff; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #2563eb; font-size: 18px;">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <h5>Clases en Grupo</h5>
                                    <p>Aprende con compañeros</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li><i class="fas fa-check"></i> Grupos de máximo 6 alumnos</li>
                                <li><i class="fas fa-check"></i> Clasificación por nivel y edad</li>
                                <li><i class="fas fa-check"></i> Ambiente motivador y divertido</li>
                                <li><i class="fas fa-check"></i> Desarrollo de habilidades sociales</li>
                                <li><i class="fas fa-check"></i> Precios accesibles</li>
                                <li><i class="fas fa-check"></i> Horarios flexibles</li>
                            </ul>
                            <a href="#contacto" class="btn btn-green w-100 mt-2">Inscríbete Ahora</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="program-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center gap-3">
                                <div style="width: 40px; height: 40px; background: #fff7ed; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--orange); font-size: 18px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h5>Clases Individuales</h5>
                                    <p>Atención 100% personalizada</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li><i class="fas fa-check"></i> Instructor exclusivo</li>
                                <li><i class="fas fa-check"></i> Ritmo adaptado a ti</li>
                                <li><i class="fas fa-check"></i> Horario a tu medida</li>
                                <li><i class="fas fa-check"></i> Progreso acelerado</li>
                                <li><i class="fas fa-check"></i> Corrección técnica precisa</li>
                                <li><i class="fas fa-check"></i> Ideal para miedos o fobias</li>
                            </ul>
                            <a href="#contacto" class="btn btn-green w-100 mt-2">Inscríbete Ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== METODOLOGÍA ===== -->
    <section class="section section-gray">
        <div class="container">
            <div class="text-center">
                <span class="badge-label">Nuestro Proceso</span>
                <h2 class="section-title">Nuestra <span>Metodología</span></h2>
                <p class="section-subtitle">Un enfoque paso a paso para garantizar el aprendizaje seguro y efectivo</p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <p class="mb-4" style="font-size: 14px; color: var(--gray-600);">Utilizamos una metodología progresiva basada en la confianza y el respeto. Cada alumno avanza a su ritmo, garantizando un aprendizaje sólido y duradero.</p>
                    <ul style="list-style: none; padding: 0;">
                        <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px; font-size: 14px; color: var(--gray-700);">
                            <i class="fas fa-check-circle" style="color: var(--green);"></i> Evaluación personalizada de cada alumno
                        </li>
                        <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px; font-size: 14px; color: var(--gray-700);">
                            <i class="fas fa-check-circle" style="color: var(--green);"></i> Respeto al ritmo individual
                        </li>
                        <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px; font-size: 14px; color: var(--gray-700);">
                            <i class="fas fa-check-circle" style="color: var(--green);"></i> Juegos y dinámicas para los más pequeños
                        </li>
                        <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px; font-size: 14px; color: var(--gray-700);">
                            <i class="fas fa-check-circle" style="color: var(--green);"></i> Reportes de avance periódicos
                        </li>
                        <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px; font-size: 14px; color: var(--gray-700);">
                            <i class="fas fa-check-circle" style="color: var(--green);"></i> Comunicación constante con padres
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="method-step">
                        <div class="method-num active">1</div>
                        <div>
                            <h6>Evaluación Inicial</h6>
                            <p>Determinamos el nivel actual y objetivos de cada alumno</p>
                        </div>
                    </div>
                    <div class="method-step">
                        <div class="method-num active">2</div>
                        <div>
                            <h6>Adaptación al Agua</h6>
                            <p>Familiarización progresiva con el medio acuático</p>
                        </div>
                    </div>
                    <div class="method-step">
                        <div class="method-num active">3</div>
                        <div>
                            <h6>Desarrollo Técnico</h6>
                            <p>Enseñanza de técnicas y estilos de natación</p>
                        </div>
                    </div>
                    <div class="method-step">
                        <div class="method-num active">4</div>
                        <div>
                            <h6>Perfeccionamiento</h6>
                            <p>Mejora continua y dominio avanzado</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== HORARIOS ===== -->
    <section id="horarios" class="section">
        <div class="container">
            <div class="text-center">
                <span class="badge-label">Disponibilidad</span>
                <h2 class="section-title">Encuentra el <span>horario ideal</span> para ti</h2>
                <p class="section-subtitle">Ofrecemos múltiples horarios para adaptarnos a tu estilo de vida</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="schedule-card">
                        <div class="p-3" style="background: var(--green); color: white;">
                            <h5 class="mb-0 fw-bold" style="font-size: 16px;"><i class="fas fa-calendar me-2"></i>Horario de Clases</h5>
                        </div>
                        <div style="background: white;">
                            <h6 class="p-3 mb-0 fw-bold" style="font-size: 14px; border-bottom: 1px solid var(--gray-200);">
                                <i class="fas fa-sun me-2" style="color: var(--orange);"></i>Lunes, Miércoles y Viernes
                            </h6>
                            <table class="schedule-table">
                                <thead>
                                    <tr><th>Hora</th><th>Nivel</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>8:00 - 9:00</td><td>Principiantes</td></tr>
                                    <tr><td>9:00 - 10:00</td><td>Intermedio</td></tr>
                                    <tr><td>10:00 - 11:00</td><td>Avanzado</td></tr>
                                    <tr><td>15:00 - 16:00</td><td>Bebés (0-3 años)</td></tr>
                                    <tr><td>16:00 - 17:00</td><td>Niños (4-8 años)</td></tr>
                                    <tr><td>17:00 - 18:00</td><td>Adultos</td></tr>
                                </tbody>
                            </table>
                            <h6 class="p-3 mb-0 fw-bold" style="font-size: 14px; border-bottom: 1px solid var(--gray-200); border-top: 1px solid var(--gray-200);">
                                <i class="fas fa-star me-2" style="color: var(--orange);"></i>Martes y Jueves
                            </h6>
                            <table class="schedule-table">
                                <thead>
                                    <tr><th>Hora</th><th>Nivel</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>8:00 - 9:00</td><td>Todos los niveles</td></tr>
                                    <tr><td>16:00 - 17:00</td><td>Clases individuales</td></tr>
                                    <tr><td>17:00 - 18:00</td><td>Grupos reducidos</td></tr>
                                </tbody>
                            </table>
                            <div class="p-3 text-center" style="background: var(--green-light); font-size: 13px; color: var(--green); font-weight: 600;">
                                <i class="fas fa-info-circle me-1"></i> Los horarios pueden variar según disponibilidad
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="location-card">
                        <div class="p-3" style="background: var(--green); color: white;">
                            <h5 class="mb-0 fw-bold" style="font-size: 16px;"><i class="fas fa-map-marker-alt me-2"></i>Ubicación</h5>
                        </div>
                        <div style="padding: 20px;">
                            <div style="border-radius: 12px; height: 200px; overflow: hidden; margin-bottom: 16px;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.5!2d-99.0405041!3d19.3069591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce02e5ce54c23f%3A0xc85304666ff23a32!2sCalle%20Manuel%20M.%20L%C3%B3pez%2C%20Zapotitla%2C%20Tl%C3%A1huac%2C%20CDMX!5e0!3m2!1ses!2smx" width="100%" height="200" style="border:0; border-radius: 12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <p style="font-size: 13px; color: var(--gray-500); margin-bottom: 8px;">
                                <i class="fas fa-map-marker-alt me-2" style="color: var(--green);"></i>
                                Manuel M. López Lt 12 Mz 79, Col. Zapotitlán<br>
                                <span style="margin-left: 22px;">Entre Av. Tláhuac, Alcaldía Tláhuac, CDMX</span>
                            </p>
                            <p style="font-size: 13px; color: var(--gray-500); margin-bottom: 8px;">
                                <i class="fas fa-phone me-2" style="color: var(--green);"></i>
                                +52 55 1072 2683
                            </p>
                            <p style="font-size: 13px; color: var(--gray-500); margin-bottom: 16px;">
                                <i class="fas fa-envelope me-2" style="color: var(--green);"></i>
                                contacto@aqua-anita.com.mx
                            </p>
                            <a href="https://wa.me/5215510722683" target="_blank" class="btn btn-green w-100 btn-sm"><i class="fab fa-whatsapp me-2"></i>Contáctanos por WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== TESTIMONIOS ===== -->
    <section class="section section-gray">
        <div class="container">
            <div class="text-center">
                <span class="badge-label">Testimonios</span>
                <h2 class="section-title">Lo que dicen <span>nuestras familias</span></h2>
                <p class="section-subtitle">Conoce las experiencias de quienes ya confían en Aqua-Anita</p>
            </div>
            <div class="row g-4">
                @forelse($testimonios as $testimonio)
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="stars">{{ str_repeat('★', $testimonio->estrellas) }}{{ str_repeat('☆', 5 - $testimonio->estrellas) }}</div>
                        <p>"{{ $testimonio->texto }}"</p>
                        <div class="author">{{ $testimonio->nombre }}</div>
                        @if($testimonio->rol)
                        <div class="role">{{ $testimonio->rol }}</div>
                        @endif
                    </div>
                </div>
                @empty
                <!-- Fallback testimonios if none in DB -->
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p>"Mi hijo tenía mucho miedo al agua y ahora la disfruta. Los instructores son muy pacientes y profesionales."</p>
                        <div class="author">María G.</div>
                        <div class="role">Mamá de Sofía, 4 años</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p>"La metodología es excepcional. Mi hijo aprendió a nadar en solo 3 meses. Totalmente recomendado."</p>
                        <div class="author">Roberto L.</div>
                        <div class="role">Papá de Diego, 6 años</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>
                        <p>"Yo soy adulta y no sabía nadar. Gracias a Aqua-Anita perdí el miedo y ahora nado con confianza."</p>
                        <div class="author">Andrea M.</div>
                        <div class="role">Alumna adulta</div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ===== FAQ ===== -->
    <section class="section">
        <div class="container">
            <div class="text-center">
                <span class="badge-label">Dudas</span>
                <h2 class="section-title">Preguntas <span>Frecuentes</span></h2>
                <p class="section-subtitle">Resolvemos las dudas más comunes de las familias que nos contactan</p>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="accordionFAQ">
                        <div class="faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">¿Desde qué edad pueden nadar nuestros hijos?</button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">Aceptamos alumnos desde los 6 meses de edad. Para bebés menores de 3 años, las clases son acompañadas por un padre o tutor.</div>
                            </div>
                        </div>
                        <div class="faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">¿Qué es la estimulación y cómo funciona?</button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">La estimulación acuática temprana es un programa diseñado para familiarizar a los bebés con el agua, mejorando su desarrollo motor, cognitivo y emocional.</div>
                            </div>
                        </div>
                        <div class="faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">¿Cuál es la diferencia entre clases individuales y en grupo?</button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">Las clases individuales ofrecen atención 100% personalizada, mientras que las grupales (máx. 6 personas) fomentan la socialización y motivación entre compañeros.</div>
                            </div>
                        </div>
                        <div class="faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">¿Qué equipo necesito traer?</button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">Solo necesitas traje de baño, toalla, sandalias y gorra de natación. Nosotros proporcionamos el material didáctico.</div>
                            </div>
                        </div>
                        <div class="faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">¿Cómo funcionan sus niveles de aprendizaje?</button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">Contamos con 4 niveles: Principiante, Básico, Intermedio y Avanzado. Cada alumno es evaluado para ubicarlo en el nivel apropiado.</div>
                            </div>
                        </div>
                        <div class="faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">¿Qué pasa si falto a una clase?</button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">Ofrecemos reposiciones de clase con previa notificación de al menos 24 horas. Consulta nuestra política de cancelación.</div>
                            </div>
                        </div>
                        <div class="faq-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">¿Cuáles son sus niveles de desarrollo?</button>
                            </h2>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">Nuestros niveles van desde la familiarización con el agua hasta el dominio de los 4 estilos de natación competitiva.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <span class="cta-badge mb-3 d-inline-block">Compromiso</span>
                    <h2>El primer paso hacia la confianza en el agua</h2>
                    <p class="mt-3">Inscripciones abiertas para todos los niveles. Plazas limitadas para garantizar atención personalizada.</p>
                    <ul style="list-style: none; padding: 0; margin: 20px 0;">
                        <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px; font-size: 14px;"><i class="fas fa-check-circle"></i> Instructores certificados y con experiencia</li>
                        <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px; font-size: 14px;"><i class="fas fa-check-circle"></i> Grupos reducidos de máximo 6 alumnos</li>
                        <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px; font-size: 14px;"><i class="fas fa-check-circle"></i> Primera clase de evaluación sin compromiso</li>
                    </ul>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="#contacto" class="btn" style="background: white; color: var(--green); font-weight: 700; padding: 12px 28px; border-radius: 8px;">Inscríbete Ahora</a>
                        <a href="tel:+525510722683" class="btn" style="border: 2px solid white; color: white; font-weight: 700; padding: 12px 28px; border-radius: 8px;">Llámanos</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center">
                    <div style="background: rgba(255,255,255,0.15); border-radius: 20px; padding: 40px;">
                        <div style="margin-bottom: 16px;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 140" width="120" height="84">
                                <!-- Water waves -->
                                <path d="M0 95 Q25 80 50 95 T100 95 T150 95 T200 95 L200 140 L0 140 Z" fill="rgba(255,255,255,0.2)"/>
                                <path d="M0 105 Q25 90 50 105 T100 105 T150 105 T200 105 L200 140 L0 140 Z" fill="rgba(255,255,255,0.15)"/>
                                <!-- Swimmer body -->
                                <ellipse cx="100" cy="72" rx="38" ry="8" fill="white" opacity="0.9"/>
                                <!-- Head -->
                                <circle cx="140" cy="65" r="12" fill="white"/>
                                <!-- Cap -->
                                <path d="M130 58 Q140 48 152 58" fill="#fbbf24" stroke="#fbbf24" stroke-width="2"/>
                                <!-- Goggles -->
                                <ellipse cx="145" cy="65" rx="5" ry="3" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"/>
                                <!-- Left arm (reaching forward) -->
                                <path d="M130 72 Q115 45 95 38" stroke="white" stroke-width="5" fill="none" stroke-linecap="round"/>
                                <!-- Right arm (back) -->
                                <path d="M75 72 Q65 55 55 50" stroke="white" stroke-width="5" fill="none" stroke-linecap="round" opacity="0.7"/>
                                <!-- Splash lines -->
                                <line x1="90" y1="35" x2="85" y2="25" stroke="rgba(255,255,255,0.5)" stroke-width="2" stroke-linecap="round"/>
                                <line x1="80" y1="40" x2="72" y2="30" stroke="rgba(255,255,255,0.4)" stroke-width="2" stroke-linecap="round"/>
                                <line x1="100" y1="33" x2="98" y2="22" stroke="rgba(255,255,255,0.3)" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div style="background: rgba(255,255,255,0.2); display: inline-block; padding: 8px 24px; border-radius: 20px; font-weight: 700; font-size: 18px; margin-bottom: 8px;">Más de 100 familias</div>
                        <p style="font-size: 14px; opacity: 0.9;">ya confían en nosotros</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CONTACTO ===== -->
    <section id="contacto" class="section">
        <div class="container">
            <div class="text-center">
                <span class="badge-label">Contacto</span>
                <h2 class="section-title">¿Listo para <span>comenzar</span>?</h2>
                <p class="section-subtitle">Completa el formulario y un profesional se pondrá en contacto contigo para resolver todas tus dudas y agendar tu clase de evaluación.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="contact-info-card mb-4">
                        <h5>Información de contacto</h5>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Manuel M. López Lt 12 Mz 79, Col. Zapotitlán, Alcaldía Tláhuac, CDMX</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <span>+52 55 1072 2683</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i>
                            <span>contacto@aqua-anita.com.mx</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <span>Lun - Sab: 8:00 - 18:00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form">
                        <div class="row g-3">
                            <form action="{{ route('contacto.store') }}" method="POST" id="contactForm">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">Nombre completo *</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Tu nombre" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Correo electrónico *</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="tu@email.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefono" class="form-label">Teléfono *</label>
                                        <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="+52 55 1072 2683" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="programa" class="form-label">Programa de interés</label>
                                        <select id="programa" name="programa" class="form-select">
                                            <option value="">Selecciona un programa</option>
                                            <option value="matriculacion">Matriculación</option>
                                            <option value="grupo">Clases en Grupo</option>
                                            <option value="individual">Clases Individuales</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="mensaje" class="form-label">Mensaje *</label>
                                        <textarea id="mensaje" name="mensaje" rows="4" class="form-control" placeholder="Cuéntanos sobre tus necesidades..." required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="privacidad" required>
                                            <label class="form-check-label" for="privacidad" style="font-size: 13px; color: var(--gray-500);">
                                                He leído y acepto el <a href="{{ route('privacidad') }}" target="_blank" style="color: var(--green); text-decoration: underline;">Aviso de Privacidad</a>. *
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-green w-100" style="padding: 12px;">Enviar mensaje</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="https://wa.me/5215510722683" target="_blank" class="btn btn-green-outline w-100" style="padding: 12px;"><i class="fab fa-whatsapp me-2"></i>O escríbenos</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ asset('images/logo.jpeg') }}" alt="Aqua-Anita" style="height: 34px; border-radius: 4px; margin-right: 10px;">
                        <div style="line-height: 1.1;">
                            <span style="font-size: 16px; font-weight: 800; display: block;">Aqua-Anita</span>
                            <span style="font-size: 9px; font-weight: 600; color: var(--gray-400); letter-spacing: 1.5px; text-transform: uppercase;">Escuela de Natación</span>
                        </div>
                    </div>
                    <p style="font-size: 13px; color: var(--gray-400);">Enseñando a nadar con confianza y seguridad desde 2010.</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Enlaces Rápidos</h6>
                    <ul class="list-unstyled">
                        <li class="mb-1"><a href="#inicio">Inicio</a></li>
                        <li class="mb-1"><a href="#nosotros">Nosotros</a></li>
                        <li class="mb-1"><a href="#nuestras-clases">Clases</a></li>
                        <li class="mb-1"><a href="#programas">Programas</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Programas</h6>
                    <ul class="list-unstyled">
                        <li class="mb-1"><a href="#programas">Matriculación</a></li>
                        <li class="mb-1"><a href="#programas">Clases en Grupo</a></li>
                        <li class="mb-1"><a href="#programas">Clases Individuales</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Contacto</h6>
                    <ul class="list-unstyled">
                        <li class="mb-1"><a href="tel:+525510722683"><i class="fas fa-phone me-2"></i>+52 55 1072 2683</a></li>
                        <li class="mb-1"><a href="mailto:contacto@aqua-anita.com.mx"><i class="fas fa-envelope me-2"></i>contacto@aqua-anita.com.mx</a></li>
                        <li class="mb-1"><a href="#"><i class="fas fa-map-marker-alt me-2"></i>Col. Zapotitlán, Alcaldía Tláhuac, CDMX</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom d-flex flex-wrap justify-content-between align-items-center">
                <p style="font-size: 12px; color: var(--gray-400); margin: 0;">&copy; 2026 Aqua-Anita. Todos los derechos reservados.</p>
                <div class="nav-links">
                    <a href="#">Inicio</a>
                    <a href="#nosotros">Nosotros</a>
                    <a href="#programas">Programas</a>
                    <a href="#contacto">Contacto</a>
                    <a href="{{ route('privacidad') }}">Aviso de Privacidad</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ===== FLOATING BUTTONS ===== -->
    <div class="floating-buttons">
        <a href="https://wa.me/5215510722683?text=Hola,%20me%20gustaría%20información%20sobre%20las%20clases%20de%20natación" target="_blank" class="float-btn whatsapp" title="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="tel:+525510722683" class="float-btn phone" title="Llamar">
            <i class="fas fa-phone"></i>
        </a>
    </div>

    <!-- Toast notification -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="formToast" class="toast align-items-center border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body fw-bold" id="toastMessage"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showToast(message, success) {
            const toast = document.getElementById('formToast');
            const msg = document.getElementById('toastMessage');
            msg.textContent = message;
            toast.className = 'toast align-items-center border-0 text-white ' + (success ? 'bg-success' : 'bg-danger');
            new bootstrap.Toast(toast, { delay: 4000 }).show();
        }

        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const btn = this.querySelector('button[type="submit"]');
            const txt = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Enviando...';

            fetch('{{ route("contacto.store") }}', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(r => r.json())
            .then(data => {
                if(data.success) {
                    showToast('¡Gracias! Tu mensaje ha sido enviado. Nos pondremos en contacto pronto.', true);
                    this.reset();
                } else {
                    showToast(data.message || 'Error al enviar el mensaje.', false);
                }
            })
            .catch(() => showToast('Error al enviar. Por favor intenta de nuevo.', false))
            .finally(() => { btn.disabled = false; btn.innerHTML = txt; });
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const target = document.querySelector(this.getAttribute('href'));
                if(target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    // Close mobile menu
                    const navCollapse = document.querySelector('.navbar-collapse');
                    if(navCollapse.classList.contains('show')) {
                        new bootstrap.Collapse(navCollapse).hide();
                    }
                }
            });
        });

        // Navbar shadow on scroll
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('.navbar-custom');
            nav.style.boxShadow = window.scrollY > 50 ? '0 2px 12px rgba(0,0,0,0.1)' : '0 1px 3px rgba(0,0,0,0.08)';
        });

        // Gallery image swap for Nuestras Clases
        function changeMainImg(slug, thumb) {
            const mainImg = document.getElementById('mainImg-' + slug);
            if (mainImg) {
                mainImg.src = thumb.src;
                // Update active thumbnail
                const gallery = thumb.closest('.clase-gallery');
                if (gallery) {
                    gallery.querySelectorAll('img').forEach(img => img.classList.remove('active-thumb'));
                    thumb.classList.add('active-thumb');
                }
            }
        }
    </script>
</body>
</html>
