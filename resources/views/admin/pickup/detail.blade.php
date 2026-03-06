<x-admin-layout>
  {{-- <form
    class="p-4 mx-auto max-w-full md:p-6"
    method="post"
    action="{{ url('/admin/pickup/' . $shop->id) }}"
  >
    @method('PUT')
    @csrf --}}
  <div class="p-4 mx-auto max-w-full md:p-6">
    <div x-data="{ pageName: `ピックアップを編集`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
      </div>
    </div>
    @if($errors->has('error'))
    <div class="alert alert-danger" style="position: relative; padding: 1rem; margin-bottom: 1rem; border: 1px solid #f5c2c7; border-radius: 0.375rem; color: #842029; background-color: #f8d7da;">
      {{ $errors->first('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success" style="position: relative; padding: 1rem; margin-bottom: 1rem; border: 1px solid #badbcc; border-radius: 0.375rem; color: #0f5132; background-color: #d1e7dd;">
      {{ session('success') }}
    </div>
      {{-- <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="p-4 sm:p-6">
          <div class="text-sm text-green-600 dark:text-green-400" style="color:#3B82F6;">
            {{ session('success') }}
          </div>
        </div>
      </div> --}}
    @endif
    @role('admin')
    <form
      action="{{ url('/admin/pickup') }}"
      method="GET"
      id="search_form"
      class="flex align-center justify-between mb-2 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
    >
      <div
        class="flex p-5 sm:p-6 dark:border-gray-800"
      >

        <div class="mr-2">
          <div class="flex items-center gap-4 ">
            <label for="search_form_shop" class="text-sm font-medium text-gray-700 dark:text-gray-400">
              店舗
            </label>
            <div class="relative z-20 bg-transparent">
              <select
                name="shop"
                id="search_form_shop"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
              >
                {{-- <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                  全ての店舗
                </option> --}}
                @foreach ($shops as $shop_tmp)
                  <option
                    value="{{ $shop_tmp->slug }}"
                    class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                    @selected(request()->shop ? $shop_tmp->slug === request()->shop : $shop->slug === $shop_tmp->slug  )
                  >
                    {{ $shop_tmp->name }}
                  </option>
                @endforeach
              </select>
              <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
            </div>
          </div>
        </div>

      </div>
    </form>
    @endrole
    <form
    {{-- class="p-4 mx-auto max-w-full md:p-6" --}}
    method="post"
    action="{{ url('/admin/pickup/' . $shop->id) }}"
    >
      @method('PUT')
      @csrf

      <!-- Name, Shop, Profile -->
      <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="p-4 sm:p-6">
          @foreach (['①','②','③','④'] as $index => $label)
            <div class="flex items-center gap-4 mb-6">
              <label class="text-sm font-medium text-gray-700 dark:text-gray-400">
                {{ $label }}
              </label>
              <div class="relative z-20 w-full max-w-[380px] bg-transparent">
                <select
                  name="pickup[]"
                  class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                >
                  <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                  </option>
                  @foreach ($casts as $cast)
                    <option
                      value="{{ $cast->id }}"
                      class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                      @if (
                          array_key_exists($index, $pickups->pluck('id')->toArray())
                        && $pickups[$index]->cast->id === $cast->id
                      )
                        selected
                      @endif
                    >
                      {{ $cast->name }}
                    </option>
                  @endforeach
                </select>
                <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                  <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- Buttons -->
      <div class="px-5 flex items-center justify-between">
        <button
          type="submit"
          class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600"
        >
          保存する
        </button>
      </div>
    </form>
  </div>
</x-admin-layout>
