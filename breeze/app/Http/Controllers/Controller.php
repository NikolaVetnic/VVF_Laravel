<?php

namespace App\Http\Controllers;

use App\Http\Traits\UserTrait;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, UserTrait;

    /**
     * Store a newly created Post in storage.
     *
     * @param \Illuminate\Http\Request  $request
     *
     * @return Response
     */
    public function users(Request $request)
    {
        return User::all();
    }
}
