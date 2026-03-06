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
    this.$drawer.classList.remove('--shown')
    this.$base.classList.remove('--shown')

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
    this.$drawer.classList.add('--shown')

    // Show base
    this.$base.classList.add('--shown')

    // Transform toggle
    // this.$toggle.classList.add('--hider');
    // this.$toggle.classList.remove('--shower');
    this.$toggle.classList.add('active');
    // this.$toggle.classList.remove('--shower');

    // Disable scroll
    this.scroll.disable()
    // window.location.reload();

    // Change state
    this.shown = true
  }

  /**
   * Hide
   */
  hide() {
    // Hide drawer
    this.$drawer.classList.remove('--shown')

    // Hide base
    this.$base.classList.remove('--shown')

    // Transform toggle
    // this.$toggle.classList.add('--shower');
    // this.$toggle.classList.remove('--hider');
    this.$toggle.classList.remove('active');

    // Enable scroll
    this.scroll.enable()
    window.location.reload();
    // Change state
    this.shown = false
  }
}
