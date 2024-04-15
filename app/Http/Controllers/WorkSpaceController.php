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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
            return redirect()->route('index')->with('status', 'Espacio de trabajo creado correctamente');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('index')->with('status', 'No ha sido posible crear espacio de trabajo: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        try {
            $workSpace = WorkSpace::find($id);
            return view('workSpace.show')->with('workSpace', $workSpace);
        } catch (\Throwable $th) {
            return redirect()->route('index')->with('status', 'No ha sido posible cargar espacio de trabajo: ' . $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
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
    public function update(WorkSpaceRequest $request, WorkSpace $workSpace)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validated();
            $workSpace->name = $validatedData['name'];
            $workSpace->description = $validatedData['description'];

            $workSpace->save();

            DB::commit();
            return redirect()->route('workSpace.show', [$workSpace->id])->with('status', 'Espacio de trabajo actualizado correctamente');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('workSpace.show', [$workSpace->id])->with('status', 'No ha sido posible espacio de trabajo: ' . $e->getMessage());
        }
    }

}