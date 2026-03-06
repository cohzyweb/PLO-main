<div class="groups-date-search-bar">
  <button type="button" class="groups-date-search-header groups-date-search-header-mobile" aria-expanded="false" aria-label="{{ $heading }}">
    <div class="groups-date-search-header-content">
      <div class="groups-date-search-icon">
        <img src="{{ $icon }}" alt="Calendar">
      </div>
      <p class="groups-date-search-heading">{{ $heading }}</p>
    </div>
    <div class="groups-date-search-dropdown-icon">
      <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1L6 6L11 1" stroke="#021A21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>
  </button>
  <div class="groups-date-search-header groups-date-search-header-desktop">
    <div class="groups-date-search-icon">
      <img src="{{ $icon }}" alt="Calendar">
    </div>
    <p class="groups-date-search-heading">{{ $heading }}</p>
  </div>
  <div class="groups-date-search-calendar-container">
    <div class="groups-date-search-calendar" id="groups-date-calendar">
      <div class="groups-date-calendar-header">
        <button type="button" class="groups-date-calendar-nav groups-date-calendar-prev" aria-label="Previous month">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 12L6 8L10 4" stroke="#021A21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M6 12L2 8L6 4" stroke="#021A21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <p class="groups-date-calendar-month-year"></p>
        <button type="button" class="groups-date-calendar-nav groups-date-calendar-next" aria-label="Next month">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 4L10 8L6 12" stroke="#021A21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10 4L14 8L10 12" stroke="#021A21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      <div class="groups-date-calendar-weekdays">
        <div class="groups-date-calendar-weekday">日</div>
        <div class="groups-date-calendar-weekday">月</div>
        <div class="groups-date-calendar-weekday">火</div>
        <div class="groups-date-calendar-weekday">水</div>
        <div class="groups-date-calendar-weekday">木</div>
        <div class="groups-date-calendar-weekday">金</div>
        <div class="groups-date-calendar-weekday">土</div>
      </div>
      <div class="groups-date-calendar-days"></div>
    </div>
  </div>
  <div class="groups-date-search-buttons">
    @foreach($dates as $dateItem)
      @php
        $isActive = $activeDate === $dateItem['date'];
      @endphp
      <button
        type="button"
        class="groups-date-button {{ $isActive ? 'is-active' : '' }}"
        data-date="{{ $dateItem['date'] }}"
        aria-pressed="{{ $isActive ? 'true' : 'false' }}"
      >
        {{ $dateItem['display'] ?? $dateItem['label'] }}
      </button>
    @endforeach
  </div>
</div>
