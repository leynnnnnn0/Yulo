<x-layouts.layout>
    <div class="space-y-4">
        <x-profiles.profile-box :user="$user->username"/>
        @foreach($user->posts as $post)
            <div>
                <x-posts.post-box :$post/>
                <x-posts.comment containerId="{{ $post->id . 'commentSection'  }}"
                                 :comments="$post->comments"
                                 :post_id="$post->id"
                />
            </div>
        @endforeach
    </div>

</x-layouts.layout>

