<section>
  <form wire:submit.prevent="save">
    {{ $this->form }}
    <button type="save" class="mt-2 bg-secondary dark:bg-dark-secondary text-primary dark:text-dark-primary font-bold py-2 px-4 rounded">
      Sign Up
    </button>
  </form>

  <x-filament-actions::modals />
</section>

<script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('volunteer-added', () => {
                location.reload();
            });
        });
    </script>