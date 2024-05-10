<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportPagination\HandlesPagination;
use Livewire\WithPagination;

class CommandRow extends Component
{
    use HandlesPagination;
    public $command;

    #[On('reloadCommand.{command.id}')]
    public function render()
    {
        return view('livewire.command-row');
    }
}
