<nav class="w-full flex items-center justify-between h-24 border-b-2 border-primary/10 px-20">
    <section>
        <a href="/">
            <img src="{{Vite::asset('resources/images/logo.png')}}" width="50" alt="logo">
        </a>
    </section>

    <section class="flex items-center font-bold gap-5">
        <x-navigation.nav-link href="/">Home</x-navigation.nav-link>
        <x-navigation.nav-link href="/profile">Profile</x-navigation.nav-link>
        <x-navigation.nav-link href="/">Trending</x-navigation.nav-link>
    </section>

    @guest
        <section class="flex items-center font-bold gap-5">
            <x-navigation.nav-link href="/register">Register</x-navigation.nav-link>
            <x-navigation.nav-link href="/login">Login</x-navigation.nav-link>
        </section>
    @endguest

    @auth
        <form method="POST" action="/logout" class="flex items-center font-bold gap-5">
            @csrf
            @method('DELETE')
            <button type="submit" class="hover:text-orange-200 transition-colors duration-300">Log out</button>
        </form>
    @endauth
</nav>
