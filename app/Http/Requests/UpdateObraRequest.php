<?php

/**
 * ============================================
 * SOLICITUD DE ACTUALIZACIÓN DE OBRA (UpdateObraRequest)
 * ============================================
 * 
 * Clase FormRequest encargada de validar los datos enviados
 * al actualizar una obra existente.
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateObraRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     * 
     * @return bool True si está autorizado, False en caso contrario.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que aplican a la solicitud.
     * 
     * Reglas aplicadas:
     * - nombre_obra: Requerido, string, máx 255
     * - descripcion: Requerido, texto libre
     * - tecnica: Requerido, string, máx 100
     * - dimensiones: Requerido, string, máx 50
     * - fecha_creacion: Requerida, formato fecha válido
     * - categoria: Requerido, string, máx 100
     * - imagen_url: Requerido, formato URL válido
     * - herramientas_usadas: Requerido, texto
     * - visible: Opcional, formato booleano
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre_obra' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tecnica' => 'required|string|max:100',
            'dimensiones' => 'required|string|max:50',
            'fecha_creacion' => 'required|date',
            'categoria' => 'required|string|max:100',
            'imagen_url' => 'required|url',
            'herramientas_usadas' => 'required|string',
            'visible' => 'sometimes|boolean',
        ];
    }
}
