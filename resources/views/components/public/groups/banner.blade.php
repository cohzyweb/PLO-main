@props([
    'backgroundImage' => asset('assets/img/groups/banner.jpg'),
    'titleEn' => 'Photo Diary',
    'titleJa' => '写メ日記',
    'vectorImage' => asset('assets/img/groups/Vector.png'),
    'overlayOpacity' => '0.25',
    'extraClass' => '',
])

@php
  // Build style attribute dynamically so that specific pages (e.g. recruit male)
  // can opt-out of setting the background image inline and rely on CSS instead.
  $styleParts = [];
  $routeClass = request()->routeIs('public.groups.newface') ? 'banner-photodiary--newface' : '';
  $bannerClass = trim("banner-photodiary {$extraClass} {$routeClass}");

  if (!empty($backgroundImage)) {
      $styleParts[] = "--banner-bg-image: url('{$backgroundImage}')";
  }

  $styleParts[] = "--banner-overlay-opacity: {$overlayOpacity}";

  $styleAttribute = implode('; ', $styleParts) . ';';
@endphp

<div class="{{ $bannerClass }}" style="{{ $styleAttribute }}">
  <div class="banner-photodiary-background" aria-hidden="true">
    <div class="banner-photodiary-overlay"></div>
  </div>
  <div class="banner-photodiary-content">
    <p class="banner-photodiary-title-en">{{ $titleEn }}</p>
    <div class="banner-photodiary-title-ja-wrapper">
      <p class="banner-photodiary-title-ja">{{ $titleJa }}</p>
    </div>
  </div>
</div>

<a href="{{ route('public.groups.girl-search') }}"
  class="banner-girl-search-btn {{ request()->routeIs('public.groups.newface') ? 'banner-girl-search-btn--newface' : '' }}">
  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="white"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
  <span>女の子検索</span>
</a>

@once
  @vite('resources/scss/groups/banner.scss')
@endonce
