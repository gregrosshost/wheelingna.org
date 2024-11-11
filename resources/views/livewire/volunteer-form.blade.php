<section>
  <form wire:submit.prevent="signUpForm">
    {{ $this->form }}
    <button type="submit">Sign Up</button>
  </form>

  <x-filament-actions::modals />
</section>