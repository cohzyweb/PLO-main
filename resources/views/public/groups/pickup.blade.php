<x-public-groups-sub-page-layout
  titleEn="PickUp"
  titleJa="ピックアップ"
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
  <!-- New Face Content -->
  <div class="pickup">
    <section>
      <div class="pickup-cards-container">
        <div class="pickup-cards-grid">
            @forelse(($casts ?? collect()) as $cast)
              <x-public.groups.newface-card
                :date="\Carbon\Carbon::parse($cast->joined_at)->format('m/d')"
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
                :imageUrl="$cast->gallery_1 ? asset('storage/' . $cast->gallery_1) : asset('assets/img/groups/newface-card.png')"
                :frameImageUrl="$cast->shop_slug ? asset('assets/img/groups/card-frame-' . $cast->shop_slug . '.png') : null"
                :profileUrl="$cast->shop_slug ? route('public.shop.cast.profile', ['shop' => $cast->shop_slug, 'id' => $cast->id]) : '#'"
                :showNew="true"
              />
            @empty
              <div class="pickup-empty">
                <p>表示できる新人情報がありません。</p>
              </div>
            @endforelse
        </div>
      </div>
    </section>
  </div>
</x-public-groups-sub-page-layout>

@once
  @vite(['resources/scss/groups/pickup-page.scss'])
@endonce
