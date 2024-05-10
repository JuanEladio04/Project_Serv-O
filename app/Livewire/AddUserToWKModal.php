<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddUserToWKModal extends Component
{
    public $workSpace;
    public $users;
    public $email;
    public $showModal = false;
    public $wkStatus;
    public $selectedRoles = [];

    public function mount()
    {
        $this->users = $this->workSpace->users()->get();

        foreach ($this->users as $user) {
            $this->selectedRoles[$user->id] = $user->workSpaces->find($this->workSpace->id)->pivot->wk_role;
        }
    }

    public function render()
    {
        $this->mount();
        return view('livewire.add-user-to-w-k-modal')->with('users', $this->users);
    }

    public function addUser()
    {
        try {
            $newUser = User::where('email', $this->email)->first();

            if ($newUser == Auth::user()) {
                $this->wkStatus = ('No te puedes añadir a ti mismo');
                $this->reset(['email']);
            } else if ($this->users->contains($newUser)) {
                $this->wkStatus = ('Ese usuario ya pertenece a este espacio de trabajo');
                $this->email = '';
                $this->reset(['email']);
            } else if ($newUser != null) {
                $this->workSpace->users()->attach($newUser);
                $this->mount();
                $this->wkStatus = ('Usuario añadido correctamente.');
                $this->email = '';
                $this->render();
            } else {
                $this->wkStatus = ('Usuario no encontrado.');
            }
        } catch (\Throwable $th) {
            $this->wkStatus = ('No se ha podido añadir usuario al espacio de trabajo.');
        }
    }

    public function removeUserFromWK(User $user)
    {
        try {
            $this->workSpace->users()->detach($user->id);
            $this->mount();
            $this->wkStatus = ('Usuario eliminado del espacio de trabajo correctamente.');
        } catch (\Throwable $th) {
            $this->wkStatus = ('No ha sido posible eliminar al usuario del espacio de trabajo.');
        }
    }

    public function updateRole(User $user)
    {
        try {
            $pivotEntry = $user->workSpaces()->where('work_space_id', $this->workSpace->id)->first();

            if ($pivotEntry) {
                $user->workSpaces()->updateExistingPivot($this->workSpace->id, ['wk_role' => $this->selectedRoles[$user->id]]);
                $this->wkStatus = 'Rol de usuario actualizado con éxito.';
            } else {
                $this->wkStatus = 'No se encontró una entrada para este usuario y espacio de trabajo.';
            }
        } catch (\Throwable $th) {
            $this->wkStatus = 'No ha sido posible actualizar el rol del usuario.';
        }
    }


}
