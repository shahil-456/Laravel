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
            <h1 class="text-3xl font-bold mb-4">{{ $blog->title }}</h1>
        
            @if($blog->image)
                <img src="{{ asset('upload/' . $blog->image) }}" alt="Blog Image" class="mb-4 w-full rounded">
            @endif
        
            <p class="text-gray-700 mb-6">{{ $blog->content }}</p>
        
            <p class="text-sm text-gray-500">Posted on {{ $blog->created_at->format('d M Y') }}</p>
        </div>




        <h2 class="text-xl font-semibold mt-10 mb-4">Create a Comment</h2>

        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="blog_id" value="{{ $blog->id }}">

            <div class="mb-4">
                <textarea required name="comment" rows="4" class="w-full border rounded p-2" placeholder="Write your comment..." required></textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Post Comment</button>
        </form>


        <h2 class="text-xl font-semibold mt-10 mb-4">Comments</h2>

        <div class="text-white">
            @forelse($blog->comments as $comment)
                <div class="flex items-start space-x-4 mb-6">
                    <div class="w-10 h-10 rounded-full bg-gray-500 flex-shrink-0"></div>
                    <div>
                        <div class="text-sm">{{ $comment->created_at }}</div>

                        <div class="font-semibold">{{ $comment->user->name }}:{{ $comment->comment }}</div>
                        <div class="mt-1"></div>
                    </div>
                </div>
            @empty
                <p>No comments.</p>
            @endforelse
        </div>
        
    
        


       
</section>
