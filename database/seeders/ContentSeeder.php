<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonio;
use App\Models\Clase;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Seed default testimonios
        if (Testimonio::count() === 0) {
            Testimonio::create([
                'nombre' => 'María G.',
                'rol' => 'Mamá de Sofía, 4 años',
                'texto' => 'Mi hijo tenía mucho miedo al agua y ahora la disfruta. Los instructores son muy pacientes y profesionales.',
                'estrellas' => 5,
                'activo' => true,
                'orden' => 1,
            ]);
            Testimonio::create([
                'nombre' => 'Roberto L.',
                'rol' => 'Papá de Diego, 6 años',
                'texto' => 'La metodología es excepcional. Mi hijo aprendió a nadar en solo 3 meses. Totalmente recomendado.',
                'estrellas' => 5,
                'activo' => true,
                'orden' => 2,
            ]);
            Testimonio::create([
                'nombre' => 'Andrea M.',
                'rol' => 'Alumna adulta',
                'texto' => 'Yo soy adulta y no sabía nadar. Gracias a Aqua-Anita perdí el miedo y ahora nado con confianza.',
                'estrellas' => 5,
                'activo' => true,
                'orden' => 3,
            ]);
        }

        // Seed the 3 class types
        if (Clase::count() === 0) {
            Clase::create([
                'nombre' => 'Clases Grupales',
                'slug' => 'clases-grupales',
                'descripcion' => "Aprende a nadar en un ambiente motivador y divertido junto a compañeros de tu mismo nivel.\n\n✅ Grupos reducidos de máximo 6 alumnos\n✅ Clasificación por nivel y edad\n✅ Desarrollo de habilidades sociales\n✅ Ambiente seguro y supervisado\n✅ Precios accesibles para toda la familia\n✅ Horarios flexibles de lunes a sábado",
                'icono' => 'fas fa-users',
                'activo' => true,
                'orden' => 1,
            ]);
            Clase::create([
                'nombre' => 'Clases Individuales',
                'slug' => 'clases-individuales',
                'descripcion' => "Atención 100% personalizada con un instructor dedicado exclusivamente a tu progreso.\n\n✅ Instructor exclusivo para ti\n✅ Ritmo adaptado a tus necesidades\n✅ Horario completamente flexible\n✅ Progreso acelerado garantizado\n✅ Corrección técnica precisa\n✅ Ideal para superar miedos o fobias al agua",
                'icono' => 'fas fa-user',
                'activo' => true,
                'orden' => 2,
            ]);
            Clase::create([
                'nombre' => 'Matronatación',
                'slug' => 'matronatacion',
                'descripcion' => "Un vínculo especial entre mamá/papá y bebé a través del agua. Estimulación acuática temprana para los más pequeños.\n\n✅ Para bebés desde 6 meses hasta 3 años\n✅ Acompañamiento de mamá o papá en el agua\n✅ Estimulación motriz y sensorial\n✅ Fortalecimiento del vínculo afectivo\n✅ Desarrollo de confianza en el medio acuático\n✅ Instructores especializados en estimulación temprana",
                'icono' => 'fas fa-baby',
                'activo' => true,
                'orden' => 3,
            ]);
        }
    }
}
