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
//Auth::routes();
Route::get('/','UserController@index');
Route::post('/', [ 'as' => 'login', 'uses' => 'UserController@login']);
Route::group(['prefix' => 'admin', 'middleware' => ['superAdmin', 'auth']], function (){
    Route::get('/gorcakal/user-list', 'UserController@list');
    Route::get('/gorcakal/add-user', 'UserController@addAdminBlade');
    Route::post('/gorcakal/add-user', 'UserController@addAdminPost');
    Route::get('/gorcakal/edit-user/{id}', 'UserController@updateAdminBlade');
    Route::get('/gorcakal/get-users/{id}', 'UserController@getUsersByAdmin');
    Route::get('/gorcakal/update-user-status/{id}/{status}', 'UserController@updateUserStatus');
    Route::post('/gorcakal/edit-user/{id}', 'UserController@updateAdminPost');
    Route::get('/logout', 'UserController@logout');
    Route::post('/reset/password/{id}', 'UserController@resetPassword');
    Route::get('/admins/delete/{id}', 'UserController@deleteAdmin');

    //marzer
    Route::get('/regions/regions-list/{id}', 'RegionsController@index');
    Route::get('/regions/sub-regions-list/{id}', 'RegionsController@getSubRegion');
    Route::get('/regions/add-region', 'RegionsController@addSubRegionBlade')->name('addRegionSuperAdmin');
    Route::post('/regions/add-region', 'RegionsController@addSubRegionPost');
    Route::get('/regions/edit-region/{id}', 'RegionsController@updateSubRegionBlade');
    Route::get('/regions/get-street/{region_id}/{sub_region_id}/{street}', 'RegionsController@getStreet');
    Route::post('/regions/edit-region/{id}', 'RegionsController@updateSubRegionPost');
    Route::get('/regions/delete/{id}', 'RegionsController@delete');

    //reality
    Route::get('/reality/reality-list/{id}/{type}', 'RealtyController@index');
    Route::get('/reality/get-count-reality/{id}', 'RealtyController@getCount');
    Route::get('/reality/get-reality-by-user-id/{id}', 'RealtyController@getRealityByUserId');
    Route::get('/reality/reality-print-list/{id}', 'RealtyController@printList');
    Route::post('/reality/reality-list/{id}/{type}', 'RealtyController@index');
    Route::get('/reality/add-reality', 'RealtyController@addRealityBlade');
    Route::post('/reality/add-reality', 'RealtyController@addRealityPost');
    Route::get('/regions/get-code', 'RealtyController@getCode');
    Route::get('/reality/update-reality-status/{id}/{status}', 'RealtyController@updateRealityStatus');
    Route::get('/reality/edit-reality/{id}', 'RealtyController@updateRealityBlade');
    Route::get('/reality/single-reality/{id}', 'RealtyController@singleRealityBlade');
    Route::post('/reality/edit-reality/{id}', 'RealtyController@updateRealityPost');
    Route::get('/reality/delete/{id}', 'RealtyController@delete');

    Route::get('/clients/{id}', 'RealtyController@usersList');
    Route::get('/client/{id}', 'RealtyController@curentUser');
});
Route::group(['prefix' => 'admin','middleware' => ['auth']],function (){
//    Route::get('/gorcakal/user-list', 'UserController@list');
    Route::get('/logout', 'UserController@logout');
    //reality
    Route::get('/reality/reality-list/{id}/{type}', 'RealtyController@index');
    Route::post('/reality/reality-list/{id}/{type}', 'RealtyController@index');
    Route::get('/reality/single-reality/{id}', 'RealtyController@singleRealityBlade');
    Route::get('/reality/reality-print-list/{id}', 'RealtyController@printList');

    Route::get('/clients/{id}', 'RealtyController@usersList');
    Route::get('/client/{id}', 'RealtyController@curentUser');
    Route::get('/logout', 'UserController@logout');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'super']], function (){
    Route::get('/create-company', 'CompanyController@createCompany')->name('company.create');
    Route::post('/create-company', 'CompanyController@storeCompany')->name('company.store');
    Route::get('/update-company/{id}', 'CompanyController@updateCompany')->name('company.update');
    Route::post('/update-company/{id}', 'CompanyController@editCompany')->name('company.edit');
    Route::get('/company-index', 'CompanyController@index')->name('company.index');

    Route::get('/create-company-admin', 'CompanyController@createAdmin')->name('company.admin.create');
    Route::post('/create-company-admin', 'CompanyController@storeAdmin')->name('company.admin.store');
    Route::get('/company-admin-index', 'CompanyController@indexAdmin')->name('company.admin.index');
});

Route::get('/home', 'HomeController@index')->name('home');

