document.addEventListener('DOMContentLoaded', function() {
    // Profile image slider
    const mainImage = document.getElementById('mainImage');
    const prevBtn = document.querySelector('.profile-image-prev');
    const nextBtn = document.querySelector('.profile-image-next');
    const galleryItems = document.querySelectorAll('.girl-photo-gallery-item');
    
    // Array of image sources (in real implementation, this would come from backend)
    const images = [];
    galleryItems.forEach((item, index) => {
        const img = item.querySelector('img');
        images.push(img.src);
    });
    
    let currentIndex = 0;
    
    // Function to update main image and active thumbnail
    function updateImage(index) {
        if (index < 0) {
            currentIndex = images.length - 1;
        } else if (index >= images.length) {
            currentIndex = 0;
        } else {
            currentIndex = index;
        }
        
        // Update main image with fade effect
        mainImage.style.opacity = '0';
        setTimeout(() => {
            mainImage.src = images[currentIndex];
            mainImage.style.opacity = '1';
        }, 150);
        
        // Update active thumbnail
        galleryItems.forEach((item, idx) => {
            if (idx === currentIndex) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    }
    
    // Previous button click
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            updateImage(currentIndex - 1);
        });
    }
    
    // Next button click
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            updateImage(currentIndex + 1);
        });
    }
    
    // Gallery item click
    galleryItems.forEach((item, index) => {
        item.addEventListener('click', function() {
            updateImage(index);
        });
    });
    
    // Initialize first thumbnail as active
    if (galleryItems.length > 0) {
        galleryItems[0].classList.add('active');
    }

    // Girl Diary Carousel Slider
    const diaryTrack = document.querySelector('.girl-diary-track');
    const diaryPrevBtn = document.querySelector('.girl-diary-nav--prev');
    const diaryNextBtn = document.querySelector('.girl-diary-nav--next');
    const diaryCards = document.querySelectorAll('.girl-diary-card');
    
    if (diaryTrack && diaryPrevBtn && diaryNextBtn && diaryCards.length > 0) {
        // Calculate scroll amount (width of one card + gap)
        const cardWidth = diaryCards[0].offsetWidth;
        const cardGap = 15; // Gap between cards from CSS
        const scrollAmount = cardWidth + cardGap;
        
        // Scroll to previous
        diaryPrevBtn.addEventListener('click', function() {
            diaryTrack.scrollBy({
                left: -scrollAmount * 2, // Scroll 2 cards at a time
                behavior: 'smooth'
            });
        });
        
        // Scroll to next
        diaryNextBtn.addEventListener('click', function() {
            diaryTrack.scrollBy({
                left: scrollAmount * 1, // Scroll 2 cards at a time
                behavior: 'smooth'
            });
        });
        
        // Optional: Update button states based on scroll position
        function updateDiaryButtons() {
            const maxScroll = diaryTrack.scrollWidth - diaryTrack.clientWidth;
            const currentScroll = diaryTrack.scrollLeft;
            
            // Disable/enable buttons based on position
            if (currentScroll <= 0) {
                diaryPrevBtn.style.opacity = '0.5';
                diaryPrevBtn.style.cursor = 'not-allowed';
            } else {
                diaryPrevBtn.style.opacity = '1';
                diaryPrevBtn.style.cursor = 'pointer';
            }
            
            if (currentScroll >= maxScroll - 1) { // -1 for rounding errors
                diaryNextBtn.style.opacity = '0.5';
                diaryNextBtn.style.cursor = 'not-allowed';
            } else {
                diaryNextBtn.style.opacity = '1';
                diaryNextBtn.style.cursor = 'pointer';
            }
        }
        
        // Listen to scroll events
        diaryTrack.addEventListener('scroll', updateDiaryButtons);
        
        // Initial button state
        updateDiaryButtons();
    }
});

