<x-admin-layout>
  <div class="p-4 mx-auto max-w-full md:p-6">

    <!-- Page Name -->
    <div x-data="{ pageName: `写メ日記管理`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
      </div>
    </div>

    <!-- Subject, ID, Published, Author, Shop, Status -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="px-6 py-5">
        <h3 class="text-lg font-bold">
          <a href="{{ url($diary->cast->shop->slug . '/diary/' . $diary->slug) }}" target="_blank" class="text-brand-500 hover:text-brand-600">
            {{ $diary->subject }}
          </a>
        </h3>
      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6 flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
        <div>
          <h4 class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
            ID
          </h4>
          <p class="text-sm font-medium text-gray-800 dark:text-white/90">
            {{ $diary->id }}
          </p>
        </div>
        <div>
          <h4 class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
            投稿日時
          </h4>
          <div class="flex flex-col items-end">
            <p class="text-sm font-medium text-gray-800 dark:text-white/90">
              {{ $diary->created_at ? \Carbon\Carbon::createFromTimeString($diary->created_at)->format('Y/m/d') : '' }}
            </p>
            <p class="text-sm font-medium text-gray-500 dark:text-white/90">
              {{ $diary->created_at ? \Carbon\Carbon::createFromTimeString($diary->created_at)->format('H:i') : '' }}
            </p>
          </div>
        </div>
        <div>
          <h4 class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
            投稿者
          </h4>
          <p class="text-sm font-medium text-gray-800 dark:text-white/90">
            {{ $diary->cast->name }}
          </p>
        </div>
        <div>
          <h4 class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
            店舗名
          </h4>
          <p class="text-sm font-medium text-gray-800 dark:text-white/90">
            {{ $diary->cast->shop->name }}
          </p>
        </div>
        <div>
          <h4 class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
            公開状態
          </h4>
          <p class="text-sm font-medium text-gray-800 dark:text-white/90">
            {{ $diary->is_public ? '公開' : '非公開' }}
          </p>
        </div>
      </div>
    </div>

    <!-- Photo -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="px-6 py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
          写真
        </h3>
      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <div class="overflow-hidden w-[350px] max-w-full">
          @if ($diary->photo)
            <img src="{{ asset('storage/diary/' . $diary->photo) }}" alt="" class="w-full rounded-xl border border-gray-200 dark:border-gray-800">
          @else
            <div class="flex items-center justify-center w-full h-[212px] bg-gray-100">
              <p class="text-gray-500 dark:text-gray-400">
                画像がありません
              </p>
            </div>
          @endif
        </div>
      </div>
    </div>

    <!-- Body -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="px-6 py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
          本文
        </h3>
      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <p class="diary-body">
          <?= nl2br($diary->body) ?>
        </p>
      </div>
    </div>

    <!-- Buttons -->
    <div class="px-5 flex items-center justify-between">
      @if (!$diary->is_public)
        <button
          type="button"
          id="publishModalOpener"
          class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
          公開する
        </button>
      @else
        <button
          type="button"
          id="unpublishModalOpener"
          class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-gray-700 transition ring-1 ring-inset ring-gray-300 rounded-lg bg-white shadow-theme-xs hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]"
        >
          非公開にする
        </button>
      @endif
      <button
        type="button"
        id="deleteModalOpener"
        class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-error-500 shadow-theme-xs"
      >
        削除する
      </button>
    </div>
  </div>

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
            この写メ日記を削除
          </h5>
          <p class="text-sm text-gray-500 dark:text-gray-400">
            本当に削除してよろしいでしょうか？
          </p>
        </div>
        <div class="flex items-center gap-3 mt-6 modal-footer sm:justify-end">
          <button type="button" class="btn modal-close-btn bg-danger-subtle text-danger flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto" data-bs-dismiss="modal">
            いいえ
          </button>
          <form action="{{ url('/admin/diary/' . $diary->id) }}" method="post">
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

  <!-- Publish Modal -->
  <div class="fixed inset-0 items-center justify-center hidden p-5 overflow-y-auto modal z-99999" id="publishModal">
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
            この写メ日記を公開
          </h5>
          <p class="text-sm text-gray-500 dark:text-gray-400">
            本当に公開してよろしいでしょうか？
          </p>
        </div>
        <div class="flex items-center gap-3 mt-6 modal-footer sm:justify-end">
          <button type="button" class="btn modal-close-btn bg-danger-subtle text-danger flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto" data-bs-dismiss="modal">
            いいえ
          </button>
          <form action="{{ url('/admin/diary/' . $diary->id) . '/publish' }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
              はい
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Unpublish Modal -->
  <div class="fixed inset-0 items-center justify-center hidden p-5 overflow-y-auto modal z-99999" id="unpublishModal">
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
            この写メ日記を非公開
          </h5>
          <p class="text-sm text-gray-500 dark:text-gray-400">
            本当に非公開にしてよろしいでしょうか？
          </p>
        </div>
        <div class="flex items-center gap-3 mt-6 modal-footer sm:justify-end">
          <button type="button" class="btn modal-close-btn bg-danger-subtle text-danger flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto" data-bs-dismiss="modal">
            いいえ
          </button>
          <form action="{{ url('/admin/diary/' . $diary->id) . '/unpublish' }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto">
              はい
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>
