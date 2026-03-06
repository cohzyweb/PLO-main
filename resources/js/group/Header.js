/**
 * Header class
 */

import { throttle } from '../libs/utils/throttle';

export default class Header {

  constructor() {
    this.$header = document.getElementById('header')
    this.navSelector = '.header-nav > ul > li > a'

    // show hide by scroll
    this.scrollBefore = window.scrollY || window.pageYOffset
    const observeVisibility = () => {
      const scrollAfter = window.scrollY || window.pageYOffset
      if (scrollAfter <= 0 || scrollAfter < this.scrollBefore) {
        this.show()
      } else {
        if (scrollAfter > 400) this.hide()
      }
      this.scrollBefore = scrollAfter;
    }
    window.addEventListener('scroll', throttle(observeVisibility, 50))
  }

  hide() {
    this.$header.classList.add('--hidden')
  }

  show() {
    this.$header.classList.remove('--hidden')
  }
}
