<x-public-front-layout>

  <!-- Main Visual -->
  <x-public.group.mv />

  <!-- 女の子検索 -->
  <section class="girl-search">
    <div class="girl-search__title">
      <h2 class="girl-search__title-en title-font front-title" >
        <span>G</span><span>I</span><span>R</span><span>L</span> <span>S</span><span>E</span><span>A</span><span>R</span><span>C</span><span>H</span>
      </h2>
      <h3 class="girl-search__title-ja title-font-sm">女の子検索</h3>
    </div>
    <form action="{{ url('/search') }}" method="POST" class="girl-search__form content-wrapper">
      @csrf
      <div class="girl-search__row girl-search__row--name">
        <label class="girl-search__label--name">
          <span class="girl-search__label-row">
            <span class="girl-search__icon">
              <img src="{{ asset('assets/img/shop/search_icon.png') }}" alt="検索" width="20" height="20">
            </span>
            <span>女の子名</span>
          </span>
          <input type="text" name="name" class="girl-search__input" placeholder="名前で検索">
        </label>
        <div class="girl-search__radio-group">
          <label><input type="radio" name="name_match" value="partial" checked>いずれかを含む</label>
          <label><input type="radio" name="name_match" value="full">すべて含む</label>
        </div>
      </div>
      <div class="girl-search__row girl-search__row--selects">
        <div class="girl-search__row girl-search__row--selects--box">
          <label class="girl-search__label">
            <span class="girl-search__label-row">
              <span class="girl-search__icon">
                <img src="{{ asset('assets/img/shop/search_icon.png') }}" alt="検索" width="20" height="20">
              </span>
              <span>身長</span>
            </span>
            <select name="height">
              <option value="">全て</option>
              @for($i = 150; $i <= 170; $i += 5)
                @if ($i == 150)
                  <option value="{{ $i }}">～150cm</option>
                @elseif ($i == 170)
                  <option value="{{ $i }}">170cm～</option>
                @else
                  <option value="{{ $i }}">{{$i-4}}cm～{{ $i }}cm</option>
                @endif
              @endfor
            </select>
          </label>
        </div>
        <div class="girl-search__row girl-search__row--selects--box">
          <label class="girl-search__label">
            <span class="girl-search__label-row">
              <span class="girl-search__icon">
                <img src="{{ asset('assets/img/shop/search_icon.png') }}" alt="検索" width="20" height="20">
              </span>
              <span>年齢</span>
            </span>
            <select name="age">
              <option value="">全て</option>
              @for($i = 18; $i <= 30; $i += 1)
                @if ($i == 30)
                  <option value="{{ $i }}">30歳～</option>
                @else
                  <option value="{{ $i }}">{{ $i }}歳</option>
                @endif
              @endfor
            </select>
          </label>
        </div>
        <div class="girl-search__row girl-search__row--selects--box">
          <label class="girl-search__label">
            <span class="girl-search__label-row">
              <span class="girl-search__icon">
                <img src="{{ asset('assets/img/shop/search_icon.png') }}" alt="検索" width="20" height="20">
              </span>
              <span>バストカップ</span>
            </span>
            <select name="bust">
              <option value="">全て</option>
              @foreach(['A','B','C','D','E','F','G','H','I','J'] as $cup)
                <option value="{{ $cup }}">{{ $cup }}</option>
              @endforeach
            </select>
          </label>
        </div>
      </div>
      <div class="girl-search__row girl-search__row--area">
        <div class="girl-search__row girl-search__row--location--name">
          <span class="girl-search__icon">
            <img src="{{ asset('assets/img/shop/search_icon.png') }}" alt="検索" width="20" height="20">
          </span>
          <span>性格</span>
        </div>
        <div class="girl-search__row girl-search__row--location--list">
          <label><input type="radio" name="personality" value="{{ -1 }}" checked> {{ '全て' }}</label>
          @foreach($personalities as $personality)
            <label><input type="radio" name="personality" value="{{ $personality->id }}" > {{ $personality->name }}</label>
          @endforeach
        </div>
      </div>
      <div class="girl-search__row girl-search__row--style">
        <div class="girl-search__row girl-search__row--location--name">
          <span class="girl-search__icon">
            <img src="{{ asset('assets/img/shop/search_icon.png') }}" alt="検索" width="20" height="20">
          </span>
          <span>スタイル</span>
        </div>
        <div class="girl-search__row girl-search__row--location--list">
          <label><input type="radio" name="style" value="{{ -1 }}" checked> {{ '全て' }}</label>
          @foreach( $styles as $style)
            <label><input type="radio" name="style" value="{{ $style->id }}" > {{ $style->name }}</label>
          @endforeach
        </div>
      </div>
      <div class="girl-search__row girl-search__row--option">
        <div class="girl-search__row girl-search__row--location--name">
          <span class="girl-search__icon">
            <img src="{{ asset('assets/img/shop/search_icon.png') }}" alt="検索" width="20" height="20">
          </span>
          <span>オプション</span>
        </div>
        <div class="girl-search__row girl-search__row--location--list">
          <label><input type="radio" name="option" value="{{ -1 }}" checked> {{ '全て' }}</label>
          @foreach($options as $option)
            <label><input type="radio" name="option" value="{{ $option->id }}" > {{ $option->name }}</label>
          @endforeach
        </div>
      </div>
      <div class="girl-search__row girl-search__row--buttons">
        <button type="submit" name="status" value="working" class="girl-search__btn girl-search__btn--working">「出勤中」の女の子で検索</button>
        <button type="submit" name="status" value="enrolled" class="girl-search__btn girl-search__btn--enrolled">「在籍中」の女の子で検索</button>
      </div>
    </form>
  </section>
  <!-- ここまで検索フォーム -->
</x-public-front-layout>
@once
  @vite(['resources/scss/group/_search.scss'])
@endonce