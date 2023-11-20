<x-app-layout>
    <div class="pb-12 sm:pb-12">
        <div class="mx-auto max-w-6xl sm:px-6 px-6 lg:px-8 space-y-6">
            
            <div class="max-w-6xl mx-auto lg:px-8">
                <div class="border-b border-gray-900/10 pb-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="mt-8 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Stay curious.</h2>
                        <p class="mt-2 text-lg leading-8 text-gray-600">Discover stories.</p>
                    </div>
                </div>
            </div>
                                  

            <div class="mx-auto mt-8 grid max-w-3xl grid-cols-1 gap-x-12 gap-y-16 sm:mt-16 sm:p-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            
                @foreach ($posts as $post)
                    <article class="flex max-w-xl flex-col items-start justify-between">
                        
                        <div class="flex items-center gap-x-4 text-xs">
                            <time  class="text-gray-500">{{ $post->created_at->diffForHumans() }}</time>
                            <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Category</a>
                        </div>

                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 hover:text-gray-500">
                                <a href="/posts/{{ $post->id }}">
                                <span class="absolute inset-0"></span>
                                {{ $post->title }}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-black text-justify">                                
                            {{ $post->excerpt }}
                            </p>
                        </div>                        

                        <div class="relative mt-8 flex items-center gap-x-4">            
                            <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                            <div class="text-sm leading-6">
                                <p class="font-semibold text-gray-900">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        {{ $post->user->name }}
                                    </a>
                                </p>                                
                            </div>
                        </div>

                    </article>
                @endforeach

                <!-- More posts... -->

                <article class="flex max-w-xl flex-col items-start justify-between">
                    
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                        <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Marketing</a>
                    </div>

                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 hover:text-gray-500">
                            <a href="#">
                            <span class="absolute inset-0"></span>
                            Boost your conversion rate
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-black text-justify">
                            Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.
                        </p>
                    </div>

                    <div class="relative mt-8 flex items-center gap-x-4">            
                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Michael Foster
                            </a>
                            </p>
                            <p class="text-gray-600">Co-Founder</p>
                        </div>
                    </div>

                </article>

                <article class="flex max-w-xl flex-col items-start justify-between">
                    
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                        <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Marketing</a>
                    </div>

                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 hover:text-gray-500">
                            <a href="#">
                            <span class="absolute inset-0"></span>
                            Boost your conversion rate
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-black text-justify">
                            Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.
                        </p>
                    </div>

                    <div class="relative mt-8 flex items-center gap-x-4">            
                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Michael Foster
                            </a>
                            </p>
                            <p class="text-gray-600">Co-Founder</p>
                        </div>
                    </div>

                </article>                

            </div>
        </div>
    </div>
</x-app-layout>