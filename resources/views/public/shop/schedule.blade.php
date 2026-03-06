<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />

  <!-- schedule List -->
  <section class="schedule">
    <div class="schedule-title --{{ $shop->slug }}">
      {{-- <img src="{{ asset('assets/img/group/schedule/schedule.svg') }}" alt="Schedule"> --}}
      <h2 class="schedule-title-ja title-font-midashi">出勤情報</h2>
    </div>
    <div class="schedule-weeks content-wrapper-shop">
      <div class="schedule-weeks-day">
        <button class="schedule-weeks-day-date active" value="{{ $days[0]['date'] }} " id = "weekDay" data-weekday="{{ $days[0]['weekDay'] }}">{{ $days[0]['weekDay'] }}</button>
      </div>
      @for ($i = 1; $i < count($days); $i++)
        <div class="schedule-weeks-day">
          <button class="schedule-weeks-day-date" value="{{ $days[$i]['date'] }} " id = "weekDay" data-weekday="{{ $days[$i]['weekDay'] }}">{{ $days[$i]['weekDay'] }}</button>
        </div>
      @endfor
    </div>
    <div class="schedule-person-info-list content-wrapper-shop">
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

</x-public-shop-layout>
<script>
  let date = "{{ $days[0]['date'] }}";
  let shopID = "{{ $shop->id }}";


</script>
@once
  @vite(['resources/scss/shop/_showschedule.scss', 'resources/js/shop/showschedule.js'])
@endonce
