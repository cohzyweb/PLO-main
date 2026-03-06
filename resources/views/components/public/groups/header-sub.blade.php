@php
    $isRecruitPage = request()->routeIs('public.recruit.*');
@endphp

@if ($isRecruitPage)
    {{-- New recruit header based on Figma design --}}
    <header class="header-sub header-sub--recruit" id="header-sub">
        <div class="header-sub-recruit__inner">
            <a href="{{ route('public.groups.home') }}" class="header-sub-recruit__logo">
                <img src="{{ asset('assets/img/male/logo.png') }}" alt="Passion Leisure Office">
            </a>

            <nav class="header-sub-recruit__nav" aria-label="Recruit navigation">
                <a href="#top" class="header-sub-recruit__link">TOP</a>
                <a href="#job-content" class="header-sub-recruit__link">主なお仕事内容</a>
                <a href="#daily-flow" class="header-sub-recruit__link">1日の流れ</a>
                <a href="#interview" class="header-sub-recruit__link">先輩インタビュー</a>
                <a href="#faq" class="header-sub-recruit__link">よくあるご質問</a>
                <a href="#requirements" class="header-sub-recruit__link">募集要項</a>
            </nav>

            <button class="header-sub-recruit__menu-btn" id="recruit-drawer-toggle" aria-label="Menu">
                <img src="{{ asset('assets/img/male/menu.png') }}" alt="Menu">
            </button>
        </div>
    </header>

    <div class="header-sub-recruit__overlay" id="recruitMenuOverlay">
        <div class="header-sub-recruit__overlay-inner">
            <button class="header-sub-recruit__overlay-close" id="recruitMenuClose" aria-label="Close menu">&times;</button>
            <nav class="header-sub-recruit__overlay-nav">
                <a href="#top" class="header-sub-recruit__overlay-link">TOP</a>
                <a href="#job-content" class="header-sub-recruit__overlay-link">主なお仕事内容</a>
                <a href="#daily-flow" class="header-sub-recruit__overlay-link">1日の流れ</a>
                <a href="#interview" class="header-sub-recruit__overlay-link">先輩インタビュー</a>
                <a href="#faq" class="header-sub-recruit__overlay-link">よくあるご質問</a>
                <a href="#requirements" class="header-sub-recruit__overlay-link">募集要項</a>
            </nav>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
      const menuButton = document.getElementById("recruit-drawer-toggle");
      const menuOverlay = document.getElementById("recruitMenuOverlay");
      const menuClose = document.getElementById("recruitMenuClose");
      const overlayLinks = document.querySelectorAll(".header-sub-recruit__overlay-link");

      function openMenu() {
        if (menuOverlay) {
          menuOverlay.classList.add("active");
          document.body.style.overflow = "hidden";
        }
      }

      function closeMenu() {
        if (menuOverlay) {
          menuOverlay.classList.remove("active");
          document.body.style.overflow = "";
        }
      }

      if (menuButton && menuOverlay) {
        menuButton.addEventListener("click", function(e) {
          e.preventDefault();
          openMenu();
        });
      }

      if (menuClose) {
        menuClose.addEventListener("click", closeMenu);
      }
      
      if (overlayLinks.length > 0) {
        overlayLinks.forEach(link => {
          link.addEventListener("click", closeMenu);
        });
      }

      if (menuOverlay) {
        menuOverlay.addEventListener("click", function (e) {
          if (e.target === menuOverlay) {
            closeMenu();
          }
        });

        document.addEventListener("keydown", function (e) {
          if (e.key === "Escape" && menuOverlay.classList.contains("active")) {
            closeMenu();
          }
        });
      }
    });
    </script>
@else
    {{-- Existing header for other group pages --}}
    <header class="header-sub" id="header-sub">
        <div class="left-header">
            <div class="header-user-menu">
                <a href="{{ route('public.groups.home') }}">
                    <small>Top</small>
                    <span class="menu_newface">トップページ</span>
                </a>
            </div>
            <div class="header-separator"></div>
            <div class="header-user-menu">
                <a href="{{ route('public.groups.newface') }}">
                    <small>New Face</small>
                    <span class="menu_newface">新人情報</span>
                </a>
            </div>
            <div class="header-separator"></div>
            <div class="header-user-menu">
                <a href="{{ route('public.groups.schedule') }}">
                    <small>Schedule</small>
                    <span class="menu_newface">出勤情報</span>
                </a>
            </div>
        </div>
        <div class="sub-header-logo">
            <a href="{{ route('public.groups.home') }}">
                <img src="{{ asset('assets/img/groups/PLO2.png') }}" alt="">
            </a>
        </div>
        <div class="right-header">
            <div class="right-header-menu">
                <div class="header-user-menu">
                    <a href="{{ route('public.groups.event') }}">
                        <small>Event</small>
                        <span class="menu_newface">イベント情報</span>
                    </a>
                </div>
                <div class="header-separator header-separator--dark"></div>
                <div class="header-user-menu">
                    <a href="{{ route('public.groups.shop') }}">
                        <small>Shop</small>
                        <span class="menu_newface">店舗一覧</span>
                    </a>
                </div>
                <div class="header-separator header-separator--dark"></div>
                <div class="header-user-menu">
                    <a href="{{ route('logoutAll') }}">
                        <small>Logout</small>
                        <span class="menu_newface">ログアウト</span>
                    </a>
                </div>
            </div>
            <div class="header-buttons">
                @if (Auth::guard('web')->check())
                    <a href="{{ route('admin.home') }}" class="logout-button">
                        <span>管理画面</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                            <path d="M0 14.2739V0H7.13695V1.58599H1.58599V12.6879H7.13695V14.2739H0ZM10.3089 11.1019L9.21856 9.95208L11.2407 7.92994H4.75797V6.34395H11.2407L9.21856 4.32182L10.3089 3.17198L14.2739 7.13695L10.3089 11.1019Z" fill="#021A21"/>
                        </svg>
                    </a>
                @endif
                <button class="menu-button" id="drawer-toggle" data-pushbar-target="right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="62" height="27" viewBox="0 0 62 27" fill="none">
                        <line y1="1" x2="61.25" y2="1" stroke="white" stroke-width="2"/>
                        <line y1="13.5" x2="61.25" y2="13.5" stroke="white" stroke-width="2"/>
                        <line y1="26" x2="61.25" y2="26" stroke="white" stroke-width="2"/>
                    </svg>
                    <span>Menu</span>
                </button>
            </div>
        </div>
    </header>

    <!-- Groups Menu Overlay Component -->
    <x-public.groups.menu-overlay
        :menu-links="[
            'top' => route('public.groups.home'),
            'new' => route('public.groups.newface'),
            'shop' => route('public.groups.shop'),
            'schedule' => route('public.groups.schedule'),
            'pickup' => route('public.groups.pickup'),
            'diary' => route('public.groups.photodiary'),
            'login' => route('login'),
            'register' => route('register'),
            'news' => '#',
            'movie' => route('public.groups.movie'),
            'event' => route('public.groups.event'),
            'recruit-female' => route('public.recruit.female'),
            'recruit-male' => route('public.recruit.male'),
        ]"
        :bottom-buttons="[
            'group' => route('public.groups.home'),
            'recruit' => route('public.recruit.male'),
        ]"
        :bottom-button-images="[
            'group' => 'assets/img/shops/shizuku/plo-group-btn.png',
            'recruit' => 'assets/img/shops/shizuku/recruit-btn.png',
        ]"
    />

    <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Menu toggle functionality
      const menuButton = document.getElementById("drawer-toggle");
      const menuOverlay = document.getElementById("groupsMenuOverlay");
      const menuClose = document.getElementById("groupsMenuClose");

      function openMenu() {
        if (menuOverlay) {
          menuOverlay.classList.add("active");
          document.body.style.overflow = "hidden";
        }
      }

      function closeMenu() {
        if (menuOverlay) {
          menuOverlay.classList.remove("active");
          document.body.style.overflow = "";
        }
      }

      // Add click handler for menu button
      if (menuButton && menuOverlay) {
        menuButton.addEventListener("click", function(e) {
          e.preventDefault();
          openMenu();
        });
      }

      // Add click handler for close button
      if (menuClose) {
        menuClose.addEventListener("click", closeMenu);
      }

      // Close menu when clicking outside content
      if (menuOverlay) {
        menuOverlay.addEventListener("click", function (e) {
          if (e.target === menuOverlay) {
            closeMenu();
          }
        });

        // Close menu with Escape key
        document.addEventListener("keydown", function (e) {
          if (e.key === "Escape" && menuOverlay.classList.contains("active")) {
            closeMenu();
          }
        });
      }
    });
    </script>
@endif

@once
  @vite('resources/scss/groups/header-sub.scss')
@endonce
