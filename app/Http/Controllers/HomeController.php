<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke() {
        $pageInfo = [
            'title' => 'Дашборд'
        ];
        return view('home', ['pageInfo' => $pageInfo]);
    }
}
