<div class="input-wrapper mt-4 text-left">
    <div class="relative z-0">
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
            @if ($wireModel) wire:model="{{ $wireModel }}" @endif
            class="block py-2.5 px-3 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
            placeholder="{{ $placeholder }}"
            value = "{{ $value }}" />
        <label for="{{ $name }}"
            class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto px-3">
            {{ $label }}
        </label>
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    </div>
</div>

{{-- <!-- Email Address -->
                <div class="input-wrapper mt-4">
                    <div class="relative z-0">
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                            placeholder=" " />
                        <label for="email"
                            class="absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            Correo electrónico
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div> --}}
