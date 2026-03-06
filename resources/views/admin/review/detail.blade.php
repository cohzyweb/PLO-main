<x-admin-layout>
  <form id="review-form" action="{{ url('/admin/review/' . $review->id) . '/update' }}" method="post">
    @csrf
    @method('PUT')
  <div class="p-4 mx-auto max-w-full md:p-6">

    <!-- Page Name -->
    <div x-data="{ pageName: `クチコミ管理`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800"
          x-text="pageName"
        ></h2>
      </div>
    </div>

    <div class="text-lg mb-6 rounded-2xl border border-gray-200 bg-white">
      <div class="flex flex-row p-4 gap-6">
        <div class="flex-1">
          <div class="flex mb-4">
            <h4 class="text-gray-500 mr-3">
              ID:
            </h4>
            <p class="font-medium text-gray-800">
              {{ $review->id }}
            </p>
          </div>
          <div class="flex">
            <h4 class="text-gray-500 mr-3">
              キャスト名:
            </h4>
            <p class="font-medium text-gray-800">
              {{ $review->cast->name }}
            </p>
          </div>
        </div>

        <div class="flex-1">
          <div class="flex mb-4">
            <h4 class="text-gray-500 mr-3">
              投稿者:
            </h4>
            <p class="font-medium text-gray-800">
              {{ $review->member->name }}
            </p>
          </div>
          <div class="flex">
            <h4 class="text-gray-500 mr-3">
              クチコミの公開:
            </h4>
            <div x-data="{ publicToggle: {{ $review->is_public ? 'true' : 'false' }} }" class="flex gap-3">
              <!-- <span x-text="publicToggle ? '公開' : '非公開'" class="text-lg"></span> -->
              <label for="is_public" class="flex mt-1 cursor-pointer items-center gap-3 text-lg font-medium text-gray-700 select-none dark:text-gray-400">
                <div class="relative">
                  <input
                    name="is_public"
                    value="1"
                    type="checkbox"
                    id="is_public"
                    class="sr-only"
                    @change="publicToggle = !publicToggle"
                    @if ($review->is_public) checked @endif
                  />
                  <div class="block h-6 w-11 rounded-full" :class="publicToggle ? 'bg-brand-500 dark:bg-brand-500' : 'bg-gray-200 dark:bg-white/10'"></div>
                  <div class="shadow-theme-sm absolute top-0.5 left-0.5 h-5 w-5 rounded-full bg-white duration-300 ease-linear" :class="publicToggle ? 'translate-x-full': 'translate-x-0'"></div>
                </div>
              </label>
            </div>
          </div>
        </div>

        <div class="flex-1">
          <div class="flex mb-4">
            <h4 class="text-gray-500 mr-3">
              投稿日:
            </h4>
            <p class="font-medium text-gray-800">
              {{ \Carbon\Carbon::createFromTimeString($review->created_at)->format('Y/m/d H:i') }}
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="text-lg mb-6 rounded-2xl border border-gray-200 bg-white">
      <div class="flex flex-col p-4 gap-6">
        <div class="w-full">
          <label class="mb-1.5 block text-sm font-medium text-gray-700">
            タイトル:
          </label>
          <input
            name="title"
            type="text"
            value="{{ $review->title }}"
            disabled
            class="w-full shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11  rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
          >
        </div>

        <div class="w-full">
          <label class="mb-1.5 block text-sm font-medium text-gray-700">
            クチコミ内容を表示:
          </label>
          <textarea
            name="content"
            class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
            rows="5"
            disabled
          >{{ $review->content }}</textarea>
        </div>

        <div class="w-full">
          <label class="mb-1.5 block text-sm font-medium text-gray-700">
            店長からのコメント:
          </label>
          <textarea
            name="content"
            class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
            rows="5"
          >{{ $review->manager_comment }}</textarea>
        </div>
      </div>
    </div>

    <!-- Buttons -->
    <div class="action-container">
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
        class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-gray-500 shadow-theme-xs hover:bg-gray-600"
      >
        閉じる
      </button>
      <button
        type="button"
        id="btn-delete"
        class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-error-500 shadow-theme-xs hover:bg-error-600"
      >
        削除する
      </button>
    </div>
  <div>
</form>
<style>
  .action-container {
    display: flex;
    justify-content: space-around;
  }

</style>
</x-admin-layout>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('review-form');
  const saveBtn = document.getElementById('btn-save');
  const isPublicCheckbox = document.getElementById('is_public');

  document.getElementById('btn-close').addEventListener('click', function () {
    window.location.href = '/admin/review';
  });

  document.getElementById('btn-delete').addEventListener('click', function () {
    let confirmMsg = "クチコミを削除しますか？";

    if (confirm(confirmMsg)) {
      const reviewId = "{{ $review->id }}";
      form.action = `/admin/review/${reviewId}/delete`;
      form.submit();
    } else {
      return;
    }
  });
});
</script>