<section>
  <form wire:submit.prevent="submit">
    {{ $this->form }}
    <button type="submit" class="mt-2 bg-secondary dark:bg-dark-secondary text-primary dark:text-dark-primary font-bold py-2 px-4 rounded">
      Sign Up
    </button>
  </form>

  <x-filament-actions::modals />
</section>