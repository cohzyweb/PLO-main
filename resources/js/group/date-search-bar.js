/**
 * Date Search Bar Calendar Component
 * Handles mobile calendar dropdown and date selection
 */

class DateSearchBar {
  constructor(container) {
    this.container = container;
    this.mobileHeader = container.querySelector('.groups-date-search-header-mobile');
    this.calendarContainer = container.querySelector('.groups-date-search-calendar-container');
    this.calendar = container.querySelector('.groups-date-search-calendar');
    this.calendarDays = container.querySelector('.groups-date-calendar-days');
    this.monthYearDisplay = container.querySelector('.groups-date-calendar-month-year');
    this.prevButton = container.querySelector('.groups-date-calendar-prev');
    this.nextButton = container.querySelector('.groups-date-calendar-next');
    this.dateButtons = container.querySelectorAll('.groups-date-button');
    
    this.currentDate = new Date();
    this.selectedDate = null;
    this.activeDate = this.getActiveDateFromButtons();
    
    this.init();
  }
  
  init() {
    if (!this.mobileHeader || !this.calendarContainer) return;
    
    // Set initial selected date
    if (this.activeDate) {
      this.selectedDate = new Date(this.activeDate);
      this.currentDate = new Date(this.selectedDate);
    }
    
    // Mobile header click handler
    this.mobileHeader.addEventListener('click', () => {
      this.toggleCalendar();
    });
    
    // Calendar navigation
    if (this.prevButton) {
      this.prevButton.addEventListener('click', () => {
        this.navigateMonth(-1);
      });
    }
    
    if (this.nextButton) {
      this.nextButton.addEventListener('click', () => {
        this.navigateMonth(1);
      });
    }
    
    // Close calendar when clicking outside
    document.addEventListener('click', (e) => {
      if (!this.container.contains(e.target) && this.isCalendarOpen()) {
        this.closeCalendar();
      }
    });
    
    // Add click handlers to date buttons
    this.dateButtons.forEach(button => {
      button.addEventListener('click', (e) => {
        e.preventDefault();
        const dateValue = button.dataset.date;
        
        if (!dateValue) return;
        
        // Remove active class from all buttons
        this.dateButtons.forEach(btn => {
          btn.classList.remove('is-active');
          btn.setAttribute('aria-pressed', 'false');
        });
        
        // Add active class to clicked button
        button.classList.add('is-active');
        button.setAttribute('aria-pressed', 'true');
        
        // Submit form with date parameter
        this.submitFormWithDate(dateValue);
      });
    });
    
    // Render initial calendar
    this.renderCalendar();
  }
  
  getActiveDateFromButtons() {
    const activeButton = Array.from(this.dateButtons).find(btn => 
      btn.classList.contains('is-active')
    );
    return activeButton ? activeButton.dataset.date : null;
  }
  
  toggleCalendar() {
    const isOpen = this.calendarContainer.classList.contains('is-open');
    if (isOpen) {
      this.closeCalendar();
    } else {
      this.openCalendar();
    }
  }
  
  openCalendar() {
    this.calendarContainer.classList.add('is-open');
    this.mobileHeader.setAttribute('aria-expanded', 'true');
    this.renderCalendar();
  }
  
  closeCalendar() {
    this.calendarContainer.classList.remove('is-open');
    this.mobileHeader.setAttribute('aria-expanded', 'false');
  }
  
  isCalendarOpen() {
    return this.calendarContainer.classList.contains('is-open');
  }
  
  navigateMonth(direction) {
    this.currentDate.setMonth(this.currentDate.getMonth() + direction);
    this.renderCalendar();
  }
  
  renderCalendar() {
    if (!this.calendarDays || !this.monthYearDisplay) return;
    
    const year = this.currentDate.getFullYear();
    const month = this.currentDate.getMonth();
    
    // Update month/year display
    this.monthYearDisplay.textContent = `${year}年 ${month + 1}月`;
    
    // Clear existing days
    this.calendarDays.innerHTML = '';
    
    // Get first day of month and number of days
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const daysInMonth = lastDay.getDate();
    const startingDayOfWeek = firstDay.getDay(); // 0 = Sunday, 6 = Saturday
    
    // Calculate total cells needed for 5 weeks (35 days)
    const totalCells = 35;
    let currentDate = 1;
    let currentWeek = document.createElement('div');
    currentWeek.className = 'groups-date-calendar-week';
    let cellCount = 0;
    
    // Add days from previous month
    const prevMonth = month === 0 ? 11 : month - 1;
    const prevYear = month === 0 ? year - 1 : year;
    const prevMonthLastDay = new Date(year, month, 0).getDate();
    
    for (let i = startingDayOfWeek - 1; i >= 0; i--) {
      const prevDate = prevMonthLastDay - i;
      const dayElement = this.createDayElement(
        prevDate,
        true,
        false,
        new Date(prevYear, prevMonth, prevDate)
      );
      currentWeek.appendChild(dayElement);
      cellCount++;
    }
    
    // Add days of current month
    while (currentDate <= daysInMonth && cellCount < totalCells) {
      if (currentWeek.children.length === 7) {
        this.calendarDays.appendChild(currentWeek);
        currentWeek = document.createElement('div');
        currentWeek.className = 'groups-date-calendar-week';
      }
      
      const dayElement = this.createDayElement(
        currentDate,
        false,
        this.isSelectedDate(year, month, currentDate),
        new Date(year, month, currentDate)
      );
      currentWeek.appendChild(dayElement);
      currentDate++;
      cellCount++;
    }
    
    // Add days from next month to complete 5 weeks
    const nextMonth = month === 11 ? 0 : month + 1;
    const nextYear = month === 11 ? year + 1 : year;
    let nextMonthDate = 1;
    
    while (cellCount < totalCells) {
      if (currentWeek.children.length === 7) {
        this.calendarDays.appendChild(currentWeek);
        currentWeek = document.createElement('div');
        currentWeek.className = 'groups-date-calendar-week';
      }
      
      const dayElement = this.createDayElement(
        nextMonthDate,
        true,
        false,
        new Date(nextYear, nextMonth, nextMonthDate)
      );
      currentWeek.appendChild(dayElement);
      nextMonthDate++;
      cellCount++;
    }
    
    // Append the last week if it has any children
    if (currentWeek.children.length > 0) {
      this.calendarDays.appendChild(currentWeek);
    }
  }
  
  createDayElement(day, isOtherMonth, isSelected, date) {
    const dayElement = document.createElement('div');
    dayElement.className = 'groups-date-calendar-day';
    dayElement.textContent = day;
    
    if (isOtherMonth) {
      dayElement.classList.add('is-other-month');
    }
    
    if (isSelected) {
      dayElement.classList.add('is-selected');
    }
    
    // Check if it's today
    const today = new Date();
    if (
      date.getDate() === today.getDate() &&
      date.getMonth() === today.getMonth() &&
      date.getFullYear() === today.getFullYear()
    ) {
      dayElement.classList.add('is-today');
    }
    
    // Add click handler
    dayElement.addEventListener('click', () => {
      this.selectDate(date);
    });
    
    return dayElement;
  }
  
  isSelectedDate(year, month, day) {
    if (!this.selectedDate) return false;
    return (
      this.selectedDate.getDate() === day &&
      this.selectedDate.getMonth() === month &&
      this.selectedDate.getFullYear() === year
    );
  }
  
  selectDate(date) {
    this.selectedDate = new Date(date);
    
    // Format date as Y-m-d
    const year = this.selectedDate.getFullYear();
    const month = String(this.selectedDate.getMonth() + 1).padStart(2, '0');
    const day = String(this.selectedDate.getDate()).padStart(2, '0');
    const dateString = `${year}-${month}-${day}`;
    
    // Find and update the corresponding date button if it exists
    const dateButton = Array.from(this.dateButtons).find(btn => 
      btn.dataset.date === dateString
    );
    
    // Remove active class from all buttons
    this.dateButtons.forEach(btn => {
      btn.classList.remove('is-active');
      btn.setAttribute('aria-pressed', 'false');
    });
    
    // If a matching button exists, activate it
    if (dateButton) {
      dateButton.classList.add('is-active');
      dateButton.setAttribute('aria-pressed', 'true');
    }
    
    // Submit form with date parameter (regardless of whether button exists)
    this.submitFormWithDate(dateString);
    
    // Update calendar display
    this.currentDate = new Date(this.selectedDate);
    this.renderCalendar();
    
    // Close calendar on mobile
    this.closeCalendar();
  }
  
  submitFormWithDate(dateString) {
    // Find the form (same form used by shop buttons)
    const form = document.querySelector('form.groups-shops-buttons');
    if (!form) {
      // If no form found, try to find any form on the page
      const anyForm = document.querySelector('form[method="GET"]');
      if (anyForm) {
        this.addDateToFormAndSubmit(anyForm, dateString);
        return;
      }
      console.warn('No form found to submit date');
      return;
    }
    
    this.addDateToFormAndSubmit(form, dateString);
  }
  
  addDateToFormAndSubmit(form, dateString) {
    // Remove existing date input if any
    const existingDateInput = form.querySelector('input[name="date"]');
    if (existingDateInput) {
      existingDateInput.value = dateString;
    } else {
      // Add date as hidden input
      const dateInput = document.createElement('input');
      dateInput.type = 'hidden';
      dateInput.name = 'date';
      dateInput.value = dateString;
      form.appendChild(dateInput);
    }
    
    // Preserve shop parameter from URL if it exists
    const urlParams = new URLSearchParams(window.location.search);
    const shopParam = urlParams.get('shop');
    if (shopParam) {
      const existingShopInput = form.querySelector('input[name="shop"]');
      if (!existingShopInput) {
        const shopInput = document.createElement('input');
        shopInput.type = 'hidden';
        shopInput.name = 'shop';
        shopInput.value = shopParam;
        form.appendChild(shopInput);
      }
    }
    
    // Submit the form
    form.submit();
  }
}

// Initialize all date search bars on page load
document.addEventListener('DOMContentLoaded', () => {
  const dateSearchBars = document.querySelectorAll('.groups-date-search-bar');
  dateSearchBars.forEach(container => {
    new DateSearchBar(container);
  });
});

export default DateSearchBar;
