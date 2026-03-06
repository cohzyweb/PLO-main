<a href="{{ route('public.shops.shop.home', ['shop' => $slug]) }}" class="groups-shop-card" aria-label="{{ $name }}">
  <div class="groups-shop-card__image groups-shop-card__image--{{ $slug }}">
    <img class="groups-shop-card__logo groups-shop-card__logo--{{ $slug }}" src="{{ $imageUrl }}" alt="{{ $name }}">
  </div>

  <p class="groups-shop-card__desc">{{ $description }}</p>

  <div class="groups-shop-card__info">
    <div class="groups-shop-card__row groups-shop-card__row--address">
      <div class="groups-shop-card__label">住　　所</div>
      <div class="groups-shop-card__sep" aria-hidden="true"></div>
      <div class="groups-shop-card__value groups-shop-card__value--address">
        <div class="pc-only">
          <div>{{ $address1 }}</div>
          <div>{{ $address2 }}</div>
        </div>
        <div class="sp-only">{{ trim($address1 . ' ' . $address2) }}</div>
      </div>
    </div>

    <div class="groups-shop-card__row">
      <div class="groups-shop-card__label groups-shop-card__label--tel">TEL</div>
      <div class="groups-shop-card__sep" aria-hidden="true"></div>
      <div class="groups-shop-card__value">{{ $tel }}</div>
    </div>

    <div class="groups-shop-card__row">
      <div class="groups-shop-card__label">営業時間</div>
      <div class="groups-shop-card__sep" aria-hidden="true"></div>
      <div class="groups-shop-card__value">
        @php
          $hours = '';
          if (!blank($openStart) && !blank($openEnd)) {
              $hours = $openStart . ' から' . $openEnd;
          }
        @endphp
        {{ $hours }}
      </div>
    </div>
  </div>
</a>
