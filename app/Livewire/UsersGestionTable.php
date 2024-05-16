<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UsersGestionTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';

    #[On('userDeleted')]
    public function render()
    {
        $users = User::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone_number', 'like', '%' . $this->search . '%')
                ->orWhere('birth_date', 'like', '%' . $this->search . '%')
                ->orWhere('role', 'like', '%' . $this->search . '%');
        })->paginate(20);

        return view('livewire.users-gestion-table')->with('users', $users);
    }

    public function performDelete(User $user)
    {
        try {
            $user->workSpaces()->detach();
            $user->commands()->detach();
            $user->delete();
            dispatch('userDeleted');
            session()->flash('status', 'Usuario eliminado correctamente');

        } catch (\Throwable $th) {
            session()->flash('status', 'No ha sido posible eliminar el usuario');
        }
    }
}
