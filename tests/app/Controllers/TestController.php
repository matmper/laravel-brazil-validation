<?php

namespace App\Controllers;

use Illuminate\Http\Request;

class TestController
{
    public function index(Request $request): bool
    {
        $request->validate($request->rules);

        return true;
    }
}
