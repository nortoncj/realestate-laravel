<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Middleware\RedirectIfAuthenticated;
//use App\Http\Controllers\Backend\StateController;add
//use App\Http\Controllers\Backend\TestimonialController;add
//use App\Http\Controllers\Backend\BlogController;add
//use App\Http\Controllers\Backend\SettingController;add
use App\Http\Controllers\Backend\RoleController;

use App\Http\Controllers\Agent\AgentPropertyController;
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




// User Showing Status
Route::get('/account/show-status', function () {
    return view('pages/show-status');
});






// User Routes
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    User Profile Routes
Route::get('/',[UserController::class, "Index"]);
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [UserController::class, 'Index'])->name('user.profile');
    Route::get('/account/settings', [UserController::class, 'Settings'])->name('user.settings');
    Route::post('/account/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/account/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/account/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
    Route::get('/account/logout', [UserController::class, 'UserLogout'])->name('user.logout');
});



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

Route::get('/account', function () {
    return view('user.profile');
})->middleware(['auth', 'verified'])->name('user.profile');


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

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);
Route::post('/agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');
//      Agent Routes
Route::middleware(['auth','role:agent'])->group(function() {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
    Route::get('/agent/profile', [AgentController::class, 'AgentProfile'])->name('agent.profile');
    Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');
    Route::post('/agent/profile/store', [AgentController::class, 'AgentProfileStore'])->name('agent.profile.store');
    Route::get('agent/change/password', [AgentController::class,'AgentChangePassword'])->name('agent.change.password');
    Route::post('agent/update/password', [AgentController::class,'AgentUpdatePassword'])->name('agent.update.password');
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
        Route::get('/all/listings','AllListing')->name('all.listing');
        Route::get('/add/listings','AddListing')->name('add.listing');
        Route::get('/view/listings/{id}','DetailsListing')->name('view.listing');
        Route::post('/store/listings','StoreListing')->name('store.listing');
        Route::post('/store/new/images','StoreNewImages')->name('store.new.images');

        Route::get('/edit/listings/{id}','EditListing')->name('edit.listing');
        Route::post('/update/listings','UpdateListing')->name('update.listing');
        Route::post('/update/listings/thumbnail','UpdateThumbnail')->name('update.listing.thumbnail');
        Route::post('/update/listings/images','UpdateImages')->name('update.listing.images');
        Route::post('/update/listings/facilities','UpdateFacility')->name('update.listing.facilities');
        Route::get('/delete/listings/images/{id}','DeleteImages')->name('listing.delete.images');
        Route::get('/delete/listings/{id}','DeleteListing')->name('delete.listing');
        Route::post('/deactivate/listings','DeactivateListing')->name('deactivate.listing');
        Route::post('/activate/listings','ActivateListing')->name('activate.listing');
    });

    // Agents All Routes
    Route::controller(AdminController::class)->group(function (){
        Route::get('/all/agents','AllAgent')->name('all.agent');
        Route::get('/add/agent','AddAgent')->name('add.agent');
        Route::get('/view/agent/{id}','DetailsAgent')->name('view.agent');

        Route::post('/store/agent','StoreAgent')->name('store.agent');
        Route::get('/edit/agent/{id}','EditAgent')->name('edit.agent');
        Route::post('/update/agent','UpdateAgent')->name('update.agent');
        Route::get('/delete/agent/{id}','DeleteAgent')->name('delete.agent');
        Route::get('/changeStatus','ChangeStatus');

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

//      Agent Routes
Route::middleware(['auth','role:agent'])->group(function() {
    // Property All Routes
    Route::controller(AgentPropertyController::class)->group(function (){
        Route::get('agent/all/listings','AgentAllListing')->name('agent.all.listing');
        Route::get('agent/add/listings','AgentAddListing')->name('agent.add.listing');
        Route::get('agent/view/listings/{id}','AgentDetailsListing')->name('agent.view.listing');
        Route::post('agent/store/listings','AgentStoreListing')->name('agent.store.listing');
        Route::post('agent/store/new/images','AgentStoreNewImages')->name('agent.store.new.images');

        Route::get('agent/edit/listings/{id}','AgentEditListing')->name('agent.edit.listing');
        Route::post('agent/update/listings','AgentUpdateListing')->name('agent.update.listing');
        Route::post('agent/update/listings/thumbnail','AgentUpdateThumbnail')->name('agent.update.listing.thumbnail');
        Route::post('agent/update/listings/images','AgentUpdateImages')->name('agent.update.listing.images');
        Route::post('agent/update/listings/facilities','AgentUpdateFacility')->name('agent.update.listing.facilities');
        Route::get('agent/delete/listings/images/{id}','AgentDeleteImages')->name('agent.listing.delete.images');
        Route::get('agent/delete/listings/{id}','AgentDeleteListing')->name('agent.delete.listing');

    });
}); // End Agent Middleware


Route::get('/', function () {
    return view('pages/home');
});

Route::get('/about', function () {
    return view('pages/about');
});

Route::get('/contact', function () {
    return view('pages/contact');
});
Route::get('/blog', function () {
    return view('pages/blog');
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

