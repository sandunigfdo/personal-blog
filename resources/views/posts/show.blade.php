<x-app-layout>

    <div class="pb-12 sm:pb-12">                
        <div class="mx-auto max-w-6xl sm:px-6 px-6 lg:px-8 space-y-6">

            <div class="max-w-6xl mx-auto lg:px-8">
                <div class="border-b border-gray-900/10 pb-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="mt-8 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $post->title }}</h2>
                    </div> 
                </div>   
            </div>

            <div class="max-w-3xl mx-auto sm:px-6 px-6 lg:px-8 space-y-6"> 
                <div class="border-b border-gray-900/10 pb-8">                    
                    <div class="p-4 sm:p-8 bg-white sm:rounded-lg">

                        <article class="max-w-xl items-start">              
                            <div class="flex items-center gap-x-4 text-xs justify-between">
                                <div>

                                    @if ($post->created_at->eq($post->updated_at))
                                        <time class="text-gray-500">{{ __('Published :time', ['time' => $post->created_at->diffForHumans()]) }}</time>
                                    @endif
                                        <time class="text-gray-500">{{ __('Edited :time', ['time' => $post->updated_at->diffForHumans()]) }}</time>

                                    <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Category</a>
                                </div>
                                
                                <div>
                                    @if ($post->user->is(auth()->user()))
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('posts.edit', $post)">
                                                    {{ __('Edit') }}
                                                </x-dropdown-link>
                                                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link :href="route('posts.destroy', $post)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Delete') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    @endif
                                </div>
                            </div>

                            <div class="group relative">                                
                                <p class="mt-5 text-sm leading-6 text-black text-justify">                                
                                {{ $post->body }}
                                </p>
                            </div>                        

                            <div class="relative mt-8 flex items-center gap-x-4">            
                                <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900">
                                        <a href="/profile">
                                            <span class="absolute inset-0"></span>
                                            {{ $post->user->name }}
                                        </a>
                                    </p>                                
                                </div>
                            </div>

                        </article>
                    </div>                
                </div>
            </div>
        </div>
    </div>

</x-app-layout>