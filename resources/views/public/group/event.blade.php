<x-public-front-layout>

  <!-- Main Visual -->
  <x-public.group.mv />

  <!-- Event List -->
  <section class="event">
    <div class="event-title">
      <h3 class="event-title-en title-font front-title">
        <span>E</span><span>V</span><span>E</span><span>N</span><span>T</span> <span>L</span><span>I</span><span>S</span><span>T</span>
      </h3>
      <h2 class="event-title-ja title-font-sm">イベント一覧</h2>
    </div>
    <div class="event-list content-wrapper">
      @foreach ($events as $event)
        <div class="event-list-item">
          <a href="{{ route('public.group.event.detail', ['id' => $event->id]) }}">
            <div class="event-list-item-image">
              <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
          </div>
          <div class="event-list-item-published-at">
            <p>{{ $event->published_at->format('y:m:d') }}</p>
          </div>
          <div class="event-list-item-title">
            <h3>{{ $event->title }}</h3>
          </div>
          <div class="event-list-item-memo">
            {!! $event->contents !!}
          </div>
        </a>
        </div>
      @endforeach
    </div>
  </section>

</x-public-front-layout>
@once
  @vite(['resources/scss/group/_eventview.scss'])
@endonce
