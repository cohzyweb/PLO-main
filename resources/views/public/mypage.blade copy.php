<x-mypage-layout>
  <div class="mypage">
  <div class="mypage-container p-4 mx-auto max-w-7xl md:p-6">
    <div class="flex flex-col gap-8">
      {{-- Member Info --}}
      <div class="mypage-block relative flex-1 border rounded p-4 leading-relaxed">
        <div class="bg-white">
          <div class="flex items-center mb-6">
              <h3 class="font-bold">会員詳細</h3>
          </div>
          <div class="flex flex-col lg:flex-row gap-4">
            <div>
              会員番号　{{ $member->id }}
            </div>
            <div>ニックネーム　{{ $member->name }}</div>
            <div>登録日　{{ $member->created_at->format('Y-m-d') }}</div>
          </div>
          <div class="absolute right-4 top-4 flex items-center justify-center">
            <button id="show-qr-button" class="flex items-center px-4 py-3 text-sm font-medium  transition ring-1 ring-inset ring-gray-300 rounded-lg  bg-blue-600 text-white  hover:bg-blue-700">
              QRコード表示
            </button>
          </div>
        </div>
      </div>

      {{-- Current Points & Point Usage History --}}
      <div class="mypage-block flex-1 border rounded p-4">
        <div class="bg-white">
          <div class="flex items-center mb-6">
              <h3 class="font-bold">現在のポイント</h3>
          </div>
          <div class="text-center text-3xl font-bold text-gray-800 mb-4">{{ number_format($today_point) }}pt</div>
          <div class="font-bold mb-1">ポイント利用履歴</div>
          <div class="space-y-1">
            @foreach($histories as $history)
              <div>{{ $history->created_at ? \Carbon\Carbon::parse($history->created_at)->format('Y年m月d日') : '' }}　{{ $history->point_pay }}pt（{{ $history->shop_name }}）</div>
            @endforeach
              {{-- <div>2025年7月20日　2,000pt（零）</div>
              <div>2025年6月10日　1,500pt（シロガネオーゼ）</div>
              <div>2025年5月25日　3,000pt（ラブストーリー）</div> --}}
          </div>
        </div>
      </div>

      {{-- Visit History --}}
      <div class="mypage-block flex-1 border rounded p-4">
        <div class="bg-white">

          <div class="flex items-center mb-6">
              <h3 class="font-bold">来店履歴</h3>
          </div>
          @foreach($shop_histories as $shop_history)
              <div class="mb-3 last:mb-0 border-b pb-2 last:border-b-0 last:pb-0">
                  <div class="">来店日　{{ $shop_history->created_at ? \Carbon\Carbon::parse($shop_history->created_at)->format('Y年m月d日') : '' }}</div>
                  <div class="">店舗名　{{ $shop_history->shop_name }}</div>
                  <div class="">遊んだ女の子　{{ $shop_history->casts_name }}</div>
                  <input type="hidden" id="history_id" value="{{ $shop_history->id }}">
                  <div class="w-full text-center mt-4">
                    @if($shop_history->history_id > 0)
                        {{-- Already reviewed --}}
                        <button class="btn-write-review max-w-3xl mx-uto w-full mt-1 py-1 bg-gray-300 text-gray-500 rounded" disabled>クチコミを書く</button>
                    @else
                        <button class="btn-write-review max-w-3xl mx-auto w-full mt-1 py-1 bg-white border border-gray-400 rounded hover:bg-gray-100">クチコミを書く</button>
                    @endif
                  </div>
              </div>
          @endforeach
        </div>
            {{-- View More --}}
            {{-- <div class="text-center">
                <button class="px-6 py-2 bg-white border rounded hover:bg-gray-100 text-sm" id="btn_view">もっと見る</button>
            </div> --}}
      </div>

    </div>

    <!-- QR Code Modal -->
    <div id="qr-modal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
      <div id="qr-modal-content" class="bg-white rounded-lg shadow-xl overflow-hidden flex flex-col" style="max-width: 500px; width: 100%;">
        <div class="flex justify-between items-center p-4 border-b">
          <h3 class="text-lg font-semibold">会員QRコード</h3>
          <button id="close-modal-button" class="text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
          </button>
        </div>
        <div class="p-6 flex-grow flex flex-col items-center justify-center">
            <div class="flex justify-center items-center border-2 border-gray-400 w-full" style="height: 400px; padding: 20px;">
                 <img src="" alt="QRコード" style="width: 100%; height: 100%; object-fit: contain;" id="qrcodeImage">
            </div>
            <p class="mt-4 text-center text-lg">QRコードを読み込んでください</p>
        </div>
        <div class="p-4 border-t flex justify-end bg-gray-50">
          <button id="close-modal-footer-button" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">閉じる</button>
        </div>
      </div>
    </div>

  </div>
  </div>
</x-mypage-layout>
@once
  @vite(['resources/scss/mypage.scss'])
@endonce
<script>
document.addEventListener('DOMContentLoaded', function () {
  const memberId = '{{ $member->id }}';
  const showQrButton = document.getElementById('show-qr-button');
  const qrModal = document.getElementById('qr-modal');
  const qrModalContent = document.getElementById('qr-modal-content');
  const closeModalButton = document.getElementById('close-modal-button');
  const closeModalFooterButton = document.getElementById('close-modal-footer-button');
  const qrcodeImage = document.getElementById('qrcodeImage');

  async function openModal() {
    if (memberId.trim() === '') {
      alert('会員番号がありません');
      return;
    }
    const response = await fetch(`/api/qrcode/${encodeURIComponent(memberId)}`);
    const blob = await response.blob();
    const url = URL.createObjectURL(blob);
    qrcodeImage.src = url;

    // qrcodeImage.src = `/qrcode/${encodeURIComponent(memberId)}`;
    qrModal.style.display = 'flex';
  }

  function closeModal() {
    qrModal.style.display = 'none';
  }

  showQrButton.addEventListener('click', openModal);
  closeModalButton.addEventListener('click', closeModal);
  closeModalFooterButton.addEventListener('click', closeModal);

  // Close modal when clicking outside of the content area
  qrModal.addEventListener('click', function (event) {
    if (!qrModalContent.contains(event.target)) {
      closeModal();
    }
  });

  // Close modal with the Escape key
  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape' && qrModal.style.display === 'flex') {
      closeModal();
    }
  });

  document.querySelectorAll('.btn-write-review').forEach(btn => {
    btn.addEventListener('click', function () {
      const historyId = document.getElementById('history_id').value;
      window.location.href = `/review?history_id=${historyId}`;
    })
  });

  document.getElementById('btn_view').addEventListener('click', function () {

  });
});
</script>

