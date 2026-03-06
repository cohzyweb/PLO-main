<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />

  <section class="diary">
    <div class="diary-container">
      <h2 class="diary-title title-font-midashi --{{ $shop->slug }}">Photo Diary</h2>
    </div>
    <div class="diary-header content-wrapper">
      <div class="diary-header-title">
        <h2 class="diary-title title-font-sm-midashi --{{ $shop->slug }}">{{ $diary->cast_name }}</h2>
      </div>
      <div class="diary-header-content">
        <a href="{{ route('public.shop.cast.profile', ['shop' => $shop->slug, 'id' => $diary->cast_id]) }}" class="diary-header-content-link sp-only">
          <div class="diary-header-content-link-profile">
            プロフィール　＞
          </div>
        </a>
        <div class="diary-header-content-working">
          <p class="diary-header-content-working-text">
          @if ($working > 0)
            <span class="diary-header-content-working-text-working">本日出勤中</span>
          @else
            <span class="diary-header-content-working-text-not-working">本日お休み</span>
          @endif
          </p>
        </div>
        <div class="diary-header-content-note">
          <p class="diary-header-content-note-text">
            {{-- ※予約中は出勤中でも予約が入っている場合があります。 --}}
          </p>
        </div>
      </div>
      <div class="diary-body">
        <div class="diary-body-left">
          <a href="{{ route('public.shop.cast.profile', ['shop' => $shop->slug, 'id' => $diary->cast_id]) }}" class="diary-body-left-profile pc-only">
            <div class="diary-body-left-profile-link">
              プロフィール　＞
            </div>
          </a>
          <div class="diary-body-left-calendar">
            <div class="diary-body-left-calendar-content" id="diary-calendar">
            </div>
            
          </div>
        </div>
        <div class="diary-body-right">
          <div class="diary-body-right-content">
          {{-- @foreach ($diarys as $diary) --}}
          <div class="diary-body-right-content-wrapper">
            <div class="diary-body-right-content-wrapper-title">
              {{ $diary->subject }}
            </div>
            <div class="diary-body-right-content-wrapper-datetime">
              {{ $diary->created_at->format('Y/m/d H:i') }}
            </div>
            <div class="diary-body-right-content-wrapper-thumbnail">
              <img src="{{ asset('storage/diary/' . $diary->photo) }}" alt="サムネイル画像">
            </div>
            <div class="diary-body-right-content-wrapper-text">
              {!! $diary->body !!}
            </div>
          </div>
          {{-- @endforeach --}}
          </div>
          <div class="diary-body-right-pagination">
            <div class="diary-body-right-pagination-prev">
              @if ($prev)
                <a href="{{ route('public.shop.diarydetail', ['shop' => $shop->slug, 'id' => $prev->id]) }}">< 戻る</a>
              @else
                <span class="pagination-placeholder"></span>
              @endif
            </div>
            <div class="diary-body-right-pagination-list">
              <a href="{{ route('public.shop.diarylist', ['shop' => $shop->slug, 'cast_id' => $diary->cast_id]) }}">一覧へ</a>
            </div>
            <div class="diary-body-right-pagination-next">
              @if ($next)
                <a href="{{ route('public.shop.diarydetail', ['shop' => $shop->slug, 'id' => $next->id]) }}">次へ ></a>
              @else
                <span class="pagination-placeholder"></span>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</x-public-shop-layout>
<script>
  let cast_id = "{{ $diary->cast_id }}";
  let shop_id = "{{ $shop->id }}";
  let shop_slug = "{{ $shop->slug }}";
  let date = "{{ $date }}";
  let diary_id = "{{ $diary->id }}";
  let diarys = {!! json_encode($diarys) !!};
</script>
@once
  @vite(['resources/scss/shop/diarydetail.scss','resources/js/shop/diarydetail.js'])
  {{-- @vite(['resources/scss/shop/diarydetail.scss']) --}}
@endonce
