@props(['page'])
<x-layouts.app :title="$page->title">
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
</x-layouts.app>

