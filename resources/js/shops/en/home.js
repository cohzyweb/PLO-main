// Translation dialog functionality
document.addEventListener('DOMContentLoaded', function() {
  const transButton = document.querySelector('.fixed-side-trans-button');
  const transDialog = document.querySelector('.trans-dialog');
  const transDialogClose = document.querySelector('.trans-dialog-close');

  // Open dialog when button is clicked
  if (transButton && transDialog) {
    transButton.addEventListener('click', function() {
      transDialog.classList.add('active');
      // Prevent body scroll when dialog is open
      document.body.style.overflow = 'hidden';
    });
  }

  // Close dialog when close button is clicked
  if (transDialogClose && transDialog) {
    transDialogClose.addEventListener('click', function() {
      transDialog.classList.remove('active');
      // Restore body scroll
      document.body.style.overflow = '';
    });
  }

  // Close dialog when clicking outside (on overlay)
  if (transDialog) {
    transDialog.addEventListener('click', function(e) {
      // Only close if clicking directly on the overlay (not on the content)
      if (e.target === transDialog) {
        transDialog.classList.remove('active');
        // Restore body scroll
        document.body.style.overflow = '';
      }
    });
  }
});
