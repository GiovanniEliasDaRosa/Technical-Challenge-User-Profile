<x-layout :styles="['auth']" :js="['auth']">
  @section('title', 'Editar informações de usuário')

  <form action="/profile/edit" method="POST" enctype="multipart/form-data" class="form form_center_large">
    <x-auth-header back="/" back-label="Voltar para seu perfil" header="Atualizar perfil"></x-auth-header>
    @csrf
    @method('PATCH')

    <h2>Informações gerais</h2>
    <x-form-group name-input="Nome" name="name" :value="old('name') ?? $name" required />
    <x-form-group name-input="Email" name="email" type="email" :value="$email" readonly='true' disabled />
    <x-form-group-divide>
      <x-form-group name-input="Nova senha" name="password" type="password" required />
      <x-form-group name-input="Confirmar nova senha" name="password_confirmation" type="password" required />
    </x-form-group-divide>

    <x-form-group name-input="Foto" name="picture" type="file" :value="$picture ?? ''" change-photo="true" />
    <x-form-group name-input="Deletar foto?" name="delete_picture" type="checkbox" :value="old('delete_picture') ? 'true' : ''"
      data-group="form_group_delete_file" />

    <x-form-group name-input="Data de nascimento" name="birth_date" type="date" :value="old('birth_date') ?? $birth_date" required />
    <x-form-group name-input="Bibliografia" name="biography" type="textarea" :value="old('biography') ?? $biography" required />

    <h2>Endereço</h2>
    <x-form-group-divide>
      <x-form-group name-input="CEP (somente números)" name="cep" :value="old('cep') ?? $cep" maxlength="8" pattern="\d{8}"
        required />
      <x-form-group name-input="Número" name="address_number" type="number" :value="old('address_number') ?? $address_number" />
    </x-form-group-divide>

    <x-form-group name-input="Complemento" name="address_complement" :value="old('address_complement') ?? $address_complement" />

    <x-form-required-fields />

    <button>Atualizar</button>
  </form>
</x-layout>
