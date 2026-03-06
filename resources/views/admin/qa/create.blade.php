<x-admin-layout>
  <form
    class="p-4 mx-auto max-w-full md:p-6"
    method="post"
    action="{{ url('/admin/qa/add') }}"
  >
    @method('POST')
    @csrf

    <div x-data="{ pageName: `質問追加`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
      </div>
    </div>
    <!-- Name, Price, Description -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4 sm:p-6">

        <!-- Name -->
        <div class="mb-6">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            説明 <span class="text-error-500">*</span>
          </label>
          <textarea
            name="question"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            rows="4"
          >{{ old('question') }}</textarea>
          @if ($errors->has('question'))
            <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('question') }}</p>
          @endif
        </div>
      {{-- </div>
      <div class="p-4 sm:p-6"> --}}
        <!-- Public -->
        <div x-data="{ publicToggle: true }" class="mt-8">
          <label for="is_public" class="flex mt-1 cursor-pointer items-center gap-3 text-sm font-medium text-gray-700 select-none dark:text-gray-400">
            <div class="relative">
              <input
                name="is_public"
                value="1"
                type="checkbox"
                id="is_public"
                class="sr-only"
                @change="publicToggle = !publicToggle"
                @checked(true)
              />
              <div class="block h-6 w-11 rounded-full" :class="publicToggle ? 'bg-brand-500 dark:bg-brand-500' : 'bg-gray-200 dark:bg-white/10'"></div>
              <div class="shadow-theme-sm absolute top-0.5 left-0.5 h-5 w-5 rounded-full bg-white duration-300 ease-linear" :class="publicToggle ? 'translate-x-full': 'translate-x-0'"></div>
            </div>
            公開
          </label>
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
</x-admin-layout>
