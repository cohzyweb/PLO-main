<header class="header --{{ $shop->slug }}">
  <div class="header-logo --shizuku lg md sm" id="header-logo">
    <a href="{{ url('/'.$shop->slug) }}">
      {{-- <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="" class="pc-logo"> --}}
      {{-- <img src="{{ asset('assets/img/shop/shizuku/shizuku-logo-lg.svg') }}" alt="" class="pc-logo">
      <img src="{{ asset('assets/img/shop/shizuku/shizuku-logo-sm.svg') }}" alt="" class="sp-logo"> --}}
      {{-- <img src="{{ asset('assets/img/shop/logo/'.$shop->slug.'-logo-lg.svg') }}" alt="" class="pc-logo">
      <img src="{{ asset('assets/img/shop/logo/'.$shop->slug.'-logo-md.svg') }}" alt="" class="md-logo">
      <img src="{{ asset('assets/img/shop/logo/'.$shop->slug.'-logo-sm.svg') }}" alt="" class="sp-logo"> --}}
      <img src="{{ asset('assets/img/shop/logo/'.$shop->slug.'-logo.png') }}" alt="" class="">
    </a>
  </div>
  <div class="header-nav">
    <a class="header-nav-item" href="{{ url('/'.$shop->slug) }}">
      <div class="header-nav-item-icon">
        <img src="{{ asset('assets/img/group/bottom-nav/home-w.png') }}" alt="">
      </div>
      <div class="header-nav-item-text">
        <span>ホーム</span>
      </div>
    </a>
    <a class="header-nav-item" href="{{ route('public.shop.schedule', ['shop' => $shop->slug]) }}">
      <div class="header-nav-item-icon">
        <img src="{{ asset('assets/img/group/bottom-nav/schedule-w.png') }}" alt="">
      </div>
      <div class="header-nav-item-text">
        <span>出勤</span>
      </div>
    </a>
    <a class="header-nav-item" href="{{ route('public.shop.fee', ['shop' => $shop->slug]) }}">
      <div class="header-nav-item-icon">
        <img src="{{ asset('assets/img/group/bottom-nav/system-w.png') }}" alt="">
      </div>
      <div class="header-nav-item-text">
        <span>システム</span>
      </div>
    </a>
    <a class="header-nav-item" href="{{ route('public.shop.newcomer', ['shop' => $shop->slug]) }}">
      <div class="header-nav-item-icon">
        <img src="{{ asset('assets/img/group/bottom-nav/newgirl-w.png') }}" alt="">
      </div>
      <div class="header-nav-item-text">
        <span>新人</span>
      </div>
    </a>
    @if (Auth::guard('member')->check() || Auth::guard('web')->check())
    <a class="header-nav-item" href="{{ route('logoutAll') }}">
      <div class="header-nav-item-icon">
        <img src="{{ asset('assets/img/group/bottom-nav/logout-w.png') }}" alt="">
      </div>
      <div class="header-nav-item-text">
        <span>ログアウト</span>
      </div>
    </a>
    @else
    <a class="header-nav-item" href="{{ route('login') }}">
      <div class="header-nav-item-icon">
        <img src="{{ asset('assets/img/group/bottom-nav/login-w.png') }}" alt="">
      </div>
      <div class="header-nav-item-text">
        <span>ログイン</span>
      </div>
    </a>
    @endif
    {{-- <img src="{{ asset('assets/img/shop/' . 'shizuku' . '/nav-mock.svg') }}" alt=""> --}}
    {{-- <div class="header-nav-lists">
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
    </div> --}}
    <button class="header-toggle" id="drawer-toggle" data-pushbar-target="right">
      <i class="header-toggle-bar"></i>
      <i class="header-toggle-bar"></i>
      <i class="header-toggle-bar"></i>
    </button>
  
  </div>
  {{-- <button class="header-toggle" id="drawer-toggle" data-pushbar-target="right">
    <i class="header-toggle-bar"></i>
    <i class="header-toggle-bar"></i>
    <i class="header-toggle-bar"></i>
  </button> --}}
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
});
</script>
