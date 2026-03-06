@php
  $isGroupsHome = request()->routeIs('public.group.home')
      || request()->routeIs('public.groups.home')
      || request()->routeIs('public.group.home-v2')
      || request()->routeIs('public.groups.home-v2');
@endphp

@if ($isGroupsHome)
<header class="header" id="header">
  <a href="{{ route('public.groups.home') }}" class="header-logo sp-only">
    <img src="{{ asset('assets/img/groups/plo-logo.png') }}" alt="">
  </a>
  <div class="header-user pc-only">
    {{-- <div class="header-user md lg"> --}}
    <div class="header-user-menu">
      <a href="{{ route('public.groups.newface') }}">
        <small>New Face</small>
        <span class="menu_newface">新人情報</span>
      </a>
      <a href="{{ route('public.groups.schedule') }}">
        <small>SCHEDULE</small>
        <span class="menu_schedule">出勤情報</span>
      </a>
      <a href="{{ route('public.groups.event') }}">
        <small>EVENT</small>
        <span class="menu_event">イベント情報</span>
      </a>
      <a href="{{ route('public.groups.shop') }}">
        <small>SHOP</small>
        <span class="menu_shop">店舗一覧</span>
      </a>
      <a href="{{ route('login') }}">
        <small>LOGIN</small>
        <span>ログイン</span>
      </a>

    </div>
    {{-- <div class="header-user-logbox">
    @if (Auth::guard('member')->check() || Auth::guard('web')->check()) --}}
    {{-- <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" id="logoutAll">
        <small>LOGOUT</small>
        <span>ログアウト</span>
      </button>
    </form>
 --}}
    {{-- <a href="{{ route('logoutAll') }}">
        <small>LOGOUT</small>
        <span>ログアウト</span>
      </a> --}}
      {{-- @if (Auth::guard('member')->check())
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
      @endif --}}
    {{-- @else
      <a href="{{ route('login') }}">
        <small>LOGIN</small>
        <span>ログイン</span>
      </a> --}}
      {{-- <div class="header-user-logbox-last">
        <span></span>
        <a href="{{ route('terms.show') }}">
          <small>SIGN UP</small>
          <span>新規登録</span>
        </a>
      </div> --}}
    {{-- @endif
    </div> --}}
  </div>
  @if ($isGroupsHome)
  <button class="drawer-toggle" id="drawer-toggle">
    <div class="drawer-toggle-bars">
      <span class="drawer-toggle-bar"></span>
      <span class="drawer-toggle-bar"></span>
      <span class="drawer-toggle-bar"></span>
    </div>
    <span class="drawer-toggle-menu rainbow-text">Menu</span>
  </button>
  @else
  <button class="drawer-toggle-child" id="drawer-toggle" data-pushbar-target="right">
    <div class="drawer-toggle-bars">
      <span class="drawer-toggle-bar"></span>
      <span class="drawer-toggle-bar"></span>
      <span class="drawer-toggle-bar"></span>
    </div>
    <span class="drawer-toggle-menu rainbow-text">Menu</span>
  </button>
  @endif
</header>

<!-- Groups Menu Overlay Component (for home page) -->
@if ($isGroupsHome)
<x-public.groups.menu-overlay
    :menu-links="[
        'top' => route('public.groups.home'),
        'new' => route('public.groups.newface'),
        'shop' => route('public.groups.shop'),
        'schedule' => route('public.groups.schedule'),
        'pickup' => route('public.groups.pickup'),
        'diary' => route('public.groups.photodiary'),
        'login' => route('login'),
        'register' => route('register'),
        'news' => '#',
        'movie' => route('public.groups.movie'),
        'event' => route('public.groups.event'),
        'recruit-female' => route('public.recruit.female'),
        'recruit-male' => route('public.recruit.male'),
    ]"
    :bottom-buttons="[
        'group' => route('public.groups.home'),
        'recruit' => route('public.recruit.male'),
    ]"
    :bottom-button-images="[
        'group' => 'assets/img/shops/shizuku/plo-group-btn.png',
        'recruit' => 'assets/img/shops/shizuku/recruit-btn.png',
    ]"
/>
@endif

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
  @if ($isGroupsHome)
  <button class="drawer-toggle" id="drawer-toggle">
    <div class="drawer-toggle-bars">
      <span class="drawer-toggle-bar"></span>
      <span class="drawer-toggle-bar"></span>
      <span class="drawer-toggle-bar"></span>
    </div>
    <span class="drawer-toggle-menu rainbow-text">Menu</span>
  </button>
  @else
  <button class="drawer-toggle-child" id="drawer-toggle" data-pushbar-target="right">
    <div class="drawer-toggle-bars">
      <span class="drawer-toggle-bar"></span>
      <span class="drawer-toggle-bar"></span>
      <span class="drawer-toggle-bar"></span>
    </div>
    <span class="drawer-toggle-menu rainbow-text">Menu</span>
  </button>
  @endif
</header>
@endif
{{-- @if (request()->routeIs('public.groups.home'))
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
@endif --}}
