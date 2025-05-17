<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add Blog') }}
        </h2>

      
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}

    <form method="post" enctype="multipart/form-data" action="{{ route('blog.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')


        
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        
    
    
    
        
        <div>
            <x-input-label for="description" :value="__('Content')" />
            <x-text-input id="description" name="content" type="text" class="mt-1 block w-full" required autocomplete="description" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        



        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        

        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
