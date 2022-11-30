<x-filament::page>
    <form wire:submit.prevent="submit">

        {{ $this->form }}

        <x-tables::button type="submit" class="mt-4">
            @lang('Simpan Pengaturan')
        </x-tables::button>
    </form>
</x-filament::page>
