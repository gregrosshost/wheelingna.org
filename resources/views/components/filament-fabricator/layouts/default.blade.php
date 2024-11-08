@props(['page'])
<x-site.layout>

  <x-slot:banner>
    <x-page-banner
        :title="$page->title"
    />
  </x-slot:banner>

  <!-- Page Details -->
  <x-site.content-container>
    <article class="text-primary dark:text-dark-primary">
      <x-filament-fabricator::page-blocks :blocks="$page->blocks"/>
      @stack('htmlBody')
    </article>
  </x-site.content-container>

  @stack('htmlBody')
  @if($page->slug !== 'home')
    <div class="mt-6 py-6 border-t border-secondary/20 dark:border-dark-secondary/20">
      <div class="flex justify-between items-center">
        <!-- Previous Page -->
        <div class="flex-1">
          @php
            $previousPage = \Z3d0X\FilamentFabricator\Models\Page::where('id', '<', $page->id)
                ->orderBy('id', 'desc')
                ->first();
          @endphp

          @if($previousPage)
            <a href="{{ url($previousPage->slug) }}"
               class="text-secondary dark:text-dark-secondary hover:text-secondary/70 dark:hover:text-dark-secondary/70 font-semibold transition-colors">
              ← {{ $previousPage->title }}
            </a>
          @endif
        </div>

        <!-- Home Link (Centered) -->
        <div class="flex-1 text-center">
          <a href="{{ url('/') }}"
             class="text-secondary dark:text-dark-secondary hover:text-secondary/70 dark:hover:text-dark-secondary/70 font-semibold inline-block transition-colors">
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
            <a href="{{ url($nextPage->slug) }}"
               class="text-secondary dark:text-dark-secondary hover:text-secondary/70 dark:hover:text-dark-secondary/70 font-semibold transition-colors">
              {{ $nextPage->title }} →
            </a>
          @endif
        </div>
      </div>
    </div>
  @endif

</x-site.layout>