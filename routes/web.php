<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ImageSliderController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Frontend\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
     php artisan config:cache
     php artisan view:clear 
     composer dump-autoload
*/


Auth::routes();

/*
  Site Frontend All Routes
*/
Route::get('/', [IndexController::class, 'index'])->name('index');


/*
   Admin panel all Routes 
 */

Route::middleware(['authcheck'])->prefix('admin')->group(function (){


 /* Route::group(['prefix' => 'admin'], function(){ }); */

     Route::get('/', [AdminController::class, 'index'])->name('admin.index');
     Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
     Route::post('/login', [AdminController::class, 'admin_login'])->name('admin.admin_login');
     Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

     /*Admin Create Route*/
     Route::get('/admin_list', [AdminController::class, 'admin_list'])->name('admin.admin_list');
     Route::post('/admin_list', [AdminController::class, 'store'])->name('admin.admin_store');

     Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
     Route::post('/edit/{id}', [AdminController::class, 'update'])->name('admin.update');
     Route::post('/admin_list/{id}', [AdminController::class, 'delete'])->name('admin.delete');

     // image slider
     Route::get('/image-slider', [ImageSliderController::class, 'index'])->name('admin.image-slider');
     Route::post('/image-slider', [ImageSliderController::class, 'create'])->name('admin.slider_image_store');
     Route::get('/image-slider', [ImageSliderController::class, 'showdata'])->name('admin.image-slider');
     Route::get('/image-slider-edit/{id}', [ImageSliderController::class, 'edit'])->name('admin.image-slider-edit');
     Route::post('/image-slider-edit/{id}', [ImageSliderController::class, 'update'])->name('admin.slider_image_update');
     Route::post('/image-slider/{id}', [ImageSliderController::class, 'delete'])->name('admin.image_slider_delete');

    // Notice Route manage..
     Route::get('/notice', [NoticeController::class, 'index'])->name('admin.notice');
     Route::post('/notice', [NoticeController::class, 'create'])->name('admin.notice_store');
     Route::get('/notice-edit/{id}', [NoticeController::class, 'edit'])->name('admin.notice-edit');
     Route::post('/notice-edit/{id}', [NoticeController::class, 'update'])->name('admin.notice_update');
     Route::post('/notice/{id}', [NoticeController::class, 'delete'])->name('admin.notice_delete');


});

