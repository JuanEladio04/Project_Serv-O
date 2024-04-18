<div>
    <div class="text-right w-full px-10">
        <button class="cSecondaryButton text-3xl" wire:click="loadServers">
            <i class="fa-solid fa-repeat"></i>
        </button>
    </div>
    <div class="grid sm:grid-cols-3 sm:mx-20">
        @foreach ($servers as $server)
            <livewire:ServerTag :$server :key="$server->id" />
        @endforeach
    </div>

</div>
