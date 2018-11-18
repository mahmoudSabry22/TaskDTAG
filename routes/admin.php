<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your dashboard. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

//Route::group(['middleware' => ['admin']], function () {

	//the main page
    Route::get('/', 'AdminController@index');
    

    //CRUD of product model
    Route::resource('/product', 'productsController');
    //make soft delete
	Route::delete('deleteAllProduct', 'productsController@destroyAll')->name('destroyed');
	//make force delete
	Route::get('deleteProduct/{id}', 'productsController@delete')->name('theproduct.destroy');
	

	//show and index of departments
	Route::get('index_depart', 'departmentsController@index')->name('dep.index');
	//get create view to add a new departments
	Route::get('create_depart', 'departmentsController@create')->name('dep.create');
	//store the new departments
	Route::post('store_depart', 'departmentsController@store')->name('dep.store');

	
	//get departments id by ajax
	Route::post('ourproduct', 'productsController@alldepartments');


//});




