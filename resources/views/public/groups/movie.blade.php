<x-public-groups-sub-page-layout
  titleEn="Movie"
  titleJa="動画一覧"
  :bannerImage="asset('assets/img/groups/movie-banner.jpg')"
  :vectorImage="asset('assets/img/groups/Vector.png')"
  :showButtonGroup="true"
  :buttonGroup="$buttonGroup ?? null"
  :showLoadMore="true"
  :showDateSearchBar="false"
  :searchHeading="'店舗で検索'"
>
  <div class="groups-movie">
    <div class="groups-movie__panel">
      <div class="groups-movie__heading">
        <span class="groups-movie__heading-quote">"{{ $shopNameForHeading }}"</span>
        <span class="groups-movie__heading-text">の動画一覧</span>
      </div>

      <div class="groups-movie__grid">
        @forelse($videos ?? [] as $video)
          <div class="groups-movie-card">
            <div class="groups-movie-card__video-wrapper">
              <div class="groups-movie-card__thumbnail">
                @if($video->thumb_url)
                  <img src="{{ asset('storage/' . $video->thumb_url) }}" alt="Video thumbnail">
                @else
                  <div class="groups-movie-card__placeholder"></div>
                @endif
              </div>
              <div class="groups-movie-card__play-button">
                <svg width="107" height="108" viewBox="0 0 107 108" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="53.5" cy="54" r="53.5" fill="white" fill-opacity="0.9"/>
                  <path d="M42 32L42 76L76 54L42 32Z" fill="#021A21"/>
                </svg>
              </div>
              @if($video->video_url)
                <video class="groups-movie-card__video" preload="metadata">
                  <source src="{{ $video->video_url }}" type="video/mp4">
                </video>
              @endif
            </div>

            <div class="groups-movie-card__info">
              <div class="groups-movie-card__author">
                <div class="groups-movie-card__avatar">
                  @if($video->gallery_1)
                    <img src="{{ asset('storage/' . $video->gallery_1) }}" alt="{{ $video->cast_name }}">
                  @else
                    <div class="groups-movie-card__avatar-placeholder"></div>
                  @endif
                </div>
                <div class="groups-movie-card__author-details">
                  <p class="groups-movie-card__author-name">{{ $video->cast_name }}({{ str_pad($video->age ?? '00', 2, '0', STR_PAD_LEFT) }})</p>
                  <p class="groups-movie-card__author-measurements">
                    T.{{ $video->height ?? '160' }} B.{{ $video->bust ?? '85' }}({{ $video->bra_size ?? 'C' }}) W.{{ $video->waist ?? '60' }} H.{{ $video->hip ?? '83' }}
                  </p>
                </div>
              </div>

              <div class="groups-movie-card__shop-badge">
                {{ $video->shop_name }}
              </div>
            </div>
          </div>
        @empty
          <div class="groups-movie__empty">
            <p>動画がありません。</p>
          </div>
        @endforelse
      </div>
      
      <!-- Pagination -->
      @if(isset($videos) && method_exists($videos, 'hasPages') && $videos->hasPages())
        <x-public.groups.pagination :paginator="$videos" />
      @endif
    </div>
  </div>
</x-public-groups-sub-page-layout>

@once
  @vite(['resources/scss/groups/movie.scss'])
@endonce
