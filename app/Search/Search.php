<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/11/16
 * Time: 6:47 PM
 */

namespace App\Search;


use App\Team;

class Search {

    public function teams($search){

        return Team::search($search);
    }

    public function pms(){

    }
} 