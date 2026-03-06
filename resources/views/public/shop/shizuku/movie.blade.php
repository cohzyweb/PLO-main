<x-shizuku-page-layout page-title="MOVIE" page-subtitle="動画一覧" breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ 動画一覧"
    :assets="['resources/scss/shops/shizuku/movie.scss']" :banners="$banners">
    <section class="movie-list">

        <div class="movie-list-item">
            @foreach ($movies as $movie)
                <div class="movie-list-item-movie-container">
                    <video class="movie-list-item-movie" controls autoplay muted
                        poster="{{ asset('storage/' . $movie->thumb_url) }}">
                        <source src="{{ $movie->video_url }}" type="video/mp4">
                    </video>
                    <div class="movie-list-item-movie-info">
                        <div class="movie-list-item-movie-photo">
                            <img src="{{ asset('storage/' . $movie->gallery_1) }}">
                        </div>
                        <div class="movie-list-item-movie-title">
                            {{ $movie->name . '(' . $movie->age . ')' }}
                        </div>
                        <div class="movie-list-item-movie-measurements">
                            T.{{ $movie->height }} B.{{ $movie->bust }} W.{{ $movie->waist }}
                            H.{{ $movie->hip }}
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- @for ($i = 0; $i < 6; $i++)
                <video class="movie-list-item-movie" controls autoplay muted  poster="assets/img/shops/shizuku/movie-list-item-movie.png">
                    <source src="assets/img/shops/shizuku/movie-list-item-movie.mp4" type="video/mp4">
                </video>
            @endfor --}}
        </div>
        <div class="movie-list-pagination">
            {{ $movies->links('pagination::shops') }}
        </div>
    </section>
</x-shizuku-page-layout>
