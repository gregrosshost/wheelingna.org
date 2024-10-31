@props(['page'])
<x-layouts.test>



                        <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
                        @stack('htmlBody')






</x-layouts.test>