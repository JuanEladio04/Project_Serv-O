<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Features\SupportPagination\HandlesPagination;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CommandTable extends Component
{
    use WithPagination, WithoutUrlPagination;

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
        $commands = $this->service->commands()
        ->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('command', 'like', '%' . $this->search . '%')
                ->orWhere('operation', 'like', '%' . $this->search . '%');
        })
        ->paginate(10);

        return view('livewire.command-table')->with('commands', $commands);
    }
}
