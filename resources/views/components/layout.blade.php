@props(['styles' => [], 'js' => [], 'data-body' => '', 'data-main' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'Default Title')</title>

  <link rel="stylesheet" href="{{ mix('resources/css/global.css') }}">
  @foreach ($styles as $style)
    <link rel="stylesheet" href="{{ mix('resources/css/' . $style . '.css') }}">
  @endforeach

  <script src="{{ mix('resources/js/main.js') }}" defer="true"></script>
  @foreach ($js as $jsCurrent)
    <script src="{{ mix('resources/js/' . $jsCurrent . '.js') }}" defer="true"></script>
  @endforeach
</head>

<body class="{{ $dataBody ?? '' }}">
  @session('notification')
    <div class="popup">
      <p class="popup_text">
        {{ session('notification') }}
      </p>
      <button class="popup_button square icons nomargin xmark" aria-label="Fechar" title="Fechar"></button>
    </div>
  @endsession

  <header>
    <nav>
      @guest
        <a href="/register" class="button nav_space_left icons ">Registrar</a>
        <a href="/login" class="button icons ">Entrar</a>
      @endguest

      @auth
        <a href="/profile" title="Seu perfil {{ $user['name'] }}" class="nav_space_left nav_profile">
          <img src="{{ $user['picture'] }}" class="nav_profile_photo" alt="">
        </a>

        <button form="logout_form" class="button square icons nomargin exit" aria-label="Sair" title="Sair"></button>

        <form action="/logout" method="POST" hidden aria-disabled="true" disabled id="logout_form">
          @csrf
          @method('DELETE')
        </form>
      @endauth
    </nav>
  </header>
  <main class="{{ $dataMain ?? '' }}">
    {{ $slot }}
  </main>
</body>

</html>
