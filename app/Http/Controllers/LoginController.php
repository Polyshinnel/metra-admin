<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $hasErr = false;
        if($request->query('hasError')) {
            $hasErr = true;
        }
        return response()->view('auth', ['hasErr' => $hasErr]);
    }
}
