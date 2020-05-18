<?php 
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web'],'prefix' => 'admin','as' => 'admin.','namespace' => 'Iziedev\Iziecode\App\Http\Controllers'],function(){
    
    Route::resources([
        'menu' => 'MenuController'
    ]);


});