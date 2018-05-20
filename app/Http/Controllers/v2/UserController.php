<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getProfile()
    {
        return response()->json(['status' => 'ok']);
    }
}
