<?php
/**
 * Created by PhpStorm.
 * User: ngizeh
 * Date: 10/05/16
 * Time: 19:05
 */

namespace App\Repositories;


use App\Sprint;

class SprintRepository
{
    protected $model;
    public function __construct(Sprint $sprint)
    {
        $this->model=$sprint;

    }
    public function index()
    {
        return Sprint::all();

    }

}