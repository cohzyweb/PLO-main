<div class="schedule-card">
  <div class="schedule-card-content">
    <!-- Image Section with Overlay Buttons -->
    <div class="schedule-card-image">
      <div class="schedule-card-image-wrapper">
        @if(!empty($imageUrl))
          <img src="{{ $imageUrl }}" alt="{{ $name }}" class="schedule-card-image-photo">
        @else
          <div class="schedule-card-image-placeholder" aria-hidden="true"></div>
        @endif

        @if(!empty($frameImageUrl))
          <img src="{{ $frameImageUrl }}" alt="" class="schedule-card-image-frame">
        @endif
      </div>
      
      <!-- Overlay Buttons -->
      <div class="schedule-card-overlay">
        <div class="schedule-card-overlay-buttons">
          <div class="schedule-card-status-button">
            <span class="schedule-card-status-text">{{ $statusText }}</span>
          </div>
          <div class="schedule-card-time-button">
            <span class="schedule-card-time-text">{{ $timeRange }}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Information Section -->
    <div class="schedule-card-info">
      <!-- Shop Name Bar -->
      <div class="schedule-card-shop-bar">
        <span class="schedule-card-shop-text">{{ $shopName }}</span>
      </div>

      <!-- Name and Measurements -->
      <div class="schedule-card-details">
        <h3 class="schedule-card-name">{{ $name }}({{ $age }})</h3>
        <p class="schedule-card-measurements">
          T.{{ $height }} B.{{ $bust }}({{ $braSize }}) W.{{ $waist }} H.{{ $hip }}
        </p>
      </div>

      <!-- Message Box -->
      <div class="schedule-card-message">
        <div class="schedule-card-message-content">
          <p class="schedule-card-message-text">{{ $message }}</p>
        </div>
        <!-- <div class="schedule-card-message-scrollbar"></div> -->
      </div>
    </div>
  </div>
</div>

@once
  @vite(['resources/scss/groups/schedule-card.scss'])
@endonce
