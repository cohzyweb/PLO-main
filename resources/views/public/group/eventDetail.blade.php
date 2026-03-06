<x-public-front-layout>

  <!-- Main Visual -->
  <x-public.group.mv />

  <!-- Event List -->
  <section class="event">
    <div class="event-title">
      {{-- <img src="{{ asset('assets/img/group/event/event_detail.svg') }}" alt="Event"> --}}
      <h3 class="event-title-en title-font front-title">
        <span>E</span><span>V</span><span>E</span><span>N</span><span>T</span>
      </h3>

      <h2 class="event-title-ja title-font-sm">イベント詳細</h2>
    </div>
    <div class="event-detail">
      <div class="event-detail-image">
        <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
      </div>
      <div class="event-detail-info">
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

</x-public-front-layout>
@once
  @vite(['resources/scss/group/_eventdetail.scss'])
@endonce
