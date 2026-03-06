// import FullCalendar from '@fullcalendar/react'
import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import allLocales  from '@fullcalendar/core/locales-all'
import axios from 'axios'

let page = 1;
let limit = 1;
let skip = 0;
let pages = 0;
let total = 0;
let working = 0;
let reservation = 0;
let calendar;
document.addEventListener('DOMContentLoaded', async function () {
  var calendarEl = document.getElementById('diary-calendar');
  calendar = new Calendar(calendarEl, {
    locales: allLocales,
    locale: 'ja',
    initialView: 'dayGridMonth',
    plugins:[interactionPlugin,dayGridPlugin],
    contentHeight: 'auto',
    selectable: true,
    dateClick: async function(info){
      console.log(info.dateStr);
      for (let i = 0; i < diarys_date.length; i++) {
        if (diarys_date[i].date == info.dateStr) {
          if ( cast_id == ''){
            window.location.href = `/${shop_slug}/diarylist?date=${info.dateStr}`;
          }else{
            window.location.href = `/${shop_slug}/diarylist?cast_id=${cast_id}&date=${info.dateStr}`;
          }
        }
      }
      // window.location.href = `/${shop_slug}/diarydetail/${diary_id}/${info.dateStr}`;
      // await setDate(info.dateStr);
      // await drawPagination(page, pages);
      // setupPaginationListeners();
      // setWorking();
    },
    // windowResize: function(view) {
    //   let width = window.innerWidth;
  
    //   if (width < 768) {
    //     calendar.setOption('headerToolbar', {
    //       left: 'prev',
    //       center: 'title',
    //       right: 'next'
    //     });
    //   } else {
    //     calendar.setOption('headerToolbar', {
    //       left: 'prev',
    //       center: 'title',
    //       right: 'next'
    //       // right: 'dayGridMonth,timeGridWeek,timeGridDay'
    //     });
    //   }
    // },
    headerToolbar: {
      // left: 'prev,next today',
      left: 'prev',
      center: 'title',
      right: 'next'
      // right: 'dayGridMonth,timeGridWeek,timeGridDay'
    }    // events: [
    //   { title: 'イベント1', start: '2025-06-20', color: 'red', display: 'background' },
    //   { title: 'イベント2', start: '2025-06-25', color: 'blue' },
    // ]
  });
  console.log({diarys_date});
  for (let i = 0; i < diarys_date.length; i++) {
    console.log(diarys_date[i].date);
    calendar.addEvent({
      start: diarys_date[i].date,
      color: 'red',
      display: 'background'
    });
  }

  calendar.render();
  // await setDate(date);
  // await drawPagination(page, pages);
  // setupPaginationListeners();
  // setWorking();
});
