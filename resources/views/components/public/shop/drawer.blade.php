<div class="drawer" id="drawer" data-pushbar-id="right" data-pushbar-direction="right">
  <div class="drawer-content active">
    <button class="drawer-close" id="drawer-close"  data-pushbar-close>
      <span></span>
      <span></span>
    </button>
    <nav class="drawer-nav">
      <div class="drawer-nav-lists">
        <ul class="drawer-nav-list">
          <li><a href="{{ route('public.shop.home', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">TOPページ</a></li>
          <li><a href="{{ route('public.shop.schedule', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">出勤情報
          </a></li>
          <li><a href="{{ route('public.shop.event', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">イベント</a></li>
          <li><a href="{{ route('public.shop.castlist', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">キャスト一覧</a></li>
          <li><a href="{{route('public.shop.reviewlist', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">口コミ一覧</a></li>
          @if($shop)
            <li><a href="{{ url('/' . $shop->slug . '/ranking') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">指名ランキング</a></li>
          @else
            <li><a href="{{ url('#') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">指名ランキング</a></li>
          @endif
          <li><a href="{{ route('public.shop.about', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">アクセス情報</a></li>
        </ul>
        <ul class="drawer-nav-list">
          <li><a href="{{ route('public.shop.newslist', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">News情報</a></li>
          <li><a href="{{ route('public.shop.fee',$shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">料金システム</a></li>
          <li><a href="{{ route('public.shop.diarylist', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">写メ日記一覧
          </a></li>
          <li><a href="{{ route('public.shop.movielist', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">MOVIE一覧
          </a></li>
          <li><a href="{{ route('public.group.shop') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">店舗一覧
          </a></li>
          @if(Auth::guard('member')->check())
          <li><a href="{{ route('public.group.mypage') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">マイページ
          </a></li>
          @elseif (Auth::guard('web')->check())
          <li><a href="{{ route('admin.home') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">管理者
          </a></li>
          @endif
          @if (Auth::guard('member')->check() || Auth::guard('web')->check())
          <li><a href="{{ route('logoutAll') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">ログアウト
          </a></li>
          @else
          <li><a href="{{ route('login') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">ログイン
          </a></li>
          @endif
        </ul>
      </div>
      <div class="drawer-nav-bottom">
        <a href="{{ url('/') }}" class="plo-top-link">PLOグループ TOP</a>
      </div>
    </nav>
  </div>
</div>