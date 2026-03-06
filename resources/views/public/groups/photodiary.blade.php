@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.css" rel="stylesheet">
@endpush

<x-public-groups-sub-page-layout
  :showButtonGroup="true"
  :buttonGroup="$buttonGroup"
  :showLoadMore="true"
>
  <div class="photodiary">
    <div class="photodiary-container">
      <div class="photodiary-sidebar">
        <div class="photodiary-calendar">
          <div id="diary-calendar"></div>
        </div>

        <div class="photodiary-months">
          <div class="photodiary-months-list">
            @if(!empty($availableMonths))
              @foreach($availableMonths as $availableMonth)
                @php
                  $year = substr($availableMonth, 0, 4);
                  $monthNum = substr($availableMonth, 5, 2);
                  $monthLabel = sprintf('%s年%02d月', $year, (int) $monthNum);
                  $isCurrentMonth = $availableMonth === $currentMonth;
                @endphp
                <a
                  href="{{ route('public.groups.photodiary', array_filter(['month' => $availableMonth, 'shop' => request('shop')])) }}"
                  class="photodiary-month-link {{ $isCurrentMonth ? 'is-active' : '' }}"
                >
                  {{ $monthLabel }}
                </a>
              @endforeach
            @endif
          </div>
        </div>
      </div>

      <div class="photodiary-main">
        @php
          $photoDiaryImagePaths = collect(array_merge(
            glob(public_path('assets/img/groups/photodiary/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}'), GLOB_BRACE) ?: [],
            glob(public_path('img/groups/photodiary/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}'), GLOB_BRACE) ?: []
          ))->unique()->values();

          $photoDiaryAvatarPaths = collect(array_merge(
            glob(public_path('assets/img/groups/photodiary/avata/*.{jpg,jpeg,png,webp,svg,JPG,JPEG,PNG,WEBP,SVG}'), GLOB_BRACE) ?: [],
            glob(public_path('assets/img/groups/photodiary/avatar/*.{jpg,jpeg,png,webp,svg,JPG,JPEG,PNG,WEBP,SVG}'), GLOB_BRACE) ?: [],
            glob(public_path('img/groups/photodiary/avata/*.{jpg,jpeg,png,webp,svg,JPG,JPEG,PNG,WEBP,SVG}'), GLOB_BRACE) ?: [],
            glob(public_path('img/groups/photodiary/avatar/*.{jpg,jpeg,png,webp,svg,JPG,JPEG,PNG,WEBP,SVG}'), GLOB_BRACE) ?: []
          ))->unique()->values();

          $photoDiaryPathToAsset = function ($absolutePath) {
            $publicRoot = str_replace('\\', '/', public_path());
            $normalizedPath = str_replace('\\', '/', $absolutePath);
            $relativePath = ltrim(str_replace($publicRoot, '', $normalizedPath), '/');
            $encodedRelativePath = collect(explode('/', $relativePath))
              ->map(fn ($segment) => rawurlencode($segment))
              ->implode('/');

            return asset($encodedRelativePath);
          };

          $photoDiaryFallbackIndex = 0;
          $photoDiaryAvatarFallbackIndex = 0;
        @endphp

        <div class="photodiary-grid">
          @forelse($diaries->chunk(2) as $group)
            <div class="photodiary-row">

              @foreach($group as $diary)

                @php
                  $fallbackPhotoSrc = $photoDiaryImagePaths->isNotEmpty()
                      ? $photoDiaryPathToAsset($photoDiaryImagePaths[$photoDiaryFallbackIndex % $photoDiaryImagePaths->count()])
                      : asset('assets/img/groups/diary-card-placeholder.png');

                  $fallbackAvatarSrc = $photoDiaryAvatarPaths->isNotEmpty()
                      ? $photoDiaryPathToAsset($photoDiaryAvatarPaths[$photoDiaryAvatarFallbackIndex % $photoDiaryAvatarPaths->count()])
                      : asset('assets/img/groups/diary-card-placeholder.png');

                  $photoSrc = $fallbackPhotoSrc;
                  if ($photoDiaryImagePaths->isEmpty() && !empty($diary->photo)) {
                      $photoSrc = asset('storage/diary/' . $diary->photo);
                  }

                  $castPhotoSrc = $fallbackAvatarSrc;
                  if ($photoDiaryAvatarPaths->isEmpty()) {
                      $castPhotoPath = $diary->gallery_1 ?? null;

                      if (!empty($castPhotoPath)) {
                          $castPhotoPath = ltrim($castPhotoPath, '/');
                          $castPhotoSrc = str_starts_with($castPhotoPath, 'gallery/')
                              ? asset('storage/' . $castPhotoPath)
                              : asset('storage/gallery/' . $castPhotoPath);
                      }
                  }

                  $photoDiaryFallbackIndex++;
                  $photoDiaryAvatarFallbackIndex++;
                @endphp

                <article class="photodiary-card">
                  <a href="{{ route('public.shops.shop.photo-diary.detail', ['shop' => $diary->shop_slug, 'id' => $diary->id]) }}" class="photodiary-card-link">

                    <div class="photodiary-card-image">
                      <img src="{{ $photoSrc }}" alt="{{ $diary->subject }}" loading="lazy">
                    </div>

                    <div class="photodiary-card-content">
                      <div class="photodiary-card-info">
                        <h3 class="photodiary-card-title">{{ $diary->subject }}</h3>
                        <time class="photodiary-card-time">{{ $diary->created_at->format('m/d H:i') }}</time>
                      </div>
                    </div>

                        <div class="photodiary-cast-header">
                          <div class="photodiary-cast-avatar">
                            <img src="{{ $castPhotoSrc }}" alt="{{ $diary->cast_name }}" loading="lazy">
                          </div>

                          <div class="photodiary-cast-info">
                            <p class="photodiary-cast-name">{{ $diary->cast_name }}({{ $diary->age }})</p>
                            <p class="photodiary-cast-stats">
                              T.{{ $diary->height }}
                              B.{{ $diary->bust }}({{ $diary->bra_size }})
                              W.{{ $diary->waist }}
                              H.{{ $diary->hip }}
                            </p>
                          </div>
                        </div>

                        <div class="photodiary-cast-shop">
                          <button type="button" class="photodiary-shop-btn">
                            {{ $diary->shop_name }}
                          </button>
                        </div>
                    
            

                  </a>
                </article>

              @endforeach

            </div>
          @empty
            <div class="photodiary-empty">
              <p>日記がありません</p>
            </div>
          @endforelse
        </div>

        <x-public.groups.pagination :paginator="$diaries"/>
        

      </div>
    </div>
  </div>
</x-public-groups-sub-page-layout>

<script>
    let date = "{{ $date ?? '' }}";
    let month = "{{ $month ?? '' }}";
    let currentMonth = "{{ $currentMonth ?? '' }}";
    let diarys_date = {!! json_encode($diarys_date ?? []) !!};
</script>

@once
  @vite(['resources/scss/groups/photodiary.scss', 'resources/js/groups/photodiary.js'])
@endonce
