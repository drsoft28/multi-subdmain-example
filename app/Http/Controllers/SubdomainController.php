<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subdomain;
class SubdomainController extends Controller
{
    function sayHello($hello,$subdomain=null) {
        $subdomain = request('subdomain');
        if($subdomain)
        return "$subdomain subdomain says $hello";
    return "Main project says $hello";
    }
    function welcome($subdomain=null) {
        $subdomain = request('subdomain');
        if($subdomain)
        return "Welcome to the $subdomain subdomain!";
    return dd(Subdomain::get());
    }
}
