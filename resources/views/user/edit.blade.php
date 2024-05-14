<x-app-layout>

    <div class="flex justify-center items-center h-full">
        <a href="/" class="p-20">
            <x-application-logo class="block h-9 w-auto fill-current color-cPrimary">w-48</x-application-logo>
        </a>
    </div>


    <div class="w-full sm:w-1/2 mx-auto">
        <x-custom-form>
            <h1 class="text-4xl text-center overflow-x-hidden overflow-y-hidden flex-wrap">
                Actualizar información del usuario: <span class="block">{{ $user->name }}</span>
            </h1>

            <form method="POST" action="{{ route('user.update', $user->id) }}" class="sm:p-4">
                @csrf
                @method('PUT')

                <!-- User's name -->
                <x-custom-input label="Nombre del usuario" name="name" type="text" value="{{ $user->name }}" />
                <!-- User's last name -->
                <x-custom-input label="Apellidos del usuario" name="last_name" type="text" value="{{ $user->last_name }}" />
                <!-- User's email -->
                <x-custom-input label="Correo electrónico del usuario" name="email" type="email" value="{{ $user->email }}" />
                <!-- User's phone number -->
                <x-custom-input label="Número de teléfono del usuario" name="phone_number" type="number" value="{{ $user->phone_number }}" />
                <!-- User's birth date -->
                <x-custom-input label="Fecha de nacimiento del usuario" name="birth_date" type="date" value="{{ $user->birth_date }}" />
                <!-- User's role -->
                <select name="role" id="role" class="customSelector my-8  cSubTitle">
                    <option value="admin" @if($user->role == "admin") selected @endif>Administrador</option>
                    <option value="user" @if($user->role == "user") selected @endif>Usuario común</option>
                </select>

                <button type="submit" class="bg-cAccent color-cPrimary text-2xl w-full cSubTitle mt-10">
                    Actualizar usuario
                </button>   

            </form>
        </x-custom-form>
    </div>

</x-app-layout>
