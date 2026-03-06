<x-public-groups-sub-page-layout
  titleEn="Girl Search"
  titleJa="女の子検索"
  :bannerImage="asset('assets/img/groups/movie-banner.jpg')"
  :vectorImage="asset('assets/img/groups/Vector.png')"
  :showButtonGroup="false"
  :showLoadMore="true"
  :showDateSearchBar="false"
>
  <div class="groups-girl-search">
    <div class="groups-girl-search__panel">
      @if($searchResults && $searchResults->count() > 0 && $searchCriteria)
        <!-- Search Results Section -->
        <div class="groups-girl-search__results">
          <!-- Search Criteria Summary -->
          <div class="groups-girl-search__criteria">
            <div class="groups-girl-search__criteria-header">
              <p class="groups-girl-search__criteria-title">検索条件</p>
            </div>
            <div class="groups-girl-search__criteria-content">
              <div class="groups-girl-search__criteria-row">
                @if(!empty($searchCriteria['name']))
                  <div class="groups-girl-search__criteria-item">
                    <span class="groups-girl-search__criteria-label">女の子名</span>
                    <span class="groups-girl-search__criteria-value">「{{ $searchCriteria['name'] }}」</span>
                  </div>
                @endif
                @if(!empty($searchCriteria['height']))
                  <div class="groups-girl-search__criteria-item">
                    <span class="groups-girl-search__criteria-label">身長</span>
                    <span class="groups-girl-search__criteria-value">「
                      @if($searchCriteria['height'] == '150')～150cm
                      @elseif($searchCriteria['height'] == '155')151cm～155cm
                      @elseif($searchCriteria['height'] == '160')156cm～160cm
                      @elseif($searchCriteria['height'] == '165')161cm～165cm
                      @elseif($searchCriteria['height'] == '170')170cm～
                      @endif」</span>
                  </div>
                @endif
                @if(!empty($searchCriteria['age']))
                  <div class="groups-girl-search__criteria-item">
                    <span class="groups-girl-search__criteria-label">年齢</span>
                    <span class="groups-girl-search__criteria-value">「{{ $searchCriteria['age'] == '30' ? '30歳～' : $searchCriteria['age'] . '歳' }}」</span>
                  </div>
                @endif
                @if(!empty($searchCriteria['bust']))
                  <div class="groups-girl-search__criteria-item">
                    <span class="groups-girl-search__criteria-label">バストカップ</span>
                    <span class="groups-girl-search__criteria-value">「{{ $searchCriteria['bust'] }}」</span>
                  </div>
                @endif
              </div>
              <div class="groups-girl-search__criteria-row">
                @if(!empty($searchCriteria['personality']))
                  <div class="groups-girl-search__criteria-item">
                    <span class="groups-girl-search__criteria-label">性格</span>
                    <span class="groups-girl-search__criteria-value">「{{ $searchCriteria['personality']->name }}」</span>
                  </div>
                @endif
                @if(!empty($searchCriteria['style']))
                  <div class="groups-girl-search__criteria-item">
                    <span class="groups-girl-search__criteria-label">スタイル</span>
                    <span class="groups-girl-search__criteria-value">「{{ $searchCriteria['style']->name }}」</span>
                  </div>
                @endif
                @if(!empty($searchCriteria['option']))
                  <div class="groups-girl-search__criteria-item">
                    <span class="groups-girl-search__criteria-label">オプション</span>
                    <span class="groups-girl-search__criteria-value">「{{ $searchCriteria['option']->name }}」</span>
                  </div>
                @endif
              </div>
            </div>
          </div>

          <!-- Search Results Grid -->
          <div class="groups-girl-search__results-grid">
            @foreach($searchResults as $cast)
              <a href="{{ route('public.shop.cast.profile', ['shop' => $cast->shop_slug, 'id' => $cast->id]) }}" class="groups-girl-search__card-link">
                <x-public.groups.schedule-card
                  :name="$cast->name ?? 'キャスト名'"
                  :age="str_pad($cast->age ?? '00', 2, '0', STR_PAD_LEFT)"
                  :height="$cast->height ?? '160'"
                  :bust="$cast->bust ?? '85'"
                  :braSize="$cast->bra_size ?? 'C'"
                  :waist="$cast->waist ?? '60'"
                  :hip="$cast->hip ?? '83'"
                  :message="$cast->appeal_point ?? 'メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ'"
                  :shopName="$cast->shop_name ?? '雫'"
                  :imageUrl="$cast->gallery_1 ? asset('storage/' . $cast->gallery_1) : null"
                  :frameImageUrl="$cast->shop_slug ? asset('assets/img/groups/card-frame-' . $cast->shop_slug . '.png') : null"
                  :statusText="isset($attendanceData[$cast->id]) ? '本日出勤' : '出勤中'"
                  :timeRange="isset($attendanceData[$cast->id]) ? ($attendanceData[$cast->id]['start'] . '〜' . $attendanceData[$cast->id]['end']) : '00:00〜00:00'"
                  :isWorkingToday="isset($attendanceData[$cast->id])"
                />
              </a>
            @endforeach
          </div>
          
          <!-- Pagination -->
          @if(isset($searchResults) && method_exists($searchResults, 'hasPages') && $searchResults->hasPages())
            <x-public.groups.pagination :paginator="$searchResults" />
          @endif
        </div>
      @endif

      <form action="{{ route('public.groups.girl-search') }}" method="POST" class="groups-girl-search__form">
        @csrf
        
        <!-- Name Search Section -->
        <div class="groups-girl-search__section">
          <div class="groups-girl-search__name-header">
            <p class="groups-girl-search__name-label">女の子名</p>
          </div>
          <div class="groups-girl-search__name-input-group">
            <div class="groups-girl-search__input-wrapper">
              <input 
                type="text" 
                name="name" 
                class="groups-girl-search__input" 
                placeholder="名前入力で検索"
                value="{{ old('name', ($searchCriteria['name'] ?? null) ?? '') }}"
              >
            </div>
            <div class="groups-girl-search__radio-group">
              <label class="groups-girl-search__radio-label">
                <input 
                  type="radio" 
                  name="name_match" 
                  value="partial" 
                  class="groups-girl-search__radio"
                  {{ old('name_match', ($searchCriteria['name'] ?? null) ? 'partial' : 'partial') === 'partial' ? 'checked' : '' }}
                >
                <span class="groups-girl-search__radio-indicator"></span>
                <span class="groups-girl-search__radio-text">いずれかを含む</span>
              </label>
              <label class="groups-girl-search__radio-label">
                <input 
                  type="radio" 
                  name="name_match" 
                  value="full" 
                  class="groups-girl-search__radio"
                  {{ old('name_match', ($searchCriteria['name'] ?? null) ? 'partial' : 'partial') === 'full' ? 'checked' : '' }}
                >
                <span class="groups-girl-search__radio-indicator"></span>
                <span class="groups-girl-search__radio-text">すべてを含む</span>
              </label>
            </div>
          </div>
        </div>

        <!-- Status Search Section -->
        <div class="groups-girl-search__status-section">
          <div class="groups-girl-search__status-grid">
            <!-- Height -->
            <div class="groups-girl-search__status-item">
              <p class="groups-girl-search__status-label">身長</p>
              <div class="groups-girl-search__select-wrapper">
                <select name="height" class="groups-girl-search__select">
                  <option value="">選択する</option>
                  <option value="150" {{ old('height', ($searchCriteria['height'] ?? null) ?? '') === '150' ? 'selected' : '' }}>～150cm</option>
                  <option value="155" {{ old('height', ($searchCriteria['height'] ?? null) ?? '') === '155' ? 'selected' : '' }}>151cm～155cm</option>
                  <option value="160" {{ old('height', ($searchCriteria['height'] ?? null) ?? '') === '160' ? 'selected' : '' }}>156cm～160cm</option>
                  <option value="165" {{ old('height', ($searchCriteria['height'] ?? null) ?? '') === '165' ? 'selected' : '' }}>161cm～165cm</option>
                  <option value="170" {{ old('height', ($searchCriteria['height'] ?? null) ?? '') === '170' ? 'selected' : '' }}>170cm～</option>
                </select>
                <svg class="groups-girl-search__select-arrow" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 1L8 8L15 1" stroke="#021A21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
            </div>

            <!-- Age -->
            <div class="groups-girl-search__status-item">
              <p class="groups-girl-search__status-label">年齢</p>
              <div class="groups-girl-search__select-wrapper">
                <select name="age" class="groups-girl-search__select">
                  <option value="">選択する</option>
                  @for($i = 18; $i <= 30; $i++)
                    @if($i == 30)
                      <option value="{{ $i }}" {{ old('age', ($searchCriteria['age'] ?? null) ?? '') == $i ? 'selected' : '' }}>30歳～</option>
                    @else
                      <option value="{{ $i }}" {{ old('age', ($searchCriteria['age'] ?? null) ?? '') == $i ? 'selected' : '' }}>{{ $i }}歳</option>
                    @endif
                  @endfor
                </select>
                <svg class="groups-girl-search__select-arrow" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 1L8 8L15 1" stroke="#021A21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
            </div>

            <!-- Bust Cup -->
            <div class="groups-girl-search__status-item">
              <p class="groups-girl-search__status-label">バストカップ</p>
              <div class="groups-girl-search__select-wrapper">
                <select name="bust" class="groups-girl-search__select">
                  <option value="">選択する</option>
                  @foreach(['A','B','C','D','E','F','G','H','I','J'] as $cup)
                    <option value="{{ $cup }}" {{ old('bust', ($searchCriteria['bust'] ?? null) ?? '') === $cup ? 'selected' : '' }}>{{ $cup }}</option>
                  @endforeach
                </select>
                <svg class="groups-girl-search__select-arrow" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 1L8 8L15 1" stroke="#021A21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
            </div>
          </div>
        </div>

        <!-- Personality Section -->
        @php
          $personalitiesCount = $personalities->count();
          $personalitiesPerColumn = ceil($personalitiesCount / 3);
          $personalitiesCol1 = $personalities->take($personalitiesPerColumn);
          $personalitiesCol2 = $personalities->skip($personalitiesPerColumn)->take($personalitiesPerColumn);
          $personalitiesCol3 = $personalities->skip($personalitiesPerColumn * 2);
        @endphp
        <div class="groups-girl-search__feature-section">
          <div class="groups-girl-search__feature-header">
            <p class="groups-girl-search__feature-label">性格</p>
          </div>
          <div class="groups-girl-search__feature-options">
            <div class="groups-girl-search__feature-column">
              <label class="groups-girl-search__feature-radio-label">
                <input 
                  type="radio" 
                  name="personality" 
                  value="-1" 
                  class="groups-girl-search__feature-radio"
                  {{ old('personality', (($searchCriteria['personality'] ?? null) ? ($searchCriteria['personality']->id ?? '-1') : '-1')) == '-1' ? 'checked' : '' }}
                >
                <span class="groups-girl-search__feature-radio-indicator"></span>
                <span class="groups-girl-search__feature-radio-text">すべて</span>
              </label>
              @foreach($personalitiesCol1 as $personality)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="personality" 
                    value="{{ $personality->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('personality', (($searchCriteria['personality'] ?? null) ? ($searchCriteria['personality']->id ?? '-1') : '-1')) == $personality->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $personality->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($personalitiesCol2 as $personality)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="personality" 
                    value="{{ $personality->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('personality', (($searchCriteria['personality'] ?? null) ? ($searchCriteria['personality']->id ?? '-1') : '-1')) == $personality->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $personality->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($personalitiesCol3 as $personality)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="personality" 
                    value="{{ $personality->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('personality', (($searchCriteria['personality'] ?? null) ? ($searchCriteria['personality']->id ?? '-1') : '-1')) == $personality->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $personality->name }}</span>
                </label>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Style Section -->
        @php
          $stylesCount = $styles->count();
          $stylesPerColumn = ceil($stylesCount / 3);
          $stylesCol1 = $styles->take($stylesPerColumn);
          $stylesCol2 = $styles->skip($stylesPerColumn)->take($stylesPerColumn);
          $stylesCol3 = $styles->skip($stylesPerColumn * 2);
        @endphp
        <div class="groups-girl-search__feature-section">
          <div class="groups-girl-search__feature-header">
            <p class="groups-girl-search__feature-label">スタイル</p>
          </div>
          <div class="groups-girl-search__feature-options">
            <div class="groups-girl-search__feature-column">
              <label class="groups-girl-search__feature-radio-label">
                <input 
                  type="radio" 
                  name="style" 
                  value="-1" 
                  class="groups-girl-search__feature-radio"
                  {{ old('style', (($searchCriteria['style'] ?? null) ? ($searchCriteria['style']->id ?? '-1') : '-1')) == '-1' ? 'checked' : '' }}
                >
                <span class="groups-girl-search__feature-radio-indicator"></span>
                <span class="groups-girl-search__feature-radio-text">すべて</span>
              </label>
              @foreach($stylesCol1 as $style)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="style" 
                    value="{{ $style->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('style', (($searchCriteria['style'] ?? null) ? ($searchCriteria['style']->id ?? '-1') : '-1')) == $style->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $style->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($stylesCol2 as $style)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="style" 
                    value="{{ $style->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('style', (($searchCriteria['style'] ?? null) ? ($searchCriteria['style']->id ?? '-1') : '-1')) == $style->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $style->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($stylesCol3 as $style)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="style" 
                    value="{{ $style->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('style', (($searchCriteria['style'] ?? null) ? ($searchCriteria['style']->id ?? '-1') : '-1')) == $style->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $style->name }}</span>
                </label>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Option Section -->
        @php
          $optionsCount = $options->count();
          $optionsPerColumn = ceil($optionsCount / 3);
          $optionsCol1 = $options->take($optionsPerColumn);
          $optionsCol2 = $options->skip($optionsPerColumn)->take($optionsPerColumn);
          $optionsCol3 = $options->skip($optionsPerColumn * 2);
        @endphp
        <div class="groups-girl-search__feature-section">
          <div class="groups-girl-search__feature-header">
            <p class="groups-girl-search__feature-label">オプション</p>
          </div>
          <div class="groups-girl-search__feature-options">
            <div class="groups-girl-search__feature-column">
              <label class="groups-girl-search__feature-radio-label">
                <input 
                  type="radio" 
                  name="option" 
                  value="-1" 
                  class="groups-girl-search__feature-radio"
                  {{ old('option', (($searchCriteria['option'] ?? null) ? ($searchCriteria['option']->id ?? '-1') : '-1')) == '-1' ? 'checked' : '' }}
                >
                <span class="groups-girl-search__feature-radio-indicator"></span>
                <span class="groups-girl-search__feature-radio-text">すべて</span>
              </label>
              @foreach($optionsCol1 as $option)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="option" 
                    value="{{ $option->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('option', (($searchCriteria['option'] ?? null) ? ($searchCriteria['option']->id ?? '-1') : '-1')) == $option->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $option->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($optionsCol2 as $option)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="option" 
                    value="{{ $option->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('option', (($searchCriteria['option'] ?? null) ? ($searchCriteria['option']->id ?? '-1') : '-1')) == $option->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $option->name }}</span>
                </label>
              @endforeach
            </div>
            <div class="groups-girl-search__feature-column">
              @foreach($optionsCol3 as $option)
                <label class="groups-girl-search__feature-radio-label">
                  <input 
                    type="radio" 
                    name="option" 
                    value="{{ $option->id }}" 
                    class="groups-girl-search__feature-radio"
                    {{ old('option', (($searchCriteria['option'] ?? null) ? ($searchCriteria['option']->id ?? '-1') : '-1')) == $option->id ? 'checked' : '' }}
                  >
                  <span class="groups-girl-search__feature-radio-indicator"></span>
                  <span class="groups-girl-search__feature-radio-text">{{ $option->name }}</span>
                </label>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="groups-girl-search__actions">
          <button type="submit" name="status" value="working" class="groups-girl-search__btn groups-girl-search__btn--working">
            「出勤中」の女の子で検索
          </button>
          <button type="submit" class="groups-girl-search__btn groups-girl-search__btn--castlist">
            キャスト一覧から検索
          </button>
        </div>
      </form>
    </div>
  </div>
</x-public-groups-sub-page-layout>

@once
  @vite(['resources/scss/groups/girl-search.scss'])
@endonce
