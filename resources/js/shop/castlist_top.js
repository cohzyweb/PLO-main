import Swiper from 'swiper'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
document.addEventListener('DOMContentLoaded', function() {
  // Check if the slider element exists
  const sliderElement = document.querySelector('.castlist-body-items-slider');
  if (!sliderElement) {
    console.error('Castlist slider element not found');
    return;
  }

  // Check if navigation elements exist
  const prevButton = document.querySelector('.castlist-body-footer-slide-prev');
  const nextButton = document.querySelector('.castlist-body-footer-slide-next');
  
  if (!prevButton || !nextButton) {
    console.error('Navigation buttons not found');
  }

  const swiper = new Swiper('.castlist-body-items-slider', {
    modules: [Autoplay, Navigation, Pagination],
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.castlist-body-footer-slide-next',
      prevEl: '.castlist-body-footer-slide-prev',
    },
    breakpoints: {
      375: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
        
      768: {
        slidesPerView: 3,
        spaceBetween: 30,
      }
    }
  });

  // Add click event listeners as backup
  if (prevButton) {
    prevButton.addEventListener('click', () => {
      swiper.slidePrev();
    });
  }
  
  if (nextButton) {
    nextButton.addEventListener('click', () => {
      swiper.slideNext();
    });
  }
});