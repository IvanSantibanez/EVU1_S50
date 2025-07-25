<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class UfController extends Controller
{

    // Método para obtener la UF actual desde el API de mindicador.cl
    // Si se obtiene correctamente, retornamos la UF en formato JSON
    // Si falla, retornamos el JSON con la UF como null
    public function getUf()
    {
        $baseUrl = 'https://mindicador.cl';

        $response = Http::get($baseUrl . '/api');
        if ($response->successful()) {
            $uf = $response->json()['uf'];
            return response()->json([
                'success' => true,
                'uf' => $uf
            ]);
        } else {
            $uf = null;
             return response()->json([
                'success' => false,
                'uf' => $uf
            ]);
        }
    }
}
