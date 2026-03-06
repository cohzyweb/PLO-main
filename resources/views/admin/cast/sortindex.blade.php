<x-admin-layout>
  <div class="p-4 mx-auto max-w-full md:p-6">

    <div x-data="{ pageName: `並び替え`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
        {{-- <a
          href="{{ url('/admin/cast/add?redirect=/admin/cast/sort') }}"
          class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition ring-1 ring-inset ring-gray-300 rounded-lg bg-white shadow-theme-xs hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]"
        >
          キャストを追加
        </a> --}}
      </div>
    </div>

    @role('admin')
    <div
      class="flex align-center justify-between mb-2 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
    >
      <div
        class="flex p-5 sm:p-6 dark:border-gray-800"
      >
        <!-- Shop filter -->
        <div class="mr-2">
          <div class="relative z-20 bg-transparent">
            <select
              name="shop"
              id="search_form_shop"
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >
              @foreach ($shops as $shop)
                <option
                  value="{{ $shop->id }}"
                  class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                >
                  {{ $shop->name }}
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
    @endrole

    <div class="sort-cast-container">
    </div>
  </div>
</x-admin-layout>
<script>
    window.apiToken = "{{ $token }}"
</script>
@once
    @vite(['resources/js/admin/sortcast.js','resources/scss/admin/sortcast.scss'])
@endonce
