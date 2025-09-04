<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;


class ProyectoVistasController extends Controller

{
    // Método para obtener la lista de proyectos desde la lista creada
    // y retornar la vista correspondiente
    public function getProyectos()
    {
        $proyectos = Proyecto::orderBy('fechaInicio', 'desc')->get();
        return view('get-proyectos', compact('proyectos'));
    }

    // Método que obtiene un proyecto específico por su ID
    public function getProyecto($id)
    {

        $proyecto = Proyecto::find($id);
        if ($proyecto) {
            return view('get-proyecto', compact('proyecto'));
        }
        return view('error', compact('id'));
    }

    // Método para crear un nuevo proyecto, recibiendo los datos como Request
    public function postProyecto(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'fechaInicio' => 'required|date',
            'estado' => 'required|string|max:100',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0|max:999999999',
        ]);
        $data['created_by'] = $request->user()->id;

        $proyecto = Proyecto::create($data);
        return redirect()->route('proyectos.create')->with('success_project', [
            'message' => 'Proyecto creado exitosamente.',
            'data' => $proyecto
        ]);
    }

    public function getVistaCrearProyecto()
    {
        return view('post-proyecto');
    }

    // Método para eliminar un proyecto por su ID (utizando la lista creada como ejemplo)
    public function deleteProyecto($id)
    {
        $proyecto = Proyecto::find($id);
        if ($proyecto) {
            $proyecto->delete();
            return view('delete-proyecto', compact('proyecto'));
        }
        return view('error', compact('id'));
    }

    public function getVistaEditarProyecto($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('put-proyecto', compact('proyecto'));
    }

    // Método para actualizar un proyecto por su ID (utilizando la lista creada como ejemplo)
    public function putProyecto(Request $request, $id)
    {

        $proyecto = Proyecto::findOrFail($id);
        if ($proyecto) {
            $request->validate([
                'nombre' => 'sometimes|required|string|max:255',
                'fechaInicio' => 'sometimes|required|date',
                'estado' => 'sometimes|required|string|max:100',
                'responsable' => 'sometimes|required|string|max:255',
                'monto' => 'sometimes|required|numeric|min:0|max:999999999',
            ]);
            $proyecto->update($request->all());
            return redirect()->route('proyectos.edit', $proyecto->id)->with('success_project', [
                'message' => 'Proyecto actualizado exitosamente.',
                'data' => $proyecto
            ]);
        }
        return view('error', compact('id'));
    }
}
