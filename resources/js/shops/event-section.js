import Swiper from "swiper";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

document.addEventListener("DOMContentLoaded", function () {
  // Initialize event section main banner and sub-banners sliders
  const mainBannerSlider = document.querySelector(".event-main-banner-slider");
  const paginationElement = document.querySelector(".event-sub-banners-slider");
  const prevButton = document.querySelector(".event-sub-banners-prev");
  const nextButton = document.querySelector(".event-sub-banners-next");

  if (!mainBannerSlider || !paginationElement) {
    return; // No slider needed if elements don't exist
  }

  // Get slide count
  const slides = mainBannerSlider.querySelectorAll(
    ".swiper-wrapper .swiper-slide"
  );
  if (slides.length <= 1) {
    return; // No need for slider with single image
  }

  // Initialize sub-banners slider (visible smaller banners)
  const thumbsSwiper = new Swiper(paginationElement, {
    slidesPerView: "auto",
    centeredSlides: false,
    slideToClickedSlide: true,
    spaceBetween: 10,
    watchSlidesProgress: true,
    loop: false, // Disable loop to show all 4 images properly
    speed: 500, // Match main slider speed
    breakpoints: {
      320: {
        slidesPerView: 3,
        spaceBetween: 10,
        centeredSlides: false,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 10,
        centeredSlides: false,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 10,
        centeredSlides: false,
      },
    },
  });

  // Get navigation buttons for main banner
  const mainBannerPrev = document.querySelector(".event-main-banner-prev");
  const mainBannerNext = document.querySelector(".event-main-banner-next");

  // Initialize main banner slider
  const mainSwiper = new Swiper(mainBannerSlider, {
    modules: [Navigation, Pagination, Autoplay],
    slidesPerView: 1,
    spaceBetween: 0,
    loop: false, // Disable loop to prevent empty/blue duplicate slides
    speed: 500,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    thumbs: {
      swiper: thumbsSwiper,
      multipleActiveThumbs: false,
    },
    navigation: {
      nextEl: mainBannerNext || nextButton,
      prevEl: mainBannerPrev || prevButton,
    },
    on: {
      init: function () {
        this.emit("slideChange");
      },
      slideChange: function () {
        const realIndex = this.realIndex;

        // Sync sub-banners slider to move with main banner
        if (thumbsSwiper && thumbsSwiper.slides) {
          // Move sub-banners slider to show the corresponding image
          thumbsSwiper.slideTo(realIndex, 500); // 500ms animation to match main slider

          // Remove active class from all sub-banners
          const subBanners =
            paginationElement.querySelectorAll(".swiper-slide");
          subBanners.forEach((banner) => {
            banner.classList.remove("swiper-pagination-bullet-active");
          });

          // Add active class to current sub-banner
          const activeSlides = paginationElement.querySelectorAll(
            `.swiper-slide[data-swiper-slide-index="${realIndex}"]`
          );
          activeSlides.forEach((slide) => {
            slide.classList.add("swiper-pagination-bullet-active");
          });
        }
      },
      slideChangeTransitionStart: function () {
        // Start syncing sub-banners as soon as main banner starts sliding
        const realIndex = this.realIndex;
        if (thumbsSwiper && thumbsSwiper.slides) {
          thumbsSwiper.slideTo(realIndex, 500);
        }
      },
    },
  });

  // Sync thumbnail clicks with main slider
  thumbsSwiper.on("click", function (swiper) {
    const clickedSlide = swiper.clickedSlide;
    if (clickedSlide) {
      const slideIndex = parseInt(
        clickedSlide.getAttribute("data-swiper-slide-index")
      );
      if (!isNaN(slideIndex)) {
        // Always use slideTo since loop is disabled
        mainSwiper.slideTo(slideIndex, 500);
      }
    }
  });

  // Make sub-banners navigation buttons control main banner
  if (prevButton) {
    prevButton.addEventListener("click", function () {
      mainSwiper.slidePrev();
    });
  }

  if (nextButton) {
    nextButton.addEventListener("click", function () {
      mainSwiper.slideNext();
    });
  }
});
