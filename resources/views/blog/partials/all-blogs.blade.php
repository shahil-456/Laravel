<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('All Blogs') }}
        </h2>

      
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}
    <style>
        body, .card, .card * {
          color: white !important;
        }
      </style>
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
      

    <div class="container mt-4">
        <div class="row g-4">
          @foreach($blogs as $blog)
            <div class="col-md-4">
              <div class="card h-100">
                <img src="{{ asset('upload/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">{{ $blog->title }}</h5>
                  <p class="card-text flex-grow-1">{{ Str::limit($blog->content, 150) }}...</p>


                  <a href="{{ route('blog.view', $blog->id) }}" class="btn-blue">Details...</a>


                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('blog.destroy', $blog->id) }}" class="btn-red">Delete</a>
                        @endif
                    @endauth
                  
                  
                  



                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      
      
      
    
</section>
