<?php

/**
 * ============================================
 * MIGRACIÓN DE OBRAS (CreateObrasTable)
 * ============================================
 * 
 * Esta migración define la estructura de la tabla 'obras' en la base de datos.
 * Se encarga de crear las columnas necesarias para almacenar la información
 * de las piezas artísticas del portafolio.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     * Crea la tabla 'obras' con sus respectivas columnas.
     */
    public function up(): void
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id();                                   // ID Auto-incremental
            $table->string('nombre_obra');                  // Título de la obra
            $table->text('descripcion');                    // Descripción detallada
            $table->string('tecnica');                      // Técnica usada
            $table->string('dimensiones');                  // Medidas
            $table->date('fecha_creacion');                 // Fecha de realización
            $table->string('categoria');                    // Categoría artística
            $table->string('imagen_url');                   // URL de la imagen
            $table->text('herramientas_usadas');            // Herramientas software/físicas
            $table->boolean('visible')->default(true);      // Visibilidad (Default: Visible)

            // Llave foránea vinculada a la tabla users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->timestamps();                           // created_at y updated_at
        });
    }

    /**
     * Revierte las migraciones.
     * Elimina la tabla 'obras' si existe.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
