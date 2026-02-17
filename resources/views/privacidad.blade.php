<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aviso de Privacidad de Aqua-Anita, Escuela de Natación en Tláhuac, CDMX.">
    <meta name="robots" content="noindex, follow">
    <title>Aviso de Privacidad | Aqua-Anita - Escuela de Natación</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --green: #16a34a;
            --green-dark: #15803d;
            --green-light: #f0fdf4;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; color: var(--gray-700); line-height: 1.7; }

        /* Navbar */
        .navbar-custom { background: #fff; padding: 10px 0; box-shadow: 0 1px 3px rgba(0,0,0,0.08); }
        .navbar-custom .nav-link { font-weight: 500; color: var(--gray-600); padding: 8px 14px !important; font-size: 14px; transition: color .2s; }
        .navbar-custom .nav-link:hover { color: var(--green); }
        .btn-green { background: var(--green); color: #fff !important; border: none; padding: 10px 24px; border-radius: 8px; font-weight: 600; font-size: 14px; transition: all .3s; }
        .btn-green:hover { background: var(--green-dark); transform: translateY(-1px); }

        /* Content */
        .privacy-hero { background: var(--green); color: #fff; padding: 60px 0 40px; text-align: center; }
        .privacy-hero h1 { font-size: 32px; font-weight: 800; margin-bottom: 8px; }
        .privacy-hero p { font-size: 16px; opacity: 0.9; }
        .privacy-content { padding: 50px 0 80px; }
        .privacy-content h2 { font-size: 20px; font-weight: 700; color: var(--gray-900); margin-top: 32px; margin-bottom: 12px; }
        .privacy-content h2:first-of-type { margin-top: 0; }
        .privacy-content p, .privacy-content li { font-size: 15px; color: var(--gray-600); }
        .privacy-content ul { padding-left: 20px; }
        .privacy-content ul li { margin-bottom: 6px; }
        .privacy-card { background: #fff; border-radius: 12px; padding: 40px; box-shadow: 0 1px 6px rgba(0,0,0,0.06); }

        /* Footer */
        .footer { background: var(--gray-900); color: var(--gray-400); padding: 40px 0 20px; font-size: 13px; }
        .footer a { color: var(--gray-400); text-decoration: none; transition: color .2s; }
        .footer a:hover { color: #fff; }

        @media (max-width: 768px) {
            .privacy-hero { padding: 40px 0 30px; }
            .privacy-hero h1 { font-size: 24px; }
            .privacy-card { padding: 24px; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Aqua-Anita" style="height: 46px; border-radius: 6px; margin-right: 10px;">
                <div style="line-height: 1.1;">
                    <span style="font-size: 20px; font-weight: 800; color: var(--gray-900); display: block;">Aqua-Anita</span>
                    <span style="font-size: 10px; font-weight: 600; color: var(--gray-500); letter-spacing: 1.5px; text-transform: uppercase;">Escuela de Natación</span>
                </div>
            </a>
            <a href="{{ route('home') }}" class="btn btn-green"><i class="fas fa-arrow-left me-2"></i>Volver al inicio</a>
        </div>
    </nav>

    <!-- HERO -->
    <section class="privacy-hero">
        <div class="container">
            <h1><i class="fas fa-shield-alt me-2"></i>Aviso de Privacidad</h1>
            <p>Última actualización: 16 de febrero de 2026</p>
        </div>
    </section>

    <!-- CONTENIDO -->
    <section class="privacy-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="privacy-card">

                        <h2>1. Identidad del Responsable</h2>
                        <p><strong>Aqua-Anita, Escuela de Natación</strong>, con domicilio en Manuel M. López Lt 12 Mz 79, Col. Zapotitlán, Alcaldía Tláhuac, Ciudad de México, C.P. 13310, es responsable del tratamiento de los datos personales que nos proporcione, los cuales serán protegidos conforme a lo dispuesto por la <strong>Ley Federal de Protección de Datos Personales en Posesión de los Particulares</strong> (LFPDPPP) y demás normatividad aplicable.</p>

                        <h2>2. Datos Personales que Recabamos</h2>
                        <p>Para las finalidades señaladas en el presente aviso de privacidad, podemos recabar los siguientes datos personales:</p>
                        <ul>
                            <li><strong>Nombre completo</strong></li>
                            <li><strong>Correo electrónico</strong></li>
                            <li><strong>Número de teléfono</strong></li>
                            <li><strong>Programa de interés</strong> (tipo de clase que desea)</li>
                            <li><strong>Mensaje o consulta</strong> adicional</li>
                        </ul>
                        <p>No recabamos datos personales sensibles (datos de salud, origen étnico, creencias religiosas, etc.) a través de nuestro sitio web.</p>

                        <h2>3. Finalidades del Tratamiento</h2>
                        <p>Los datos personales que recabamos serán utilizados para las siguientes finalidades <strong>necesarias</strong>:</p>
                        <ul>
                            <li>Atender y dar seguimiento a solicitudes de información sobre nuestros servicios de natación.</li>
                            <li>Contactarle por correo electrónico o teléfono para responder a su consulta.</li>
                            <li>Proporcionar información sobre horarios, costos y disponibilidad de clases.</li>
                        </ul>
                        <p>De manera <strong>adicional</strong>, utilizaremos su información para:</p>
                        <ul>
                            <li>Enviar información promocional sobre nuevas clases, eventos o descuentos (solo si usted lo autoriza).</li>
                            <li>Realizar estadísticas internas y mejorar nuestros servicios.</li>
                        </ul>

                        <h2>4. Medios para Recabar Datos</h2>
                        <p>Recabamos sus datos personales a través de:</p>
                        <ul>
                            <li><strong>Formulario de contacto</strong> en nuestro sitio web ({{ config('app.url') }}).</li>
                            <li><strong>Comunicaciones directas</strong> por WhatsApp, teléfono o correo electrónico.</li>
                        </ul>

                        <h2>5. Transferencia de Datos</h2>
                        <p>Aqua-Anita <strong>no transfiere</strong> sus datos personales a terceros sin su consentimiento, salvo en los casos previstos por la LFPDPPP y su Reglamento, tales como requerimientos de autoridades competentes debidamente fundados y motivados.</p>

                        <h2>6. Derechos ARCO</h2>
                        <p>Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso que les damos (<strong>Acceso</strong>). Asimismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (<strong>Rectificación</strong>); que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada conforme a los principios, deberes y obligaciones previstas en la normativa (<strong>Cancelación</strong>); así como oponerse al uso de sus datos personales para fines específicos (<strong>Oposición</strong>).</p>
                        <p>Para ejercer cualquiera de los derechos ARCO, puede enviar su solicitud a:</p>
                        <ul>
                            <li><strong>Correo electrónico:</strong> <a href="mailto:contacto@aqua-anita.com.mx">contacto@aqua-anita.com.mx</a></li>
                            <li><strong>Teléfono:</strong> <a href="tel:+525510722683">+52 55 1072 2683</a></li>
                            <li><strong>Domicilio:</strong> Manuel M. López Lt 12 Mz 79, Col. Zapotitlán, Alcaldía Tláhuac, CDMX, C.P. 13310</li>
                        </ul>
                        <p>Su solicitud deberá contener: nombre completo, domicilio o medio para comunicarle la respuesta, documentos que acrediten su identidad, y la descripción clara y precisa de los datos personales respecto de los cuales busca ejercer algún derecho ARCO. Daremos respuesta en un plazo máximo de <strong>20 días hábiles</strong>.</p>

                        <h2>7. Uso de Cookies y Tecnologías de Rastreo</h2>
                        <p>Nuestro sitio web puede utilizar <strong>cookies de sesión</strong> proporcionadas por el framework de nuestra aplicación para garantizar el correcto funcionamiento del sitio. Estas cookies son estrictamente necesarias y no recopilan información personal para fines publicitarios. No utilizamos cookies de terceros con fines de seguimiento o publicidad.</p>

                        <h2>8. Modificaciones al Aviso de Privacidad</h2>
                        <p>Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad, para la atención de novedades legislativas, políticas internas o nuevos requerimientos. Estas modificaciones estarán disponibles en nuestro sitio web en la dirección <a href="{{ route('privacidad') }}">{{ url('/privacidad') }}</a>.</p>

                        <h2>9. Consentimiento</h2>
                        <p>Al proporcionar sus datos personales a través de nuestro formulario de contacto, usted manifiesta su consentimiento para que sean tratados conforme a los términos y condiciones del presente aviso de privacidad. Si usted no está de acuerdo con los términos, le pedimos no proporcionar su información.</p>

                        <h2>10. Contacto</h2>
                        <p>Si tiene alguna duda sobre este aviso de privacidad o sobre el tratamiento de sus datos personales, puede contactarnos en:</p>
                        <div class="bg-light rounded p-3 mt-2">
                            <p class="mb-1"><i class="fas fa-building me-2 text-success"></i><strong>Aqua-Anita, Escuela de Natación</strong></p>
                            <p class="mb-1"><i class="fas fa-map-marker-alt me-2 text-success"></i>Manuel M. López Lt 12 Mz 79, Col. Zapotitlán, Alcaldía Tláhuac, CDMX, C.P. 13310</p>
                            <p class="mb-1"><i class="fas fa-envelope me-2 text-success"></i><a href="mailto:contacto@aqua-anita.com.mx">contacto@aqua-anita.com.mx</a></p>
                            <p class="mb-0"><i class="fas fa-phone me-2 text-success"></i><a href="tel:+525510722683">+52 55 1072 2683</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container text-center">
            <p class="mb-2">&copy; 2026 Aqua-Anita. Todos los derechos reservados.</p>
            <p class="mb-0">
                <a href="{{ route('home') }}">Inicio</a> &middot;
                <a href="{{ route('home') }}#contacto">Contacto</a> &middot;
                <a href="{{ route('privacidad') }}">Aviso de Privacidad</a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
