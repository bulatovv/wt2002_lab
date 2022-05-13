<?php

namespace App\Http\Controllers;

use App\Http\Requests\FriendshipRequest;
use App\Models\User;

class FriendshipController extends Controller
{
    public function store(FriendshipRequest $request, User $user)
    {   
        $user->friends()->sync($request->user_id, false);
        return redirect()->back();
    }

    public function destroy(FriendshipRequest $request, User $user)
    {
        $user->friends()->detach($request->user_id);  
        return redirect()->back();
    }
}
