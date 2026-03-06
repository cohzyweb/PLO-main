<x-admin-layout>
  <form
    class="p-4 mx-auto max-w-full md:p-6"
    method="post"
    action="{{ url('/admin/event/add') }}"
    enctype="multipart/form-data"
  >
    @method('POST')
    @csrf

    <div x-data="{ pageName: `イベントを追加`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
      </div>
    </div>

    <!-- Name, Shop, Profile -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4 sm:p-6">
        <!-- Shop, Joined -->
        <div class="flex gap-6 mb-6">

          <!-- Shop -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              店舗 <span class="text-error-500">*</span>
            </label>
            <div x-data="{ isOptionSelected: false }" class="relative z-20 w-full max-w-[380px] bg-transparent">
              <select
                name="shop_id"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                :class="isOptionSelected &amp;&amp; 'text-gray-800 dark:text-white/90'"
                @change="isOptionSelected = true"
              >
                @role('admin')
                  <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                    店舗を選択してください
                  </option>
                  @foreach ($shops as $shop)
                    <option
                      value="{{ $shop->id }}"
                      class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                      @if ($shop->id == old('shop_id')) selected @endif
                    >
                      {{ $shop->name }}
                    </option>
                  @endforeach
                @endrole
                @role('shop')
                  <option
                    value="{{ $shop->id }}"
                    class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
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

          {{-- <!-- Joined -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              配信日時
            </label>
            <div class="relative">
              <input
                name="published_at"
                type="text"
                class="flatpickr-input dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                value="{{ old('published_at') ?? date('Y-m-d H:i') }}"
              >
              <span class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z" fill=""></path>
                </svg>
              </span>
            </div>
          </div> --}}
        </div>

        <!-- Age, Height -->
        <div class="flex gap-6 mb-6">
          <div class="w-full">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              タイトル<span class="text-error-500">*</span>
            </label>
            <input
              name="title"
              type="text"
              value=""
              class="w-full dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11   rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >
            @if ($errors->has('title'))
              <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('title') }}</p>
            @endif
          </div>
          {{-- <!-- Public -->
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
          </div> --}}

        </div>
      <!-- 配信設定 -->
      <div class="mb-6">
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
          配信設定
        </label>
        <div class="flex items-center gap-8">
          <!-- 今すぐ配信 -->
          <div class="flex items-center">
            <input
              type="radio"
              name="publish_type"
              id="publish_now"
              value="1"
              class="h-4 w-4 border-gray-300 text-brand-500 focus:ring-brand-500"
              checked
            >
            <label for="publish_now" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
              今すぐ配信
            </label>
          </div>

          <!-- 予約配信 -->
          <div class="flex items-center">
            <input
              type="radio"
              name="publish_type"
              id="publish_schedule"
              value="2"
              class="h-4 w-4 border-gray-300 text-brand-500 focus:ring-brand-500"
            >
            <label for="publish_schedule" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
              予約配信
            </label>
          </div>
          <div id="schedule_datetime" class="relative" style="display: none;">
            <input
              name="published_at"
              type="text"
              class="flatpickr-input dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
              value="{{ old('published_at') ?? date('Y-m-d H:i') }}"
              placeholder="日時を選択"
            >
            <span class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
              <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z" fill=""></path>
              </svg>
            </span>
          </div>

          <!-- 下書き -->
          <div class="flex items-center">
            <input
              type="radio"
              name="publish_type"
              id="publish_draft"
              value="3"
              class="h-4 w-4 border-gray-300 text-brand-500 focus:ring-brand-500"
            >
            <label for="publish_draft" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-400">
              下書き
            </label>
          </div>
        </div>
      </div>
      </div>
    </div>

    <!-- サムネイル -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="px-6 py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
          サムネイル<span class="text-error-500">*</span>
        </h3>
        @if ($errors->has('file_1'))
          <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('file_1') }}</p>
        @endif

      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <div class="flex gap-6 flex-col items-center justify-center">
          <label
            class="event-gallery-item dropzone flex items-center justify-center hover:border-brand-500! dark:hover:border-brand-500! rounded-xl border border-dashed! border-gray-300! bg-gray-50 p-7 lg:p-10 dark:border-gray-700! dark:bg-gray-900 dz-clickable"
            for="{{ 'file_1' }}"
          >
            <div class="dz-message m-0! flex h-[68px] w-[68px] items-center justify-center rounded-full bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-gray-400">
              <svg class="fill-current" width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5019 3.91699C14.2852 3.91699 14.0899 4.00891 13.953 4.15589L8.57363 9.53186C8.28065 9.82466 8.2805 10.2995 8.5733 10.5925C8.8661 10.8855 9.34097 10.8857 9.63396 10.5929L13.7519 6.47752V18.667C13.7519 19.0812 14.0877 19.417 14.5019 19.417C14.9161 19.417 15.2519 19.0812 15.2519 18.667V6.48234L19.3653 10.5929C19.6583 10.8857 20.1332 10.8855 20.426 10.5925C20.7188 10.2995 20.7186 9.82463 20.4256 9.53184L15.0838 4.19378C14.9463 4.02488 14.7367 3.91699 14.5019 3.91699ZM5.91626 18.667C5.91626 18.2528 5.58047 17.917 5.16626 17.917C4.75205 17.917 4.41626 18.2528 4.41626 18.667V21.8337C4.41626 23.0763 5.42362 24.0837 6.66626 24.0837H22.3339C23.5766 24.0837 24.5839 23.0763 24.5839 21.8337V18.667C24.5839 18.2528 24.2482 17.917 23.8339 17.917C23.4197 17.917 23.0839 18.2528 23.0839 18.667V21.8337C23.0839 22.2479 22.7482 22.5837 22.3339 22.5837H6.66626C6.25205 22.5837 5.91626 22.2479 5.91626 21.8337V18.667Z" fill=""></path>
              </svg>
            </div>
            <input
              name="{{ 'file_1' }}"
              id="{{ 'file_1' }}"
              type="file"
              accept=".jpg, .jpeg, .png, .HEIC"
              class="event-gallery-input"
              hidden
            />
            <div class="event-gallery-img">
            </div>
            <button
              type="button"
              class="event-gallery-remove absolute z-999 flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300 sm:h-11 sm:w-11"
            >
              <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z" fill=""></path>
              </svg>
            </button>
          </label>
          <span class="text-sm font-medium text-gray-700 dark:text-gray-400 justify-center items-center" id="image-size"></span>
        </div>
      </div>
    </div>

    <!-- 本文 -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="px-6 py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
          本文
        </h3>
      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <textarea
          name="event_content"
          id="event_content"
          class="w-full"
          rows="10"
        >{{ old('event_content') }}</textarea>
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

<!-- FlatpickrのCSSを追加 -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> --}}

<script src="{{ asset('js/ckeditor.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/translations/ja.js"></script>

<script>
  window.apiToken = "{{ $token }}"
  ClassicEditor
  .create(document.querySelector('#event_content'), {
      language: 'ja',
      toolbar: [
        'heading','fontFamily','fontSize', 'fontColor', 'fontBackgroundColor', '|',
        'bold', 'italic', 'underline', 'strikethrough', '|', 'superscript', 'subscript', '|',
        'link', 'bulletedList', 'numberedList','blockQuote', '|',
        'insertTable', '|',
        'imageUpload', '|',
        'alignment', '|',
        'outdent', 'indent', '|',
        'horizontalLine', '|',
        'codeBlock', '|',
        'mediaEmbed', '|',
        'undo', 'redo'
      ],
      fontSize: {
        options: [9, 11, 13, 'default', 17, 19, 21]
      },
      simpleUpload: {
        uploadUrl: '/api/ckeditor/event_upload',
        withCredentials: false,
        headers: {
          // 'Content-Type': 'multipart/form-data',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          // 'Accept': 'application/json',
          // 'X-Requested-With': 'XMLHttpRequest',
          'Authorization': 'Bearer ' + window.apiToken
        },
      },
    })
    .catch(error => {
      console.error(error);
    });
</script>

@once
  @vite('resources/js/admin/event.js')
@endonce
<!-- 既存のスクリプトを削除 -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('input[type=file].event-gallery-input').forEach(input => {
    const item = input.parentElement
    const img = item.querySelector('.event-gallery-img')
    const path = item.querySelector('input[type=hidden]')
    const removeBtn = item.querySelector('.event-gallery-remove')

    input.addEventListener('change', (e) => {
      if (e.target.files.length === 0) return ''

      item.classList.add('has-img')

      const imgEl = document.createElement('img')
      const file = e.target.files[0]
      const src = URL.createObjectURL(file)
      imgEl.src = src
      imgEl.className = 'w-full h-full object-cover'
      img.appendChild(imgEl)

      const imageForSize = new Image();
      imageForSize.onload = () => {
        console.log('Width:', imageForSize.width);
        console.log('Height:', imageForSize.height);
        document.getElementById('image-size').innerHTML = `${imageForSize.width}x${imageForSize.height}`;
      };
      imageForSize.src = src;

      removeBtn.addEventListener('click', (e) => {
        e.preventDefault()
        input.value = null
        img.innerHTML = ''
        item.classList.remove('has-img')
        URL.revokeObjectURL(src)
        document.getElementById('image-size').innerHTML = '';
      }, { once: true })
    })
  })
})
</script>
