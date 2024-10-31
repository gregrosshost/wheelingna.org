@props(['page'])
<x-layouts.app>
  <x-banners.page-banner
      :title="$page->title"
  />

  <!-- Main -->
  <main class="bg-secondary">
    <!-- Inner Container -->
    <div class="max-w-7xl mx-auto py-6 lg:px-8 px-4 sm:px-0">
      <!-- Page Details -->
      <div class="bg-white rounded-lg shadow-md lg:px-6">
        <article class="prose lg:prose-xl max-w-none">
          <div class="text-gray-700">
             <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
              @stack('htmlBody')
          </div>
        </article>
        @stack('htmlBody')
        @if($page->slug !== 'home')
          <div class="mt-6 py-6 border-t border-gray-200">
            <div class="flex justify-between items-center">
              <!-- Previous Page -->
              <div class="flex-1">
                @php
                  $previousPage = \Z3d0X\FilamentFabricator\Models\Page::where('id', '<', $page->id)
                      ->orderBy('id', 'desc')
                      ->first();
                @endphp

                @if($previousPage)
                  <a href="{{ url($previousPage->slug) }}" class="text-primary hover:font-black font-semibold">
                    ← {{ $previousPage->title }}
                  </a>
                @endif
              </div>

              <!-- Home Link (Centered) -->
              <div class="flex-1 text-center">
                <a href="{{ url('/') }}" class="text-primary hover:font-black font-semibold inline-block">
                  ↑ Back to Home
                </a>
              </div>

              <!-- Next Page -->
              <div class="flex-1 text-right">
                @php
                  $nextPage = \Z3d0X\FilamentFabricator\Models\Page::where('id', '>', $page->id)
                      ->orderBy('id')
                      ->first();
                @endphp

                @if($nextPage)
                  <a href="{{ url($nextPage->slug) }}" class="text-primary hover:font-black font-semibold">
                    {{ $nextPage->title }} →
                  </a>
                @endif
              </div>
            </div>
          </div>
        @endif


      </div>
    </div>
  </main>

</x-layouts.app>
