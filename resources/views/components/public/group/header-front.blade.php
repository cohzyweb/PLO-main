@if (request()->routeIs('public.group.home'))
<header class="header" id="header">
  <a href="{{ route('public.group.home') }}" class="header-logo sm">
    <img src="{{ asset('assets/img/group/header/plo-logo.png') }}" alt="">
  </a>
  <div class="header-user md lg">
    <div class="header-user-menu">
      <a href="{{ route('public.group.newcomer') }}">
        <small>NEW FACE</small>
        <span class="menu_newface">新人情報</span>
      </a>
      <a href="{{ route('public.group.schedule') }}">
        <small>SCHEDULE</small>
        <span class="menu_schedule">出勤情報</span>
      </a>
      <a href="{{ route('public.group.event') }}">
        <small>EVENT</small>
        <span class="menu_event">イベント情報</span>
      </a>
      <a href="{{ route('public.group.shop') }}">
        <small>SHOP</small>
        <span class="menu_shop">店舗一覧</span>
      </a>
    </div>
    <div class="header-user-logbox">
    @if (Auth::guard('member')->check() || Auth::guard('web')->check())
    {{-- <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" id="logoutAll">
        <small>LOGOUT</small>
        <span>ログアウト</span>
      </button>
    </form>
 --}}
    <a href="{{ route('logoutAll') }}">
        <small>LOGOUT</small>
        <span>ログアウト</span>
      </a>
      @if (Auth::guard('member')->check())
      <div class="header-user-logbox-last">
        <span></span>
        <a href="{{ route('public.group.mypage') }}">
          <small>MYPAGE</small>
          <span>マイページ</span>
        </a>
      </div>
      @elseif (Auth::guard('web')->check())
      <div class="header-user-logbox-last">
        <span></span>
        <a href="{{ route('admin.home') }}">
          <small>MANAGER</small>
          <span>管理者</span>
        </a>
      </div>
      @endif
    @else
      <a href="{{ route('login') }}">
        <small>LOGIN</small>
        <span>ログイン</span>
      </a>
      <div class="header-user-logbox-last">
        <span></span>
        <a href="{{ route('terms.show') }}">
          <small>SIGN UP</small>
          <span>新規登録</span>
        </a>
      </div>
    @endif
    </div>
  </div>

</header>
@else
<header class="header-child" id="header">
  <a href="{{ route('public.group.home') }}" class="header-child-logo sm">
    <img src="{{ asset('assets/img/group/header/plo-logo.png') }}" alt="">
  </a>
  <div class="header-child-user md lg">
    <div class="header-child-user-logo">
      <img src="{{ asset('assets/img/group/header/plo-logo.png') }}" alt="">
    </div>
    <div class="header-child-user-menu">
      <a href="{{ route('public.group.home') }}">
        <small>TOP</small>
        <span class="menu_top">トップページ</span>
      </a>
      <a href="{{ route('public.group.newcomer') }}">
        <small>NEW FACE</small>
        <span class="menu_newface">新人情報</span>
      </a>
      <a href="{{ route('public.group.schedule') }}">
        <small>SCHEDULE</small>
        <span class="menu_schedule">出勤情報</span>
      </a>
      <a href="{{ route('public.group.home') }}" class="header-child-user-menu-logo">
        <small>plo</small>
        <span class="menu_schedule">plo</span>
        {{-- <div class="header-child-user-menu-logo-img">
          <img src="{{ asset('assets/img/group/header/plo-logo.png') }}" alt="">
        </div> --}}
      </a>
      <a href="{{ route('public.group.event') }}">
        <small>EVENT</small>
        <span class="menu_event">イベント情報</span>
      </a>
      <a href="{{ route('public.group.shop') }}">
        <small>SHOP</small>
        <span class="menu_shop">店舗一覧</span>
      </a>
    </div>
    <div class="header-child-user-logbox">
    @if (Auth::guard('member')->check() || Auth::guard('web')->check())
    {{-- <form action="{{ route('logoutAll') }}" method="POST">
      @csrf
      <button type="submit" id="logoutAll">
        <small>LOGOUT</small>
        <span>ログアウト</span>
      </button>
    </form> --}}
    <a href="{{ route('logoutAll') }}">
        <small>LOGOUT</small>
        <span>ログアウト</span>
      </a>
      @if (Auth::guard('member')->check())
      {{-- <div class="header-child-user-logbox-last">
        <span></span> --}}
        <a href="{{ route('public.group.mypage') }}">
          <small>MYPAGE</small>
          <span>マイページ</span>
        </a>
      {{-- </div> --}}
      @elseif (Auth::guard('web')->check())
      {{-- <div class="header-child-user-logbox-last"> --}}
        <span></span>
        <a href="{{ route('admin.home') }}">
          <small>MANAGER</small>
          <span>管理者</span>
        </a>
      {{-- </div> --}}
      @endif
    @else
      <a href="{{ route('login') }}">
        <small>LOGIN</small>
        <span>ログイン</span>
      </a>
      {{-- <div class="header-child-user-logbox-last">
        <span></span> --}}
        <a href="{{ route('terms.show') }}">
          <small>SIGN UP</small>
          <span>新規登録</span>
        </a>
      {{-- </div> --}}
    @endif
    </div>
  </div>  
</header>
@endif
@if (request()->routeIs('public.group.home'))
<button class="drawer-toggle" id="drawer-toggle" data-pushbar-target="right">
  <div class="drawer-toggle-bars">
    <span class="drawer-toggle-bar"></span>
    <span class="drawer-toggle-bar"></span>
    <span class="drawer-toggle-bar"></span>
  </div>
  <span class="drawer-toggle-menu rainbow-text">MENU</span>
</button>
@else
<button class="drawer-toggle-child" id="drawer-toggle" data-pushbar-target="right">
  <div class="drawer-toggle-bars">
    <span class="drawer-toggle-bar"></span>
    <span class="drawer-toggle-bar"></span>
    <span class="drawer-toggle-bar"></span>
  </div>
  <span class="drawer-toggle-menu rainbow-text">MENU</span>
</button>
@endif