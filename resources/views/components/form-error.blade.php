@props(['name', 'name-input'])

@error($name)
  <p class="form_error">{{ $message }}</p>
@enderror
