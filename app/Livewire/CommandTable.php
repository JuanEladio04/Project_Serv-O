<?php

namespace App\Livewire;

use App\Models\Command;
use App\Models\Service;
use Livewire\Component;

class CommandTable extends Component
{
    public Service $service;

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $commands = $this->service->commands()->paginate(10);
        return view('livewire.command-table')->with('commands', $commands);
    }
}
