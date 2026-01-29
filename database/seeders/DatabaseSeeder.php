<?php

/**
 * ============================================
 * SEEDER DE BASE DE DATOS (DatabaseSeeder)
 * ============================================
 * 
 * Clase principal encargada de poblar la base de datos con datos de prueba o iniciales.
 * 
 * Funcionalidad:
 * - Crear un usuario administrador por defecto.
 * - Crear obras de ejemplo asociadas a este usuario.
 */

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Obra;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ============================================
        // PASO 1: CREAR USUARIO ADMINISTRADOR
        // ============================================
        /**
         * Creamos un usuario específico para pruebas o acceso inicial.
         * Credenciales:
         * - Email: admin@test.com
         * - Password: password123
         */
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        // ============================================
        // PASO 2: CREAR OBRAS DE EJEMPLO
        // ============================================

        /**
         * OBRA 1: Dibujo Digital (Recuperada del entorno local)
         */
        Obra::create([
            'user_id' => $user->id,
            'nombre_obra' => 'Dibujo Digital',
            'descripcion' => 'Retrato de personaje original creado digitalmente con técnicas de ilustración moderna.',
            'tecnica' => 'Digital',
            'dimensiones' => '1920x1080px',
            'fecha_creacion' => '2024-09-15',
            'categoria' => 'Personaje',
            'imagen_url' => 'https://avatars.githubusercontent.com/u/232652974?v=4',
            'herramientas_usadas' => 'Photoshop, Krita, XP-PEN Tablet',
            'visible' => true,
        ]);

        /**
         * OBRA 2: La Noche Estrellada (Ejemplo Clásico)
         */
        Obra::create([
            'user_id' => $user->id,
            'nombre_obra' => 'La Noche Estrellada',
            'descripcion' => 'Una de las obras más famosas de Van Gogh, representando la vista desde la ventana de su asilo en Saint-Rémy-de-Provence.',
            'tecnica' => 'Óleo sobre lienzo',
            'dimensiones' => '73.7 cm × 92.1 cm',
            'fecha_creacion' => '1889-06-01',
            'categoria' => 'Postimpresionismo',
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg/1200px-Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg',
            'herramientas_usadas' => 'Pinceles, Pintura al óleo, Espátula',
            'visible' => true,
        ]);
    }
}
