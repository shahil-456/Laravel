<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Cart Items') }}
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
      

    <div class="container mt-6">

    
        <div class="row g-6">


          <table style="width:100%; border-collapse: collapse; color: white;">
            <thead>
                <tr style="background-color: #333;">
                    <th style="padding: 10px; border: 1px solid #555;">Product</th>
                    <th style="padding: 10px; border: 1px solid #555;">Quantity</th>
                    <th style="padding: 10px; border: 1px solid #555;">Price</th>
                    <th style="padding: 10px; border: 1px solid #555;">Total</th>
                </tr>
            </thead>
            <tbody>
                @php $total_ = 0; @endphp
                @foreach($carts as $item)
                    @php
                        $total = $item->quantity * $item->product->price;
                        $total_ += $total;
                    @endphp
                    <tr style="background-color: #444;">
                        <td style="padding: 10px; border: 1px solid #555;">{{ $item->product->name }}</td>
                        <td style="padding: 10px; border: 1px solid #555;">{{ $item->quantity }}</td>
                        <td style="padding: 10px; border: 1px solid #555;">${{ number_format($item->product->price, 2) }}</td>
                        <td style="padding: 10px; border: 1px solid #555;">${{ number_format($total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background-color: #222;">
                    <td colspan="3" style="padding: 10px; border: 1px solid #555; text-align: right;"><strong>Total:</strong></td>
                    <td style="padding: 10px; border: 1px solid #555;">${{ number_format($total_, 2) }}</td>
                </tr>
            </tfoot>
        </table>



        <a href="{{ route('checkout') }}"><button style="background-color: blue; color: white; float: right; padding: 8px 16px; border: none; border-radius: 4px;">
          Checkout
        </button></a>
        
          
         
        </div>
      </div>
      
      
      
    
</section>
