<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class DeleteServiceModal extends Component
{
    public Service $service;

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.delete-service-modal');
    }

    /**
     * Delete the service
     *
     */
    public function performDelete()
    {
        try {
            $this->service->servers()->detach();
            $this->service->delete();
            return redirect()->route('service.index')->with('status', 'Servicio eliminado correctamente.');
        } catch (\Throwable $th) {
            session()->flash('status', 'No ha sido posible eliminar el servicio');
        }
    }
}
