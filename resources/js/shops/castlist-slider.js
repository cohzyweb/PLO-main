document.addEventListener('DOMContentLoaded', function() {
    // Castlist slider functionality (mobile only - 850px)
    const castlistSlider = document.querySelector('.home-castlist-cards');
    const castlistPrevBtn = document.querySelector('.castlist-slider-prev');
    const castlistNextBtn = document.querySelector('.castlist-slider-next');
    
    if (castlistSlider && castlistPrevBtn && castlistNextBtn) {
        const cardWidth = 270; // Card width
        const gap = 15; // Gap between cards
        const scrollAmount = cardWidth + gap;
        
        function updateCastlistButtonStates() {
            const scrollLeft = castlistSlider.scrollLeft;
            const maxScroll = castlistSlider.scrollWidth - castlistSlider.clientWidth;
            
            castlistPrevBtn.disabled = scrollLeft <= 0;
            castlistNextBtn.disabled = scrollLeft >= maxScroll - 1;
        }
        
        castlistPrevBtn.addEventListener('click', function() {
            castlistSlider.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
        
        castlistNextBtn.addEventListener('click', function() {
            castlistSlider.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        // Update button states on scroll
        castlistSlider.addEventListener('scroll', updateCastlistButtonStates);
        
        // Initial button state
        updateCastlistButtonStates();
        
        // Update on window resize
        window.addEventListener('resize', updateCastlistButtonStates);
    }
});

