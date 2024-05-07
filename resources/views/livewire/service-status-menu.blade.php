<div class=" my-10 ms-5">
    @foreach ($services as $service)
        <livewire:ServiceStatus :service="$service" :server="$server" :key="$service->id" :userRole="$userRole" />
    @endforeach
</div>
