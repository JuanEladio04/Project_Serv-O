<?php

namespace App\Http\Controllers;

use App\Models\WorkSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WorkSpaceRequest;
use Illuminate\Database\QueryException;

/**
 * Class WorkSpaceController
 * @package App\Http\Controllers
 */
class WorkSpaceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workSpace.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WorkSpaceRequest  $request
     * @return \Illuminate\Http\Response
     */
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
            return redirect()->route('index')->with('status', 'Espacio de trabajo creado correctamente.');

        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('index')->with('status', 'No ha sido posible crear espacio de trabajo.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $workSpace = WorkSpace::find($id);
            return view('workSpace.show', compact('workSpace'));
        } catch (\Throwable $th) {
            return redirect()->route('index');
            session()->flash('status', 'No ha sido posible cargar espacio de trabajo.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workSpace = WorkSpace::find($id);
        return view('workSpace.edit')->with('workSpace', $workSpace);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkSpaceRequest $request, $id)
    {
        try {
            $workSpace = WorkSpace::find($id);
            DB::beginTransaction();

            $validatedData = $request->validated();
            $workSpace->name = $validatedData['name'];
            $workSpace->description = $validatedData['description'];

            $workSpace->save();

            DB::commit();
            session()->flash('status', 'Espacio de trabajo actualizado correctamente');
            return redirect()->route('workSpace.show', [$workSpace->id]);
        } catch (QueryException $e) {
            DB::rollBack();
            session()->flash('status', 'No ha sido posible actualizar espacio de trabajo.');
            return redirect()->route('workSpace.show', [$workSpace->id]);
        }
    }

}