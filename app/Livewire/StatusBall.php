<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

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

    #[On('refreshServersState')]
    public function reloadServersState(){
        $this->serverStatus = $this->server->ping();
        $this->render();
    }
}
