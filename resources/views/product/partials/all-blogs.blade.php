<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('All products') }}
        </h2>

      
    </header>


    
    
    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}
    <style>
          .card * {
          color: white !important;
        }
      </style>
      

    <div class="container mt-8">
      <div style="display: flex; gap: 10px;">

      <form method="GET" action="{{ route('product.all') }}" class="mb-4">
        {{-- <input type="text" name="" class=""> --}}
        <x-text-input id="price" placeholder="Search by name or Description"  name="search" type="text"  class="mt-1 block w-full" required  />

        <button style="background-color: #007bff; color: white; padding: 8px 12px; border: none; cursor: pointer;" type="submit" class="p-2 bg-white-600 text-white rounded">Search</button>
        
    </form>


    <form method="GET" action="{{ route('product.all') }}" class="mb-4">
      <x-text-input id="min" placeholder="Min Price" name="min" type="number" class="mt-1 block w-full" required />
      <x-text-input id="max" placeholder="Max Price" name="max" type="number" class="mt-1 block w-full" required />
      <button style="background-color: #007bff; color: white; padding: 8px 12px; border: none; cursor: pointer;" type="submit" class="p-2 bg-blue-600 text-white rounded">Search</button>
  </form>


  <form method="GET" action="{{ route('product.all') }}" class="mb-4">


    <x-input-label for="category_id" :value="__('Category')" />
    <select id="category_id" name="category_id" class="mt-1 block w-full" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <button style="background-color: #007bff; color: white; padding: 8px 12px; border: none; cursor: pointer;" type="submit" class="p-2 bg-blue-600 text-white rounded">Search</button>
</form>
  

      </div>
    </div>

    <style>
      .btn-blue {
        background-color: #007bff;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
      }
    
      .btn-red {
        background-color: #dc3545;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
      }
    
      .btn-blue:hover, .btn-red:hover {
        opacity: 0.8;
      }
    </style>


      <a href="{{ route('cart.index') }}"><button style="background-color: blue; color: white; float: right; padding: 8px 16px; border: none; border-radius: 4px;">
        Cart
      </button></a>
        <div class="row g-4">
          
          @foreach($products as $blog)
            <div class="col-md-4">
              <div class="card h-100">
                <img src="{{ asset('upload/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">{{ $blog->name }}</h5>
                  <p class="card-text flex-grow-1">Price: $ {{ number_format($blog->price, 2) }}</p>
                  <h6 class="card-title">Category: {{ $blog->category->name }}</h6>

                  {{-- <a href="{{ route('blog.view', $blog->id) }}" class="btn btn-primary mt-auto">Details...</a> --}}

                  <div style="display: flex; gap: 10px; align-items: center;">
                    <form method="POST" action="{{ route('cart.add') }}">
                      @csrf
                      <input type="hidden" name="product_id" value="{{ $blog->id }}">
                      <button type="submit" style="background-color: #007bff; color: white; padding: 8px 12px; border: none; cursor: pointer;">Add to Cart</button>
                    </form>
                  
                    @auth
                    @if(auth()->user()->role === 'admin')
                      <a href="{{ route('product.destroy', $blog->id) }}" style="background-color: red; color: white; padding: 8px 12px; text-decoration: none; display: inline-block;">Delete</a>
                    @endif
                    @endauth
                  </div>
                  




                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      
      
      
    
</section>
