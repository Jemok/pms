<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/11/16
 * Time: 8:09 PM
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Search extends Facade{

    protected  static  function getFacadeAccessor(){

        return 'search';
    }

} 