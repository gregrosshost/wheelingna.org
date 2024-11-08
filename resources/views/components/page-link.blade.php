@props([
    'href',
    'title',
    'description',
    'icon' => null
])

<a href="{{ url($href) }}" {{ $attributes->merge(['class' => 'group h-full']) }}>
  <div class="flex h-full flex-col rounded-lg border-2 p-4 shadow-sm transition-all bg-secondary border-primary hover:bg-primary hover:shadow-md dark:bg-dark-secondary dark:border-dark-primary dark:hover:bg-dark-primary">
    <div class="flex flex-grow flex-col items-center md:items-start">
      @if ($icon)
        <svg class="h-8 w-8 transition-colors text-primary group-hover:text-secondary dark:text-dark-primary dark:group-hover:text-dark-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          {!! $icon !!}
        </svg>
      @endif
      <h3 class="mt-2 font-semibold transition-colors text-primary group-hover:text-secondary dark:text-dark-primary dark:group-hover:text-dark-secondary">
        {{ $title }}
      </h3>
      <p class="mt-1 hidden text-sm transition-colors text-primary/80 group-hover:text-secondary/90 dark:text-dark-primary/80 md:block dark:group-hover:text-dark-secondary/90">
        {{ $description }}
      </p>
    </div>
  </div>
</a>