<x-admin-layout>
  <form
    class="p-4 mx-auto max-w-full md:p-6"
    method="post"
    action="{{ url('/admin/extend/' . $extend->id) }}"
  >
    @method('PUT')
    @csrf

    <div x-data="{ pageName: `延長編集`}">
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
            延長 <span class="text-error-500">*</span>
          </label>
          <input
            name="extend_name"
            type="text"
            value="{{ $extend->extend }}"
            class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
          >
          @if ($errors->has('extend_name'))
            <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('extend_name') }}</p>
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
                 value="{{ $extend->price }}"
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
              <option
              value="{{ $shop->id }}"
              class="text-gray-700"
              selected
            >
              {{ $shop->name }}
            </option>

              {{-- @role('admin')
                  @foreach ($shops as $shop)
                    <option
                      value="{{ $shop->id }}"
                      class="text-gray-700"
                      @if ($shop->id == $extend->shop_id) selected @endif
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
                @endrole --}}
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
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            説明
          </label>
          <textarea
            name="description"
            class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
          >{{ $extend->description }}</textarea>
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
       <button
        type="button"
        id="deleteModalOpener"
        class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-error-500 shadow-theme-xs"
      >
        削除する
      </button>
    </div>
  </form>

  <!-- Delete Modal -->
  <div class="fixed inset-0 items-center justify-center hidden p-5 overflow-y-auto modal z-99999" id="deleteModal">
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50"></div>
    <div class="modal-dialog modal-dialog-scrollable modal-lg no-scrollbar relative flex w-full max-w-[700px] flex-col overflow-y-auto rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-11">
      <button class="modal-close-btn transition-color absolute right-5 top-5 z-999 flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300 sm:h-11 sm:w-11">
        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z" fill=""></path>
        </svg>
      </button>
      <div class="flex flex-col px-2 overflow-y-auto modal-content custom-scrollbar">
        <div class="modal-header">
          <h5 class="mb-2 font-semibold text-gray-800 modal-title text-theme-xl dark:text-white/90 lg:text-2xl" id="eventModalLabel">
            延長を削除
          </h5>
          <p class="text-sm text-gray-500 dark:text-gray-400">
            本当に削除してよろしいでしょうか？
          </p>
        </div>
        <div class="flex items-center gap-3 mt-6 modal-footer sm:justify-end">
          <button type="button" class="btn modal-close-btn bg-danger-subtle text-danger flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto" data-bs-dismiss="modal">
            いいえ
          </button>
          <form action="{{ url('/admin/extend/' . $extend->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary flex w-full justify-center rounded-lg bg-error-500 px-4 py-2.5 text-sm font-medium text-white sm:w-auto">
              はい
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>
