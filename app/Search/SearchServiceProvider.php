<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/11/16
 * Time: 8:16 PM
 */

namespace App\Search;


use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider {

    public function register(){

        $this->app->bind('search', Search::class);
    }
} 