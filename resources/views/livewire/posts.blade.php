<div>
    @foreach($posts as $post)
        <div>
            <x-posts.post-box :$post/>
            <x-posts.comment containerId="{{ $post->id . 'commentSection'  }}"
                             :comments="$post->comments"
                             :post_id="$post->id"
            />
        </div>
    @endforeach
</div>
