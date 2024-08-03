<div>
    <section class="flex p-3 gap-3 bg-white/5 rounded-r-lg border-b border-r border-primary h-auto">
        <div>
            <x-rounded-image/>
        </div>
        <div class="flex-1 flex flex-col">
            <a href="/" class="font-bold text-medium">John Doe</a>
            <span class="text-2xs text-gray-400">30 minutes ago</span>
            <p class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam at autem blanditiis delectus deleniti, dignissimos distinctio eaque ex illum itaque libero maxime modi nesciunt numquam odio optio pariatur perferendis quaerat quam recusandae, soluta veritatis vitae. Aspernatur cum eum pariatur! Doloribus.</p>
            <div class="flex items-center justify-between">
                <x-posts.action for="Likes"/>
                <x-posts.action for="Comments"/>
                <x-posts.action for="Share"/>
            </div>
        </div>
    </section>

</div>
