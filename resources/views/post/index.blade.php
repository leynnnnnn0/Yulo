<x-layouts.layout>
    <x-alerts.success/>
    <div class="space-y-4">
        <x-posts.whats-new/>
        @foreach($posts as $post)
            <div>
                <x-posts.post-box :$post/>
                <x-posts.comment containerId="{{ $post->id . 'commentSection'  }}" :comments="$post->comments"/>
            </div>
        @endforeach
    </div>
</x-layouts.layout>
