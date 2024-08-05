<x-layouts.layout>
    <div class="space-y-4">
        <x-profiles.profile-box :user="Auth::user()" :followers="$followers"/>
        @foreach($posts as $post)
            <div>
                @if($post->user_id != Auth::id())
                    <x-posts.shared-post-box :$post :user="Auth::user()->username "/>
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
