<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController
{
    /**
     * Index test method
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validate = Validator::make($request->except('rules'), $request->rules);

            if ($validate->fails()) {
                return response()->json(['errors' => $validate->errors()], 400);
            }

            return response()->json(['success' => true], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
