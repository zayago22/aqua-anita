# MEMORY — Aqua-Anita (Escuela de Natación)

## 1) Resumen en 5 líneas
- Landing page + panel admin para la escuela de natación "Aqua-Anita" en Tláhuac, CDMX.
- Single-page pública con hero carousel (WebP + JPG fallback), secciones informativas, acordeón de clases dinámico, testimonios desde BD, formulario AJAX con checkbox de Aviso de Privacidad y notificación por email.
- Página independiente de **Aviso de Privacidad** (`/privacidad`) cumpliendo LFPDPPP mexicana.
- Panel admin protegido (`/admin`) con CRUD de testimonios, clases (con galería de hasta 6 imágenes) y vista de contactos. Registro público deshabilitado.
- El frontend NO usa Vite/Tailwind/Alpine (aunque están en package.json). Usa **Bootstrap 5.3 + Font Awesome 6.4 + Google Fonts vía CDN** directamente en `home.blade.php`.

## 2) Stack y herramientas
- **Backend**: Laravel 12.51 / PHP 8.3.30 (ruta: `C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe`)
- **Auth**: Laravel Breeze (Blade stack) — **registro público deshabilitado** (rutas comentadas en `routes/auth.php`)
- **BD**: SQLite (`database/database.sqlite`)
- **Frontend público**: Bootstrap 5.3.0, Font Awesome 6.4.0, Inter font — todo vía CDN, CSS inline en `home.blade.php` (~1270 líneas)
- **Frontend admin**: Bootstrap 5.3.0 CDN, layout propio (`admin/layout.blade.php`)
- **Email**: Gmail SMTP (`smtp.gmail.com:587`, TLS, app password)
- **Servidor local**: Laragon en Windows, ejecutar con `php artisan serve` (NO usar localhost/aqua-anita — da directory listing)
- **Almacenamiento**: Storage local, symlink activo (`public/storage` → `storage/app/public`)
- **Sesiones**: File driver | **Cache/Queue**: Database driver
- **Locale**: `APP_LOCALE=es`, `APP_FAKER_LOCALE=es_MX`

## 3) Estructura del repo (mapa rápido)
```
aqua-anita/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php          ← Carga testimonios + clases para la home
│   │   ├── ContactController.php       ← POST /contacto (AJAX, guarda + email)
│   │   └── Admin/                      ← Dashboard, Testimonios, Clases, Contactos CRUD
│   ├── Mail/ContactoRecibido.php       ← Mailable → emails/contacto.blade.php
│   └── Models/
│       ├── Clase.php                   ← hasMany(ClaseImagen), scopeActivas
│       ├── ClaseImagen.php             ← belongsTo(Clase)
│       ├── Contact.php                 ← Formulario de contacto
│       └── Testimonio.php              ← scopeActivos
├── database/
│   ├── migrations/                     ← users, cache, jobs, contacts, testimonios, clases+clase_imagenes
│   └── seeders/ContentSeeder.php       ← 3 testimonios + 3 clases por defecto
├── resources/views/
│   ├── home.blade.php                  ← Landing completa (~1270 líneas, CSS+JS inline)
│   ├── privacidad.blade.php            ← Aviso de Privacidad (LFPDPPP, 10 secciones)
│   ├── admin/                          ← layout + dashboard + CRUD views
│   └── emails/contacto.blade.php       ← Template email HTML
├── public/images/                      ← logo.jpeg/webp + hero-1…7.jpg/webp (WebP optimizados)
├── routes/
│   ├── web.php                         ← Todas las rutas (públicas + admin + privacidad)
│   └── auth.php                        ← Login/logout (registro comentado)
└── .env                                ← SQLite, Gmail SMTP, file sessions, APP_NAME=Aqua-Anita
```

## 4) Decisiones y convenciones (no romper)
- **NO usar Vite/Tailwind/npm build**. El frontend es 100% CDN. No correr `npm run dev`.
- `home.blade.php` es monolítico (CSS + HTML + JS en un solo archivo). No es un layout Blade.
- `privacidad.blade.php` es página independiente con su propio navbar simplificado y footer.
- El admin usa su propio layout (`admin/layout.blade.php`), no el de Breeze.
- Formulario de contacto opera en AJAX (fetch + JSON response + toast Bootstrap) con **checkbox obligatorio de Aviso de Privacidad**.
- Slug de clases es UNIQUE; el controller genera sufijos automáticos si hay duplicados.
- Imágenes de clases se guardan en `storage/app/public/clases/` (principal) y `clases/galeria/` (adicionales).
- Imágenes hero usan `<picture>` con fuente WebP y fallback JPG.
- Coordenadas Google Maps en home son aproximadas (Zapotitlán/Tláhuac).
- Todos los textos están en español mexicano.
- PHP se invoca siempre con ruta completa: `C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe`.
- **Registro público deshabilitado** — solo login para admin existente.

## 5) Estado actual (qué está hecho)
- ✅ Landing page completa: Navbar, Hero carousel (7 fotos WebP+JPG), Por qué Aqua-Anita, Nuestras Clases (acordeón dinámico), Programas, Metodología, Horarios + Google Maps, Testimonios (dinámicos), FAQ, CTA, Contacto (formulario AJAX con checkbox privacidad), Footer con enlace a Aviso de Privacidad, Botones flotantes WhatsApp/Teléfono
- ✅ Aviso de Privacidad (`/privacidad`): Página completa LFPDPPP con 10 secciones (identidad, datos recabados, finalidades, medios, transferencia, ARCO, cookies, modificaciones, consentimiento, contacto)
- ✅ SEO: meta tags, OG tags, favicon
- ✅ Responsive: breakpoints 768px + 480px
- ✅ Email: formulario → BD + email a `hola@rekobit.com` (Gmail SMTP verificado)
- ✅ Panel admin (`/admin`): Dashboard con stats, CRUD Testimonios, CRUD Clases (con imagen principal + 5 galería), Lista de Contactos
- ✅ Auth: usuario admin creado (`hola@rekobit.com` / `AquaAnita2026!`), registro público deshabilitado
- ✅ Migraciones ejecutadas, seeder con contenido inicial, storage link creado
- ✅ Datos reales: teléfono +52 55 1072 2683, email contacto@aqua-anita.com.mx, dirección Manuel M. López Lt 12 Mz 79 Col. Zapotitlán
- ✅ APP_NAME=Aqua-Anita, APP_LOCALE=es
- ✅ Imágenes hero optimizadas a WebP (ahorro 3-35% según imagen) con fallback JPG
- ✅ Archivos huérfanos eliminados (welcome.blade.php, dashboard.blade.php de Breeze)

## 6) Pendientes priorizados (Next)
1. **Subir imágenes reales a las 3 clases** desde el admin (`/admin/clases` → Editar cada una)
2. **Coordenadas exactas de Google Maps** — las actuales son aproximadas
3. **Deploy a producción** — dominio, SSL, hosting, cambiar APP_ENV a production, APP_DEBUG a false
4. **Cambiar contraseña admin** antes de producción (actualmente `AquaAnita2026!`)

## 7) Problemas conocidos / Riesgos
- `package.json` tiene Tailwind/Vite/Alpine configurados pero **NO se usan**. No borrar por si se necesitan después, pero no ejecutar `npm run dev/build`.
- Vite/Tailwind config files (`tailwind.config.js`, `vite.config.js`, `postcss.config.js`) quedan huérfanos.
- La contraseña del admin (`AquaAnita2026!`) está en texto plano solo en el historial — cambiarla si se va a producción.
- `.env` tiene credenciales SMTP reales — **nunca commitear a git público**.
- El `show` de `admin/testimonios` y `admin/clases` (auto-generados por `Route::resource`) no tiene vista — dará error si se accede directamente. No hay links que apunten ahí.

## 8) Cómo continuar (pasos exactos)
- Paso 1: `cd C:\laragon\www\aqua-anita`
- Paso 2: Iniciar servidor: `C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe artisan serve`
- Paso 3: Abrir `http://localhost:8000` (sitio público) o `http://localhost:8000/admin` (panel admin)
- Paso 4: Login admin: `hola@rekobit.com` / `AquaAnita2026!`
- Paso 5: Si hay errores de BD o migraciones: `php artisan migrate`
- Paso 6: Si falta symlink de storage: `php artisan storage:link`
- Paso 7: Si necesitas limpiar caches: `php artisan config:clear; php artisan cache:clear; php artisan view:clear`

---

**Última actualización: 16 de febrero de 2026 (sesión 3)**
**Cambios sesión 3:** APP_NAME→Aqua-Anita, APP_LOCALE→es, registro público deshabilitado, Aviso de Privacidad creado (/privacidad), checkbox privacidad en formulario contacto, imágenes hero convertidas a WebP con `<picture>` fallback, archivos huérfanos Breeze eliminados, enlace privacidad en footer.
