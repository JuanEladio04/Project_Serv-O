<div id="serviceMenu">
    <div class="grid grid-cols-2 cursor-pointer items-center align-middle justify-center py-3" wire:click='toggleMenu'>
        <p class="text-4xl cSubTitle">
            {{ $service->name }}
        </p>

        <div class="text-right inline-block ">
            <p class="inline-block align-middle" wire:loading.class='hidden'>
                <i
                    class="color-{{ $serviceStatus ? 'cSecondary' : 'cBackground' }} ms-2 fa-solid fa-circle text-4xl"></i>
            </p>
            <x-loading-loop>w-14 inline</x-loading-loop>

            @if ($userRole != 'reader')
                <button class="inline items-center">
                    <span class="{{ $show ? 'hidden' : 'inline-block' }} text-4xl material-symbols-outlined">
                        expand_more
                    </span>
                    <span class=" {{ $show ? 'inline-block' : 'hidden' }} text-4xl material-symbols-outlined">
                        expand_less
                    </span>
                </button>
            @endif
        </div>
    </div>

    @if ($show && $userRole != 'reader')
        <button class="accentButton" wire:click='removeService'>
            <i class="fa-solid fa-minus"></i>
        </button>
        <div class="grid grid-cols-6 my-5">
            <select name="" id="" class="col-span-5 text-xl" wire:model.live='selectedCommandId'
                wire:change="parseCommand">
                <option selected>Selecciona un comando</option>
                @foreach ($commands as $command)
                    <option value="{{ $command->id }}">{{ $command->name }}: {{ $command->command }}</option>
                @endforeach
            </select>

            <button class="col-span-1 secondaryButton ms-5" wire:click='executeCommand' wire:loading.attr='disabled'
                @if ($selectedCommand == '') disabled @endif>
                <i class="fa-solid fa-play"></i>
                <span class="hidden sm:inline"> Ejecutar</span>
            </button>
        </div>
        @isset($selectedCommand)
            <div>
                <p class="my-3 text-xl">
                    {{ $selectedCommand->description }}
                </p>
            </div>

            <div>
                <div class="input-wrapper mt-4 text-left my-7">
                    <div class="relative z-0">
                        <input type="text" wire:model='arguments'
                            class="block py-2.5 px-3 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" " />
                        <label for="email"
                            class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 z-10 bg-cPrimary origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto mx-3">
                            Argumentos
                        </label>
                    </div>
                </div>

                <textarea class="block w-full resize-none text-2xl" name="" id="" cols="30" rows="10" disabled
                    wire:model.live='commandOutput'>
                        </textarea>
            </div>
        @endisset
    @endif
</div>
