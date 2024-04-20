<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function show(int $id)
    {
        try {
            $server = Server::find($id);
            return view('server.show', compact('server'));
        } catch (\Throwable $th) {
            session()->flash('status', 'No ha sido posible cargar el servidor.');
            return redirect()->route('index');
        }
    }
}
