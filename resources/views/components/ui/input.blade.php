@props([
    'label' => '',
    'name' => '',
    'value' => '',
    'type' => 'text',
])

<div class="flex flex-col gap-1 text-neutral-600">
  @if($label)
    <label for="{{ $name }}" class="w-fit pl-0.5 text-sm">
      {{ $label }}
    </label>
  @endif

  <input
    id="{{ $name }}"
    name="{{ $name }}"
    value="{{ old($name, $value) }}"
    {{ $attributes->merge([
      'class' => 'w-full rounded-sm border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75'
    ]) }}
    type="{{ $type }}"
    required
  />
  @error($name)
    <small class="pl-0.5 text-red-500">{{ $message }}</small>
  @enderror
</div>

