@aware(['page'])
@props(['heading'=> ''])
<div class="px-4 py-4 md:py-8 flex">
    <div class="w-full">
        <livewire:image-text-block-form cancelBtn="{{ false }}" heading="{!! $heading !!}" />
    </div>
</div>
