<x-layout>
  <h2>Registrar</h2>
  <form action="/register" method="POST" enctype="multipart/form-data" class="register_form">
    @csrf
    <x-form-group name-input="Nome" name="name" :value="old('name')" required />
    <x-form-group name-input="Email" name="email" type="email" :value="old('email')" required />
    <x-form-group name-input="Senha" name="password" type="password" required />
    <x-form-group name-input="Confirmar senha" name="password_confirmation" type="password" required />
    <x-form-group name-input="Foto" name="picture" type="file" :value="old('picture')" />
    <x-form-group name-input="Data de nascimento" name="birth_date" type="date" :value="old('birth_date')" required />
    <x-form-group name-input="Bibliografia" name="bibliography" type="textarea" :value="old('bibliography')" required />

    <h2>Endereço</h2>
    <x-form-group name-input="CEP (somente números)" name="cep" :value="old('cep')" maxlength="8" pattern="\d{8}"
      required />

    <x-form-group name-input="Complemento" name="address_complement" :value="old('address_complement')" />
    <x-form-group name-input="Número" name="address_number" type="number" :value="old('address_number')" />

    <span class='form_group_requiredfield'>*Campos necessário o preenchimento</span>

    <button>Criar conta</button>
  </form>
</x-layout>
