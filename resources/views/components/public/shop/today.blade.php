<a
  href="{{ route('public.shop.cast.profile', ['shop' => $cast->shop_slug, 'id' => $cast->id]) }}"
  class="today-item"
>
  <div class="today-photo">
    <img src="{{ asset('storage/' . $cast->gallery_1) }}" alt="{{ $cast->name }}">
    <div class="today-status --{{ $cast->shop_slug }}">
      <img src="{{ asset('assets/img/shop/clock-icon-y.png') }} " class="pc-only" alt="本日出勤">
      <span class="today-status-label pc-only">本日出勤</span>
      <span class="today-status-label sp-only">出勤</span>
      <span class="today-status-time --{{ $cast->shop_slug }}">{{ date('H:i', strtotime($cast->start_datetime)) }} ～ {{ date('H:i', strtotime($cast->end_datetime)) }}</span>
    </div>
    <div class="today-profile pc-only">
      <span class="today-profile-schedule">
        <img src="{{ asset('assets/img/shop/clock-icon-y.png') }}" alt="移動時間のみ">
        待機中
      </span>
      <span class="today-profile-name">
        <img src="{{ asset('assets/img/shop/star-w.png') }}" alt="移動時間のみ">
        {{ $cast->name }}({{ $cast->age }})
      </span>
      <span class="today-profile-size ">
        <img src="{{ asset('assets/img/shop/heart-w.png') }}" alt="移動時間のみ">
        T{{ $cast->height }} B{{ $cast->bust }} W{{ $cast->waist }} H{{ $cast->hip }}
      </span>
    </div>
    <div class="today-profile-sp sp-only">
      <span class="today-profile-sp-name --{{ $cast->shop_slug }}">
        {{-- <img src="{{ asset('assets/img/shop/star-w.png') }}" alt="移動時間のみ"> --}}
        {{ $cast->name }}({{ $cast->age }})
      </span>
      <span class="today-profile-sp-size ">
        {{-- <img src="{{ asset('assets/img/shop/heart-w.png') }}" alt="移動時間のみ"> --}}
        T{{ $cast->height }} B{{ $cast->bust }} W{{ $cast->waist }} H{{ $cast->hip }}
      </span>
    </div>
    {{-- <div class="today-hover">
      <div class="today-hover-name">
          {{ $cast->name }}
      </div>
      <div class="today-hover-appeal --{{ $cast->shop_slug }}">
        <div class="today-hover-appeal-content">
          {{ $cast->appeal_point }}
        </div>
      </div>
    </div> --}}
  </div>
  {{-- <div class="today-status --{{ $cast->shop_slug }}">
    <img src="{{ asset('assets/img/shop/clock-icon-y.png') }}" alt="本日出勤">
    <span class="today-status-label">本日出勤</span>
    <span class="today-status-time --{{ $cast->shop_slug }}">{{ date('H:i', strtotime($cast->start_datetime)) }} ～ {{ date('H:i', strtotime($cast->end_datetime)) }}</span>
  </div> --}}
  {{-- <div class="today-profile">
    <span class="today-profile-schedule">
      <img src="{{ asset('assets/img/shop/clock-icon-y.png') }}" alt="移動時間のみ">
      移動時間のみ
    </span>
    <span class="today-profile-name">
      <img src="{{ asset('assets/img/shop/star-w.png') }}" alt="移動時間のみ">
      {{ $cast->name }}({{ $cast->age }})
    </span>
    <span class="today-profile-size ">
      <img src="{{ asset('assets/img/shop/heart-w.png') }}" alt="移動時間のみ">
      T{{ $cast->height }} B{{ $cast->bust }} W{{ $cast->waist }} H{{ $cast->hip }}
    </span>
  </div> --}}
  {{-- <ul class="today-tags">
    @foreach ($cast->personalities as $personality)
      <li class="today-tag">
        {{ $personality->name }}
      </li>
    @endforeach
    @foreach ($cast->styles as $style)
      <li class="today-tag">
        {{ $style->name }}
      </li>
    @endforeach
  </ul> --}}
</a>
