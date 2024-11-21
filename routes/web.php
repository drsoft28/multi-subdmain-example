<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubdomainController;
function routers() {


Route::get('/',[SubdomainController::class,'welcome']);
Route::get('/{hello}',[SubdomainController::class,'sayHello']);
}
Route::domain('restaurant.test','{subdomain}.restaurant.test')->group(function (){
    routers();
});
Route::domain('{subdomain}.restaurant.test')->group(function (){
    routers();
});
