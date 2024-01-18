<x-app-layout>

    <div class="pb-12 sm:pb-12">                    
        <div class="max-w-6xl mx-auto sm:px-6 px-6 lg:px-8 space-y-6">

            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

                <div class="max-w-6xl mx-auto lg:px-8">
                    <div class="border-b border-gray-900/10 pb-8">
                        <div class="mx-auto max-w-2xl lg:mx-0">
                            <h2 class="mt-8 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Share your thoughts.</h2>
                            <p class="mt-2 text-lg leading-8 text-gray-600">Draft your blog here.</p>
                        </div> 
                    </div>   
                </div>

                <div class="max-w-3xl mx-auto sm:px-6 px-6 lg:px-8 space-y-6">
                    <div class="border-b border-gray-900/10 pb-8">
                        <div class="p-4 sm:p-8 bg-white sm:rounded-lg">

                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">                           
                                <div class="col-span-full">
                                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                        <div class="mt-2">                                    
                                            <input 
                                                id="title" 
                                                name="title"
                                                rows="1"                                         
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="{{ old('title') }}"
                                                required>                                            
                                            @error('title')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                </div>


                                <div class="col-span-full">
                                    <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                                        <div class="mt-2">
                                            <textarea 
                                                id="body" 
                                                name="body" 
                                                rows="10" 
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"                                                
                                                required
                                            >{{ old('body')}}</textarea>
                                            @error('body')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>                            
                                </div>

                                <div class="col-span-full">
                                    <label for="excerpt" class="block text-sm font-medium leading-6 text-gray-900">Excerpt</label>
                                        <div class="mt-2">
                                            <textarea 
                                                id="excerpt" 
                                                name="excerpt" 
                                                rows="4" 
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"                                                
                                                required
                                            >{{ old('excerpt') }}</textarea>
                                            @error('excerpt')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                            
                                        </div>                            
                                </div>

                                <!-- old select -->
                                <!-- <div class="sm:col-span-3">
                                    <label for="category" class="text-sm font-medium leading-6 text-gray-900">Category</label>
                                    <div class="mt-2">
                                        <div x-data="{ show: false}">
                                            <button 
                                                @click="show = ! show"
                                                id="category" 
                                                type="button"
                                                name="category" 
                                                autocomplete="category-name" 
                                                class="inline-flex justify-between pl-3 pr-6 py-1.5 text-left block w-56 rounded-md border-0  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6 ">
                                                
                                
                                                Categories
                                                <div>
                                                    <svg class="fill-current h-6 w-6 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                   
                                            
                                            </button>

                                            <div x-show="show" 
                                                style="display: none" 
                                                class="py-2 w-56 mt-2 z-50 border-0 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                
                                                <a href="#" class="block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">History</a>
                                                <a href="#" class="block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">Cyber Security</a>
                                                <a href="#" class="block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">Technology</a>
                                            </div>

                                        </div>
                                    </div>
                                </div> -->
                                <!-- old select end -->

                                <!-- select menu -->
                                <div class="sm:col-span-3">
                                    <label for="category" class="text-sm font-medium leading-6 text-gray-900">Category</label>
                                    <div class="mt-2">
                                        <select id="category" name="category" class="border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 dark:text-gray-300 dark:focus:ring-indigo-600 dark:focus:border-indigo-600 mt-1">
                                            
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end select menu -->
                                

                                <div class="col-span-full">
                                    <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">Thumbnail</label>
                                        <div class="mt-2 flex items-center gap-x-3">
                                            <svg class="h-16 w-16 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                            </svg>

                                            <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-300">Upload</button>
                                        </div>
                                </div>          

                                <div class="col-span-full">
                                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
                                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                            <div class="text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                                </svg>

                                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 hover:text-blue-500">
                                                            <span>Upload a file</span>
                                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                                        </label>

                                                        <p class="pl-1">or drag and drop</p>
                                                    </div>
                                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                            </div>
                                        </div>
                                </div>  
                            </div>

                        </div>                        
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('posts.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Save</button>
                    </div>

                </div>        
            </form>

        </div>                 
        
    </div>

</x-app-layout>