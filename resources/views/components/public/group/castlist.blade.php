<a
  href="{{ route('public.shop.cast.profile', ['shop' => $cast->shop->slug, 'id' => $cast->id]) }}"
  class="newface-item is-{{ $cast->shop->slug }}"
>
  {{-- <span class="newface-date">
    {{ $cast->created_at ? \Carbon\Carbon::createFromTimeString($cast->created_at)->format('n/j') : '' }}
  </span> --}}
  <div class="newface-photo">
    <img src="{{ asset('storage/' . $cast->gallery_1) }}" alt="{{ $cast->name }}">
  </div>
  <span class="newface-name">
    {{ $cast->name }} <small>{{ $cast->age ? '(' . $cast->age . ')' : '' }}</small>
  </span>
  <span class="newface-size">
    B{{ $cast->bust }}　W{{ $cast->waist }}　H{{ $cast->hip }}
  </span>
  <p class="newface-intro">
    {{ $cast->appeal_point }}
  </p>
</a>
