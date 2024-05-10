<x-app-layout>
    <section class="bg-cPrimary my-14 shadow-lg py-10">
        @foreach ($commands as $command)
            <article class="commandRegister py-36 sm:mx-24 mx-10">
                <div class="grid sm:grid-cols-2">
                    <div class="grid grid-cols-3">
                        <h2 class="text-4xl cSubTitle">
                            {{ $command->pivot->state }}
                        </h2>
                        <p class="cSubTitle sm:text-2xl text-lg">
                            {{ $command->pivot->date }}
                        </p>
                        <p class="cSubTitle  sm:text-2xl text-lg">
                            {{ $command->pivot->time }}
                        </p>
                    </div>
                    <p class="cSubTitle  sm:text-2xl text-lg">
                        {{ $command->name }}: {{ $command->command }}
                    </p>
                </div>
                @if ($command->pivot->failure_traces != '')
                    <p class="sm:text-xl my-10">
                        {{ $command->pivot->failure_traces }}
                    </p>
                @endif
            </article>
        @endforeach
    </section>

    {{ $commands->links() }}

</x-app-layout>
