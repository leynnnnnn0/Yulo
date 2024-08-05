@props(['active' => false])
<a {{ $attributes }} class="{{ $active ? 'bg-primary/10' : '' }} rounded-xl px-2 hover:text-orange-200 transition-colors duration-300">{{ $slot }}</a>
