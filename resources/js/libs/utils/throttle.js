/**
 * Throttle
 */
export function throttle(fn, interval) {
  let lastTime = Date.now() - interval
  return function() {
    if ((lastTime + interval) < Date.now()) {
      lastTime = Date.now()
      fn()
    }
  }
}
