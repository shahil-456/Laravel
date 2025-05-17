<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\IsAdmin;


use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


    // admin"s routesssss


    Route::middleware([IsAdmin::class])->group(function () {

        Route::get('/add-customer', [CustomerController::class, 'create'])->name('customer.add');

        Route::get('/list-users', [UserController::class, 'index']);

        Route::get('/destroy-blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');


    });




    Route::middleware('auth')->group(function () {

   


    //Blogssss

    Route::get('/all-blogs', [BlogController::class, 'index'])->name('blog.all');

    Route::get('/add-blog', [BlogController::class, 'create'])->name('blog.add');

    Route::post('/blog/create', [BlogController::class, 'store'])->name('blog.store');

    Route::get('/blog/view/{id}', [BlogController::class, 'show'])->name('blog.view');

    Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');

    Route::post('/update-blog/{id}', [BlogController::class, 'update'])->name('blog.update');

    Route::get('/destroy-blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::post('/comments/create', [CommentController::class, 'store'])->name('comments.store');





    //prodctsss

    Route::get('/all-products', [ProductController::class, 'index'])->name('product.all');


    Route::get('/add-product', [ProductController::class, 'create'])->name('product.add');


    Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');

    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');

    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');



    Route::get('/destroy-product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


    Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');

    Route::get('/show_cart', [ProductController::class, 'allCart'])->name('cart.index');

    Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');


    Route::get('/all-orders', [ProductController::class, 'allOrders'])->name('order.all');

   




//profile


    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
  



});

require __DIR__.'/auth.php';
