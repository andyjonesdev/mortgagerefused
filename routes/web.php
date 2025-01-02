<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\BrokersController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\FAQsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CalendarsController;
use App\Models\Page;
use App\Models\Post;

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

Route::get("/",[PagesController::class, 'welcome'])->name('welcome');
Route::view("/enquiry-thankyou","enquiry-thankyou");
Route::view("/enquiry-resubmit","enquiry-resubmit");

// Route::get('/dashboard', [PermissionsController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//   return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get("/dashboard",[PermissionsController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("/pages",[PagesController::class, 'list'])->name('pages');
    Route::get("/add-page",[PagesController::class, 'add'])->name('add-page');
    Route::get("/edit-page/{slug}",[PagesController::class, 'edit'])->name('edit-page');
    Route::get("/edit-page-home/{slug}",[PagesController::class, 'editHome'])->name('edit-page-home');
    Route::get("/delete-page/{id}",[PagesController::class, 'delete']);
    Route::get("/moveup/{id}",[PagesController::class, 'moveup']);
    Route::get("/movedown/{id}",[PagesController::class, 'movedown']);

    Route::get("/testimonials",[TestimonialsController::class, 'testimonials_list'])->name('testimonials');
    Route::post("addTestimonial",[TestimonialsController::class, 'add']);
    Route::get("/edit-testimonial/{id}",[TestimonialsController::class, 'edit'])->name('edit-testimonial');
    Route::post("/edit-testimonial/editTestimonial",[TestimonialsController::class, 'update']);
    Route::get("/delete-testimonial/{id}",[TestimonialsController::class, 'delete']);
    // Route::get("/edit-testimonials",[TestimonialsController::class, 'list'])->middleware(['auth'])->name('edit-testimonials');

    Route::get("/enquiries/{filter_status}/{filter_broker}",[EnquiriesController::class, 'enquiries_list'])->name('enquiries');
    Route::get("/delete-enquiry/{id}",[EnquiriesController::class, 'delete']);
    Route::get("/enquiry/{id}",[EnquiriesController::class, 'view']);
    Route::post("/updateBrokerNotes",[EnquiriesController::class, 'updateBrokerNotes']);
    Route::post("/reAssignBroker",[EnquiriesController::class, 'reAssignBroker']);
    Route::post("/exportData",[EnquiriesController::class, 'exportData'])->name('exportData');

    Route::get("/brokers/{duplicate}",[BrokersController::class, 'list'])->name('brokers');
    Route::post("/addBroker",[BrokersController::class, 'add']);
    Route::get("/edit-broker/{id}",[BrokersController::class, 'edit'])->name('edit-testimonial');
    Route::post("/edit-broker/editBroker",[BrokersController::class, 'update']);
    Route::get("/delete-broker/{id}",[BrokersController::class, 'delete']);
    Route::get("/brokers/{id}",[BrokersController::class, 'view']);

    Route::post("addRole",[PermissionsController::class, 'addRole']);
    Route::post("addPermission",[PermissionsController::class, 'addPermission']);
    Route::get("/permissions",[PermissionsController::class, 'list'])->name('permissions');
    Route::get("/delete-permission/{role_id}/{permission_id}",[PermissionsController::class, 'deletePermission']);

    Route::get("/admin-users",[PermissionsController::class, 'list_admin'])->name('admin-users');

    Route::post("addFAQ",[FAQsController::class, 'add']);
    Route::post("edit-faq/editFAQ",[FAQsController::class, 'update']);
    Route::get("delete-faq/{id}",[FAQsController::class, 'delete']);
    Route::get("/edit-faqs",[FAQsController::class, 'list'])->name('edit-faqs');
    Route::get("/edit-faq/{id}",[FAQsController::class, 'edit'])->name('edit-faq');

    Route::get("/edit-post/{id}",[PostsController::class, 'edit'])->name('edit-post');
    Route::get("/posts",[PostsController::class, 'list'])->name('posts');
    Route::get("/add-post/",[PostsController::class, 'add'])->name('add-post');

    Route::get("/calendar",[CalendarsController::class, 'view'])->name('calendar');
    Route::get("/calendar/{broker_id}",[CalendarsController::class, 'view_with_id'])->name('calendar_with_id');
});

require __DIR__.'/auth.php';

//Render pages with data from DB
$pages = Page::where('menu','Header')->get();
foreach ($pages as $key => $page) {
  //echo 'page name = '.$page->name;
  //echo ', page slug = '.$page->slug;
  //echo ', page id = '.$page->id;
  $data = $page->id;
  Route::get($page->slug, [
    'uses' => 'App\Http\Controllers\PagesController@view',
    'page' => $page->id
  ])->name($page->slug);
}

//Render pages with data from DB
$pages = Page::where('menu','')->get();
foreach ($pages as $key => $page) {
  //echo 'page name = '.$page->name;
  //echo ', page slug = '.$page->slug;
  //echo ', page id = '.$page->id;
  $data = $page->id;
  Route::get($page->slug, [
    'uses' => 'App\Http\Controllers\PagesController@view',
    'page' => $page->id
  ])->name($page->slug);
}

$pages = Page::where('menu','Footer')->get();
foreach ($pages as $key => $page) {
$data = $page->id;
Route::get($page->slug, [
    'uses' => 'App\Http\Controllers\PagesController@view',
    'page' => $page->id
])->name($page->slug);
}

$posts = Post::get();
foreach ($posts as $key => $post) {
  $data = $post->id;
  Route::get($post->slug, [
    'uses' => 'App\Http\Controllers\PostsController@view',
    'post' => $post->id
  ])->name($post->slug);
}

Route::get("/faqs",[FAQsController::class, 'faqs_list'])->name('faqs');
Route::get("/blog",[PostsController::class, 'blog_list'])->name('blog');
Route::view("/contact-thanks",'contact-thanks');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});