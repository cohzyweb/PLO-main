<x-admin-layout>
  <form id="videoForm" action="{{ url('/admin/video/' . $video->id) . '/publish' }}" method="post">
    @csrf
    @method('PUT')
  <div class="p-4 mx-auto max-w-full md:p-6">

    <!-- Page Name -->
    <div x-data="{ pageName: `動画管理`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
      </div>
    </div>

    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4 sm:p-6 flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
        <div>
          <h4 class="mb-4 text-xs leading-normal text-gray-500 dark:text-gray-400">
            投稿日時
          </h4>
          <div class="flex gap-2 items-end">
            <p class="text-lg font-medium text-gray-800 dark:text-white/90">
              {{ $video->created_at ? \Carbon\Carbon::createFromTimeString($video->created_at)->format('Y/m/d') : '' }}
            </p>
            <p class="text-lg font-medium text-gray-800 dark:text-white/90">
              {{ $video->created_at ? \Carbon\Carbon::createFromTimeString($video->created_at)->format('H:i') : '' }}
            </p>
          </div>
        </div>
        <div>
          <h4 class="mb-4 text-xs leading-normal text-gray-500 dark:text-gray-400">
            投稿者
          </h4>
          <p class="text-lg font-medium text-gray-800 dark:text-white/90">
            {{ $video->cast->name }}
          </p>
        </div>
        <div>
          <h4 class="mb-4 text-xs leading-normal text-gray-500 dark:text-gray-400">
            店舗名
          </h4>
          <p class="text-lg font-medium text-gray-800 dark:text-white/90">
            {{ $video->cast->shop->name }}
          </p>
        </div>
        <div>
          <h4 class="mb-4 text-xs leading-normal text-gray-500 dark:text-gray-400">
            公開状態
          </h4>
          <div x-data="{ publicToggle: {{ $video->is_public ? 'true' : 'false' }} }" class="flex gap-3">
            <span x-text="publicToggle ? '公開' : '非公開'" class="text-lg"></span>
            <label for="is_public" class="flex mt-1 cursor-pointer items-center gap-3 text-lg font-medium text-gray-700 select-none dark:text-gray-400">
              <div class="relative">
                <input
                  name="is_public"
                  value="1"
                  type="checkbox"
                  id="is_public"
                  class="sr-only"
                  @change="publicToggle = !publicToggle"
                  @if ($video->is_public) checked @endif
                />
                <div class="block h-6 w-11 rounded-full" :class="publicToggle ? 'bg-brand-500 dark:bg-brand-500' : 'bg-gray-200 dark:bg-white/10'"></div>
                <div class="shadow-theme-sm absolute top-0.5 left-0.5 h-5 w-5 rounded-full bg-white duration-300 ease-linear" :class="publicToggle ? 'translate-x-full': 'translate-x-0'"></div>
              </div>
            </label>
          </div>
        </div>
      </div>
    </div>

    @if ($video->thumb_url)
      <div class="video-container relative flex justify-center mt-6 mb-10">
        <img src="{{ asset('storage/' . $video->thumb_url) }}" alt="動画サムネイル" class="w-full h-full object-cover shadow" />
        <button
          type="button"
          id="videoPlayBtn"
          class=""
          data-url="{{ $video->video_url }}"
          title="再生"
          style="width:80px;height:80px;"
        >
          <svg width="44" height="44" viewBox="0 0 44 44" fill="white">
            <circle cx="22" cy="22" r="22" fill="none"/>
            <polygon points="16,12 34,22 16,32" fill="white"/>
          </svg>
      </div>
    @endif

    <!-- Buttons -->
    <div class="flex items-center justify-between">
      <button
        id="btn-save"
        type="submit"
        class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600"
      >
        保存
      </button>
      <button
        type="button"
        id="btn-close"
        class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-error-500 shadow-theme-xs"
      >
        閉じる
      </button>
    </div>
  <div>
</form>
<style>
  .video-container {
    height: 640px;
    @media (min-width: 1920px) {
        height: 900px;
    }
    @media (min-width: 2560px) {
        height: 1280px;
    }
  }

  .video-container button {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 80px;
    height: 80px;
    background: #444;
    border: none;
    border-radius: 50%;
    box-shadow: 0 8px 32px rgba(0,0,0,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background 0.5s, transform 0.5s, box-shadow 0.5s;
    outline: none;
  }

  .video-container button:hover {
    background: #222;
    transform: translate(-50%, -50%) scale(1.2);
    box-shadow: 0 12px 36px rgba(0,0,0,0.35);
  }
</style>
</x-admin-layout>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const playBtn = document.getElementById('videoPlayBtn');
  if (playBtn) {
    playBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      const url = playBtn.dataset.url;
      if (url) {
        window.open(url, '_blank', 'width=1024,height=720');
      }
    });
  }

  const form = document.getElementById('videoForm');
  const saveBtn = document.getElementById('btn-save');
  const isPublicCheckbox = document.getElementById('is_public');
  if (form && saveBtn && isPublicCheckbox) {
    form.addEventListener('submit', function(e) {
      // Change action according to toggle
      const videoId = "{{ $video->id }}";
      if (isPublicCheckbox.checked) {
        form.action = `/admin/video/${videoId}/publish`;
      } else {
        form.action = `/admin/video/${videoId}/unpublish`;
      }
    });
  }

  document.getElementById('btn-close').addEventListener('click', function () {
    window.location.href = '/admin/video';
  });
});
</script>