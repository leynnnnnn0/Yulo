@props(['icon' => false, 'for' => false])
<div class="w-fit bg-white/10 rounded-full flex items-center space-between px-3 py-1">
    <section class="cursor-pointer flex-1 px-2 flex items-center gap-2">
        <span class="text-white">
            {{ $icon }}
        </span>
        <span class="text-gray-300 text-xs">{{ $for }}</span>
    </section>
</div>
