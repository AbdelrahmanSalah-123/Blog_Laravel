<?php
namespace App;
use App\Models\Blog;
use App\Models\Post;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserBlogController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::Resource('AdminBlogs',BlogController::class);
Route::Resource('AdminPosts',PostController::class);
Route::get('/Blogs', [UserBlogController::class,'index']);
Route::get('/Blogs/search', [UserBlogController::class,'search'])->name('web.search');
Route::get('/Admin', function () {
    $blogs=Blog::paginate(4);
    $posts=Post::all();
    return view('Admin.index')->with(['blogs'=>$blogs,'posts'=>$posts]);
});
Route::get('/Post', function () {
    $posts=Post::all();
    return view('pages.post',compact('posts'));
});
Route::get('/Home', [HomeController::class,'index']);
Route::get('/sendEmail',[MailController::class,'sendMail']);
Route::get('/contact', [ContactController::class, 'createForm']);
Route::post('/contact', [ContactController::class, 'ContactUsForm'])->name('contact.store');