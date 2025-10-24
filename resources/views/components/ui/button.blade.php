@props([
  'label' => '',
  'type' => 'submit',
])

  <button type="{{ $type }}"
{{ $attributes->merge([
  'class' => 'w-full whitespace-nowrap rounded-sm bg-black border border-black px-4 py-2 text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed'
]) }} x-bind:disabled="processing">
  {{ $label }}
</button>