<x-public-shop-layout :shop="$shop">
  <div class="container-prof">
  <!-- Title -->
  <div class="title --{{ $shop->slug }}">
    <p class="title-label1 title-font-midashi ">CAST PROFILE</p>
    <p class="title-label2">Girls Name</p>
    <h1 class="title-name">{{ $cast->name }}</h1>
    <p class="title-attr">
      Age {{ $cast->age }}／T{{ $cast->height }} B{{ $cast->bust }} W{{ $cast->waist }} H{{ $cast->hip }}
    </p>
  </div>

  @if(count($gallerys) > 0)
    <div class="gallery content-wrapper-shop">
      <div class="gallery-slider swiper">
        <div class="swiper-wrapper">
          @foreach($gallerys as $gallery)
            <div class="swiper-slide">
              <img src="{{ asset('storage/' . $gallery) }}" alt="{{ $cast->name }}">
            </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div><div class="swiper-pagination"></div>
        <div class="profile-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </div>
        <div class="profile-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </div>
      </div>
    </div>
  @endif
  @if(count($diarys) > 0)
  <div class="diary content-wrapper-shop">
    <div class="diary-title">
      <h2 class="diary-title__title title-font-midashi --{{ $shop->slug }}">Photo Diary</h2>
      <a href="{{ route('public.shop.diarylist', ['shop' => $shop->slug, 'cast_id' => $cast->id]) }}" class="diary-title__link">もっと見る</a>
    </div>
    <div class="diary-item">
      @foreach($diarys as $diary)
        <div class="diary-item__content">
          <a href="{{ route('public.shop.diarydetail', ['shop' => $shop->slug, 'id' => $diary->id]) }}">
            <img src="{{ asset('storage/diary/' . $diary->photo) }}" alt="{{ $diary->subject }}">
            <div class="diary-item__subject">{{ $diary->subject }}</div>
          </a>
        </div>
      @endforeach
    </div>
    <div class="diary-item__more">
      <a href="{{ route('public.shop.diarylist', ['shop' => $shop->slug, 'cast_id' => $cast->id]) }}" class="diary-item__more__link">もっと見る</a>
    </div>
  </div>
  @endif
  <div class="working content-wrapper-shop">
    <div class="working-title">
      <h2 class="working-title__title title-font-midashi --{{ $shop->slug }}">Schedule</h2>
    </div>
    <div class="working-container">
      <div class="schedule-container">
        <div class="schedule-today-status {{ $attendance_today->count() > 0 ? $reservation->count() > 0 ? 'end' : 'worked' : 'off' }}">
        {{-- <div class="schedule-today-status worked"> --}}
          <div class="schedule-today-status__title">Today<br>Schedule</div>
          @if($attendance_today->count() > 0)
            @if ($reservation->count() > 0)
              <div class="schedule-today-status__status">受付終了</div>
            @else
              <div class="schedule-today-status__status">出勤中</div>
            @endif
          @else
            <div class="schedule-today-status__status">お休み</div>
          @endif
        </div>
        <div class="schedule-week">
          <div class="schedule-week__title_container">
            <div class="schedule-week__title">Weekly Schedule</div>
          </div>
          <div class="schedule-week__items">
            @foreach($days as $day)
              <div class="schedule-week__item">
                <div class="schedule-week__item__date">
                  {{ $day['weekDay'] }}
                  <p>({{ $day['minDay'] }})</p>
                </div>
                <div class="schedule-week__item__status">{{ $day['status'] }}</div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  @if(count($videos) > 0)
  <div class="movie content-wrapper-shop">
    <div class="movie-title">
      <h2 class="movie-title__title title-font-midashi --{{ $shop->slug }}">Movie</h2>
    </div>
    <div class="movie-container">
      @foreach($videos as $video)
      <div class="movie-item">
        <video class="movie-item__image" controls autoplay muted  poster="{{ asset('storage/' . $video->thumb_url) }}">
          <source src="{{ $video->video_url }}" type="video/mp4">
        </video>
      </div>
      {{-- <div class="movie-item__image">
          <img src="{{ asset('storage/movie/1.png') }}" alt="">
        </div> --}}
      @endforeach
      {{-- <div class="movie-item">
        <div class="movie-item__image">
          <img src="{{ asset('storage/movie/1.png') }}" alt="">
        </div>
      </div>
      <div class="movie-item">
        <div class="movie-item__image">
          <img src="{{ asset('storage/movie/2.png') }}" alt="">
        </div>
      </div> --}}
    </div>
  </div>
  @endif
  <!-- Profile Content -->
  <div class="profile-content content-wrapper-shop">
    <h2 class="profile-content__main-title title-font-midashi --{{ $shop->slug }}">Profile</h2>
    <div class="profile-content__top">
      <div class="profile-content__message ">
        <h3 class="profile-content__title title-font-sm-midashi --{{ $shop->slug }}">Girl Message</h3>
        <div class="profile-content__text">
          {{ $cast->appeal_point }}
        </div>
      </div>
      <div class="profile-content__qa">
        <h3 class="profile-content__title title-font-sm-midashi --{{ $shop->slug }}">Q&A</h3>
        <div class="profile-content__text">
          @foreach($qas as $qa)
            <div class="profile-content__qa-item">
              <div class="profile-content__qa-item__question">{{ 'Q' }}: {{ $qa->question->question }}</div>
              <div class="profile-content__qa-item__answer">{{ 'A' }}: {{ $qa->answer }}</div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="profile-content__style">
      <h3 class="profile-content__title title-font-sm-midashi --{{ $shop->slug }}">性格＆スタイル</h3>
      <div class="profile-content__text">
        @if($personalities == "")
          {{ $styles }}
        @else
          {{ $personalities.','.$styles }}
        @endif
      </div>
    </div>

    <div class="profile-content__option">
      <h3 class="profile-content__title title-font-sm-midashi --{{ $shop->slug }}">Option</h3>
      <div class="profile-content__text">
        {{ $options }}
      </div>
    </div>

    <div class="profile-content__bottom">
      <div class="profile-content__shop-message">
        <h3 class="profile-content__title title-font-sm-midashi --{{ $shop->slug }}">Shop Message</h3>
        <div class="profile-content__text">
          {{ $cast->manager_comment }}
        </div>
      </div>
    </div>
  </div>
  {{-- @push('scripts')
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const swiper = new Swiper('.gallery-slider', {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        }
      }
    });
  });
  </script>
  @endpush --}}

</div>
  @once
    @vite(['resources/js/shop/profile.js', 'resources/scss/shop/_cast.scss'])
  @endonce
</x-public-shop-layout>
