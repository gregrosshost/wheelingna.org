@php use App\Models\Page; @endphp
@props(['page'])
{{--@dd($page)--}}
<x-site.layout>

  <x-slot name="banner">
    <x-page-banner :title="$page->title" />
  </x-slot>

  <main class="bg-primary dark:bg-dark-primary rounded-lg shadow-md lg:px-6">
    <article class="prose lg:prose-xl max-w-none dark:prose-invert prose-headings:text-secondary dark:prose-headings:text-dark-secondary prose-p:text-secondary/90 dark:prose-p:text-dark-secondary/90">
      <div class="text-primary dark:text-dark-primary">
        <x-content :content="$page['content']" />
        @stack('htmlBody')
      </div>
      @stack('htmlBody')
      @if($page->slug !== 'home')
        <div class="mt-6 py-6 border-t border-secondary/20 dark:border-dark-secondary/20">
          <div class="flex justify-between items-center">
            <!-- Previous Page -->
            <div class="flex-1">
              @php
                $previousPage = Page::where('id', '<', $page->id)
                    ->orderBy('id', 'desc')
                    ->first();
              @endphp

              @if($previousPage)
                <a href="{{ url($previousPage->slug) }}" class="text-secondary dark:text-dark-secondary hover:text-secondary/70 dark:hover:text-dark-secondary/70 font-semibold transition-colors">
                  ← {{ $previousPage->title }}
                </a>
              @endif
            </div>

            <!-- Home Link (Centered) -->
            <div class="flex-1 text-center">
              <a href="{{ url('/') }}" class="text-secondary dark:text-dark-secondary hover:text-secondary/70 dark:hover:text-dark-secondary/70 font-semibold inline-block transition-colors">
                ↑ Back to Home
              </a>
            </div>

            <!-- Next Page -->
            <div class="flex-1 text-right">
              @php
                $nextPage = Page::where('id', '>', $page->id)
                    ->orderBy('id')
                    ->first();
              @endphp

              @if($nextPage)
                <a href="{{ url($nextPage->slug) }}" class="text-secondary dark:text-dark-secondary hover:text-secondary/70 dark:hover:text-dark-secondary/70 font-semibold transition-colors">
                  {{ $nextPage->title }} →
                </a>
              @endif
            </div>
          </div>
        </div>
      @endif




    </article>
  </main>


</x-site.layout>
