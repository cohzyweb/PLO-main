<x-admin-layout>
  <form
    class="p-4 mx-auto max-w-full md:p-6"
    method="post"
    action="{{ url('/admin/touchvip-cast/' . $cast->id) }}"
  >
    @method('PUT')
    @csrf

    <div x-data="{ pageName: `キャスト管理`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
      </div>
    </div>

    <!-- Name, ID, Shop, Status -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="px-6 py-5">
        <h3 class="text-lg font-bold">
          {{ $cast->name }}
        </h3>
      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6 flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
        <div>
          <h4 class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
            ID
          </h4>
          <p class="text-sm font-medium text-gray-800 dark:text-white/90">
            {{ $cast->id }}
          </p>
        </div>
        <div>
          <h4 class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
            店舗名
          </h4>
          <p class="text-sm font-medium text-gray-800 dark:text-white/90">
            {{ $cast->shop->name }}
          </p>
        </div>
        <div>
          <h4 class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
            公開状態
          </h4>
          <p class="text-sm font-medium text-gray-800 dark:text-white/90">
            {{ $cast->is_public ? '公開' : '非公開' }}
          </p>
        </div>
      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
          プロフィールURL <span class="text-error-500">*</span>
        </label>
        <div class="relative">
          <span
            id="cast_profile_url_origin"
            class="absolute top-1/2 left-0 inline-flex h-11 -translate-y-1/2 items-center justify-center border-r border-gray-200 py-3 pr-3 pl-3.5 text-gray-500 dark:border-gray-800 dark:text-gray-400"
          >
            {{ $cast->shop->url }}
          </span>
          <input
            id="cast_profile_url_path"
            name="profile_url"
            type="text"
            placeholder="/cast/0000"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            value="{{ $cast->profile_url }}"
          >
        </div>
        @if ($errors->has('profile_url'))
          <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('profile_url') }}</p>
        @endif
      </div>
    </div>

    <!-- Diary -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="px-6 py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
          写メ日記
        </h3>
      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <div class="mb-6 max-w-[380px]">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            キャストのメールアドレス
          </label>
          <div class="relative">
            <span class="absolute top-1/2 left-0 -translate-y-1/2 border-r border-gray-200 px-3.5 py-3 text-gray-500 dark:border-gray-800 dark:text-gray-400">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04175 7.06206V14.375C3.04175 14.6511 3.26561 14.875 3.54175 14.875H16.4584C16.7346 14.875 16.9584 14.6511 16.9584 14.375V7.06245L11.1443 11.1168C10.457 11.5961 9.54373 11.5961 8.85638 11.1168L3.04175 7.06206ZM16.9584 5.19262C16.9584 5.19341 16.9584 5.1942 16.9584 5.19498V5.20026C16.9572 5.22216 16.946 5.24239 16.9279 5.25501L10.2864 9.88638C10.1145 10.0062 9.8862 10.0062 9.71437 9.88638L3.07255 5.25485C3.05342 5.24151 3.04202 5.21967 3.04202 5.19636C3.042 5.15695 3.07394 5.125 3.11335 5.125H16.8871C16.9253 5.125 16.9564 5.15494 16.9584 5.19262ZM18.4584 5.21428V14.375C18.4584 15.4796 17.563 16.375 16.4584 16.375H3.54175C2.43718 16.375 1.54175 15.4796 1.54175 14.375V5.19498C1.54175 5.1852 1.54194 5.17546 1.54231 5.16577C1.55858 4.31209 2.25571 3.625 3.11335 3.625H16.8871C17.7549 3.625 18.4584 4.32843 18.4585 5.19622C18.4585 5.20225 18.4585 5.20826 18.4584 5.21428Z" fill="#667085"></path>
              </svg>
            </span>
            <input
              name="diary_email_from"
              type="text"
              placeholder="info@gmail.com"
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pl-[62px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
              value="{{ $cast->diary_email_from }}"
            >
          </div>
        </div>
        <div class="max-w-[380px]">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            投稿先メールアドレス <span class="text-error-500">*</span>
          </label>
          <div class="relative">
            <span class="absolute top-1/2 left-0 -translate-y-1/2 border-r border-gray-200 px-3.5 py-3 text-gray-500 dark:border-gray-800 dark:text-gray-400">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04175 7.06206V14.375C3.04175 14.6511 3.26561 14.875 3.54175 14.875H16.4584C16.7346 14.875 16.9584 14.6511 16.9584 14.375V7.06245L11.1443 11.1168C10.457 11.5961 9.54373 11.5961 8.85638 11.1168L3.04175 7.06206ZM16.9584 5.19262C16.9584 5.19341 16.9584 5.1942 16.9584 5.19498V5.20026C16.9572 5.22216 16.946 5.24239 16.9279 5.25501L10.2864 9.88638C10.1145 10.0062 9.8862 10.0062 9.71437 9.88638L3.07255 5.25485C3.05342 5.24151 3.04202 5.21967 3.04202 5.19636C3.042 5.15695 3.07394 5.125 3.11335 5.125H16.8871C16.9253 5.125 16.9564 5.15494 16.9584 5.19262ZM18.4584 5.21428V14.375C18.4584 15.4796 17.563 16.375 16.4584 16.375H3.54175C2.43718 16.375 1.54175 15.4796 1.54175 14.375V5.19498C1.54175 5.1852 1.54194 5.17546 1.54231 5.16577C1.55858 4.31209 2.25571 3.625 3.11335 3.625H16.8871C17.7549 3.625 18.4584 4.32843 18.4585 5.19622C18.4585 5.20225 18.4585 5.20826 18.4584 5.21428Z" fill="#667085"></path>
              </svg>
            </span>
            <input
              name="diary_email_to"
              type="text"
              placeholder="info@gmail.com"
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pl-[62px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
              value="{{ $cast->diary_email_to }}"
            >
          </div>
          @if ($errors->has('diary_email_to'))
            <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('diary_email_to') }}</p>
          @endif
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
            キャストを削除
          </h5>
          <p class="text-sm text-gray-500 dark:text-gray-400">
            本当に削除してよろしいでしょうか？
          </p>
        </div>
        <div class="flex items-center gap-3 mt-6 modal-footer sm:justify-end">
          <button type="button" class="btn modal-close-btn bg-danger-subtle text-danger flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto" data-bs-dismiss="modal">
            いいえ
          </button>
          <form action="{{ url('/admin/touchvip-cast/' . $cast->id) }}" method="post">
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
