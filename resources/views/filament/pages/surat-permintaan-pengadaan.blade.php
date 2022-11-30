<x-filament::page>
{{--    <x-filament::pages.actions></x-filament::pages.actions>--}}
    <form wire:submit.prevent="submit">

        {{ $this->form }}

        <x-tables::button type="submit" class="mt-4">
            @lang('Simpan')
        </x-tables::button>
    </form>
</x-filament::page>
