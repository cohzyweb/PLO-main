<x-admin-layout>
  <form
    class="p-4 mx-auto max-w-full md:p-6"
    method="post"
    action="{{ url('/admin/course/add') }}"
  >
    @method('POST')
    @csrf

    <div x-data="{ pageName: `コース追加`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800"
          x-text="pageName"
        ></h2>
      </div>
    </div>

    <!-- Name, Price, Description -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white">
      <div class="p-4 sm:p-6">

        <!-- Name -->
        <div class="mb-6">
          <label class="mb-1.5 block text-sm font-medium text-gray-700">
            コース <span class="text-error-500">*</span>
          </label>
          <input
            name="course_name"
            type="text"
            value="{{ old('course_name') }}"
            class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
          >
          @if ($errors->has('course_name'))
            <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('course_name') }}</p>
          @endif
        </div>

        <!-- Price & Shop -->
         <div class="flex mb-6">
           <div style="margin-right: 24px;">
             <label class="mb-1.5 block text-sm font-medium text-gray-700">
               値段 <span class="text-error-500">*</span>
             </label>
             <div class="flex items-center">
               <input
                 name="price"
                 type="number"
                 value="{{ old('price') }}"
                 class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full max-w-[250px] rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden text-right"
               >
               <span class="inline-flex mx-2 text-sm font-medium text-gray-700">円</span>
             </div>
             @if ($errors->has('price'))
               <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('price') }}</p>
             @endif
           </div>
           <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700">
               店舗<span class="text-error-500">*</span>
             </label>
            <div x-data="{ isOptionSelected: false }" class="relative z-20 w-full max-w-[380px] bg-transparent">
              <select
                name="shop_id"
                class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
                :class="isOptionSelected &amp;&amp; 'text-gray-800'"
                @change="isOptionSelected = true"
              >
                @role('admin')
                  <option value="" class="text-gray-700">
                    店舗を選択してください
                  </option>
                  @foreach ($shops as $shop)
                    <option
                      value="{{ $shop->id }}"
                      class="text-gray-700"
                      @if ($shop->id == old('shop_id')) selected @endif
                    >
                      {{ $shop->name }}
                    </option>
                  @endforeach
                @endrole
                @role('shop')
                  <option
                    value="{{ $shop->id }}"
                    class="text-gray-700"
                    selected
                  >
                    {{ $shop->name }}
                  </option>
                @endrole
              </select>
              <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
            </div>
            @if ($errors->has('shop_id'))
              <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('shop_id') }}</p>
            @endif
           </div>
         </div>

        <!-- Description -->
        <div>
          <label class="mb-1.5 block text-sm font-medium text-gray-700">
            説明
          </label>
          <textarea
            name="description"
            class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
          >{{ old('description') }}</textarea>
        </div>
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
