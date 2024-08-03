@props(['label', 'error' => false])
<div class="space-y-2">
    <label>{{ $label }}</label>
    <input {{ $attributes }}
           class="h-10 px-4 rounded-lg w-full bg-white/10">
    @error($error)
        <p class="text-red-500 text-xs">{{ $message }}</p>
    @enderror
</div>
