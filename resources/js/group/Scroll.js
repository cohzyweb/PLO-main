/**
 * Scroll class
 */

export default class Scroll {

  constructor() {
    this.disabled = false
    this.scrollYSaved = window.scrollY || window.pageYOffset

    this.main = {
      element: document.querySelector('#main'),
    }

    this.footer = {
      element: document.querySelector('#footer'),
    }

    window.global = window.global || {}
    window.global.scroll = this
  }

  /**
   * Disable
   */
  disable() {
    if (this.disabled) return

    // save scroll amount
    this.scrollYSaved = window.scrollY || window.pageYOffset

    // current size
    this.main.height = this.main.element.offsetHeight

    // fix main
    this.main.element.style.position = 'fixed'
    this.main.element.style.top = (0 - this.scrollYSaved) + 'px'

    // fix footer
    this.footer.element.style.position = 'fixed'
    this.footer.element.style.top = (this.main.height - this.scrollYSaved) + 'px'

    // change state
    this.disabled = true
  }

  /**
   * Enable
   */
  enable() {
    if (!this.disabled) return

    // unfix main
    this.main.element.style.position = ''
    this.main.element.style.top = ''

    // unfix footer
    this.footer.element.style.position = ''
    this.footer.element.style.top = ''

    // restore scroll amount
    window.scrollTo(0, this.scrollYSaved)
    // window.scrollTo(0, 0)
    // change state
    this.disabled = false
  }
}
