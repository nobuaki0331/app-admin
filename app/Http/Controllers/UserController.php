<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('prefecture')->orderBy('id', 'desc')->get();

        return response($users);
    }
}
