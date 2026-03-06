<x-public-shop-layout :shop="$shop">

  <x-public.shop.mv :shop="$shop" />



  <!-- Event List -->
  <section class="event">
    <div class="event-title --{{ $shop->slug }}">
      <div class="event-title-en title-font-midashi">
        EVENT LIST
        {{-- <img src="{{ asset('assets/img/group/event/event.svg') }}" alt="Event"> --}}
      </div>
      {{-- <img src="{{ asset('assets/img/group/event/event.svg') }}" alt="Event"> --}}
      <h2 class="event-title-ja title-font-sm-midashi">イベント一覧</h2>
    </div>
    <div class="event-list content-wrapper-shop">
      @foreach ($events as $event)
        <div class="event-list-item">
          <div class="event-list-item-image">
            <a href="{{ route('public.shop.event.detail', ['shop' => $shop->slug, 'id' => $event->id]) }}">
              <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
            </a>
          </div>
          <div class="event-list-item-published-at">
            <p>{{ $event->published_at->format('y:m:d') }}</p>
          </div>
          <div class="event-list-item-title">
            <h3>{{ $event->title }}</h3>
          </div>
        </div>
      @endforeach
    </div>
  </section>

</x-public-shop-layout>
@once
  @vite(['resources/scss/shop/_eventview.scss'])
@endonce
