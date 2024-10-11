<?php

namespace App\Http\Controllers\TelegramApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function __invoke()
    {
        return view('telegram.success-auth');
    }
}
