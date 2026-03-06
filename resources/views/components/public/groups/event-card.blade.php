@if($url)
  <a href="{{ $url }}" class="event-card">
@else
  <div class="event-card">
@endif
  <!-- Shop Name Header -->
  <div class="event-card-header">
    <p class="event-card-shop-name">{{ $shopName }}</p>
  </div>

  <!-- Event Image -->
  <div class="event-card-image">
    <img src="{{ $imageUrl }}" alt="{{ $imageAlt }}" class="event-card-image-photo">
  </div>

  <!-- Event Info -->
  <div class="event-card-info">
    <p class="event-card-date">{{ $date }}</p>
    <p class="event-card-title">{{ $title }}</p>
  </div>
@if($url)
  </a>
@else
  </div>
@endif

@once
  @vite(['resources/scss/groups/event-card.scss'])
@endonce
