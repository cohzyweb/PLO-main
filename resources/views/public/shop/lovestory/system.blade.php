<x-lovestory-page-layout page-title="SYSTEM" page-subtitle="料金システム"
    breadcrumb="エッチな女の子育成ヘルス ラブストーリー ＞ トップページ ＞ 料金システム" :assets="['resources/scss/shops/lovestory/system.scss']" :banners="$banners">
    <section class="system-section">
        {{-- <div class="system-card">
            <div class="system-card-image">
                @if ($system && $system->header)
                    <img src="{{ asset('storage/' . $system->header) }}" alt="System Image" class="pc-only">
                    <img src="{{ asset('storage/' . $system->header) }}" alt="System Image" class="sp-only">
                @endif
                <img src="{{ asset('assets/img/shops/shizuku/system-image.png') }}" alt="System Image" class="pc-only">
                <img src="{{ asset('assets/img/shops/shizuku/system-image-sp.png') }}" alt="System Image"
                    class="sp-only">
            </div>
        </div> --}}
        <div class="system-card-content">
            <p>当店の利用料金システムになります。オプションをご希望の方はフロントスタッフにお伝えください。</p>
        </div>
        <div class="basic-price ">
            <p>BASIC PRICE</p>
            <h2>基本料金</h2>
        </div>
        <div class="system-board">
          <div class="system-all-time-content">
            <div class="system-all-time-content-item">
              <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="31.5" cy="31.5" r="31.5" fill="#1C2D48"/>
                <path d="M20.05 38.32C17.5113 38.32 15.1647 37.7333 13.01 36.56L13.65 34.384C14.3753 34.7467 15.0687 35.056 15.73 35.312C16.4127 35.5467 17.0847 35.728 17.746 35.856C18.4287 35.9627 19.122 36.016 19.826 36.016C21.874 36.016 23.4633 35.568 24.594 34.672C25.7247 33.7547 26.29 32.4853 26.29 30.864C26.29 29.7547 26.0127 28.848 25.458 28.144C24.9247 27.44 24.0927 26.9173 22.962 26.576C21.8527 26.2347 20.4127 26.064 18.642 26.064H15.954V23.76L24.37 17.008V16.944H13.234V14.64H28.05V16.944L19.218 23.952V24.016H20.882C23.4633 24.016 25.4473 24.6133 26.834 25.808C28.2207 26.9813 28.914 28.6667 28.914 30.864C28.914 33.2107 28.1247 35.0453 26.546 36.368C24.9887 37.6693 22.8233 38.32 20.05 38.32ZM40.652 38.32C39.3507 38.32 38.1667 38.1813 37.1 37.904C36.0333 37.6267 34.9987 37.2107 33.996 36.656L34.764 34.448C35.7453 35.0027 36.6947 35.408 37.612 35.664C38.5293 35.8987 39.5107 36.016 40.556 36.016C42.6893 36.016 44.3427 35.5467 45.516 34.608C46.7107 33.648 47.308 32.304 47.308 30.576C47.308 28.9547 46.796 27.7173 45.772 26.864C44.7693 25.9893 43.34 25.552 41.484 25.552C40.5667 25.552 39.7773 25.6693 39.116 25.904C38.4547 26.1387 37.804 26.544 37.164 27.12H34.7L35.5 14.64H48.812V16.944H37.804L37.292 24.432H37.356C38.06 24.048 38.764 23.7707 39.468 23.6C40.1933 23.408 40.9933 23.312 41.868 23.312C44.4067 23.312 46.38 23.9627 47.788 25.264C49.196 26.544 49.9 28.336 49.9 30.64C49.9 33.072 49.0893 34.96 47.468 36.304C45.868 37.648 43.596 38.32 40.652 38.32ZM17.262 53V43.64H18.612V44.9H18.648C18.972 44.468 19.386 44.12 19.89 43.856C20.406 43.592 20.994 43.46 21.654 43.46C22.314 43.46 22.866 43.586 23.31 43.838C23.754 44.078 24.054 44.432 24.21 44.9H24.246C24.594 44.42 25.02 44.06 25.524 43.82C26.04 43.58 26.634 43.46 27.306 43.46C28.314 43.46 29.04 43.742 29.484 44.306C29.94 44.858 30.168 45.746 30.168 46.97V53H28.782V47.276C28.782 46.352 28.632 45.686 28.332 45.278C28.044 44.87 27.57 44.666 26.91 44.666C26.166 44.666 25.566 44.912 25.11 45.404C24.654 45.896 24.426 46.55 24.426 47.366V53H23.022V46.88C23.022 46.16 22.86 45.614 22.536 45.242C22.212 44.858 21.75 44.666 21.15 44.666C20.682 44.666 20.256 44.792 19.872 45.044C19.5 45.296 19.2 45.632 18.972 46.052C18.756 46.46 18.648 46.898 18.648 47.366V53H17.262ZM33.0685 41.534V39.86H34.7425V41.534H33.0685ZM33.1945 53V43.64H34.6345V53H33.1945ZM37.9339 53V43.64H39.3199V44.9H39.3559C39.7159 44.432 40.1839 44.078 40.7599 43.838C41.3359 43.586 41.9899 43.46 42.7219 43.46C43.8499 43.46 44.6839 43.766 45.2239 44.378C45.7639 44.99 46.0339 45.944 46.0339 47.24V53H44.6299V47.492C44.6299 46.52 44.4439 45.806 44.0719 45.35C43.7119 44.894 43.1419 44.666 42.3619 44.666C41.7739 44.666 41.2519 44.786 40.7959 45.026C40.3519 45.254 39.9979 45.572 39.7339 45.98C39.4819 46.376 39.3559 46.838 39.3559 47.366V53H37.9339Z" fill="white"/>
                </svg>
              <p>￥8,700-</p>
            </div>
            <div class="system-all-time-content-item">
              <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="31.5" cy="31.5" r="31.5" fill="#1C2D48"/>
                <path d="M24.114 38V33.392H11.57V31.056L24.114 14.64H26.674V31.056H31.09V33.392H26.674V38H24.114ZM14.706 31.056H24.114V18.864H24.05L14.706 30.992V31.056ZM40.652 38.32C39.3507 38.32 38.1667 38.1813 37.1 37.904C36.0333 37.6267 34.9987 37.2107 33.996 36.656L34.764 34.448C35.7453 35.0027 36.6947 35.408 37.612 35.664C38.5293 35.8987 39.5107 36.016 40.556 36.016C42.6893 36.016 44.3427 35.5467 45.516 34.608C46.7107 33.648 47.308 32.304 47.308 30.576C47.308 28.9547 46.796 27.7173 45.772 26.864C44.7693 25.9893 43.34 25.552 41.484 25.552C40.5667 25.552 39.7773 25.6693 39.116 25.904C38.4547 26.1387 37.804 26.544 37.164 27.12H34.7L35.5 14.64H48.812V16.944H37.804L37.292 24.432H37.356C38.06 24.048 38.764 23.7707 39.468 23.6C40.1933 23.408 40.9933 23.312 41.868 23.312C44.4067 23.312 46.38 23.9627 47.788 25.264C49.196 26.544 49.9 28.336 49.9 30.64C49.9 33.072 49.0893 34.96 47.468 36.304C45.868 37.648 43.596 38.32 40.652 38.32ZM17.262 53V43.64H18.612V44.9H18.648C18.972 44.468 19.386 44.12 19.89 43.856C20.406 43.592 20.994 43.46 21.654 43.46C22.314 43.46 22.866 43.586 23.31 43.838C23.754 44.078 24.054 44.432 24.21 44.9H24.246C24.594 44.42 25.02 44.06 25.524 43.82C26.04 43.58 26.634 43.46 27.306 43.46C28.314 43.46 29.04 43.742 29.484 44.306C29.94 44.858 30.168 45.746 30.168 46.97V53H28.782V47.276C28.782 46.352 28.632 45.686 28.332 45.278C28.044 44.87 27.57 44.666 26.91 44.666C26.166 44.666 25.566 44.912 25.11 45.404C24.654 45.896 24.426 46.55 24.426 47.366V53H23.022V46.88C23.022 46.16 22.86 45.614 22.536 45.242C22.212 44.858 21.75 44.666 21.15 44.666C20.682 44.666 20.256 44.792 19.872 45.044C19.5 45.296 19.2 45.632 18.972 46.052C18.756 46.46 18.648 46.898 18.648 47.366V53H17.262ZM33.0685 41.534V39.86H34.7425V41.534H33.0685ZM33.1945 53V43.64H34.6345V53H33.1945ZM37.9339 53V43.64H39.3199V44.9H39.3559C39.7159 44.432 40.1839 44.078 40.7599 43.838C41.3359 43.586 41.9899 43.46 42.7219 43.46C43.8499 43.46 44.6839 43.766 45.2239 44.378C45.7639 44.99 46.0339 45.944 46.0339 47.24V53H44.6299V47.492C44.6299 46.52 44.4439 45.806 44.0719 45.35C43.7119 44.894 43.1419 44.666 42.3619 44.666C41.7739 44.666 41.2519 44.786 40.7959 45.026C40.3519 45.254 39.9979 45.572 39.7339 45.98C39.4819 46.376 39.3559 46.838 39.3559 47.366V53H37.9339Z" fill="white"/>
                </svg>
              <p>￥9,700-</p>
            </div>
            <div class="system-all-time-content-item">
              <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="31.5" cy="31.5" r="31.5" fill="#1C2D48"/>
                <path d="M20.402 39.32C19.1007 39.32 17.9167 39.1813 16.85 38.904C15.7833 38.6267 14.7487 38.2107 13.746 37.656L14.514 35.448C15.4953 36.0027 16.4447 36.408 17.362 36.664C18.2793 36.8987 19.2607 37.016 20.306 37.016C22.4393 37.016 24.0927 36.5467 25.266 35.608C26.4607 34.648 27.058 33.304 27.058 31.576C27.058 29.9547 26.546 28.7173 25.522 27.864C24.5193 26.9893 23.09 26.552 21.234 26.552C20.3167 26.552 19.5273 26.6693 18.866 26.904C18.2047 27.1387 17.554 27.544 16.914 28.12H14.45L15.25 15.64H28.562V17.944H17.554L17.042 25.432H17.106C17.81 25.048 18.514 24.7707 19.218 24.6C19.9433 24.408 20.7433 24.312 21.618 24.312C24.1567 24.312 26.13 24.9627 27.538 26.264C28.946 27.544 29.65 29.336 29.65 31.64C29.65 34.072 28.8393 35.96 27.218 37.304C25.618 38.648 23.346 39.32 20.402 39.32ZM40.652 39.32C39.3507 39.32 38.1667 39.1813 37.1 38.904C36.0333 38.6267 34.9987 38.2107 33.996 37.656L34.764 35.448C35.7453 36.0027 36.6947 36.408 37.612 36.664C38.5293 36.8987 39.5107 37.016 40.556 37.016C42.6893 37.016 44.3427 36.5467 45.516 35.608C46.7107 34.648 47.308 33.304 47.308 31.576C47.308 29.9547 46.796 28.7173 45.772 27.864C44.7693 26.9893 43.34 26.552 41.484 26.552C40.5667 26.552 39.7773 26.6693 39.116 26.904C38.4547 27.1387 37.804 27.544 37.164 28.12H34.7L35.5 15.64H48.812V17.944H37.804L37.292 25.432H37.356C38.06 25.048 38.764 24.7707 39.468 24.6C40.1933 24.408 40.9933 24.312 41.868 24.312C44.4067 24.312 46.38 24.9627 47.788 26.264C49.196 27.544 49.9 29.336 49.9 31.64C49.9 34.072 49.0893 35.96 47.468 37.304C45.868 38.648 43.596 39.32 40.652 39.32ZM17.262 54V44.64H18.612V45.9H18.648C18.972 45.468 19.386 45.12 19.89 44.856C20.406 44.592 20.994 44.46 21.654 44.46C22.314 44.46 22.866 44.586 23.31 44.838C23.754 45.078 24.054 45.432 24.21 45.9H24.246C24.594 45.42 25.02 45.06 25.524 44.82C26.04 44.58 26.634 44.46 27.306 44.46C28.314 44.46 29.04 44.742 29.484 45.306C29.94 45.858 30.168 46.746 30.168 47.97V54H28.782V48.276C28.782 47.352 28.632 46.686 28.332 46.278C28.044 45.87 27.57 45.666 26.91 45.666C26.166 45.666 25.566 45.912 25.11 46.404C24.654 46.896 24.426 47.55 24.426 48.366V54H23.022V47.88C23.022 47.16 22.86 46.614 22.536 46.242C22.212 45.858 21.75 45.666 21.15 45.666C20.682 45.666 20.256 45.792 19.872 46.044C19.5 46.296 19.2 46.632 18.972 47.052C18.756 47.46 18.648 47.898 18.648 48.366V54H17.262ZM33.0685 42.534V40.86H34.7425V42.534H33.0685ZM33.1945 54V44.64H34.6345V54H33.1945ZM37.9339 54V44.64H39.3199V45.9H39.3559C39.7159 45.432 40.1839 45.078 40.7599 44.838C41.3359 44.586 41.9899 44.46 42.7219 44.46C43.8499 44.46 44.6839 44.766 45.2239 45.378C45.7639 45.99 46.0339 46.944 46.0339 48.24V54H44.6299V48.492C44.6299 47.52 44.4439 46.806 44.0719 46.35C43.7119 45.894 43.1419 45.666 42.3619 45.666C41.7739 45.666 41.2519 45.786 40.7959 46.026C40.3519 46.254 39.9979 46.572 39.7339 46.98C39.4819 47.376 39.3559 47.838 39.3559 48.366V54H37.9339Z" fill="white"/>
                </svg>
              <p>￥10,700-</p>
            </div>
          </div>
          <div class="system-all-time-fee">
            <div class="system-all-time-fee-item">
              <div class="fee-item-header">
                  <p>指名料</p>
              </div>
              <span>￥2,000-</span>
            </div>
            <div class="system-all-time-fee-item">
                <div class="fee-item-header">
                    <p>延長30分</p>
                </div>
                <span>￥8,000-</span>
            </div>

          </div>
          <div class="option">
            <p>OPTION</p>
            <h2>オプション</h2>
          </div>
          <div class="option-list">
              <div class="option-list-header">
                  <p>￥500</p>
              </div>
              <div class="option-list-items">
                  <div class="option-list-item">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                          <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                      </svg>
                      <p>ローター</p>
                  </div>
                  <div class="option-list-item">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                          <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                      </svg>
                      <p>ワイヤレスローター</p>
                  </div>
                  <div class="option-list-item">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                          <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                      </svg>
                      <p>オナニー観賞</p>
                  </div>
                  <div class="option-list-item">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                          <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                      </svg>
                      <p>パンスト</p>
                  </div>
              </div>
          </div>
          <div class="option-list">
              <div class="option-list-header">
                  <p>￥1,000</p>
              </div>
              <div class="option-list-items">
                  <div class="option-list-item">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                          <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                      </svg>
                      <p>電マ</p>
                  </div>
                  <div class="option-list-item">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                          <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                      </svg>
                      <p>コスプレ</p>
                  </div>
                  <div class="option-list-item">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                          <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                      </svg>
                      <p>生パンティお持ち帰り</p>
                  </div>
              </div>
          </div>
          <div class="option-list">
              <div class="option-list-header">
                  <p>￥2,000</p>
              </div>
              <div class="option-list-items">
                  <div class="option-list-item">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                          <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                      </svg>
                      <p>顔射</p>
                  </div>
              </div>
          </div>
          <div class="option-list">
              <div class="option-list-header">
                  <p>￥5,000</p>
              </div>
              <div class="option-list-items">
                  <div class="option-list-item">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                          <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                      </svg>
                      <p>AF</p>
                  </div>
              </div>
          </div>
            {{-- <div class="system-all-time">
                <p>オールタイム</p>
            </div> --}}
            {{-- <div class="system-all-time-content">
                @foreach ($courses as $cours)
                    <div class="system-all-time-content-item">
                        <div class="system-item-cours-name">
                            <svg xmlns="http://www.w3.org/2000/svg" width="63" height="63" viewBox="0 0 63 63"
                                fill="none">
                                <circle cx="31.5" cy="31.5" r="31.5" fill="#2A1A08" />
                            </svg>
                            <span>{{ $cours->course }}<span>
                        </div>
                        <p>￥{{ number_format($cours->price) }}-</p>
                    </div>
                @endforeach

            </div> --}}
            {{-- <div class="system-all-time-fee">
                @foreach ($appoints as $appoint)
                    <div class="system-all-time-fee-item">
                        <div class="fee-item-header">
                            <p>指名料</p>
                        </div>
                        <span>￥{{ $appoint->repeat_price == 0 ? number_format($appoint->panel_price) : number_format($appoint->repeat_price) }}-</span>
                    </div>
                @endforeach
                @foreach ($extends as $extend)
                    <div class="system-all-time-fee-item">
                        <div class="fee-item-header">
                            <p>延長{{ $extend->extend }}</p>
                        </div>
                        <span>￥{{ number_format($extend->price) }}-</span>
                    </div>
                @endforeach
                <div class="system-all-time-fee-item">
                    <div class="fee-item-header">
                        <p>指名料</p>
                    </div>
                    <span>￥2,000-</span>
                </div>
                <div class="system-all-time-fee-item">
                    <div class="fee-item-header">
                        <p>延長30分</p>
                    </div>
                    <span>￥11,000-</span>
                </div>
            </div>
            <div class="basic-play">
                <p>BASIC PLAY</p>
                <h2>基本プレイ</h2>
            </div>
            <div class="basic-play-image">
                @if ($system && $system->play)
                    <img src="{{ asset('storage/' . $system->play) }}" alt="Basic Play Image">
                @else
                    <span class="basic-play-content">キス｜全身リップ｜フェラ｜玉舐め｜スマタ</span>
                @endif
            </div>
            <div class="basic-play-content sp-only">
                <p>キス｜全身リップ｜フェラ</p>
                <p>玉舐め｜スマタ</p>
            </div> --}}
            {{-- <div class="option">
                <p>OPTION</p>
                <h2>オプション</h2>
            </div>
            <div class="option-list">
                <div class="option-list-header">
                    <p>￥500</p>
                </div>
                <div class="option-list-items">
                    <div class="option-list-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                            <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                        </svg>
                        <p>ローター</p>
                    </div>
                    <div class="option-list-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                            <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                        </svg>
                        <p>ワイヤレスローター</p>
                    </div>
                    <div class="option-list-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                            <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                        </svg>
                        <p>オナニー観賞</p>
                    </div>
                    <div class="option-list-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                            <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                        </svg>
                        <p>パンスト</p>
                    </div>
                </div>
            </div>
            <div class="option-list">
                <div class="option-list-header">
                    <p>￥1,000</p>
                </div>
                <div class="option-list-items">
                    <div class="option-list-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                            <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                        </svg>
                        <p>電マ</p>
                    </div>
                    <div class="option-list-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                            <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                        </svg>
                        <p>コスプレ</p>
                    </div>
                    <div class="option-list-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                            <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                        </svg>
                        <p>生パンティお持ち帰り</p>
                    </div>
                </div>
            </div>
            <div class="option-list">
                <div class="option-list-header">
                    <p>￥2,000</p>
                </div>
                <div class="option-list-items">
                    <div class="option-list-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                            <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                        </svg>
                        <p>顔射</p>
                    </div>
                </div>
            </div>
            <div class="option-list">
                <div class="option-list-header">
                    <p>￥5,000</p>
                </div>
                <div class="option-list-items">
                    <div class="option-list-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                            <circle cx="7.5" cy="7.5" r="7.5" fill="#1C2D48"/>
                        </svg>
                        <p>AF</p>
                    </div>
                </div>
            </div> --}}
            <div class="option-divider">
            </div>
            <div class="option-methods">
                {{-- <div class="option-method-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.125 26.25C14.8486 26.25 16.5553 25.9105 18.1477 25.2509C19.7401 24.5913 21.187 23.6245 22.4058 22.4058C23.6245 21.187 24.5913 19.7401 25.2509 18.1477C25.9105 16.5553 26.25 14.8486 26.25 13.125C26.25 11.4014 25.9105 9.69468 25.2509 8.10228C24.5913 6.50988 23.6245 5.06299 22.4058 3.84422C21.187 2.62545 19.7401 1.65867 18.1477 0.999081C16.5553 0.339488 14.8486 -2.56836e-08 13.125 0C9.64403 5.18704e-08 6.30564 1.38281 3.84422 3.84422C1.38281 6.30564 0 9.64403 0 13.125C0 16.606 1.38281 19.9444 3.84422 22.4058C6.30564 24.8672 9.64403 26.25 13.125 26.25ZM12.7867 18.4333L20.0783 9.68333L17.8383 7.81667L11.5675 15.3402L8.32271 12.094L6.26063 14.156L10.6356 18.531L11.7644 19.6598L12.7867 18.4333Z"
                            fill="#2A1A08" />
                    </svg>
                    <p>領収書発行可能</p>
                </div> --}}
                <div class="option-method-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.125 26.25C14.8486 26.25 16.5553 25.9105 18.1477 25.2509C19.7401 24.5913 21.187 23.6245 22.4058 22.4058C23.6245 21.187 24.5913 19.7401 25.2509 18.1477C25.9105 16.5553 26.25 14.8486 26.25 13.125C26.25 11.4014 25.9105 9.69468 25.2509 8.10228C24.5913 6.50988 23.6245 5.06299 22.4058 3.84422C21.187 2.62545 19.7401 1.65867 18.1477 0.999081C16.5553 0.339488 14.8486 -2.56836e-08 13.125 0C9.64403 5.18704e-08 6.30564 1.38281 3.84422 3.84422C1.38281 6.30564 0 9.64403 0 13.125C0 16.606 1.38281 19.9444 3.84422 22.4058C6.30564 24.8672 9.64403 26.25 13.125 26.25ZM12.7867 18.4333L20.0783 9.68333L17.8383 7.81667L11.5675 15.3402L8.32271 12.094L6.26063 14.156L10.6356 18.531L11.7644 19.6598L12.7867 18.4333Z"
                            fill="#2A1A08" />
                    </svg>
                    <p>各種カード利用OK</p>
                </div>
                {{-- <div class="option-method-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.125 26.25C14.8486 26.25 16.5553 25.9105 18.1477 25.2509C19.7401 24.5913 21.187 23.6245 22.4058 22.4058C23.6245 21.187 24.5913 19.7401 25.2509 18.1477C25.9105 16.5553 26.25 14.8486 26.25 13.125C26.25 11.4014 25.9105 9.69468 25.2509 8.10228C24.5913 6.50988 23.6245 5.06299 22.4058 3.84422C21.187 2.62545 19.7401 1.65867 18.1477 0.999081C16.5553 0.339488 14.8486 -2.56836e-08 13.125 0C9.64403 5.18704e-08 6.30564 1.38281 3.84422 3.84422C1.38281 6.30564 0 9.64403 0 13.125C0 16.606 1.38281 19.9444 3.84422 22.4058C6.30564 24.8672 9.64403 26.25 13.125 26.25ZM12.7867 18.4333L20.0783 9.68333L17.8383 7.81667L11.5675 15.3402L8.32271 12.094L6.26063 14.156L10.6356 18.531L11.7644 19.6598L12.7867 18.4333Z"
                            fill="#2A1A08" />
                    </svg>
                    <p>身体障害者サポート可</p>
                </div> --}}
            </div>
            <div class="credit-system">
                <p>クレジット決済可能</p>
            </div>
            <div class="credit-card-image">
                <img src="{{ asset('assets/img/shops/shizuku/credit-card-image.png') }}" alt="Credit Card Image">
            </div>
            <div class="system-ban-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84"
                    fill="none">
                    <path
                        d="M68.25 2.625H15.75C8.50106 2.625 2.625 8.50106 2.625 15.75V68.25C2.625 75.4989 8.50106 81.375 15.75 81.375H68.25C75.4989 81.375 81.375 75.4989 81.375 68.25V15.75C81.375 8.50106 75.4989 2.625 68.25 2.625ZM39.375 43.3125V55.125H36.2827L17.5009 36.3392V55.125H13.125V28.875H16.2172L35.0004 47.6556V28.875H39.375V43.3125ZM70.875 41.9974C70.875 49.2371 64.9897 55.125 57.75 55.125C50.5142 55.125 44.625 49.2371 44.625 41.9974C44.625 34.7603 50.5142 28.875 57.75 28.875C61.1179 28.875 64.3217 30.1468 66.7669 32.4608L63.7613 35.637C62.1381 34.0991 59.986 33.2439 57.75 33.2483C55.4303 33.2507 53.2064 34.1732 51.5661 35.8135C49.9259 37.4537 49.0033 39.6777 49.0009 41.9974C49.003 44.3174 49.9253 46.5418 51.5656 48.1826C53.2058 49.8233 55.43 50.7463 57.75 50.7491C59.689 50.7472 61.5725 50.1022 63.1056 48.9151C64.6388 47.728 65.7348 46.066 66.2222 44.1892H57.75V39.8108H70.875V41.9974Z"
                        fill="#FFE600" />
                </svg>
                <p>当店コンパニオンが最大限心のこもったサービスを提供させていただく為に、申し訳ございませんが下記の方の入店は固くお断りさせていただいております。</p>
            </div>
            <div class="system-ban-content">
                <div class="system-ban-content-items">
                    <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p>暴力団及び関係者の方</p>
                    </div>
                    <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p>刺青や玉入れがある方&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    </div>
                    <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p>薬物使用者及び関係者</p>
                    </div>
                    <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p>見た目や言葉使い、仕草が乱暴な方  </p>
                    </div>
                    {{-- <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p>見た目や言葉使い、仕草が乱暴な方</p>
                    </div> --}}
                    <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p class="red-color">当店コンパニオンに対する乱暴な行為、嫌がる行為、及び変態行為をされる方</p>
                    </div>
                    <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p>当店スタッフが酔っていると判断された方</p>
                    </div>
                    <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p>店外デートやその他あらゆる勧誘行為及びスカウト行為をされる方</p>
                    </div>
                    <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p>18歳未満の方</p>
                    </div>
                    <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p>当店スタッフがそれと判断された方</p>
                    </div>
                    <div class="system-ban-alert">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.875 24.5C19.2953 24.5 24.5 19.2953 24.5 12.875C24.5 6.45469 19.2953 1.25 12.875 1.25C6.45469 1.25 1.25 6.45469 1.25 12.875C1.25 19.2953 6.45469 24.5 12.875 24.5Z"
                                stroke="#FFDA89" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12.875 18.0415H12.885V18.0515H12.875V18.0415Z" stroke="#FFDA89"
                                stroke-width="3.75" stroke-linejoin="round" />
                            <path d="M12.875 12.8752V7.7085" stroke="#FFDA89" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>当店は外国人の方のご利用、入店はお断りしております。</p>
                    </div>
                    <div class="system-ban-details">
                        <p class="pc-only">尚、入店後発覚した場合はただちに退店していただき、</p>
                        <p class="pc-only">料金の返金もいたしません。</p>
                        <p class="sp-only">尚、入店後発覚した場合はただちに退店していただき、料金の返金もいたしません。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-lovestory-page-layout>
