<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TrademarkController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;


//SEND MAIL

Route::get('/send-mail', [HomeController::class, 'send_mail']);


//FRONTEND
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::post('/tim-kiem',[HomeController::class, 'search']);




//danh mục sản phẩm
Route::get('/danh-muc-san-pham/{categoryproductid}', [CategoryController::class, 'show_category_home']);
//thương hiệu
Route::get('/thuong-hieu-san-pham/{trademarkid}',[TrademarkController::class, 'show_trademark_home']);

// chi tiết sản phẩm

Route::get('/product-detail/{productid}', [ProductController::class, 'product_detail']);
Route::post('/submit-review', [ProductController::class, 'submit_review']);


// Cart

Route::post('/update-cart-quantity/{rowId}',[CartController::class, 'update_cart_quantity']);
Route::post('/save-cart',[CartController::class, 'save_cart']);
Route::get('/show-cart',[CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}',[CartController::class, 'delete_to_cart']);


// Checkout

Route::get('/login-checkout',[CheckoutController::class, 'login_checkout']);
Route::get('/register-checkout', [CheckoutController::class, 'register_checkout']);
Route::get('logout-checkout',[CheckoutController::class, 'logout_checkout']);
Route::get('/checkout',[CheckoutController::class, 'checkout']);
Route::get('/payment',[CheckoutController::class, 'payment']);

Route::post('/login-kh', [CheckoutController::class, 'login_kh']);
Route::post('/add-customer',[CheckoutController::class, 'add_customer']);
Route::post('/save-checkout-customer',[CheckoutController::class, 'save_checkout_customer']);
Route::post('/place-order', [CheckoutController::class,'place_order']);


// Order
Route::get('order-history', [OrderController::class, 'order_history']);
Route::get('order-detail/{id}', [OrderController::class, 'order_detail']);
Route::post('order/cancel/{id}', [OrderController::class, 'cancelOrder']);




//Contact

Route::get('/contact',[ContactController::class, 'contact']);
Route::post('/send-contact',[ContactController::class, 'send_contact']);

//Shop

Route::get('/shop',[ShopController::class, 'index']);

//User

Route::get('/user-info', [UserController::class, 'showUserInfo']);
Route::get('change-password', [UserController::class, 'change_password']);
Route::post('update-password', [UserController::class, 'update_password']);
Route::get('/edit-user', [UserController::class, 'edit_user']);
Route::post('/update-user', [UserController::class, 'update_user']);

//Post

Route::get('/blog', [PostController::class, 'post']);

//BACKEND


Route::get('/login-admin', [AdminController::class, 'index']);
Route::get('/admin', [AdminController::class, 'admin']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'admin_dashboard']);


// Post
Route::get('/all-post', [PostController::class, 'all_post']);
Route::get('/add-post', [PostController::class, 'add_post']);
Route::get('/edit-post/{blogid}', [PostController::class, 'edit_post']);
Route::get('/delete-post/{blogid}',[PostController::class, 'delete_post']);

Route::post('/save-post', [PostController::class, 'save_post']);
Route::post('/update-post/{blogid}', [PostController::class, 'update_post']);
Route::post('/confirm-delete-post/{blogid}', [PostController::class, 'confirm_delete_post']);

//Trademark

Route::get('/all-trademark', [TrademarkController::class, 'all_trademark']);
Route::get('/add-trademark', [TrademarkController::class, 'add_trademark']);
Route::get('/edit-trademark/{trademarkid}', [TrademarkController::class, 'edit_trademark']);
route::get('/delete-trademark/{trademarkid}', [TrademarkController::class, 'delete_trademark']);

Route::post('/save-trademark', [TrademarkController::class, 'save_trademark']);
Route::post('/update-trademark/{trademarkid}', [TrademarkController::class, 'update_trademark']);
Route::post('/confirm-delete-trademark/{trademarkid}', [TrademarkController::class, 'confirm_delete_trademark']);

//Product

Route::get('/all-product', [ProductController::class, 'all_product']);
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/edit-product/{productid}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{productid}', [ProductController::class, 'delete_product']);

Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{productid}', [ProductController::class, 'update_product']);
Route::post('/confirm-delete-product/{productid}', [ProductController::class, 'confirm_delete_product']);

//Order

Route::get('/manage-order',[CheckoutController::class, 'manage_order']);
//Cập nhật trạng thái đơn hàng
Route::post('/update-status',[CheckoutController::class, 'Update_Status']);
Route::get('/view-order/{orderid}',[CheckoutController::class, 'view_order']);

//Contact

Route::get('/all-contact', [ContactController::class,'all_contact']);
Route::get('/detail-contact/{contactid}', [ContactController::class, 'detail_contact']);
Route::post('/update-isread/{contactid}', [ContactController::class, 'update_isread']);
Route::get('/delete-contact/{contactid}', [ContactController::class, 'delete_contact']);
Route::post('/confirm-delete-contact/{contactid}', [ContactController::class, 'confirm_delete_contact']);

//User

Route::get('/all-user', [UserController::class, 'all_user']);


