<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class DeleteWorkSpaceModal extends Component
{
    public $showModal = false;
    public $workSpace;

    public function render()
    {
        return view('livewire.delete-work-space-modal');
    }

    public function performDelete(){
        try {
            $this->workSpace->delete();
            return redirect()->route('index')->with('status', 'Espacio de trabajo eliminado correctamente.');
        } catch (\Throwable $th) {
            
        }
    }
}
