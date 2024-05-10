<div class="resources-bar grid grid-cols-5 sm:w-1/2 w-full my-5">
    <p class="col-span-1 text-xl cSubTitle mx-5 text-right">
        {{ $name }}
    </p>
    <div class="bar col-span-3 mx-5">
        <div class="progress text-center" style="width: {{ $progress }}%;">
        </div>
    </div>
    <div class="cSubTittle sm:text-xl col-span-1 mx-5 relative text-sm flex items-center justify-center">
        {{ $current }}/{{ $total }}
    </div>
</div>
