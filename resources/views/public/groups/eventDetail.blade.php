<x-public-groups-sub-page-layout
  titleEn="Event"
  titleJa="イベント情報"
  :bannerImage="asset('assets/img/groups/event-banner.jpg')"
  :vectorImage="asset('assets/img/groups/Vector.png')"
  :showButtonGroup="false"
  :showLoadMore="true"
  :showDateSearchBar="false"
>
  <!-- Event Detail Content -->
  <div class="event-detail-content">
    <div class="event-detail-card">
      <div class="event-detail-header">
        <h1 class="event-detail-title">{{ $event->title }}</h1>
        <div class="event-detail-meta">
          <p class="event-detail-date">{{ $event->published_at ? $event->published_at->format('Y/m/d') : '' }}</p>
          @if($event->shop)
            <div class="event-detail-shop-badge">
              <p class="event-detail-shop-name">{{ $event->shop->name }}</p>
            </div>
          @endif
        </div>
      </div>

      <div class="event-detail-image-main">
        <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}" class="event-detail-image-photo">
      </div>

      <div class="event-detail-body">
        @php
          $content = $event->contents ?? '';
          // Extract images from content
          preg_match_all('/<img[^>]+>/i', $content, $images);
          $textContent = preg_replace('/<img[^>]+>/i', '', $content);
        @endphp
        
        @if(trim($textContent))
          <div class="event-detail-text">
            {!! $textContent !!}
          </div>
        @endif
        
        @if(!empty($images[0]))
          @foreach($images[0] as $imageTag)
            <div class="event-detail-image-additional">
              {!! $imageTag !!}
            </div>
          @endforeach
        @endif
        <div class="event-detail-image-additional-container">
          <img src="{{ asset('assets/img/groups/event-details-banner.jpg') }}" alt="{{ $event->title }}">
        </div>
      </div>
      <div class="event-detail-navigation">
        <div class="event-detail-nav-buttons">
          @if($nextEvent ?? null)
            <a href="{{ route('public.groups.event.detail', $nextEvent->id) }}" class="event-detail-nav-button event-detail-nav-next">
              <span>次へ</span>
            </a>
          @else
            <button type="button" class="event-detail-nav-button event-detail-nav-next" disabled>
              <span>次へ</span>
            </button>
          @endif

          <a href="{{ route('public.groups.event') }}" class="event-detail-nav-button event-detail-nav-list">
            <span>一覧へ</span>
          </a>

          @if($prevEvent ?? null)
            <a href="{{ route('public.groups.event.detail', $prevEvent->id) }}" class="event-detail-nav-button event-detail-nav-prev">
              <span>戻る</span>
            </a>
          @else
            <button type="button" class="event-detail-nav-button event-detail-nav-prev" disabled>
              <span>戻る</span>
            </button>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-public-groups-sub-page-layout>

@once
  @vite(['resources/scss/groups/event-detail.scss'])
@endonce
