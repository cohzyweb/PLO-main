<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />
  <!-- Event List -->
  <section class="event">
    <div class="event-title --{{ $shop->slug }}">
      <div class="event-title-en title-font-midashi">
        EVENT DETAIL
      </div>
      {{-- <img src="{{ asset('assets/img/group/event/event_detail.svg') }}" alt="Event"> --}}
      <h2 class="event-title-ja title-font-sm-midashi">イベント詳細</h2>
    </div>
    <div class="event-detail content-wrapper-shop">
      <div class="event-detail-image">
        <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
      </div>
      <div class="event-detail-info --{{ $shop->slug }}">
        <div class="event-detail-info-published-at">
          <p>{{ $event->published_at->format('y:m:d')."  |  " }}</p>
        </div>
        <div class="event-detail-info-title">
          <h3>{{ $event->title }}</h3>
        </div>
      </div>
      <div class="event-detail-content">
        <div class="event-detail-content-text">
          {!! $event->contents !!}
        </div>
      </div>
    </div>
  </section>

</x-public-shop-layout>
@once
  @vite(['resources/scss/shop/_eventdetail.scss'])
@endonce
