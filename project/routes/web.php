
<?php

use Illuminate\Support\Facades\Route;

Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.loginform');
Route::post('admin','Admin\LoginController@adminLogin')->name('admin.login');



Route::group(['as'=>'admin.', 'prefix'=>'admin','namespace'=>'Admin',['middleware'=>['admin']]],function(){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('logout','LoginController@logout')->name('logout');

    Route::get('changepass','DashboardController@changepass')->name('changepass');
    Route::post('changepassupdate','DashboardController@changepassupdate')->name('changepass.update');

    // Word Routes Start
    Route::get('words','AdminWordController@index')->name('words.all');
    Route::get('pending/words','AdminWordController@pending')->name('words.pending');
    Route::post('words','AdminWordController@store')->name('words.store');
    Route::get('words/status/{id1}/{id2}','AdminWordController@status')->name('words.status');
    Route::post('words/{id}','AdminWordController@update')->name('words.update');
    Route::get('words/delete/{id}','AdminWordController@delete')->name('words.delete');
    

    // All Donation Campaign Routes Start 
    Route::get('donation','DonationController@index')->name('donation.all');
    Route::post('donation/update','DonationController@update')->name('donation.update');

    // All Donation Campaign Routes End

Route::get('all/user/donation','DonationController@alluser')->name('all.user.donations');
Route::get('donation/user/delete/{id}','DonationController@delete')->name('donation.user.delete');

   
    // Page Controller route 
    Route::get('pages','PageController@index')->name('pages.all');
    Route::get('pages/create','PageController@create')->name('pages.create');
    Route::post('page/store','PageController@store')->name('pages.store');
    Route::get('pages/edit/{id}','PageController@edit')->name('pages.edit');
    Route::post('pages/{id}','PageController@update')->name('pages.update');
    Route::get('pages/delete/{id}','PageController@delete')->name('pages.delete');

    // Paypal Info 
    Route::get('paypal','GeneralSettingContoller@paypal')->name('paypal');

    // Advertisement Controller 
    Route::get('advertisement','AdvertisementController@index')->name('advertisement.all');
    Route::get('advertisement/create','AdvertisementController@create')->name('advertisement.create');
    Route::post('advertisement/store','AdvertisementController@store')->name('advertisement.store');
    Route::get('advertisement/edit/{id}','AdvertisementController@edit')->name('advertisement.edit');
    Route::post('advertisement/{id}','AdvertisementController@update')->name('advertisement.update');
    Route::get('advertisement/delete/{id}','AdvertisementController@delete')->name('advertisement.delete');


    // Area Routes Start


    // Store Routes Start


    // Coupon Routes Start







    // Blog Category Routes Start
    Route::get('blog/categories','BlogCategoryController@index')->name('blog.categories');
    Route::post('blog/categories','BlogCategoryController@store')->name('blog.categories.store');
    Route::post('blog/categories/{id}','BlogCategoryController@update')->name('blog.categories.update');
    Route::get('blog/categories/delete/{id}','BlogCategoryController@delete')->name('blog.categories.delete');
    // Blog Category Routes End


    // Blog Routes Start
    Route::get('blog','BlogController@index')->name('blog');
    Route::get('blog/create','BlogController@create')->name('blog.create');
    Route::post('blog','BlogController@store')->name('blog.store');
    Route::get('blog/edit/{id}','BlogController@edit')->name('blog.edit');
    Route::post('blog/{id}','BlogController@update')->name('blog.update');
    Route::get('blog/delete/{id}','BlogController@delete')->name('blog.delete');


    // Home Banner Route Start


    // Contact Section Route Start
    Route::get('contact','ContactController@index')->name('contact');
    Route::post('contact/{id}','ContactController@update')->name('contact.update');

    Route::get('seotools','GeneralSettingContoller@seotools')->name('seotools');
    Route::post('generalsetting/update','GeneralSettingContoller@update')->name('generalsetting.update');

    // EmailSetting Route Start
    Route::get('email/setting','GeneralSettingContoller@email')->name('email.setting');
    Route::get('general/setting','GeneralSettingContoller@general')->name('general.setting');

   
    

});

// Owner Routes Start
Route::prefix('user')->group(function() {
Route::get('/login','Owner\LoginController@showLoginForm')->name('loginform');
Route::post('/login','Owner\LoginController@ownerLogin')->name('login');

Route::get('/register','Owner\RegisterController@showRegisterForm')->name('registerform');
Route::post('/register/submit','Owner\RegisterController@ownerRegister')->name('register');



    Route::get('/dashboard','Owner\DashboardController@index')->name('user.dashboard');
    Route::get('/logout','Owner\LoginController@logout')->name('logout');

    Route::get('/change/password','Owner\DashboardController@changepass')->name('changepass');
    Route::post('/change/password','Owner\DashboardController@changepassupdate')->name('changepassupdate');

    Route::get('/profile','Owner\DashboardController@profile')->name('profile');
    Route::post('/profile','Owner\DashboardController@profileupdate')->name('profileupdate');



});







// Frontend Routes
Route::get('/','Frontend\FrontendController@index')->name('front.index');
// thumbs up
Route::post('/thumbsup/{id}','Frontend\FrontendController@thumbsup')->name('thumbsup');
Route::post('/thumbsdown/{id}','Frontend\FrontendController@thumbsdown')->name('thumbsdown');
Route::get('/all/donation', 'Frontend\DonationController@all_donation')->name('all.donation');
Route::get('/payment/cancle','Frontend\DonationController@paycancle')->name('payment.cancle');
Route::get('/payment/return','Frontend\DonationController@payreturn')->name('payment.return');

// Alphabet Routes Start
Route::get('/alphabet/{id}','Frontend\AlphabetController@alphabet')->name('alphabet');
Route::get('/alphabet/word/{word}','Frontend\AlphabetController@alphabet_word')->name('alphabet.word');

// User word adding route 
Route::get('/user/word/addd','Frontend\AlphabetController@user_word_add')->name('user.word.add');
Route::post('/user/word/add','Frontend\AlphabetController@user_word_store')->name('user.word.store');


Route::post('/paypal-submit/new', 'Frontend\PaypalController@store')->name('paypal.submit');
Route::get('/paypal-notify',  'Frontend\PaypalController@notify')->name('paypal.notify');

// Advertisement route 
Route::get('/advertisement','Frontend\FrontendController@ads_index')->name('advertisement');
Route::post('/advertisement/user','Frontend\FrontendController@ads_store')->name('advertisement.store');

// Contact Route Start
Route::post('ad/click', 'Frontend\FrontendController@adclick')->name('ads.click');

// Blog Cotroller Route Start
Route::get('/blog','Frontend\FrontendController@all_blog')->name('blog');
Route::get('/blog/{id}','Frontend\FrontendController@blog_details')->name('single.blog');

// Page Route Start
Route::get('/page/{slug}','Frontend\FrontendController@page')->name('page');

// search route
Route::get('/findings','Frontend\FrontendController@search')->name('search');
































