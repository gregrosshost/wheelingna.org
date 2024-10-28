@props(['page'])
<x-layouts.app>
  <x-banner
      :title="$page->title"
  />

  <!-- Main -->
  <main class="bg-blue-400">
    <!-- Inner Container -->
    <div class="max-w-7xl mx-auto py-6 lg:px-8 px-4 sm:px-0">
      <!-- Page Details -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <article class="prose prose-lg max-w-none">
          <div class="text-gray-700">
             <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
          </div>
        </article>

        @if(request()->route()->getName() !== 'home')
          <div class="mt-6 pt-6 border-t border-gray-200">
            <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800 font-medium">
              ← Back to Home
            </a>
          </div>
        @endif
      </div>
    </div>
  </main>





</x-layouts.app>