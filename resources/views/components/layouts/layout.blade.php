<x-head/>
    <x-notify::notify />
    @notifyJs
    <x-posts.create-post/>
    @if (session('edit'))
        <x-posts.edit-post :post="session('post')"/>
    @endif
    <x-navigation.nav/>
    <main class="max-w-[800px] mx-auto mt-10 h-full">
        {{ $slot }}
    </main>
<x-footer/>
