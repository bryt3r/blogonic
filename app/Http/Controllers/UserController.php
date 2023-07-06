<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function view_user($username)
    {
        $user = $this->get_user($username);

        return view('users.user')->with('user', $user);
    }

    public function my_profile() {
        $username = Auth::user()->username;
        $user = $this->get_user($username);
        return view('users.user')->with('user', $user);
    }


    private function get_user($username) {

       $user = User::with('posts', 'comments', 'likes')
        ->where('username', $username)
        // ->select('name', 'username','created_at', 'posts', 'comments', 'likes')
        ->first();

        return $user;
    }
}
