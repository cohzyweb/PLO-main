<x-admin-layout>
  <form
    id="cast-detail"
    class="p-4 mx-auto max-w-full md:p-6"
    method="post"
    action="{{ url('/admin/cast/add') }}"
    enctype="multipart/form-data"
  >
    @method('POST')
    @csrf
    @if(request()->has('redirect'))
      <input type="hidden" name="redirect" value="{{ request()->get('redirect') }}">
    @endif
    <div x-data="{ pageName: `キャストを追加`}">
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

        <!-- Name, Public -->
        <div class="flex gap-6 mb-6">

          <!-- Name -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              名前 <span class="text-error-500">*</span>
            </label>
            <input
              name="cast_name"
              type="text"
              value="{{ old('cast_name') }}"
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full max-w-[380px] rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >
            @if ($errors->has('cast_name'))
              <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('cast_name') }}</p>
            @endif
          </div>

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

        <!-- Shop, Joined -->
        <div class="flex gap-6 mb-6">

          <!-- Shop -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700">
              店舗 <span class="text-error-500">*</span>
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

          <!-- Joined -->
          <div>
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              入店日
            </label>
            <div class="relative">
              <input
                name="joined_at"
                type="date"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                onclick="this.showPicker()"
                value="{{ old('joined_at') ?? date('Y-m-d') }}"
              >
              <span class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z" fill=""></path>
                </svg>
              </span>
            </div>
          </div>
        </div>

        <!-- Age, Height -->
        <div class="flex gap-6 mb-6">
          <div class="">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              年齢
            </label>
            <input
              name="age"
              type="text"
              value=""
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full max-w-[380px] rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >
          </div>
          <div class="">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              身長
            </label>
            <input
              name="height"
              type="text"
              value=""
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full max-w-[380px] rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >
          </div>
        </div>

        <!-- Bra-size, Bust, Waist, Hip -->
        <div class="flex gap-6">
          <div class="">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              カップ
            </label>
            <input
              name="bra_size"
              type="text"
              value=""
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full max-w-[380px] rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >
          </div>
          <div class="">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              バスト
            </label>
            <input
              name="bust"
              type="text"
              value=""
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full max-w-[380px] rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >
          </div>
          <div class="">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              ウエスト
            </label>
            <input
              name="waist"
              type="text"
              value=""
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full max-w-[380px] rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >
          </div>
          <div class="">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              ヒップ
            </label>
            <input
              name="hip"
              type="text"
              value=""
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full max-w-[380px] rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >
          </div>
        </div>
      </div>
    </div>

    <!-- Gallery -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="px-6 py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
          ギャラリー
        </h3>
      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        <div class="flex gap-6">
          @for ($i = 1; $i <= 10; $i++)
          <div class="flex flex-col items-center justify-center full-width">
            <label
              class="cast-gallery-item dropzone flex items-center justify-center hover:border-brand-500! dark:hover:border-brand-500! rounded-xl border border-dashed! border-gray-300! bg-gray-50 p-7 lg:p-10 dark:border-gray-700! dark:bg-gray-900 dz-clickable"
              for="{{ 'file_' . $i }}"
            >
              <div class="dz-message m-0! flex h-[68px] w-[68px] items-center justify-center rounded-full bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-gray-400">
                <svg class="fill-current" width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5019 3.91699C14.2852 3.91699 14.0899 4.00891 13.953 4.15589L8.57363 9.53186C8.28065 9.82466 8.2805 10.2995 8.5733 10.5925C8.8661 10.8855 9.34097 10.8857 9.63396 10.5929L13.7519 6.47752V18.667C13.7519 19.0812 14.0877 19.417 14.5019 19.417C14.9161 19.417 15.2519 19.0812 15.2519 18.667V6.48234L19.3653 10.5929C19.6583 10.8857 20.1332 10.8855 20.426 10.5925C20.7188 10.2995 20.7186 9.82463 20.4256 9.53184L15.0838 4.19378C14.9463 4.02488 14.7367 3.91699 14.5019 3.91699ZM5.91626 18.667C5.91626 18.2528 5.58047 17.917 5.16626 17.917C4.75205 17.917 4.41626 18.2528 4.41626 18.667V21.8337C4.41626 23.0763 5.42362 24.0837 6.66626 24.0837H22.3339C23.5766 24.0837 24.5839 23.0763 24.5839 21.8337V18.667C24.5839 18.2528 24.2482 17.917 23.8339 17.917C23.4197 17.917 23.0839 18.2528 23.0839 18.667V21.8337C23.0839 22.2479 22.7482 22.5837 22.3339 22.5837H6.66626C6.25205 22.5837 5.91626 22.2479 5.91626 21.8337V18.667Z" fill=""></path>
                </svg>
              </div>
              <input
                name="{{ 'file_' . $i }}"
                id="{{ 'file_' . $i }}"
                type="file"
                accept=".jpg, .jpeg, .png, .HEIC"
                class="cast-gallery-input"
                hidden
              />
              <div class="cast-gallery-img">
              </div>
              <button
                type="button"
                class="cast-gallery-remove absolute z-999 flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300 sm:h-11 sm:w-11"
              >
                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z" fill=""></path>
                </svg>
              </button>
            </label>
            <span class="text-sm font-medium text-gray-700 dark:text-gray-400 justify-center items-center" id="image-size"></span>
          </div>
          @endfor
        </div>
      </div>
    </div>

    <!-- Video -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="px-6 py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
          動画ギャラリー
        </h3>
      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 p-6">
        <div class="flex gap-6">
          @for ($i = 1; $i <= 2; $i++)
            <div class="flex flex-col items-center flex-1">
              <label class="cast-video-item w-full flex flex-col items-center justify-center rounded-xl border border-dashed border-gray-300 bg-gray-50 dark:border-gray-700 dark:bg-gray-900">
                <input
                  name="video_{{ $i }}"
                  id="video_{{ $i }}"
                  type="file"
                  accept="video/mp4,video/webm,video/ogg"
                  class="cast-video-input"
                  hidden
                />
                <div class="cast-video-thumb relative flex items-center justify-center w-full h-full " data-index="{{ $i }}">
                  <!-- Empty state -->
                  <div class="video-thumb-empty flex flex-col items-center justify-center bg-gray-200 p-5 rounded-full cursor-pointer" style="display: flex;">
                    <svg class="fill-current" width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5019 3.91699C14.2852 3.91699 14.0899 4.00891 13.953 4.15589L8.57363 9.53186C8.28065 9.82466 8.2805 10.2995 8.5733 10.5925C8.8661 10.8855 9.34097 10.8857 9.63396 10.5929L13.7519 6.47752V18.667C13.7519 19.0812 14.0877 19.417 14.5019 19.417C14.9161 19.417 15.2519 19.0812 15.2519 18.667V6.48234L19.3653 10.5929C19.6583 10.8857 20.1332 10.8855 20.426 10.5925C20.7188 10.2995 20.7186 9.82463 20.4256 9.53184L15.0838 4.19378C14.9463 4.02488 14.7367 3.91699 14.5019 3.91699ZM5.91626 18.667C5.91626 18.2528 5.58047 17.917 5.16626 17.917C4.75205 17.917 4.41626 18.2528 4.41626 18.667V21.8337C4.41626 23.0763 5.42362 24.0837 6.66626 24.0837H22.3339C23.5766 24.0837 24.5839 23.0763 24.5839 21.8337V18.667C24.5839 18.2528 24.2482 17.917 23.8339 17.917C23.4197 17.917 23.0839 18.2528 23.0839 18.667V21.8337C23.0839 22.2479 22.7482 22.5837 22.3339 22.5837H6.66626C6.25205 22.5837 5.91626 22.2479 5.91626 21.8337V18.667Z" fill=""></path>
                    </svg>
                    <div class="video-action-btns absolute inset-0 flex items-center justify-center gap-2 z-10" style="display:none;">
                      <button type="button" class="video-upload-btn bg-white/80 hover:bg-white rounded-full p-2 shadow" title="アップロード">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="currentColor" d="M5 20h14v-2H5v2zm7-18L5.33 9h3.34v6h4.66V9h3.34L12 2z"/></svg>
                      </button>
                    </div>
                  </div>
                  <!-- Uploaded state -->
                  <div class="video-thumb-uploaded flex flex-col items-center justify-center w-full h-full" style="display: none;">
                    <img src="" class="object-cover w-full h-full pointer-events-none" alt="動画サムネイル">
                    <div class="video-action-btns absolute inset-0 flex items-center justify-center gap-4 z-10">
                      <button type="button" class="video-upload-btn bg-gray-200 p-4 rounded-full cursor-pointer" title="アップロード">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path d="M12 16V4M12 4l-5 5M12 4l5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          <rect x="4" y="16" width="16" height="4" rx="2" stroke="currentColor" stroke-width="2"/>
                        </svg>
                      </button>
                      <button type="button" class="video-play-btn bg-gray-200 p-4 rounded-full cursor-pointer" title="再生">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="currentColor" d="M8 5v14l11-7z"/></svg>
                      </button>
                      <button type="button" class="video-delete-btn bg-gray-200 p-4 rounded-full cursor-pointer" title="削除">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z" fill=""></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </label>
            </div>
          @endfor
        </div>
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
        {{-- <div class="mb-6 max-w-[380px]">
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
              value="{{ old('diary_email_from') }}"
            >
          </div>
        </div> --}}
        <div class="max-w-[380px]">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            投稿先メールアドレス
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
              value="{{ old('diary_email_to') }}"
            >
          </div>
        </div>
      </div>
    </div>

    <!-- Text -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4 sm:p-6">
        <div class="mb-6">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            アピールポイント
          </label>
          <textarea
            name="appeal_point"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
          >{{ old('appeal_point') }}</textarea>
        </div>

        <div>
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            店長コメント
          </label>
          <textarea
            name="manager_comment"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
          >{{ old('manager_comment') }}</textarea>
        </div>

        <div>
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            キャッチコピー
          </label>
          <textarea
            name="catch_copy"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
          >{{ old('catch_copy') }}</textarea>
        </div>

        <div>
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            メモ
          </label>
          <textarea
            name="memo"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
          >{{ old('memo') }}</textarea>
        </div>
      </div>
    </div>

    <!-- Option, Personality, Style -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4 sm:p-6">

        <!-- Option -->
        <div class="mb-6">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            オプション
          </label>
          <div class="flex flex-wrap items-center gap-8">
            @foreach ($options as $option)
              @php
                $optionName = 'option_'.$option->id;
              @endphp
              <div x-data="{{ '{ '.$optionName.': false }' }}">
                <label
                  for="{{ $optionName }}"
                  class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400"
                >
                  <div class="relative">
                    <input
                      name="options[]"
                      value="{{ $option->id }}"
                      type="checkbox"
                      id="{{ $optionName }}"
                      class="sr-only"
                      @change="{{ $optionName.' = !'.$optionName }}"
                    />
                    <div
                      :class="{{ $optionName }} ? 'border-brand-500 bg-brand-500' : 'bg-transparent border-gray-300 dark:border-gray-700'"
                      class="f hover:border-brand-500 dark:hover:border-brand-500 mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]"
                    >
                      <span :class="{{ $optionName }} ? '' : 'opacity-0'">
                        <svg
                          width="14"
                          height="14"
                          viewBox="0 0 14 14"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M11.6666 3.5L5.24992 9.91667L2.33325 7"
                            stroke="white"
                            stroke-width="1.94437"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                  </div>
                  {{ $option->name }}
                </label>
              </div>
            @endforeach
          </div>
        </div>

        <!-- Personality -->
        <div class="mb-6">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            性格
          </label>
          <div class="flex flex-wrap items-center gap-8">
            @foreach ($personalities as $personality)
              @php
                $personalityName = 'personality_'.$personality->id;
              @endphp
              <div x-data="{{ '{ '.$personalityName.': false }' }}">
                <label
                  for="{{ $personalityName }}"
                  class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400"
                >
                  <div class="relative">
                    <input
                      name="personalities[]"
                      value="{{ $personality->id }}"
                      type="checkbox"
                      id="{{ $personalityName }}"
                      class="sr-only"
                      @change="{{ $personalityName.' = !'.$personalityName }}"
                    />
                    <div
                      :class="{{ $personalityName }} ? 'border-brand-500 bg-brand-500' : 'bg-transparent border-gray-300 dark:border-gray-700'"
                      class="f hover:border-brand-500 dark:hover:border-brand-500 mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]"
                    >
                      <span :class="{{ $personalityName }} ? '' : 'opacity-0'">
                        <svg
                          width="14"
                          height="14"
                          viewBox="0 0 14 14"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M11.6666 3.5L5.24992 9.91667L2.33325 7"
                            stroke="white"
                            stroke-width="1.94437"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                  </div>
                  {{ $personality->name }}
                </label>
              </div>
            @endforeach
          </div>
        </div>
        <!-- Personality -->
        <div class="mb-6">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            個性
          </label>
          <div class="flex flex-wrap items-center gap-8">
            @foreach ($individualities as $individuality)
              @php
                $individualityName = 'individuality_'.$individuality->id;
              @endphp
              <div x-data="{{ '{ '.$individualityName.': false }' }}">
                <label
                  for="{{ $individualityName }}"
                  class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400"
                >
                  <div class="relative">
                    <input
                      name="individualities[]"
                      value="{{ $individuality->id }}"
                      type="checkbox"
                      id="{{ $individualityName }}"
                      class="sr-only"
                      @change="{{ $individualityName.' = !'.$individualityName }}"
                    />
                    <div
                      :class="{{ $individualityName }} ? 'border-brand-500 bg-brand-500' : 'bg-transparent border-gray-300 dark:border-gray-700'"
                      class="f hover:border-brand-500 dark:hover:border-brand-500 mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]"
                    >
                      <span :class="{{ $individualityName }} ? '' : 'opacity-0'">
                        <svg
                          width="14"
                          height="14"
                          viewBox="0 0 14 14"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M11.6666 3.5L5.24992 9.91667L2.33325 7"
                            stroke="white"
                            stroke-width="1.94437"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                  </div>
                  {{ $individuality->name }}
                </label>
              </div>
            @endforeach
          </div>
        </div>

        <!-- Style -->
        <div class="mb-6">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            体型
          </label>
          <div class="flex flex-wrap items-center gap-8">
            @foreach ($styles as $style)
              @php
                $styleName = 'style_'.$style->id;
              @endphp
              <div x-data="{{ '{ '.$styleName.': false }' }}">
                <label
                  for="{{ $styleName }}"
                  class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400"
                >
                  <div class="relative">
                    <input
                      name="styles[]"
                      value="{{ $style->id }}"
                      type="checkbox"
                      id="{{ $styleName }}"
                      class="sr-only"
                      @change="{{ $styleName.' = !'.$styleName }}"
                    />
                    <div
                      :class="{{ $styleName }} ? 'border-brand-500 bg-brand-500' : 'bg-transparent border-gray-300 dark:border-gray-700'"
                      class="f hover:border-brand-500 dark:hover:border-brand-500 mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]"
                    >
                      <span :class="{{ $styleName }} ? '' : 'opacity-0'">
                        <svg
                          width="14"
                          height="14"
                          viewBox="0 0 14 14"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M11.6666 3.5L5.24992 9.91667L2.33325 7"
                            stroke="white"
                            stroke-width="1.94437"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                  </div>
                  {{ $style->name }}
                </label>
              </div>
            @endforeach
          </div>
        </div>
        <!-- Playstyle -->
        <div class="mb-6">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            プレイスタイル
          </label>
          <div class="flex flex-wrap items-center gap-8">
            @foreach ($playstyles as $playstyle)
              @php
                $playstyleName = 'playstyle_'.$playstyle->id;
              @endphp
              <div x-data="{{ '{ '.$playstyleName.': false }' }}">
                <label
                  for="{{ $playstyleName }}"
                  class="flex cursor-pointer items-center text-sm font-medium text-gray-700 select-none dark:text-gray-400"
                >
                  <div class="relative">
                    <input
                      name="playstyles[]"
                      value="{{ $playstyle->id }}"
                      type="checkbox"
                      id="{{ $playstyleName }}"
                      class="sr-only"
                      @change="{{ $playstyleName.' = !'.$playstyleName }}"
                    />
                    <div
                      :class="{{ $playstyleName }} ? 'border-brand-500 bg-brand-500' : 'bg-transparent border-gray-300 dark:border-gray-700'"
                      class="f hover:border-brand-500 dark:hover:border-brand-500 mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]"
                    >
                      <span :class="{{ $playstyleName }} ? '' : 'opacity-0'">
                        <svg
                          width="14"
                          height="14"
                          viewBox="0 0 14 14"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M11.6666 3.5L5.24992 9.91667L2.33325 7"
                            stroke="white"
                            stroke-width="1.94437"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </span>
                    </div>
                  </div>
                  {{ $playstyle->name }}
                </label>
              </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>
    <!-- Qa -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="px-6 py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
          Q&A
        </h3>
      </div>
      <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
        @foreach (['1','2','3','4','5','6','7','8','9','10'] as $index => $label)
          <div class="flex items-center gap-4 mb-6">
            <label class="text-sm font-medium text-gray-700 dark:text-gray-400">
              {{ 'Q'.$label }}
        </label>
            <div class="relative z-20 w-full max-w-[380px] bg-transparent">
          <select
                name="question[]"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
          >
            <option value="" class="text-gray-700">
            </option>
            @foreach ($questions as $question)
              <option
                value="{{ $question->id }}"
                class="text-gray-700"
                @if (old('question') == $question->id) selected @endif
              >
                {{ $question->question }}
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
          {{-- <div>
        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              メモ
        </label>
        <textarea
              name="memo"
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >{{ $cast->memo }}</textarea>
          </div>           --}}
          <div class="flex items-center gap-4 mb-6">
          {{-- <div> --}}
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
              {{ 'A'.$label }}
            </label>
            {{-- <div class="relative z-20 w-full max-w-[380px] bg-transparent"> --}}
              <textarea
                name="a{{ $label }}"
          class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
              >{{ old('a'.$label) }}</textarea>
            {{-- </div> --}}
      </div>
        @endforeach
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
  <!-- <div id="loading-overlay" style="display:none;position:fixed;z-index:9999;top:0;left:0;width:100vw;height:100vh;background:rgba(255,255,255,0.7);align-items:center;justify-content:center;">
    <div style="font-size:2rem;color:#333;">
      保存中...
      <span class="loader" style="display:inline-block;width:2rem;height:2rem;border:4px solid #ccc;border-top:4px solid #333;border-radius:50%;animation:spin 1s linear infinite;vertical-align:middle;"></span>
    </div>
  </div>
  <style>
  @keyframes spin { 100% { transform: rotate(360deg); } }
  </style> -->
</x-admin-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // const form = document.querySelector('form#cast-detail');
  // const overlay = document.getElementById('loading-overlay');
  // if(form && overlay) {
  //   form.addEventListener('submit', function() {
  //     overlay.style.display = 'flex';
  //   });
  // }

  document.querySelectorAll('input[type=file].cast-gallery-input').forEach(input => {
    const item = input.parentElement
    const img = item.querySelector('.cast-gallery-img')
    const path = item.querySelector('input[type=hidden]')
    const removeBtn = item.querySelector('.cast-gallery-remove')

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
        const item_parent = item.parentElement;
        item_parent.querySelector('#image-size').innerHTML = `${imageForSize.width}x${imageForSize.height}`;
      };
      imageForSize.src = src;

      removeBtn.addEventListener('click', (e) => {
        e.preventDefault()
        input.value = null
        img.innerHTML = ''
        item.classList.remove('has-img')
        URL.revokeObjectURL(src)
        const item_parent = item.parentElement;
        item_parent.querySelector('#image-size').innerHTML = '';
      }, { once: true })
    })
  })

  // Video upload and preview (thumbnail only, no upload)
  document.querySelectorAll('.cast-video-input').forEach(input => {
    const label = input.closest('.cast-video-item');
    const thumbDiv = label.querySelector('.cast-video-thumb');
    const emptyDiv = thumbDiv.querySelector('.video-thumb-empty');
    const uploadedDiv = thumbDiv.querySelector('.video-thumb-uploaded');
    const uploadedImg = uploadedDiv.querySelector('img');
    const playBtn = uploadedDiv.querySelector('.video-play-btn');
    const deleteBtn = uploadedDiv.querySelector('.video-delete-btn');
    const uploadBtns = thumbDiv.querySelectorAll('.video-upload-btn');

    uploadBtns.forEach(btn => {
      btn.addEventListener('click', function (e) {
        e.stopPropagation();
        input.click();
      });
    });

    input.addEventListener('change', (e) => {
      if (!e.target.files.length) return;
      const file = e.target.files[0];
      const video = document.createElement('video');
      video.preload = 'metadata';
      video.muted = true;
      video.src = URL.createObjectURL(file);

      video.addEventListener('loadedmetadata', function () {
        video.currentTime = 1;
      }, { once: true });

      video.addEventListener('seeked', function () {
        const thumbRect = label.getBoundingClientRect();
        const canvas = document.createElement('canvas');
        canvas.width = Math.round(thumbRect.width);
        canvas.height = Math.round(thumbRect.height);
        const ctx = canvas.getContext('2d');
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        uploadedImg.src = canvas.toDataURL('image/jpeg');
        // Show uploaded, hide empty
        emptyDiv.style.display = 'none';
        uploadedDiv.style.display = 'flex';
        URL.revokeObjectURL(video.src);
      }, { once: true });
    });

    // Play video in new window
    playBtn.addEventListener('click', function (ev) {
      ev.stopPropagation();
      if (input.files && input.files[0]) {
        const url = URL.createObjectURL(input.files[0]);
        window.open(url, '_blank', 'width=800,height=600');
        setTimeout(() => URL.revokeObjectURL(url), 10000);
      }
    });

    // Delete video
    deleteBtn.addEventListener('click', function (ev) {
      ev.stopPropagation();
      input.value = '';
      uploadedImg.src = '';
      uploadedDiv.style.display = 'none';
      emptyDiv.style.display = 'flex';
    });
  });
})
</script>
@once
    @vite(['resources/scss/admin/casts.scss'])
@endonce