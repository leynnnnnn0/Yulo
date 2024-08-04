@if(Session::has('success'))
    <div class="w-full px-3 py-1 bg-green-400 text-white font-bold text-2xl rounded-lg mb-3">
        {{ Session::get('success') }}
    </div>
@endif
