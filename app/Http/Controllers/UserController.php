<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\User;
 
class UserController extends Controller
{
    public function show(User $user)
    {
        return view('user', [
            'user' => $user
        ]);
    }
}
