import Swiper from 'swiper'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
// import 'swiper/css'
// import 'swiper/css/navigation'
// import 'swiper/css/pagination'
// import 'swiper/css/autoplay'

const swiper_one = new Swiper('.ranking-one-item-image-sp', {
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
      nextEl: '.ranking-one-item-image-sp-next',
      prevEl: '.ranking-one-item-image-sp-prev',
    },
    breakpoints: {
      375: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
        
      768: {
        slidesPerView: 1,
        spaceBetween: 10,
      }
    }
});

const swiper_two = new Swiper('.ranking-two-item-image-two-sp', {
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
      nextEl: '.ranking-two-item-image-two-sp-next',
      prevEl: '.ranking-two-item-image-two-sp-prev',
    },
    breakpoints: {
      375: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 30,
      }
    }
});

const swiper_three = new Swiper('.ranking-two-item-image-three-sp', {
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
    nextEl: '.ranking-two-item-image-three-sp-next',
    prevEl: '.ranking-two-item-image-three-sp-prev',
  },
  breakpoints: {
    375: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 30,
    }
  }
});
