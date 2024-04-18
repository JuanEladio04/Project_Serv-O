<?php

namespace App\Livewire;

use App\Models\Server;
use Livewire\Component;

class ServerTag extends Component
{
    public $server;
    public $serverStatus = 'false';

    /**
     * mount function.
     *
     * @param Server $server
     * @return void
     */
    public function mount(Server $server)
    {   
        $this->server = $server;
        // $this->serverStatus = $this->server->ping();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.server-tag')
            ->with('server', $this->server);
    }
}
