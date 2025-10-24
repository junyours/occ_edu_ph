@props([
  'label' => '',
  'name' => '',
])

<div class="flex flex-col gap-1 text-neutral-600">
  @if ($label)
    <label for="{{ $name }}" class="w-fit pl-0.5 text-sm">{{ $label }}</label>
   @endif
   
  <div x-data="{ showPassword: false }" class="relative">
    <input id="{{ $name }}" x-bind:type="showPassword ? 'text' : 'password'" name="{{ $name }}" value="{{ old($name) }}" {{ $attributes->merge([
      'class' => 'w-full rounded-sm border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75'
    ]) }} required />
    <button type="button" x-on:click="showPassword = !showPassword"
      class="absolute right-2.5 top-1/2 -translate-y-1/2 text-neutral-600" aria-label="Show password">
      <i data-lucide="eye-off" x-show="!showPassword" class="size-5" stroke-width="1.5"></i>
      <i data-lucide="eye" x-show="showPassword" class="size-5" stroke-width="1.5"></i>
    </button>
  </div>
  @error($name)
    <small class="pl-0.5 text-red-500">{{ $message }}</small>
  @enderror
</div>