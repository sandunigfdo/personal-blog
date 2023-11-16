<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>     

    <div class="pb-12 sm:pb-12"> 
        <div class="mx-auto max-w-6xl sm:px-6 px-6 lg:px-8 space-y-6">
            
            <div class="max-w-6xl mx-auto lg:px-8">
                <div class="border-b border-gray-900/10 pb-8">
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="mt-8 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ auth()->user()->name }}</h2>
                        <p class="mt-2 text-lg leading-8 text-gray-600">Your Profile</p>
                    </div> 
                </div>   
            </div>

            <div class="max-w-3xl mx-auto sm:px-6 px-6 lg:px-8 space-y-6">                     
                
                <div class="border-b border-gray-900/10 pb-8">
                    <div class="p-4 sm:p-8 bg-white sm:rounded-lg">
                        <div class="max-w-2xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>
                
                <div class="border-b border-gray-900/10 pb-8">
                    <div class="p-4 sm:p-8 bg-white sm:rounded-lg">
                        <div class="max-w-2xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
                
                <div class="border-b border-gray-900/10 pb-8">
                    <div class="p-4 sm:p-8 bg-white sm:rounded-lg">
                        <div class="max-w-2xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>       
                
            </div>
        </div>        
    </div>
</x-app-layout>
