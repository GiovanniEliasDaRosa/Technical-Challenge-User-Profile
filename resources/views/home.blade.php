<x-layout>
  @session('notification')
    <p>{{ session('notification') }}</p>
  @endsession

  @guest
    <div>
      <img src="{{ '/assets/imgs/profile_picture.svg' }}" alt="">
      <p>Guest</p>
    </div>

    <a href="/register">Registrar</a>
    <a href="/login">Entrar</a>
  @endguest

  @auth
    <a href="/profile" title="Meu perfil">
      <img src="{{ $user['picture'] }}" alt="">
      {{ $user['name'] }}
    </a>
    <button form="logout_form">Log out</button>

    <form action="/logout" method="POST" hidden aria-disabled="true" disabled id="logout_form">
      @csrf
      @method('DELETE')
    </form>
  @endauth

  <h1>Home</h1>

  @if ($loginToSeeUsers)
    <p>Entre com uma conta para ver outros usuários</p>
  @else
    @forelse ($listUsers as $list_user)
      <div>
        <img src="{{ $list_user->picture }}" alt="">
        <p>{{ $list_user->name }}</p>
        <p>{{ $list_user->bibliography }}</p>
      </div>
    @empty
      <p>Não há outros usuários cadastrados</p>
    @endforelse
  @endif

</x-layout>
