<?php

namespace App\Livewire;

use App\Http\Controllers\CommandController;
use App\Models\Command;
use Livewire\Component;

class ServiceStatus extends Component
{
    public $show;
    public $userRole;
    public $service;
    public $server;
    public $serviceStatus;
    public $selectedCommandId;
    public $selectedCommand;
    public $arguments;
    public $commandOutput;


    public function render()
    {
        $this->getServiceStatus();
        $commands = $this->service->commands()->get();
        return view('livewire.service-status')->with('commands', $commands);
    }

    /**
     * Toggles the visibility of the menu
     *
     * @return void
     */
    public function toggleMenu()
    {
        $this->show = !$this->show;
    }

    /**
     * Parses the selected command
     *
     * @return void
     */
    public function parseCommand()
    {
        if ($this->selectedCommandId != null) {
            $this->selectedCommand = Command::find($this->selectedCommandId);
        }
    }

    /**
     * Get the service status
     *
     * @return void
     */
    public function getServiceStatus()
    {
        $this->serviceStatus = $this->service->status($this->server);
    }

    /**
     * Execute the selected command
     *
     * @return void
     */
    public function executeCommand()
    {
        $commandController = new CommandController();
        $this->commandOutput = $commandController->executeCommand($this->server, $this->selectedCommand, $this->arguments);
        $this->reset('arguments');
        $this->render();
    }

    public function removeService()
    {
        try {
            $this->server->services()->detach($this->service);
            $this->dispatch('serviceRemovedFromServer');
            session()->flash('status', 'Servicio removido del servidor.');
        } catch (\Throwable $th) {
            session()->flash('status', 'No ha sido posible remover el servicio del servidor.');
        }
    }

}
