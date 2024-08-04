@props(['containerId' => false, 'comments'])
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
                <section class="space-y-1">
                    <a href="" class="text-sm font-bold">{{ $comment->user->username }}</a>
                    <p>{{ $comment->body }}</p>
                </section>
            </div>
            @endforeach
    </div>
    <form id="commentForm" action="/comment" method="POST" class="flex items-center w-full rounded-lg gap-3">
        @csrf
        <input name="post_id" type="text" hidden>
        <div>
            <x-rounded-image/>
        </div>
        <input type="text"
               name="body"
               id="commentBody"
               class="bg-white/10 rounded-md w-full h-10 px-5 focus:outline-none"
               placeholder="Leave a comment">
        <button id="addComment" type="submit" class="bg-primary rounded-lg px-3 py-1 ">Comment</button>
    </form>
</div>
