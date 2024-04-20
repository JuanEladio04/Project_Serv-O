<?php

namespace App\Livewire;

use Livewire\Component;

class ResourcesBar extends Component
{
    public $name;
    public $progress;

    public function render()
    {
        return view('livewire.resources-bar');
    }
}
