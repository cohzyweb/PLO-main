<header class="header --{{ $shop->slug }}">
  <div class="header-logo --shizuku lg md sm" id="header-logo">
    <a href="{{ url('/'.$shop->slug) }}">
      {{-- <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="" class="pc-logo"> --}}
      {{-- <img src="{{ asset('assets/img/shop/shizuku/shizuku-logo-lg.svg') }}" alt="" class="pc-logo">
      <img src="{{ asset('assets/img/shop/shizuku/shizuku-logo-sm.svg') }}" alt="" class="sp-logo"> --}}
      <img src="{{ asset('assets/img/shop/logo/'.$shop->slug.'-logo-lg.svg') }}" alt="" class="pc-logo">
      <img src="{{ asset('assets/img/shop/logo/'.$shop->slug.'-logo-md.svg') }}" alt="" class="md-logo">
      <img src="{{ asset('assets/img/shop/logo/'.$shop->slug.'-logo-sm.svg') }}" alt="" class="sp-logo">
    </a>
  </div>
  <div class="header-nav lg">
    {{-- <img src="{{ asset('assets/img/shop/' . 'shizuku' . '/nav-mock.svg') }}" alt=""> --}}
    <div class="header-nav-lists">
      <div class="header-nav-lists-opentime">
        <p>朝8:30〜
        </p>
        <p>予約可能</p>
      </div>
      <div class="header-nav-lists-contact">
        <a href="tel:{{ $shop->tel }}">
          <img src="{{ asset('assets/img/shop/call.png') }}" alt="">
          <span>{{ $shop->tel }}</span>
        </a>
      </div>
      <div class="header-nav-lists-signin">
        @if (Auth::guard('member')->check() || Auth::guard('web')->check())
        <a href="{{ route('logoutAll') }}">
          <img src="{{ asset('assets/img/shop/signout-'.$shop->slug.'.png') }}" alt="">
          <span>ログアウト</span>
        </a>
        @else
        <a href="{{ route('login') }}">
          <img src="{{ asset('assets/img/shop/signin-'.$shop->slug.'.png') }}" alt="">
          <span>ログイン</span>
        </a>
        @endif
      </div>
      <div class="header-nav-lists-signup">
        @if (Auth::guard('member')->check() || Auth::guard('web')->check())
          @if (Auth::guard('member')->check())
          <a href="{{ route('public.group.mypage') }}">
            <img src="{{ asset('assets/img/shop/signup.png') }}" alt="">
            <span>マイページ</span>
          </a>
          @elseif (Auth::guard('web')->check())
          <a href="{{ route('admin.home') }}">
            <img src="{{ asset('assets/img/shop/signup.png') }}" alt="">
            <span>管理者</span>
          </a>
          @endif
        @else
        <a href="{{ route('register') }}">
          <img src="{{ asset('assets/img/shop/signup.png') }}" alt="">
          <span>新規登録</span>
        </a>
        @endif
      </div>
    </div>
  </div>
  <button class="header-toggle" id="drawer-toggle" data-pushbar-target="right">
    <i class="header-toggle-bar"></i>
    <i class="header-toggle-bar"></i>
    <i class="header-toggle-bar"></i>
  </button>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
});
</script>
