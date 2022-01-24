<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plato;

class PlatosController extends Controller
{
    public function index(Request $request)
    {

        session(['lastPlateId' => 0]);

        // Inicialización de variables

        // Traemos todos los platos de la base de datos
        $allPlatosQuery = Plato::get();

        // Para la sección de platos de primera traemos los platos del array desde
        // la posición 0 hasta la 15 -> 16 platos en total
        $firstPlate = 0;
        $lastPlate = 15;

        $platos = array();
        $allPlatos = array();
        $removePlates = array();

        do {

            $platos = [];
            $allPlatos = [];

            // Creamos un bucle para guardar los 16 primeros del array de todos los platos
            // en un array nuevo
            for($i=$firstPlate; $i <= $lastPlate; $i++) {
                $allPlatos[$i] = $allPlatosQuery[$i];
            }

            // Reiniciamos las keys del array de platos
            $allPlatos = array_values($allPlatos);

            // Creamos un bucle para recorrer el array de los 16 platos y separarlos en pares
            // de dos platos para diferenciar sus distintos tamaños y si están o no activos
            for($i=0; $i < count($allPlatos); $i++) {

                if($i%2==0) {

                    $subPlatos = [];

                    // Si el plato está activo lo guardamos pero si no la posición del array
                    // será null
                    if($allPlatos[$i]->active == 1) {
                        $subPlatos[0] = $allPlatos[$i];
                    } else {
                        $subPlatos[0] = null;
                    }

                }

                if($i%2==1) {

                    // Si el plato está activo lo guardamos pero si no la posición del array
                    // será null
                    if($allPlatos[$i]->active == 1) {
                        $subPlatos[1] = $allPlatos[$i];
                    } else {
                        $subPlatos[1] = null;
                    }
                    // Guardamos el array de los dos platos en el array de platos general
                    array_push($platos, $subPlatos);
                }

            }
            $platos = array_values($platos);

            // Si los dos platos son null entonces borramos esta posición del array

            $removePlates = [];
            for($i=0; $i < count($platos); $i++) {
                if($platos[$i][0] == null AND $platos[$i][1] == null) {
                    array_push($removePlates, $i);
                }
            }
            foreach($removePlates as $i){
                unset($platos[$i]);
            }

            // Sumamos dos al último plato ya que si hay dos platos con null tendremos que traernos los
            // dos siguientes platos para volver a realizar la separación de platos
            $lastPlate = $lastPlate + 2;

        // Esto se realizará mientras que el array de platos sea menor que 8
        } while(count($platos)<8);

        // Si el array de platos es 8 entonces le restamos las dos posiciones porque no necesitamos recorrerlo de nuevo
        // y lo guardamos en la sesión
        $lastPlate = $lastPlate - 2;
        session(['lastPlateId' => $lastPlate]);

        // Reiniciamos las keys de los platos
        $platos = array_values($platos);

        // Retornamos los datos a la vista de platos
        return view('web.platos.index', compact('platos'));
    }

    public function scroll(Request $request)
    {

        // Inicializamos las variables

        $numPlatos = 15;
        $id = (int)$request->session()->get('lastPlateId') + 1;

        // Nos traemos todos los platos de la base de datos
        $allPlatosQuery = Plato::get();

        $platos = array();
        $allPlatos = array();
        $removePlates = array();

        do {

            // La última posición del array de platos totales será la id + la cantidad de platos que queremos guardar
            $endId = $id+$numPlatos;

            $platos = [];
            $allPlatos = [];

            // Si el tamaño del array de platos es mayor o igual a la primera posición que queremos recorrer quiere decir que
            // no hay más platos, entonces devolvemos el valor de $finishReload a true a la vista de platos.scroll
            // Si el count es 50 la posición máxima por recorrer será la 49
            if(count($allPlatosQuery) <= $id) {

                $finishReload = true;

                return view('web.platos.scroll', compact('platos', 'finishReload'));

            }

            // Guardamos los platos que necesitamos en la variable $allPlatos
            // Si el la cantidad de platos es mayor al $endId
            if(count($allPlatosQuery) - 1 > $endId){
                for($i = $id; $i <= $endId; $i++) {
                    $allPlatos[$i] = $allPlatosQuery[$i];
                }
            } else {
             // Si la cantidad es mayor pondremos como máximo el total - 1
                $endId = count($allPlatosQuery) - 1;
                for($i = $id; $i <= $endId; $i++) {
                    $allPlatos[$i] = $allPlatosQuery[$i];
                }
            }

            // Reiniciamos las Keys del array
            $allPlatos = array_values($allPlatos);

            // Si hay menos de 16 platos quiere decir que no hay más platos en el array general
            if(count($allPlatos)<16) {

                // Recorremos el array $allPlatos para guardar cada plato en pares de dos en la variable $platos
                for($i=0; $i < count($allPlatos); $i++) {

                    if($i%2==0) {

                        $subPlatos = [];

                        // Si el plato no está activo se guardará como null
                        if($allPlatos[$i]->active == 1) {
                            $subPlatos[0] = $allPlatos[$i];
                        } else {
                            $subPlatos[0] = null;
                        }

                    }

                    if($i%2==1) {
                        // Si el plato no está activo se guardará como null
                        if($allPlatos[$i]->active == 1) {
                            $subPlatos[1] = $allPlatos[$i];
                        } else {
                            $subPlatos[1] = null;
                        }
                        array_push($platos, $subPlatos);
                    }

                }

                // Si tenemos ambos platos inactivos los borraremos del array
                $removePlates = [];
                for($i=0; $i < count($platos); $i++) {
                    if($platos[$i][0] == null AND $platos[$i][1] == null) {
                        array_push($removePlates, $i);
                    }
                }
                foreach($removePlates as $i){
                    unset($platos[$i]);
                }

                $finishReload = true;

                return view('web.platos.scroll', compact('platos', 'finishReload'));
            }

            // Recorremos el array $allPlatos para guardarlos en pares en el array $platos
            for($i=0; $i < count($allPlatos); $i++) {

                if($i%2==0) {

                    $subPlatos = [];

                    // Si el plato no está activo se guardará como null
                    if($allPlatos[$i]->active == 1) {
                        $subPlatos[0] = $allPlatos[$i];
                    } else {
                        $subPlatos[0] = null;
                    }

                }

                if($i%2==1) {
                    // Si el plato no está activo se guardará como null
                    if($allPlatos[$i]->active == 1) {
                        $subPlatos[1] = $allPlatos[$i];
                    } else {
                        $subPlatos[1] = null;
                    }
                    array_push($platos, $subPlatos);
                }

            }

            // Si ambos platos no están activos los borraremos del array $platos
            $removePlates = [];
            for($i=0; $i < count($platos); $i++) {
                if($platos[$i][0] == null AND $platos[$i][1] == null) {
                    array_push($removePlates, $i);
                }
            }
            foreach($removePlates as $i){
                unset($platos[$i]);
            }

            // Sumaremos dos al numero de platos para traernos dos platos más
            $numPlatos = $numPlatos + 2;

        // Esto se mantendrá mientras que el número de platos sea menor a 8
        } while(count($platos)<8);

        // Reiniciamos las keys del array $platos
        $platos = array_values($platos);

        // Le restamos 2 al numero de platos recorridos ya que tenemos los 8 platos y guardamos en la
        // variable $lastPlateId el valor del último valor recogido para guardarlo en la sesión
        $numPlatos = $numPlatos - 2;
        $lastPlateId = $numPlatos + $id;
        session(['lastPlateId' => $lastPlateId]);

        // Devolvemos los datos a la vista platos.scroll
        return view('web.platos.scroll', compact('platos'));
    }

    public function addToCart()
    {
    }
}
