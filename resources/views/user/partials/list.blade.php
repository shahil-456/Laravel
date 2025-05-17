<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Users') }}
        </h2>

       
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}\\



    <table border="1" cellpadding="10" cellspacing="0" style="color: white;">        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                {{-- <th>Action</th> --}}


            </tr>
        </thead>
        <tbody>

            @php
            $i = 1;
            @endphp
        
            @foreach($users as $customer)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->role }}</td>
                <td>{{ $customer->status }}</td>

                <td>
                    {{-- <a href="{{ route('customer.edit', $customer->id) }}">Edit</a> | --}}
                    {{-- <a href="{{ route('user.destroy', $customer->id) }}">Delete</a> | --}}

                </td>


                {{-- <td>
                    <a href="{{ route('invoice.customer', $customer->id) }}">View</a> |

                </td> --}}




                @php
                $i++;
                @endphp
                

            </tr>
            @endforeach
        </tbody>
    </table>
    
    
</section>
