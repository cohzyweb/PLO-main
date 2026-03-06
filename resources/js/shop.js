import Swiper from 'swiper'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
// import Scroll from './shop/Scroll'
import Header from './shop/Header'
// import Drawer from './shop/Drawer'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import Pushbar from './group/pushbar'

/** Scroll */
// const scroll = new Scroll()

/** Header */
const header = new Header()

/** Drawer */
// const drawer = new Drawer({ scroll: scroll })
const pushbar = new Pushbar({
  blur: true,
  overlay: true,
});

document.addEventListener('DOMContentLoaded', function() {
  // if (typeof Swiper !== 'undefined') {
  //   const eventSlider = new Swiper('.event-slider', {
  //     modules: [Navigation, Pagination, Autoplay],
  //     slidesPerView: 'auto',
  //     spaceBetween: 20,
  //     centeredSlides: true,
  //     loop: true,
  //     speed: 1000,
  //     autoplay: {
  //       delay: 3000,
  //       disableOnInteraction: false,
  //       reverseDirection: false,
  //     },
  //     pagination: {
  //       el: '.swiper-pagination',
  //       clickable: true,
  //     },
  //     navigation: {
  //       nextEl: '.event-slide-next',
  //       prevEl: '.event-slide-prev',
  //     },
  //     breakpoints: {
  //       320: {
  //         slidesPerView: 2,
  //         spaceBetween: 20,
  //       },
  //       768: {
  //         slidesPerView: 3,
  //         spaceBetween: 30,
  //         centeredSlides: false,
  //       }
  //     }
  //   });
  // } else {
  //   console.error('Swiper is not loaded');
  // }
})
window.addEventListener('load', () => {
  resizeModule();
  // const mv = document.querySelector('.mv');
  // const body = document.querySelector('body');
  // const header = document.querySelector('.header');

  // if (mv) {
  //   console.log({mv});
  //   console.log(body.clientWidth);
  //   console.log(mv.offsetWidth);
  //   console.log(mv.clientWidth);
  //   console.log(header.offsetHeight);
  //   let logo_height = 0;
  //   // const logo = document.querySelector('.header-logo');
  //   // if (logo) {
  //   //   logo_height = logo.offsetHeight;
  //   // }
  //   // const draw = document.querySelector('.drawer-toggle');
  //   // if (draw) {
  //   //   const draw_height = draw.offsetHeight;
  //   //   console.log({draw_height});
  //   //   if (logo_height > draw_height) {
  //   //     draw.style.top = `${logo_height - draw_height}px`;
  //   //   }
  //   // }
  //   // if ( body.clientWidth < 768){
  //   //   mv.style.width = `${body.clientWidth}px`;

  //   // }
  //   console.log({logo_height});
  //   // console.log(logo.clientHeight);
  //   // mv.style.top = `${logo_height}px`;
  //   const main = document.querySelector('.main');
  //   if (main) {
  //     console.log({main});
  //     main.style.marginTop = `${mv.offsetHeight - header.offsetHeight}px`;
  //   }
  // }
});
window.addEventListener('resize', () => {
  resizeModule();
});
function resizeModule() {
  const mv = document.querySelector('.mv');
  const body = document.querySelector('body');
  const header = document.querySelector('.header');

  if (mv) {
    // console.log({mv});
    // console.log(body.clientWidth);
    // console.log(mv.offsetWidth);
    // console.log(mv.clientWidth);
    // console.log(header.offsetHeight);
    let logo_height = 0;
    // const logo = document.querySelector('.header-logo');
    // if (logo) {
    //   logo_height = logo.offsetHeight;
    // }
    // const draw = document.querySelector('.drawer-toggle');
    // if (draw) {
    //   const draw_height = draw.offsetHeight;
    //   console.log({draw_height});
    //   if (logo_height > draw_height) {
    //     draw.style.top = `${logo_height - draw_height}px`;
    //   }
    // }
    // if ( body.clientWidth < 768){
    //   mv.style.width = `${body.clientWidth}px`;

    // }
    // console.log({logo_height});
    // console.log(logo.clientHeight);
    // mv.style.top = `${logo_height}px`;
    const main = document.querySelector('.main');
    if (main) {
      // console.log({main});
      // console.log(header.offsetHeight);
      // console.log(body.clientHeight);
      mv.style.top = `${header.offsetHeight}px`;
      main.style.marginTop = `${mv.offsetHeight + header.offsetHeight}px`;
    }
  }else{
    console.log({header});
    if (header) {
      console.log(header.offsetHeight);
      const main = document.querySelector('.main');
      if (main) {
        main.style.marginTop = `${header.offsetHeight}px`;
      }
    }
  }

}
window.addEventListener('scroll', () => {
  // Get current scroll position
  const scrollPosition = window.scrollY || window.pageYOffset;
  // Get viewport height
  const viewportHeight = window.innerHeight;
  // Get total page height
  const pageHeight = document.documentElement.scrollHeight;
  
  // Calculate percentage scrolled
  const scrollPercentage = (scrollPosition / (pageHeight - viewportHeight)) * 100;
  
  // console.log({
  //   scrollPosition,
  //   viewportHeight, 
  //   pageHeight,
  //   scrollPercentage: Math.round(scrollPercentage)
  // });
});
// Create thumbnail swiper for pagination
const thumbsSwiper = new Swiper('.event-pagination', {
  slidesPerView: 'auto',
  centeredSlides: true,
  slideToClickedSlide: true,
  spaceBetween: 4,
  watchSlidesProgress: true,
  loop: true,
  loopedSlides: 4,
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

// Main event slider
const eventSlider = new Swiper('.event-slider', {
  modules: [Navigation, Pagination, Autoplay],
  slidesPerView: 'auto',
  spaceBetween: 20,
  centeredSlides: true,
  loop: true,
  loopedSlides: 4,
  speed: 1000,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
    reverseDirection: false,
  },
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

      // サムネイルスライダーを同期
      if (thumbsSwiper.slides) {
        thumbsSwiper.slideToLoop(realIndex, 0);

        // すべてのサムネイルからアクティブクラスを削除
        const thumbnails = document.querySelectorAll('.event-pagination .event-slide-image');
        thumbnails.forEach(thumb => {
          thumb.classList.remove('swiper-pagination-bullet-active');
        });

        // 現在のインデックスに対応するサムネイルにアクティブクラスを追加
        const activeSlides = document.querySelectorAll(`.event-pagination .swiper-slide[data-swiper-slide-index="${realIndex}"] .event-slide-image`);
        activeSlides.forEach(slide => {
          slide.classList.add('swiper-pagination-bullet-active');
        });
      }
    }
  }
});

// Sync thumbnail clicks with main slider
thumbsSwiper.on('click', function (swiper) {
  const clickedSlide = swiper.clickedSlide;
  if (clickedSlide) {
    const slideIndex = parseInt(clickedSlide.getAttribute('data-swiper-slide-index'));
    if (!isNaN(slideIndex)) {
      eventSlider.slideToLoop(slideIndex);
    }
  }
});

// Add Intersection Observer for event-slider animation
const eventSliderElement = document.querySelector('.event-slider');
if (eventSliderElement) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate');
        // Stop observing after animation is triggered
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.2, // Trigger when 20% of the element is visible
    rootMargin: '0px' // No margin
  });

  observer.observe(eventSliderElement);
}

// let scrollTimeout;
// window.addEventListener('scroll', () => {
//   const mv = document.querySelector('.mv');
//   if (mv) {
//     mv.style.opacity = 0.6;
//   }
// clearTimeout(scrollTimeout);
//   scrollTimeout = setTimeout(() => {
//     // const mv = document.querySelector('.mv');
//     if (mv) {
//       mv.style.opacity = 1;
//     }
//   }, 150); // 150msのディレイ
// });