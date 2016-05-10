<?php
namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: renn
 * Date: 5/4/16
 * Time: 5:02 PM
 */
use App\Project;
use App\User;

class EditProfileRepository
{
    protected $model;
    public function __construct(User $user)
    {
        $this->model=$user;

    }
    public function index()
    {
        return User::all();

    }

}