<x-layout :styles="['auth']" data-body="divide_body">
  @section('title', 'Entrar com uma conta')

  <form action="/login" method="POST" enctype="multipart/form-data" class="form form_center">
    <h1>Entrar com uma conta</h1>

    @csrf
    <x-form-group name-input="Email" name="email" type="email" :value="old('email')" required />
    <x-form-group name-input="Senha" name="password" type="password" required />

    @error('wrong_credentials')
      <p class="form_error">{{ $message }}</p>
    @enderror

    <x-form-required-fields />

    <button>Entrar</button>
  </form>
</x-layout>
