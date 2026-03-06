<a
  href="{{ route('public.shop.cast.profile', ['shop' => $cast->shop->slug, 'id' => $cast->id]) }}"
  class="newface-item is-{{ $cast->shop->slug }}"
>
  <span class="newface-date">
    {{-- {{ $cast->created_at ? \Carbon\Carbon::createFromTimeString($cast->created_at)->format('n/j') : '' }} --}}
    {{ $cast->created_at ? \Carbon\Carbon::createFromTimeString($cast->created_at)->format('Y.m.d D').' 入店' : '' }}
  </span>
  <div class="newface-photo --{{ $cast->shop->slug }}">
    <img src="{{ asset('storage/' . $cast->gallery_1) }}" alt="{{ $cast->name }}">
  </div>
  {{-- <span class="newface-name">
    {{ $cast->name }} <small>{{ $cast->age ? '(' . $cast->age . ')' : '' }}</small>
  </span> --}}
  <div class="newface-shop --{{ $cast->shop->slug }}">
    {{ $cast->shop->name }}
  </div>
  {{-- <span class="newface-name">
    {{ $cast->name }}
  </span> --}}
  {{-- <span class="newface-size">
    B{{ $cast->bust }}　W{{ $cast->waist }}　H{{ $cast->hip }}
  </span> --}}
  <div class="newface-name-container">
  <span class="newface-name">
    {{ $cast->name }}<small>{{ $cast->age ? '(' . $cast->age . ')' : '' }}</small>
  </span>
  </div>
  <span class="newface-size --{{ $cast->shop->slug }}">
    B{{ $cast->bust }}　W{{ $cast->waist }}　H{{ $cast->hip }}
  </span>

  <p class="newface-intro --{{ $cast->shop->slug }}">
    {{ $cast->appeal_point }}
  </p>
</a>
