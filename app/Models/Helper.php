<?php

namespace App\Models;


use Illuminate\Support\Facades\Route;


class Helper {



    /**
     * Verify current Route for active item navbar.
     *
     * @param String $nameRoute
     * 
     * @return bool 
     */
    static function verifyCurrentRoute($nameRoute) 
    {
        $route = Route::current();

        return $route->uri == $nameRoute;
    }
}