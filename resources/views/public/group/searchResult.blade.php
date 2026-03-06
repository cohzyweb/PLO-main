<x-public-front-layout>

  <!-- Main Visual -->
  <x-public.group.mv />
  <!-- schedule List -->
  <section class="schedule">
    <div class="schedule-title">
      {{-- <img src="{{ asset('assets/img/group/schedule/schedule.svg') }}" alt="Schedule"> --}}
      @if ( $status == 'working')
      <h2 class="schedule-title-ja title-font-sm">出勤情報</h2>
      @else
      <h2 class="schedule-title-ja title-font-sm">在籍情報</h2>
      @endif
    </div>
    <form name="searchResultForm" action="{{ route('public.group.searchResult.post') }}" method="post">
      @csrf
      <input type="hidden" name="names" value="{{ $names }}">
      <input type="hidden" name="name_match" value="{{ $name_match }}">
      <input type="hidden" name="personalities" value="{{ $personalities }}">
      <input type="hidden" name="styles" value="{{ $styles }}">
      <input type="hidden" name="options" value="{{ $options }}">
      <input type="hidden" name="age" value="{{ $age }}">
      <input type="hidden" name="height" value="{{ $height }}">
      <input type="hidden" name="bust" value="{{ $bust }}">
      <input type="hidden" name="status" value="{{ $status }}">
      <input type="hidden" name="selectedShopID" value="{{ $selectedShopID }}">
      <input type="hidden" name="selectedDate" value="{{ $selectedDate }}">

    @if ( $status == 'working')
    <div class="schedule-week content-wrapper">
      <div class="schedule-week-day">
        <button type="submit" name="date" class="schedule-week-day-date {{ $days[0]['date'] == $selectedDate ? 'active' : '' }}" value="{{ $days[0]['date'] }} " id = "weekDay" data-weekday="{{ $days[0]['weekDay'] }}">{{ $days[0]['weekDay'] }}</button>
      </div>
      @for ($i = 1; $i < count($days); $i++)
        <div class="schedule-week-day">
          <button type="submit" name="date" class="schedule-week-day-date {{ $days[$i]['date'] == $selectedDate ? 'active' : '' }}" value="{{ $days[$i]['date'] }} " id = "weekDay" data-weekday="{{ $days[$i]['weekDay'] }}">{{ $days[$i]['weekDay'] }}</button>
        </div>
      @endfor
    </div>
    @endif
    <div class="schedule-shop-list content-wrapper">
      <div class="schedule-shop-list-title">
        {{-- {{ $days[0]['weekDay'] ."出勤女性"}} --}}
      </div>
      <div class="schedule-shop-list-items">
        <div class="schedule-shop-list-item --all">
          <button type="submit" name="shop_id" class="schedule-shop-list-item-button {{ $selectedShopID == "" ? 'active' : '' }}" value="" id="shopID">
            <span class="shop-text">
              <span class="shop-name">ALL</span>
            </span>

          </button>
        </div>
      @foreach ($shops as $shop)
        <div class="schedule-shop-list-item --{{$shop->slug}}">
          <button type="submit" name="shop_id" class="schedule-shop-list-item-button {{ $selectedShopID == $shop->id ? 'active' : '' }}" value="{{ $shop->id }}" id="shopID">
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
    </form>
    <div class="schedule-person-info-list content-wrapper">
      <input type="hidden" id="selectedDate" value="" name="selectedDate">
      <input type="hidden" id="selectedShopID" value="" name="selectedShopID">
      <input type="hidden" id="names" value="{{ $names }}" name="names">
      <input type="hidden" id="name_match" value="{{ $name_match }}" name="name_match">
      <input type="hidden" id="personalities" value="{{ $personalities }}" name="personalities">
      <input type="hidden" id="styles" value="{{ $styles }}" name="styles">
      <input type="hidden" id="options" value="{{ $options }}" name="options">
      <input type="hidden" id="age" value="{{ $age }}" name="age">
      <input type="hidden" id="height" value="{{ $height }}" name="height">
      <input type="hidden" id="bust" value="{{ $bust }}" name="bust">
      <input type="hidden" id="status" value="{{ $status }}" name="status">
      @foreach ($search_result as $cast)
      <div class="schedule-person-info-list-item">
        <a href="{{ route('public.shop.cast.profile', ['shop' => $cast->shop_slug, 'id' => $cast->id]) }}">
          <div class="schedule-person-info-photo --{{$cast->shop_slug}}">
            <img src="{{ asset('storage/'.$cast->gallery_1) }}" alt="{{$cast->name}}">
          </div>
          <div class="schedule-person-info-items">
            <div class="schedule-person-info-shop-working --{{$cast->shop_slug}}">
              {{ $cast->shop_name }}
            </div>
            <div class="schedule-person-info-name --{{$cast->shop_slug}}">
              {{ $cast->name }}
            </div>
            <div class="schedule-person-info-property --{{$cast->shop_slug}}">
              {{ $cast->age."歳/T.".$cast->height." B.".$cast->bust." W.".$cast->waist." H.".$cast->hip }}
            </div>
            <div class="schedule-person-info-message --{{$cast->shop_slug}}">
              {{ $cast->appeal_point }}
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>

    <!-- Pagination -->
    <div class="search-result-pagination" >
      {{ $search_result->links('pagination::bootstrap-4') }}
    </div>

  </section>

</x-public-front-layout>
<script>
  let date = "{{ $days[0]['date'] }}";
</script>
@once
  @vite(['resources/scss/group/_showschedule.scss','resources/scss/group/pagination.scss','resources/js/group/searchResult.js'])
@endonce
