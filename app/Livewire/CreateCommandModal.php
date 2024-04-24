<?php

namespace App\Livewire;

use App\Models\Command;
use Livewire\Component;

class CreateCommandModal extends Component
{
    public $showModal = false;
    public $service;
    public $statusMessage;
    public $name;
    public $description;
    public $command;
    public $operation;

    public function render()
    {
        return view('livewire.create-command-modal');
    }

    /**
     * Add a new command to the system
     *
     */
    public function performInsert()
    {
        $this->showModal = true;

        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'command' => 'required|string',
            'operation' => 'required|string',
        ]);

        try {
            $newCommand = new Command;
            $newCommand->name = $this->name;
            $newCommand->description = $this->description;
            $newCommand->command = $this->command;
            $newCommand->operation = $this->operation;
            $newCommand->service()->associate($this->service);

            $newCommand->save();

            $this->render();
            $this->dispatch('reloadCommands');
            $this->statusMessage = 'Comando añadido correctamente.';
            $this->resetInputFields();
        } catch (\Throwable $th) {
            $this->statusMessage = 'No ha sido posible registrar el comando.';
        }
    }

    /**
     * Reset the input fields
     */
    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->command = '';
        $this->operation = '';
    }

}
