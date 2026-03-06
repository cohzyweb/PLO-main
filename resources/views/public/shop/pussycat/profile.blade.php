<x-pussycat-page-layout page-title="PROFILE" page-subtitle="女の子プロフィール"
    breadcrumb="すすきのエンターテインメントヘルス プッシーキャット ＞ トップページ ＞ 女の子プロフィール" :assets="['resources/scss/shops/pussycat/profile.scss', 'resources/js/shops/shizuku/profile.js']" :banners="$banners">
    <div class="flex w-full mt-6 mobile-profile-content max-md:mt-0">
        <div class="profile-left-colum">
            <div class="girl-info-section-wrapper">
                <button class="profile-image-prev" type="button" aria-label="Previous image">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="49" viewBox="0 0 26 49"
                        fill="none">
                        <path
                            d="M24.5626 4.05219C24.7792 3.8229 24.9486 3.55318 25.0611 3.25843C25.1735 2.96368 25.2268 2.64967 25.2179 2.33433C25.2089 2.01898 25.138 1.70849 25.0091 1.42056C24.8802 1.13264 24.6958 0.872923 24.4665 0.65625C24.2372 0.439577 23.9675 0.270188 23.6727 0.157753C23.378 0.0453185 23.064 -0.00795991 22.7486 0.000960667C22.4333 0.00988125 22.1228 0.0808257 21.8349 0.209744C21.5469 0.338661 21.2872 0.523028 21.0706 0.752317L0.656475 22.3672C0.234897 22.8131 0 23.4035 0 24.0172C0 24.6308 0.234897 25.2212 0.656475 25.6671L21.0706 47.2844C21.2858 47.5187 21.5455 47.7079 21.8344 47.841C22.1234 47.9741 22.436 48.0485 22.7539 48.0598C23.0719 48.0711 23.3889 48.0191 23.6866 47.9068C23.9843 47.7946 24.2568 47.6243 24.4881 47.4058C24.7194 47.1874 24.9051 46.9252 25.0342 46.6344C25.1633 46.3436 25.2334 46.03 25.2403 45.712C25.2472 45.3939 25.1909 45.0776 25.0745 44.7814C24.9582 44.4853 24.7842 44.2152 24.5626 43.9869L5.70476 24.0172L24.5626 4.05219Z"
                            fill="white" />
                    </svg>
                </button>

                <div class="girl-info-section">
                    <img src="{{ asset('storage/' . $cast->gallery_1) }}" alt="{{ $cast->name }}"
                        class="cast-image main-image" id="mainImage">
                    <img src="{{ asset('assets/img/shops/pussycat/card-frame.png') }}" alt="Frame"
                        class="cast-frame">
                </div>

                <button class="profile-image-next" type="button" aria-label="Next image">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="49" viewBox="0 0 26 49"
                        fill="none">
                        <path
                            d="M0.678404 4.05219C0.461731 3.8229 0.292343 3.55318 0.179909 3.25843C0.0674725 2.96368 0.0141945 2.64967 0.0231152 2.33433C0.0320358 2.01898 0.10298 1.70849 0.231897 1.42056C0.360815 1.13264 0.545181 0.872923 0.774469 0.65625C1.00376 0.439577 1.27348 0.270188 1.56823 0.157753C1.86299 0.0453185 2.17699 -0.00795991 2.49234 0.000960667C2.80768 0.00988125 3.11818 0.0808257 3.4061 0.209744C3.69403 0.338661 3.95374 0.523028 4.17041 0.752317L24.5845 22.3672C25.0061 22.8131 25.241 23.4035 25.241 24.0172C25.241 24.6308 25.0061 25.2212 24.5845 25.6671L4.17041 47.2844C3.95517 47.5187 3.69551 47.7079 3.40653 47.841C3.11755 47.9741 2.805 48.0485 2.48703 48.0598C2.16907 48.0711 1.85202 48.0191 1.55432 47.9068C1.25662 47.7946 0.984192 47.6243 0.752863 47.4058C0.521534 47.1874 0.335915 46.9252 0.206785 46.6344C0.0776577 46.3436 0.00759506 46.03 0.000667572 45.712C-0.00625992 45.3939 0.0500851 45.0776 0.166431 44.7814C0.282778 44.4853 0.456804 44.2152 0.678404 43.9869L19.5362 24.0172L0.678404 4.05219Z"
                            fill="white" />
                    </svg>
                </button>
            </div>

            <div class="girl-photo-gallery">
                @foreach ($gallerys as $gallery)
                    <div class="girl-photo-gallery-item" data-index="{{ $loop->index }}">
                        <img src="{{ asset('storage/' . $gallery) }}" alt="{{ $cast->name }}" class="cast-image">
                    </div>
                @endforeach
                {{-- @for ($i = 0; $i < 10; $i++)
                    <div class="girl-photo-gallery-item" data-index="{{ $i }}">
                        <img src="{{ asset('assets/img/shops/shizuku/castlist.png') }}" alt="Cast {{ $i + 1 }}"
                            class="cast-image">
                    </div>
                @endfor --}}
            </div>
            @if (count($videos) > 0)
                <div class="girl-video">
                    <div class="girl-video-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18"
                            fill="none">
                            <path
                                d="M25 0V18H0V0H25ZM3.78516 1.724C3.58984 1.524 2.16406 1.515 2.00098 1.799C1.92578 1.93 1.91406 3.881 1.94922 4.155C1.96973 4.316 1.9873 4.47 2.14844 4.551C2.38184 4.667 3.64648 4.669 3.80176 4.443C3.96973 4.199 3.97461 1.919 3.78516 1.724ZM21.2148 1.724C21.0244 1.919 21.0312 4.199 21.1992 4.443C21.3545 4.669 22.6191 4.667 22.8525 4.551C23.0137 4.47 23.0312 4.316 23.0518 4.155C23.0859 3.881 23.0752 1.93 23 1.799C22.8359 1.515 21.4092 1.524 21.2148 1.724ZM9.92969 5.113C9.69043 5.24 9.68555 5.503 9.66406 5.745C9.47559 7.877 9.81738 10.291 9.66406 12.454C9.66602 12.783 9.89258 12.947 10.1953 12.899L16.3975 9.236C16.5615 9.007 16.4658 8.766 16.2451 8.614L10.4893 5.21L9.92969 5.112V5.113ZM2.2168 7.32C2.05859 7.368 1.98438 7.494 1.95605 7.653C1.90918 7.909 1.92285 9.835 2.00195 10.001C2.13379 10.279 3.4668 10.273 3.71191 10.151C3.87305 10.07 3.89062 9.916 3.91113 9.755C3.94727 9.467 3.94141 7.675 3.8584 7.5C3.72754 7.224 2.4873 7.239 2.21777 7.321L2.2168 7.32ZM21.3574 7.32C21.1992 7.368 21.125 7.494 21.0967 7.653C21.0498 7.909 21.0635 9.835 21.1426 10.001C21.2744 10.279 22.6074 10.273 22.8525 10.151C23.0137 10.07 23.0312 9.916 23.0518 9.755C23.0879 9.467 23.082 7.675 22.999 7.5C22.8682 7.224 21.6279 7.239 21.3584 7.321L21.3574 7.32ZM3.78516 13.524C3.46289 13.359 2.16016 13.267 2.00098 13.6C1.91797 13.774 1.91113 15.661 1.94824 15.955C1.96875 16.116 1.98633 16.27 2.14746 16.351C2.37012 16.462 3.67578 16.461 3.81543 16.234C3.9668 15.99 3.96973 13.713 3.78516 13.524ZM21.2148 16.276C21.4102 16.476 22.8359 16.485 22.999 16.201C23.0742 16.07 23.0859 14.119 23.0508 13.845C23.0303 13.684 23.0127 13.53 22.8516 13.449C22.6182 13.333 21.3535 13.331 21.1982 13.557C21.0303 13.801 21.0254 16.081 21.2148 16.276Z"
                                fill="#05F2DB" />
                        </svg>
                        <h3>キャスト動画</h3>
                    </div>
                    <div class="girl-video-container">
                        @foreach ($videos as $video)
                            <div class="girl-video-item">
                                <video class="movie-item__image" controls autoplay muted
                                    poster="{{ asset('storage/' . $video->thumb_url) }}">
                                    <source src="{{ $video->video_url }}" type="video/mp4">
                                </video>
                            </div>
                        @endforeach
                        {{-- <div class="girl-video-item">
                        <video controls>
                            <source src="#" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="girl-video-item">
                        <video controls>
                            <source src="#" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div> --}}
                    </div>
                </div>
            @endif
        </div>
        <div class="profile-right-column">
            <div class="girl-basic-info">
                <div class="girl-basic-info-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                        fill="none">
                        <path
                            d="M7.68904 19.2688C7.0748 18.0755 6.12269 17.1995 4.69013 17.2806C4.11398 17.3128 3.57201 17.639 3.03004 17.6761C1.87188 17.7552 2.31034 17.0706 2.17949 16.2816C2.11211 15.8744 1.83575 15.7133 1.76935 15.5297C1.72345 15.4008 1.85235 15.1146 1.81427 14.8939C1.77814 14.686 1.56233 14.5981 1.55061 14.5024C1.53987 14.4047 1.69416 14.1684 1.71076 14.0004C1.81232 12.9721 0.86704 12.8286 0.830909 12.4448C0.808449 12.2026 1.38167 11.6831 1.5594 11.4156C2.15898 10.5123 2.3621 9.58166 2.30155 8.49479L3.37378 9.37366C3.26831 8.76821 3.198 6.29468 3.81517 6.05445L5.62271 8.73599C6.25062 9.526 7.35604 10.7027 8.32769 11.0113C8.78275 11.1558 9.15968 11.064 9.52198 11.1841C9.99461 11.3414 10.812 12.4429 11.3334 12.6929C11.476 11.8169 12.2055 9.42346 13.4359 9.80626C14.2581 10.0621 13.8695 11.6763 13.6449 12.272C13.4798 12.7095 12.8051 13.6381 12.7533 13.9194C12.6283 14.5912 12.8519 15.5551 12.7426 16.2523C12.6869 16.6058 12.3519 16.9593 12.2836 17.3558C11.9398 19.3645 13.6078 22.3165 15.4817 23.1427L15.7708 22.3692C14.2747 21.7716 12.8597 19.1682 13.0502 17.6341C13.1752 16.6263 16.0637 13.2622 16.7688 11.978C18.3185 9.15785 18.2892 6.35229 16.5569 3.61314C18.8995 4.05062 19.3985 5.64431 18.8283 7.78778C18.0216 10.8209 15.6702 14.3627 17.1887 17.5794C17.5949 18.4397 19.0411 19.9201 20.0235 19.9201H22.0254C21.2813 18.9163 20.4444 17.888 20.1964 16.6224C19.6271 13.7133 21.9131 11.7759 22.8808 9.30237C24.1376 6.08863 23.7704 2.26261 20.3331 0.666966C17.9523 -0.437483 16.5168 0.412093 14.261 1.22944C13.679 0.942346 13.1332 0.586891 12.5072 0.38768C11.9115 0.198234 11.2983 0.151361 10.6977 0H9.42823L6.88927 0.537088C5.82095 1.00484 4.77997 1.32612 3.68138 1.62591C1.68439 2.17081 -0.25694 3.69614 0.564317 5.98316C0.738139 6.46752 1.17367 6.89426 1.29964 7.29854C1.35823 7.48799 1.54963 8.88735 1.52424 9.02992C1.50959 9.11 1.49885 9.18226 1.42268 9.22913C0.976411 9.40979 0.54381 9.52404 0.0545717 9.47229C0.29675 9.80626 0.821143 9.84532 1.17953 9.9586C1.29085 9.99375 1.35237 9.88633 1.32405 10.1051C1.19515 11.1148 -0.594817 11.9507 0.204956 13.0815C0.387567 13.3393 0.811378 13.4585 0.894383 13.7661C0.969575 14.0444 0.621932 14.2699 0.641463 14.5912C0.660017 14.8998 0.98227 15.0512 1.00864 15.1957C1.03696 15.3529 0.876805 15.5345 0.973481 15.8256C1.05551 16.0716 1.31624 16.0736 1.38069 16.2992C1.5594 16.9251 1.19222 17.5569 1.80743 18.1204C3.1023 19.3039 4.90301 16.9378 6.49768 18.8987C7.62654 20.2863 8.39604 22.9571 6.91954 24.3653L7.3785 25H7.47616C9.02492 23.251 8.68216 21.1994 7.68904 19.2698V19.2688Z"
                            fill="#05F2DB" />
                    </svg>
                    <h3>女の子情報</h3>
                </div>
                <div class="girl-basic-info-body">
                    <h4 class="girl-basic-info-name">{{ $cast->name }}</h4>
                    <p class="girl-basic-info-meta">{{ $cast->age }}歳 /
                        T{{ $cast->height }}&nbsp;B{{ $cast->bust }}(F)&nbsp;W{{ $cast->waist }}&nbsp;H{{ $cast->hip }}
                    </p>
                </div>
                <p class="girl-basic-info-caption">{{ $cast->catch_copy }}</p>
            </div>

            <div class="girl-qa-section">
                <div class="girl-qa-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                        fill="none">
                        <path
                            d="M21.875 4.6875H23.4375V20.3125H20.3125V25L15.625 20.3125H9.375L10.9375 18.75H16.272L18.75 21.228V18.75H21.875V4.6875ZM9.375 17.1875L4.6875 21.875V17.1875H0V0H20.3125V17.1875H9.375ZM1.5625 15.625H6.25V18.103L8.72803 15.625H18.75V1.5625H1.5625V15.625ZM9.375 14.0625V12.5H10.9375V14.0625H9.375ZM10.1562 4.6875C9.93652 4.6875 9.73307 4.72819 9.5459 4.80957C9.35872 4.89095 9.19596 5.00081 9.05762 5.13916C8.91927 5.27751 8.80534 5.44434 8.71582 5.63965C8.6263 5.83496 8.58561 6.03841 8.59375 6.25H7.03125C7.03125 5.81869 7.11263 5.41585 7.27539 5.0415C7.43815 4.66715 7.66195 4.3335 7.94678 4.04053C8.23161 3.74756 8.5612 3.52376 8.93555 3.36914C9.3099 3.21452 9.7168 3.13314 10.1562 3.125C10.5876 3.125 10.9904 3.20638 11.3647 3.36914C11.7391 3.5319 12.0728 3.7557 12.3657 4.04053C12.6587 4.32536 12.8825 4.65495 13.0371 5.0293C13.1917 5.40365 13.2731 5.81055 13.2812 6.25C13.2812 6.62435 13.2243 6.95394 13.1104 7.23877C12.9964 7.5236 12.8459 7.78809 12.6587 8.03223C12.4715 8.27637 12.2599 8.5083 12.0239 8.72803C11.7879 8.94775 11.5479 9.18376 11.3037 9.43604C11.141 9.5988 11.0392 9.76969 10.9985 9.94873C10.9578 10.1278 10.9334 10.319 10.9253 10.5225V10.7178C10.9253 10.7829 10.9294 10.8561 10.9375 10.9375H9.375V10.3516C9.375 9.97721 9.43197 9.64762 9.5459 9.36279C9.65983 9.07796 9.80225 8.82161 9.97314 8.59375C10.144 8.36589 10.3353 8.16243 10.5469 7.9834C10.7585 7.80436 10.9456 7.62126 11.1084 7.43408C11.2712 7.24691 11.4176 7.0638 11.5479 6.88477C11.6781 6.70573 11.735 6.49414 11.7188 6.25C11.7188 6.03027 11.6781 5.82682 11.5967 5.63965C11.5153 5.45247 11.4054 5.28971 11.2671 5.15137C11.1287 5.01302 10.9619 4.89909 10.7666 4.80957C10.5713 4.72005 10.3678 4.67936 10.1562 4.6875Z"
                            fill="#05F2DB" />
                    </svg>
                    <h3>女の子に質問</h3>
                </div>
                <div class="girl-qa-content">
                    @foreach ($qas as $qa)
                        <div class="girl-qa-row">
                            <div class="girl-qa-question">
                                <span class="girl-qa-label">Q.</span>
                                <span class="girl-qa-text">{{ $qa->question->question }}</span>
                            </div>
                            <div class="girl-qa-answer">
                                <span class="girl-qa-label">A.</span>
                                <span class="girl-qa-text">{{ $qa->answer }}</span>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="girl-qa-row">
                        <div class="girl-qa-question">
                            <span class="girl-qa-label">Q.</span>
                            <span class="girl-qa-text">あなたのチャームポイントは?</span>
                        </div>
                        <div class="girl-qa-answer">
                            <span class="girl-qa-label">A.</span>
                            <span class="girl-qa-text">笑顔と変顔</span>
                        </div>
                    </div>
                    <div class="girl-qa-row">
                        <div class="girl-qa-question">
                            <span class="girl-qa-label">Q.</span>
                            <span class="girl-qa-text">あなたの趣味は?</span>
                        </div>
                        <div class="girl-qa-answer">
                            <span class="girl-qa-label">A.</span>
                            <span class="girl-qa-text">絵を描くこと</span>
                        </div>
                    </div>
                    <div class="girl-qa-row">
                        <div class="girl-qa-question">
                            <span class="girl-qa-label">Q.</span>
                            <span class="girl-qa-text">最近のマイブームは?</span>
                        </div>
                        <div class="girl-qa-answer">
                            <span class="girl-qa-label">A.</span>
                            <span class="girl-qa-text">猫のおもちゃ作り</span>
                        </div>
                    </div>
                    <div class="girl-qa-row">
                        <div class="girl-qa-question">
                            <span class="girl-qa-label">Q.</span>
                            <span class="girl-qa-text">好きな男性の仕草は?</span>
                        </div>
                        <div class="girl-qa-answer">
                            <span class="girl-qa-label">A.</span>
                            <span class="girl-qa-text">笑った時の顔・声</span>
                        </div>
                    </div>
                    <div class="girl-qa-row">
                        <div class="girl-qa-question">
                            <span class="girl-qa-label">Q.</span>
                            <span class="girl-qa-text">どんなこと言われたら興奮する?</span>
                        </div>
                        <div class="girl-qa-answer">
                            <span class="girl-qa-label">A.</span>
                            <span class="girl-qa-text">妄想力が豊かすぎるので、基本何でも(笑)</span>
                        </div>
                    </div>
                    <div class="girl-qa-row">
                        <div class="girl-qa-question">
                            <span class="girl-qa-label">Q.</span>
                            <span class="girl-qa-text">あなたの性感帯は?</span>
                        </div>
                        <div class="girl-qa-answer">
                            <span class="girl-qa-label">A.</span>
                            <span class="girl-qa-text">関節の内側</span>
                        </div>
                    </div>
                    <div class="girl-qa-row">
                        <div class="girl-qa-question">
                            <span class="girl-qa-label">Q.</span>
                            <span class="girl-qa-text">好きなプレイは?</span>
                        </div>
                        <div class="girl-qa-answer">
                            <span class="girl-qa-label">A.</span>
                            <span class="girl-qa-text">妄想力が豊かすぎるので、基本何でも(笑)</span>
                        </div>
                    </div>
                    <div class="girl-qa-row">
                        <div class="girl-qa-question">
                            <span class="girl-qa-label">Q.</span>
                            <span class="girl-qa-text">お客様になんて呼ばれたい?</span>
                        </div>
                        <div class="girl-qa-answer">
                            <span class="girl-qa-label">A.</span>
                            <span class="girl-qa-text">好きなあだ名をつけて下さい☻</span>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- 雫ページにはオプションプリイがないから、それを非表示する --}}
            {{-- <div class="girl-play-section">
                <div class="girl-play-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                        fill="none">
                        <path
                            d="M14 0C17.713 0 21.274 1.475 23.8995 4.10051C26.525 6.72601 28 10.287 28 14C28 17.713 26.525 21.274 23.8995 23.8995C21.274 26.525 17.713 28 14 28C10.287 28 6.72601 26.525 4.10051 23.8995C1.475 21.274 0 17.713 0 14C0 10.287 1.475 6.72601 4.10051 4.10051C6.72601 1.475 10.287 0 14 0ZM15.8585 7.546C15.8585 7.08187 15.6741 6.63675 15.3459 6.30856C15.0177 5.98037 14.5726 5.796 14.1085 5.796C13.6444 5.796 13.1993 5.98037 12.8711 6.30856C12.5429 6.63675 12.3585 7.08187 12.3585 7.546V12.3585H7.546C7.08187 12.3585 6.63675 12.5429 6.30856 12.8711C5.98037 13.1993 5.796 13.6444 5.796 14.1085C5.796 14.5726 5.98037 15.0177 6.30856 15.3459C6.63675 15.6741 7.08187 15.8585 7.546 15.8585H12.3585V20.671C12.3585 21.1351 12.5429 21.5802 12.8711 21.9084C13.1993 22.2366 13.6444 22.421 14.1085 22.421C14.5726 22.421 15.0177 22.2366 15.3459 21.9084C15.6741 21.5802 15.8585 21.1351 15.8585 20.671V15.8585H20.671C21.1351 15.8585 21.5802 15.6741 21.9084 15.3459C22.2366 15.0177 22.421 14.5726 22.421 14.1085C22.421 13.6444 22.2366 13.1993 21.9084 12.8711C21.5802 12.5429 21.1351 12.3585 20.671 12.3585H15.8585V7.546Z"
                            fill="#FFDA89" />
                    </svg>
                    <h3>オプションプレイ</h3>
                </div>
                <div class="girl-play-content">
                    <div class="girl-play-item">
                        <div class="girl-play-item-title">
                            <h4>500円</h4>
                        </div>
                        <div class="girl-play-item-content">
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>ローター</p>
                            </div>
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>ワイヤレスローター</p>
                            </div>
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>電マ</p>
                            </div>
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>コスプレ</p>
                            </div>
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>オナニー観賞</p>
                            </div>
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>パンスト</p>
                            </div>
                        </div>
                    </div>
                    <div class="girl-play-item">
                        <div class="girl-play-item-title">
                            <h4>1,000円</h4>
                        </div>
                        <div class="girl-play-item-content">
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>ボディストッキング</p>
                            </div>
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>電マ</p>
                            </div>
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>即尺</p>
                            </div>
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>生パンティお持ち帰り</p>
                            </div>
                        </div>
                    </div>
                    <div class="girl-play-item">
                        <div class="girl-play-item-title">
                            <h4>2,000円</h4>
                        </div>
                        <div class="girl-play-item-content">
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>聖水</p>
                            </div>
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>顔射</p>
                            </div>
                        </div>
                    </div>
                    <div class="girl-play-item">
                        <div class="girl-play-item-title">
                            <h4>5,000円</h4>
                        </div>
                        <div class="girl-play-item-content">
                            <div class="girl-play-item-details">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="7.5" r="7.5" fill="black" />
                                </svg>
                                <p>FA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="girl-message-section">
                <div class="girl-message-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="21" viewBox="0 0 25 21"
                        fill="none">
                        <path
                            d="M0 7.32623C0.739258 -1.60843 15.9629 -2.46838 18.8115 5.28275C21.5049 12.6121 12.418 15.3634 7.0459 16.5411C5.52246 16.8753 3.88867 17.1873 2.34277 17.1979L3.89062 13.7398C2.74805 12.9742 1.75781 12.1595 1.03223 10.9769C0.491211 10.0939 0.0332031 8.84294 0 7.80772V7.32623ZM4.49023 15.7033C7.29785 15.2603 10.1689 14.5005 12.8115 13.4653C16.3828 12.0651 19.5264 8.9065 17.1963 4.95052C14.2871 0.0132537 5.04883 0.00554991 2.10645 4.92645C0.0878906 8.30174 2.25391 11.7213 5.55762 13.1109L4.49023 15.7033Z"
                            fill="#05F2DB" />
                        <path
                            d="M24.9883 13.682C25.0059 13.8515 25 14.0864 24.9883 14.2598C24.9648 14.5988 24.8076 15.2199 24.6982 15.5627C24.3096 16.7819 23.2871 17.7227 22.2695 18.4459L23.4268 20.9988C21.2646 20.9121 19.0811 20.4018 17.0312 19.7498C14.9814 19.0979 12.7432 18.2947 11.7129 16.283L12.8379 15.7158C13.4619 16.7299 14.3672 17.3616 15.4531 17.8392C16.1191 18.132 21.0098 19.6988 21.2783 19.458L20.5957 17.8229C25.0723 16.179 24.3418 11.0963 19.9121 10.0188L20.2061 8.86605C21.9258 9.15495 23.8154 10.4743 24.5186 12.0757C24.6865 12.458 24.9473 13.2862 24.9883 13.682Z"
                            fill="#05F2DB" />
                        <path
                            d="M9.63867 6.76865C11.2354 6.46627 11.3115 8.9845 9.7207 8.7659C8.60254 8.61279 8.58398 6.96896 9.63867 6.76865Z"
                            fill="#05F2DB" />
                        <path
                            d="M13.7402 6.76673C14.7881 6.6165 15.4229 7.93484 14.4951 8.57812C13.0898 9.5517 12.1162 6.99977 13.7402 6.76673Z"
                            fill="#05F2DB" />
                        <path
                            d="M6.60742 7.06718C7.46191 8.02055 6.0127 9.44096 5.12012 8.48663C4.11914 7.41675 5.75879 6.12056 6.60742 7.06718Z"
                            fill="#05F2DB" />
                        <defs>
                            <linearGradient id="paint0_linear_9_1976" x1="12.4997" y1="0" x2="12.4997"
                                y2="20.9988" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                            <linearGradient id="paint1_linear_9_1976" x1="12.4997" y1="0" x2="12.4997"
                                y2="20.9988" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                            <linearGradient id="paint2_linear_9_1976" x1="12.4997" y1="0" x2="12.4997"
                                y2="20.9988" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                            <linearGradient id="paint3_linear_9_1976" x1="12.4997" y1="0" x2="12.4997"
                                y2="20.9988" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                            <linearGradient id="paint4_linear_9_1976" x1="12.4997" y1="0" x2="12.4997"
                                y2="20.9988" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <h3>メッセージ</h3>
                </div>
                <div class="girl-message-content">
                    <p>{{ $cast->appeal_point }}</p>
                </div>
            </div>
            @if (count($diarys) > 0)
                <div class="girl-diary-section">
                    <div class="girl-diary-header">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="23" viewBox="0 0 19 23"
                            fill="none">
                            <path
                                d="M15.2649 0C15.7446 0.120391 16.207 0.16082 16.673 0.355781C17.7946 0.823867 18.6025 1.86336 18.8691 3.02055C19.1311 7.88738 18.9053 12.7955 18.9869 17.6777L18.8963 17.9463L13.9049 22.9075C10.6661 22.6891 7.03203 23.1995 3.84043 22.9075C2.09412 22.7475 0.633416 21.585 0.236279 19.8869C0.291588 14.6984 -0.224327 9.04996 0.118407 3.88844C0.258947 1.77441 1.65437 0.199453 3.84043 0H15.2649ZM13.3608 21.4754V18.9247C13.3608 18.4243 14.4326 17.3587 14.9476 17.3587H17.4863L17.6223 17.2248V3.80309C17.6223 2.73395 16.5824 1.5534 15.4916 1.43121H3.61375C2.21652 1.69445 1.58092 2.73754 1.47937 4.06812C1.11578 8.8568 1.75773 14.0893 1.4839 18.9238C1.5646 19.7575 1.85747 20.5715 2.57648 21.0666C2.68529 21.142 3.35988 21.4754 3.43241 21.4754H13.3608Z"
                                fill="#05F2DB" />
                            <path
                                d="M13.633 14.9437H5.47267C5.41283 13.3346 6.67677 11.5871 8.35236 11.3877C8.84833 11.3284 9.27448 11.482 9.78314 11.4569C10.4505 11.4245 10.5167 11.2323 11.2738 11.5009C12.7145 12.0112 13.6693 13.4406 13.633 14.9437Z"
                                fill="#05F2DB" />
                            <path
                                d="M9.1684 5.7509C12.4398 5.29449 12.6656 10.3599 9.9536 10.73C6.6677 11.1784 6.4238 6.13363 9.1684 5.7509Z"
                                fill="#05F2DB" />
                            <defs>
                                <linearGradient id="paint0_linear_9_1984" x1="9.50013" y1="0"
                                    x2="9.50013" y2="23.0003" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.206731" stop-color="#FFF2D7" />
                                    <stop offset="1" stop-color="#BD902F" />
                                </linearGradient>
                                <linearGradient id="paint1_linear_9_1984" x1="9.50013" y1="0"
                                    x2="9.50013" y2="23.0003" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.206731" stop-color="#FFF2D7" />
                                    <stop offset="1" stop-color="#BD902F" />
                                </linearGradient>
                                <linearGradient id="paint2_linear_9_1984" x1="9.50013" y1="0"
                                    x2="9.50013" y2="23.0003" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.206731" stop-color="#FFF2D7" />
                                    <stop offset="1" stop-color="#BD902F" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <h3>写メ日記</h3>
                    </div>
                    <div class="girl-diary-carousel">
                        <button class="girl-diary-nav girl-diary-nav--prev" type="button"
                            aria-label="Previous diaries">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="25"
                                viewBox="0 0 13 25" fill="none">
                                <path
                                    d="M11.6 0C11.7957 0 11.996 0.0838379 12.1462 0.246558C12.4466 0.571997 12.4466 1.10454 12.1462 1.42998L1.86388 12.574L11.996 23.5503C12.2964 23.8758 12.2964 24.4083 11.996 24.7338C11.6956 25.0592 11.2041 25.0592 10.9036 24.7338L0.225307 13.1657C-0.0751024 12.8403 -0.0751024 12.3077 0.225307 11.9823L11.0538 0.246582C11.2041 0.0838623 11.4043 4.88281e-05 11.6 4.88281e-05L11.6 0Z"
                                    fill="white" />
                            </svg>
                        </button>
                        <div class="girl-diary-track">
                            @foreach ($diarys as $diary)
                                <a class="girl-diary-card"
                                    href="{{ route('public.shops.shop.photo-diary.detail', ['shop' => $shop->slug, 'id' => $diary->id]) }}">
                                    <div class="girl-diary-image">
                                        <img src="{{ asset('storage/diary/' . $diary->photo) }}"
                                            alt="{{ $diary->subject }}">
                                        <div class="girl-diary-overlay">{{ $diary->subject }}</div>
                                    </div>
                                    <div class="girl-diary-body">
                                        <p class="girl-diary-author">{{ $diary->cast_name }}</p>
                                        <p class="girl-diary-date">
                                            @php
                                                $carbonDate = Carbon\Carbon::createFromTimeString($diary->created_at);
                                                $dayOfWeek = $carbonDate->format('w');
                                                $dayNames = ['日', '月', '火', '水', '木', '金', '土'];
                                            @endphp
                                            {{ $carbonDate->format('m/d') }}
                                            ({{ $dayNames[$dayOfWeek] }})
                                            {{ $carbonDate->format('H:i') }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                            {{-- @for ($i = 0; $i < 12; $i++)
                            <div class="girl-diary-card">
                                <div class="girl-diary-image">
                                    <img src="{{ asset('assets/img/shops/shizuku/diary-image.png') }}"
                                        alt="Diary {{ $i + 1 }}">
                                    <div class="girl-diary-overlay">日記タイトル日記</div>
                                </div>
                                <div class="girl-diary-body">
                                    <p class="girl-diary-author">投稿者名</p>
                                    <p class="girl-diary-date">0月00日(水) 00:00</p>
                                </div>
                            </div>
                        @endfor --}}
                        </div>
                        <button class="girl-diary-nav girl-diary-nav--next" type="button" aria-label="Next diaries">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                viewBox="0 0 24 25" fill="none">
                                <path
                                    d="M6.12663 0C5.9309 0 5.73062 0.0838379 5.58041 0.246558C5.28 0.571997 5.28 1.10454 5.58041 1.42998L15.8628 12.574L5.73062 23.5503C5.43021 23.8758 5.43021 24.4083 5.73062 24.7338C6.03103 25.0592 6.52259 25.0592 6.823 24.7338L17.5013 13.1657C17.8017 12.8403 17.8017 12.3077 17.5013 11.9823L6.6728 0.246582C6.52259 0.0838623 6.32236 4.88281e-05 6.12661 4.88281e-05L6.12663 0Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            <div class="girl-schedule-section">
                <div class="girl-schedule-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="23" viewBox="0 0 21 23"
                        fill="none">
                        <path
                            d="M2.01123 23C0.795273 22.7404 0.127176 22.0539 0.0186893 20.8024C0.114519 15.1935 -0.158505 9.53781 0.158818 3.95402C0.251936 3.42664 1.30245 2.51562 1.78521 2.51562H4.09055V4.62695C4.09055 4.89648 4.76046 5.4068 5.0606 5.4598C5.60304 5.55504 7.2674 5.54156 7.84238 5.48047C8.32876 5.42836 8.66055 5.23699 8.8721 4.79676C8.90736 4.72309 9.06286 4.30082 9.06286 4.26758V2.51562H11.9558V4.26758C11.9558 4.82371 12.5245 5.41578 13.0841 5.48227C13.6437 5.54875 15.4428 5.55234 15.9581 5.4598C16.2781 5.4023 16.9281 4.945 16.9281 4.62695V2.51562H19.2335C19.2895 2.51562 19.9341 2.82559 20.0318 2.89027C20.642 3.29277 20.896 3.92797 20.9955 4.62785L21 20.8024C20.9376 21.992 20.1014 22.8661 18.9171 23H2.01123ZM19.4595 7.99609H1.5592V20.9785C1.5592 21.1843 2.07722 21.558 2.32313 21.4771H18.6043C18.8682 21.5293 19.4595 21.2418 19.4595 20.9785V7.99609Z"
                            fill="#05F2DB" />
                        <path
                            d="M15.3008 0C15.6109 0.1725 15.9572 0.380039 16.0187 0.769063C16.072 1.10598 16.0593 4.23973 15.9789 4.40324C15.9057 4.55148 15.7664 4.56766 15.6209 4.58652C14.8515 4.68535 13.7251 4.57125 12.9494 4.49219V0.583984C12.9494 0.364766 13.4322 0.134766 13.5822 0H15.3008Z"
                            fill="#05F2DB" />
                        <path
                            d="M7.34515 0C7.67694 0.1725 7.96172 0.269531 8.06388 0.67832L8.05031 4.33945C8.00059 4.4868 7.89753 4.55238 7.74926 4.57934C7.49613 4.62605 5.32097 4.60809 5.17452 4.53711C5.07145 4.4877 5.01088 4.37629 4.99642 4.26488C5.08592 3.18586 4.86714 1.90379 4.9919 0.851719C5.04614 0.394414 5.34719 0.203047 5.71695 0H7.34515Z"
                            fill="#05F2DB" />
                        <path d="M16.6569 9.97266H4.36177V11.5898H16.6569V9.97266Z" fill="#05F2DB" />
                        <path d="M16.6569 13.5664H4.36177V15.0938H16.6569V13.5664Z" fill="#05F2DB" />
                        <path d="M13.2215 17.1602H4.36177V18.6875H13.2215V17.1602Z" fill="#05F2DB" />
                        <defs>
                            <linearGradient id="paint0_linear_9_2043" x1="10.5" y1="0" x2="10.5"
                                y2="23" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                            <linearGradient id="paint1_linear_9_2043" x1="10.5" y1="0" x2="10.5"
                                y2="23" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                            <linearGradient id="paint2_linear_9_2043" x1="10.5" y1="0" x2="10.5"
                                y2="23" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                            <linearGradient id="paint3_linear_9_2043" x1="10.5" y1="0" x2="10.5"
                                y2="23" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                            <linearGradient id="paint4_linear_9_2043" x1="10.5" y1="0" x2="10.5"
                                y2="23" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                            <linearGradient id="paint5_linear_9_2043" x1="10.5" y1="0" x2="10.5"
                                y2="23" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <h3>週間出勤予定</h3>
                </div>
                <div class="girl-schedule-content">
                    @foreach ($days as $day)
                        <div class="girl-schedule-day">
                            <div class="girl-schedule-label">
                                <span class="girl-schedule-date">{{ $day['weekDay'] }}</span>
                                @if ($day['minDay'] == 0)
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="5" cy="5" r="5" fill="#B90000" />
                                        <path
                                            d="M6.22461 6.80664H3.74609V7.08203C3.74609 7.24219 3.62598 7.32227 3.38574 7.32227C3.21387 7.32227 3.12793 7.25586 3.12793 7.12305C3.15137 6.30859 3.16309 5.31934 3.16309 4.15527C3.16309 3.40332 3.15332 2.75488 3.13379 2.20996C3.36816 2.30371 3.60059 2.41797 3.83105 2.55273H6.15137C6.34277 2.34961 6.45898 2.24805 6.5 2.24805C6.54297 2.24805 6.66113 2.32812 6.85449 2.48828C6.9502 2.57227 6.99805 2.63379 6.99805 2.67285C6.99805 2.72168 6.93848 2.78516 6.81934 2.86328V3.54883C6.81934 4.91602 6.83105 6.07422 6.85449 7.02344C6.85449 7.1875 6.73047 7.26953 6.48242 7.26953C6.31055 7.26953 6.22461 7.20312 6.22461 7.07031V6.80664ZM6.22461 6.66895V4.69434H3.74609V6.66895H6.22461ZM6.22461 4.55664V2.69043H3.74609V4.55664H6.22461Z"
                                            fill="white" />
                                    </svg>
                                @elseif ($day['minDay'] == 6)
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="5" cy="5" r="5" fill="#5F87FE" />
                                        <path
                                            d="M4.61914 7.0293V4.43066H3.41211C3.26562 4.43066 3.08203 4.44238 2.86133 4.46582L2.79395 4.24609C3.01855 4.27734 3.22656 4.29297 3.41797 4.29297H4.61914V2.90723C4.61914 2.53223 4.60645 2.24609 4.58105 2.04883C5.16309 2.10156 5.4541 2.17188 5.4541 2.25977C5.4541 2.32031 5.37988 2.37402 5.23145 2.4209V4.29297H6.18359C6.42969 3.99219 6.57812 3.8418 6.62891 3.8418C6.66797 3.8418 6.81543 3.94629 7.07129 4.15527C7.2041 4.26074 7.27051 4.33301 7.27051 4.37207C7.27051 4.41113 7.24414 4.43066 7.19141 4.43066H5.23145V7.0293H6.58789C6.84375 6.70508 6.99707 6.54297 7.04785 6.54297C7.08887 6.54297 7.24512 6.65527 7.5166 6.87988C7.65723 6.99316 7.72754 7.06934 7.72754 7.1084C7.72754 7.14746 7.70117 7.16699 7.64844 7.16699H2.93164C2.77539 7.16699 2.58398 7.17871 2.35742 7.20215L2.29004 6.98242C2.51465 7.01367 2.72656 7.0293 2.92578 7.0293H4.61914Z"
                                            fill="white" />
                                    </svg>
                                @else
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="5" cy="5" r="5" fill="white" />
                                        <path
                                            d="M6.09863 5.2832H3.93359L3.87793 5.56445C3.70215 6.36133 3.28418 6.97949 2.62402 7.41895C2.62012 7.42285 2.61426 7.4248 2.60645 7.4248C2.5791 7.4248 2.56543 7.41309 2.56543 7.38965C2.56543 7.38574 2.56641 7.38184 2.56836 7.37793C2.78906 7.10645 2.95801 6.83398 3.0752 6.56055C3.18457 6.30664 3.26855 6.01465 3.32715 5.68457C3.40723 5.21777 3.44727 4.52246 3.44727 3.59863C3.44727 2.95996 3.43457 2.45312 3.40918 2.07812C3.65723 2.18164 3.88379 2.2959 4.08887 2.4209H6.0459C6.2002 2.2334 6.2998 2.13965 6.34473 2.13965C6.3877 2.13965 6.50586 2.21191 6.69922 2.35645C6.79492 2.43066 6.84277 2.48828 6.84277 2.5293C6.84277 2.56836 6.78906 2.62598 6.68164 2.70215V3.37598L6.69922 6.78906C6.69922 6.93945 6.67969 7.05176 6.64062 7.12598C6.60742 7.19434 6.54883 7.25195 6.46484 7.29883C6.33594 7.37891 6.17969 7.41895 5.99609 7.41895C5.92969 7.41895 5.88672 7.4082 5.86719 7.38672C5.84961 7.36719 5.83594 7.32812 5.82617 7.26953C5.79492 7.06055 5.56738 6.91113 5.14355 6.82129C5.12793 6.81738 5.12012 6.80273 5.12012 6.77734C5.12012 6.75391 5.12793 6.74219 5.14355 6.74219C5.4541 6.75781 5.73633 6.76562 5.99023 6.76562C6.03711 6.76562 6.06738 6.75781 6.08105 6.74219C6.09277 6.72852 6.09863 6.70215 6.09863 6.66309V5.2832ZM6.09863 5.14551V3.8916H4.02148C4.01562 4.41113 3.99219 4.8291 3.95117 5.14551H6.09863ZM6.09863 3.75391V2.55859H4.0332V2.79297C4.0332 3.2207 4.03125 3.54102 4.02734 3.75391H6.09863Z"
                                            fill="#2A1A08" />
                                    </svg>
                                @endif
                            </div>
                            @if ($day['status'] == 'お休み')
                                <div class="girl-schedule-rest">{{ $day['status'] }}</div>
                            @else
                                <div class="girl-schedule-time">{{ $day['status'] }}</div>
                            @endif
                            {{-- <div class="girl-schedule-time">{{ $day['status'] }}</div> --}}
                        </div>
                    @endforeach
                    {{-- <div class="girl-schedule-day">
                        <div class="girl-schedule-label">
                            <span class="girl-schedule-date">9/22</span>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="white" />
                                <path
                                    d="M6.09863 5.2832H3.93359L3.87793 5.56445C3.70215 6.36133 3.28418 6.97949 2.62402 7.41895C2.62012 7.42285 2.61426 7.4248 2.60645 7.4248C2.5791 7.4248 2.56543 7.41309 2.56543 7.38965C2.56543 7.38574 2.56641 7.38184 2.56836 7.37793C2.78906 7.10645 2.95801 6.83398 3.0752 6.56055C3.18457 6.30664 3.26855 6.01465 3.32715 5.68457C3.40723 5.21777 3.44727 4.52246 3.44727 3.59863C3.44727 2.95996 3.43457 2.45312 3.40918 2.07812C3.65723 2.18164 3.88379 2.2959 4.08887 2.4209H6.0459C6.2002 2.2334 6.2998 2.13965 6.34473 2.13965C6.3877 2.13965 6.50586 2.21191 6.69922 2.35645C6.79492 2.43066 6.84277 2.48828 6.84277 2.5293C6.84277 2.56836 6.78906 2.62598 6.68164 2.70215V3.37598L6.69922 6.78906C6.69922 6.93945 6.67969 7.05176 6.64062 7.12598C6.60742 7.19434 6.54883 7.25195 6.46484 7.29883C6.33594 7.37891 6.17969 7.41895 5.99609 7.41895C5.92969 7.41895 5.88672 7.4082 5.86719 7.38672C5.84961 7.36719 5.83594 7.32812 5.82617 7.26953C5.79492 7.06055 5.56738 6.91113 5.14355 6.82129C5.12793 6.81738 5.12012 6.80273 5.12012 6.77734C5.12012 6.75391 5.12793 6.74219 5.14355 6.74219C5.4541 6.75781 5.73633 6.76562 5.99023 6.76562C6.03711 6.76562 6.06738 6.75781 6.08105 6.74219C6.09277 6.72852 6.09863 6.70215 6.09863 6.66309V5.2832ZM6.09863 5.14551V3.8916H4.02148C4.01562 4.41113 3.99219 4.8291 3.95117 5.14551H6.09863ZM6.09863 3.75391V2.55859H4.0332V2.79297C4.0332 3.2207 4.03125 3.54102 4.02734 3.75391H6.09863Z"
                                    fill="#2A1A08" />
                            </svg>
                        </div>
                        <div class="girl-schedule-time">0:00 - 00:00</div>
                    </div>
                    <div class="girl-schedule-day">
                        <div class="girl-schedule-label">
                            <span class="girl-schedule-date">9/22</span>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="white" />
                                <path
                                    d="M5.13184 4.31055C5.05371 5.00977 4.87109 5.56836 4.58398 5.98633C4.30859 6.36523 3.97656 6.6709 3.58789 6.90332C3.23633 7.1123 2.80859 7.28223 2.30469 7.41309C2.27344 7.41895 2.25781 7.39941 2.25781 7.35449C2.25781 7.34473 2.26172 7.33789 2.26953 7.33398C3.11914 6.93945 3.72949 6.41797 4.10059 5.76953C4.31348 5.39453 4.45703 4.93555 4.53125 4.39258C4.58789 3.96875 4.61621 3.38379 4.61621 2.6377C4.61621 2.49902 4.60938 2.33105 4.5957 2.13379C4.94727 2.1709 5.17773 2.2041 5.28711 2.2334C5.37891 2.25879 5.4248 2.29199 5.4248 2.33301C5.4248 2.39746 5.35449 2.45508 5.21387 2.50586C5.20801 3.01172 5.19434 3.42383 5.17285 3.74219C5.25684 4.65039 5.59082 5.37207 6.1748 5.90723C6.59668 6.29785 7.1416 6.57812 7.80957 6.74805C7.8252 6.75 7.83301 6.76172 7.83301 6.7832C7.83301 6.80469 7.8252 6.81738 7.80957 6.82129C7.65527 6.83887 7.52344 6.98633 7.41406 7.26367C7.38086 7.33984 7.34277 7.37793 7.2998 7.37793C7.21777 7.37793 7.10156 7.33398 6.95117 7.24609C6.73828 7.12305 6.51172 6.94922 6.27148 6.72461C6.05273 6.52344 5.88086 6.33105 5.75586 6.14746C5.5625 5.86426 5.41992 5.58008 5.32812 5.29492C5.24414 5.03516 5.17871 4.70703 5.13184 4.31055ZM3.58789 3.3291C3.62891 3.55762 3.64941 3.76953 3.64941 3.96484C3.64941 4.32422 3.58105 4.5957 3.44434 4.7793C3.33301 4.92773 3.19141 5.00195 3.01953 5.00195C2.91016 5.00195 2.82129 4.96875 2.75293 4.90234C2.69434 4.84375 2.66504 4.77051 2.66504 4.68262C2.66504 4.50684 2.75488 4.36719 2.93457 4.26367C3.13379 4.14844 3.27734 4.01172 3.36523 3.85352C3.43945 3.7207 3.49219 3.54395 3.52344 3.32324C3.52539 3.30957 3.53516 3.30273 3.55273 3.30273C3.57422 3.30273 3.58594 3.31152 3.58789 3.3291ZM7.29688 3.69531C7.29688 3.76953 7.19922 3.81738 7.00391 3.83887C6.63867 4.26465 6.18262 4.61523 5.63574 4.89062C5.63379 4.89258 5.63086 4.89355 5.62695 4.89355C5.59766 4.89355 5.58301 4.87598 5.58301 4.84082C5.58301 4.83496 5.58496 4.83008 5.58887 4.82617C5.83496 4.54297 6.06445 4.19531 6.27734 3.7832C6.36914 3.60352 6.44922 3.40625 6.51758 3.19141C6.87305 3.37109 7.0957 3.49121 7.18555 3.55176C7.25977 3.60449 7.29688 3.65234 7.29688 3.69531Z"
                                    fill="#2A1A08" />
                            </svg>
                        </div>
                        <div class="girl-schedule-time">0:00 - 00:00</div>
                    </div>
                    <div class="girl-schedule-day">
                        <div class="girl-schedule-label">
                            <span class="girl-schedule-date">9/22</span>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="white" />
                                <path
                                    d="M5.14355 3.04492V3.05664C5.14941 3.58203 5.16504 4.40625 5.19043 5.5293C5.21191 6.4043 5.22266 6.85254 5.22266 6.87402C5.22266 7.05176 5.16895 7.19141 5.06152 7.29297C4.93457 7.41406 4.73828 7.47461 4.47266 7.47461C4.4375 7.47461 4.41504 7.46387 4.40527 7.44238C4.40137 7.43262 4.38965 7.38574 4.37012 7.30176C4.34473 7.18066 4.26855 7.08691 4.1416 7.02051C4.04199 6.96777 3.86816 6.91113 3.62012 6.85059C3.60449 6.84668 3.59668 6.83105 3.59668 6.80371C3.59668 6.77441 3.60449 6.76172 3.62012 6.76562C3.95801 6.80273 4.25781 6.82129 4.51953 6.82129C4.58398 6.82129 4.61621 6.78711 4.61621 6.71875V2.65527C4.61621 2.45215 4.60645 2.25879 4.58691 2.0752C4.97754 2.11426 5.2207 2.14648 5.31641 2.17188C5.38867 2.19336 5.4248 2.22461 5.4248 2.26562C5.4248 2.33398 5.33887 2.40234 5.16699 2.4707C5.30371 3.29688 5.53027 4.00293 5.84668 4.58887C6.0459 4.3623 6.25781 4.06445 6.48242 3.69531C6.64062 3.42969 6.74219 3.22363 6.78711 3.07715C7.10938 3.25879 7.30859 3.37793 7.38477 3.43457C7.45117 3.48535 7.48438 3.53223 7.48438 3.5752C7.48438 3.6377 7.39844 3.66895 7.22656 3.66895C6.83203 4.05957 6.39844 4.41016 5.92578 4.7207C5.93359 4.73633 5.94434 4.75488 5.95801 4.77637C5.97168 4.7959 5.98047 4.80957 5.98438 4.81738C6.41016 5.46582 7.04004 5.97754 7.87402 6.35254C7.88574 6.35645 7.8916 6.36523 7.8916 6.37891C7.8916 6.40234 7.88184 6.41602 7.8623 6.41992C7.75293 6.4375 7.66406 6.47754 7.5957 6.54004C7.5332 6.59473 7.46973 6.68066 7.40527 6.79785C7.36426 6.87598 7.33691 6.92188 7.32324 6.93555C7.31152 6.94727 7.29297 6.95312 7.26758 6.95312C7.22266 6.95312 7.14062 6.90332 7.02148 6.80371C6.85742 6.65918 6.66992 6.4541 6.45898 6.18848C6.27148 5.95605 6.12305 5.74512 6.01367 5.55566C5.58398 4.79785 5.29395 3.96094 5.14355 3.04492ZM4.47266 3.98242C4.47266 4.04883 4.40234 4.10449 4.26172 4.14941C4.01562 4.90332 3.72656 5.48535 3.39453 5.89551C3.09961 6.25879 2.69629 6.58398 2.18457 6.87109C2.18457 6.87305 2.18262 6.87402 2.17871 6.87402C2.14355 6.87402 2.12598 6.85547 2.12598 6.81836C2.12598 6.81445 2.12793 6.81055 2.13184 6.80664C2.8916 6.14453 3.41406 5.19727 3.69922 3.96484H2.7793C2.66602 3.96484 2.54199 3.98047 2.40723 4.01172L2.34277 3.78027C2.50293 3.81152 2.65039 3.82715 2.78516 3.82715H3.65527C3.8291 3.63184 3.9375 3.53418 3.98047 3.53418C4.02734 3.53418 4.14355 3.62012 4.3291 3.79199C4.4248 3.87793 4.47266 3.94141 4.47266 3.98242Z"
                                    fill="#2A1A08" />
                            </svg>
                        </div>
                        <div class="girl-schedule-time">0:00 - 00:00</div>
                    </div>
                    <div class="girl-schedule-day">
                        <div class="girl-schedule-label">
                            <span class="girl-schedule-date">9/22</span>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="white" />
                                <path
                                    d="M5.16406 3.83301C5.20703 5.83887 5.22852 6.98047 5.22852 7.25781C5.22852 7.41797 5.10645 7.49805 4.8623 7.49805C4.67871 7.49805 4.58691 7.43164 4.58691 7.29883C4.58691 7.23828 4.5957 6.83691 4.61328 6.09473C4.63086 5.43262 4.6416 4.87793 4.64551 4.43066C4.32715 4.97949 3.93652 5.45898 3.47363 5.86914C3.08105 6.2168 2.66016 6.49414 2.21094 6.70117C2.20898 6.70312 2.20605 6.7041 2.20215 6.7041C2.1748 6.7041 2.16113 6.68945 2.16113 6.66016C2.16113 6.65234 2.16406 6.64648 2.16992 6.64258C2.67773 6.24023 3.12891 5.75879 3.52344 5.19824C3.86914 4.71191 4.14941 4.19434 4.36426 3.64551H2.99023C2.84961 3.64551 2.67773 3.65723 2.47461 3.68066L2.40723 3.46094C2.61035 3.49219 2.80078 3.50781 2.97852 3.50781H4.61035V2.81934C4.61035 2.49707 4.59863 2.21875 4.5752 1.98438C4.90723 2.00977 5.12598 2.03516 5.23145 2.06055C5.3291 2.08594 5.37793 2.12012 5.37793 2.16309C5.37793 2.21582 5.31641 2.27441 5.19336 2.33887V3.50781H6.59082C6.81152 3.22852 6.94727 3.08887 6.99805 3.08887C7.03711 3.08887 7.18164 3.18652 7.43164 3.38184C7.55469 3.4834 7.61621 3.55176 7.61621 3.58691C7.61621 3.62598 7.59082 3.64551 7.54004 3.64551H5.25488C5.44238 4.17285 5.73633 4.63672 6.13672 5.03711C6.61133 5.49805 7.1875 5.83984 7.86523 6.0625C7.88086 6.06836 7.88867 6.07715 7.88867 6.08887C7.88867 6.10059 7.88086 6.10938 7.86523 6.11523C7.74219 6.15625 7.64941 6.21387 7.58691 6.28809C7.53418 6.35059 7.47949 6.45117 7.42285 6.58984C7.38965 6.66602 7.35352 6.7041 7.31445 6.7041C7.27148 6.7041 7.17871 6.65625 7.03613 6.56055C6.54004 6.21484 6.13184 5.7832 5.81152 5.26562C5.57324 4.87109 5.35742 4.39355 5.16406 3.83301Z"
                                    fill="#2A1A08" />
                            </svg>
                        </div>
                        <div class="girl-schedule-time girl-no-schedule">お休み</div>
                    </div>
                    <div class="girl-schedule-day">
                        <div class="girl-schedule-label">
                            <span class="girl-schedule-date">9/22</span>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="white" />
                                <path
                                    d="M3.73145 4.00586C3.87012 4.0293 3.98828 4.04102 4.08594 4.04102H5.36035C5.51855 3.81641 5.62402 3.7041 5.67676 3.7041C5.71973 3.7041 5.83594 3.78418 6.02539 3.94434C6.12109 4.02246 6.16895 4.08105 6.16895 4.12012C6.16895 4.15918 6.14258 4.17871 6.08984 4.17871H5.15527V5.1748H6.29492C6.49023 4.93848 6.6123 4.82031 6.66113 4.82031C6.70215 4.82031 6.82422 4.90234 7.02734 5.06641C7.13086 5.15234 7.18262 5.21387 7.18262 5.25098C7.18262 5.29199 7.15723 5.3125 7.10645 5.3125H5.15527V7.0791H6.53516C6.7793 6.80176 6.9248 6.66309 6.97168 6.66309C7.01465 6.66309 7.15137 6.75977 7.38184 6.95312C7.50098 7.05078 7.56055 7.11914 7.56055 7.1582C7.56055 7.19727 7.53516 7.2168 7.48438 7.2168H2.84961C2.75 7.2168 2.62793 7.22852 2.4834 7.25195L2.41895 7.03223C2.56738 7.06348 2.70898 7.0791 2.84375 7.0791H4.57812V5.3125H3.16309C3.06152 5.3125 2.93945 5.32422 2.79688 5.34766L2.72949 5.12793C2.87988 5.15918 3.02246 5.1748 3.15723 5.1748H4.57812V4.17871H4.10352C4.00391 4.17871 3.88184 4.19043 3.7373 4.21387L3.68457 4.04102C3.27832 4.33594 2.78516 4.59277 2.20508 4.81152C2.20312 4.81348 2.2002 4.81445 2.19629 4.81445C2.16895 4.81445 2.15527 4.79785 2.15527 4.76465C2.15527 4.75684 2.1582 4.75098 2.16406 4.74707C3.05078 4.20996 3.72949 3.53418 4.2002 2.71973C4.33496 2.4834 4.44336 2.24219 4.52539 1.99609C4.9707 2.11523 5.22559 2.18652 5.29004 2.20996C5.34863 2.2334 5.37793 2.26172 5.37793 2.29492C5.37793 2.34766 5.30176 2.39355 5.14941 2.43262C5.49316 2.84863 5.87598 3.18066 6.29785 3.42871C6.72754 3.68066 7.24121 3.85938 7.83887 3.96484C7.85449 3.9668 7.8623 3.97949 7.8623 4.00293C7.8623 4.02637 7.85449 4.03906 7.83887 4.04102C7.71973 4.06641 7.62793 4.12012 7.56348 4.20215C7.51074 4.27246 7.46289 4.38281 7.41992 4.5332C7.39844 4.61328 7.36426 4.65332 7.31738 4.65332C7.28027 4.65332 7.21191 4.625 7.1123 4.56836C6.80566 4.4043 6.51758 4.20703 6.24805 3.97656C5.77539 3.56641 5.37891 3.07812 5.05859 2.51172C4.68945 3.12891 4.24707 3.62695 3.73145 4.00586ZM4.1123 6.39355C4.1123 6.5166 4.0791 6.6123 4.0127 6.68066C3.95605 6.74121 3.88281 6.77148 3.79297 6.77148C3.71094 6.77148 3.64941 6.74805 3.6084 6.70117C3.56934 6.6543 3.53906 6.57812 3.51758 6.47266C3.44727 6.11133 3.33887 5.83789 3.19238 5.65234C3.18848 5.64844 3.18652 5.64355 3.18652 5.6377C3.18652 5.61426 3.19824 5.60254 3.22168 5.60254C3.22559 5.60254 3.22949 5.60352 3.2334 5.60547C3.81934 5.83789 4.1123 6.10059 4.1123 6.39355ZM6.74609 5.90723C6.74609 5.94238 6.72949 5.96875 6.69629 5.98633C6.66504 6.00195 6.59961 6.01758 6.5 6.0332C6.25 6.3457 5.9209 6.62695 5.5127 6.87695C5.50879 6.87891 5.50488 6.87988 5.50098 6.87988C5.46191 6.87988 5.44238 6.8623 5.44238 6.82715C5.44238 6.82324 5.44336 6.81934 5.44531 6.81543C5.5918 6.6084 5.73535 6.3457 5.87598 6.02734C5.96191 5.83203 6.02051 5.66406 6.05176 5.52344C6.38379 5.67188 6.58301 5.76465 6.64941 5.80176C6.71387 5.83887 6.74609 5.87402 6.74609 5.90723Z"
                                    fill="#2A1A08" />
                            </svg>
                        </div>
                        <div class="girl-schedule-time">0:00 - 00:00</div>
                    </div>
                    <div class="girl-schedule-day">
                        <div class="girl-schedule-label">
                            <span class="girl-schedule-date">9/22</span>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="#5F87FE" />
                                <path
                                    d="M4.61914 7.0293V4.43066H3.41211C3.26562 4.43066 3.08203 4.44238 2.86133 4.46582L2.79395 4.24609C3.01855 4.27734 3.22656 4.29297 3.41797 4.29297H4.61914V2.90723C4.61914 2.53223 4.60645 2.24609 4.58105 2.04883C5.16309 2.10156 5.4541 2.17188 5.4541 2.25977C5.4541 2.32031 5.37988 2.37402 5.23145 2.4209V4.29297H6.18359C6.42969 3.99219 6.57812 3.8418 6.62891 3.8418C6.66797 3.8418 6.81543 3.94629 7.07129 4.15527C7.2041 4.26074 7.27051 4.33301 7.27051 4.37207C7.27051 4.41113 7.24414 4.43066 7.19141 4.43066H5.23145V7.0293H6.58789C6.84375 6.70508 6.99707 6.54297 7.04785 6.54297C7.08887 6.54297 7.24512 6.65527 7.5166 6.87988C7.65723 6.99316 7.72754 7.06934 7.72754 7.1084C7.72754 7.14746 7.70117 7.16699 7.64844 7.16699H2.93164C2.77539 7.16699 2.58398 7.17871 2.35742 7.20215L2.29004 6.98242C2.51465 7.01367 2.72656 7.0293 2.92578 7.0293H4.61914Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="girl-schedule-time">0:00 - 00:00</div>
                    </div>
                    <div class="girl-schedule-day">
                        <div class="girl-schedule-label">
                            <span class="girl-schedule-date">9/22</span>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="#B90000" />
                                <path
                                    d="M6.22461 6.80664H3.74609V7.08203C3.74609 7.24219 3.62598 7.32227 3.38574 7.32227C3.21387 7.32227 3.12793 7.25586 3.12793 7.12305C3.15137 6.30859 3.16309 5.31934 3.16309 4.15527C3.16309 3.40332 3.15332 2.75488 3.13379 2.20996C3.36816 2.30371 3.60059 2.41797 3.83105 2.55273H6.15137C6.34277 2.34961 6.45898 2.24805 6.5 2.24805C6.54297 2.24805 6.66113 2.32812 6.85449 2.48828C6.9502 2.57227 6.99805 2.63379 6.99805 2.67285C6.99805 2.72168 6.93848 2.78516 6.81934 2.86328V3.54883C6.81934 4.91602 6.83105 6.07422 6.85449 7.02344C6.85449 7.1875 6.73047 7.26953 6.48242 7.26953C6.31055 7.26953 6.22461 7.20312 6.22461 7.07031V6.80664ZM6.22461 6.66895V4.69434H3.74609V6.66895H6.22461ZM6.22461 4.55664V2.69043H3.74609V4.55664H6.22461Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="girl-schedule-time">0:00 - 00:00</div>
                    </div> --}}
                </div>
            </div>

            <div class="girl-manager-comment-section">
                <div class="girl-manager-comment-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                        fill="none">
                        <path
                            d="M19.7918 10.4167C20.6206 10.4167 21.4155 10.746 22.0015 11.332C22.5876 11.9181 22.9168 12.7129 22.9168 13.5417V16.6667C22.9168 17.4956 22.5876 18.2904 22.0015 18.8765C21.4155 19.4625 20.6206 19.7917 19.7918 19.7917V20.798C19.7918 21.9022 18.5043 22.5053 17.6564 21.798L15.2481 19.7917H12.5002C11.6714 19.7917 10.8765 19.4625 10.2905 18.8765C9.7044 18.2904 9.37516 17.4956 9.37516 16.6667V13.5417C9.37516 12.7129 9.7044 11.9181 10.2905 11.332C10.8765 10.746 11.6714 10.4167 12.5002 10.4167H19.7918ZM16.6668 4.16675C17.4956 4.16675 18.2905 4.49599 18.8765 5.08204C19.4626 5.66809 19.7918 6.46295 19.7918 7.29175V8.33342H11.4585C10.3534 8.33342 9.29362 8.7724 8.51222 9.5538C7.73082 10.3352 7.29183 11.395 7.29183 12.5001V16.6667C7.29183 17.7542 7.7085 18.7459 8.39183 19.4876L7.29183 20.3126C6.4335 20.9563 5.2085 20.3438 5.2085 19.2709V17.7084C4.37969 17.7084 3.58484 17.3792 2.99879 16.7931C2.41274 16.2071 2.0835 15.4122 2.0835 14.5834V7.29175C2.0835 6.46295 2.41274 5.66809 2.99879 5.08204C3.58484 4.49599 4.37969 4.16675 5.2085 4.16675H16.6668Z"
                            fill="#05F2DB" />
                        <defs>
                            <linearGradient id="paint0_linear_9_2119" x1="12.5002" y1="4.16675" x2="12.5002"
                                y2="22.1026" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <h3>店長コメント</h3>
                </div>
                <div class="girl-manager-comment-content">
                    <p>{{ $cast->manager_comment }}</p>
                </div>
            </div>

            <div class="girl-sales-points-section">
                <div class="girl-sales-points-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                        fill="none">
                        <path
                            d="M24.4926 12.2426C24.4954 12.6015 24.3863 12.9523 24.1804 13.2464C23.9746 13.5404 23.6823 13.763 23.3442 13.8832L16.4054 16.4065L13.8832 23.3441C13.7589 23.6791 13.5351 23.9679 13.2418 24.1719C12.9485 24.3758 12.5998 24.4852 12.2426 24.4852C11.8854 24.4852 11.5367 24.3758 11.2434 24.1719C10.9501 23.9679 10.7263 23.6791 10.602 23.3441L8.07978 16.4054L1.14103 13.8832C0.806116 13.7589 0.517273 13.5351 0.313302 13.2418C0.10933 12.9485 0 12.5998 0 12.2426C0 11.8854 0.10933 11.5367 0.313302 11.2434C0.517273 10.9501 0.806116 10.7263 1.14103 10.602L8.07978 8.07978L10.602 1.14103C10.7263 0.806116 10.9501 0.517273 11.2434 0.313302C11.5367 0.10933 11.8854 0 12.2426 0C12.5998 0 12.9485 0.10933 13.2418 0.313302C13.5351 0.517273 13.7589 0.806116 13.8832 1.14103L16.4065 8.07978L23.3442 10.602C23.6823 10.7222 23.9746 10.9448 24.1804 11.2388C24.3863 11.5328 24.4954 11.8837 24.4926 12.2426Z"
                            fill="#05F2DB" />
                        <defs>
                            <linearGradient id="paint0_linear_9_2133" x1="12.2463" y1="0" x2="12.2463"
                                y2="24.4852" gradientUnits="userSpaceOnUse">
                                <stop offset="0.206731" stop-color="#FFF2D7" />
                                <stop offset="1" stop-color="#BD902F" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <h3>セールスポイント</h3>
                </div>
                <div class="girl-sales-points-content">
                    <div class="girl-sales-points-row">
                        <div class="girl-sales-points-label">性格</div>
                        <div class="girl-sales-points-tags">
                            @foreach ($personalities as $personality)
                                <span class="girl-sales-points-tag">{{ $personality }}</span>
                            @endforeach
                            {{-- <span class="girl-sales-points-tag">癒し系</span>
                            <span class="girl-sales-points-tag">癒し系</span>
                            <span class="girl-sales-points-tag">癒し系</span>
                            <span class="girl-sales-points-tag">癒し系</span> --}}
                        </div>
                    </div>
                    <div class="girl-sales-points-row">
                        <div class="girl-sales-points-label">個性</div>
                        <div class="girl-sales-points-tags">
                            @foreach ($individualities as $individuality)
                                <span class="girl-sales-points-tag">{{ $individuality }}</span>
                            @endforeach
                            {{-- <span class="girl-sales-points-tag">癒し系</span>
                            <span class="girl-sales-points-tag">おっとり</span>
                            <span class="girl-sales-points-tag">人懐っこい</span>
                            <span class="girl-sales-points-tag">空気を読む</span> --}}
                        </div>
                    </div>
                    <div class="girl-sales-points-row">
                        <div class="girl-sales-points-label">スタイル</div>
                        <div class="girl-sales-points-tags">
                            @foreach ($playstyles as $playstyle)
                                <span class="girl-sales-points-tag">{{ $playstyle }}</span>
                            @endforeach
                            {{-- <span class="girl-sales-points-tag">癒し系</span>
                            <span class="girl-sales-points-tag">癒し系</span> --}}
                        </div>
                    </div>
                    <div class="girl-sales-points-row">
                        <div class="girl-sales-points-label">体型</div>
                        <div class="girl-sales-points-tags">
                            @foreach ($styles as $style)
                                <span class="girl-sales-points-tag">{{ $style }}</span>
                            @endforeach
                            {{-- <span class="girl-sales-points-tag">癒し系</span>
                            <span class="girl-sales-points-tag">癒し系</span> --}}
                        </div>
                    </div>
                </div>
            </div>
            @if (count($reviews) > 0)
                <div class="girl-reviews-section">
                    <div class="girl-reviews-header">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="21" viewBox="0 0 25 21"
                            fill="none">
                            <path
                                d="M0 7.32623C0.739258 -1.60843 15.9629 -2.46838 18.8115 5.28275C21.5049 12.6121 12.418 15.3634 7.0459 16.5411C5.52246 16.8753 3.88867 17.1873 2.34277 17.1979L3.89062 13.7398C2.74805 12.9742 1.75781 12.1595 1.03223 10.9769C0.491211 10.0939 0.0332031 8.84294 0 7.80772V7.32623ZM4.49023 15.7033C7.29785 15.2603 10.1689 14.5005 12.8115 13.4653C16.3828 12.0651 19.5264 8.9065 17.1963 4.95052C14.2871 0.0132537 5.04883 0.00554991 2.10645 4.92645C0.0878906 8.30174 2.25391 11.7213 5.55762 13.1109L4.49023 15.7033Z"
                                fill="#05F2DB" />
                            <path
                                d="M24.9883 13.682C25.0059 13.8515 25 14.0864 24.9883 14.2598C24.9648 14.5988 24.8076 15.2199 24.6982 15.5627C24.3096 16.7819 23.2871 17.7227 22.2695 18.4459L23.4268 20.9988C21.2646 20.9121 19.0811 20.4018 17.0312 19.7498C14.9814 19.0979 12.7432 18.2947 11.7129 16.283L12.8379 15.7158C13.4619 16.7299 14.3672 17.3616 15.4531 17.8392C16.1191 18.132 21.0098 19.6988 21.2783 19.458L20.5957 17.8229C25.0723 16.179 24.3418 11.0963 19.9121 10.0188L20.2061 8.86605C21.9258 9.15495 23.8154 10.4743 24.5186 12.0757C24.6865 12.458 24.9473 13.2862 24.9883 13.682Z"
                                fill="#05F2DB" />
                            <path
                                d="M9.63867 6.76865C11.2354 6.46627 11.3115 8.9845 9.7207 8.7659C8.60254 8.61279 8.58398 6.96896 9.63867 6.76865Z"
                                fill="#05F2DB" />
                            <path
                                d="M13.7402 6.76673C14.7881 6.6165 15.4229 7.93484 14.4951 8.57812C13.0898 9.5517 12.1162 6.99977 13.7402 6.76673Z"
                                fill="#05F2DB" />
                            <path
                                d="M6.60742 7.06718C7.46191 8.02055 6.0127 9.44096 5.12012 8.48663C4.11914 7.41675 5.75879 6.12056 6.60742 7.06718Z"
                                fill="#05F2DB" />
                            <defs>
                                <linearGradient id="paint0_linear_9_2183" x1="12.4997" y1="0"
                                    x2="12.4997" y2="20.9988" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.206731" stop-color="#FFF2D7" />
                                    <stop offset="1" stop-color="#BD902F" />
                                </linearGradient>
                                <linearGradient id="paint1_linear_9_2183" x1="12.4997" y1="0"
                                    x2="12.4997" y2="20.9988" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.206731" stop-color="#FFF2D7" />
                                    <stop offset="1" stop-color="#BD902F" />
                                </linearGradient>
                                <linearGradient id="paint2_linear_9_2183" x1="12.4997" y1="0"
                                    x2="12.4997" y2="20.9988" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.206731" stop-color="#FFF2D7" />
                                    <stop offset="1" stop-color="#BD902F" />
                                </linearGradient>
                                <linearGradient id="paint3_linear_9_2183" x1="12.4997" y1="0"
                                    x2="12.4997" y2="20.9988" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.206731" stop-color="#FFF2D7" />
                                    <stop offset="1" stop-color="#BD902F" />
                                </linearGradient>
                                <linearGradient id="paint4_linear_9_2183" x1="12.4997" y1="0"
                                    x2="12.4997" y2="20.9988" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.206731" stop-color="#FFF2D7" />
                                    <stop offset="1" stop-color="#BD902F" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <h3>レビュー</h3>
                    </div>
                    <div class="girl-reviews-content">
                        @foreach ($reviews as $review)
                            <div class="girl-review-item">
                                <div class="girl-review-header">
                                    <div class="girl-review-top-row">
                                        <div class="girl-review-stars">
                                            @for ($j = 0; $j < $review->review_average_point; $j++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                                        fill="#F2138E" />
                                                </svg>
                                            @endfor
                                            @for ($j = 0; $j < 5 - $review->review_average_point; $j++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                                        fill="#E5E5E5" />
                                                </svg>
                                            @endfor
                                            <span class="girl-review-rating">3</span>
                                        </div>
                                        <div class="girl-review-meta">
                                            <span>女の子 {{ $review->review_cast_point }}</span>
                                            <span>プレイ {{ $review->review_play_point }}</span>
                                            <span>スタッフ {{ $review->review_stuff_point }}</span>
                                        </div>
                                    </div>
                                    <div class="girl-review-body">
                                        <div class="girl-review-author">{{ $review->member_name }}</div>
                                        <div class="girl-review-text">
                                            <p>{{ $review->review_content }}</p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- @for ($i = 0; $i < 2; $i++)
                        <div class="girl-review-item">
                            <div class="girl-review-header">
                                <div class="girl-review-top-row">
                                    <div class="girl-review-stars">
                                        @for ($j = 0; $j < 3; $j++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                                    fill="#F2138E" />
                                            </svg>
                                        @endfor
                                        @for ($j = 0; $j < 2; $j++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                                    fill="#E5E5E5" />
                                            </svg>
                                        @endfor
                                        <span class="girl-review-rating">3</span>
                                    </div>
                                    <div class="girl-review-meta">
                                        <span>女の子 3</span>
                                        <span>プレイ 3</span>
                                        <span>スタッフ 3</span>
                                    </div>
                                </div>
                                <div class="girl-review-body">
                                    <div class="girl-review-author">投稿者名</div>
                                    <div class="girl-review-text">
                                        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor --}}
                        <div class="girl-reviews-footer">
                            <a href="{{ route('public.shops.shop.review', ['shop' => $shop->slug, 'id' => $cast->id]) }}"
                                class="girl-reviews-more-btn">レビュー一覧を見る</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    </x-shizuku-page-layout>
