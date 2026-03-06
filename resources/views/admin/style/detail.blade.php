<x-admin-layout>
  <form
    class="p-4 mx-auto max-w-full md:p-6"
    method="post"
    action="{{ url('/admin/style/' . $style->id) }}"
  >
    @method('PUT')
    @csrf

    <div x-data="{ pageName: `体型編集`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
      </div>
    </div>

    <!-- Name, Description -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4 sm:p-6">

        <!-- Name -->
        <div class="mb-6">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            体型名 <span class="text-error-500">*</span>
          </label>
          <input
            name="style_name"
            type="text"
            value="{{ $style->name }}"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full max-w-[380px] rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
          >
          @if ($errors->has('style_name'))
            <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('style_name') }}</p>
          @endif
        </div>

        <!-- Description -->
        <div>
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            説明
          </label>
          <textarea
            name="description"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
          >{{ $style->description }}</textarea>
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
            体型を削除
          </h5>
          <p class="text-sm text-gray-500 dark:text-gray-400">
            本当に削除してよろしいでしょうか？
          </p>
        </div>
        <div class="flex items-center gap-3 mt-6 modal-footer sm:justify-end">
          <button type="button" class="btn modal-close-btn bg-danger-subtle text-danger flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto" data-bs-dismiss="modal">
            いいえ
          </button>
          <form action="{{ url('/admin/style/' . $style->id) }}" method="post">
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
