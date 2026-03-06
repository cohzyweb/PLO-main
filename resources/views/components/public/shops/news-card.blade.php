@props([
    'image' => 'assets/img/shops/shizuku/news-card-image1.png',
    'imageAlt' => 'news-image',
    'title' => 'タイトルタイトルタイトルタイトルタイ',
    'date' => 'カテゴリ名 | 00.00.00',
    'url' => null,
    'scss' => 'resources/scss/shops/news-card.scss',
])

@if ($url)
    <a href="{{ $url }}" class="news-card">
    @else
        <div class="news-card">
@endif
<div class="news-card-image">
    <img src="{{ asset($image) }}" alt="{{ $imageAlt }}">
</div>
<div class="news-card-content">
    <p class="news-title">{{ $title }}</p>
    <p class="news-date">{{ $date }}</p>
    <div class="news-content">
        {{ $slot }}
    </div>
</div>
@if ($url)
    </a>
@else
    </div>
@endif

@once
    @vite($scss)
@endonce
