<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class DataController extends Controller
{
    public function open()
    {
        $data = array("msg" => "This data is open to all users.");
        header("Content-Type: application/json");

        return json_encode($data);
    }

    public function closed()
    {
        $token = request()->bearerToken();
        $user = JWTAuth::setToken($token)->toUser();
        if ($user == null) {
            abort(401);
        }

        $data = array("msg" => "This data is for authenticated users only.", "user" => $user);
        header("Content-Type: application/json");

        return json_encode($data);
    }
}
