<div>
    <div id="delete-modal" tabindex="-1"
        class="deleteModal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="modal-div relative bg-cPrimary shadow text-center">
                <span class="material-symbols-outlined block text-7xl">
                    warning
                </span>
                {{ $slot }}
            </div>
        </div>
    </div>
