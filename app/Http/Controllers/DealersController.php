<?php

namespace App\Http\Controllers;

use App\Models\Client;
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

    public function show(User $user) {
        $pageInfo = [
            'title' => $user->org_name
        ];
        $clients = [];
        $clientCount = 0;
        $dealerClients = Client::where('user_id', $user->id)->get();

        if($dealerClients) {
            $clients = $dealerClients;
            $clientCount = $clients->count();
        }
        return view(
            'dealers.dealer-info',
            [
                'pageInfo' => $pageInfo,
                'dealer_info' => $user,
                'clients' => $clients,
                'client_count' => $clientCount
            ]
        );
    }
}
