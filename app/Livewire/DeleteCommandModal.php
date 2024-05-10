<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class DeleteCommandModal extends Component
{
    public $command;

    public function render()
    {
        return view('livewire.delete-command-modal');
    }

    /**
     * Delete the current command
     *
     */
    public function performDelete()
    {
        try {
            $this->command->delete();
            $this->dispatch('reloadCommands');
            session()->flash('status', 'Comando eliminado correctamente');

        } catch (\Throwable $th) {
            session()->flash('status', 'No ha sido posible eliminar el comando');
        } 
    }
}
