<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('Shop/index');
// });

Route::get('/',[
    
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
    
    ]);

Route:: get('/add-to-cart/{id}', [
    
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
    
    
    ]);





Route::group(['prefix' =>'user'],function(){
    
    Route::group(['middleware' => 'guest'], function(){
       
       
    
    Route::get('/signup',[
    'uses' => 'UserController@getSignup',
    'as' => 'User.signup'

    
    ] );

    
    Route::post('/signup',[
    'uses' => 'UserController@postSignup',
    'as' =>'User.signup'

    ]);
       
    Route::get('/signin',[
        'uses' => 'UserController@getSignin',
        'as' => 'User.signin'
        ] );
        
    Route::post('/signin',[
        'uses' => 'UserController@postSignin',
        'as' =>'User.signin'

        ]);
       
    });
    
    
    
    Route::group(['middleware' => 'auth'], function(){
        
        Route::get('/profile',[
        'uses' => 'UserController@getProfile',
        'as' => 'User.profile'
        ]);    
    
    
        Route::get('/logout',[
        'uses' => 'UserController@getLogout',
        'as' => 'User.logout'
        ]);  
       
        
    });
    
    
} );

