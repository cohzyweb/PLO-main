import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import allLocales from "@fullcalendar/core/locales-all";

let calendar;

function buildDiaryUrl(selectedDate) {
  const params = new URLSearchParams(window.location.search);

  if (selectedDate) {
    params.set("date", selectedDate);
    params.delete("month");
  } else {
    params.delete("date");
  }

  const query = params.toString();
  return query ? `/groups/photodiary?${query}` : "/groups/photodiary";
}

function initializeCalendar(calendarEl) {
  if (!calendarEl) {
    return null;
  }

  const selectedDate = typeof date !== "undefined" && date !== "" ? date : null;
  const selectedMonth = typeof month !== "undefined" && month !== "" ? `${month}-01` : null;
  const initialDate = selectedDate || selectedMonth || undefined;

  const cal = new Calendar(calendarEl, {
    locales: allLocales,
    locale: "ja",
    initialView: "dayGridMonth",
    initialDate,
    plugins: [interactionPlugin, dayGridPlugin],
    contentHeight: "auto",
    fixedWeekCount: false,
    selectable: true,
    dayCellContent(arg) {
      return { html: arg.dayNumberText.replace(/日$/, "") };
    },
    dayCellClassNames(arg) {
      if (selectedDate && arg.dateStr === selectedDate) {
        return ["selected-date-cell"];
      }
      return [];
    },
    headerToolbar: {
      left: "prev",
      center: "title",
      right: "next",
    },
    dateClick(info) {
      window.location.href = buildDiaryUrl(info.dateStr);
    },
  });

  if (typeof diarys_date !== "undefined" && diarys_date.length > 0) {
    diarys_date.forEach((item) => {
      cal.addEvent({
        start: item.date,
        color: "#ffe082",
        display: "background",
      });
      
      // Add class to highlight days with diary
      const dayEl = cal.getDate(item.date);
      if (dayEl) {
        const cellEl = document.querySelector(`[data-date="${item.date}"]`);
        if (cellEl) {
          cellEl.classList.add('has-diary');
        }
      }
    });
  }

  cal.render();
  return cal;
}

document.addEventListener("DOMContentLoaded", function () {
  const calendarEl = document.getElementById("diary-calendar");
  if (calendarEl) {
    calendar = initializeCalendar(calendarEl);
  }
});
