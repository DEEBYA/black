 <?php

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

// Route::get('/', function () {
// 	\Mail::to(App\User::first())->send(new \App\Mail\PleaseConfirmYourEmail());
//     return view('welcome');
// });

Route::get('/','HomeController@view');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('users/logout','Auth\LoginController@userlogout')->name('user.logout');

// Route::post('api/users/{user}/avatar','Api\UserAvatarController@store')->middleware('auth')->name('avatar');

Route::get('/books','BooksController@index')->name('books');;

Route::get('/books/{channel}','BooksController@index');
Route::get('/statuses/{book}','BooksController@fetching');

Route::get('/books/{channel}/{book}','UserbookController@show');
Route::get('/edit-book/{channel}/{book}','UserbookController@edit');
Route::post('/edit-book/{channel}/{book}','UserbookController@update');

Route::delete('/books/{book}','UserbookController@destroy');

Route::post('api/books/{book}','Api\UserbookimageController@store');




// Creating a book by a user
Route::get('/create','UserbookController@create');
Route::post('/create','UserbookController@store')->middleware('must-be-confirmed');
// Route::get('/profiles/{channel}/{book}','UserbookController@show');
Route::delete('/profiles/{channel}/{book}','UserbookController@destroy');

// Reply Controller
Route::post('/books/{channel}/{book}/replies', 'ReplyController@store');
Route::patch('/replies/{reply}','ReplyController@update');
Route::delete('/replies/{reply}','ReplyController@destroy');

Route::get('/books/search','SearchController@show');
// News Controller
Route::get('/news','NewsController@index');
Route::get('/news/{new}','NewsController@show');
Route::post('/news/{new}/favorites','NewsFavoriteController@store');
Route::delete('/news/{new}/favorites','NewsFavoriteController@destroy');


Route::post('/replies/{reply}/favorites','FavouritesController@store');
Route::delete('/replies/{reply}/favorites','FavouritesController@destroy');

Route::get('/profiles/{user}','ProfilesController@show')->name('profile');
Route::post('/profiles/{user}','ProfilesController@update_avatar')->name('profile.upload');

Route::post('/profiles/{channel}/{book}','ProfilesController@show');
// Route::get('/profiles/{user}/notifications/{notification}','@index');
// Route::delete('/profiles/{user}/notifications/{notification}','@destroy');

Route::get('/register/confirm', 'Auth\RegisterConfirmatoinController@index')->name('register.confirm');

// Subscriptions Controller  
// Route::post('/books/{channel}/{book}/subscriptions', 'BookSubscriptionsController@store')->middleware('auth');
// Route::delete('/books/{channel}/{book}/subscriptions', 'BookSubscriptionsController@destroy')->middleware('auth');
// Route::get('/','QuotesController@index');


// For Admin Section Route
Route::prefix('admin')->group( function() {

	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/register', 'AdminController@create');
	Route::post('/register', 'AdminController@store');
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');

	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');


	Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

	Route::get('/view-admins','AdminController@viewadmin');
	Route::get('/view-users','UserController@view');

	// Books Routing  
	Route::get('/view-books','BooksController@views');
	Route::get('/add-books','BooksController@create');
	Route::post('/add-books','BooksController@store');
	Route::get('/edit-books/{book}','BooksController@edit');
	Route::post('/edit-books/{book}','BooksController@update');
	Route::delete('/books/{book}','BooksController@destroy')->name('books.destroy');

	// Category Routing
	Route::get('/category','ChannelController@index');
	Route::get('/add-categories','ChannelController@create');
	Route::post('/add-categories','ChannelController@store');
	Route::get('/edit_categories/{channel}','ChannelController@edit');
	Route::post('/edit_categories/{channel}','ChannelController@update');
	Route::delete('/category/{channel}','ChannelController@destroy')->name('quotes.destroy');

	
	// Quotes Routing
	Route::get('/quotes','QuotesController@view');
	Route::get('/add-quotes','QuotesController@create');
	Route::post('/add-quotes','QuotesController@store');
	Route::get('/edit-quotes/{quotes}','QuotesController@edit');
	Route::post('/edit-quotes/{quotes}','QuotesController@update');
	Route::delete('/quotes/{quotes}','QuotesController@destroy')->name('quotes.destroy');

	// News Routing
	Route::get('/view-news','NewsController@view');
	Route::get('/add-news','NewsController@create');
	Route::post('/add-news','NewsController@store'); 
	Route::get('/edit-news/{new}','NewsController@edit');
	Route::post('/edit-news/{news}','NewsController@update');
	Route::delete('/news/{news}','NewsController@destroy');

	// SLide Controller
	Route::get('/view-slide','SlideController@index');
	Route::get('/slider','SlideController@create');
	Route::post('/slider','SlideController@store');
	Route::get('/edit-slider/{slide}','SlideController@edit');
	Route::post('/edit-slider/{slide}','SlideController@update');
	Route::delete('/slides/{slide}','SlideController@destroy')->name('slide.destroy');

	  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});  