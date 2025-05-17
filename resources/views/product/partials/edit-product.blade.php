<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Edit Product') }}
        </h2>

      
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}

    {{-- <form method="post"  enctype="multipart/form-data" action="{{ route('product.update') }}" class="mt-6 space-y-6"> --}}
    <form method="post" enctype="multipart/form-data" action="{{ route('product.update', ['id' => $product->id]) }}" class="mt-6 space-y-6">
    
        @csrf
        @method('post')


        
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" value="{{ $product->name }}" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        
    
        

        <div>
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input value="{{ $product->price }}" id="price" name="price" type=""  class="mt-1 block w-full" required autocomplete="price" />
            <x-input-error class="mt-2" :messages="$errors->get('price')" />
        </div>


        <div>
            <x-input-label for="price" :value="__('Description')" />
            <x-text-input value="{{ $product->description }}" id="price" name="description" type="text"  class="mt-1 block w-full" required autocomplete="price" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>


        <div>
            <x-input-label for="category_id" :value="__('Category')" />
            <select id="category_id" name="category_id" class="mt-1 block w-full" required>
                @foreach($cats as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
        </div>
        
  


        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input  id="image" name="image" type="file" class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>


        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

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
