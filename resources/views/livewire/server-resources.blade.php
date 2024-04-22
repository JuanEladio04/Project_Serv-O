<div class="mx-50 items-center gap-y-10">
    <livewire:ResourcesBar :progress="$cpuUsage" :name="'CPU'"  :total="'100%'" lazy/>
    <livewire:ResourcesBar :progress="$percentUsedMemory" :name="'Memoria'" :total="$totalMemory . 'MB'" :current="$usedMemory . 'MB'" lazy/>
</div>