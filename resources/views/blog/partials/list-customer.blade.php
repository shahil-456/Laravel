<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Blogs') }}
        </h2>

        
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}\\



    <table border="1" cellpadding="10" cellspacing="0" style="color: white;">        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Content</th>
                <th>Image</th>

                <th>Action</th>
                <th>View</th>


            </tr>
        </thead>
        <tbody>

            @php
            $i = 1;
            @endphp
        
            @foreach($blogs as $blog)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->content }}</td>
                <td><img src="{{ asset('upload/'.$blog->image) }}" alt="image" class="h-12 w-12 object-cover">
                </td>

                <td>
                    <a href="{{ route('blog.edit', $blog->id) }}">Edit</a> |
                    <a href="{{ route('blog.destroy', $blog->id) }}">Delete</a> 

                </td>

                <td>
                    <a href="{{ route('blog.view', $blog->id) }}">View</a> 



                </td>

                @php
                $i++;
                @endphp
                
            </tr>
            @endforeach
        </tbody>
    </table>
    
    
</section>
