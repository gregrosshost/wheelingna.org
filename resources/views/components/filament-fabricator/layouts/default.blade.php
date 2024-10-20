@props(['page'])
<x-filament-fabricator::layouts.base :title="$page->title">
    <header>
        header
    </header>

    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />

     <footer>
         footer
     </footer>
</x-filament-fabricator::layouts.base>
