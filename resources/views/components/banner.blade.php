@props([
    'title' => "Welcome, glad you're here!",
    'subtitle' => 'Our Primary Purpose
- to carry the message to the addict who still suffers. "Just for Today" - Find meetings, resources, and support in your journey of recovery from addiction. You never have to be alone again.',
    'primaryButtonText' => 'Find a Meeting',
    'primaryButtonUrl' => '/meetings',
    'secondaryButtonText' => 'Get Help Now',
    'secondaryButtonUrl' => 'tel:8882512426',
    'showFullBanner' => false
])

<div class="bg-red-600">
  <!-- Inner Container -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="py-12 md:py-16">
      <div class="text-center">
        <h1 class="text-4xl font-extrabold text-blue-400 sm:text-5xl md:text-6xl">
          {{ $title }}
        </h1>
        @if($showFullBanner)
        <p class="mt-3 max-w-md mx-auto text-base text-green-300 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
          {{ $subtitle }}
        </p>
        <div class="mt-5 max-w-md mx-auto flex justify-center">
          <div class="rounded-md shadow">
            <a href="{{ url($primaryButtonUrl) }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-yellow-400 hover:bg-yellow-500 md:py-4 md:text-lg md:px-10">
              {{ $primaryButtonText }}
            </a>
          </div>
          <div class="ml-3 rounded-md shadow">
            <a href="{{ $secondaryButtonUrl }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-yellow-400 bg-zinc-900 hover:bg-zinc-800 md:py-4 md:text-lg md:px-10">
              {{ $secondaryButtonText }}
            </a>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>