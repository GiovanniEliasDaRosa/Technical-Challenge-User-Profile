<x-layout>
  @session('notification')
    <p>{{ session('notification') }}</p>
  @endsession

  <h2>Log in</h2>
  <form action="/login" method="POST" enctype="multipart/form-data" class="register_form">
    @csrf
    <x-form-group name-input="Email" name="email" type="email" :value="old('email')" required />
    <x-form-group name-input="Senha" name="password" type="password" required />

    @error('wrong_credentials')
      <p class="form_error">{{ $message }}</p>
    @enderror

    <span class='form_group_requiredfield'>*Campos necessário o preenchimento</span>

    <button>Entrar</button>
  </form>
</x-layout>
