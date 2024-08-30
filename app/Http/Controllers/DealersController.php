<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DealersController extends Controller
{
    public function index() {
        $dealers = User::all();
        $pageInfo = [
            'title' => 'Диллеры'
        ];
        return view('dealers.dealers', ['pageInfo' => $pageInfo, 'dealers' => $dealers]);
    }
}
