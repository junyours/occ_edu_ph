@extends('layouts.app')

@section('content')
  <div class="p-4 max-w-lg mx-auto space-y-4">
    <h1 class="font-semibold">Edit News</h1>
    <form method="POST" action="{{ route('admin.update.news', $news->id) }}" x-data="{ processing: false }"
      @submit="processing = true" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <div x-data="{
        options: {{ $options->toJson() }},
        selectedOptions: {{ $news->sdg->pluck('id')->toJson() }},
        selectedLabels: {{ $news->sdg->pluck('name')->toJson() }},
        isOpen: false,
        openedWithKeyboard: false,

        setLabelText() {
          const count = this.selectedLabels.length;
          if (count === 0) return 'Please Select';
          return this.selectedLabels.join(', ');
        },

        handleOptionToggle(option, item) {
          if (option.checked) {
            this.selectedOptions.push(item.id);
            this.selectedLabels.push(item.label);
          } else {
            this.selectedOptions = this.selectedOptions.filter(id => id !== item.id);
            this.selectedLabels = this.selectedLabels.filter(lbl => lbl !== item.label);
          }

          // update hidden inputs for form submission
          const form = this.$root.closest('form');
          form.querySelectorAll('input[name=\'sdg[]\']').forEach(el => el.remove());
          this.selectedOptions.forEach(id => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'sdg[]';
            input.value = id;
            form.appendChild(input);
          });
        },
      }" class="flex flex-col gap-1" x-on:keydown.esc.window="isOpen = false; openedWithKeyboard = false">
        <label for="sdg" class="w-fit pl-0.5 text-sm text-neutral-600">SDG</label>

        <div class="relative">
          <button type="button" role="combobox"
            class="inline-flex w-full items-center justify-between gap-2 whitespace-nowrap border-neutral-300 bg-neutral-50 px-4 py-2 text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black border rounded-sm"
            aria-haspopup="listbox" aria-controls="sdgList" x-on:click="isOpen = !isOpen"
            x-bind:aria-expanded="isOpen || openedWithKeyboard">
            <span class="text-sm w-full font-normal text-start overflow-hidden text-ellipsis whitespace-nowrap"
              x-text="setLabelText()"></span>
            <i data-lucide="chevron-down" class="size-5" stroke-width="1.5"></i>
          </button>
          <ul x-cloak x-show="isOpen || openedWithKeyboard" id="sdgList"
            class="absolute z-10 left-0 top-11 flex max-h-44 w-full flex-col overflow-y-auto border-neutral-300 bg-neutral-50 py-1.5 border rounded-sm"
            role="listbox" x-on:click.outside="isOpen = false; openedWithKeyboard = false" x-transition>
            <template x-for="(item, index) in options" :key="item.id">
              <li role="option">
                <label
                  class="flex items-center gap-2 px-4 py-3 text-sm font-medium text-neutral-600 hover:bg-neutral-950/5"
                  :for="'checkboxOption' + index">
                  <div class="relative flex items-center">
                    <input type="checkbox"
                      class="combobox-option peer relative size-4 appearance-none overflow-hidden border border-neutral-300 bg-neutral-50 checked:border-black checked:bg-black focus:outline-2 focus:outline-offset-2 focus:outline-neutral-800 checked:focus:outline-black active:outline-offset-0 disabled:cursor-not-allowed rounded-sm"
                      :checked="selectedOptions.includes(item.id)" @change="handleOptionToggle($el, item)"
                      :id="'checkboxOption' + index" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                      stroke-width="4"
                      class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-neutral-100 peer-checked:visible"
                      aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                  </div>
                  <span x-text="item.label"></span>
                </label>
              </li>
            </template>
          </ul>
        </div>
      </div>
      <x-ui.input-file label="Image" name="image" />
      <x-ui.input label="Title" name="title" value="{{ $news->title }}" />
      <x-ui.textarea label="Description" name="description" value="{{ $news->description }}" />
      <x-ui.input label="Date" name="date" type="date" value="{{ $news->date }}" />
      <div class="flex justify-end">
        <div class="w-fit">
          <x-ui.button label="Update" />
        </div>
      </div>
    </form>
  </div>
@endsection