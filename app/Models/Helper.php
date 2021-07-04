<?php

namespace App\Models;


use Illuminate\Support\Facades\Route;


class Helper {

    const URL_REPO = 'https://github.com/thiagothg/myra_mutant_laravel';

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