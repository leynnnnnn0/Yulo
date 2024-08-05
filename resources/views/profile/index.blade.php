<x-layouts.layout>
    <div class="space-y-4">
        <x-profiles.profile-box :user="Auth::user()->username"/>
        @foreach($posts as $post)
            <div>
                @if($post->user_id != Auth::id())
                    <x-posts.shared-post-box :$post/>
                @else
                    <x-posts.post-box :$post/>
                    <x-posts.comment containerId="{{ $post->id . 'commentSection'  }}"
                                     :comments="$post->comments"
                                     :post_id="$post->id"
                    />
                @endif
            </div>
        @endforeach
    </div>
</x-layouts.layout>
