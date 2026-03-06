<x-public-shop-layout :shop="$shop">

    <x-public.shop.mv :shop="$shop" />
  
  
  
    <!-- Event List -->
    <section class="movie">
      <div class="movie-title --{{ $shop->slug }}">
        <div class="movie-title-en title-font-midashi">
          MOVIE LIST
          {{-- <img src="{{ asset('assets/img/group/event/event.svg') }}" alt="Event"> --}}
        </div>
        {{-- <img src="{{ asset('assets/img/group/event/event.svg') }}" alt="Event"> --}}
        <h2 class="movie-title-ja title-font-sm-midashi">動画一覧</h2>
      </div>
      <div class="movie-list content-wrapper-shop">
        @foreach ($movies as $movie)
        <div class="movie-list-item">
              <video class="movie-list-item-movie" controls autoplay muted  poster="{{ asset('storage/' . $movie->thumb_url) }}">
                <source src="{{ $movie->video_url }}" type="video/mp4">
              </video>
              <div class="movie-list-item-content --{{ $shop->slug }}">
                <div class="movie-list-item-content-published-at">
                  {{ $movie->updated_at->format('y.m.d') }}
                </div>
                <div class="movie-list-item-content-name --{{ $shop->slug }}">
                  {{ $movie->cast->name }}<small>{{ $movie->cast->age ? '(' . $movie->cast->age . ')' : '' }}</small>
                </div>
                <div class="movie-list-item-content-size --{{ $shop->slug }}">
                  B{{ $movie->cast->bust }}　W{{ $movie->cast->waist }}　H{{ $movie->cast->hip }}
                </div>
                <div class="movie-list-item-content-intro --{{ $shop->slug }}">
                  <span class="movie-list-item-content-intro-text">
                    {{ $movie->cast->appeal_point }}
                  </span>
                </div>
              </div>
          </div>
            @endforeach
      </div>
    </section>
  
  </x-public-shop-layout>
  @once
    @vite(['resources/scss/shop/movielist.scss'])
  @endonce
  