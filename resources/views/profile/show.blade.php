<x-layouts.layout>
    <div class="space-y-4">
        <x-profiles.profile-box :user="$user->username"/>
        @foreach($posts as $post)
            @if($post->id != $user->id )
                <x-posts.shared-post-box :$post :user="$user->username"/>
            @else
                <div>
                    <x-posts.post-box :$post
                    />
                    <x-posts.comment containerId="{{ $post->id . 'commentSection'  }}"
                                     :comments="$post->comments"
                                     :post_id="$post->id"

                    />
                </div>
            @endif
        @endforeach
    </div>

</x-layouts.layout>

