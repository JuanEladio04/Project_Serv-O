<a href="{{ route('service.show', [$service]) }}">
    <div class="shadow-lg bg-cPrimary px-20 py-16">
        <p class="cSubTitle text-5xl">{{ $service->name }}</p>
        <p class="text-xl mt-4">{{ $service->service_name }}</p>
    </div>
    
</a>