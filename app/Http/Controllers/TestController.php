<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index($id, $name = null, Request $request){
        return response()->json($request->path());
    }
}
