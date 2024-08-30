<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __invoke(AuthRequest $request) {
        $data = $request->validated();
        $email = '';
        $password = '';
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
            session(['user_id' => $user->id]);
            return response()->redirectTo('/');
        }

        return response()->redirectTo('/auth?hasError=true');
    }
}
