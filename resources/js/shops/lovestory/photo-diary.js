// Import FullCalendar modules
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import allLocales from "@fullcalendar/core/locales-all";

let calendar;
let mobileCalendar;

// Function to initialize a calendar
function initializeCalendar(calendarEl, calendarInstance) {
  if (!calendarEl) {
    return null;
  }

  const cal = new Calendar(calendarEl, {
    locales: allLocales,
    locale: "ja",
    initialView: "dayGridMonth",
    plugins: [interactionPlugin, dayGridPlugin],
    contentHeight: "auto",
    fixedWeekCount: false,
    selectable: true,
    headerToolbar: {
      left: "prev",
      center: "title",
      right: "next",
    },
    dateClick: function (info) {
      console.log("Date clicked:", info.dateStr);
      // Handle date click if needed
      if (typeof diarys_date !== "undefined" && diarys_date.length > 0) {
        for (let i = 0; i < diarys_date.length; i++) {
          if (diarys_date[i].date == info.dateStr) {
            const shopSlug =
              typeof shop_slug !== "undefined" ? shop_slug : "shizuku";
            const date = info.dateStr;
              // typeof date !== "undefined" ? info.dateStr : "";
            if (date != '') {
              window.location.href = `/shops/${shopSlug}/photo-diary?date=${date}`;
            } else {
              window.location.href = `/shops/${shopSlug}/photo-diary`;
            }
            return;
          }
        }
      }
    },
  });

  // Add events if diarys_date is available
  if (typeof diarys_date !== "undefined" && diarys_date.length > 0) {
    for (let i = 0; i < diarys_date.length; i++) {
      cal.addEvent({
        start: diarys_date[i].date,
        color: "#F2387C",
        display: "background",
      });
    }
  }

  cal.render();
  return cal;
}

document.addEventListener("DOMContentLoaded", function () {
  // Initialize desktop calendar
  const calendarEl = document.getElementById("diary-calendar");
  if (calendarEl) {
    calendar = initializeCalendar(calendarEl, calendar);
  }

  // Initialize mobile calendar
  const mobileCalendarEl = document.getElementById("diary-calendar-mobile");
  if (mobileCalendarEl) {
    mobileCalendar = initializeCalendar(mobileCalendarEl, mobileCalendar);
  }

  // Handle window resize to reinitialize calendars if needed
  let resizeTimer;
  window.addEventListener("resize", function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      // Check if mobile calendar element is visible and not initialized
      const mobileEl = document.getElementById("diary-calendar-mobile");
      if (mobileEl && window.innerWidth <= 850 && !mobileCalendar) {
        mobileCalendar = initializeCalendar(mobileEl, mobileCalendar);
      }
      // Check if desktop calendar element is visible and not initialized
      const desktopEl = document.getElementById("diary-calendar");
      if (desktopEl && window.innerWidth > 850 && !calendar) {
        calendar = initializeCalendar(desktopEl, calendar);
      }
    }, 250);
  });
});
