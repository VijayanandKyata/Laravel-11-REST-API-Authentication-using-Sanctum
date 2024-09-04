<?php
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
   
Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
         
Route::middleware('auth:sanctum')->group( function () {
  
// Define route for displaying a list of products
Route::get('products', [ProductController::class, 'index'])->name('products.index');

// Define route for showing the form to create a new product
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');

// Define route for storing a newly created product
Route::post('products', [ProductController::class, 'store'])->name('products.store');

// Define route for displaying a specific product
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

// Define route for showing the form to edit a specific product
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Define route for updating a specific product
Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');

// Define route for deleting a specific product
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
