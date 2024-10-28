@props([
    'href',
    'title',
    'description',
    'icon' => null
])

<a href="{{ url($href) }}" {{ $attributes->merge(['class' => 'group h-full']) }}>
  <div class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-all h-full flex flex-col">
    <div class="flex flex-col items-center md:items-start flex-grow">
      @if ($icon)
        <svg class="w-8 h-8 text-gray-600 group-hover:text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          {!! $icon !!}
        </svg>
      @endif
      <h3 class="mt-2 font-semibold text-gray-900 group-hover:text-blue-600">{{ $title }}</h3>
      <p class="mt-1 text-sm text-gray-500 hidden md:block">{{ $description }}</p>
    </div>
  </div>
</a>