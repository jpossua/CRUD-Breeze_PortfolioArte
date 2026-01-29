<?php

/**
 * ============================================
 * MODELO DE OBRA (Obra)
 * ============================================
 * 
 * Este modelo representa la tabla de obras en la base de datos.
 * Gestiona la información de las piezas artísticas del portafolio.
 * 
 * Atributos principales:
 * - nombre_obra: Título de la obra
 * - descripcion: Detalle descriptivo de la pieza
 * - tecnica: Técnica artística utilizada (óleo, digital, etc.)
 * - dimensiones: Tamaño físico o resolución
 * - fecha_creacion: Fecha de finalización
 * - categoria: Categoría artística (Retrato, Paisaje, etc.)
 * - imagen_url: Enlace a la imagen visual de la obra
 * - herramientas_usadas: Lista de herramientas o software
 * - visible: Estado de visibilidad (1: Visible, 0: Oculto)
 * - user_id: ID del usuario propietario (FK)
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    /** @use HasFactory<\Database\Factories\ObraFactory> */
    use HasFactory;

    /**
     * Atributos asignables masivamente
     * @var array
     */
    protected $fillable = [
        'nombre_obra',
        'descripcion',
        'tecnica',
        'dimensiones',
        'fecha_creacion',
        'categoria',
        'imagen_url',
        'herramientas_usadas',
        'visible',
        'user_id',
    ];

    /**
     * Conversión de tipos de atributos
     * @var array
     */
    protected $casts = [
        'fecha_creacion' => 'date',
        'visible' => 'boolean',
    ];

    /**
     * Relación con el usuario propietario de la obra.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
