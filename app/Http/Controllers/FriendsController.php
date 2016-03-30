<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $not_friends = User::where('id', '!=', Auth::user()->id);
        if (Auth::user()->friends()->count()) {
            $not_friends->whereNotIn('id', Auth::user()->friends()->get()->modelKeys());
        }
        $not_friends = $not_friends->get();

        return View::make('friends.index')->with('not_friends', $not_friends);
    }
    
    public function getAddFriend($id)
    {
        $user = User::find($id);
        Auth::user()->addFriend($user);
        return Redirect::back();
    }

    public function getRemoveFriend($id)
    {
        $user = User::find($id);
        Auth::user()->removeFriend($user);
        return Redirect::back();
    }

   }
