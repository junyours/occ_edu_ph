@props([
    'label' => '',
    'name' => '',
    'required' => false
])

<div class="relative flex flex-col gap-1">
  @if($label)
    <label class="w-fit pl-0.5 text-sm text-neutral-600" for="{{ $name }}">
      {{ $label }}
    </label>
  @endif

  <input id="{{ $name }}" type="file" name="{{ $name }}"
  {{ $attributes->merge([
    'class' => 'w-full overflow-clip rounded-sm border border-neutral-300 bg-neutral-50/50 text-sm text-neutral-600 file:mr-4 file:border-none file:bg-neutral-50 file:px-4 file:py-2 file:font-medium file:text-neutral-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75'
  ]) }} @if ($required)
    required
  @endif />
  @error($name)
    <small class="pl-0.5 text-red-500">{{ $message }}</small>
  @enderror
</div>