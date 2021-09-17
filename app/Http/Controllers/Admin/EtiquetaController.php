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

        if($valor == 'M'){

            $datosPlato = [
                'nombre' => strtoupper($plato->nombre),
                'ingredientes' => $plato->ingredientes,
                'alergenos' => $alergenosPlato,
                'receta' => $plato->receta,
                'peso' => 350,
                'energia' => $plato->calorias,
                'grasas' => $plato_info_nutricional->grasas,
                'saturadas' => $plato_info_nutricional->saturadas,
                'carbohidratos' => $plato_info_nutricional->carbohidratos,
                'azucares' => $plato_info_nutricional->azucar,
                'proteinas' => $plato_info_nutricional->proteinas,
                'sales' => $plato_info_nutricional->sodio,
                'fibra' => $plato_info_nutricional->fibra,
                'energia_cien' => round(($plato->calorias*100)/350, 2),
                'grasas_cien' => round(($plato_info_nutricional->grasas*100)/350, 2),
                'saturadas_cien' => round(($plato_info_nutricional->saturadas*100)/350, 2),
                'carbohidratos_cien' => round(($plato_info_nutricional->carbohidratos*100)/350, 2),
                'azucares_cien' => round(($plato_info_nutricional->azucar*100)/350, 2),
                'proteinas_cien' => round(($plato_info_nutricional->proteinas*100)/350, 2),
                'sales_cien' => round(($plato_info_nutricional->sodio*100)/350, 2),
                'fibra_cien' => round(($plato_info_nutricional->fibra*100)/350, 2),

            ];

        } else if($valor == 'L'){

            $datosPlato = [
                'nombre' => strtoupper($plato->nombre),
                'ingredientes' => $plato->ingredientes,
                'alergenos' => $alergenosPlato,
                'receta' => $plato->receta,
                'peso' => 560,
                'energia' => $plato->calorias,
                'grasas' => $plato_info_nutricional->grasas,
                'saturadas' => $plato_info_nutricional->saturadas,
                'carbohidratos' => $plato_info_nutricional->carbohidratos,
                'azucares' => $plato_info_nutricional->azucar,
                'proteinas' => $plato_info_nutricional->proteinas,
                'sales' => $plato_info_nutricional->sodio,
                'fibra' => $plato_info_nutricional->fibra,
                'energia_cien' => round(($plato->calorias*100)/560, 2),
                'grasas_cien' => round(($plato_info_nutricional->grasas*100)/560, 2),
                'saturadas_cien' => round(($plato_info_nutricional->saturadas*100)/560, 2),
                'carbohidratos_cien' => round(($plato_info_nutricional->carbohidratos*100)/560, 2),
                'azucares_cien' => round(($plato_info_nutricional->azucar*100)/560, 2),
                'proteinas_cien' => round(($plato_info_nutricional->proteinas*100)/560, 2),
                'sales_cien' => round(($plato_info_nutricional->sodio*100)/560, 2),
                'fibra_cien' => round(($plato_info_nutricional->fibra*100)/560, 2),
            ];

        }

        return PDF::loadView('pdf.etiquetas', $datosPlato)->setPaper('a4', 'portrait')->stream('etiqueta.pdf');
    }
}
