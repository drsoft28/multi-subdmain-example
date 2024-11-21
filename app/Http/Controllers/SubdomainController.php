<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubdomainController extends Controller
{
    function sayHello($hello,$subdomain=null) {
        if($subdomain)
        return "$subdomain subdomain says $hello";
    return "Main project says $hello";
    }
    function welcome($subdomain=null) {
        if($subdomain)
        return "Welcome to the $subdomain subdomain!";
    return "Welcome to main project";
    }
}
