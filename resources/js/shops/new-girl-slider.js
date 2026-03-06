document.addEventListener('DOMContentLoaded', function() {
    // New Girl slider functionality
    const newGirlSlider = document.querySelector('.new-girl-slider-content');
    const newGirlPrevBtn = document.querySelector('.new-girl-slider-prev');
    const newGirlNextBtn = document.querySelector('.new-girl-slider-next');
    const newGirlMobilePrevBtn = document.querySelector('.new-girl-slider-mobile-prev');
    const newGirlMobileNextBtn = document.querySelector('.new-girl-slider-mobile-next');
    const sliderDots = document.querySelectorAll('.slider-dots .dot');
    
    if (newGirlSlider) {
        const isMobile = window.innerWidth <= 850;
        let cardWidth = 640; // Fixed card width for desktop
        let gap = 20; // Gap between cards
        let cardsPerScroll = 2; // Move 2 cards at a time
        let scrollAmount = 0;
        let currentPage = 0;
        const totalPages = sliderDots.length;
        
        function calculateScrollAmount() {
            const isMobileView = window.innerWidth <= 850;
            if (isMobileView) {
                // For mobile: calculate based on card width + gap (horizontal scroll)
                // Cards are 100vw wide, so use viewport width
                const viewportWidth = window.innerWidth;
                const gapValue = parseFloat(getComputedStyle(newGirlSlider).gap) || 20; // 1.25rem = 20px
                // Scroll by 2 cards (one pair) at a time
                // Each column is 100vw, so scroll by viewport width + gap
                scrollAmount = viewportWidth + gapValue;
            } else {
                // For desktop: horizontal scroll
                scrollAmount = (cardWidth + gap) * cardsPerScroll;
            }
        }
        
        function updateNewGirlState() {
            const isMobileView = window.innerWidth <= 850;
            let scrollPos, maxScroll;
            
            // Both mobile and desktop use horizontal scrolling (scrollLeft)
            scrollPos = newGirlSlider.scrollLeft;
            maxScroll = newGirlSlider.scrollWidth - newGirlSlider.clientWidth;
            
            // Calculate current page based on scroll position
            currentPage = Math.round(scrollPos / scrollAmount);
            
            // Update desktop button states
            if (newGirlPrevBtn && newGirlNextBtn && !isMobileView) {
                newGirlPrevBtn.disabled = scrollPos <= 0;
                newGirlNextBtn.disabled = scrollPos >= maxScroll - 1;
            }
            
            // Update mobile button states
            if (newGirlMobilePrevBtn && newGirlMobileNextBtn && isMobileView) {
                newGirlMobilePrevBtn.disabled = scrollPos <= 0;
                newGirlMobileNextBtn.disabled = scrollPos >= maxScroll - 1;
            }
            
            // Update dots (desktop only)
            if (!isMobileView) {
                sliderDots.forEach((dot, index) => {
                    if (index === currentPage) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }
        }
        
        // Desktop slider functionality
        if (newGirlPrevBtn && newGirlNextBtn) {
            newGirlPrevBtn.addEventListener('click', function() {
                if (window.innerWidth > 850) {
                    calculateScrollAmount();
                    newGirlSlider.scrollBy({
                        left: -scrollAmount,
                        behavior: 'smooth'
                    });
                }
            });
            
            newGirlNextBtn.addEventListener('click', function() {
                if (window.innerWidth > 850) {
                    calculateScrollAmount();
                    newGirlSlider.scrollBy({
                        left: scrollAmount,
                        behavior: 'smooth'
                    });
                }
            });
        }
        
        // Mobile slider functionality
        if (newGirlMobilePrevBtn && newGirlMobileNextBtn) {
            newGirlMobilePrevBtn.addEventListener('click', function() {
                if (window.innerWidth <= 850) {
                    calculateScrollAmount();
                    newGirlSlider.scrollBy({
                        left: -scrollAmount,
                        behavior: 'smooth'
                    });
                }
            });
            
            newGirlMobileNextBtn.addEventListener('click', function() {
                if (window.innerWidth <= 850) {
                    calculateScrollAmount();
                    newGirlSlider.scrollBy({
                        left: scrollAmount,
                        behavior: 'smooth'
                    });
                }
            });
        }
        
        // Dot click functionality (desktop only)
        sliderDots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                if (window.innerWidth > 850) {
                    calculateScrollAmount();
                    const targetScroll = index * scrollAmount;
                    newGirlSlider.scrollTo({
                        left: targetScroll,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Update state on scroll
        newGirlSlider.addEventListener('scroll', updateNewGirlState);
        
        // Initial calculations and state - wait for cards to render
        function initializeSlider() {
            // Wait a bit for cards to render and get their actual dimensions
            setTimeout(function() {
                calculateScrollAmount();
                updateNewGirlState();
            }, 100);
        }
        
        initializeSlider();
        
        // Update on window resize
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                calculateScrollAmount();
                updateNewGirlState();
            }, 100);
        });
    }
});

