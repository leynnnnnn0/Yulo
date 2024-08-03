<x-head/>
{{--    @auth--}}
{{--        <div id="createPost" class="hidden flex items-center justify-center fixed t-0 h-full w-full bg-primary bg-opacity-10">--}}
{{--            <x-create-post/>--}}
{{--        </div>--}}
{{--    @endauth--}}
    <x-navigation.nav/>
    <main class="max-w-[800px] mx-auto mt-10">
        {{ $slot }}
    </main>
<x-footer/>
