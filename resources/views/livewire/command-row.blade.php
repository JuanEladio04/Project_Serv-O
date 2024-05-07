<tr>
    <td>{{ $command->name }}</td>
    <td>{{ $command->operation }}</td>
    <td>{{ $command->command }}</td>
    <td>{{ $command->description }} </td>
    <td class="text-center">
        <livewire:EditCommandModal :$command :key="'edit-' . $command->id" />
        <livewire:DeleteCommandModal :$command :key="'delete-' . $command->id" />
    </td>
</tr>