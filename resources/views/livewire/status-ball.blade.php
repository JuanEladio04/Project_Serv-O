{{-- <div  wire:poll.3s="reloadServersState"> --}}
<div>
    <div class="col-span-1 {{ $serverStatus == true ? 'color-cSecondary' : 'color-cBackground' }}" wire:loading.class='hidden'>
        <i class="fa-solid fa-circle text-4xl"></i>
    </div>

    <x-loading-loop>w-11 inline</x-loading-loop>
</div>
