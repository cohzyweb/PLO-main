/**
 * Groups Header Menu Overlay
 * Handles menu overlay toggle for groups home page
 */

export default function initGroupsHeaderMenu() {
  // Only initialize if menu overlay exists (groups home page)
  const menuOverlay = document.getElementById("groupsMenuOverlay");
  if (!menuOverlay) {
    return;
  }

  const menuButton = document.getElementById("drawer-toggle");
  
  // Only run on home page - sub-layout pages have data-pushbar-target attribute
  // and their own script in header-sub.blade.php
  if (menuButton && menuButton.hasAttribute('data-pushbar-target')) {
    return;
  }

  const menuClose = document.getElementById("groupsMenuClose");

  function openMenu() {
    if (menuOverlay) {
      // Remove inline style that might conflict
      menuOverlay.style.display = "";
      menuOverlay.classList.add("active");
      document.body.style.overflow = "hidden";
    }
  }

  function closeMenu() {
    if (menuOverlay) {
      menuOverlay.classList.remove("active");
      document.body.style.overflow = "";
      // Reset display after transition
      setTimeout(() => {
        if (!menuOverlay.classList.contains("active")) {
          menuOverlay.style.display = "none";
        }
      }, 300);
    }
  }

  // Add click handler for menu button
  if (menuButton && menuOverlay) {
    menuButton.addEventListener("click", function(e) {
      e.preventDefault();
      e.stopPropagation();
      // Check if menu is already open
      if (menuOverlay.classList.contains("active")) {
        closeMenu();
      } else {
        openMenu();
      }
    });
  }

  // Add click handler for close button
  if (menuClose) {
    menuClose.addEventListener("click", function(e) {
      e.preventDefault();
      e.stopPropagation();
      closeMenu();
    });
  }

  // Close menu when clicking outside content
  if (menuOverlay) {
    menuOverlay.addEventListener("click", function (e) {
      if (e.target === menuOverlay) {
        closeMenu();
      }
    });

    // Close menu with Escape key
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && menuOverlay.classList.contains("active")) {
        closeMenu();
      }
    });
  }
}

// Initialize on DOMContentLoaded
document.addEventListener("DOMContentLoaded", initGroupsHeaderMenu);
