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
1. **Crear repo en GitHub** (privado) y pushear el código — ver sección 9
2. **Configurar Coolify** para deploy automático — ver sección 9
3. **Subir imágenes reales a las 3 clases** desde el admin (`/admin/clases` → Editar cada una)
4. **Coordenadas exactas de Google Maps** — las actuales son aproximadas
5. **Comprar/configurar dominio** y apuntar DNS al VPS de Coolify
6. **Cambiar contraseña admin** antes de producción

## 7) Problemas conocidos / Riesgos
- `package.json` tiene Tailwind/Vite/Alpine configurados pero **NO se usan**. No borrar por si se necesitan después, pero no ejecutar `npm run dev/build`.
- Vite/Tailwind config files (`tailwind.config.js`, `vite.config.js`, `postcss.config.js`) quedan huérfanos.
- La contraseña del admin (`AquaAnita2026!`) está en texto plano solo en el historial — cambiarla si se va a producción.
- `.env` tiene credenciales SMTP reales — **nunca commitear a git público**.
- El `show` de `admin/testimonios` y `admin/clases` (auto-generados por `Route::resource`) no tiene vista — dará error si se accede directamente. No hay links que apunten ahí.
- **SQLite en Docker**: La BD debe vivir en un **volumen persistente** (`/var/www/html/database`), si no se pierde con cada redeploy. Coolify permite configurar esto.

## 8) Desarrollo local (pasos exactos)
- Paso 1: `cd C:\laragon\www\aqua-anita`
- Paso 2: Agregar Git al PATH: `$env:PATH = "C:\laragon\bin\git\cmd;$env:PATH"`
- Paso 3: Iniciar servidor: `C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe artisan serve`
- Paso 4: Abrir `http://localhost:8000` (sitio público) o `http://localhost:8000/admin` (panel admin)
- Paso 5: Login admin: `hola@rekobit.com` / `AquaAnita2026!`
- Paso 6: Si hay errores de BD o migraciones: `php artisan migrate`
- Paso 7: Si falta symlink de storage: `php artisan storage:link`
- Paso 8: Si necesitas limpiar caches: `php artisan config:clear; php artisan cache:clear; php artisan view:clear`

## 9) Deploy en Coolify v4 (guía paso a paso)

### Paso A — Crear repositorio en GitHub
1. Ir a https://github.com/new
2. Nombre: `aqua-anita` | Privado: ✅ | NO inicializar con README
3. Copiar la URL del repo (ej: `https://github.com/TU_USUARIO/aqua-anita.git`)
4. En terminal local:
```bash
$env:PATH = "C:\laragon\bin\git\cmd;$env:PATH"
cd C:\laragon\www\aqua-anita
git remote add origin https://github.com/TU_USUARIO/aqua-anita.git
git push -u origin main
```

### Paso B — Conectar Coolify con GitHub
1. En Coolify dashboard → **Sources** → **+ New Source** → **GitHub App**
2. Seguir el wizard para crear una GitHub App (autoriza acceso al repo `aqua-anita`)
3. Una vez conectado, el repo aparecerá en la lista

### Paso C — Crear el servicio en Coolify
1. **Projects** → **+ New Project** → Nombre: "Aqua-Anita"
2. **+ New Resource** → **Docker Based** → **Dockerfile**
3. Seleccionar el repo `aqua-anita`, branch `main`
4. Coolify detectará el `Dockerfile` automáticamente

### Paso D — Configurar variables de entorno
En Coolify → tu servicio → **Environment Variables**, agregar:
```
APP_NAME=Aqua-Anita
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com   (o la URL temporal de Coolify)
APP_LOCALE=es
DB_CONNECTION=sqlite
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
LOG_CHANNEL=stack
LOG_LEVEL=warning
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=hola@rekobit.com
MAIL_PASSWORD=sbuepbiaeppmzfry
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hola@rekobit.com
MAIL_FROM_NAME=Aqua-Anita Web
ADMIN_EMAIL=hola@rekobit.com
ADMIN_PASSWORD=AquaAnita2026!
```

### Paso E — Configurar volumen persistente (CRÍTICO)
En Coolify → tu servicio → **Storages / Volumes**:
- **Source:** un nombre como `aqua-anita-database`
- **Destination:** `/var/www/html/database`
- Esto mantiene la BD SQLite entre redeploys

También agregar volumen para imágenes subidas:
- **Source:** `aqua-anita-storage`
- **Destination:** `/var/www/html/storage/app/public`

### Paso F — Configurar dominio (cuando lo tengas)
1. En Coolify → tu servicio → **General** → **Domains**: `https://tu-dominio.com`
2. Coolify genera SSL automáticamente con Let's Encrypt
3. Apuntar DNS: Registro A → IP de tu VPS

### Paso G — Deploy
1. Click en **Deploy** → Coolify construye la imagen Docker y la ejecuta
2. El `entrypoint.sh` automáticamente: crea BD, migra, siembra datos, crea admin, cachea
3. Verificar en `https://tu-url/admin` → Login con las credenciales configuradas

### Paso H — Configuración de red en Coolify (CRÍTICO)
- **Ports Exposes**: `80` (NO 8080 — Apache escucha en 80)
- **Port Mappings**: dejar vacío (Traefik se encarga)
- Si pone "Bad Gateway" es porque el puerto expuesto no coincide con el del contenedor

## 10) Archivos de deploy (referencia rápida)
```
aqua-anita/
├── Dockerfile                    ← Single-stage: PHP 8.3-apache (build rápido)
├── docker/
│   ├── entrypoint.sh             ← Auto: crea .env, genera APP_KEY, migra, siembra, crea admin, cachea
│   └── php.ini                   ← Config PHP producción (10MB upload, opcache)
├── .dockerignore                 ← Excluye node_modules, vendor, tests, etc.
├── .env.production               ← Ejemplo de variables (NO se sube a Git)
└── .gitignore                    ← Excluye .env, database.sqlite, vendor, etc.
```

## 11) Problemas resueltos en deploy (bitácora)
1. **Build timeout**: Dockerfile multi-stage compilaba extensiones 2 veces → reescrito a single-stage
2. **`.env` no existe**: Coolify inyecta env vars al contenedor, no archivo → entrypoint crea `.env` desde `env | grep`
3. **Espacios en valores** (`MAIL_FROM_NAME=Aqua-Anita Web`): Parser dotenv falla → valores entrecomillados con `sed`
4. **`APP_KEY` vacía**: `key:generate` requiere línea `APP_KEY=` en `.env` → entrypoint la agrega si falta
5. **Seeder no corría**: Dependía solo de `FRESH_DB` pero volumen persistía BD vieja → ahora verifica `User::count()==0`
6. **Bad Gateway**: Coolify tenía `Ports Exposes=8080` pero Apache escucha en `80` → cambiar a `80`

---

**Última actualización: 17 de febrero de 2026 (sesión 5)**
**Cambios sesión 3:** APP_NAME→Aqua-Anita, APP_LOCALE→es, registro público deshabilitado, Aviso de Privacidad creado (/privacidad), checkbox privacidad en formulario contacto, imágenes hero convertidas a WebP con `<picture>` fallback, archivos huérfanos Breeze eliminados, enlace privacidad en footer.
**Cambios sesión 4:** Dockerfile multi-stage (PHP 8.3 + Apache), entrypoint.sh con auto-migración/seed/admin, docker/php.ini, .dockerignore, .env.production ejemplo, repo Git inicializado (branch main), guía completa de deploy en Coolify v4 agregada a este archivo.
**Cambios sesión 5:** Deploy exitoso en Coolify v4. Dockerfile reescrito a single-stage. Entrypoint mejorado: crea `.env` con valores entrecomillados desde env vars del contenedor, genera `APP_KEY` si falta, siembra datos si `User::count()==0`. Corregido puerto (80 no 8080). Sitio en producción funcionando.
