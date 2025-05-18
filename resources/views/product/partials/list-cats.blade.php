<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Categoies') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}\\



    <table border="1" cellpadding="10" cellspacing="0" style="color: white;">        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>

                <th>Action</th>

                
             

            </tr>
        </thead>
        <tbody>

            @php
            $i = 1;
            @endphp
        
            @foreach($cats as $customer)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $customer->name }}</td>



                <td>
                    <a href="{{ route('cat.destroy', $customer->id) }}">Delete</a> 

                </td>

             
                @php
                $i++;
                @endphp
                

            </tr>
            @endforeach
        </tbody>
    </table>
    
    
</section>
