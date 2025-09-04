<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{

    public function index()
    {
        $proyectos = Proyecto::orderBy('fechaInicio', 'desc')->get();

        if ($proyectos->isEmpty()) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'No se encontraron proyectos.'
            ], JsonResponse::HTTP_OK);
        }

        return response()->json([
            'success' => true,
            'data' => $proyectos,
            'message' => 'Lista de proyectos obtenida exitosamente.'
        ], JsonResponse::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'fechaInicio' => 'required|date',
            'estado' => 'required|string|max:100',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0|max:999999999',
        ]);

        $data['created_by'] = $request->user()->id;

        $nombre = Proyecto::where('nombre', $data['nombre'])->first();

        if ($nombre) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'El nombre del proyecto ya está registrado en el sistema.'
            ], JsonResponse::HTTP_CONFLICT);
        }

        try {
            $proyectos = Proyecto::create($data);
            return response()->json([
                'success' => true,
                'data' => $proyectos,
                'message' => 'Proyecto creado exitosamente.'
            ], JsonResponse::HTTP_CREATED);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'Error al crear el proyecto.'
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
