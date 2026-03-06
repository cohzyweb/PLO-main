<div class="mv">
  <div class="mv-main">
    {{-- <img src="{{ asset('assets/img/shop/' . $shop->slug . '/mv/main-sm.jpg') }}" alt="" class="sp-only">
    <img src="{{ asset('assets/img/shop/' . $shop->slug . '/mv/main-lg.jpg') }}" alt="" class="pc-only"> --}}
    @if(request()->routeIs('public.shop.newslist') || request()->routeIs('public.shop.newsdetail'))
    <img src="{{ asset('assets/img/shop/mv/news.jpg') }}" alt="" class="sp-only">
    <img src="{{ asset('assets/img/shop/mv/news.jpg') }}" alt="" class="pc-only">
    @elseif(request()->routeIs('public.shop.diarylist') || request()->routeIs('public.shop.diarydetail'))
    <img src="{{ asset('assets/img/shop/mv/diary.jpg') }}" alt="" class="sp-only">
    <img src="{{ asset('assets/img/shop/mv/diary.jpg') }}" alt="" class="pc-only">
    @elseif(request()->routeIs('public.shop.castlist'))
    <img src="{{ asset('assets/img/shop/mv/cast.jpg') }}" alt="" class="sp-only">
    <img src="{{ asset('assets/img/shop/mv/cast.jpg') }}" alt="" class="pc-only">
    @elseif(request()->routeIs('public.shop.event') || request()->routeIs('public.shop.event.detail'))
    <img src="{{ asset('assets/img/shop/mv/event.jpg') }}" alt="" class="sp-only">
    <img src="{{ asset('assets/img/shop/mv/event.jpg') }}" alt="" class="pc-only">
    @elseif(request()->routeIs('public.shop.schedule'))
    <img src="{{ asset('assets/img/shop/mv/schedule.jpg') }}" alt="" class="sp-only">
    <img src="{{ asset('assets/img/shop/mv/schedule.jpg') }}" alt="" class="pc-only">
    @elseif(request()->routeIs('public.shop.about'))
    <img src="{{ asset('assets/img/shop/mv/address.jpg') }}" alt="" class="sp-only">
    <img src="{{ asset('assets/img/shop/mv/address.jpg') }}" alt="" class="pc-only">
    @elseif(request()->routeIs('public.shop.movielist'))
    <img src="{{ asset('assets/img/shop/mv/movie.jpg') }}" alt="" class="sp-only">
    <img src="{{ asset('assets/img/shop/mv/movie.jpg') }}" alt="" class="pc-only">
    @elseif(request()->routeIs('public.shop.reviewlist'))
    <img src="{{ asset('assets/img/shop/mv/review.jpg') }}" alt="" class="sp-only">
    <img src="{{ asset('assets/img/shop/mv/review.jpg') }}" alt="" class="pc-only">
    @else
    <img src="{{ asset('assets/img/shop/mv/'.$shop->slug.'-sm.jpg') }}" alt="" class="sp-only">
    <img src="{{ asset('assets/img/shop/mv/'.$shop->slug.'-lg.jpg') }}" alt="" class="pc-only">
    @endif
  </div>
</div>

<style>
.sp-only {
  display: none;
}
.pc-only {
  display: block;
}
@media (max-width: 767px) {
  .sp-only {
    display: block;
  }
  .pc-only {
    display: none;
  }
}
</style>
