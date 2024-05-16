<?php

namespace App\Livewire;

use App\Events\PingPerformed;
use Livewire\Component;
use Livewire\Attributes\On;

class StatusBall extends Component
{
    public $server;
    public $serverStatus = 'loading';

    public function mount()
    {
        $this->server->ping();
    }

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
        $this->serverStatus = 'loading';
        $this->server->ping();
    }

    /**
     * This function is triggered when a PingPerformed event is dispatched.
     * It handles the event and updates the server status.
     *
     * @param PingPerformed $event The event object containing the ping result.
     * @return void
     */
    #[On('echo:ping{server.server_dir},PingPerformed')]
    public function handlePingPerformed($event)
    {
        if($this->serverStatus === 'loading' || $this->serverStatus === false){
            $this->serverStatus = $event['pingResult'];
        }
    }
}
