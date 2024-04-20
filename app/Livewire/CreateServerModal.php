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
            $server->workSpace()->associate($this->workSpace->id);
            $server->save();

            $this->dispatch('newServerAdded');
            $this->statusMessage = 'Servidor añadido correctamente.';
            $this->resetInputFields();
        } catch (\Throwable $th) {
            $this->statusMessage = 'No ha sido posible añadir servidor. ' . $th;
        }
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->direction = '';
        $this->user = '';
        $this->password = '';
    }

}
