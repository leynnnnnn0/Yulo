@props(['containerId' => false, 'comments', 'post_id'])
<div id="{{ $containerId }}" class="hidden bg-secondary p-3 bg-white/5 space-y-2">
    @if(count($comments) > 1)
        <h1 class="text-white/50 font-bold text-sm cursor-pointer underline">View more comments</h1>
    @endif

    <div class="flex flex-col gap-3">
        @foreach($comments as $comment)
            <div class="flex gap-3 pb-2">
                <section>
                    <x-rounded-image/>
                </section>
                <section class="space-y-1 w-full">
                    <div class="flex justify-between">
                        <a href="" class="w-full text-sm font-bold">{{ $comment->user->username }}</a>
                        <section class="flex flex-col w-52 items-end">
                            <span onclick="showCommentOptions('{{ $comment->id }}')" class="cursor-pointer ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                            </span>
                            <form id="{{ $comment->id . 'commentOptions' }}" action="/comment/delete" method="POST" class="absolute mr-4 flex flex-col bg-white/10 mr-19 w-32 rounded-lg text-sm font-bold z-20 hidden">
                                @csrf
                                @method('DELETE')
                                <input type="text" hidden name="comment_id" value="{{$comment->id}}">
                                <button form="{{ $comment->id . 'commentOptions' }}" type="submit" class="px-2 py-1 cursor-pointer">Delete</button>
                            </form>
                        </section>
                    </div>
                    <p>{{ $comment->body }}</p>
                </section>
            </div>
            @endforeach
    </div>
    <form action="/comment/add" method="POST" class="flex items-center w-full rounded-lg gap-3">
        @csrf
        <input name="post_id" type="text" value="{{ $post_id }}" hidden>
        <div>
            <x-rounded-image/>
        </div>
        <input type="text"
               name="body"
               id="commentBody"
               class="bg-white/10 rounded-md w-full h-10 px-5 focus:outline-none"
               placeholder="Leave a comment">
        <button type="submit" class="bg-primary rounded-lg px-3 py-1 ">Comment</button>
    </form>
</div>
