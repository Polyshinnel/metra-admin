<?php

namespace App\Http\Controllers\TelegramApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request) {
        $hasErr = false;
        if($request->query('hasError')) {
            $hasErr = true;
        }
        return view('telegram.auth', ['hasErr' => $hasErr]);
    }
}
