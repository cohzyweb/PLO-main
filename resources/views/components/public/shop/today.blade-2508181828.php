<a
  href="{{ route('public.shop.cast.profile', ['shop' => $cast->shop_slug, 'id' => $cast->id]) }}"
  class="today-item"
>
  <div class="today-item-left pc-only">
    <div class="today-item-left-image">
      <img src="{{ asset('storage/' . $cast->gallery_1) }}" alt="{{ $cast->name }}">
    </div>
    <div class="today-item-left-contents-hr">

    </div>
    <div class="today-item-left-contents">
      <div class="today-item-left-contents-date">
          <img src="{{ asset('assets/img/shop/calender-y.png') }}" alt="Today Schedule">
        {{ $cast->created_at->format('Y:m:d')." 入店" }}
      </div>
      <div class="today-item-left-contents-name">
        <img src="{{ asset('assets/img/shop/star-w.png') }}" alt="Name">
        {{ $cast->name."(".$cast->age.")" }}
      </div>
      <div class="today-item-left-contents-size">
        <img src="{{ asset('assets/img/shop/heart-w.png') }}" alt="Size">
        {{ "T:" . $cast->height." B:".$cast->bust." W:".$cast->waist." H:".$cast->hip }}
      </div>
      <div class="today-item-left-contents-note --{{ $cast->shop_slug }}">
        <div class="new-girls-item-left-contents-note-memo">
          {{ $cast->appeal_point }}
        </div>
        <div class="today-item-left-contents-note-comment">
          {{ $cast->manager_comment }}
        </div>
      </div>
    </div>
  </div>
  <div class="today-item-right pc-only">
    <div class="today-item-right-name --{{ $cast->shop_slug }}">
      {{ $cast->name }}
    </div>
    <div class="today-item-right-image">
      <img src="{{ asset('storage/' . $cast->gallery_1) }}" alt="{{ $cast->name }}">
    </div>
  </div>
  <div class="today-photo sp-only">
    <img src="{{ asset('storage/' . $cast->gallery_1) }}" alt="{{ $cast->name }}">
    <div class="today-status --{{ $cast->shop_slug }}">
      <img src="{{ asset('assets/img/shop/clock-icon-y.png') }} " class="pc-only" alt="本日出勤">
      <span class="today-status-label pc-only">本日出勤</span>
      <span class="today-status-label sp-only">出勤</span>
      <span class="today-status-time --{{ $cast->shop_slug }}">{{ date('H:i', strtotime($cast->start_datetime)) }} ～ {{ date('H:i', strtotime($cast->end_datetime)) }}</span>
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
  </div>
</a>
