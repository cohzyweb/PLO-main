<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />

  <section class="diary">
    <div class="diary-container">
      <h2 class="diary-title title-font-midashi --{{ $shop->slug }}">Photo Diary</h2>
    </div>

      <div class="diary-body content-wrapper">
        <div class="diary-body-left">
          <div class="diary-body-left-calendar">
            <div class="diary-body-left-calendar-content" id="diary-calendar">
            </div>
            
          </div>
        </div>
        <div class="diary-body-right">
          <div class="diary-body-right-content">
          @foreach ($diarys as $diary)
          <div class="diary-body-right-content-wrapper">
            <div class="diary-body-right-content-wrapper-name --{{ $shop->slug }}">
              {{ $diary->shop_name.'　　　'.$diary->cast_name }}
            </div>
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
          @endforeach
          </div>
          <div class="diary-body-right-pagination">
            {{ $diarys->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </div>
  </section>

</x-public-shop-layout>
<script>
  let cast_id = "{{ $cast_id }}";
  let shop_id = "{{ $shop->id }}";
  let shop_slug = "{{ $shop->slug }}";
  let date = "{{ $date }}";
  let diarys_date = {!! json_encode($diarys_date) !!};
</script>
@once
  @vite(['resources/scss/shop/diarylist.scss','resources/js/shop/diarylist.js'])
  {{-- @vite(['resources/scss/shop/diarydetail.scss']) --}}
@endonce
