@props([
    'href',
    'title',
    'description',
    'icon' => null
])

<a href="{{ url($href) }}" {{ $attributes->merge(['class' => 'group h-full']) }}>
  <div class="p-4 bg-secondary dark:bg-dark-secondary rounded-lg border border-primary dark:border-dark-primary shadow-sm hover:bg-primary dark:hover:bg-dark-primary hover:shadow-md transition-all h-full flex flex-col">
    <div class="flex flex-col items-center md:items-start flex-grow">
      @if ($icon)
        <svg class="w-8 h-8 text-primary dark:text-dark-primary group-hover:text-secondary dark:group-hover:text-dark-secondary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          {!! $icon !!}
        </svg>
      @endif
      <h3 class="mt-2 font-semibold text-primary dark:text-dark-primary group-hover:text-secondary dark:group-hover:text-dark-secondary transition-colors">
        {{ $title }}
      </h3>
      <p class="mt-1 text-sm text-primary/80 dark:text-dark-primary/80 hidden md:block group-hover:text-secondary/90 dark:group-hover:text-dark-secondary/90 transition-colors">
        {{ $description }}
      </p>
    </div>
  </div>
</a>