<?php

namespace App\Livewire;

use Livewire\Component;

class ServerResources extends Component
{
    public $server;
    public $cpuUsage = '0';
    public $totalMemory = '0';
    public $usedMemory = '0';
    public $percentUsedMemory = '0';

    public function mount()
    {
        $this->getResources();
    }

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
        if ($this->server->ping()) {
            $this->cpuUsage = $this->server->getCpuUsage();
            $this->totalMemory = $this->server->getMemory();
            $this->usedMemory = $this->server->getMemoryUsage();
            if ($this->usedMemory && $this->totalMemory) {
                $this->percentUsedMemory = ($this->usedMemory * 100) / $this->totalMemory;
            }
        }

        $this->dispatch('updateResourcesBar');
        $this->render();
    }
}
