@props([
    'title' => 'news',
    'items' => [],
    'sliderId' => 'newsSlider',
    'titleBackgroundColor' => '#AB8942',
    'titleGradient' => true,
    'titleGradientStart' => '#FFF2D7',
    'titleGradientEnd' => '#BD902F',
    'titleColor' => '#FFFFFF',
    'prevButtonId' => null,
    'nextButtonId' => null,
    'variant' => 'news', // 'news' or 'diary'
    'defaultImage' => 'assets/img/shops/shizuku/news-image.png',
    'itemCount' => 10,
    'titleBackgroundGradient' => true,
    'titleBackgroundGradientStart' => '#B525CE',
    'titleBackgroundGradientStartPercent' => '0%',
    'titleBackgroundGradientMiddle' => '#FF00F2',
    'titleBackgroundGradientMiddlePercent' => '50%',
    'titleBackgroundGradientEnd' => '#B525CE',
    'titleBackgroundGradientEndPercent' => '100%',
    'shop' => 'shizuku',
])

@if ($variant === 'news')
    {{-- News Variant UI --}}
    <div class="news-section">
        @if ($titleBackgroundGradient)
            <div class="news-title"
                style="background: linear-gradient(180deg, {{ $titleBackgroundGradientStart }} {{ $titleBackgroundGradientStartPercent }}, {{ $titleBackgroundGradientMiddle }} {{ $titleBackgroundGradientMiddlePercent }}, {{ $titleBackgroundGradientEnd }} {{ $titleBackgroundGradientEndPercent }});">
                @if ($titleGradient)
                    <h1
                        style="background: linear-gradient(180deg, {{ $titleGradientStart }} 20.67%, {{ $titleGradientEnd }} 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        {{ $title }}
                    </h1>
                @else
                    <h1 style="color: {{ $titleColor }}; -webkit-text-fill-color: {{ $titleColor }};">
                        {{ $title }}
                    </h1>
                @endif
            </div>
        @else
            <div class="news-title" style="background: {{ $titleBackgroundColor }};">
                @if ($titleGradient)
                    <h1
                        style="background: linear-gradient(180deg, {{ $titleGradientStart }} 20.67%, {{ $titleGradientEnd }} 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        {{ $title }}
                    </h1>
                @else
                    <h1 style="color: {{ $titleColor }}; -webkit-text-fill-color: {{ $titleColor }};">
                        {{ $title }}
                    </h1>
                @endif
            </div>
        @endif
        <div class="news-slider-wrapper" id="{{ $sliderId }}">
            <button class="news-slider-prev" id="{{ $prevButtonId ?? $sliderId . 'Prev' }}">
                <svg width="12" height="25" viewBox="0 0 12 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.5052 0C10.6825 0 10.8639 0.0838379 10.9999 0.246558C11.2719 0.571997 11.2719 1.10454 10.9999 1.42998L1.68797 12.574L10.8639 23.5503C11.1359 23.8758 11.1359 24.4083 10.8639 24.7338C10.5918 25.0592 10.1466 25.0592 9.87457 24.7338L0.204043 13.1657C-0.0680143 12.8403 -0.0680143 12.3077 0.204043 11.9823L10.0106 0.246582C10.1466 0.0838623 10.328 4.88281e-05 10.5052 4.88281e-05L10.5052 0Z"
                        fill="white" />
                </svg>
            </button>
            <div class="news-content">
                @if (count($items) > 0)
                    @foreach ($items as $item)
                        <a class="news-content-card"
                            href="{{ route('public.shops.shop.news.detail', ['shop' => $shop->slug, 'id' => $item->id]) }}">
                            <div class="news-content-card-image">
                                <img src="{{ asset('storage/' . $item['thumbnail']) }}"
                                    alt="{{ $item['title'] ?? 'Card Image' }}">
                            </div>
                            <div class="news-content-card-date">
                                <h2>{{ $item['published_at'] ? \Carbon\Carbon::createFromTimeString($item['published_at'])->format('m/d') : '' }}
                                </h2>
                            </div>
                            <div class="news-content-card-content">
                                <p>{{ $item['title'] ?? 'タイトルタイトルタイトルタイトルタイ' }}</p>
                            </div>
                        </a>
                    @endforeach
                @else
                    {{-- @for ($i = 0; $i < $itemCount; $i++)
                        <div class="news-content-card">
                            <div class="news-content-card-image">
                                <img src="{{ asset($defaultImage) }}" alt="Card Image">
                            </div>
                            <div class="news-content-card-date">
                                <h2>00.00</h2>
                            </div>
                            <div class="news-content-card-content">
                                <p>タイトルタイトルタイトルタイトルタイ</p>
                            </div>
                        </div>
                    @endfor --}}
                @endif
            </div>
            <button class="news-slider-next" id="{{ $nextButtonId ?? $sliderId . 'Next' }}">
                <svg width="12" height="25" viewBox="0 0 12 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.698697 0C0.521441 0 0.340063 0.0838379 0.204035 0.246558C-0.0680227 0.571997 -0.0680227 1.10454 0.204035 1.42998L9.51595 12.574L0.340064 23.5503C0.0680065 23.8758 0.0680065 24.4083 0.340064 24.7338C0.612122 25.0592 1.05729 25.0592 1.32935 24.7338L10.9999 13.1657C11.2719 12.8403 11.2719 12.3077 10.9999 11.9823L1.19332 0.246582C1.05729 0.0838623 0.875954 4.88281e-05 0.698678 4.88281e-05L0.698697 0Z"
                        fill="white" />
                </svg>
            </button>
        </div>
    </div>
@else
    {{-- Diary Variant UI --}}
    <div class="news-section">
        @if ($titleBackgroundGradient)
            <div class="news-title"
                style="background: linear-gradient(180deg, {{ $titleBackgroundGradientStart }} {{ $titleBackgroundGradientStartPercent }}, {{ $titleBackgroundGradientMiddle }} {{ $titleBackgroundGradientMiddlePercent }}, {{ $titleBackgroundGradientEnd }} {{ $titleBackgroundGradientEndPercent }});">
                @if ($titleGradient)
                    <h1
                        style="background: linear-gradient(180deg, {{ $titleGradientStart }} 20.67%, {{ $titleGradientEnd }} 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        {{ $title }}
                    </h1>
                @else
                    <h1 style="color: {{ $titleColor }}; -webkit-text-fill-color: {{ $titleColor }};">
                        {{ $title }}
                    </h1>
                @endif
            </div>
        @else
            <div class="news-title" style="background: {{ $titleBackgroundColor }};">
                @if ($titleGradient)
                    <h1
                        style="background: linear-gradient(180deg, {{ $titleGradientStart }} 20.67%, {{ $titleGradientEnd }} 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        {{ $title }}
                    </h1>
                @else
                    <h1 style="color: {{ $titleColor }}; -webkit-text-fill-color: {{ $titleColor }};">
                        {{ $title }}
                    </h1>
                @endif
            </div>
        @endif
        <div class="diary-slider-wrapper" id="{{ $sliderId }}">
            <button class="diary-slider-prev" id="{{ $prevButtonId ?? $sliderId . 'Prev' }}">
                <svg width="12" height="25" viewBox="0 0 12 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.5052 0C10.6825 0 10.8639 0.0838379 10.9999 0.246558C11.2719 0.571997 11.2719 1.10454 10.9999 1.42998L1.68797 12.574L10.8639 23.5503C11.1359 23.8758 11.1359 24.4083 10.8639 24.7338C10.5918 25.0592 10.1466 25.0592 9.87457 24.7338L0.204043 13.1657C-0.0680143 12.8403 -0.0680143 12.3077 0.204043 11.9823L10.0106 0.246582C10.1466 0.0838623 10.328 4.88281e-05 10.5052 4.88281e-05L10.5052 0Z"
                        fill="white" />
                </svg>
            </button>
            <div class="diary-content">
                @if (count($items) > 0)
                    @foreach ($items as $item)
                        <a class="diary-content-card"
                            href="{{ route('public.shops.shop.photo-diary.detail', ['shop' => $shop->slug, 'id' => $item->id]) }}">
                            <div class="diary-content-card-image">
                                <img src="{{ asset('storage/diary/' . $item['photo']) }}"
                                    alt="{{ $item['subject'] ?? 'Card Image' }}">
                                @if (isset($item['subject']) && !empty($item['subject']))
                                    <div class="diary-content-card-image-text">
                                        <span>{{ $item['subject'] }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="diary-content-card-date">
                                <h2>{{ $item['cast_name'] ?? '投稿者名' }}</h2>
                            </div>
                            <div class="diary-content-card-content">
                                <p>{{ $item['created_at'] ? \Carbon\Carbon::createFromTimeString($item['created_at'])->format('m月d日 H:i') : '' }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                @else
                    {{-- @for ($i = 0; $i < $itemCount; $i++)
                        <div class="diary-content-card">
                            <div class="diary-content-card-image">
                                <img src="{{ asset($defaultImage) }}" alt="Card Image">
                                <div class="diary-content-card-image-text">
                                    <span>日記タイトル日記</span>
                                </div>
                            </div>
                            <div class="diary-content-card-date">
                                <h2>投稿者名</h2>
                            </div>
                            <div class="diary-content-card-content">
                                <p>0月0日(水) 00:00</p>
                            </div>
                        </div>
                    @endfor --}}
                @endif
            </div>
            <button class="diary-slider-next" id="{{ $nextButtonId ?? $sliderId . 'Next' }}">
                <svg width="12" height="25" viewBox="0 0 12 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.698697 0C0.521441 0 0.340063 0.0838379 0.204035 0.246558C-0.0680227 0.571997 -0.0680227 1.10454 0.204035 1.42998L9.51595 12.574L0.340064 23.5503C0.0680065 23.8758 0.0680065 24.4083 0.340064 24.7338C0.612122 25.0592 1.05729 25.0592 1.32935 24.7338L10.9999 13.1657C11.2719 12.8403 11.2719 12.3077 10.9999 11.9823L1.19332 0.246582C1.05729 0.0838623 0.875954 4.88281e-05 0.698678 4.88281e-05L0.698697 0Z"
                        fill="white" />
                </svg>
            </button>
        </div>
    </div>
@endif
