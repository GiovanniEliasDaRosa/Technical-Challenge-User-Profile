@props(['name'])

<textarea id="{{ $name }}" name="{{ $name }}" {{ $attributes }} />{{ $slot }}</textarea>
