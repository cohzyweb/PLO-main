import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.css";
import { Japanese } from "flatpickr/dist/l10n/ja.js";

document.addEventListener("DOMContentLoaded", function () {
  const timeConfig = {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
    minuteIncrement: 30,
    locale: Japanese,
  };

  flatpickr("input[name='open_start']", timeConfig);
  flatpickr("input[name='open_end']", timeConfig);
});
