<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Orders') }}
        </h2>

       
    </header>

    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}\\



    <table border="1" cellpadding="10" cellspacing="0" style="color: white;">        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>

                <th>Quantity</th>
                <th>Total</th>

                <th>Date</th>


                
             

            </tr>
        </thead>
        <tbody>

            @php
            $i = 1;
            @endphp
        
            @foreach($orders as $customer)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $customer->product->name }}</td>
                <td>{{ $customer->price }}</td>

                <td><img src="{{ asset('upload/'.$customer->product->image) }}" alt="image" class="h-7 w-7 object-cover"></td>


                <td>{{ $customer->quantity }}</td>
                <td>{{ $customer->total }}</td>
                <td>{{ \Carbon\Carbon::parse($customer->ordered_at)->format('d M Y') }}</td>


                

             
                @php
                $i++;
                @endphp
                

            </tr>
            @endforeach
        </tbody>
    </table>
    
    
</section>
