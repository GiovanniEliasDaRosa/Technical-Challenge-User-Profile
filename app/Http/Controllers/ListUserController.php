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

    // Not logged in
    if (!$authUser) {
      return view('home', [
        'loginToSeeUsers' => true
      ]);
    }

    $listUsers = User::select('name', 'picture', 'biography')->where('id', '!=', $authUser->id)->paginate(50);
    $listUsers->getCollection()->transform(function ($user) {
      $user->picture = $user->picture ? "/storage/" . $user->picture : "/assets/imgs/profile_picture.svg";
      return $user;
    });

    return view('home', [
      'listUsers' => $listUsers,
      'loginToSeeUsers' => false
    ]);
  }
}
