<x-app-layout>
    
    <div class="pb-12 sm:pb-12">
        <div class="max-w-6xl mx-auto sm:px-6 px-6 lg:px-8 space-y-6">
            
            <div class="max-w-6xl mx-auto lg:px-8">
                <div class="border-b border-gray-900/10 pb-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="mt-8 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Stay curious.</h2>
                        <p class="mt-2 text-lg leading-8 text-gray-600">Discover stories.</p>
                    </div>
                </div>
            </div>
    
            <div class="max-w-3xl mx-auto sm:px-6 px-6 lg:px-8 space-y-6">
                <div class="pb-8">
                    <div class="p-4 sm:p-8 bg-white sm:rounded-lg">

                        <div class="space-y-20 lg:space-y-20">
                            @foreach ($posts as $post)
                                <article class="relative isolate flex flex-col gap-8 lg:flex-row">                                    
                                    <div>
                                        <div class="flex items-center gap-x-4 text-xs">
                                            @if ($post->created_at->eq($post->updated_at))
                                                <time class="text-gray-500">{{ __('Published :time', ['time' => $post->updated_at->diffForHumans()]) }}</time>
                                            @else
                                                <time class="text-gray-500">{{ __('Edited :time', ['time' => $post->updated_at->diffForHumans()]) }}</time>
                                            @endif
                                            <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Category</a>
                                        </div>
                                        <div class="group relative max-w-3xl">
                                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                                <a href="/posts/{{ $post->id }}">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                            <p class="mt-5 text-sm leading-6 text-black text-justify">
                                            {{ $post->excerpt }}
                                            </p>
                                        </div>
                                        <div class="mt-6 flex border-t border-gray-900/5 pt-6">
                                            <div class="relative flex items-center gap-x-4">
                                                <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                                <div class="text-sm leading-6">
                                                    <p class="font-semibold text-gray-900">
                                                        @if ($post->user->is(auth()->user()))   
                                                            <a href="/profile">                                        
                                                                <span class="absolute inset-0"></span>
                                                                {{ $post->user->name }}
                                                            </a>
                                                        @else
                                                            <a href="{{ route('posts.index') }}">                                        
                                                                <span class="absolute inset-0"></span>
                                                                {{ $post->user->name }}                                    
                                                            </a>
                                                        @endif  
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>       
    
        </div>
    </div>


</x-app-layout>





