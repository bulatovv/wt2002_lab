<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Item;

class FeedController extends Controller
{
    public function index()
    {
        $items = Item::whereIn('user_id', function($query) {
            $query->select('friend_id')
                ->from('friendships')
                ->where('user_id', Auth::id());
        })->with('user')->latest()->get();

        return view('feed', ['items' => $items]);
    }
}
