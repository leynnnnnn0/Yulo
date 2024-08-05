@props(['user', 'followers' => collect()])
<section class="h-36 bg-primary w-full rounded-lg">
</section>
<section class="flex gap-3 px-5">
    <div>
        <img src="http://picsum.photos/seed/{{ rand(1, 100) }}/100"
             alt="Profile"
             class="rounded-full -mt-14"
        >
    </div>
    <div class="flex justify-between w-full">
        <section>
            <h1 class="text-2xl font-bold">{{ $user->username }}</h1>
            <strong class="text-xs">{{ $followers->count() }} followers</strong>
        </section>
        <section>
                @if($user->id != Auth::id())
                @if($followers->where('follower_id', Auth::id())->first())
                    <form action="/unfollow" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="text" hidden name="followed_id" value="{{ $user->id }}">
                        <button type="submit"
                                class="bg-orange-500 transition-colors duration-300 hover:bg-primary px-3 py-1  rounded-lg font-bold">
                            <i class="fa-solid fa-user"></i>
                            Following</button>
                    </form>
                @else
                    <form action="/follow" method="POST">
                        @csrf
                        <input type="text" hidden name="followed_id" value="{{ $user->id }}">
                        <button type="submit"
                                class="hover:bg-orange-500 transition-colors duration-300 bg-primary px-3 py-1  rounded-lg font-bold">
                            <i class="fa-solid fa-user-plus"></i>
                            Follow</button>
                    </form>
                @endif
            @endif

        </section>
    </div>
</section>
