<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\Attributes\On;

class AddServiceToServerModal extends Component
{
    public $services;
    public $showModal;
    public $server;
    public $search;
    public $statusMessage;

    #[On('serviceRemovedFromServer')]
    public function mount()
    {
        $allServices = Service::all();

        $currentServices = $this->server->services;

        $availableServices = $allServices->reject(function ($service) use ($currentServices) {
            return $currentServices->contains($service);
        });

        $this->services = $availableServices;
    }

    public function render()
    {
        return view('livewire.add-service-to-server-modal');
    }

    /**
     * This function is used to search for services based on the search query
     *
     * @param string $search
     * @return void
     */
    public function lookUp()
    {
        $this->showModal = true;

        $currentServices = $this->server->services;

        $matchingServices = Service::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('service_name', 'like', '%' . $this->search . '%')
            ->get();

        $this->services = $matchingServices->reject(function ($service) use ($currentServices) {
            return $currentServices->contains($service);
        });

    }


    /**
     * This function is used to add a service to a server
     *
     * @param Service $service
     * @return void
     */
    public function addServiceToServer(Service $service)
    {
        $this->showModal = true;
        try {
            $service->servers()->attach($this->server);
            $this->statusMessage = 'Servicio añadido correctamente';
        } catch (\Throwable $th) {
            $this->statusMessage = 'No ha sido posible añadir servicio';
        } finally {
            $this->dispatch('serverAddedToService');
            $this->mount();
        }
    }
}
