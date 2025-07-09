<x-layout :styles="['auth']" :js="['auth']">
  @section('title', 'Registrar nova conta')

  <form action="/register" method="POST" enctype="multipart/form-data" class="form form_center_large">
    <h1>Registrar nova conta</h1>

    <h2>Informações gerais</h2>
    @csrf
    <x-form-group name-input="Nome" name="name" :value="old('name')" required />
    <x-form-group name-input="Email" name="email" type="email" :value="old('email')" required />
    <x-form-group-divide>
      <x-form-group name-input="Senha" name="password" type="password" required />
      <x-form-group name-input="Confirmar senha" name="password_confirmation" type="password" required />
    </x-form-group-divide>
    <x-form-group name-input="Foto" name="picture" type="file" :change-photo="false" />
    <x-form-group name-input="Deletar foto?" name="delete_picture" type="checkbox"
      data-group="form_group_delete_file" />

    <x-form-group name-input="Data de nascimento" name="birth_date" type="date" :value="old('birth_date')" required />
    <x-form-group name-input="Bibliografia" name="biography" type="textarea" :value="old('biography')" required />

    <h2>Endereço</h2>
    <x-form-group-divide>
      <x-form-group name-input="CEP (somente números)" name="cep" :value="old('cep')" maxlength="8" pattern="\d{8}"
        required />
      <x-form-group name-input="Número" name="address_number" type="number" :value="old('address_number')" />
    </x-form-group-divide>

    <x-form-group name-input="Complemento" name="address_complement" :value="old('address_complement')" />

    <x-form-required-fields />

    <button>Criar conta</button>
  </form>
</x-layout>
