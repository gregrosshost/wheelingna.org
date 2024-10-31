@props([
    'href',
    'title',
    'description',
    'icon' => null
])

<a href="{{ url($href) }}" {{ $attributes->merge(['class' => 'group h-full']) }}>
  <div class="p-4 bg-white rounded-lg border border-primary shadow-sm hover:border-secondary hover:shadow-md transition-all h-full flex flex-col">
    <div class="flex flex-col items-center md:items-start flex-grow">
      @if ($icon)
        <svg class="w-8 h-8 text-primary group-hover:text-secondary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          {!! $icon !!}
        </svg>
      @endif
      <h3 class="mt-2 font-semibold text-primary group-hover:text-secondary transition-colors">{{ $title }}</h3>
      <p class="mt-1 text-sm text-primary hidden md:block group-hover:text-secondary/70 transition-colors">{{ $description }}</p>
    </div>
  </div>
</a>