<?php

namespace App\Livewire;

use Livewire\Component;

class ServiceTag extends Component
{
    public $service;
    
    public function render()
    {
        return view('livewire.service-tag');
    }
}
