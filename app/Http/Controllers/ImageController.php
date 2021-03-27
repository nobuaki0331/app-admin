<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ImageController extends Controller
{
    public function store()
    {
        $file_name = request()->file->getClientOriginalName();
        request()->file->storeAs('public/',$file_name);
        $user = auth()->user();
        $auth_user = User::where('id', $user->id)->first();
        $auth_user->image = '/storage/'.$file_name;
        $auth_user->save();

        return $user;
    }
}
