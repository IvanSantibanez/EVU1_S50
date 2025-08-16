<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller

{
    // Método para obtener la lista de proyectos desde la lista creada
    // y retornar la vista correspondiente
    public function getProyectos()
    {
        $proyectos = Proyecto::all();
        return view('get-proyectos', compact('proyectos'));
    }

    // Método que obtiene un proyecto específico por su ID
    public function getProyecto($id)
    {

        $proyecto = Proyecto::find($id);
        if ($proyecto) {
            return view('get-proyecto', compact('proyecto'));
        }else{
            return view('error', compact('id'));
        }
    }

    // Método para crear un nuevo proyecto, recibiendo los datos como Request
    public function postProyecto(Request $request)
    {
        $proyecto = new Proyecto();
        $proyecto->nombre = $request->input('nombre');
        $proyecto->fechaInicio = $request->input('fechaInicio');
        $proyecto->estado = $request->input('estado');
        $proyecto->responsable = $request->input('responsable');
        $proyecto->monto = $request->input('monto');
        $proyecto->created_by = $request->input('created_by');
        $proyecto->save();
        return view('post-proyecto', compact('proyecto'));
    }

    // Método para eliminar un proyecto por su ID (utizando la lista creada como ejemplo)
    public function deleteProyecto($id)
    {
        $proyecto = Proyecto::find($id);
        if ($proyecto) {
            $proyecto->delete();
            return view('delete-proyecto', compact('proyecto'));
        }else{
            return view('error', compact('id'));
        }
        return view('error', compact('id'));
    }

    // Método para actualizar un proyecto por su ID (utilizando la lista creada como ejemplo)
    public function putProyecto(Request $request, $id)
    {

        $proyecto = Proyecto::find($id);
        if ($proyecto){
             if ($request->has('nombre')) {
                    $proyecto['nombre'] = $request->input('nombre');
                }
                if ($request->has('fechaInicio')) {
                    $proyecto['fechaInicio'] = $request->input('fechaInicio');
                }
                if ($request->has('estado')) {
                    $proyecto['estado'] = $request->input('estado');
                }
                if ($request->has('responsable')) {
                    $proyecto['responsable'] = $request->input('responsable');
                }
                if ($request->has('monto')) {
                    $proyecto['monto'] = $request->input('monto');
                }
                $proyecto->save();
                return view('put-proyecto', compact('proyecto'));
        }
        return view('error', compact('id'));
    }
}
