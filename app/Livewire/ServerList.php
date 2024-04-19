<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WorkSpace;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Process;

class ServerList extends Component
{
    use WithPagination;

    public $workSpace;

    /**
     * Mount the component.
     *
     * @param WorkSpace $workSpace
     * @return void
     */
    public function mount(WorkSpace $workSpace)
    {
        $this->workSpace = $workSpace;
    }

    #[On('newServerAdded')]
    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $servers = $this->workSpace->servers()->orderByDesc('created_at')->paginate(12);

        return view('livewire.server-list', compact('servers'));
    }

    public function reloadServers(){
        $servers = $this->workSpace->servers()->orderByDesc('created_at')->paginate(12);
        $this->dispatch('refreshServersState');
    }
}
