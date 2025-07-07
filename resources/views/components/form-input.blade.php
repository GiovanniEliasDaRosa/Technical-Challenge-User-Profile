@props(['name', 'type' => 'text'])

<input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" {{ $attributes }} />
