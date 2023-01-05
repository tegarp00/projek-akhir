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
            "https://winter-night-241.fly.dev/api/login",
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
        session()->put("id_user", $auth['data']['user']['id']);
        session()->put("role", $auth['data']['user']['role']);
        session()->put("name", $auth['data']['user']['name']);

        if($auth['data']['user']['role'] == 2) {
            return redirect('/dashboard/admin')->with('success', $auth['message']);
        }
        if($auth['data']['user']['role'] == 1) {
            return redirect('/dashboard/user')->with('success', $auth['message']);
        }

    }

    public function createBuku(Request $request)
    {
        $payload = [
            'id_kategori' => 1,
            'judul' => $request->input("judul"),
            'jumlah_halaman' => $request->input("jumlah_halaman"),
            'kuota' => $request->input("kuota"),
            'pengarang' => $request->input("pengarang"),
            'penerbit' => $request->input("penerbit"),
            'tahun_terbit' => $request->input("tahun_terbit"),
            'author' => $request->input("author"),
            'isbn' => $request->input("isbn"),
        ];


        $files = [
            'file'=> $request->file('file'),
            'image'=> $request->file('image'),
        ];

        // dd($files);
        // $t1=HttpClient::fetch("POST", "http://localhost:8000/api/buku", $payload);
        $t2=HttpClient::fetch("POST", "https://winter-night-241.fly.dev/api/buku", $payload, $files);

        // dd($t2);
        return redirect()->back();

        // $author = HttpClient::fetch("POST", "http://localhost:8000/api/book", $payload);

        // return redirect()->route("home");
    }

}