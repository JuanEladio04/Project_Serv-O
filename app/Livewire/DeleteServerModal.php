<?php

namespace App\Livewire;

use Livewire\Component;

class DeleteServerModal extends Component
{
    public $server;

    public function render()
    {
        return view('livewire.delete-server-modal');
    }

    /**
     * Delete the server
     *
     */
    public function performDelete()
    {
        try {
            $this->server->delete();
            $this->server->services()->detach();
            return redirect()->route('workSpace.show', [$this->server->workSpace->id])->with('status', 'Servidor eliminado correctamente.');

        } catch (\Throwable $th) {
            session()->flash('status', 'No ha sido posible eliminar el servidor');
        }
    }
    
}
