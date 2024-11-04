{{-- resources/views/components/theme-switcher.blade.php --}}
<div x-data="{
    darkMode: localStorage.getItem('darkMode') === 'true',
    toggleDarkMode() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('darkMode', this.darkMode);
        document.documentElement.classList.toggle('dark');
    }
}"
     x-init="
    if (darkMode || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    }
">
  <button
      @click="toggleDarkMode()"
      type="button"
      class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-primary text-primary hover:bg-primary/10 dark:border-dark-primary dark:text-dark-primary dark:hover:bg-dark-primary/10"
      aria-label="Toggle dark mode"
  >
    {{-- Light mode icon --}}
    <img
        x-show="!darkMode"
        src="{{ Vite::asset('resources/assets/light-mode.webp') }}"
        alt="Switch to dark mode"
        class="h-6 w-6"
    />
    {{-- Dark mode icon --}}
    <img
        x-show="darkMode"
        src="{{ Vite::asset('resources/assets/dark-mode.webp') }}"
        alt="Switch to light mode"
        class="h-6 w-6"
    />
  </button>
</div>