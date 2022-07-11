<?php

namespace App\Http\Traits;

use App\Models\Student;
use App\Models\User;

trait UserTrait
{
    public function index()
    {
        $users = User::all();
        return $users;
    }
}
