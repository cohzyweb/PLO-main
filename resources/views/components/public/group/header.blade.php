<header class="header" id="header">
  <a href="{{ route('public.group.home') }}" class="header-logo sm">
    <img src="{{ asset('assets/img/group/header/logo.png') }}" alt="">
  </a>
  <div class="header-user md lg">
    @if (Auth::guard('member')->check() || Auth::guard('web')->check())
    <a href="{{ route('logoutAll') }}">
      <span>ログアウト</span>
    </a>
    @else
    <a href="{{ route('login') }}">
      <span>LOGIN</span>
    </a>
    @endif
    <a href="#">
      <span>SIGN UP</span>
    </a>
  </div>
  <button class="drawer-toggle" id="drawer-toggle">
    <i class="drawer-toggle-bar"></i>
    <i class="drawer-toggle-bar"></i>
    <i class="drawer-toggle-bar"></i>
  </button>
</header>
