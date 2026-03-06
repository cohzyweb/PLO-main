<x-admin-layout>
  @push('head')
  <script>
    const token = '{{ $token }}';
    // 即座に実行されるスクリプト
    (function() {
      // グローバル変数と関数を定義
      window.dummyHistories = @json($dummyHistories);
      window.currentEditId = null;

      // モーダルを開く関数（グローバルスコープに公開）
      window.openEditModal = async function(historyId, point_pay, point_use, price, course_name, shop_id, shop_name, casts_name, created_at) {
        // const history = window.dummyHistories.find(h => h.id === historyId);
        // if (history) {
            try {
            const response = await fetch(`/api/member/getValues`, {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'Authorization': `Bearer ${token}`
              },
              body: JSON.stringify({
                shop_id: shop_id
              }),
              // credentials: 'include'
            });
            // console.log(response.data.courses);
            if (response.ok) {
              console.log(response);
              const data = await response.json();
              console.log(data.courses);
              console.log(data.casts);
              let course = '<option value="">選択してください</option>';
              let cast = '<option value="">選択してください</option>';
              if (data.courses.length > 0) {
                course += data.courses.map((course) =>{
                  console.log(course.name);
                  console.log(course_name);
                  console.log(course_name);
                  console.log(casts_name);
                  return `<option value="${course.id}" ${course.name === course_name ? 'selected' : ''}>${course.name}</option>`;
                }).join('');
              }
              if (data.casts.length > 0) {
                cast += data.casts.map(cast => `<option value="${cast.id}" ${cast.name === casts_name ? 'selected' : ''}>${cast.name}</option>`).join('');
              }
              document.getElementById('course').innerHTML = course;
              document.getElementById('cast_name').innerHTML = cast;
              // 値の設定は削除（selected属性で制御するため）
            } else {
              console.error('更新に失敗しました');
              alert('更新に失敗しました');
            }
          } catch (error) {
            console.error('エラーが発生しました:', error);
            alert('エラーが発生しました');
          }

          window.currentEditId = historyId;

          // フォームに値を設定（select以外）
          document.getElementById('createDate').value = created_at || '';
          document.getElementById('shop_name').value = shop_name || '';
          document.getElementById('cast_name').value = casts_name || '';
          document.getElementById('course').value = course_name || '';
          document.getElementById('price').value = price || 0;
          document.getElementById('point').value = point_pay || 0;
          document.getElementById('point_use').value = point_use || 0;

          // モーダルを表示
          document.getElementById('editModal').classList.remove('hidden');
        // }
      };

      // モーダルを閉じる関数（グローバルスコープに公開）
      window.closeEditModal = function() {
        document.getElementById('editModal').classList.add('hidden');
        window.currentEditId = null;
      };

      // フォーム送信処理
      window.handleFormSubmit = async function(e) {
        e.preventDefault();

        if (!window.currentEditId) {
          console.error('編集IDが設定されていません');
          return;
        }

        const formData = {
          id: window.currentEditId,
          cast_id: document.getElementById('cast_name').value,
          course: document.getElementById('course').value,
          price: parseInt(document.getElementById('price').value) || 0,
          point: parseInt(document.getElementById('point').value) || 0,
          point_use: parseInt(document.getElementById('point_use').value) || 0
        };

        try {
          const response = await fetch(`/api/member/update`, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              'Accept': 'application/json',
              'X-Requested-With': 'XMLHttpRequest',
              'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(formData),
            // credentials: 'include'
          });
          console.log(response);
          if (response.ok) {
            window.location.reload();
          } else {
            console.error('更新に失敗しました');
            alert('更新に失敗しました');
          }
        } catch (error) {
          console.error('エラーが発生しました:', error);
          alert('エラーが発生しました');
        }
      };
    })();
  </script>
  @endpush

  <div class="p-4 mx-auto max-w-full md:p-6">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
      <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">
        会員情報
      </h2>
    </div>

    <div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="max-w-full overflow-x-auto">
        <table class="min-w-full">
          <tbody>
            <tr class="border-b border-gray-100 dark:border-gray-800">
              <th class="px-5 py-3 sm:px-6 bg-gray-50 dark:bg-gray-800 text-left">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    会員ID
                  </p>
                </div>
              </th>
              <td class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    {{ $member->id ?? '' }}
                  </p>
                </div>
              </td>
              <th class="px-5 py-3 sm:px-6 bg-gray-50 dark:bg-gray-800 text-left">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    ニックネーム
                  </p>
                </div>
              </th>
              <td class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    {{ $member->name ?? '' }}
                  </p>
                </div>
              </td>
              <th class="px-5 py-3 sm:px-6 bg-gray-50 dark:bg-gray-800 text-left">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    会員名
                  </p>
                </div>
              </th>
              <td class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    {{ $member->subname ?? '' }}
                  </p>
                </div>
              </td>
            </tr>
            <tr class="border-b border-gray-100 dark:border-gray-800">
              <th class="px-5 py-3 sm:px-6 bg-gray-50 dark:bg-gray-800 text-left">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    登録日
                  </p>
                </div>
              </th>
              <td class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    {{ $member->created_at ? \Carbon\Carbon::parse($member->created_at)->format('Y-m-d') : '' }}
                  </p>
                </div>
              </td>
              <th class="px-5 py-3 sm:px-6 bg-gray-50 dark:bg-gray-800 text-left">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    携帯番号
                  </p>
                </div>
              </th>
              <td class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    {{ $member->tel ?? '' }}
                  </p>
                </div>
              </td>
              <th class="px-5 py-3 sm:px-6 bg-gray-50 dark:bg-gray-800 text-left">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    メールアドレス
                  </p>
                </div>
              </th>
              <td class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    {{ $member->email ?? '' }}
                  </p>
                </div>
              </td>
            </tr>
            <tr class="border-b border-gray-100 dark:border-gray-800">
              <th class="px-5 py-3 sm:px-6 bg-gray-50 dark:bg-gray-800 text-left">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    都道府県
                  </p>
                </div>
              </th>
              <td class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    @php
                      $prefectures = [
                        "1" => "北海道", "2" => "青森県", "3" => "岩手県", "4" => "宮城県", "5" => "秋田県",
                        "6" => "山形県", "7" => "福島県", "8" => "茨城県", "9" => "栃木県", "10" => "群馬県",
                        "11" => "埼玉県", "12" => "千葉県", "13" => "東京都", "14" => "神奈川県", "15" => "新潟県",
                        "16" => "富山県", "17" => "石川県", "18" => "福井県", "19" => "山梨県", "20" => "長野県",
                        "21" => "岐阜県", "22" => "静岡県", "23" => "愛知県", "24" => "三重県", "25" => "滋賀県",
                        "26" => "京都府", "27" => "大阪府", "28" => "兵庫県", "29" => "奈良県", "30" => "和歌山県",
                        "31" => "鳥取県", "32" => "島根県", "33" => "岡山県", "34" => "広島県", "35" => "山口県",
                        "36" => "徳島県", "37" => "香川県", "38" => "愛媛県", "39" => "高知県", "40" => "福岡県",
                        "41" => "佐賀県", "42" => "長崎県", "43" => "熊本県", "44" => "大分県", "45" => "宮崎県",
                        "46" => "鹿児島県", "47" => "沖縄県", "48" => "その他"
                      ];
                    @endphp
                    {{ $prefectures[$member->pref_id] ?? '' }}
                  </p>
                </div>
              </td>
              <th class="px-5 py-3 sm:px-6 bg-gray-50 dark:bg-gray-800 text-left">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    生年月日
                  </p>
                </div>
              </th>
              <td class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    {{ $member->birth ? \Carbon\Carbon::parse($member->birth)->format('Y-m-d') : '' }}
                  </p>
                </div>
              </td>
            </tr>
            <tr class="border-b border-gray-100 dark:border-gray-800">
              <th class="px-5 py-3 sm:px-6 bg-gray-50 dark:bg-gray-800 text-left">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    住所
                  </p>
                </div>
              </th>
              <td class="px-5 py-3 sm:px-6" colspan="3">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    {{ $member->address ?? '' }}
                  </p>
                </div>
              </td>
              <th class="px-5 py-3 sm:px-6 bg-gray-50 dark:bg-gray-800 text-left">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    現在のポイント数
                  </p>
                </div>
              </th>
              <td class="px-5 py-3 sm:px-6" colspan="3">
                <div class="flex items-center">
                  <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                    {{ $today_point ?? 0 }}
                  </p>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- 来店履歴 -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
      <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">
        来店履歴
      </h2>
    </div>

    <div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="max-w-full overflow-x-auto">
        <table class="min-w-full">
          <thead>
            <tr class="border-b border-gray-100 dark:border-gray-800">
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    来店日
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    店舗名
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    キャスト名
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    コース
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    料金
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    ポイント
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    利用ポイント
                  </p>
                </div>
              </th>
              @role('admin')
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    操作
                  </p>
                </div>
              </th>
              @endrole
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
            @foreach ($histories as $history)
              <tr>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                      {{ $history->created_at ? \Carbon\Carbon::parse($history->created_at)->format('Y-m-d') : '' }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                      {{ $history->shop_name }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                      {{ $history->casts_name }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                      {{ $history->course_name_table }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                      {{ number_format($history->price_new) ?? 0 }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                      {{ $history->point_pay ?? 0 }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                      {{ $history->point_use ?? 0 }}
                    </p>
                  </div>
                </td>
                @role('admin')
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <button
                      type="button"
                      onclick="openEditModal({{ $history->id }}, {{ $history->point_pay }}, {{ $history->point_use }}, {{ $history->price_new }}, '{{ $history->course_name_table }}','{{ $history->shop_id }}', '{{ $history->shop_name }}', '{{ $history->casts_name }}', '{{ $history->created_at ? \Carbon\Carbon::parse($history->created_at)->format('Y-m-d') : '' }}' )"
                      class="flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]"
                    >
                      <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      編集
                    </button>
                  </div>
                </td>
                @endrole
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- ページネーション -->
    <div class="mt-4 flex items-center justify-between">
      <div class="flex items-center gap-2">
        <p class="text-sm text-gray-700 dark:text-gray-400">
          全{{ $total }}件中 {{ ($page - 1) * $limit + 1 }}-{{ min($page * $limit, $total) }}件を表示
        </p>
      </div>
      <div class="flex items-center gap-2">
        @if ($page > 1)
          <a href="{{ request()->fullUrlWithQuery(['page' => $page - 1]) }}" class="flex items-center justify-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
            前へ
          </a>
        @endif

        @for ($i = max(1, $page - 2); $i <= min($pages, $page + 2); $i++)
          <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}" class="flex items-center justify-center rounded-lg border {{ $i === $page ? 'border-blue-500 bg-blue-50 text-blue-600 dark:border-blue-500 dark:bg-blue-500/[0.1] dark:text-blue-500' : 'border-gray-300 bg-white text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]' }} px-3 py-2 text-sm font-medium">
            {{ $i }}
          </a>
        @endfor

        @if ($page < $pages)
          <a href="{{ request()->fullUrlWithQuery(['page' => $page + 1]) }}" class="flex items-center justify-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
            次へ
          </a>
        @endif
      </div>
    </div>

    <!-- 編集モーダル -->
    <div id="editModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex min-h-screen items-center justify-center p-4">
        <div id="modalOverlay" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <div id="modalContent" class="relative inline-block w-full max-w-md transform overflow-hidden rounded-lg bg-white px-6 pt-5 pb-4 text-left shadow-xl transition-all">
          <div class="w-full">
            <div class="w-full text-left">
              <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4" id="modal-title">
                来店情報の編集
              </h3>
              <div class="mt-2">
                <form id="editForm" onsubmit="handleFormSubmit(event)" class="space-y-4">
                  <div class="space-y-3">
                    <div>
                      <label for="createDate" class="block text-sm font-medium text-gray-700">店舗日</label>
                      <input type="text" name="createDate" id="createDate" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                      <label for="shop_name" class="block text-sm font-medium text-gray-700">店舗名</label>
                      <input type="text" name="shop_name" id="shop_name" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                      <label for="cast_name" class="block text-sm font-medium text-gray-700">キャスト名</label>
                      <input type="text" name="cast_name" id="cast_name" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                      {{-- <select readonly name="cast_name" id="cast_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="">選択してください</option>
                      </select> --}}
                    </div>
                    <div>
                      <label for="course" class="block text-sm font-medium text-gray-700">コース</label>
                      <input type="text" name="course" id="course" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                      {{-- <select name="course" id="course" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="">選択してください</option>
                      </select> --}}
                    </div>
                    <div>
                      <label for="price" class="block text-sm font-medium text-gray-700">料金</label>
                      <input type="number" name="price" id="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                      <label for="point" class="block text-sm font-medium text-gray-700">ポイント</label>
                      <input type="number" name="point" id="point"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                      <label for="point_use" class="block text-sm font-medium text-gray-700">利用ポイント</label>
                      <input type="number" name="point_use" id="point_use"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                  </div>
                  <div class="mt-5 flex justify-end gap-3">
                    <button type="button" class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" onclick="closeEditModal()">
                      キャンセル
                    </button>
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-black shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                      保存
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
  <script>
    // DOMContentLoadedイベントで初期化
    document.addEventListener('DOMContentLoaded', function() {
      // モーダル外クリックで閉じる
      const modalOverlay = document.getElementById('modalOverlay');
      if (modalOverlay) {
        modalOverlay.addEventListener('click', closeEditModal);
      }

      // ESCキーでモーダルを閉じる
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          closeEditModal();
        }
      });
    });
  </script>
  @endpush
</x-admin-layout>
