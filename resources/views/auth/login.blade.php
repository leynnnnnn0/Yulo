<x-layouts.layout>
        <div class="space-y-4">
            <x-heading>Login</x-heading>
            <form action="/login" method="POST" class="flex flex-col gap-5 w-full">
                @csrf
                <x-forms.input label="Email"
                               name="email"
                               id="email"
                               placeholder="john.doe@gmail.com"
                               :value="old('email')"
                               type="email"/>
                <x-forms.input label="Password"
                               name="password"
                               id="password"
                               error="email"
                               type="password"/>
                <div class="flex justify-end w-full">
                    <x-button type="submit">Login</x-button>
                </div>
            </form>
        </div>

</x-layouts.layout>
