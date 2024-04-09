<?php

namespace App\Exports;

use App\Models\Solicitud;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SolicitudExport implements FromCollection, WithHeadings
{
    protected $solicitudes;

    public function __construct($solicitudes)
    {
        $this->solicitudes = $solicitudes;
    }

    public function collection()
    {
        return $this->solicitudes;
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Email',
            'Tipo de Persona',
            'Nombre de la Empresa',
            'Dependencia',
            'Opción',
            'Solicitud',
            'Identificación',
            'Teléfono',
            'Tipo de Solicitud',
            'Método de Respuesta',
            'Plazo de Respuesta',
        ];
    }
}
