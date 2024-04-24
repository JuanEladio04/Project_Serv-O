<?php

namespace App\Livewire;

use Livewire\Component;

class EditCommandModal extends Component
{
    public $showModal;
    public $command;
    public $statusMessage;
    public $name;
    public $description;
    public $operation;
    public $commandStr;


    public function mount()
    {
        $this->name = $this->command->name;
        $this->description = $this->command->description;
        $this->operation = $this->command->operation;
        $this->commandStr = $this->command->command;

    }

    public function render()
    {
        return view('livewire.edit-command-modal');
    }

    public function performUpdate()
    {
        $this->showModal = true;

        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'commandStr' => 'required|string',
            'operation' => 'required|string',
        ]);

        try {
            $this->command->name = $this->name;
            $this->command->description = $this->description;
            $this->command->operation = $this->operation;
            $this->command->command = $this->commandStr;
            $this->command->save();
            $this->statusMessage = 'Comando actualizado con éxito.';
            $this->dispatch('reloadCommands');
        } catch (\Throwable $th) {
            $this->statusMessage = 'No ha sido posible actualizar el comando.';
        }
    }
}
