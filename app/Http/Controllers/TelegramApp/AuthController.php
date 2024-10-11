<?php

namespace App\Http\Controllers\TelegramApp;

use App\Http\Controllers\Controller;
use App\Http\Requests\TelegramRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __invoke(TelegramRequest $request) {
        $data = $request->validated();

        if(isset($data['email'])) {
            $email = $data['email'];
        }

        if(isset($data['password'])) {
            $password = $data['password'];
        }

        if(empty($email) || empty($password)) {
            return redirect('/auth?hasError=true');
        }

        $filter = [
            'mail' => $email,
            'password' => md5($password)
        ];
        $user = User::where($filter)->first();

        if($user) {
            if(isset($data['telegram_id'])) {
                $user->update(['telegram_id' => $data['telegram_id']]);
                return redirect('/telegram-site/success');
            }
        }

        return redirect('/auth?hasError=true');
    }
}
