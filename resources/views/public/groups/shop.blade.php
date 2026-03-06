<x-public-groups-sub-page-layout
  titleEn="Shop"
  titleJa="店舗一覧"
  :bannerImage="asset('assets/img/groups/shop-banner.jpg')"
  :vectorImage="asset('assets/img/groups/Vector.png')"
  :showButtonGroup="false"
  :showLoadMore="true"
  :showDateSearchBar="false"
>
  <div class="groups-shop">
    <div class="groups-shop__panel">
      <div class="groups-shop__grid">
        @foreach(($shops ?? collect()) as $shop)
          @php
            $image = $shopImages[$shop->slug] ?? null;
            $desc = $shopDescriptions[$shop->slug] ?? ($shop->memo ?? '');
          @endphp

          <x-public.groups.shop-card
            :name="$shop->name"
            :slug="$shop->slug"
            :imageUrl="$image ? asset($image) : asset('assets/img/shops/shizuku/shop-list-image.png')"
            :description="$desc"
            :address1="$shop->address1 ?? ''"
            :address2="$shop->address2 ?? ''"
            :tel="$shop->tel ?? ''"
            :openStart="$shop->open_start ? $shop->open_start->format('H:i') : null"
            :openEnd="$shop->open_end ? $shop->open_end->format('H:i') : null"
          />
        @endforeach
      </div>
    </div>
  </div>
</x-public-groups-sub-page-layout>

@once
  @vite(['resources/scss/groups/shop.scss'])
@endonce

