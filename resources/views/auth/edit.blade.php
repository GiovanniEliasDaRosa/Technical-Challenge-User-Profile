<x-layout>
  @session('status')
    <p>{{ session('status') }}</p>
  @endsession

  <a href="/profile">Voltar para seu perfil</a>
  <h1>Atualizar perfil</h1>

  <form action="/profile/edit" method="POST" enctype="multipart/form-data" class="register_form">
    @csrf
    @method('PATCH')

    <x-form-group name-input="Nome" name="name" :value="old('name') ?? $name" required />
    <x-form-group name-input="Email" name="email" type="email" :value="$email" readonly='true' disabled />
    <x-form-group name-input="Nova senha" name="password" type="password" required />
    <x-form-group name-input="Confirmar nova senha" name="password_confirmation" type="password" required />
    <x-form-group name-input="Foto" name="picture" type="file" :value="old('picture') ?? $picture" />
    <x-form-group name-input="Deletar foto" name="delete_picture" type="checkbox" :value="old('delete_picture') ? 'true' : ''" />

    <x-form-group name-input="Data de nascimento" name="birth_date" type="date" :value="old('birth_date') ?? $birth_date" required />
    <x-form-group name-input="Bibliografia" name="bibliography" type="textarea" :value="old('bibliography') ?? $bibliography" required />

    <h2>Endereço</h2>
    <x-form-group name-input="CEP (somente números)" name="cep" :value="old('cep') ?? $cep" maxlength="8" pattern="\d{8}"
      required />

    <x-form-group name-input="Complemento" name="address_complement" :value="old('address_complement') ?? $address_complement" />
    <x-form-group name-input="Número" name="address_number" type="number" :value="old('address_number') ?? $address_number" />

    <span class='form_group_requiredfield'>*Campos necessário o preenchimento</span>

    <button>Atualizar</button>
  </form>
</x-layout>
