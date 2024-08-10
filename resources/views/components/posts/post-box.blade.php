@props(['post'])
<div>
    <section class="flex p-3 gap-3 bg-white/5 rounded-r-lg border-b border-r border-primary h-auto">
        <div>
            <x-rounded-image/>
        </div>
        <div class="flex-1 flex flex-col">
            <div class="flex justify-between">
                <section class="flex flex-col w-fit">
                    <a href="/profile/{{ $post->user->id }}" class="font-bold text-medium">{{ $post->user->username  }}</a>
                    <span class="text-2xs text-gray-400">{{ $post->created_at }}</span>
                </section>
                <section class="flex flex-col w-52 items-end">
                    <span onclick="showPostOptions('{{ $post->id }}')" class="cursor-pointer ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                        </svg>
                    </span>
                    <div id="{{ $post->id }}" class="absolute mr-4 flex flex-col bg-white/10 mr-19 w-32 rounded-lg text-sm font-bold z-20 hidden">
                        @auth
                            @if($post->user->id === Auth::id())
                                <a href="/post/edit/{{ $post->id }}" class="px-2 py-1 cursor-pointer border-b border-white/10">EDIT</a>
                                <form action="/delete/delete/{{ $post->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button wire:click.prevent="delete" type="submit" class="px-2 py-1 cursor-pointer border-b border-white/10">DELETE</button>
                                </form>
                            @endif
                        @endauth
                        <a href="" class="px-2 py-1 cursor-pointer">Add to favorites</a>
                    </div>
                </section>
            </div>
            <p class="z-0 my-3">{{ $post->body }}</p>
            <div class="flex items-center justify-between">
                <x-posts.action onclick="vote('{{ $post->id }}')"
                                id="{{ $post->id . 'vote' }}" icon='fa-regular fa-thumbs-up'
                                for="{{ count($post->votes) }}"
                                count="{{ $post->id .'voteCount' }}"
                                class='{{ Auth::user() && $post->votes->contains("user_id", Auth::id()) ?  "text-orange-700" : "" }}'
                />
                <x-posts.action icon='fa-solid fa-comment'
                                for="{{ count($post->comments) . ' Comments' }}"
                                onclick="commentSection('{{ $post->id }}')"
                />
                <x-posts.action icon='fa-solid fa-share'
                                for="{{ count($post->userSharedPosts) . ' Shares' }}"
                                onclick="sharePost('{{ $post->id }}')"
                />
            </div>
        </div>
    </section>
</div>

