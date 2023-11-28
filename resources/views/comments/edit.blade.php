<x-app-layout>
    <div class="pb-12 sm:pb-12">                    
        <div class="max-w-6xl mx-auto sm:px-6 px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('comments.update', $comment) }}">
                @csrf
                @method('patch')
                    <div class="max-w-6xl mx-auto lg:px-8">
                        <div class="border-b border-gray-900/10 pb-8">
                            <div class="mx-auto max-w-2xl lg:mx-0">
                                <h2 class="mt-8 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Edit Your Comment.</h2>                                
                            </div> 
                        </div>   
                    </div>

                    <div class="max-w-3xl mx-auto sm:px-6 px-6 lg:px-8 space-y-6">
                        <div class="border-b border-gray-900/10 pb-8">
                            <div class="p-4 sm:p-8 bg-white sm:rounded-lg">

                                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">                           
                                    <div class="col-span-full">                                        
                                        <div class="mt-2">                                    
                                            <textarea
                                                name="body"
                                                rows="4"
                                                placeholder="{{ __('What are your thoughts?') }}"
                                                class="block w-full border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-300 focus:ring-opacity-50 rounded-md text-sm"
                                                >{{ old('body', $comment->body) }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('posts.show', $comment->post->id) }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                            <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Update</button>
                        </div>                
                    </div>
            </form>
        </div>       
    </div>  
</x-app-layout>