<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubdomainController;
function routers() {


Route::get('/',[SubdomainController::class,'welcome']);
Route::get('/{hello}',[SubdomainController::class,'sayHello']);
}
Route::domain('multisubdomain.test')->group(function (){
    routers();
});
Route::domain('{subdomain}.multisubdomain.test')
->middleware('checkSubdomain')
->group(function (){
    routers();
});
