<section class="h-36 bg-primary w-full rounded-lg">
</section>
<section class="flex gap-3 px-5">
    <div>
        <img src="http://picsum.photos/seed/{{ rand(1, 100) }}/100"
             alt="Profile"
             class="rounded-full -mt-14"
        >
    </div>
    <div>
        <h1 class="text-2xl font-bold">{{ Auth::user()->username }}</h1>
        <strong class="text-xs">0 follower</strong>
    </div>
</section>
