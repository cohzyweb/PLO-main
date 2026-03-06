/**
 * Drawer class
 */

export default class Drawer {

  constructor(args) {
    this.scroll = args.scroll
    this.$drawer = document.getElementById('drawer')
    this.$toggle = document.getElementById('drawer-toggle')

    if (!this.$drawer || !this.$toggle) return

    // Create base
    this.$base = document.createElement('div')
    this.$base.classList.add('drawer-base')
    this.$drawer.parentNode.insertBefore(this.$base, this.$drawer)
    this.$base.addEventListener('click', () => this.hide())

    // Init
    this.shown = false
    this.$drawer.classList.remove('is-shown')
    this.$base.classList.remove('is-shown')

    // Show / Hide on click
    this.$toggle.addEventListener('click', () => {
      if (this.shown) this.hide()
      else this.show()
    })

    // Hide
    const drawerLinks = document.querySelectorAll('.drawer-nav > ul > li > a')
    drawerLinks.forEach(link => {
      link.addEventListener('click', () => this.hide())
    })
  }

  /**
   * Show
   */
  show() {
    // Show drawer
    this.$drawer.classList.add('is-shown')

    // Show base
    this.$base.classList.add('is-shown')

    // Transform toggle
    this.$toggle.classList.add('can-hide');
    this.$toggle.classList.remove('can-show');

    // Disable scroll
    this.scroll.disable()

    // Change state
    this.shown = true
  }

  /**
   * Hide
   */
  hide() {
    // Hide drawer
    this.$drawer.classList.remove('is-shown')

    // Hide base
    this.$base.classList.remove('is-shown')

    // Transform toggle
    this.$toggle.classList.add('can-show');
    this.$toggle.classList.remove('can-hide');

    // Enable scroll
    this.scroll.enable()

    // Change state
    this.shown = false
  }
}
