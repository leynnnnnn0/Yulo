<x-layouts.layout>
    <x-alerts.success/>
    <div class="space-y-4">
        @auth
            <x-posts.whats-new/>
        @endauth
        @include('livewire.posts')
    </div>

</x-layouts.layout>
