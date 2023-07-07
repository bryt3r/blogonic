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

    public function my_profile()
    {
        $username = Auth::user()->username;
        $user = $this->get_user($username);
        return view('users.user')->with('user', $user);
    }


    private function get_user($username)
    {

        $user = User::where('username', $username)
            ->select(['id', 'name', 'username', 'created_at'])
            ->with('posts:id,user_id', 'comments:id,user_id', 'likes:id,user_id')
            ->first();

        return $user;
    }
}
