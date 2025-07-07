<?php

namespace App\Http\Controllers;

use App\Models\Cep;
use App\Models\City;
use App\Models\Neighborhood;
use App\Models\State;
use App\Models\Street;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
  public function create()
  {
    return view('auth.register');
  }

  public function store(Request $request)
  {
    // TODO: Allow user to set his age be visible by others
    $attributes = $request->validate([
      "name" => ['required', 'min:3'],
      "email" => ['required', 'email', 'unique:users,email'],
      "password" => ['required', 'confirmed', Password::min(3)],
      "picture" => ['file', File::types(['png', 'jpeg', 'jpg', 'webp'], 'max:2048')],
      "birth_date" => ['required', Rule::date()->beforeOrEqual(today()->subYear())],
      "bibliography" => ['required'],
      'cep' => ['required', 'size:8']
    ]);
    $cep = $request->cep;

    $response = Http::withOptions(['timeout' => 10])->get("https://viacep.com.br/ws/$cep/json/");
    $cepResult = $response->json();
    if ($cepResult == null || isset($cepResult["erro"])) {
      return back()->withErrors(['cep' => 'CEP não encontrado'])->withInput();
    }

    if ($request->hasFile('picture')) {
      $file = $request->file('picture');
      $hashedName = $file->hashName();
      $attributes['picture'] = $file->storeAs('profile', $hashedName);
    }

    $state = State::where('name', $cepResult['estado'])->first();

    $city = City::where('name', $cepResult['localidade'])->first();
    if ($city == null) {
      $city = City::create([
        'name' => $cepResult['localidade']
      ]);
    }

    $neighborhood = Neighborhood::where('name', $cepResult['bairro'])->first();
    if ($neighborhood == null) {
      $neighborhood = Neighborhood::create([
        'name' => $cepResult['bairro']
      ]);
    }

    $street = Street::where('name', $cepResult['logradouro'])->first();
    if ($street == null) {
      $street = Street::create([
        'name' => $cepResult['logradouro']
      ]);
    }

    $cepDatabase = Cep::where(
      [
        ['value', $cep],
        ['street_id', $state->id],
        ['neighborhood_id', $city->id],
        ['city_id', $neighborhood->id],
        ['state_id', $street->id],
      ]
    )->first();

    if ($cepDatabase == null) {
      $cepDatabase = Cep::create([
        'value' => $cep,
        "street_id" => $street->id,
        "neighborhood_id" => $neighborhood->id,
        "city_id" => $city->id,
        "state_id" => $state->id
      ]);
    }

    $attributes['address_complement'] = $request->address_complement ?? null;
    $attributes['address_number'] = $request->address_number ?? null;
    $attributes['cep_id'] = $cepDatabase->id;

    $user = User::create($attributes);
    Auth::login($user);

    return redirect('/')->with('notification', 'Bem vindo!');
  }

  public function index()
  {
    $authUser = Auth::user();
    $user = $authUser->only(["name", "email", "picture", "birth_date", "bibliography", "cep_id", "address_complement", "address_number"]);
    $databaseCep = Cep::with(['street:id,name', 'neighborhood:id,name', 'city:id,name', 'state:id,name'])
      ->where('id', $user['cep_id'])
      ->first();

    if ($user['picture'] == null) {
      $user['picture'] = "/assets/imgs/profile_picture.svg";
    } else {
      $user['picture'] = "/storage/" . $user['picture'];
    }

    $cep = new \stdClass();
    $cep->value = substr_replace($databaseCep->value, '-', 5, 0);
    $cep->street = $databaseCep->street->name;
    $cep->nighborhood = $databaseCep->neighborhood->name;
    $cep->city = $databaseCep->city->name;
    $cep->state = $databaseCep->state->name;

    $user["cep"] = $cep;

    return view('auth.index', $user);
  }

  public function edit()
  {
    $user = Auth::user();

    $user['cep'] = $user->cep->value;

    return view('auth.edit', [
      "name" => $user->name,
      "email" => $user->email,
      "password" => $user->password,
      "picture" => $user->picture ?? '',
      "birth_date" => $user->birth_date,
      "bibliography" => $user->bibliography,
      "cep" => $user->cep ?? '',
      "address_complement" => $user->address_complement ?? '',
      "address_number" => $user->address_number ?? ''
    ]);
  }

  public function update(Request $request)
  {
    $updatePassword = false;
    // TODO: Allow user to set his age be visible by others
    $attributes = $request->validate([
      "name" => ['required', 'min:3'],
      "picture" => ['file', File::types(['png', 'jpeg', 'jpg', 'webp'], 'max:2048')],
      "birth_date" => ['required', Rule::date()->beforeOrEqual(today()->subYear())],
      "bibliography" => ['required'],
      'cep' => ['required', 'size:8']
    ]);

    if ($request->password != null && $request->password_confirmation != null) {
      $newPassword = $request->validate([
        "password" => ['confirmed', Password::min(3)],
      ]);
      $newPassword = $newPassword['password'];
      $updatePassword = true;
    }

    $cep = $request->cep;

    $response = Http::get("https://viacep.com.br/ws/$cep/json/");
    $cepResult = $response->json();
    if ($cepResult == null) {
      return back()->withErrors(['cep' => 'CEP não encontrado'])->withInput();
    }

    $user = Auth::user();
    if ($request->hasFile('picture')) {
      if ($user->picture != null) {
        Storage::delete($user->picture);
      }

      $file = $request->file('picture');
      $hashedName = $file->hashName();
      $attributes['picture'] = $file->storeAs('profile', $hashedName);
    }

    if ($request->has('delete_picture')) {
      if ($user->picture != null) {
        Storage::delete($user->picture);
      }
      $attributes['picture'] = null;
    }

    $state = State::where('name', $cepResult['estado'])->first();

    $city = City::where('name', $cepResult['localidade'])->first();
    if ($city == null) {
      echo "CREATED city";
      $city = City::create([
        'name' => $cepResult['localidade']
      ]);
    }

    $neighborhood = Neighborhood::where('name', $cepResult['bairro'])->first();
    if ($neighborhood == null) {
      echo "CREATED neighborhood";
      $neighborhood = Neighborhood::create([
        'name' => $cepResult['bairro']
      ]);
    }

    $street = Street::where('name', $cepResult['logradouro'])->first();
    if ($street == null) {
      echo "CREATED street";
      $street = Street::create([
        'name' => $cepResult['logradouro']
      ]);
    }

    $cepDatabase = Cep::where(
      [
        'value' => $cep,
        "street_id" => $street->id,
        "neighborhood_id" => $neighborhood->id,
        "city_id" => $city->id,
        "state_id" => $state->id
      ]
    )->first();

    if ($cepDatabase == null) {
      echo "CREATED cepDatabase";
      $cepDatabase = Cep::create([
        'value' => $cep,
        "street_id" => $street->id,
        "neighborhood_id" => $neighborhood->id,
        "city_id" => $city->id,
        "state_id" => $state->id
      ]);
    }

    $user->fill($attributes);
    $user->address_complement =  $request->address_complement ?? null;
    $user->address_number =  $request->address_number ?? null;
    $user->cep_id =  $cepDatabase->id;
    if ($updatePassword) {
      $user->password = Hash::make($newPassword);
    }
    $user->save();

    return redirect('/profile')->with('status', 'Informações atualizadas');
  }
}
