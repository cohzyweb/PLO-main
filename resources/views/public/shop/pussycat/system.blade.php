<x-pussycat-page-layout page-title="SYSTEM" page-subtitle="料金システム" breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ 料金システム"
    :assets="['resources/scss/shops/pussycat/system.scss']" :banners="$banners">
    <section class="system-section">
        <div class="system-card">
            <div class="system-card-image">
                {{-- @if ($system && $system->header)
                    <img src="{{ asset('storage/' . $system->header) }}" alt="System Image" class="pc-only">
                    <img src="{{ asset('storage/' . $system->header) }}" alt="System Image" class="sp-only">
                @endif --}}
                <img src="{{ asset('assets/img/shops/pussycat/system-image.png') }}" alt="System Image" class="pc-only">
                <img src="{{ asset('assets/img/shops/pussycat/system-image-sp.png') }}" alt="System Image"
                    class="sp-only">
            </div>
        </div>
        {{-- <div class="system-card-content pc-only">
            <p>当店の利用料金システムになります。オプションをご希望の方はフロントスタッフにお伝えください。</p>
        </div> --}}
        {{-- <div class="basic-price sp-only">
            <p>BASIC PRICE</p>
            <h2>基本料金</h2>
        </div> --}}
        <div class="system-board">
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
                <div class="option-method-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.125 26.25C14.8486 26.25 16.5553 25.9105 18.1477 25.2509C19.7401 24.5913 21.187 23.6245 22.4058 22.4058C23.6245 21.187 24.5913 19.7401 25.2509 18.1477C25.9105 16.5553 26.25 14.8486 26.25 13.125C26.25 11.4014 25.9105 9.69468 25.2509 8.10228C24.5913 6.50988 23.6245 5.06299 22.4058 3.84422C21.187 2.62545 19.7401 1.65867 18.1477 0.999081C16.5553 0.339488 14.8486 -2.56836e-08 13.125 0C9.64403 5.18704e-08 6.30564 1.38281 3.84422 3.84422C1.38281 6.30564 0 9.64403 0 13.125C0 16.606 1.38281 19.9444 3.84422 22.4058C6.30564 24.8672 9.64403 26.25 13.125 26.25ZM12.7867 18.4333L20.0783 9.68333L17.8383 7.81667L11.5675 15.3402L8.32271 12.094L6.26063 14.156L10.6356 18.531L11.7644 19.6598L12.7867 18.4333Z"
                            fill="#2A1A08" />
                    </svg>
                    <p>領収書発行可能</p>
                </div>
                <div class="option-method-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.125 26.25C14.8486 26.25 16.5553 25.9105 18.1477 25.2509C19.7401 24.5913 21.187 23.6245 22.4058 22.4058C23.6245 21.187 24.5913 19.7401 25.2509 18.1477C25.9105 16.5553 26.25 14.8486 26.25 13.125C26.25 11.4014 25.9105 9.69468 25.2509 8.10228C24.5913 6.50988 23.6245 5.06299 22.4058 3.84422C21.187 2.62545 19.7401 1.65867 18.1477 0.999081C16.5553 0.339488 14.8486 -2.56836e-08 13.125 0C9.64403 5.18704e-08 6.30564 1.38281 3.84422 3.84422C1.38281 6.30564 0 9.64403 0 13.125C0 16.606 1.38281 19.9444 3.84422 22.4058C6.30564 24.8672 9.64403 26.25 13.125 26.25ZM12.7867 18.4333L20.0783 9.68333L17.8383 7.81667L11.5675 15.3402L8.32271 12.094L6.26063 14.156L10.6356 18.531L11.7644 19.6598L12.7867 18.4333Z"
                            fill="#2A1A08" />
                    </svg>
                    <p>カード利用OK</p>
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
                        <p>外国人の方</p>
                    </div>
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
                        <p>刺青や玉入れがある方</p>
                    </div>
                    <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p>薬物使用者及び関係者  </p>
                    </div>
                    <div class="system-ban-content-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                            fill="none">
                            <path
                                d="M14.6528 10.66L21.3012 17.3084L17.3084 21.3012L10.66 14.6528L3.99279 21.32L0 17.3272L6.66721 10.66L0 3.99279L3.99279 0L10.66 6.66721L17.3272 0.0188335L21.32 4.01162L14.6528 10.66Z"
                                fill="#F21B15" />
                        </svg>
                        <p>見た目や言葉使い、仕草が乱暴な方</p>
                    </div>
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
</x-pussycat-page-layout>
