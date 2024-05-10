<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

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

    #[On('updateResourcesBar')]
    /**
     * Update the progress bar of the resources bar
     * 
     * @return void
     */
    public function updateResourcesBar()
    {
        if (!$this->current) {
            $this->current = $this->progress . '%';
        }
        $this->render();
    }
}
