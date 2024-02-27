<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\cmsController;
use App\Http\Controllers\admin\customerController;
use App\Http\Controllers\admin\E_bookController;
use App\Http\Controllers\admin\E_bookCategoryController;
use App\Http\Controllers\admin\user;
use App\Http\Controllers\admin\GlobalSetupController;
use App\Http\Controllers\admin\MaintenanceModeController;
use App\Http\Controllers\admin\SpecialTestCategory;
use App\Http\Controllers\admin\SpecialTestController;
use App\Http\Controllers\admin\subscriber;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\EnquiriesController;

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


Route::get('login', [AuthController::class, 'Login'])->name('Login.custom');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('Login');
Route::get('admin/logout', function () {
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_ID');
    session()->flash('fail','Logout Successfully');
    return redirect('/');
});
// Admin Auth
Route::get('admin', [AuthController::class, 'index'])->name('admin');
Route::group(['middleware'=>'admin_auth'], function(){
    //Maintenance
    Route::get('dashboard/Maintenance', [MaintenanceModeController::class, 'index'])->name('Maintenance');
    Route::post('/toggle-maintenance-mode', [MaintenanceModeController::class, 'maintenance']);

    //Maintenance


Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('/login', [AuthController::class, 'AdminLogin']);
// Route::get('sign_out', [AuthController::class, 'signOut'])->name('signout');
// Route::get('change_password_screen', [AuthController::class, 'change_password_screen'])->name('change_password_screen');
// Route::post('change_password', [AuthController::class, 'change_password'])->name('change_password');

Route::group(['prefix'=> '/blog'], function () {

    Route::get('/', [BlogController::class, 'Blog'])->name('Blog');
    Route::get('/create', [BlogController::class, 'BlogCreate'])->name('BlogCreate');
    Route::post('/store', [BlogController::class, 'BlogStore'])->name('BlogStore');
    Route::post('/{id}/update-status', [BlogController::class, 'updateStatus'])->name('updateblogStatus');
    Route::get('/edit/{id?}', [BlogController::class, 'EditBlog'])->name('BlogEdit');
    Route::post('/update', [BlogController::class, 'BlogUpdate'])->name('BlogUpdate');
    Route::post('/delete', [BlogController::class, 'DeleteBlog'])->name('DeleteBlog');

});

Route::group(['prefix' => '/blog/category'], function  (){
    Route::get('/', [CategoryController::class, 'Categories'])->name('Categories');
    Route::get('/create', [CategoryController::class, 'CategoryCreate'])->name('CategoryCreate');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('CategoryStore');
    Route::post('/{id}/update-status', [CategoryController::class, 'updateStatus'])->name('updateCategoryStatus');
    Route::get('/edit/{id?}', [CategoryController::class, 'CategoryEdit'])->name('CategoryEdit');
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('CategoryUpdate');
    Route::post('/delete', [CategoryController::class, 'DeleteCategory'])->name('DeleteCategory');
});

//Route for GlobalSetup
Route::group(['prefix'=> 'GlobalSetup'], function (){
    Route::get('/', [GlobalSetupController::class, 'global'])->name('GlobalSetup');
    Route::get('/createGlobal', [GlobalSetupController::class, 'createGlobal'])->name('createGlobal');
    Route::post('/store', [GlobalSetupController::class, 'createSetup'])->name('createSetup');
    Route::get('/edit/{id?}', [GlobalSetupController::class, 'editSetup'])->name('editSetup');
    Route::post('/update', [GlobalSetupController::class, 'updateSetup'])->name('updateSetup');
    Route::post('/delete', [GlobalSetupController::class, 'DeleteSetup'])->name('DeleteSetup');
});

// Route for user
Route::group(['prefix'=> 'user'], function (){
    Route::get('/', [user::class , 'user'])->name('user');
    Route::get('/Create', [user::class , 'create'])->name('userCreate');
    Route::post('/Store', [user::class , 'Store'])->name('userStore');
    Route::get('/Store/edit/{id?}', [user::class , 'user_edit'])->name('user_edit');
    Route::post('/Store/update', [user::class , 'user_save'])->name('user_save');
    Route::post('/Store/delete', [user::class, 'user_delete'])->name('user_delete');
});


//Route for subscribers
Route::group(['prefix'=> 'subcribersEmail'], function (){

    Route::get('/', [subscriber::class, 'subcribersEmail'])->name('subcribersEmail');
    Route::post('/delete', [subscriber::class, 'DeleteSubscribers'])->name('DeleteSubscribers');
});

Route::post('StoreSub', [FrontendController::class, 'StoreSub'])->name('StoreSub');
//Route for Special Test
Route::group(['prefix'=> 'SpecialTest'], function (){

    Route::get('/', [SpecialTestController::class, 'SpecialTest'])->name('SpecialTest');
    Route::get('/Create', [SpecialTestController::class, 'CreateSpecialTest'])->name('CreateSpecialTest');
    Route::post('/SpecialTestStore', [SpecialTestController::class, 'SpecialTestStore'])->name('SpecialTestStore');
    Route::post('/{id}/SpecialTestStatus', [SpecialTestController::class, 'SpecialTestStatus'])->name('SpecialTestStatus');
    Route::get('/edit/{id?}', [SpecialTestController::class, 'EditSpecialTest'])->name('EditSpecialTest');
    Route::post('/SpecialTestEdit', [SpecialTestController::class, 'SpecialTestEdit'])->name('SpecialTestEdit');
    Route::post('/SpecialTestDelete', [SpecialTestController::class, 'SpecialTestDelete'])->name('SpecialTestDelete');
});

//Route for Special Test Category
Route::group(['prefix'=> 'SpecialTestCategory'], function (){
        Route::get('/', [SpecialTestCategory::class, 'SpecialTestCategory'])->name('SpecialTestCategory');
        Route::get('/Add', [SpecialTestCategory::class, 'AddSpecialTestCategory'])->name('AddSpecialTestCategory');
        Route::post('/SpecialCategoryStore', [SpecialTestCategory::class, 'SpecialCategoryStore'])->name('SpecialCategoryStore');
        Route::post('/{id}/updateSpecialTest', [SpecialTestCategory::class, 'updateSpecialTest'])->name('updateSpecialTest');
        Route::get('/edit/{id?}', [SpecialTestCategory::class, 'SpecialCategoryEdit'])->name('SpecialCategoryEdit');
        Route::post('/SpecialCategoryUpdate', [SpecialTestCategory::class, 'SpecialCategoryUpdate'])->name('SpecialCategoryUpdate');
        Route::post('/SpecialDeleteCategory', [SpecialTestCategory::class, 'SpecialDeleteCategory'])->name('SpecialDeleteCategory');
});

//Route for E_book
Route::group(['prefix'=> 'E_book'], function (){

    Route::get('/', [E_bookController::class, 'E_book'])->name('E_book');
    Route::get('/Create', [E_bookController::class, 'E_BookCreate'])->name('E_BookCreate');
    Route::post('/E_BookStore', [E_bookController::class, 'E_BookStore'])->name('E_BookStore');
    Route::get('/edit/{id?}', [E_bookController::class, 'E_bookEdit'])->name('E_bookEdit');
    Route::post('/E_BookUpdate', [E_bookController::class, 'E_BookUpdate'])->name('E_BookUpdate');
    Route::post('/E_BookDelete', [E_bookController::class, 'E_BookDelete'])->name('E_BookDelete');
    Route::post('/StatusUpdateE_book', [E_bookController::class, 'StatusUpdateE_book'])->name('StatusUpdateE_book');
});

//Route for E_book Category
Route::group(['prefix'=> 'E_bookCategory'], function (){

    Route::get('/', [E_bookCategoryController::class, 'E_bookCategory'])->name('E_bookCategory');
    Route::get('/Add', [E_bookCategoryController::class, 'AddE_bookCategory'])->name('AddE_bookCategory');
    Route::post('/E_bookCategoryStore', [E_bookCategoryController::class, 'E_bookCategoryStore'])->name('E_bookCategoryStore');
    Route::get('/edit/{id?}', [E_bookCategoryController::class, 'E_bookCategoryEdit'])->name('E_bookCategoryEdit');
    Route::post('/E_bookCategoryUpdate', [E_bookCategoryController::class, 'E_bookCategoryUpdate'])->name('E_bookCategoryUpdate');
    Route::post('/{id}/updateE_bookStatus', [E_bookCategoryController::class, 'updateE_bookStatus'])->name('updateE_bookStatus');
    Route::post('/EBookCategoryDelete', [E_bookCategoryController::class, 'EBookCategoryDelete'])->name('EBookCategoryDelete');
});

//Routes for CMS PAGES
Route::group(['prefix' => 'cmsPages'], function() {

    Route::get('/', [cmsController::class, 'cmsPages'])->name('cmsPages');
    Route::get('/create', [cmsController::class,'create_cmPages'])->name('create_cmPages');
    Route::post('/store', [cmsController::class,'cmsPagesStore'])->name('cmsPagesStore');
    Route::post('/{id}/update-status', [cmsController::class, 'updateStatus'])->name('updateCmsPagesStatus');
    Route::get('/edit/{id?}', [cmsController::class, 'cmsPageEdit'])->name('cmsPageEdit');
    Route::post('/update', [cmsController::class, 'cmsPagesUpdate'])->name('cmsPagesUpdate');
    Route::post('/delete', [cmsController::class, 'DeleteCmsPages'])->name('DeleteCmsPages');
});


});

//Frontend Routes

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('ebook', [FrontendController::class,'ebook'])->name('ebook');
Route::get('/Special', [FrontendController::class, 'Special'])->name('Special');
Route::get('/about', [FrontendController::class, 'About'])->name('About');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('category', [FrontendController::class, 'category'])->name('category');
Route::get('TopBlogs', [FrontendController::class, 'topBlogs'])->name('topBlogs');
Route::get('privacy-policy', [FrontendController::class, 'Privacy'])->name('Privacy');
Route::get('terms-and-condition', [FrontendController::class, 'Terms'])->name('Terms');
// Route::get('SpecialTest', [FrontendController::class, 'SpecialTest'])->name('SpecialTest');

// -------Route for store Enquiry//
Route::get('enquiry', [EnquiriesController::class, 'enquiry'])->name('enquiry');
Route::post('enquiry/store', [EnquiriesController::class, 'store'])->name('store');

Route::post('enquiry/delete', [EnquiriesController::class, 'DeleteEnquiry'])->name('DeleteEnquiry');





Route::get('/search', [FrontendController::class, 'getSuggestions'])->name('getSuggestions');
//Route::get('/update-view-count/{custom_url}', [BlogController::class ,'updateViewCount'])->name('updateViewCount');
Route::get('category/{custom_url?}/{id?}', [FrontendController::class, 'showCategoryPosts'])->name('categoryPosts');
Route::get('BlogDetail/{custom_url?}', [FrontendController::class, 'single'])->name('BlogDetail');



// });
