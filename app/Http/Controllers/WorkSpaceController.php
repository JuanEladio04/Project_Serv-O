<?php

namespace App\Http\Controllers;

use App\Models\WorkSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WorkSpaceRequest;
use Illuminate\Database\QueryException;

class WorkSpaceController extends Controller
{
    /**
     * 
     */
    public function create()
    {
        return view('workSpace.create');
    }
    public function store(WorkSpaceRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validated();
            $newWorkSpace = new WorkSpace;
            $newWorkSpace->name = $validatedData['name'];
            $newWorkSpace->description = $validatedData['description'];

            $newWorkSpace->save();
            Auth::user()->workSpaces()->attach($newWorkSpace, [
                'wk_role' => 'creator', 
            ]);

            DB::commit();
            return redirect()->route('index')->with('status', 'Espacio de trabajo creado correctamente');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('index')->with('status', 'No ha sido posible crear espacio de trabajo: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkSpace  $workSpace
     * @return \Illuminate\Http\Response
     */
    public function show(WorkSpace $workSpace)
    {
        // Mostrar un espacio de trabajo específico
        return response()->json($workSpace);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkSpace  $workSpace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkSpace $workSpace)
    {
        // Validar la solicitud
        $request->validate([
            // Agrega aquí las reglas de validación según tus necesidades
        ]);

        // Actualizar el espacio de trabajo
        $workSpace->update($request->all());

        return response()->json($workSpace, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkSpace  $workSpace
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkSpace $workSpace)
    {
        // Eliminar el espacio de trabajo
        $workSpace->delete();

        return response()->json(null, 204);
    }
}
