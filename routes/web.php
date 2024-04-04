<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShippingController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('language/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// dashboard

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('index');// homeيرجع الصفحه

Route::get('/dashboard/Products', [DashboardController::class, 'Products'])
    ->name('Product');    // يرجع الصفحه منتج  وكمان يقرا من داتا



Route::post('/dashboard/CreateProducts', [DashboardController::class, 'CreateProducts'])
    ->name('CreateProducts');//يضيف  في الداتا 


Route::get('/dashboard/Dil/{id}', [DashboardController::class, 'Dil'])
    ->name('Dil');//يحذف 


// Edit
Route::get('/Edit/{id}', [DashboardController::class, 'Edit'])->name('Edit');
// ubdate
Route::post('/dashboard/ubdate', [DashboardController::class, 'ubdate'])->name('ubdate');
//end  Edit

// Search
Route::post('/dashboard/search', [DashboardController::class, 'Search'])->name('search');
Route::get('/dashboard/NotSearch', [DashboardController::class, 'NotSearch'])->name('NotSearch');

// logout
Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');




// S -> Product Deatals page



Route::get('/dashboard/Product_Deatals', [DashboardController::class, 'Product_Deatals'])
    ->name('Product_Deatals');




Route::post('/dashboard/Product_Deatals', [DashboardController::class, 'CreateProduct_Deatals'])
    ->name('CreateProduct_Deatals');//يضيف  في الداتا 


Route::get('/dashboard/delete/{id}', [DashboardController::class, 'deleteproduct_details'])
    ->name('delete');//يحذف 



Route::get('/Edit_product_details/{id}', [DashboardController::class, 'Editproduct_details'])
    ->name('Editproduct_details');

Route::post('/dashboard/ubdateproduct_details', [DashboardController::class, 'ubdateproduct_details'])->name('ubdateproduct_details');


// Route::post('/dashboard/Searchproduct_details', [DashboardController::class, 'Searchproduct_details'])->name('Searchproduct_details');
Route::get('/dashboard/NotSearchproduct_details', [DashboardController::class, 'NotSearchproduct_details'])->name('NotSearchproduct_details');




// ======================================================================
// shipping


Route::get('/Shipping', [ShippingController::class, 'ShowShipping'])
    ->name('ShowShipping');//  الصفحه


Route::get('/Shipping/details/{id}', [ShippingController::class, 'details'])
    ->name('details');//  الصفحه


Route::get('/Shipping/Add_to_cart/{id}', [ShippingController::class, 'Add_to_cart'])->name('Add_to_cart');

Route::get('/Shipping/Show_cart', [ShippingController::class, 'Show_cart'])
    ->name('Show_cart');

Route::get('/Shipping/Dil/{id}', [DashboardController::class, 'Dil'])
    ->name('Dil');//يحذف 