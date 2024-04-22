<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

}
