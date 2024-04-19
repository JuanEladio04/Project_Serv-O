<?php

namespace App\Livewire;

use Livewire\Component;

class StatusBall extends Component
{
    public $server;
    public $serverStatus;

    public function mount()
    {
        $this->serverStatus = $this->server->ping();
    }

    public function render()
    {
        return view('livewire.status-ball');
    }
}
