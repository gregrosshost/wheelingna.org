<div>
    {{-- Display the form --}}
    <form wire:submit="create">
        {{ $this->form }}

        <div class="mt-4">
            <x-filament::button type="submit" form="submit">
                Submit Report
            </x-filament::button>
        </div>
    </form>

    <x-filament-actions::modals />
    @livewire('notifications')
</div>
