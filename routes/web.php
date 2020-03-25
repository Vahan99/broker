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

Route::get('/','UserController@index');
Route::post('/', [ 'as' => 'login', 'uses' => 'UserController@login']);
Route::post('/entry-reset-password', 'UserController@entryResetPassword')->name('entry.reset.password');
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function (){
    //brokers
    Route::get('/broker/user-list', 'UserController@list');
    Route::get('/broker/add-user', 'UserController@addAdminBlade');
    Route::get('/broker/edit-user/{id}', 'UserController@updateAdminBlade');
    Route::get('/broker/get-users/{id}', 'UserController@getUsersByAdmin');
    Route::get('/broker/update-user-status/{id}/{status}', 'UserController@updateUserStatus');
    Route::get('/logout', 'UserController@logout');
    Route::get('/admins/delete/{id}', 'UserController@deleteAdmin');

    Route::post('/broker/edit-user/{id}', 'UserController@updateAdminPost');
    Route::post('/broker/add-user', 'UserController@addAdminPost');
    Route::post('/reset/password/{id}', 'UserController@resetPassword');

    //regions
    Route::get('/regions/regions-list/{id}', 'RegionsController@index');
    Route::get('/regions/sub-regions-list/{id}', 'RegionsController@getSubRegion');
    Route::get('/regions/add-region', 'RegionsController@addSubRegionBlade')->name('addRegionSuperAdmin');
    Route::get('/regions/edit-region/{id}', 'RegionsController@updateSubRegionBlade');
    Route::get('/regions/get-street/{region_id}/{sub_region_id}/{street}', 'RegionsController@getStreet');
    Route::get('/regions/delete/{id}', 'RegionsController@delete');

    Route::post('/regions/add-region', 'RegionsController@addSubRegionPost');
    Route::post('/regions/edit-region/{id}', 'RegionsController@updateSubRegionPost');

    //reality
    Route::get('/reality/reality-list', 'RealtyController@index')->name('realty.index');
    Route::get('/reality/reality-print-list/{id}', 'RealtyController@printList')->name('realty.print');
    Route::get('/reality/add-reality', 'RealtyController@create')->name('realty.create');
    Route::get('/reality/update-reality-status/{id}/{status}', 'RealtyController@updateRealityStatus')->name('realty.status');
    Route::get('/reality/single-reality/{id}', 'RealtyController@single')->name('realty.single');

    Route::post('/reality/add-reality', 'RealtyController@add')->name('realty.add');

    //Customers
    Route::get('customers', 'CustomerController@index')->name('customer.index');
    Route::get('customers/create', 'CustomerController@create')->name('customer.create');
    Route::post('customers/add', 'CustomerController@add')->name('customer.add');
});
Route::group(['prefix' => 'super', 'middleware' => ['web', 'auth', 'super']], function (){
    Route::get('/dashboard', 'AdminController@index')->name('superadmin.index');
    Route::get('/create-company', 'CompanyController@createCompany')->name('company.create');
    Route::get('/update-company/{id}', 'CompanyController@updateCompany')->name('company.update');
    Route::get('/company-index', 'CompanyController@index')->name('company.index');
    Route::get('/create-company-admin', 'CompanyController@createAdmin')->name('company.admin.create');
    Route::get('/company-admin-index', 'CompanyController@indexAdmin')->name('company.admin.index');

    Route::post('/create-company', 'CompanyController@storeCompany')->name('company.store');
    Route::post('/update-company/{id}', 'CompanyController@editCompany')->name('company.edit');
    Route::post('/create-company-admin', 'CompanyController@storeAdmin')->name('company.admin.store');
});

