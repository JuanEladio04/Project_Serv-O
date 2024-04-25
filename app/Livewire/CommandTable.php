<?php

namespace App\Livewire;

use App\Models\Command;
use App\Models\Service;
use Livewire\Component;
use Livewire\Attributes\On;

class CommandTable extends Component
{
    public Service $service;
    public $search;

    #[On('reloadCommands')]
    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $commands = $this->service->commands()->where('name', 'like', '%' . $this->search . '%')
        ->orWhere('command', 'like', '%' . $this->search . '%')
        ->orWhere('operation', 'like', '%' . $this->search . '%')
        ->paginate(10);
        
        return view('livewire.command-table')->with('commands', $commands);
    }
}
