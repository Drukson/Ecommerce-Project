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

// SELLER ROUTE
Route::prefix('seller')->group(function (){
    Route::get('/registration', [\App\Http\Controllers\Seller\SellerController::class, 'Registration'])->name('seller_registration');
    Route::post('/add', [\App\Http\Controllers\Seller\SellerController::class, 'StoreSellers'])->name('store_seller');

});
// DISPLAY ALL SELLER IN THE ADMIN PANEL
Route::get('/all/sellers', [\App\Http\Controllers\Seller\SellerController::class, 'SellerDetails'])->name('all_sellers');
Route::get('/all/sellers/edit/{id}', [\App\Http\Controllers\Seller\SellerController::class, 'EditSellerDetails'])->name('edit.sellers');
Route::post('/update_seller', [\App\Http\Controllers\Seller\SellerController::class, 'update_seller'])->name('update_seller');


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

    Route::get('/inactive/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'InactiveCategory'])->name('inactive.category');
    Route::get('/active/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'ActiveCategory'])->name('active.category');


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


// Frontend Agro Product Tag Page Details
Route::get('/product/agro/tag/{tag}', [\App\Http\Controllers\Frontend\IndexController::class, 'AgroProductTags']);

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

//STRIP ORDER Route
    Route::post('/stripe/order', [\App\Http\Controllers\User\StripeController::class, 'StripeOrder'])->name('stripe.order');
//USER DASHBOARD MY ORDER PAGE
    Route::get('/my/orders', [\App\Http\Controllers\User\AllUserController::class, 'MyOrders'])->name('my.orders');
//USER DASHBOARD ORDER VIEW PAGE
    Route::get('/order_details/{order_id}', [\App\Http\Controllers\User\AllUserController::class, 'OrderDetails']);

    //USER DASHBOARD INVOICE DOWNLOAD
    Route::get('/invoice_download/{order_id}', [\App\Http\Controllers\User\AllUserController::class, 'InvoiceDownload']);

    //RETURN ORDER
    Route::post('/return/order/{order_id}', [\App\Http\Controllers\User\AllUserController::class, 'ReturnOrder'])->name('return.order');
    Route::get('/return/order/list', [\App\Http\Controllers\User\AllUserController::class, 'ReturnOrderList'])->name('return.order.list');
    Route::get('/cancel/orders', [\App\Http\Controllers\User\AllUserController::class, 'CancelOrders'])->name('cancel.orders');
});

// MYCART DETAILS ALL ROUTE
Route::get('/mycart', [\App\Http\Controllers\User\CartPageController::class, 'ViewMyCart'])->name('mycart');
Route::get('/user/get-cart-product', [\App\Http\Controllers\User\CartPageController::class, 'GetCartProduct']);
Route::get('/user/cart-remove/{rowId}', [\App\Http\Controllers\User\CartPageController::class, 'RemoveCartProduct']);

Route::get('/cart-increment/{rowId}', [\App\Http\Controllers\User\CartPageController::class, 'CartIncrement']);
Route::get('/cart-decrement/{rowId}', [\App\Http\Controllers\User\CartPageController::class, 'CartDecrement']);


// DZONGKHAG CATEGORY ROUTE
Route::prefix('dzongkhag')->group(function (){
    Route::get('/all', [\App\Http\Controllers\Seller\DzongkhagController::class, 'DzongkhagView'])->name('all.dzongkhag');
    Route::post('/add', [\App\Http\Controllers\Seller\DzongkhagController::class, 'AddDzongkhag'])->name('add.dzongkhags');
    Route::get('/edit/{id}', [\App\Http\Controllers\Seller\DzongkhagController::class, 'EditDzongkhag'])->name('edit.dzongkhags');
    Route::post('/update/{id}', [\App\Http\Controllers\Seller\DzongkhagController::class, 'UpdateDzongkhag'])->name('update.dzongkhags');
    Route::get('/delete/{id}', [\App\Http\Controllers\Seller\DzongkhagController::class, 'DeleteDzongkhag'])->name('delete.dzongkhags');

    //GEWOG ROUTE
    Route::get('/gewog/all', [\App\Http\Controllers\Seller\GewogController::class, 'GewogView'])->name('all.gewog');
    Route::post('/gewog/add', [\App\Http\Controllers\Seller\GewogController::class, 'AddGewog'])->name('add.gewog');
    Route::get('/gewog/edit/{id}', [\App\Http\Controllers\Seller\GewogController::class, 'EditGewog'])->name('edit.gewog');
    Route::post('/gewog/update/{id}', [\App\Http\Controllers\Seller\GewogController::class, 'UpdateGewog'])->name('update.gewog');
    Route::get('/gewog/delete/{id}', [\App\Http\Controllers\Seller\GewogController::class, 'DeleteGewog'])->name('delete.gewog');

    //VILLAGE ROUTE
    Route::get('/village/all', [\App\Http\Controllers\Seller\VillageController::class, 'VillageView'])->name('all.village');
    Route::post('/village/add', [\App\Http\Controllers\Seller\VillageController::class, 'AddVillage'])->name('add.village');
    Route::get('/village/edit/{id}', [\App\Http\Controllers\Seller\VillageController::class, 'EditVillage'])->name('edit.village');
    Route::post('/village/update/{id}', [\App\Http\Controllers\Seller\VillageController::class, 'UpdateVillage'])->name('update.village');
    Route::get('/village/delete/{id}', [\App\Http\Controllers\Seller\VillageController::class, 'DeleteVillage'])->name('delete.village');

    //Gewog autoload
    Route::get('/gewog/ajax/{dzongkhag_id}', [\App\Http\Controllers\Seller\VillageController::class, 'GetGewog']);

    //VILLAGE AUTOLOAD
    Route::get('/village/ajax/{gewog_id}', [\App\Http\Controllers\Seller\VillageController::class, 'GetVillage']);
});

//ADMIN SHIPPING DIVISION ROUTE

Route::prefix('shipping')->group(function (){
    Route::get('/division/view', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DivisionView'])->name('division_view');
    Route::post('/division/add', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'AddDivision'])->name('add.division');
    Route::get('/division/edit/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'EditDivision'])->name('edit.division');
    Route::post('/division/update/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'UpdateDivision'])->name('update.division');
    Route::get('/division/delete/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DeleteDivision'])->name('delete.division');

    /* SUB DISTRICTS */
    Route::get('/subdistrict/view', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'SubDistrictView'])->name('subdistrict_view');
    Route::post('/subdistrict/add', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'AddSubDistrict'])->name('add.subdistrict');
    Route::get('/subdistrict/edit/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'EditSubDistrict'])->name('edit.subdistrict');
    Route::post('/subdistrict/update/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'UpdateSubDistrict'])->name('update.subdistrict');
    Route::get('/subdistrict/delete/{id}', [\App\Http\Controllers\Backend\ShippingAreaController::class, 'DeleteSubDistrict'])->name('delete.subdistrict');

});

// Checkout Routes
Route::get('/checkout', [\App\Http\Controllers\Frontend\CartController::class, 'CheckoutCreate'])->name('checkout');
//District autoload
Route::get('/district/ajax/{division_id}', [\App\Http\Controllers\Frontend\CartController::class, 'GetDistrict']);
//Checkout Route
Route::post('/checkout/store', [\App\Http\Controllers\User\CheckoutController::class, 'CheckoutStore'])->name('checkout.store');

// Admin Order All Routes
Route::prefix('orders')->group(function(){

  Route::get('/pending/orders', [\App\Http\Controllers\Backend\OrderController::class, 'PendingOrders'])->name('pending-orders');
  Route::get('/pending/orders/details/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');
  Route::get('/confirmed/orders', [\App\Http\Controllers\Backend\OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
  Route::get('/processing/orders', [\App\Http\Controllers\Backend\OrderController::class, 'ProcessingOrders'])->name('processing-orders');
  Route::get('/picked/orders', [\App\Http\Controllers\Backend\OrderController::class, 'PickedOrders'])->name('picked-orders');
  Route::get('/shipped/orders', [\App\Http\Controllers\Backend\OrderController::class, 'ShippedOrders'])->name('shipped-orders');
  Route::get('/delivered/orders', [\App\Http\Controllers\Backend\OrderController::class, 'DeliveredOrders'])->name('delivered-orders');
  Route::get('/cancel/orders', [\App\Http\Controllers\Backend\OrderController::class, 'CancelOrders'])->name('cancel-orders');

    // Update Status
    Route::get('/pending/confirm/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'PendingToConfirm'])->name('pending-confirm');
    Route::get('/confirm/processing/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');
    Route::get('/processing/picked/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'ProcessingToPicked'])->name('processing.picked');
    Route::get('/picked/shipped/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'PickedToShipped'])->name('picked.shipped');
    Route::get('/shipped/delivered/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');

    Route::get('/shipped/delivered/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');
    Route::get('/invoice/download/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');



});
