<x-layouts.layout>
    <x-alerts.success/>
    <div class="space-y-4">
        <x-posts.whats-new/>
        @foreach($posts as $post)
            <x-posts.post-box :$post/>
        @endforeach
    </div>
</x-layouts.layout>
