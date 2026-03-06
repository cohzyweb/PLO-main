<x-public-groups-sub-page-layout
  titleEn="Event"
  titleJa="イベント情報"
  :bannerImage="asset('assets/img/groups/event-banner.jpg')"
  :vectorImage="asset('assets/img/groups/Vector.png')"
  :searchHeading="'店舗で検索'"
  :showButtonGroup="true"
  :buttonGroup="$buttonGroup ?? null"
  :showLoadMore="true"
  :showDateSearchBar="true"
  dateSearchHeading="日付で検索"
  :dateSearchDates="$dateSearchDates ?? null"
  :dateSearchActiveDate="$selectedDate ?? request('date')"
>
  <!-- Event Content -->
  <div class="event-content">
    <div class="event-content-list">
      @forelse($events ?? [] as $event)
        <x-public.groups.event-card
          :shopName="$event->shop->name ?? '雫'"
          :imageUrl="asset('storage/' . $event->thumbnail)"
          imageAlt="{{ $event->title }}"
          :date="$event->published_at ? $event->published_at->format('Y/m/d') : ''"
          :title="$event->title"
          :url="route('public.groups.event.detail', $event->id)"
        />
      @empty
        <div class="event-content-empty">
          <p>イベント情報がありません。</p>
        </div>
      @endforelse
    </div>
    
    <!-- Pagination -->
    @if(isset($events) && method_exists($events, 'hasPages') && $events->hasPages())
      <x-public.groups.pagination :paginator="$events" />
    @endif
  </div>
</x-public-groups-sub-page-layout>  

@once
  @vite(['resources/scss/groups/event.scss'])
@endonce