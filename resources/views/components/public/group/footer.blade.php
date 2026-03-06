{{-- <div class="mock">
  <picture>
    <source media="(max-width: 767px)" srcset="{{ asset('assets/img/mock-footer-sm.png') }}">
    <img src="{{ asset('assets/img/mock-footer-lg.png') }}" alt="">
  </picture>
</div> --}}
{{-- <div class="law">
  <div class="law-content content-wrapper pc-only">
    <p>当グループは、風俗関連営業等の規制及び業務の適正化等に関する法律</p>
    <p>(第27条第2項、第33条第2項)の規定を取得しておりますので安心してお遊び頂けます。</p>
    <p>このサイトにはアダルトコンテンツが含まれています。</p>
    <p>18歳未満の方の閲覧は固くお断りいたします。</p>
  </div>
  <div class="law-content content-wrapper sp-only">
    <p>当グループは、風俗関連営業等の規制及び</p><p>業務の適正化等に関する法律</p>
    <p>(第27条第2項、第33条第2項)の規定</p><p>を取得しておりますので</p><p>安心してお遊び頂けます。</p>
    <p>このサイトには</p><p>アダルトコンテンツが含まれています。</p>
    <p>18歳未満の方の閲覧は固くお断りいたします。</p>
  </div>

</div> --}}
{{-- <div class="shopintro">
  <div class="shopintro-logo">
    <img src="{{ asset('assets/img/group/header/plo-logo.png') }}" alt="logo">
  </div>
  <div class="shopintro-contents content-wrapper">
    <div class="shopintro-contents-item">
      <div class="shopintro-contents-item-photo">
        <div class="shopintro-contents-item-photo-logo">
          <img src="{{ asset('assets/img/logo/shizuku-logo.png') }}" alt="logo">
        </div>
        <img class="shopintro-contents-item-photo-search" src="{{ asset('assets/img/search-b.png') }}" alt="photo">
      </div>
      <div class="shopintro-contents-item-text">
        上品な空間、時を忘れる美貌とおもてなしが魅力のヘルス
      </div>
    </div>
    <div class="shopintro-contents-item">
      <div class="shopintro-contents-item-photo">
        <div class="shopintro-contents-item-photo-logo">
          <img src="{{ asset('assets/img/logo/miyabi-logo.png') }}" alt="logo">
        </div>
        <img class="shopintro-contents-item-photo-search" src="{{ asset('assets/img/search-b.png') }}" alt="photo">
      </div>
      <div class="shopintro-contents-item-text">
        雅は、すすきの屈指の人妻・痴女が左籍するヘルス
      </div>
    </div>
    <div class="shopintro-contents-item">
      <div class="shopintro-contents-item-photo">
        <div class="shopintro-contents-item-photo-logo">
          <img src="{{ asset('assets/img/logo/pussycat-logo.png') }}" alt="logo">
        </div>
        <img class="shopintro-contents-item-photo-search" src="{{ asset('assets/img/search-b.png') }}" alt="photo">
      </div>
      <div class="shopintro-contents-item-text">
        女の子を見て選べる唯一無ニのエンターテイメントヘルス
      </div>
    </div>
    <div class="shopintro-contents-item">
      <div class="shopintro-contents-item-photo">
        <div class="shopintro-contents-item-photo-logo">
          <img src="{{ asset('assets/img/logo/en-logo-r.png') }}" alt="logo">
        </div>
        <img class="shopintro-contents-item-photo-search" src="{{ asset('assets/img/search-b.png') }}" alt="photo">
      </div>
      <div class="shopintro-contents-item-text">
        若妻、人妻、淫乱妻など大人にエロさ嗌れる人妻ヘルス店
      </div>
    </div>
    <div class="shopintro-contents-item">
      <div class="shopintro-contents-item-photo">
        <div class="shopintro-contents-item-photo-logo">
          <img src="{{ asset('assets/img/logo/siroganeze-logo.png') }}" alt="logo">
        </div>
        <img class="shopintro-contents-item-photo-search" src="{{ asset('assets/img/search-b.png') }}" alt="photo">
      </div>
      <div class="shopintro-contents-item-text">
        容姿端麗なオトナ女性による丁寧な本格マッサージ店
      </div>
    </div>
    <div class="shopintro-contents-item">
      <div class="shopintro-contents-item-photo">
        <div class="shopintro-contents-item-photo-logo">
          <img src="{{ asset('assets/img/logo/lovestory-logo.png') }}" alt="logo">
        </div>
        <img class="shopintro-contents-item-photo-search" src="{{ asset('assets/img/search-b.png') }}" alt="photo">
      </div>
      <div class="shopintro-contents-item-text">
        アナタ色のエッチな女の子に育てられる育成型ヘルス
      </div>
    </div>
  </div>
</div> --}}
<div class="scroll-top">
  <a href="#top" id="scroll-top-btn">
    <span class="scroll-top-arrow">↑</span>
  </a>
</div>
<a href="{{ route('public.group.search') }}" class="search-girl">
  <div class="search-girl-content">
    <img src="{{ asset('assets/img/search.png') }}" alt="search">
    <div class="search-girl-content-text">
      <h2>女の子検索</h2>
    </div>
  </div>
</a>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Scroll to top functionality
  const scrollTopBtn = document.getElementById('scroll-top-btn');

  if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', function(e) {
      e.preventDefault();

      // Smooth scroll to top with strong animation
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });

      // Add click animation
      this.style.transform = 'scale(0.9)';
      setTimeout(() => {
        this.style.transform = '';
      }, 150);
    });
  }

  // Show/hide scroll-top button based on scroll position
  window.addEventListener('scroll', function() {
    const scrollTopBtn_1 = document.querySelector('.scroll-top');
    if (scrollTopBtn_1) {
      if (window.pageYOffset > 300) {
        scrollTopBtn_1.style.opacity = '1';
        scrollTopBtn_1.style.visibility = 'visible';
        scrollTopBtn_1.style.transform = 'translateY(0)';
      } else {
        scrollTopBtn_1.style.opacity = '0';
        scrollTopBtn_1.style.visibility = 'hidden';
        scrollTopBtn_1.style.transform = 'translateY(20px)';
      }
    }
  });

  // Initialize scroll-top button state
  const scrollTopBtn_2 = document.querySelector('.scroll-top');
  if (scrollTopBtn_2) {
    scrollTopBtn_2.style.opacity = '0';
    scrollTopBtn_2.style.visibility = 'hidden';
    scrollTopBtn_2.style.transform = 'translateY(20px)';
    scrollTopBtn_2.style.transition = 'all 0.3s ease';
  }
});
</script>
<footer class="footer" id="footer">
  <div class="footer__nav-wrapper">
    <nav class="footer__nav">
      <div class="footer__nav-item"><a href="{{ route('public.group.home') }}">グループTOP</a></div>
      <div class="footer__nav-item"><a href="{{ route('public.group.schedule') }}">出勤情報</a></div>
      <div class="footer__nav-item"><a href="{{ route('public.group.newcomer') }}">新人情報</a></div>
      <div class="footer__nav-item"><a href="{{ route('public.group.shop') }}">店舗一覧</a></div>
      <div class="footer__nav-item"><a href="{{ route('public.group.search') }}">女の子検索</a></div>
      <div class="footer__nav-item"><a href="{{ route('public.group.event') }}">イベント一覧</a></div>
      @if (Auth::guard('web')->check() || Auth::guard('member')->check())
      <div class="footer__nav-item"><a href="{{ route('logoutAll') }}">ログアウト</a></div>
      @else
      <div class="footer__nav-item"><a href="{{ route('login') }}">ログイン</a></div>
      @endif
      @if (Auth::guard('web')->check() || Auth::guard('member')->check())
      @if (Auth::guard('web')->check())
      <div class="footer__nav-item"><a href="{{ route('admin.home') }}">管理画面</a></div>
      @elseif (Auth::guard('member')->check())
      <div class="footer__nav-item"><a href="{{ route('public.group.mypage') }}">マイページ</a></div>
      @endif
      @else
      <div class="footer__nav-item"><a href="{{ route('terms.show') }}">新規会員登録</a></div>
      @endif
      <div class="footer__nav-item"><a href="https://17auto.biz/plogroup/registp/entryform2.htm">メルマガ</a></div>
      <div class="footer__nav-item"><a href="{{ route('public.recruit.female') }}">女性求人</a></div>
      <div class="footer__nav-item"><a href="{{ route('public.recruit.male') }}">男性求人</a></div>
      {{-- <div class="footer__nav-item"><a href="{{ route('public.group.privacy-policy') }}">プライバシーポリシー</a></div> --}}
      <div class="footer__nav-item"><a href="{{ route('public.group.privacy-policy') }}">個人情報保護方針</a></div>
      <div class="footer__nav-item"><a href="mailto:mail@example.com">お問い合わせ</a></div>
      {{-- <div class="footer__nav-item"><a href="{{ route('public.group.home') }}">グループTOP</a></div> --}}
    </nav>
    <div class="footer__nav_logo">
      <img src="{{ asset('assets/img/group/header/plo-logo-w.png') }}" alt="logo">
    </div>
  </div>
  {{-- <div class="footer__nav">
    <div class="footer__nav-item"><a href="{{ route('public.group.privacy-policy') }}">プライバシーポリシー</a></div>
  </div> --}}
  <div class="footer__copyright">
    Copyright © PLO Group All Rights Reserved.
  </div>
</footer>
