<x-public-groups-sub-page-layout
  titleEn="New Face"
  titleJa="新人情報"
  searchHeading="店舗で検索"
  :bannerImage="asset('assets/img/groups/newface-banner.jpg')"
  :vectorImage="asset('assets/img/groups/Vector.png')"
  :showButtonGroup="true"
  :buttonGroup="$buttonGroup ?? null"
  :showLoadMore="true"
  :showDateSearchBar="false"
  dateSearchHeading="出勤日で検索"
  :dateSearchDates="$dateSearchDates ?? null"
  :dateSearchActiveDate="$selectedDate ?? request('date')"
>
  @php
    $newfaceStaticImagePool = collect(
      glob(public_path('assets/img/home/newface/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}'), GLOB_BRACE) ?: []
    )->map(function ($path) {
      return asset('assets/img/home/newface/' . basename($path));
    })->values();

    if ($newfaceStaticImagePool->isEmpty()) {
      $newfaceStaticImagePool = collect([asset('assets/img/groups/newface-card.png')]);
    }
  @endphp

  <!-- New Face Content -->
  <div class="newface">
    <section>
      <div class="newface-cards-container">
        @if(($casts ?? collect())->count() > 0)
          <div class="newface-cards-slider swiper" aria-label="New Face slider">
            <div class="swiper-wrapper">
		              @foreach(($casts ?? collect()) as $cast)
		                @php
		                  $cardImageUrl = $newfaceStaticImagePool[$loop->index % $newfaceStaticImagePool->count()]
		                    ?? asset('assets/img/groups/newface-card.png');
		                @endphp
		                <div class="swiper-slide">
		                  <x-public.groups.newface-card
                    :date="\Carbon\Carbon::parse($cast->joined_at)->format('m/d')"
                    :joinDate="\Carbon\Carbon::parse($cast->joined_at)->format('Y.m.d')"
                    :name="$cast->name"
                    :age="$cast->age ?? ''"
                    :height="$cast->height ?? ''"
                    :bust="$cast->bust ?? ''"
                    :braSize="$cast->bra_size ?? ''"
                    :waist="$cast->waist ?? ''"
                    :hip="$cast->hip ?? ''"
		                    :message="$cast->appeal_point ?? ''"
		                    :shopName="$cast->shop_name ?? ''"
		                    :shopSlug="$cast->shop_slug ?? ''"
		                    :imageUrl="$cardImageUrl"
		                    :frameImageUrl="$cast->shop_slug ? asset('assets/img/groups/card-frame-' . $cast->shop_slug . '.png') : null"
		                    :profileUrl="$cast->shop_slug ? route('public.shop.cast.profile', ['shop' => $cast->shop_slug, 'id' => $cast->id]) : '#'"
		                    :showNew="true"
	                  />
                </div>
              @endforeach
            </div>
            <div class="newface-cards-pagination swiper-pagination"></div>
          </div>
        @else
          <div class="newface-empty">
            <p>表示できる新人情報がありません。</p>
          </div>
        @endif
      </div>

      <!-- Pagination -->
      @if(isset($casts) && method_exists($casts, 'hasPages') && $casts->hasPages())
        <x-public.groups.pagination :paginator="$casts" />
      @endif
    </section>
  </div>
</x-public-groups-sub-page-layout>

@once
  @vite(['resources/scss/groups/newface-page.scss'])
@endonce
