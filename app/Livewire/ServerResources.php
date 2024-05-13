<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ServerResources extends Component
{
    public $server;
    public $cpuUsage = '0';
    public $totalMemory = '0';
    public $usedMemory = '0';
    public $percentUsedMemory = '0';
    public $showResources = false;

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.server-resources');
    }

    public function getResources()
    {
        $this->cpuUsage = $this->server->getCpuUsage();
        $this->totalMemory = $this->server->getMemory();
        $this->usedMemory = $this->server->getMemoryUsage();
        if ($this->usedMemory && $this->totalMemory) {
            $this->percentUsedMemory = ($this->usedMemory * 100) / $this->totalMemory;
        }
    }


    /**
     * This method is triggered when a 'PingPerformed' event is received from Echo.
     * It retrieves server resources and updates the component's properties.
     *
     * @return void
     *
     * @throws \Exception If the server is unreachable or an error occurs while retrieving resources.
     *
     * @On('echo:ping{server.server_dir},PingPerformed')
     */
    #[On('echo:ping{server.server_dir},PingPerformed')]
    public function toggleShowResources()
    {
        // Retrieve server resources
        $this->getResources();

        // Set the showResources property to true to display the server resources
        $this->showResources = true;

        // Render the component
        $this->render();
    }
}
