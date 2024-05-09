<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            DB::beginTransaction();

            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
                'phone_number' => ['nullable', 'string', 'digits:9', Rule::unique('users')->ignore($user->id)],
                'birth_date' => ['date'],
                'role' => ['required', 'string']
            ]);

            $user->name = $validatedData['name'];
            $user->last_name = $validatedData['last_name'];
            $user->email = $validatedData['email'];
            $user->phone_number = $validatedData['phone_number'];
            $user->birth_date = $validatedData['birth_date'];
            $user->role = $validatedData['role'];

            $user->save();

            DB::commit();
            session()->flash('status', 'Usuario actualizado correctamente.');
            return redirect()->route('user.index');
        } catch (QueryException $e) {
            DB::rollBack();
            session()->flash('status', 'No ha sido posible actualizar el usuario.');
            return redirect()->route('user.index');
        }
    }
}