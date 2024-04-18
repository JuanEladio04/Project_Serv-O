<a href="" class="items-center justify-center">
    <div class="serverTag mx-4 mt-4 bg-cPrimary grid-cols-3 color-cText grid items-center px-20">
        <div class="col-span-1 @if($this->serverStatus) color-cSecondary @else color-cBackground @endif ">
            <i class="fa-solid fa-circle text-4xl"></i>
        </div>
        <div class="col-span-2 overflow-x-hidden overflow-y-hidden">
            <h3 class="text-5xl text-right cSubTitle">
                {{ $server->name }}
            </h3>
        </div>
    </div>
</a>
