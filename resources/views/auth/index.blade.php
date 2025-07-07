<x-layout>
  @session('status')
    <p>{{ session('status') }}</p>
  @endsession
  <a href="/">Ir para home</a>
  <h1>Seu perfil</h1>
  <a href="/profile/edit">Editar</a>

  <h2>Endereço:</h2>
  <p><strong>Nome:</strong> {{ $name }}</p>
  <p><strong>Email:</strong> {{ $email }}</p>
  <p><strong>Foto:</strong> <img src="{{ $picture }}" alt=""></p>
  <p><strong>Data de nascimento:</strong> {{ $birth_date }}</p>
  <p><strong>Bibliografia:</strong>
    <pre>{{ $bibliography }}</pre>
  </p>

  <h2>Endereço:</h2>
  <div>
    <p><strong>CEP:</strong> {{ $cep->value }}</p>
    <p><strong>Rua:</strong> {{ $cep->street }}</p>
    <p><strong>Bairro:</strong> {{ $cep->nighborhood }}</p>
    <p><strong>Cidade:</strong> {{ $cep->city ?? 'Não informado' }}</p>
    <p><strong>Estado:</strong> {{ $cep->state ?? 'Não informado' }}</p>
  </div>
  <p><strong>Complemento:</strong> {{ $address_complement ?? 'Não informado' }}</p>
  <p><strong>Número:</strong> {{ $address_number ?? 'Não informado' }}</p>

</x-layout>
