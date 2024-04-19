<?php

namespace App\Livewire;

use App\Models\Server;
use Livewire\Component;
use App\Jobs\PingServer;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Process;

class ServerTag extends Component
{
    public $server;

    #[On('refreshServersState')]
    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {   
        return view('livewire.server-tag')->with('server', $this->server);
    }

}
