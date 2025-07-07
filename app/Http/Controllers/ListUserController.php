<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListUserController extends Controller
{
  public function index()
  {
    $authUser = Auth::user();
    $user = null;

    // Not logged in
    if (!$authUser) {
      return view('home', [
        'user' => $user,
        'loginToSeeUsers' => true
      ]);
    }

    if ($authUser != null) {
      $user = $authUser->only(["name", "picture"]);
      $user['picture'] = $user['picture'] ? "/storage/" . $user['picture'] : "/assets/imgs/profile_picture.svg";
    }

    $listUsers = User::select('name', 'picture', 'bibliography')->where('id', '!=', $authUser->id)->paginate(50);
    $listUsers->getCollection()->transform(function ($user) {
      $user->picture = $user->picture ? "/storage/" . $user->picture : "/assets/imgs/profile_picture.svg";
      return $user;
    });

    return view('home', [
      'user' => $user,
      'listUsers' => $listUsers,
      'loginToSeeUsers' => false
    ]);
  }
}
