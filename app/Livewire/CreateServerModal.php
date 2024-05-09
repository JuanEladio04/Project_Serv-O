<?php

namespace App\Livewire;

use App\Models\Server;
use Livewire\Component;
use App\Helpers\EncryptionHelper;


class CreateServerModal extends Component
{
    public $showModal = false;
    public $workSpace;
    public $statusMessage;
    public $name;
    public $description;
    public $direction;
    public $user;
    public $password;

    public function render()
    {
        return view('livewire.create-server-modal');
    }

    public function performInsert()
    {
        $this->showModal = true;
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'direction' => 'required|string|max:255',
            'user' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        try {
            $server = new Server;
            $server->name = $this->name;
            $server->description = $this->description;
            $server->server_dir = $this->direction;
            $server->user_root = $this->user;
            $encryptionHelper = new EncryptionHelper();
            $server->password = $encryptionHelper->encryptPassword($this->password, env('ENCRYPTION_KEY'));

            // if ($this->checkAvailability($server)) {
                $server->workSpace()->associate($this->workSpace->id);
                $server->save();

                $this->dispatch('newServerAdded');
                $this->statusMessage = 'Servidor añadido correctamente.';
                $this->resetInputFields();
            // }
        } catch (\Throwable $th) {
            $this->statusMessage = 'No ha sido posible añadir servidor. ' . $th;
        }
    }

    /**
     * Reset the input fields of the form.
     *
     * This method is used to clear the input fields of the form after a successful server insertion.
     * It resets the 'name', 'description', 'direction', 'password', and 'user' properties of the component.
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->reset(['name', 'description', 'direction', 'password', 'user']);
    }

    /**
     * Check if a server is available to be added.
     *
     * This method checks if a server with the same direction or already exists in the workspace.
     * If the server is not available, it sets an appropriate status message and resets the input fields.
     *
     * @param Server $server The server to be checked.
     * @return boolean
     */
    private function checkAvailability(Server $server)
    {
        if ($server->server_dir == 'localhost' || $server->server_dir == '127.0.0.1') {
            $this->statusMessage = 'No se puede añadir un servidor con dirección localhost o 127.0.0.1';
            $this->resetInputFields();
            return false;
        } else {
            foreach ($this->workSpace->servers as $currentServer) {
                if ($currentServer->server_dir == $server->server_dir) {
                    $this->statusMessage = 'Ese servidor ya ha sido añadido';
                    $this->resetInputFields();
                    return false;
                }
            }
        }
        return true;
    }

}


