<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plato;
use Barryvdh\DomPDF\Facade as PDF;

class EtiquetaController extends Controller
{
    public function PDFEtiqueta(Request $request)
    {
        $plato = Plato::where('id', $request->id)->get()[0];

        $valor = $plato->plato_peso->valor;
        $plato_info_nutricional = $plato->plato_info_nutricional;

        $alergenosPlato = [];

        $alergenos = $plato->plato_alergeno;
        foreach($alergenos as $alergeno){
            array_push($alergenosPlato, $alergeno->nombre);
        }

            $datosPlato = [
                'nombre' => strtoupper($plato->nombre),
                'ingredientes' => $plato->ingredientes,
                'alergenos' => $alergenosPlato,
                'receta' => $plato->receta,
                'peso' => $plato->peso,
                'energia' => $plato->calorias,
                'grasas' => $plato_info_nutricional->grasas,
                'saturadas' => $plato_info_nutricional->saturadas,
                'carbohidratos' => $plato_info_nutricional->carbohidratos,
                'azucares' => $plato_info_nutricional->azucar,
                'proteinas' => $plato_info_nutricional->proteinas,
                'sales' => $plato_info_nutricional->sodio,
                'fibra' => $plato_info_nutricional->fibra,
                'energia_peso' => round($plato->calorias*($plato->peso/100), 2),
                'grasas_peso' => round($plato_info_nutricional->grasas*($plato->peso/100), 2),
                'saturadas_peso' => round($plato_info_nutricional->saturadas*($plato->peso/100), 2),
                'carbohidratos_peso' => round($plato_info_nutricional->carbohidratos*($plato->peso/100), 2),
                'azucares_peso' => round($plato_info_nutricional->azucar*($plato->peso/100), 2),
                'proteinas_peso' => round($plato_info_nutricional->proteinas*($plato->peso/100), 2),
                'sales_peso' => round($plato_info_nutricional->sodio*($plato->peso/100), 2),
                'fibra_peso' => round($plato_info_nutricional->fibra*($plato->peso/100), 2),
                'plato_peso' => $plato->plato_peso->valor

            ];

        return PDF::loadView('pdf.etiquetas', $datosPlato)->setPaper('a4', 'portrait')->stream('etiqueta.pdf');
    }
}
