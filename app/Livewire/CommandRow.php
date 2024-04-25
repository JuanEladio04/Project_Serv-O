<?php

namespace App\Livewire;

use Livewire\Component;

class CommandRow extends Component
{
    public $command;
    public function render()
    {
        return view('livewire.command-row');
    }
}
