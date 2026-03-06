import Swiper from 'swiper'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
document.addEventListener('DOMContentLoaded', function() {
  const swiper = new Swiper('.news-girls-slider', {
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
      nextEl: '.new-girls-slide-next',
      prevEl: '.new-girls-slide-prev',
    },
    breakpoints: {
      768: {
        slidesPerView: 1,
        spaceBetween: 10,
      }
    }
  });
});