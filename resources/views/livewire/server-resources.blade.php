<div class="flex flex-col justify-center items-center">
    @if ($showResources == true)
        <livewire:ResourcesBar :progress="$cpuUsage" :name="'CPU'" :total="'100%'"/>
        <livewire:ResourcesBar :progress="$percentUsedMemory" :name="'Memoria'" :total="$totalMemory . 'MB'" :current="$usedMemory . 'MB'"/>
    @else
        <p>
            No ha sido posible conectarse con el servidor
        </p>
    @endif
</div>
