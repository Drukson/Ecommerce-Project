<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('frontend.index');
});*/

//Admin Route
Route::group(['prefix'=>'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [\App\Http\Controllers\AdminController::class, 'loginForm']);
    Route::post('/login', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// ADMIN ALL ROUTE
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [\App\Http\Controllers\Backend\AdminProfileController::class, 'AdminProfile'])->name('update.profile');
Route::get('/admin/profile/edit', [\App\Http\Controllers\Backend\AdminProfileController::class, 'EditAdminProfile'])->name('edit.admin.profile');
Route::post('/admin/profile/store', [\App\Http\Controllers\Backend\AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [\App\Http\Controllers\Backend\AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/password/update', [\App\Http\Controllers\Backend\AdminProfileController::class, 'AdminPasswordUpdate'])->name('admin.password.update');


// User All Route
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = \Illuminate\Support\Facades\Auth::user()->id;
    $user = \App\Models\User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');


// Route::post('/login', [\App\Http\Controllers\Backend\LoginController::class, 'login'])->name('user.login');
Route::get('/', [\App\Http\Controllers\Frontend\IndexController::class, 'index']);
Route::get('/user/logout', [\App\Http\Controllers\Frontend\IndexController::class, 'destroy'])->name('user.logout');
Route::get('/user/profile', [\App\Http\Controllers\Frontend\IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/update', [\App\Http\Controllers\Frontend\IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');
Route::get('/user/password/change', [\App\Http\Controllers\Frontend\IndexController::class, 'UserPasswordChange'])->name('user.password.change');
Route::post('/user/password/update', [\App\Http\Controllers\Frontend\IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

// Sponsors Section Route
Route::prefix('sponsors')->group(function (){
    Route::get('/view', [\App\Http\Controllers\Backend\SponsorController::class, 'SponsorView'])->name('all.sponsors');
    Route::post('/add', [\App\Http\Controllers\Backend\SponsorController::class, 'AddSponsor'])->name('add.sponsor');
    Route::get('/edit/{id}', [\App\Http\Controllers\Backend\SponsorController::class, 'EditSponsor'])->name('edit.sponsor');
    Route::post('/update/{id}', [\App\Http\Controllers\Backend\SponsorController::class, 'UpdateSponsor'])->name('update.sponsor');
    Route::get('/delete/{id}', [\App\Http\Controllers\Backend\SponsorController::class, 'DeleteSponsor'])->name('delete.sponsor');

});

// Category Route
Route::prefix('category')->group(function (){
    Route::get('/all', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/add', [\App\Http\Controllers\Backend\CategoryController::class, 'AddCategory'])->name('add.category');
    Route::get('/edit/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'EditCategory'])->name('edit.category');
    Route::post('/update/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'UpdateCategory'])->name('update.category');
    Route::get('/delete/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'DeleteCategory'])->name('delete.category');



//Sub Category
    Route::get('/sub/all', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/add', [\App\Http\Controllers\Backend\SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');
    Route::get('/sub/edit/{id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'EditSubCategory'])->name('edit.subcategory');
    Route::post('/sub/update/{id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');
    Route::get('/sub/delete/{id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');

//Sub Sub Category
    Route::get('/subsubcat/all', [\App\Http\Controllers\Backend\SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::post('/subsubcat/add', [\App\Http\Controllers\Backend\SubCategoryController::class, 'AddSubSubCategory'])->name('add.subsubcategory');
    Route::get('/subsubcat/edit/{id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'EditSubSubCategory'])->name('edit.subsubcategory');
    Route::post('/subsubcat/update/{id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'UpdateSubSubCategory'])->name('update.subsubcategory');
    Route::get('/subsubcat/delete/{id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'DeleteSubSubCategory'])->name('delete.subsubcategory');

    //Sub Category autoload
    Route::get('/subcategory/ajax/{category_id}', [\App\Http\Controllers\Backend\SubCategoryController::class, 'GetSubCategory']);
});

// Products ALl Route
Route::prefix('products')->group(function (){
    Route::get('/agro/all', [\App\Http\Controllers\Backend\AgroProductController::class, 'AgroView'])->name('all.agroproducts');
     Route::post('/agro/add', [\App\Http\Controllers\Backend\AgroProductController::class, 'AddAgroProduct'])->name('add.agroproduct');
     Route::get('/agro/manage/products', [\App\Http\Controllers\Backend\AgroProductController::class, 'ManageAgroProducts'])->name('manage.agroproducts');
     Route::get('/agro/edit/{id}', [\App\Http\Controllers\Backend\AgroProductController::class, 'EditAgroProducts'])->name('edit.agroproducts');
     Route::post('/agro/update/{id}', [\App\Http\Controllers\Backend\AgroProductController::class, 'UpdateAgroProducts'])->name('update.agroproducts');
     Route::post('/agro/img/update/{id}', [\App\Http\Controllers\Backend\AgroProductController::class, 'UpdateAgroMultiImage'])->name('update.agro.multiimage');
      Route::post('/agro/thumbnail/update/{id}', [\App\Http\Controllers\Backend\AgroProductController::class, 'UpdateAgroThumbnail'])->name('update.agro.thumbnail');
     Route::get('/agro/multiimg/delete/{id}', [\App\Http\Controllers\Backend\AgroProductController::class, 'DeleteAgroProductImg'])->name('delete.agroproducts');
     Route::get('/agro/inactive/{id}', [\App\Http\Controllers\Backend\AgroProductController::class, 'InactiveAgroProduct'])->name('inactive.agroproducts');
     Route::get('/agro/active/{id}', [\App\Http\Controllers\Backend\AgroProductController::class, 'ActiveAgroProduct'])->name('active.agroproducts');

    Route::get('/agro/delete/{id}', [\App\Http\Controllers\Backend\AgroProductController::class, 'DeleteAgroProduct'])->name('agro.product.delete');

});

// Slider Route
Route::prefix('slider')->group(function (){
    Route::get('/view', [\App\Http\Controllers\Backend\SliderController::class, 'SliderView'])->name('all.slider');
    Route::post('/add', [\App\Http\Controllers\Backend\SliderController::class, 'AddSlider'])->name('add.slider');
    Route::get('/edit/{id}', [\App\Http\Controllers\Backend\SliderController::class, 'EditSlider'])->name('edit.slider');
    Route::post('/update/{id}', [\App\Http\Controllers\Backend\SliderController::class, 'UpdateSlider'])->name('update.slider');
    Route::get('/delete/{id}', [\App\Http\Controllers\Backend\SliderController::class, 'DeleteSlider'])->name('delete.slider');

    Route::get('/active/{id}', [\App\Http\Controllers\Backend\SliderController::class, 'ActiveSlider'])->name('active.slider');
    Route::get('/inactive/{id}', [\App\Http\Controllers\Backend\SliderController::class, 'InactiveSlider'])->name('inactive.slider');

});

// Product Details Route Page
Route::get('/product/agro/details/{id}/{slug}', [\App\Http\Controllers\Frontend\IndexController::class, 'ProductDetails']);

// Homestay ALl Route
Route::prefix('products')->group(function (){
    Route::get('/homestay/all', [\App\Http\Controllers\Backend\HomestayController::class, 'HomestayIndex'])->name('all.homestay');
    Route::get('/homestay/manage', [\App\Http\Controllers\Backend\HomestayController::class, 'ManageHomestayProducts'])->name('manage.homestay');
    Route::post('/homestay/add', [\App\Http\Controllers\Backend\HomestayController::class, 'AddHomestayProduct'])->name('add.homestay');
    Route::get('/homestay/edit/{id}', [\App\Http\Controllers\Backend\HomestayController::class, 'EditHomestayProducts'])->name('edit.homestay');
    Route::post('/homestay/update/{id}', [\App\Http\Controllers\Backend\HomestayController::class, 'UpdateHomestay'])->name('update.homestay');
    Route::get('/homestay/multiimg/delete/{id}', [\App\Http\Controllers\Backend\HomestayController::class, 'DeleteHomestayImg'])->name('delete.homestayimg');
    Route::post('/homestay/multiimg/update/{id}', [\App\Http\Controllers\Backend\HomestayController::class, 'UpdateHomestayMultiImage'])->name('update.homestay.multiimage');
    Route::post('/homestay/thumbnail/update/{id}', [\App\Http\Controllers\Backend\HomestayController::class, 'UpdateHomestayThumbnail'])->name('update.homestay.thumbnail');
    Route::get('/homestay/inactive/{id}', [\App\Http\Controllers\Backend\HomestayController::class, 'InactiveHomestay'])->name('inactive.homestay');
    Route::get('/homestay/active/{id}', [\App\Http\Controllers\Backend\HomestayController::class, 'ActiveHomestay'])->name('active.homestay');
    Route::get('/homestay/delete/{id}', [\App\Http\Controllers\Backend\HomestayController::class, 'DeleteHomestay'])->name('homestay.delete');
});

// Homestay Details Route Page
Route::get('/product/homestay/details/{id}/{slug}', [\App\Http\Controllers\Frontend\IndexController::class, 'HomestayDetails']);

// Handicrafts ALl Route
Route::prefix('products')->group(function (){
    Route::get('/handicraft/all', [\App\Http\Controllers\Backend\HandicraftController::class, 'HandicraftView'])->name('all.handicraft');
    Route::get('/handicraft/add', [\App\Http\Controllers\Backend\HandicraftController::class, 'AddHandicraft'])->name('add.handicraft');
    Route::post('/handicraft/store', [\App\Http\Controllers\Backend\HandicraftController::class, 'StoreHandicraft'])->name('store.handicraft');
    Route::get('/handicraft/edit/{id}', [\App\Http\Controllers\Backend\HandicraftController::class, 'EditHandicraft'])->name('edit.handicraft');
    Route::post('/handicraft/update/{id}', [\App\Http\Controllers\Backend\HandicraftController::class, 'UpdateHandicraft'])->name('update.handicraft');


    Route::get('/handicraft/multiimg/delete/{id}', [\App\Http\Controllers\Backend\HandicraftController::class, 'DeleteHandicraftImages'])->name('delete.handicraftimages');
    Route::post('/handicraft/thumbnail/update/{id}', [\App\Http\Controllers\Backend\HandicraftController::class, 'UpdateHandicraftThumbnail'])->name('update.handicraft.thumbnail');

    Route::get('/handicraft/inactive/{id}', [\App\Http\Controllers\Backend\HandicraftController::class, 'InactiveHandicraft'])->name('inactive.handicraft');
    Route::get('/handicraft/active/{id}', [\App\Http\Controllers\Backend\HandicraftController::class, 'ActiveHandicraft'])->name('active.handicraft');
    Route::get('/handicraft/delete/{id}', [\App\Http\Controllers\Backend\HandicraftController::class, 'DeleteHandicraftProduct'])->name('handicraft.details.delete');

    /*Route::post('/agro/img/update/{id}', [\App\Http\Controllers\Backend\AgroProductController::class, 'UpdateAgroMultiImage'])->name('update.agro.multiimage');
    */
});

// Handicraft Details Route Page
Route::get('/product/handicraft/details/{id}/{slug}', [\App\Http\Controllers\Frontend\IndexController::class, 'HandicraftDetails']);

// Frontend Agro Product Tag Page Details
Route::get('/product/agro/tag/{tag}', [\App\Http\Controllers\Frontend\IndexController::class, 'AgroProductTags']);

// Frontend handicraft Product Tag Page Details
Route::get('/product/handicraft/tag/{tag}', [\App\Http\Controllers\Frontend\IndexController::class, 'HandicraftProductTags']);

// Frontend homestay Product Tag Page Details
Route::get('/product/homestay/tag/{tag}', [\App\Http\Controllers\Frontend\IndexController::class, 'HomestayProductTags']);

// Frontend Sub Category Product Tag Page Details
Route::get('/subcategory/product/{subcat_id}/{slug}', [\App\Http\Controllers\Frontend\IndexController::class, 'SubCatProduct']);

// Frontend Sub Category Handicraft Tag Page Details
Route::get('/subcategory/handicraft/{subcat_id}/{slug}', [\App\Http\Controllers\Frontend\IndexController::class, 'SubCatHandicraft']);

// PRODUCT VIEW MODEL WITH AJAX
Route::get('/product/view/modal/{id}', [\App\Http\Controllers\Frontend\IndexController::class, 'ProductViewAjax']);

// ADD TO CART
Route::post('/cart/data/store/{id}', [\App\Http\Controllers\Frontend\CartController::class, 'addToCart']);

// ADD TO MINICART
Route::get('/product/mini/cart/', [\App\Http\Controllers\Frontend\CartController::class, 'AddMiniCart']);

// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [\App\Http\Controllers\Frontend\CartController::class, 'RemoveMiniCart']);

// ADD TO WISHLIST
Route::post('/add-to-wishlist/{product_id}', [\App\Http\Controllers\Frontend\CartController::class, 'AddtoWishlist']);

// ADD TO WISHLIST
Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function (){
    Route::get('/wishlist', [\App\Http\Controllers\User\WishlistController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('/get-wishlist-product', [\App\Http\Controllers\User\WishlistController::class, 'GetWishlistProduct']);
    Route::get('/wishlist-remove/{id}', [\App\Http\Controllers\User\WishlistController::class, 'RemoveWishlistProduct']);
});

// MYCART DETAILS ALL ROUTE
Route::get('/mycart', [\App\Http\Controllers\User\CartPageController::class, 'ViewMyCart'])->name('mycart');
Route::get('/user/get-cart-product', [\App\Http\Controllers\User\CartPageController::class, 'GetCartProduct']);
Route::get('/user/cart-remove/{rowId}', [\App\Http\Controllers\User\CartPageController::class, 'RemoveCartProduct']);

Route::get('/cart-increment/{rowId}', [\App\Http\Controllers\User\CartPageController::class, 'CartIncrement']);
Route::get('/cart-decrement/{rowId}', [\App\Http\Controllers\User\CartPageController::class, 'CartDecrement']);



