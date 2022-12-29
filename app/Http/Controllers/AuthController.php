<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        session()->flush();
        return redirect("/");
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $payload = [
            'email' => $email,
            'password' => $password,
        ];

        $auth = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/login",
            $payload,
        );

        if (!session()->isStarted()) {
            session()->start();
        }

        if ($auth['status'] == 'error') {
            return redirect('/')->with('error', $auth['message']);
        }

        $token = $auth['data']['auth']['token'];
        $token_type = $auth['data']['auth']['token_type'];
        session()->put("token", "$token_type $token");
        session()->put("role", $auth['data']['user']['role']);
        session()->put("name", $auth['data']['user']['name']);

        if($auth['data']['user']['role'] == 2) {
            return redirect('/dashboard/admin')->with('success', $auth['message']);
        }
        if($auth['data']['user']['role'] == 1) {
            return redirect('/dashboard/user')->with('success', $auth['message']);
        }

    }
}