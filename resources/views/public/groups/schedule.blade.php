<x-public-groups-sub-page-layout
  titleEn="Schedule"
  titleJa="出勤情報"
  :searchHeading="$searchHeading ?? '00/00（月）の出勤女性'"
  :bannerImage="asset('assets/img/groups/schedule-banner.jpg')"
  :vectorImage="asset('assets/img/groups/Vector.png')"
  :showButtonGroup="true"
  :buttonGroup="$buttonGroup ?? null"
  :showLoadMore="true"
  :showDateSearchBar="true"
  dateSearchHeading="出勤日で検索"
  :dateSearchDates="$dateSearchDates ?? null"
  :dateSearchActiveDate="$selectedDate ?? request('date')"
>
  <!-- Schedule Content -->
  <div class="schedule-content">
    <div class="schedule-cards-grid">
      @if(($casts ?? collect())->count() > 0)
        @foreach(($casts ?? collect()) as $cast)
          <x-public.groups.schedule-card
            :name="$cast->name ?? 'キャスト名'"
            :age="$cast->age ?? '00'"
            :height="$cast->height ?? '160'"
            :bust="$cast->bust ?? '85'"
            :braSize="$cast->bra_size ?? 'C'"
            :waist="$cast->waist ?? '60'"
            :hip="$cast->hip ?? '83'"
            :message="$cast->appeal_point ?? 'メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ'"
            :shopName="$cast->shop_name ?? '雫'"
            :imageUrl="$cast->gallery_1 ? asset('storage/' . $cast->gallery_1) : null"
            :frameImageUrl="$cast->shop_slug ? asset('assets/img/groups/card-frame-' . $cast->shop_slug . '.png') : null"
            :profileUrl="$cast->shop_slug ? route('public.shop.cast.profile', ['shop' => $cast->shop_slug, 'id' => $cast->id]) : '#'"
            :statusText="$cast->status_text ?? '本日出勤'"
            :timeRange="$cast->time_range ?? '12:00〜24:00'"
            :isWorkingToday="$cast->is_working_today ?? true"
          />
        @endforeach
      @else
        @php
          $staticCasts = [
            ['name' => 'キャスト名(25)', 'age' => '25', 'height' => '160', 'bust' => '85', 'braSize' => 'C', 'waist' => '60', 'hip' => '83', 'shopName' => '雫', 'frameImage' => 'shizuku', 'timeRange' => '12:00〜24:00'],
            ['name' => 'キャスト名(22)', 'age' => '22', 'height' => '165', 'bust' => '88', 'braSize' => 'D', 'waist' => '58', 'hip' => '85', 'shopName' => 'シロガネーゼ', 'frameImage' => 'siroganeze', 'timeRange' => '14:00〜26:00'],
            ['name' => 'キャスト名(23)', 'age' => '23', 'height' => '158', 'bust' => '82', 'braSize' => 'C', 'waist' => '59', 'hip' => '82', 'shopName' => 'ラブストーリー', 'frameImage' => 'lovestory', 'timeRange' => '13:00〜25:00'],
            ['name' => 'キャスト名(24)', 'age' => '24', 'height' => '162', 'bust' => '86', 'braSize' => 'C', 'waist' => '61', 'hip' => '84', 'shopName' => 'パシーキャット', 'frameImage' => 'pussycat', 'timeRange' => '15:00〜27:00'],
            ['name' => 'キャスト名(21)', 'age' => '21', 'height' => '159', 'bust' => '84', 'braSize' => 'C', 'waist' => '57', 'hip' => '81', 'shopName' => '雅', 'frameImage' => 'miyabi', 'timeRange' => '11:00〜23:00'],
            ['name' => 'キャスト名(26)', 'age' => '26', 'height' => '163', 'bust' => '87', 'braSize' => 'D', 'waist' => '62', 'hip' => '86', 'shopName' => 'EN', 'frameImage' => 'en', 'timeRange' => '16:00〜28:00'],
            ['name' => 'キャスト名(20)', 'age' => '20', 'height' => '157', 'bust' => '83', 'braSize' => 'C', 'waist' => '56', 'hip' => '80', 'shopName' => '雫', 'frameImage' => 'shizuku', 'timeRange' => '10:00〜22:00'],
            ['name' => 'キャスト名(27)', 'age' => '27', 'height' => '164', 'bust' => '89', 'braSize' => 'D', 'waist' => '63', 'hip' => '87', 'shopName' => 'シロガネーゼ', 'frameImage' => 'siroganeze', 'timeRange' => '17:00〜29:00'],
          ];
        @endphp
        {{-- @foreach($staticCasts as $staticCast)
          <x-public.groups.schedule-card
            :name="$staticCast['name']"
            :age="$staticCast['age']"
            :height="$staticCast['height']"
            :bust="$staticCast['bust']"
            :braSize="$staticCast['braSize']"
            :waist="$staticCast['waist']"
            :hip="$staticCast['hip']"
            message="メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ"
            :shopName="$staticCast['shopName']"
            :imageUrl="asset('assets/img/groups/newface-card.png')"
            :frameImageUrl="asset('assets/img/groups/card-frame-' . $staticCast['frameImage'] . '.png')"
            profileUrl="#"
            statusText="本日出勤"
            :timeRange="$staticCast['timeRange']"
            :isWorkingToday="true"
          />
        @endforeach --}}
      @endif
    </div>
    
    <!-- Pagination -->
    @if(isset($casts) && method_exists($casts, 'hasPages') && $casts->hasPages())
      <x-public.groups.pagination :paginator="$casts" />
    @endif
  </div>
</x-public-groups-sub-page-layout>

@once
  @vite(['resources/scss/groups/schedule.scss'])
@endonce
