<?php

namespace App\Livewire;

use App\Models\Command;
use Livewire\Component;

class ServiceStatus extends Component
{
    public $show;
    public $service;
    public $server;
    public $serviceStatus;
    public $selectedCommandId;
    public $selectedCommand;
    public $arguments;

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
}
