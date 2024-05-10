<?php

namespace App\Livewire;

use Livewire\Component;

class DeleteUserModal extends Component
{
    public $user; 
    public function render()
    {
        return view('livewire.delete-user-modal');
    }

    public function performDelete()
    {
        try {
            $this->user->workSpaces()->detach();
            $this->user->commands()->detach();
            $this->user->delete();
            $this->dispatch('userDeleted');
            session()->flash('status', 'Usuario eliminado correctamente');

        } catch (\Throwable $th) {
            session()->flash('status', 'No ha sido posible eliminar el usuario');
        } 
    }
}
