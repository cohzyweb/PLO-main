/**
 * Slide In Effect Class
 */

export default class SlideIn {

  constructor(selector) {
    this.selector = selector
    this.targets = document.querySelectorAll(selector)

    this.targets.forEach(target => {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-shown')
          }
        })
      }, {
        rootMargin: '0px 0px -15%'
      })
      observer.observe(target)
    })
  }
}
