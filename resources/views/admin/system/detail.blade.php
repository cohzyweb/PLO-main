<x-admin-layout>
    <form class="p-4 mx-auto max-w-full md:p-6" method="post" action="{{ url('/admin/system/' . $system->id) }}"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div x-data="{ pageName: `料金画面を編集` }">
            <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success"
                style="position: relative; padding: 1rem; margin-bottom: 1rem; border: 1px solid #badbcc; border-radius: 0.375rem; color: #0f5132; background-color: #d1e7dd;">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger"
                style="position: relative; padding: 1rem; margin-bottom: 1rem; border: 1px solid #badbcc; border-radius: 0.375rem; color: #0f5132; background-color: #d1e7dd;">
                {{ session('error') }}
            </div>
        @endif
        <!-- Name, Shop, Profile -->
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="p-4 sm:p-6">
                <!-- Shop, Joined -->
                <div class="flex gap-6 mb-6">

                    <!-- Shop -->
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            店舗 {{ $system->shop->name }}
                        </label>
                    </div>
                </div>

                <!-- サムネイル -->
                <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="px-6 py-5">
                        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                            ヘッター画像<span class="text-error-500">*</span>
                        </h3>
                        @if ($errors->has('file_1'))
                            <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('file_1') }}</p>
                        @endif

                    </div>
                    <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                        <div class="flex gap-6">
                            @php
                                $saved = $system->header;
                            @endphp
                            <label
                                class="system-gallery-item dropzone flex items-center justify-center hover:border-brand-500! dark:hover:border-brand-500! rounded-xl border border-dashed! border-gray-300! bg-gray-50 p-7 lg:p-10 dark:border-gray-700! dark:bg-gray-900 dz-clickable"
                                for="{{ 'file_1' }}">
                                <div
                                    class="dz-message m-0! flex h-[68px] w-[68px] items-center justify-center rounded-full bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-gray-400">
                                    <svg class="fill-current" width="29" height="28" viewBox="0 0 29 28"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.5019 3.91699C14.2852 3.91699 14.0899 4.00891 13.953 4.15589L8.57363 9.53186C8.28065 9.82466 8.2805 10.2995 8.5733 10.5925C8.8661 10.8855 9.34097 10.8857 9.63396 10.5929L13.7519 6.47752V18.667C13.7519 19.0812 14.0877 19.417 14.5019 19.417C14.9161 19.417 15.2519 19.0812 15.2519 18.667V6.48234L19.3653 10.5929C19.6583 10.8857 20.1332 10.8855 20.426 10.5925C20.7188 10.2995 20.7186 9.82463 20.4256 9.53184L15.0838 4.19378C14.9463 4.02488 14.7367 3.91699 14.5019 3.91699ZM5.91626 18.667C5.91626 18.2528 5.58047 17.917 5.16626 17.917C4.75205 17.917 4.41626 18.2528 4.41626 18.667V21.8337C4.41626 23.0763 5.42362 24.0837 6.66626 24.0837H22.3339C23.5766 24.0837 24.5839 23.0763 24.5839 21.8337V18.667C24.5839 18.2528 24.2482 17.917 23.8339 17.917C23.4197 17.917 23.0839 18.2528 23.0839 18.667V21.8337C23.0839 22.2479 22.7482 22.5837 22.3339 22.5837H6.66626C6.25205 22.5837 5.91626 22.2479 5.91626 21.8337V18.667Z"
                                            fill=""></path>
                                    </svg>
                                </div>
                                <input name="{{ 'file_1' }}" id="{{ 'file_1' }}" type="file"
                                    accept=".jpg, .jpeg, .png, .HEIC" class="system-gallery-input" hidden />
                                <input name="{{ 'path_1' }}" id="{{ 'path_1' }}" type="hidden"
                                    value="{{ $saved }}" />
                                <div class="system-gallery-img">
                                    @if ($saved)
                                        <img src="{{ asset('storage/' . $saved) }}">
                                    @endif
                                </div>
                                <button type="button"
                                    class="system-gallery-remove absolute z-999 flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300 sm:h-11 sm:w-11">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z"
                                            fill=""></path>
                                    </svg>
                                </button>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- サムネイル -->
                <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="px-6 py-5">
                        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                            プレイ画像<span class="text-error-500">*</span>
                        </h3>
                        @if ($errors->has('file_2'))
                            <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('file_2') }}</p>
                        @endif

                    </div>
                    <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                        <div class="flex gap-6">
                            @php
                                $saved = $system->play;
                            @endphp
                            <label
                                class="system-gallery-item dropzone flex items-center justify-center hover:border-brand-500! dark:hover:border-brand-500! rounded-xl border border-dashed! border-gray-300! bg-gray-50 p-7 lg:p-10 dark:border-gray-700! dark:bg-gray-900 dz-clickable"
                                for="{{ 'file_2' }}">
                                <div
                                    class="dz-message m-0! flex h-[68px] w-[68px] items-center justify-center rounded-full bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-gray-400">
                                    <svg class="fill-current" width="29" height="28" viewBox="0 0 29 28"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.5019 3.91699C14.2852 3.91699 14.0899 4.00891 13.953 4.15589L8.57363 9.53186C8.28065 9.82466 8.2805 10.2995 8.5733 10.5925C8.8661 10.8855 9.34097 10.8857 9.63396 10.5929L13.7519 6.47752V18.667C13.7519 19.0812 14.0877 19.417 14.5019 19.417C14.9161 19.417 15.2519 19.0812 15.2519 18.667V6.48234L19.3653 10.5929C19.6583 10.8857 20.1332 10.8855 20.426 10.5925C20.7188 10.2995 20.7186 9.82463 20.4256 9.53184L15.0838 4.19378C14.9463 4.02488 14.7367 3.91699 14.5019 3.91699ZM5.91626 18.667C5.91626 18.2528 5.58047 17.917 5.16626 17.917C4.75205 17.917 4.41626 18.2528 4.41626 18.667V21.8337C4.41626 23.0763 5.42362 24.0837 6.66626 24.0837H22.3339C23.5766 24.0837 24.5839 23.0763 24.5839 21.8337V18.667C24.5839 18.2528 24.2482 17.917 23.8339 17.917C23.4197 17.917 23.0839 18.2528 23.0839 18.667V21.8337C23.0839 22.2479 22.7482 22.5837 22.3339 22.5837H6.66626C6.25205 22.5837 5.91626 22.2479 5.91626 21.8337V18.667Z"
                                            fill=""></path>
                                    </svg>
                                </div>
                                <input name="{{ 'file_2' }}" id="{{ 'file_2' }}" type="file"
                                    accept=".jpg, .jpeg, .png, .HEIC" class="system-gallery-input" hidden />
                                <input name="{{ 'path_2' }}" id="{{ 'path_2' }}" type="hidden"
                                    value="{{ $saved }}" />
                                <div class="system-gallery-img">
                                    @if ($saved)
                                        <img src="{{ asset('storage/' . $saved) }}">
                                    @endif
                                </div>
                                <button type="button"
                                    class="system-gallery-remove absolute z-999 flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300 sm:h-11 sm:w-11">
                                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z"
                                            fill=""></path>
                                    </svg>
                                </button>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Buttons -->
                <div class="px-5 flex items-center justify-between">
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                        保存する
                    </button>
                    {{-- <button type="button" id="deleteModalOpener"
                        class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-error-500 shadow-theme-xs">
                        削除する
                    </button> --}}
                </div>
    </form>
    <!-- Delete Modal -->
    <div class="fixed inset-0 items-center justify-center hidden p-5 overflow-y-auto modal z-99999" id="deleteModal">
        <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50"></div>
        <div
            class="modal-dialog modal-dialog-scrollable modal-lg no-scrollbar relative flex w-full max-w-[700px] flex-col overflow-y-auto rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-11">
            <button
                class="modal-close-btn transition-color absolute right-5 top-5 z-999 flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300 sm:h-11 sm:w-11">
                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z"
                        fill=""></path>
                </svg>
            </button>
            <div class="flex flex-col px-2 overflow-y-auto modal-content custom-scrollbar">
                <div class="modal-header">
                    <h5 class="mb-2 font-semibold text-gray-800 modal-title text-theme-xl dark:text-white/90 lg:text-2xl"
                        id="eventModalLabel">
                        料金画面を削除
                    </h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        本当に削除してよろしいでしょうか？
                    </p>
                </div>
                <div class="flex items-center gap-3 mt-6 modal-footer sm:justify-end">
                    <button type="button"
                        class="btn modal-close-btn bg-danger-subtle text-danger flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto"
                        data-bs-dismiss="modal">
                        いいえ
                    </button>
                    <form action="{{ url('/admin/system/' . $system->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn btn-primary flex w-full justify-center rounded-lg bg-error-500 px-4 py-2.5 text-sm font-medium text-white sm:w-auto">
                            はい
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('input[type=file].system-gallery-input').forEach(input => {
            const item = input.parentElement
            const img = item.querySelector('.system-gallery-img')
            const path = item.querySelector('input[type=hidden]')
            const removeBtn = item.querySelector('.system-gallery-remove')
            if (path.value != '') {
                // removeBtn.style.display = 'flex'
                item.classList.add('has-img')
            }
            if (item.classList.contains('has-img')) {
                input.disabled = true
                removeBtn.addEventListener('click', (e) => {
                    e.preventDefault()
                    img.innerHTML = ''
                    path.value = ''
                    item.classList.remove('has-img')
                    input.disabled = false
                }, {
                    once: true
                })
            }

            input.addEventListener('change', (e) => {
                if (e.target.files.length === 0) return ''

                item.classList.add('has-img')

                const imgEl = document.createElement('img')
                const file = e.target.files[0]
                const src = URL.createObjectURL(file)
                imgEl.src = src
                imgEl.className = 'w-full h-full object-cover'
                img.appendChild(imgEl)

                removeBtn.addEventListener('click', (e) => {
                    e.preventDefault()
                    input.value = null
                    img.innerHTML = ''
                    item.classList.remove('has-img')
                    URL.revokeObjectURL(src)
                }, {
                    once: true
                })
            })
        })
    })
</script>
