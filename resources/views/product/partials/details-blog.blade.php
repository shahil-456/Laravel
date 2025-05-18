<section>
    <header>
        {{-- <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add Blog') }}
        </h2> --}}

      
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}

        @csrf
        @method('post')


        
        <div class="max-w-2xl mx-auto mt-8">
            <h1 style="color: white;" class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
        
            @if($product->image)
                <img src="{{ asset('upload/' . $product->image) }}" alt="Blog Image" class="mb-4 w-full rounded">
            @endif
        
            <p style="color: white;" class="text-gray-700 mb-6">{{ $product->description }}</p>

            <p style="color: white;" class="text-gray-700 mb-6">Catgory: {{ $product->category->name }}</p>

            <p style="color: white;" class="text-gray-700 mb-6">Price: ${{ $product->price }}</p>


        
            <p style="color: white;" class="text-sm text-white-500">Posted on {{ $product->created_at->format('d M Y') }}</p>
        </div>





       



       
        
    
        


       
</section>
