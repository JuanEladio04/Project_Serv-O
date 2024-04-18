<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Process;
use Livewire\Component;
use App\Models\WorkSpace;
use Livewire\Attributes\On;

class ServerList extends Component
{
    public $workSpace;
    public $servers;
    
    public function mount(WorkSpace $workSpace)
    {
        $this->workSpace = $workSpace;
        $this->servers = $workSpace->servers()->orderByDesc('created_at')->get();
    }

    public function render()
    {
        return view('livewire.server-list');
    }

    #[On('newServerAdded')]
    public function loadServers()
    {
        $this->servers = $this->workSpace->servers()->orderByDesc('created_at')->get();
        $this->dispatch('refreshServersState');
    }
}
