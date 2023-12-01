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
                <div class="pb-8">                    
                    <div class="p-4 sm:p-8 bg-white sm:rounded-lg">

                        <article class="max-w-xl items-start">              
                            <div class="flex items-center gap-x-4 text-xs justify-between">
                                <div>

                                    @if ($post->created_at->eq($post->updated_at))
                                        <time class="text-gray-500">{{ __('Published :time', ['time' => $post->created_at->diffForHumans()]) }}</time>
                                    @else
                                        <time class="text-gray-500">{{ __('Edited :time', ['time' => $post->updated_at->diffForHumans()]) }}</time>
                                    @endif
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

                            <div class="relative flex items-center gap-x-4 border-b border-gray-900/10 pt-8 pb-8 max-w-3xl mx-auto sm:px-6 px-6 lg:px-8">            
                                <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900">
                                    @if ($post->user->is(auth()->user()))   
                                        <a href="/profile">                                        
                                            <span class="absolute inset-0"></span>
                                            {{ $post->user->name }}
                                        </a>
                                    @else
                                        <a href="{{ route('posts.show', $post) }}">                                        
                                            <span class="absolute inset-0"></span>
                                            {{ $post->user->name }}                                    
                                        </a>
                                    @endif
                                    </p>                                
                                </div>
                            </div>
                            
                            <div class="max-w-3xl mx-auto sm:p-6 p-6 lg:p-8  ">
                                <form method="POST" action="/posts/{{ $post->id }}/comments">
                                    @csrf
                                    <textarea
                                        name="body"
                                        rows="3"
                                        placeholder="{{ __('What are your thoughts?') }}"
                                        class="block w-full border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-300 focus:ring-opacity-50 rounded-md text-sm"
                                    >{{ old('body') }}</textarea>
                                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                                    <div class="mt-8 flex justify-end">
                                        <button
                                            type="submit" 
                                            class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                                        >{{ __('Respond') }}
                                    </button>
                                    </div>
                                </form>
                            </div>  
                            
                            <div class="max-w-3xl mx-auto sm:p-6 p-6 lg:p-8">
                                @foreach ($post->comments as $comment)
                                    <div class="p-4 mt-8 flex space-x-2 rounded-md border border-gray-300 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                        <div class="flex-1">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <span class="text-sm text-gray-800">{{ $comment->user->name }}</span>
                                                    @if ($comment->created_at->eq($comment->updated_at))
                                                        <time class="text-xs text-gray-500">{{ __('Published :time', ['time' => $comment->created_at->diffForHumans()]) }}</time>
                                                    @else
                                                        <time class="text-xs text-gray-500">{{ __('Edited :time', ['time' => $comment->updated_at->diffForHumans()]) }}</time>
                                                    @endif                                                                                                              
                                                </div>
                                                @if ($comment->user->is(auth()->user()))
                                                    <x-dropdown>
                                                        <x-slot name="trigger">
                                                            <button>
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                </svg>
                                                            </button>
                                                        </x-slot>
                                                        <x-slot name="content">
                                                            <x-dropdown-link :href="route('comments.edit', $comment)">
                                                                {{ __('Edit') }}
                                                            </x-dropdown-link>
                                                            <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <x-dropdown-link :href="route('comments.destroy', $comment)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                    {{ __('Delete') }}
                                                                </x-dropdown-link>
                                                            </form>
                                                        </x-slot>
                                                    </x-dropdown>
                                                @endif
                                            </div>
                                            <p class="mt-4 text-sm text-gray-900">{{ $comment->body }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </article>
                    </div>                
                </div>
            </div>
        </div>
    </div>

</x-app-layout>