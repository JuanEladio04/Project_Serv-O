<section>
    @foreach ($services as $service)
        <livewire:ServiceTag :service="$service" :key="$service->id">
    @endforeach
</section>
