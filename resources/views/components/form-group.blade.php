@props([
    'name',
    'name-input' => '',
    'type' => 'text',
    'value' => null,
    'required' => null,
    'change-photo' => false,
    'data-group' => null,
])

@php
  $nameInput = $nameInput ?? $name;
  $requiredField = $required == null ? '' : "<span class='form_group_requiredfield icons nomargin small star'></span>";
  $dataGroup = $dataGroup ?? '';
@endphp

<div class="form_group {{ $dataGroup }}">
  <label for="{{ $name }}">{{ $nameInput }}{!! $requiredField !!}</label>

  @if ($type == 'textarea')
    <x-form-textarea :type="$type" :name="$name" {{ $attributes }}>{{ $value ?? '' }}</x-form-textarea>
  @elseif ($type == 'file')
    <img src="{{ $value ? '/storage/' . $value : '' }}" alt="Foto de perfil" class="form_group_image_file" />
    <div class="form_group_file">
      <x-form-input :type="$type" :name="$name" value="{{ $value ?? '' }}" hidden {{ $attributes }}
        accept="image/png, image/jpg, image/jpeg, image/webp" />
      <label for="{{ $name }}" class="button form_file icons file_upload"
        tabindex="0">{{ $changePhoto ? 'Mudar foto' : 'Faça upload' }} </label>
      <p class="form_file">Nenhum arquivo selecionado</p>
    </div>
  @elseif ($type == 'checkbox')
    <x-form-input :type="$type" :name="$name" value="{{ $value ?? '' }}" class="icons nomargin check"
      {{ $attributes }} />
  @else
    <x-form-input :type="$type" :name="$name" value="{{ $value ?? '' }}" {{ $attributes }} />
  @endif

  <x-form-error :name="$name" :name-input="$nameInput"></x-form-error>
</div>
