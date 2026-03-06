@props([
    'backgroundImage' => 'assets/img/shops/shizuku/event-bg.png',
    'backgroundAlt' => 'Event Background',
    'mainBannerImage' => 'assets/img/shops/shizuku/event-main.png',
    'mainBannerAlt' => 'Main Banner Background',
    'subBannerImages' => [],
])

<div class="home-event">
    <div class="event-background">
        <img src="{{ asset($backgroundImage) }}" alt="{{ $backgroundAlt }}" class="event-bg-image">
        <div class="event-bg-overlay"></div>
    </div>
    @php
        // Use subBannerImages for main banner if provided, otherwise use mainBannerImage
        $mainBannerImages = count($subBannerImages) > 0 ? $subBannerImages : [['image' => $mainBannerImage, 'alt' => $mainBannerAlt]];
        $hasMultipleImages = count($mainBannerImages) > 1;
    @endphp
    <div class="event-main-banner">
        <div class="event-main-bg">
            @if($hasMultipleImages)
                <div class="event-main-banner-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach($mainBannerImages as $banner)
                            <div class="swiper-slide">
                                <img src="{{ asset($banner['image'] ?? $banner) }}" alt="{{ $banner['alt'] ?? $mainBannerAlt }}" class="event-main-image">
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="event-main-banner-prev">
                    <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="Previous">
                </button>
                <button class="event-main-banner-next">
                    <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="Next">
                </button>
            @else
                <img src="{{ asset($mainBannerImages[0]['image']) }}" alt="{{ $mainBannerAlt }}" class="event-main-image">
            @endif
        </div>
    </div>
    @if(count($subBannerImages) > 0)
        <div class="event-sub-banners">
            @if($hasMultipleImages)
                <div class="event-sub-banners-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach($subBannerImages as $index => $subBanner)
                            <div class="swiper-slide" data-swiper-slide-index="{{ $index }}">
                                <div class="event-sub-banner">
                                    <img src="{{ asset($subBanner['image'] ?? $subBanner) }}" alt="{{ $subBanner['alt'] ?? 'Event Sub Banner' }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="event-sub-banners-prev">
                    <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="Previous">
                </button>
                <button class="event-sub-banners-next">
                    <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="Next">
                </button>
            @else
                <div class="event-sub-banners-static">
                    @foreach($subBannerImages as $subBanner)
                        <div class="event-sub-banner-one">
                            <img src="{{ asset($subBanner['image'] ?? $subBanner) }}" alt="{{ $subBanner['alt'] ?? 'Event Sub Banner' }}">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endif
</div>

@once
    @vite(['resources/js/shops/event-section.js'])
@endonce
