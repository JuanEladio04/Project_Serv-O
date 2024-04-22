<?php

namespace App\Livewire;

use Livewire\Component;

class ResourcesBar extends Component
{
    public $name;
    public $progress;
    public $current;
    public $total;

    public function mount()
    {
        if (!$this->current) {
            $this->current = $this->progress . '%';
        }
    }

    public function render()
    {
        return view('livewire.resources-bar');
    }
}
