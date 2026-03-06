@props([
    'image' => 'assets/img/shops/shizuku/event-card-1.png',
    'imageAlt' => 'event-image',
    'title' => 'イベントタイトルイベントタイトルイベントタイトル',
    'url' => null,
    'scss' => 'resources/scss/shops/event-card.scss',
])

@if ($url)
    <a href="{{ $url }}" class="event-card">
    @else
        <div class="event-card">
@endif
<div class="event-card-image">
    <img src="{{ asset($image) }}" alt="{{ $imageAlt }}">
</div>
<div class="event-card-content">
    <h3 class="event-card-title">{{ $title }}</h3>
    <div class="event-card-text">
        {{ $slot }}
    </div>
    @if ($url)
        <div class="event-card-link">
            <span class="event-card-link-text">詳しくはこちら</span>
        </div>
    @endif
</div>
@if ($url)
    </a>
@else
    </div>
@endif

@once
    @vite($scss)
@endonce
