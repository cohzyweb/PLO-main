<footer class="footer --{{ $shop->slug }}" id="footer">
  <div class="footer__nav-wrapper">
    <nav class="footer__nav">
      <div class="footer__nav-item"><a href="{{ route('public.shop.home', $shop->slug)}}">店舗TOP</a></div>
      <div class="footer__nav-item"><a href="{{ route('public.shop.schedule', $shop->slug)}}">出勤情報</a></div>
      <div class="footer__nav-item"><a href="{{ route('public.shop.fee', $shop->slug)}}">料金システム</a></div>
      <div class="footer__nav-item"><a href="{{ route('public.shop.castlist', $shop->slug)}}">キャスト一覧</a></div>
      <div class="footer__nav-item"><a href="{{ route('public.shop.newslist', $shop->slug)}}">最新情報</a></div>
      <div class="footer__nav-item"><a href="#">SNS</a></div>
      {{-- <div class="footer__nav-item"><a href="{{ route('public.shop.castlist', $shop->slug) }}">キャスト一覧</a></div> --}}
      <div class="footer__nav-item"><a href="{{ url('shop')}}">店舗一覧</a></div>
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
      <div class="footer__nav-item"><a href="{{ url('https://hokkaido-tohoku.qzin.jp/group/hinaShizuku/1/') }}">女性求人</a></div>
      <div class="footer__nav-item"><a href="">男性求人</a></div>
      <div class="footer__nav-item"><a href="{{ url('/privacy-policy') }}">個人情報保護方針</a></div>
      <div class="footer__nav-item"><a href="{{ url('/') }}">グループTOP</a></div>
      {{-- <div class="footer__nav-item"><a href="{{ route('public.group.home') }}">グループTOP</a></div> --}}
    </nav>
    <div class="footer__nav_logo">
      {{-- <img src="{{ asset('assets/img/shop/footer.svg') }}" alt="logo"> --}}
      <img src="{{ asset('assets/img/shop/logo/'.$shop->slug.'-logo.png') }}" alt="logo">
    </div>
  </div>
  <div class="footer__copyright">
    Copyright © PLO Group All Rights Reserved.
  </div>


  {{-- <div class="footer-content">
    <div class="footer-nav">
      <ul class="footer-nav-list">
        <li><a href="{{ url('#')}}">HOME</a></li>
        <li><a href="{{ url('#')}}">最新情報</a></li>
        <li><a href="{{ route('public.shop.fee', $shop->slug) }}">料金システム</a></li>
        <li><a href="{{ route('public.shop.castlist', $shop->slug) }}">キャスト一覧</a></li>
        <li><a href="{{ url('shop')}}">店舗一覧</a></li>
        <li><a href="{{ url('https://hokkaido-tohoku.qzin.jp/group/hinaShizuku/1/')}}">求人情報</a></li>
        <li><a href="{{ url('/privacy-policy') }}">個人情報保護方針</a></li>
        <li><a href="{{ url('/') }}">グループTOP</a></li>
      </ul>
    </div>
    <div class="footer-logo">
      <img src="{{ asset('assets/img/shop/footer.svg') }}" alt="PLO Group">
    </div>
  </div>
  <div class="footer-copyright">
    <p>Copyright © PLO Group All Rights Reserved.</p>
  </div> --}}
</footer>
