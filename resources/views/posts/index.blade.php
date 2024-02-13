<x-app-layout>
    
    <div class="pb-12 sm:pb-12">
        <div class="max-w-6xl mx-auto sm:px-6 px-6 lg:px-8 space-y-6">
            
            <div class="max-w-6xl mx-auto lg:px-8">
                <div class="border-b border-gray-900/10 pb-8">
                    <div class="mt-8 mx-auto lg:mx-0 mb-8">
                        <!-- <h2 class="mt-8 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Stay curious.</h2>
                        <p class="mt-2 text-lg leading-8 text-gray-600">Discover stories.</p> -->
                        
                        <div class="relative isolate flex flex-col justify-center space-x-10 lg:flex-row">
                        <!-- Category Dropdown -->

                            <div x-data="{ show: false }" @click.away="show = false">
                                <button 
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                    @click="show = ! show"  >                           
                                    
                                        <div>{{ isset($currentCategory) ?  ucwords($currentCategory->name) : 'Categories' }}</div>
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                </button> 

                                <div x-show="show" class="py-2 absolute bg-gray-100 w-32 mt-2 z-50" style="display: none">
                                        <a  href="/posts" 
                                            class="block text-left px-3 text-sm leading-6 hover:bg-blue-400 focus:bg-blue-400 hover:text-white focus:text-white">
                                            All
                                        </a>
                                    @foreach ($categories as $category)
                                        <a  href="/categories/{{ $category->id }}" 
                                            class="block text-left px-3 text-sm leading-6 hover:bg-blue-400 focus:bg-blue-400 hover:text-white focus:text-white
                                            {{ isset($currentCategory) && $currentCategory->id == $category->id ? 'bg-blue-400 text-white' : '' }} ">
                                            
                                            {{ ucwords($category->name)}}
                                        </a>
                                    @endforeach
                                    
                                </div>
                            </div>

                            <!-- Search -->
                            <div class="relative flex lg:inline-flex items-center">
                                <form action="#" method="GET">
                                    <input  type="text" 
                                            name="search" 
                                            placeholder="Quick Search"
                                            value="{{ request('search') }}"
                                            class="block w-full rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                </form>                           

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            
                    
            <div class="pb-8 max-w-3xl mx-auto sm:px-6 px-6 lg:px-8 space-y-6">
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

                                        <a href="#" class="relative z-10 rounded-full px-2 py-1 text-xs font-medium text-indigo-800 ring-1 ring-inset ring-indigo-600/20 hover:bg-indigo-50">
                                            {{ $post->category->name }}
                                        </a>

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
                                                    <a href="/authors/{{ $post->author->id }}">                                        
                                                        <span class="absolute inset-0"></span>
                                                        {{ $post->author->name }}
                                                    </a>
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


</x-app-layout>





