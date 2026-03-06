<x-public-front-layout>

  <!-- Main Visual -->
  <x-public.group.mv />

  <!-- schedule List -->
  <section class="schedule">
    <div class="schedule-title">
      <span class="section-title-en title-font front-title">
        <span>S</span><span>C</span><span>H</span><span>E</span><span>D</span><span>U</span><span>L</span><span>E</span>
      </span>
      <h2 class="schedule-title-ja title-font-sm">出勤情報</h2>
    </div>
    <div class="schedule-week content-wrapper">
      <div class="schedule-week-day">
        <button class="schedule-week-day-date active" value="{{ $days[0]['date'] }} " id = "weekDay" data-weekday="{{ $days[0]['weekDay'] }}">{{ $days[0]['weekDay'] }}</button>
      </div>
      @for ($i = 1; $i < count($days); $i++)
        <div class="schedule-week-day">
          <button class="schedule-week-day-date" value="{{ $days[$i]['date'] }} " id = "weekDay" data-weekday="{{ $days[$i]['weekDay'] }}">{{ $days[$i]['weekDay'] }}</button>
        </div>
      @endfor
    </div>
    <div class="schedule-shop-list content-wrapper">
      <div class="schedule-shop-list-title title-font-sm">
        {{-- {{ $days[0]['weekDay'] ."出勤女性"}} --}}
      </div>
      <div class="schedule-shop-list-items">
        <div class="schedule-shop-list-item --all">
          <button class="schedule-shop-list-item-button active" value="" id="shopID">
            <span class="shop-text">
              <span class="shop-name">ALL</span>
            </span>
          </button>
        </div>
      @foreach ($shops as $shop)
        <div class="schedule-shop-list-item --{{$shop->slug}}">
          <button class="schedule-shop-list-item-button" value="{{ $shop->id }}" id="shopID">
            <img src="{{ asset('assets/img/search.png') }}" alt="search">
            <span class="shop-text">
              <span class="shop-slug">{{ $shop->slug }}</span>
              <span class="shop-name">{{ $shop->name }}</span>
            </span>
          </button>
        </div>
      @endforeach
      </div>
    </div>
    <div class="schedule-person-info-list content-wrapper">
      {{-- @foreach ($casts as $cast)
      <div class="schedule-person-info-list-item">
        <a href="{{ route('public.shop.cast.profile', ['shop' => $cast->shop_slug, 'id' => $cast->cast_id]) }}">
          <div class="schedule-person-info-photo">
            <img src="{{ asset('storage/'.$cast->gallery_1) }}" alt="{{$cast->cast_name}}">
          </div>
          <div class="schedule-person-info-items">
            <div class="schedule-person-info-shop-working --{{$cast->shop_slug}}">
              {{ $cast->shop_name."　　".$cast->start_datetime." - ".$cast->end_datetime}}
            </div>
            <div class="schedule-person-info-name --{{$cast->shop_slug}}">
              {{ $cast->cast_name }}
            </div>
            <div class="schedule-person-info-property --{{$cast->shop_slug}}">
              {{ $cast->age."歳/T.".$cast->height." B.".$cast->bust." W.".$cast->waist." H.".$cast->hip }}
            </div>
            <div class="schedule-person-info-message">
              {{ $cast->appeal_point }}
            </div>
          </div>
        </a>
      </div>
      @endforeach --}}
    </div>

    <!-- Pagination -->
    <div class="schedule-pagination content-wrapper">
      <nav aria-label="Page navigation">
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
      </nav>
    </div>
  </section>

</x-public-front-layout>
<script>
  let date = "{{ $days[0]['date'] }}";
</script>
@once
  @vite(['resources/scss/group/_showschedule.scss', 'resources/js/group/showschedule.js'])
@endonce
