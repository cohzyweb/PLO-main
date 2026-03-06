<div class="drawer" id="drawer" data-pushbar-id="right" data-pushbar-direction="right">
  <button class="drawer-toggle active" data-pushbar-close>
    <div class="drawer-toggle-bars">
      <span class="drawer-toggle-bar"></span>
      <span class="drawer-toggle-bar"></span>
      <span class="drawer-toggle-bar"></span>
    </div>
    <span class="drawer-toggle-menu rainbow-text">Menu</span>
  </button>
  <nav class="drawer-nav">
    <ul>
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">TOP</span>
        <a href="{{ route('public.group.home') }}" class="drawer-nav-ja">ホーム</a>
      </li>
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">SHOP LIST</span>
        <a href="{{ route('public.group.shop') }}" class="drawer-nav-ja">店舗一覧</a>
      </li>
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">SCHEDULE</span>
        <a href="{{ route('public.group.schedule') }}" class="drawer-nav-ja">出勤情報</a>
      </li>
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">NEW FACE</span>
        <a href="{{ route('public.group.newcomer') }}" class="drawer-nav-ja">新人情報</a>
      </li>
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">EVENT LIST</span>
        <a href="{{ route('public.group.event') }}" class="drawer-nav-ja">イベント一覧</a>
      </li>
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">SEARCH</span>
        <a href="{{ route('public.group.search') }}" class="drawer-nav-ja">女の子検索ページ</a>
      </li>
      @if (Auth::guard('member')->check())
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">MYPAGE</span>
        <a href="{{ route('public.group.mypage') }}" class="drawer-nav-ja">マイページ</a>
      </li>
      @else
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">SIGN UP</span>
        <a href="{{ route('terms.show') }}" class="drawer-nav-ja">新規登録</a>
      </li>
      @endif
      @if(Auth::guard('web')->check() || Auth::guard('member')->check())
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">LOGOUT</span>
        <a href="{{ route('logoutAll') }}" class="drawer-nav-ja">ログアウト</a>
      </li>
      @else
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">LOGIN</span>
        <a href="{{ route('login') }}" class="drawer-nav-ja">ログイン</a>
      </li>
      @endif
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">NEWSLETTER</span>
        <a href="https://17auto.biz/plogroup/registp/entryform2.htm" target="_blank" class="drawer-nav-ja">メルマガ</a>
      </li>

      <li class="drawer-nav-item">
        <span class="drawer-nav-en">RECRUIT</span>
        <a href="{{ route('public.recruit.female') }}" class="drawer-nav-ja">女性求人ページ</a>
      </li>
      <li class="drawer-nav-item">
        <span class="drawer-nav-en"></span>
        <a href="{{ route('public.recruit.male') }}" class="drawer-nav-ja">男性求人ページ</a>
      </li>
      {{-- <li class="drawer-nav-item">
        <span class="drawer-nav-en">PRIVACY POLICY</span>
        <a href="{{ route('public.group.privacy-policy') }}" class="drawer-nav-ja">プライバシー<br class="sm">ポリシー</a>
      </li> --}}
      <li class="drawer-nav-item">
        <span class="drawer-nav-en">CONTACT</span>
        <a href="mailto:mail@example.com" target="_blank" class="drawer-nav-ja">お問い合わせ</a>
      </li>

    </ul>
  </nav>
  {{-- <div class="drawer-img md lg">
    <img src="{{ asset('assets/img/group/drawer/img.jpg') }}" alt="">
  </div> --}}
</div>
