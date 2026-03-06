<nav class="bottom-nav">
    <div class="bottom-nav__container shop-nav">
        <a href="{{ route('public.shop.home', $shop->slug) }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/home.png') }}" alt="">
            <span class="bottom-nav__button__text">Home</span>
        </a>
        <a href="{{ route('public.shop.schedule', $shop->slug) }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/schedule.png') }}" alt="">
            <span class="bottom-nav__button__text">出勤</span>
        </a>
        <a href="{{ route('public.shop.fee',$shop->slug) }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/system.png') }}" alt="">
            <span class="bottom-nav__button__text">システム</span>
        </a>
        @if (Auth::guard('member')->check() || Auth::guard('web')->check())

          @if (Auth::guard('member')->check())
          <a href="{{ route('public.group.mypage') }}" class="bottom-nav__button group">
              <img src="{{ asset('assets/img/group/bottom-nav/user.png') }}" alt="">
              <span class="bottom-nav__button__text">マイページ</span>
          </a>
          @endif
          @if (Auth::guard('web')->check())
          <a href="{{ route('admin.home') }}" class="bottom-nav__button group">
              <img src="{{ asset('assets/img/group/bottom-nav/user.png') }}" alt="">
              <span class="bottom-nav__button__text">管理者</span>
          </a>
          @endif
        @else
        <a href="{{ route('login') }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/login.png') }}" alt="">
            <span class="bottom-nav__button__text">ログイン</span>
        </a>
        @endif
        {{-- <a href="{{ route('public.group.newcomer') }}" class="bottom-nav__button group">
            <img src="{{ asset('assets/img/group/bottom-nav/newgirl.png') }}" alt="">
            <span class="bottom-nav__button__text">マイページ</span>
        </a> --}}
    </div>
    
    <div class="tel-link-container">
      <a href="tel:{{ $shop->tel }}" class="tel-link --{{ $shop->slug }}">
        <img src="{{ asset('assets/img/shop/TEL-y.png') }}" alt="電話" class="tel-icon">
      </a>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
  
});
</script>