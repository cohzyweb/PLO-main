import Pushbar from './groups/pushbar'
import Swiper from 'swiper'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import './group/date-search-bar'
import initGroupsHeaderMenu from './groups/header'

const pushbar = new Pushbar({
  blur: true,
  overlay: true,
});

// Use app-specific state class names to avoid unintended CSS collisions
const sliderStateClassNames = {
  slideActiveClass: 'is-swiper-active',
  slideNextClass: 'is-swiper-next',
  slidePrevClass: 'is-swiper-prev',
};

function initHorizontalDragSlider(sliderElement, trackSelector, itemSelector) {
  if (!sliderElement) return { track: null, items: [] };

  const track = sliderElement.querySelector(trackSelector);
  if (!track) return { track: null, items: [] };

  const items = Array.from(track.children).filter((child) => child.matches(itemSelector));
  if (items.length === 0) return { track, items };

  track.querySelectorAll('img, a').forEach((node) => {
    node.setAttribute('draggable', 'false');
  });

  sliderElement.addEventListener('dragstart', (event) => {
    event.preventDefault();
  });

  sliderElement.style.touchAction = 'pan-y';
  sliderElement.style.scrollBehavior = 'auto';
  track.style.touchAction = 'pan-y';
  items.forEach((item) => {
    item.style.touchAction = 'pan-y';
  });

  if (items.length <= 1) return { track, items };

  let dragging = false;
  let moved = false;
  let startX = 0;
  let startScrollLeft = 0;
  let activePointerId = null;

  const handlePointerDown = (event) => {
    if (event.pointerType === 'mouse' && event.button !== 0) return;

    dragging = true;
    moved = false;
    startX = event.clientX;
    startScrollLeft = sliderElement.scrollLeft;
    activePointerId = event.pointerId;

    sliderElement.classList.add('is-dragging');
    sliderElement.style.scrollSnapType = 'none';

    if (sliderElement.setPointerCapture) {
      sliderElement.setPointerCapture(activePointerId);
    }
  };

  const handlePointerMove = (event) => {
    if (!dragging || (activePointerId !== null && event.pointerId !== activePointerId)) return;

    const deltaX = event.clientX - startX;
    if (Math.abs(deltaX) > 6) moved = true;
    sliderElement.scrollLeft = startScrollLeft - deltaX;
  };

  const finishDrag = () => {
    if (!dragging) return;

    dragging = false;
    sliderElement.classList.remove('is-dragging');
    sliderElement.style.scrollSnapType = 'x mandatory';

    if (activePointerId !== null && sliderElement.releasePointerCapture) {
      try {
        sliderElement.releasePointerCapture(activePointerId);
      } catch (error) {
        // Ignore pointer capture release errors when pointer is already gone.
      }
    }

    activePointerId = null;
  };

  sliderElement.addEventListener('pointerdown', handlePointerDown);
  sliderElement.addEventListener('pointermove', handlePointerMove);
  sliderElement.addEventListener('pointerup', finishDrag);
  sliderElement.addEventListener('pointercancel', finishDrag);
  sliderElement.addEventListener('pointerleave', (event) => {
    if (event.pointerType === 'mouse') finishDrag();
  });
  sliderElement.addEventListener('click', (event) => {
    if (moved) {
      event.preventDefault();
      event.stopPropagation();
      moved = false;
    }
  }, true);

  return { track, items };
}

function initNewfaceHomeSlider(sliderElement) {
  const track = sliderElement.querySelector('.newface-track, .swiper-wrapper');
  if (!track) return;

  const slides = Array.from(track.children).filter(
    (child) => child.classList.contains('newface-slide-item') || child.classList.contains('swiper-slide'),
  );
  if (slides.length <= 1) return;

  // Prevent native image/link dragging so pointer drag always scrolls the slider.
  track.querySelectorAll('img, a').forEach((node) => {
    node.setAttribute('draggable', 'false');
  });

  let dragging = false;
  let moved = false;
  let startX = 0;
  let startScrollLeft = 0;
  let activePointerId = null;
  const isInteractiveTarget = (target) => (
    target instanceof Element
    && Boolean(target.closest('a, button, input, textarea, select, label'))
  );

  const handlePointerDown = (event) => {
    if (event.pointerType === 'mouse' && event.button !== 0) return;
    if (isInteractiveTarget(event.target)) return;

    dragging = true;
    moved = false;
    startX = event.clientX;
    startScrollLeft = sliderElement.scrollLeft;
    activePointerId = event.pointerId;

    sliderElement.classList.add('is-dragging');
    sliderElement.style.scrollSnapType = 'none';

    if (sliderElement.setPointerCapture) {
      sliderElement.setPointerCapture(activePointerId);
    }
  };

  const handlePointerMove = (event) => {
    if (!dragging || (activePointerId !== null && event.pointerId !== activePointerId)) return;

    const deltaX = event.clientX - startX;
    if (Math.abs(deltaX) > 6) moved = true;
    sliderElement.scrollLeft = startScrollLeft - deltaX;
  };

  const finishDrag = () => {
    if (!dragging) return;

    dragging = false;
    sliderElement.classList.remove('is-dragging');
    sliderElement.style.scrollSnapType = 'x mandatory';

    if (activePointerId !== null && sliderElement.releasePointerCapture) {
      try {
        sliderElement.releasePointerCapture(activePointerId);
      } catch (error) {
        // Ignore pointer capture release errors when pointer is already gone.
      }
    }

    activePointerId = null;
  };

  sliderElement.addEventListener('pointerdown', handlePointerDown);
  sliderElement.addEventListener('pointermove', handlePointerMove);
  sliderElement.addEventListener('pointerup', finishDrag);
  sliderElement.addEventListener('pointercancel', finishDrag);
  sliderElement.addEventListener('dragstart', (event) => {
    event.preventDefault();
  });
  sliderElement.addEventListener('pointerleave', (event) => {
    if (event.pointerType === 'mouse') finishDrag();
  });
  sliderElement.addEventListener('click', (event) => {
    if (moved) {
      event.preventDefault();
      event.stopPropagation();
      moved = false;
    }
  }, true);

  sliderElement.style.touchAction = 'pan-y';
  sliderElement.style.scrollBehavior = 'auto';
  track.style.touchAction = 'pan-y';
  slides.forEach((slide) => {
    slide.style.touchAction = 'pan-y';
  });
}

const newfaceHomeSliderElement = document.querySelector('.newface-slide');
if (newfaceHomeSliderElement) {
  initNewfaceHomeSlider(newfaceHomeSliderElement);
}

const newfaceCardsSliderElement = document.querySelector('.newface-cards-slider');
if (newfaceCardsSliderElement) {
  const newfaceCardsCount = newfaceCardsSliderElement.querySelectorAll('.swiper-slide').length;

  new Swiper(newfaceCardsSliderElement, {
    ...sliderStateClassNames,
    modules: [Autoplay, Pagination],
    loop: newfaceCardsCount > 1,
    watchOverflow: true,
    speed: 900,
    autoplay: newfaceCardsCount > 1
      ? {
          delay: 4500,
          disableOnInteraction: false,
        }
      : false,
    slidesPerView: 1,
    spaceBetween: 16,
    pagination: {
      el: '.newface-cards-pagination',
      clickable: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 1.1,
        spaceBetween: 18,
      },
      900: {
        slidesPerView: 1.25,
        spaceBetween: 22,
      },
      1200: {
        slidesPerView: 1.4,
        spaceBetween: 24,
      },
      1600: {
        slidesPerView: 1.6,
        spaceBetween: 28,
      },
    },
  });
}

const diaryContentsSliderElement = document.querySelector('.diary-contents-slide');
if (diaryContentsSliderElement) {
  new Swiper(diaryContentsSliderElement, {
    ...sliderStateClassNames,
    modules: [Autoplay, Navigation],
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    speed: 1000,
    breakpoints: {
      0: {
        centeredSlides: true,
        slidesPerView: 1.4,
        spaceBetween: 30,
      },
      768: {
        centeredSlides: true,
        slidesPerView: 1.3,
        spaceBetween: 30,
      },
      1366: {
        centeredSlides: true,
        slidesPerView: 1.6,
        spaceBetween: 45,
      }
    },
    // navigation: {
    //   prevEl: '.newface-slide-prev',
    //   nextEl: '.newface-slide-next',
    // },
  });
}

const eventPaginationElement = document.querySelector('.event-pagination');
const eventSliderElement = document.querySelector('.event-slider');
if (eventPaginationElement && eventSliderElement) {
  // Create thumbnail swiper for event pagination
  const thumbsSwiper = new Swiper(eventPaginationElement, {
    ...sliderStateClassNames,
    slidesPerView: 'auto',
    centeredSlides: true,
    slideToClickedSlide: true,
    spaceBetween: 4,
    watchSlidesProgress: true,
    loop: true,
    loopedSlides: 5,
    breakpoints: {
      320: {
        slidesPerView: 4,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 4,
      }
    }
  });

  const eventSlider = new Swiper(eventSliderElement, {
    ...sliderStateClassNames,
    modules: [Navigation, Pagination, Autoplay],
    slidesPerView: 'auto',
    spaceBetween: 20,
    centeredSlides: true,
    loop: true,
    loopedSlides: 4,
    speed: 1000,
    autoplay: false,
    thumbs: {
      swiper: thumbsSwiper,
      multipleActiveThumbs: false,
    },
    navigation: {
      nextEl: '.event-slide-next',
      prevEl: '.event-slide-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 60,
        centeredSlides: false,
      },
    },
    on: {
      init: function () {
        this.emit('slideChange');
      },
      slideChange: function () {
        const realIndex = this.realIndex;

        if (thumbsSwiper.slides) {
          thumbsSwiper.slideToLoop(realIndex, 0);

          const thumbnails = document.querySelectorAll('.event-pagination .event-slide-image');
          thumbnails.forEach((thumb) => {
            thumb.classList.remove('swiper-pagination-bullet-active');
          });

          const activeSlides = document.querySelectorAll(`.event-pagination .swiper-slide[data-swiper-slide-index="${realIndex}"] .event-slide-image`);
          activeSlides.forEach((slide) => {
            slide.classList.add('swiper-pagination-bullet-active');
          });
        }
      }
    }
  });

  thumbsSwiper.on('click', function (swiper) {
    const clickedSlide = swiper.clickedSlide;
    if (!clickedSlide) return;

    const slideIndex = parseInt(clickedSlide.getAttribute('data-swiper-slide-index'));
    if (!isNaN(slideIndex)) {
      eventSlider.slideToLoop(slideIndex);
    }
  });
}

// Pickup Girl sliders (custom drag-scroll, no Swiper)

const pickupSliderElement = document.querySelector('.pickup-slider');
const pickupPaginationElement = document.querySelector('.pickup-pagination');
const pickupContentsSliderElement = document.querySelector('.pickup-contents-slider');

const pickupTrackElement = pickupSliderElement
  ? pickupSliderElement.querySelector('.pickup-track, .swiper-wrapper')
  : null;
const pickupMainSlides = pickupTrackElement
  ? Array.from(pickupTrackElement.children).filter(
      (child) => child.classList.contains('pickup-slide-item') || child.classList.contains('swiper-slide'),
    )
  : [];

const pickupPagination = initHorizontalDragSlider(
  pickupPaginationElement,
  '.pickup-pagination-track, .swiper-wrapper',
  '.pickup-pagination-item, .swiper-slide',
);
initHorizontalDragSlider(
  pickupContentsSliderElement,
  '.pickup-contents-track, .swiper-wrapper',
  '.pickup-contents-slide-item, .swiper-slide',
);

const pickupPaginationItems = pickupPagination.items;

if (pickupSliderElement && pickupPaginationElement && pickupMainSlides.length && pickupPaginationItems.length) {
  let activePickupIndex = 0;
  let pickupDragging = false;
  let pickupMoved = false;
  let pickupPreventClick = false;
  let pickupStartX = 0;
  let pickupStartY = 0;
  let pickupDeltaX = 0;
  let pickupPointerId = null;
  let pickupBaseOffset = 0;

  const getPickupSliderWidth = () => {
    const width = pickupSliderElement.clientWidth || pickupSliderElement.getBoundingClientRect().width;
    return width > 0 ? width : 1;
  };

  const applyPickupOffset = (offsetPx, withTransition) => {
    pickupTrackElement.style.transition = withTransition ? 'transform 280ms ease' : 'none';
    pickupTrackElement.style.transform = `translate3d(${offsetPx}px, 0, 0)`;
  };

  pickupSliderElement.style.overflow = 'hidden';
  pickupSliderElement.style.touchAction = 'pan-y';
  pickupSliderElement.style.scrollBehavior = 'auto';
  pickupTrackElement.style.display = 'flex';
  pickupTrackElement.style.flexWrap = 'nowrap';
  pickupTrackElement.style.willChange = 'transform';
  pickupTrackElement.style.touchAction = 'pan-y';

  pickupMainSlides.forEach((slide) => {
    slide.style.display = 'block';
    slide.style.flex = '0 0 100%';
    slide.style.width = '100%';
    slide.style.maxWidth = '100%';
    slide.style.scrollSnapAlign = 'none';

    slide.querySelectorAll('img, a').forEach((node) => {
      node.setAttribute('draggable', 'false');
    });
  });

  const setPickupActiveIndex = (index, options = {}) => {
    const { animate = true } = options;
    const maxIndex = pickupMainSlides.length - 1;
    const clampedIndex = Math.max(0, Math.min(index, maxIndex));
    activePickupIndex = clampedIndex;

    const offset = -(clampedIndex * getPickupSliderWidth());
    applyPickupOffset(offset, animate);

    pickupMainSlides.forEach((slide, slideIndex) => {
      const isActive = slideIndex === clampedIndex;
      slide.classList.toggle('is-active', isActive);
      slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');
    });

    pickupPaginationItems.forEach((item, itemIndex) => {
      const isActive = itemIndex === clampedIndex;
      item.classList.toggle('is-active', isActive);

      const content = item.querySelector('.pickup-slide-contents');
      if (content) {
        content.classList.toggle('is-active', isActive);
      }
    });
  };

  const scrollPickupPaginationToIndex = (index) => {
    const targetItem = pickupPaginationItems[index];
    if (!targetItem) return;

    const left = targetItem.offsetLeft - ((pickupPaginationElement.clientWidth - targetItem.clientWidth) / 2);
    pickupPaginationElement.scrollTo({ left: Math.max(0, left), behavior: 'smooth' });
  };

  pickupPaginationItems.forEach((item, index) => {
    item.addEventListener('click', () => {
      setPickupActiveIndex(index);
      scrollPickupPaginationToIndex(index);
    });
  });

  // Drag uses pointer-capture, so plain click on child can miss in some browsers.
  // Use pointerup + hit-testing to ensure tap/click on pagination item always activates.
  let paginationPointerStartX = 0;
  let paginationPointerStartY = 0;
  let paginationPointerTracking = false;

  pickupPaginationElement.addEventListener('pointerdown', (event) => {
    paginationPointerStartX = event.clientX;
    paginationPointerStartY = event.clientY;
    paginationPointerTracking = true;
  });

  pickupPaginationElement.addEventListener('pointerup', (event) => {
    if (!paginationPointerTracking) return;
    paginationPointerTracking = false;

    const deltaX = event.clientX - paginationPointerStartX;
    const deltaY = event.clientY - paginationPointerStartY;

    // Swipe on pagination without changing CSS layout.
    if (Math.abs(deltaX) > 24 && Math.abs(deltaX) >= Math.abs(deltaY)) {
      const nextIndex = deltaX < 0 ? activePickupIndex + 1 : activePickupIndex - 1;
      setPickupActiveIndex(nextIndex);
      scrollPickupPaginationToIndex(activePickupIndex);
      return;
    }

    if (Math.abs(deltaX) > 8 || Math.abs(deltaY) > 8) return;

    const hit = document.elementFromPoint(event.clientX, event.clientY);
    const tappedItem = hit ? hit.closest('.pickup-pagination-item') : null;
    if (!tappedItem || !pickupPaginationElement.contains(tappedItem)) return;

    const index = pickupPaginationItems.indexOf(tappedItem);
    if (index < 0) return;

    setPickupActiveIndex(index);
    scrollPickupPaginationToIndex(index);
  });

  // Swipe main pickup card by pressing/holding and dragging on image/card area.
  if (pickupMainSlides.length > 1) {
    const beginPickupDrag = (event) => {
      if (event.pointerType === 'mouse' && event.button !== 0) return;

      pickupDragging = true;
      pickupMoved = false;
      pickupPreventClick = false;
      pickupDeltaX = 0;
      pickupStartX = event.clientX;
      pickupStartY = event.clientY;
      pickupPointerId = event.pointerId ?? null;
      pickupBaseOffset = -(activePickupIndex * getPickupSliderWidth());
      pickupSliderElement.classList.add('is-dragging');
      pickupTrackElement.style.transition = 'none';

      if (pickupPointerId !== null && pickupSliderElement.setPointerCapture) {
        try {
          pickupSliderElement.setPointerCapture(pickupPointerId);
        } catch (error) {
          // Ignore capture errors on unsupported browsers.
        }
      }
    };

    const movePickupDrag = (event) => {
      if (!pickupDragging) return;
      if (pickupPointerId !== null && event.pointerId !== pickupPointerId) return;

      pickupDeltaX = event.clientX - pickupStartX;
      const deltaY = event.clientY - pickupStartY;
      if (Math.abs(pickupDeltaX) > 4 && Math.abs(pickupDeltaX) >= Math.abs(deltaY)) {
        pickupMoved = true;
        if (event.cancelable) {
          event.preventDefault();
        }
      }

      if (!pickupMoved) return;
      applyPickupOffset(pickupBaseOffset + pickupDeltaX, false);
    };

    const endPickupDrag = (event) => {
      if (!pickupDragging) return;
      if (event && pickupPointerId !== null && event.pointerId !== pickupPointerId) return;

      pickupDragging = false;
      pickupSliderElement.classList.remove('is-dragging');

      const sliderWidth = getPickupSliderWidth();
      let nextIndex = activePickupIndex;
      if (Math.abs(pickupDeltaX) > Math.max(36, sliderWidth * 0.12)) {
        nextIndex = pickupDeltaX < 0 ? activePickupIndex + 1 : activePickupIndex - 1;
      }

      if (pickupMoved) {
        pickupPreventClick = true;
      }

      setPickupActiveIndex(nextIndex);
      scrollPickupPaginationToIndex(activePickupIndex);

      if (pickupPointerId !== null && pickupSliderElement.releasePointerCapture) {
        try {
          pickupSliderElement.releasePointerCapture(pickupPointerId);
        } catch (error) {
          // Ignore release errors when pointer is already gone.
        }
      }

      pickupPointerId = null;
      pickupMoved = false;
      pickupDeltaX = 0;
    };

    pickupSliderElement.addEventListener('pointerdown', beginPickupDrag);
    pickupSliderElement.addEventListener('pointermove', movePickupDrag);
    pickupSliderElement.addEventListener('pointerup', endPickupDrag);
    pickupSliderElement.addEventListener('pointercancel', endPickupDrag);
    pickupSliderElement.addEventListener('pointerleave', (event) => {
      if (event.pointerType === 'mouse') endPickupDrag(event);
    });
    pickupSliderElement.addEventListener('dragstart', (event) => {
      event.preventDefault();
    });
    pickupSliderElement.addEventListener('click', (event) => {
      if (!pickupPreventClick) return;
      event.preventDefault();
      event.stopPropagation();
      pickupPreventClick = false;
    }, true);
  }

  window.addEventListener('resize', () => {
    setPickupActiveIndex(activePickupIndex, { animate: false });
  });

  const initialIndex = 0;
  setPickupActiveIndex(initialIndex, { animate: false });
  scrollPickupPaginationToIndex(initialIndex);
}

// Mobile dropdown menu for groups-shops-buttons
document.addEventListener('DOMContentLoaded', function () {
  const shopButton = document.querySelector('.groups-shop-button--main');
  const shopsGrid = document.querySelector('.groups-shops-grid');

  if (shopButton && shopsGrid) {
    shopButton.addEventListener('click', function (event) {
      // On mobile, this acts as a dropdown toggle (prevent form submit if it's inside a form)
      if (window.innerWidth <= 850) {
        const isSubmit = shopButton.getAttribute('type') === 'submit';
        const isOpen = shopButton.classList.contains('active');

        // First tap: open dropdown
        if (!isOpen) {
          event.preventDefault();
          shopButton.classList.add('active');
          shopsGrid.classList.add('active');
          return;
        }

        // Second tap while open:
        // - New Face (submit button): allow submit to reset to "all shops"
        // - Other pages (type=button): just close the dropdown
        if (!isSubmit) {
          event.preventDefault();
          shopButton.classList.remove('active');
          shopsGrid.classList.remove('active');
        } else {
          shopButton.classList.remove('active');
          shopsGrid.classList.remove('active');
        }
      }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (event) {
      const isClickInside = shopButton.contains(event.target) || shopsGrid.contains(event.target);
      if (!isClickInside && window.innerWidth <= 850) {
        shopButton.classList.remove('active');
        shopsGrid.classList.remove('active');
      }
    });
  }
});


// Add Intersection Observer for event-slider animation
// const pickupSliderElement = document.querySelector('.pickup-slider');
// if (pickupSliderElement) {
//   const observer = new IntersectionObserver((entries) => {
//     entries.forEach(entry => {
//       if (entry.isIntersecting) {
//         entry.target.classList.add('animate');
//         // Stop observing after animation is triggered
//         observer.unobserve(entry.target);
//       }
//     });
//   }, {
//     threshold: 0.2, // Trigger when 20% of the element is visible
//     rootMargin: '0px' // No margin
//   });

//   observer.observe(pickupSliderElement);
// }

// Video play button functionality for movie page
document.addEventListener('DOMContentLoaded', function () {
  const videoWrappers = document.querySelectorAll('.groups-movie-card__video-wrapper');

  videoWrappers.forEach(wrapper => {
    const video = wrapper.querySelector('.groups-movie-card__video');
    const playButton = wrapper.querySelector('.groups-movie-card__play-button');

    if (!video || !playButton) return;

    // Click on wrapper to play video
    wrapper.addEventListener('click', function (e) {
      // Don't trigger if clicking directly on video controls
      if (e.target === video || video.contains(e.target)) {
        return;
      }

      // Show video controls and play
      video.setAttribute('controls', 'controls');
      video.style.display = 'block';
      playButton.style.display = 'none';
      video.play().catch(err => {
        console.log('Video play failed:', err);
      });
    });

    // Hide play button when video starts playing
    video.addEventListener('play', function () {
      playButton.style.display = 'none';
    });

    // Show play button when video is paused (but not if controls are visible)
    video.addEventListener('pause', function () {
      if (!video.hasAttribute('controls')) {
        playButton.style.display = 'block';
      }
    });

    // Show play button when video ends
    video.addEventListener('ended', function () {
      playButton.style.display = 'block';
      video.removeAttribute('controls');
      video.style.display = 'none';
    });
  });
});

// Recruit staff blog simple carousel
document.addEventListener('DOMContentLoaded', function () {
  const carousel = document.querySelector('[data-recruit-blog-carousel]');
  const prevBtn = document.querySelector('[data-recruit-blog-prev]');
  const nextBtn = document.querySelector('[data-recruit-blog-next]');

  if (!carousel || !prevBtn || !nextBtn) return;

  const firstCard = carousel.querySelector('.recruit-blog__card');
  const step = firstCard ? firstCard.getBoundingClientRect().width + 20 : 420;

  function scrollByStep(direction) {
    carousel.scrollBy({
      left: direction * step,
      behavior: 'smooth',
    });
  }

  prevBtn.addEventListener('click', () => scrollByStep(-1));
  nextBtn.addEventListener('click', () => scrollByStep(1));
});

// Recruit requirements cards carousel with dots
document.addEventListener('DOMContentLoaded', function () {
  const carousel = document.querySelector('[data-requirements-carousel]');
  const dotsContainer = document.querySelector('[data-requirements-dots]');

  if (!carousel || !dotsContainer) return;

  const cards = carousel.querySelectorAll('.recruit-requirements__card');
  const dots = dotsContainer.querySelectorAll('[data-requirements-dot]');

  if (cards.length === 0 || dots.length === 0) return;

  // Update active dot based on scroll position
  function updateActiveDot() {
    const scrollLeft = carousel.scrollLeft;
    const containerWidth = carousel.offsetWidth;

    // Find which card is most centered/visible
    let activeIndex = 0;
    let minDistance = Infinity;

    cards.forEach((card, index) => {
      const cardLeft = card.offsetLeft - carousel.offsetLeft;
      const cardCenter = cardLeft + card.offsetWidth / 2;
      const viewCenter = scrollLeft + containerWidth / 2;
      const distance = Math.abs(cardCenter - viewCenter);

      if (distance < minDistance) {
        minDistance = distance;
        activeIndex = index;
      }
    });

    // Update dots
    dots.forEach((dot, index) => {
      dot.classList.toggle('recruit-requirements__dot--active', index === activeIndex);
    });
  }

  // Scroll to specific card when dot is clicked
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      if (cards[index]) {
        const cardLeft = cards[index].offsetLeft - carousel.offsetLeft;
        const containerWidth = carousel.offsetWidth;
        const cardWidth = cards[index].offsetWidth;
        // Center the card in the viewport
        const scrollTarget = cardLeft - (containerWidth - cardWidth) / 2;

        carousel.scrollTo({
          left: Math.max(0, scrollTarget),
          behavior: 'smooth',
        });
      }
    });
  });

  // Listen to scroll events with debounce
  let scrollTimeout;
  carousel.addEventListener('scroll', () => {
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(updateActiveDot, 50);
  });

  // Initial state
  updateActiveDot();
});

// Recruit Female Movie Carousel
document.addEventListener('DOMContentLoaded', function () {
  const blocks = document.querySelectorAll('.recruit-female-movie__block');

  blocks.forEach(block => {
    const mainImg = block.querySelector('.recruit-female-movie__frame img');
    const prevBtn = block.querySelector('.recruit-female-movie__arrow--prev');
    const nextBtn = block.querySelector('.recruit-female-movie__arrow--next');
    const thumbContainers = Array.from(block.querySelectorAll('.recruit-female-movie__thumb'));

    if (!mainImg || !prevBtn || !nextBtn || thumbContainers.length === 0) return;

    let currentIndex = 0;

    // Update main image from current thumb
    const updateMainImage = () => {
      const img = thumbContainers[currentIndex].querySelector('img');
      if (img) mainImg.src = img.src;
    };

    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex > 0) ? currentIndex - 1 : thumbContainers.length - 1;
      updateMainImage();
    });

    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex < thumbContainers.length - 1) ? currentIndex + 1 : 0;
      updateMainImage();
    });

    // Optional: Make thumbs clickable too
    thumbContainers.forEach((thumb, index) => {
      thumb.style.cursor = 'pointer';
      thumb.addEventListener('click', () => {
        currentIndex = index;
        updateMainImage();
      });
    });
  });
});
