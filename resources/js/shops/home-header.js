document.addEventListener("DOMContentLoaded", function () {
  // Menu toggle functionality
  const menuButton = document.querySelector(".menu-button");
  const mobileMenuButton = document.getElementById("mobileMenuButton");
  const menuOverlay = document.getElementById("menuOverlay");
  const menuClose = document.getElementById("menuClose");
  const menuCloseMobile = document.getElementById("menuCloseMobile");
  const fixedSideButtons = document.querySelector(".fixed-side-buttons");

  function openMenu() {
    if (menuOverlay) {
      menuOverlay.classList.add("active");
      document.body.style.overflow = "hidden";
      fixedSideButtons.style.display = "none";
    }
  }

  function closeMenu() {
    if (menuOverlay) {
      menuOverlay.classList.remove("active");
      document.body.style.overflow = "";
      fixedSideButtons.style.display = "flex";
    }
  }

  // Menu button can be either class or ID
  if (menuOverlay && menuClose) {
    // Add click handler for menu button (class selector)
    if (menuButton) {
      menuButton.addEventListener("click", openMenu);
    }

    // Add click handler for mobile menu button (ID selector)
    if (mobileMenuButton) {
      mobileMenuButton.addEventListener("click", openMenu);
    }

    menuClose.addEventListener("click", closeMenu);
    menuCloseMobile.addEventListener("click", closeMenu);
    // Close menu when clicking outside content
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

  // Scroll handling for overlay opacity and sticky header
  const overlay = document.querySelector(".home-gradient-overlay");
  const homeHeader = document.querySelector(".home-header");
  const homeContent = document.querySelector(".home-content");
  const pageContent = document.querySelector(".page-content");
  const homeSchedule = document.querySelector(".home-schedule");
  const banner = document.querySelector(".banner");

  // Mobile breakpoint (matches CSS: max-width: 850px)
  const mobileBreakpoint = 850;

  // Check if current viewport is mobile
  function isMobile() {
    return window.innerWidth <= mobileBreakpoint;
  }

  if (overlay || homeHeader) {
    function handleScroll() {
      const scrollTop =
        window.pageYOffset || document.documentElement.scrollTop;

      // Handle overlay opacity
      if (overlay) {
        // Start showing overlay immediately when scrolling
        // Increase opacity gradually as user scrolls
        // Adjust these values to control when and how fast the overlay appears
        const startFade = 0; // Start fading in immediately
        const fadeDistance = 500; // Distance in pixels to reach full opacity

        let opacity = 0;
        if (scrollTop > startFade) {
          // Calculate opacity based on scroll position
          const scrollAmount = scrollTop - startFade;
          opacity = Math.min(scrollAmount / fadeDistance, 1);
        }

        overlay.style.opacity = opacity;
      }

      // Handle sticky header
      if (homeHeader) {
        let shouldBeFixed = false;

        // On mobile: always fix header at top
        if (isMobile()) {
          shouldBeFixed = true;
        }
        // On desktop: use scroll-based logic
        else {
          // For home page: check schedule section
          if (homeContent && homeSchedule) {
            const scheduleRect = homeSchedule.getBoundingClientRect();
            const headerHeight = homeHeader.offsetHeight;

            // Calculate distance from bottom of header to top of schedule section
            const distanceToSchedule = scheduleRect.top - headerHeight;

            // Header should be fixed when schedule section reaches or passes the header bottom
            shouldBeFixed = distanceToSchedule <= 0;
          }
          // For other pages (schedule, castlist, profile): check banner section
          else if (pageContent && banner) {
            const bannerRect = banner.getBoundingClientRect();
            const headerHeight = homeHeader.offsetHeight;

            // Calculate distance from bottom of header to bottom of banner section
            const distanceToBanner = bannerRect.bottom - headerHeight;

            // Header should be fixed when banner section passes the header bottom
            shouldBeFixed = distanceToBanner <= 0;
          }
          // Fallback: fix header when scrolling past a certain point
          else if (homeHeader) {
            const headerRect = homeHeader.getBoundingClientRect();
            shouldBeFixed = scrollTop > headerRect.height;
          }
        }

        if (shouldBeFixed) {
          if (!homeHeader.classList.contains("fixed-header")) {
            homeHeader.classList.add("fixed-header");
          }
        } else {
          if (homeHeader.classList.contains("fixed-header")) {
            homeHeader.classList.remove("fixed-header");
          }
        }
      }
    }

    // Initial check
    handleScroll();

    // Throttle scroll event for better performance
    let ticking = false;
    window.addEventListener(
      "scroll",
      function () {
        if (!ticking) {
          window.requestAnimationFrame(function () {
            handleScroll();
            ticking = false;
          });
          ticking = true;
        }
      },
      { passive: true }
    );

    // Handle window resize to update header state when switching between mobile/desktop
    let resizeTicking = false;
    window.addEventListener("resize", function () {
      if (!resizeTicking) {
        window.requestAnimationFrame(function () {
          handleScroll();
          resizeTicking = false;
        });
        resizeTicking = true;
      }
    });
  }
});
