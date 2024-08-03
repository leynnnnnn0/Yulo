<x-layouts.layout>
       <div class="space-y-4">
           <x-heading>Register</x-heading>
           <form action="/register" method="POST" class="flex flex-col gap-5">
               @csrf
               <x-forms.input label="Username"
                              name="username"
                              id="username"
                              placeholder="john.doe"
                              :value="old('username')"
                              error="username"
                              type="text"/>
               <x-forms.input label="Email"
                              name="email"
                              id="email"
                              placeholder="john.doe@gmail.com"
                              :value="old('email')"
                              error="email"
                              type="email"/>
               <x-forms.input label="Password"
                              name="password"
                              id="password"
                              error="password"
                              type="password"/>
               <x-forms.input label="Confirm Password"
                              name="password_confirmation"
                              id="password_confirmation"
                              type="password"/>
               <div class="flex justify-end">
                   <x-button type="submit">Register</x-button>
               </div>
           </form>
       </div>

</x-layouts.layout>
