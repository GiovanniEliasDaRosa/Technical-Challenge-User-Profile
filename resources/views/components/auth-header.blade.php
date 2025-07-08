@props(['back' => '/', ' back-label' => '', 'header' => ''])

<div class="auth_header">
  <a href="{{ $back }}" class="button square icons nomargin left" aria-label="{{ $backLabel }}"
    title="{{ $backLabel }}"></a>
  <h1>{{ $header }}</h1>
  {{ $slot }}
</div>
