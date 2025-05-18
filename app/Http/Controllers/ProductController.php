<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProductRequest;

use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\ProductCategory;





class ProductController extends Controller
{


    public function index(Request $request)
    {

        $products = Product::filter($request)->get();
        $cats = ProductCategory::get();
    
        return view('product.products', [
            'user' => $request->user(),
            'products' => $products,
            'categories' => $cats,

        ]);
    }
    


    public function allOrders(Request $request)
    {


        $orders = Auth::user()->orders;

        return view('product.orders', [
            'user' => $request->user(),'orders'=>$orders
        ]);
    }

    


    public function create(Request $request)
    {

        $cats = ProductCategory::get();
        $products = Auth::user()->products;

        return view('product.add', [
            'user' => $request->user(),'products'=>$products,'cats'=>$cats
        ]);
    }




    public function store(StoreProductRequest $request)
    {

        $data = $request->validated();

        $data['image'] = $request->file('image')->store('products', 'uploads');
        Product::create($data);
        // die;
    
        return redirect()->route('product.add')->with('success', 'Product added successfully!');
    }


    public function edit(string $id)
    {


        $cats = ProductCategory::get();

        $product = Product::findOrFail($id);
        return view('product.edit',['product' => $product,'cats' => $cats]
    );
        
    }




    public function update(StoreProductRequest $request, $id)
    {

        $data = $request->validated();
        $product = Product::findOrFail($id);

        $data['image'] = $request->file('image')->store('products', 'uploads');

        $product->update($data);
    
        return redirect()->route('product.edit', $id)->with('success', 'Product updated successfully!');
    }


    public function view(string $id)
    {
        $product = Product::findOrFail($id);

        return view('product.details',['product' => $product]);



    }
    



        public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.add')->with('success', 'Product deleted successfully.');
    }


    public function addToCart(Request $request)
    {

        $product_id = $request->get('product_id');

        CartItem::addProduct(auth()->id(), $product_id);

        return redirect()->route('cart.index');


    
    
    }

    public function allCart(Request $request)
    {

        $carts = CartItem::get();
        return view('product.cart', [
            'user' => $request->user(),'carts'=>$carts
        ]);
    }




        public function checkout()
    {
        Auth::user()->checkoutCart();

        return redirect()->route('order.all');
    }



    public function createCategory(Request $request)
    {

        $cats = ProductCategory::get();

        return view('product.add-cat', [
            'user' => $request->user(),'cats'=>$cats
        ]);
    }


    public function catStore(Request $request)
    {

        $data = $request->all();
        ProductCategory::create($data);
    
        return back()->with('success', 'Category added.');
    }


    public function catDestroy(string $id)
    {
        $product = ProductCategory::findOrFail($id);
        $product->delete();
        return back()->with('success', 'Category deleted successfully.');

    }

   
}
