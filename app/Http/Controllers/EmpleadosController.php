<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = DB::table('m_empleados')
            ->select('id', 'clave_empleado', 'nombre', 'edad', 'fecha_nacimiento', 'genero', 'sueldo_base')
            ->get();
        //$empleados = Empleado::all();
       // dd($empleados);
        return view('dashboard', ['empleadosList' => $empleados ]);
    }

    public function tableroEmpleados()
    {
        $empleados = DB::table('m_empleados')
            ->select('id', 'clave_empleado', 'nombre', 'edad', 'fecha_nacimiento', 'genero', 'sueldo_base')
            ->get();
        //$empleados = Empleado::all();
        // dd($empleados);
        return view('empleados.tabla-principal', ['empleadosList' => $empleados ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $empleado = DB::table('m_empleados')
            ->select('id', 'clave_empleado', 'nombre', 'sueldo_base')
            ->where('id', $id)
            ->first();

        try {
            $sueldoBase = $empleado->sueldo_base;
        }catch (\Exception $e){
            Log::info($e->getMessage());
            Log::info('Ocurrió un error al obtener el sueldo base');

           // return 'Ocurrió un error al obtener el sueldo base';
            return redirect()->back();
        }


        $proyeccion = [];
        $fechas = [];

        $meses = 18;
        $incremento = 0.04;
        $sueldoActual = $sueldoBase;

        for ($i = 0; $i <= $meses; $i++) {

            if ($i > 0 && $i % 4 == 0) {
                $sueldoActual *= (1 + $incremento);
            }

            $proyeccion[] = round($sueldoActual, 2);
            $fechas[] = Carbon::now()->addMonths($i)->format('M Y');
        }

        // Tipo de cambio (puedes dejarlo fijo si quieres)

        $currencies = $this->valorMoneda();
        $tipoCambio = end($currencies->bmx->series[0]->datos);
        $proyeccionUSD = array_map(fn($s) => round($s / $tipoCambio->dato, 2), $proyeccion);

        return view('empleados.proyeccion', compact(
            'empleado',
            'proyeccion',
            'proyeccionUSD',
            'fechas'
        ));
    }



    private function valorMoneda(){
        $wsMoneda = "https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos";
        $client = new Client();
        $headers = [
            'Bmx-Token' => 'fe93b098c004bc3d3945a07e5681c712368db01f00f1edb82d1de74d348486d9'
        ];
        $response = $client->request('GET', $wsMoneda, [
            // 'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);
        $responseBody = json_decode($response->getBody());
        return $responseBody;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function tableroPublico()
    {

    }
}
