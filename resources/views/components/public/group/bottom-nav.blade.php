<nav class="bottom-nav">
    <div class="bottom-nav__container">
        <a href="{{ route('public.group.home') }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/home.png') }}" alt="">
            <span class="bottom-nav__button__text">Top</span>
        </a>
        <a href="{{ route('public.group.shop') }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/shop.png') }}" alt="">
            <span class="bottom-nav__button__text">店舗</span>
        </a>
        <a href="{{ route('public.group.schedule') }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/schedule.png') }}" alt="">
            <span class="bottom-nav__button__text">出勤</span>
        </a>
        <a href="{{ route('public.group.newcomer') }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/newgirl.png') }}" alt="">
            <span class="bottom-nav__button__text">新人</span>
        </a>
        @if (Auth::guard('member')->check() || Auth::guard('web')->check())
        {{-- <a href="{{ route('logoutAll') }}" class="bottom-nav__button group">
          <img src="{{ asset('assets/img/group/bottom-nav/logout.png') }}" alt="">
          <span class="bottom-nav__button__text">ログアウト</span>
        </a> --}}

          @if (Auth::guard('member')->check())
          <a href="{{ route('public.group.mypage') }}" class="bottom-nav__button group">
              <img src="{{ asset('assets/img/group/bottom-nav/newgirl.png') }}" alt="">
              <span class="bottom-nav__button__text">マイページ</span>
          </a>
          @endif
          @if (Auth::guard('web')->check())
          <a href="{{ route('admin.home') }}" class="bottom-nav__button group">
              <img src="{{ asset('assets/img/group/bottom-nav/newgirl.png') }}" alt="">
              <span class="bottom-nav__button__text">管理者</span>
          </a>
          @endif
        @else
        <a href="{{ route('login') }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/login.png') }}" alt="">
            <span class="bottom-nav__button__text">ログイン</span>
        </a>
        @endif
        @if (Auth::guard('member')->check() || Auth::guard('web')->check())
         @if (Auth::guard('member')->check())
          <button class="bottom-nav__button group" id="show-qr-button">
            <img src="{{ asset('assets/img/group/bottom-nav/qr.png') }}" alt="">
            <span class="bottom-nav__button__text">QR</span>
          </button>
          @endif
          {{-- @if (Auth::guard('web')->check())
          <a href="{{ route('admin.home') }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/user.png') }}" alt="">
            <span class="bottom-nav__button__text">管理者</span>
          </a>
          @endif --}}
        @else
        <a href="{{ route('register') }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/user.png') }}" alt="">
            <span class="bottom-nav__button__text">新規登録</span>
        </a>
        @endif
    </div>
</nav>
<!-- QR Code Modal -->
<div id="qr-modal" style="display: none;" class="qr-modal">
    <div id="qr-modal-content" class="qr-modal-content">
    <div class="qr-modal-header">
        <h3 class="qr-modal-title">会員QRコード</h3>
        <button id="close-modal-button" class="qr-modal-close-button">
        <svg class="qr-modal-close-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
    <div class="qr-modal-body">
        <div class="qr-modal-image-container">
            <img src="" alt="QRコード" class="qr-modal-image" id="qrcodeImage">
        </div>
        <p class="qr-modal-text">QRコードを読み込んでください</p>
    </div>
    <div class="qr-modal-footer">
        <button id="close-modal-footer-button" class="qr-modal-close-footer-button">閉じる</button>
    </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  @if(Auth::guard('member')->check())
  const memberId = '{{ Auth::guard('member')->user()->id }}';
  @else
  const memberId = null;
  @endif
  if (memberId) {
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
  }
});
</script>