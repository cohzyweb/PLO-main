script<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />

  <section class="diary">
    <div class="diary-container">
      <h2 class="diary-title">Photo Diary</h2>
    </div>
    <div class="diary-header content-wrapper">
      <div class="diary-header-title">
        <h2 class="diary-title">{{ $cast_name }}</h2>
      </div>
      <div class="diary-header-content">
        <div class="diary-header-content-working">
          <p class="diary-header-content-working-text">
          @if ($working > 0)
            @if ($reservation > 0)
              <span class="diary-header-content-working-text-reservation">予約中</span>
            @else
              <span class="diary-header-content-working-text-working">出勤中</span>
            @endif
          @else
            <span class="diary-header-content-working-text-not-working">お休み</span>
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
          <div class="diary-body-left-profile">
            <a href="{{ route('public.shop.cast.profile', ['shop' => $shop->slug, 'id' => $castId]) }}" class="diary-body-profile-link">
              プロフィール　＞
            </a>
          </div>
          <div class="diary-body-left-calendar">
            <div class="diary-body-left-calendar-content" id="diary-calendar">
            </div>
            
          </div>
        </div>
        <div class="diary-body-right">
          <div class="diary-body-right-content">
          {{-- @foreach ($diarys as $diary)
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
          @endforeach --}}
          </div>
          <div class="diary-body-right-pagination">
            {{-- <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav> --}}
                                
          </div>
        </div>
      </div>
    </div>
  </section>

</x-public-shop-layout>
<script>
  let cast_id = "{{ $castId }}";
  let shop_id = "{{ $shop->id }}";
  let date = "{{ $date }}";
</script>
@once
  @vite(['resources/scss/shop/diarydetail.scss','resources/js/shop/diarydetail.js'])
@endonce
