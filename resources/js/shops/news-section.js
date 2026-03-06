document.addEventListener('DOMContentLoaded', function() {
    // News slider functionality
    const newsSlider = document.querySelector('.news-content');
    const newsPrevBtn = document.querySelector('.news-slider-prev');
    const newsNextBtn = document.querySelector('.news-slider-next');
    
    if (newsSlider && newsPrevBtn && newsNextBtn) {
        const cardWidth = 165; // Fixed card width
        const gap = 15; // Gap between cards
        const scrollAmount = cardWidth + gap;
        
        function updateNewsButtonStates() {
            const scrollLeft = newsSlider.scrollLeft;
            const maxScroll = newsSlider.scrollWidth - newsSlider.clientWidth;
            
            newsPrevBtn.disabled = scrollLeft <= 0;
            newsNextBtn.disabled = scrollLeft >= maxScroll - 1;
        }
        
        newsPrevBtn.addEventListener('click', function() {
            newsSlider.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
        
        newsNextBtn.addEventListener('click', function() {
            newsSlider.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        // Update button states on scroll
        newsSlider.addEventListener('scroll', updateNewsButtonStates);
        
        // Initial button state
        updateNewsButtonStates();
        
        // Update on window resize
        window.addEventListener('resize', updateNewsButtonStates);
    }
    
    // Photo Diary slider functionality
    const diarySlider = document.querySelector('.diary-content');
    const diaryPrevBtn = document.querySelector('.diary-slider-prev');
    const diaryNextBtn = document.querySelector('.diary-slider-next');
    
    if (diarySlider && diaryPrevBtn && diaryNextBtn) {
        const cardWidth = 130; // Fixed card width
        const gap = 15; // Gap between cards
        const scrollAmount = cardWidth + gap;
        
        function updateDiaryButtonStates() {
            const scrollLeft = diarySlider.scrollLeft;
            const maxScroll = diarySlider.scrollWidth - diarySlider.clientWidth;
            
            diaryPrevBtn.disabled = scrollLeft <= 0;
            diaryNextBtn.disabled = scrollLeft >= maxScroll - 1;
        }
        
        diaryPrevBtn.addEventListener('click', function() {
            diarySlider.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
        
        diaryNextBtn.addEventListener('click', function() {
            diarySlider.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        // Update button states on scroll
        diarySlider.addEventListener('scroll', updateDiaryButtonStates);
        
        // Initial button state
        updateDiaryButtonStates();
        
        // Update on window resize
        window.addEventListener('resize', updateDiaryButtonStates);
    }
});

