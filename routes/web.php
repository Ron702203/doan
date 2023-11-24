<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController as ControllersCartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController as ControllersProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ControllersProductController::class, 'index'])->name('clienthome');


// Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');
// Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
// Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
// Route::post('/admin/category/create', [CategoryController::class, 'store'])->name('admin.category.create');
// Route::post('/admin/category/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.edit');
// Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
// Route::get('/admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
// Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
// Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
// Route::post('/admin/product/create', [ProductController::class, 'store'])->name('admin.product.create');
// Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
// Route::post('/admin/product/edit/{id}', [ProductController::class, 'update'])->name('admin.product.edit');
// Route::get('/admin/product/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');

// Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
// Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
// Route::post('/admin/user/create', [UserController::class, 'store'])->name('admin.user.create');
// Route::get('/admin/user/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');

// Route::get('/admin/order', [OrderController::class, 'index'])->name('admin.order');
// Route::get('/admin/order/destroy/{id}', [OrderController::class, 'destroy'])->name('admin.order.delete');


// Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog');
// Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
// Route::post('/admin/blog/create', [BlogController::class, 'store'])->name('admin.blog.create');
// Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
// Route::post('/admin/blog/edit/{id}', [BlogController::class, 'update'])->name('admin.blog.edit');

// Route::get('/admin/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');

Route::prefix('/admin')->group(function () {
    Route::get('dashboard', [HomeController::class,'index'])->name('admin.home');
   
    Route::get('category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('category/create', [CategoryController::class, 'store'])->name('admin.category.create');
    Route::post('category/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.edit');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
    Route::get('product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('product/create', [ProductController::class, 'store'])->name('admin.product.create');
    Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('product/edit/{id}', [ProductController::class, 'update'])->name('admin.product.edit');
    Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
    
    Route::get('user', [UserController::class, 'index'])->name('admin.user');
    Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('user/create', [UserController::class, 'store'])->name('admin.user.create');
    Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
    
    Route::get('order', [OrderController::class, 'index'])->name('admin.order');
    Route::get('order-view/{id}', [OrderController::class, 'viewDetail'])->name('admin.viewDetail');
    Route::post('order-view', [OrderController::class, 'updateOrder'])->name('admin.updateOrder');
    Route::get('order/destroy/{id}', [OrderController::class, 'destroy'])->name('admin.order.delete');
    
    
    Route::get('blog', [BlogController::class, 'index'])->name('admin.blog');
    Route::get('blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('blog/create', [BlogController::class, 'store'])->name('admin.blog.create');
    Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('blog/edit/{id}', [BlogController::class, 'update'])->name('admin.blog.edit');
    
    Route::get('blog/destroy/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');
});


Route::get('/product_detail/{id}', [ControllersProductController::class, 'show'])->name('product_detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/category/{id}', [ControllersProductController::class, 'cate_product'])->name('catepr');

Route::post('/cart/add/{id}', [ControllersCartController::class, 'addToCart'])->name('cart.add');
Route::post('/check-out', [ControllersCartController::class, 'checkout'])->name('checkout');
Route::post('/vnpay-payment', [ControllersCartController::class, 'vnpay'])->name('vnpay');
Route::get('/cart', [ControllersCartController::class, 'showCart'])->name('homecart');
Route::delete('/cart/{id}', [ControllersCartController::class, 'destroy'])->name('cart.destroy');
Route::get('/search', [\App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::patch('/cart', [ControllersCartController::class, 'update'])->name('cart.update');

// Route::get('/blog', [\App\Http\Controllers\Admin\BlogController::class, 'index'])->name('blog');

Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{id}', [\App\Http\Controllers\BlogController::class, 'show'])->name('show.details');
// Route::get('/lienhe', [\App\Http\Controllers\ContactController::class, 'index'])->name('lienhe');
Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'viewMail']);
Route::post('/contact', [\App\Http\Controllers\HomeController::class, 'sendEmail']);








