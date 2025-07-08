<x-layout :styles="['home']">
  @section('title', 'Home')
  <h1>Home</h1>

  @if ($loginToSeeUsers)
    <p class="home_login_to_see">Entre com uma conta para ver outros usuários</p>
  @else
    <div class="home_users">
      @forelse ($listUsers as $list_user)
        <div class="home_user">
          <img class="home_user_photo" src="{{ $list_user->picture }}" alt="">
          <p class="home_user_name">{{ $list_user->name }}</p>
          <p class="home_user_bio">{{ $list_user->bibliography }}</p>
        </div>
      @empty
        <p class="home_no_users">Não há outros usuários cadastrados</p>
      @endforelse
    </div>
  @endif
</x-layout>
