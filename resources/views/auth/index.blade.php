<x-layout :styles="['auth']">
  @section('title', 'Seu perfil')

  <x-auth-header back="/" back-label="Voltar para home" header="Seu perfil">
    <a href="/profile/edit" class="button center icons edit">Editar</a>
  </x-auth-header>

  <div class="auth_view_profile">
    <div>
      <h2 class="icons information">Informações gerais:</h2>
      <p><strong>Nome:</strong> {{ $name }}</p>
      <p><strong>Email:</strong> {{ $email }}</p>
      <p class="auth_view_profile_photo"><strong>Foto:</strong> <img src="{{ $picture }}" alt="Foto de perfil"></p>
      <p><strong>Data de nascimento:</strong> {{ $birth_date }}</p>
      <p><strong>Bibliografia:</strong>
        <pre>{{ $bibliography }}</pre>
      </p>
    </div>

    <div>
      <h2 class="icons place">Endereço:</h2>
      <p>
        <strong>CEP:</strong> {{ $cep->value }}<br>
        <strong>Rua:</strong> {{ $cep->street }}<br>
        <strong>Bairro:</strong> {{ $cep->nighborhood }}<br>
        <strong>Cidade:</strong> {{ $cep->city ?? 'Não informado' }}<br>
        <strong>Estado:</strong> {{ $cep->state ?? 'Não informado' }}<br>
        <strong>Complemento:</strong> {{ $address_complement ?? 'Não informado' }}<br>
        <strong>Número:</strong> {{ $address_number ?? 'Não informado' }}
      </p>
    </div>
  </div>
</x-layout>
