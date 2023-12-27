<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
//use App\Http\Controllers\UserController; add
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\PropertyController;
//use App\Http\Middleware\RedirectIfAuthenticated;add
//use App\Http\Controllers\Backend\StateController;add
//use App\Http\Controllers\Backend\TestimonialController;add
//use App\Http\Controllers\Backend\BlogController;add
//use App\Http\Controllers\Backend\SettingController;add
use App\Http\Controllers\Backend\RoleController;

//use App\Http\Controllers\Agent\AgentPropertyController; add
//use App\Http\Controllers\Frontend\IndexController; add
//use App\Http\Controllers\Frontend\WishListController; add
//use App\Http\Controllers\Frontend\CompareController; add

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

Route::get('/', function () {
    return view('pages/home');
});

// Show Single Listings
Route::get('/listing/{slug}/{id}', function () {
    return view('pages/single-listing');
});
// Show All Listings
Route::get('/{property_type}/{listing_type}/{city}', function () {
    return view('pages/listings');

})->name('listings');
Route::get('/account/saved', function () {
    return view('pages/saved-listings');

})->name('saved-listings');


// User Showing Status
Route::get('/account/show-status', function () {
    return view('pages/show-status');
});

//    Profile Routes
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::middleware(['auth','role:agent'])->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//Route::middleware(['auth'])->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';

//      Admin Routes
Route::middleware(['auth','role:admin'])->group(function() {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('admin/change/password', [AdminController::class,'AdminChangePassword'])->name('admin.change.password');
    Route::post('admin/update/password', [AdminController::class,'AdminUpdatePassword'])->name('admin.update.password');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
}); // End Admin Middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

//      Agent Routes
Route::middleware(['auth','role:agent'])->group(function() {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
}); // End Agent Middleware

//      Admin Routes
Route::middleware(['auth','role:admin'])->group(function() {
// Property Type All Routes
    Route::controller(PropertyTypeController::class)->group(function (){
        Route::get('/all/type','AllType')->name('all.type');
        Route::get('/add/type','AddType')->name('add.type');

        Route::post('/store/type','StoreType')->name('store.type');
        Route::get('/edit/type/{id}','EditType')->name('edit.type');
        Route::post('/update/type','UpdateType')->name('update.type');
        Route::get('/delete/type/{id}','DeleteType')->name('delete.type');
    });

// Amenities All Routes
    Route::controller(PropertyTypeController::class)->group(function (){
        Route::get('/all/amenities','AllAmenities')->name('all.amenities');
        Route::get('/add/amenities','AddAmenity')->name('add.amenity');

        Route::post('/store/amenities','StoreAmenity')->name('store.amenity');
        Route::get('/edit/amenities/{id}','EditAmenity')->name('edit.amenity');
        Route::post('/update/amenities','UpdateAmenity')->name('update.amenity');
        Route::get('/delete/amenities/{id}','DeleteAmenity')->name('delete.amenity');
    });

    // Status All Routes
    Route::controller(PropertyTypeController::class)->group(function (){
        Route::get('/all/status','AllStatus')->name('all.status');
        Route::get('/add/status','AddStatus')->name('add.status');

        Route::post('/store/status','StoreStatus')->name('store.status');
        Route::get('/edit/status/{id}','EditStatus')->name('edit.status');
        Route::post('/update/status','UpdateStatus')->name('update.status');
        Route::get('/delete/status/{id}','DeleteStatus')->name('delete.status');
    });

    // Property All Routes
    Route::controller(PropertyController::class)->group(function (){
        Route::get('/all/listing','AllListing')->name('all.listing');
        Route::get('/add/listing','AddListing')->name('add.listing');

        Route::post('/store/listing','StoreListing')->name('store.listing');
        Route::get('/edit/listing/{id}','EditListing')->name('edit.listing');
        Route::post('/update/listing','UpdateListing')->name('update.listing');
        Route::get('/delete/listing/{id}','DeleteListing')->name('delete.listing');
    });

    // Permissions All Routes
    Route::controller(RoleController::class)->group(function (){
        Route::get('/all/permission','AllPermission')->name('all.permission');
        Route::get('/add/permission','AddPermission')->name('add.permission');

        Route::post('/store/permission','StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission');
        Route::post('/update/permission','UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}','DeletePermission')->name('delete.permission');
    });


}); // End Admin Middleware




