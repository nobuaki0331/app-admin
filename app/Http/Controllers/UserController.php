<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('prefecture')->orderBy('id', 'desc')->get();

        return response($users);
    }

    public function show($userId)
    {
        return User::find($userId);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'tel' => $request->tel
        ]);

        return response($user);
    }

    public function destroy() {
        $inputs = request()->all();
        $userIds = Arr::pull($inputs, 'ids');

        return User::destroy($userIds);
    }
}
