<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class StatusBall extends Component
{
    public $server;
    public $serverStatus;

    public function render()
    {
        return view('livewire.status-ball');
    }

    /**
     * This function is triggered when the refreshServersState event is dispatched.
     * It updates the status of the servers and re-renders the component.
     *
     * @return void
     */
    #[On('refreshServersState')]
    public function reloadServersState(): void
    {
        $this->serverStatus = $this->server->ping();
        $this->render();
    }
}
