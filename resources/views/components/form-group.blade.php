@props(['name', 'name-input' => '', 'type' => 'text', 'value' => null, 'required' => null])

@php
  $nameInput = $nameInput ?? $name;
  $requiredField = $required == null ? '' : "<span class='form_group_requiredfield'>*</span>";
@endphp

<div class="form_group">
  <label for="{{ $name }}">{{ $nameInput }}{!! $requiredField !!}</label>

  @if ($type != 'textarea' && $type != 'select')
    <x-form-input type="{{ $type }}" name="{{ $name }}" value="{{ $value ?? '' }}" {{ $attributes }} />
  @else
    <x-form-textarea type="{{ $type }}" name="{{ $name }}"
      {{ $attributes }}>{{ $value ?? '' }}</x-form-textarea>
  @endif

  <x-form-error name="{{ $name }}" name-input="{{ $nameInput }}"></x-form-error>
</div>
