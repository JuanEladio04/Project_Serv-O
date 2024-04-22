<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\WorkSpace;
use Illuminate\Http\Request;
use App\Helpers\EncryptionHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ServerRequest;
use Illuminate\Database\QueryException;

class ServerController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(int $id)
    {
        try {
            $server = Server::find($id);
            if ($server) {
                return view('server.show', compact('server'));
            } else {
                session()->flash('status', 'El servidor no existe.');
                return redirect()->route('index');
            }
        } catch (\Throwable $th) {
            session()->flash('status', 'No ha sido posible cargar el servidor.');
            return redirect()->route('index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(int $id)
    {
        try {
            $server = Server::find($id);
            $encryptionHelper = new EncryptionHelper();
            $server->password = $encryptionHelper->decryptPassword($server->password, env('ENCRYPTION_KEY'));
            if ($server) {
                return view('server.edit', compact('server'));
            } else {
                session()->flash('status', 'El servidor no existe.');
                return redirect()->route('index');
            }
        } catch (\Throwable $th) {
            session()->flash('status', 'No ha sido posible cargar el servidor.');
            return redirect()->route('index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ServerRequest  $request
     * @param  \App\Models\Server  $server
     */
    public function update(ServerRequest $request, Server $server)
    {
        DB::beginTransaction();

        $validatedData = $request->validated();
        $server->name = $validatedData['name'];
        $server->server_dir = $validatedData['server_dir'];
        $server->user_root = $validatedData['user_root'];
        $encryptionHelper = new EncryptionHelper();
        $server->password = $encryptionHelper->encryptPassword($validatedData['password'], env('ENCRYPTION_KEY'));
        $server->description = $validatedData['description'];

        $server->save();

        DB::commit();
        return redirect()->route('server.show', [$server->id])->with('status', 'Servidor actualizado correctamente.');

    }

}
