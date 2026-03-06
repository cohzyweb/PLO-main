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
      await setDate(info.dateStr);
      await drawPagination(page, pages);
      setupPaginationListeners();
      setWorking();
    },
    // events: [
    //   { title: 'イベント1', start: '2025-06-20', color: 'red', display: 'background' },
    //   { title: 'イベント2', start: '2025-06-25', color: 'blue' },
    // ]
  });
  calendar.render();

  await setDate(date);
  await drawPagination(page, pages);
  setupPaginationListeners();
  setWorking();
});
function setWorking(){
  let working_html = '';
  if (working > 0) {
    if (reservation > 0) {
      working_html = `<span class="diary-header-content-working-text-reservation">予約中</span>`;
    } else {
      working_html = `<span class="diary-header-content-working-text-working">出勤中</span>`;
    }
  } else {
    working_html = `<span class="diary-header-content-working-text-not-working">お休み</span>`;
  }
  document.querySelector('.diary-header-content-working-text').innerHTML=working_html;
}
async function setDate(date_l){
  try{
    const response = await axios.post(`/api/diary-detail`,{
      date: date_l,
      page: page,
      limit: limit,
      skip: skip,
      pages: pages,
      total: total,
      cast_id: cast_id,
      shop_id: shop_id
      },
      {
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
              'Accept': 'application/json',
          }
      },
    );
    console.log(response.data);
    const diarys = response.data.diarys;
    working = response.data.working;
    reservation = response.data.reservation;
    page = response.data.page;
    limit = response.data.limit;
    skip = response.data.skip;
    pages = response.data.pages;
    total = response.data.total;
    date = response.data.date;
    cast_id = response.data.cast_id;
    shop_id = response.data.shop_id;
    const total_diarys = response.data.total_diarys;
    console.log(total_diarys);
    for (let i = 0; i < total_diarys.length; i++) {
      calendar.addEvent({
        // title: total_diarys[i].total_date,
        start: total_diarys[i].total_date,
        color: 'red',
        display: 'background'
      });
    }
    let diary_html = document.querySelector('.diary-body-right-content').innerHTML;
    diary_html = ``;
    for (let i = 0; i < diarys.length; i++) {
      diary_html += `
        <div class="diary-body-right-content-wrapper">
          <div class="diary-body-right-content-wrapper-title">
            ${diarys[i].subject}
          </div>
          <div class="diary-body-right-content-wrapper-datetime">
            ${diarys[i].created_datetime}
          </div>
          <div class="diary-body-right-content-wrapper-thumbnail">
            <img src="${window.location.origin}/storage/diary/${diarys[i].photo}" alt="サムネイル画像">
          </div>
          <div class="diary-body-right-content-wrapper-text">
            ${diarys[i].body}
          </div>
        </div>
      `;
    }
    document.querySelector('.diary-body-right-content').innerHTML = diary_html;
  } catch (error){
    console.error('Error fetching diary detail error:', error);
  }
}

function drawPagination(currentPage, totalPages){
  let pagination = document.querySelector('.diary-body-right-pagination').innerHTML;
  // console.log(pagination);
  if (totalPages > 1) {
    let paginationHTML = `
      <nav aria-label="Page navigation">
        <ul class="pagination">
    `;

    // Previous button
    paginationHTML += `
      <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
        <a class="page-link" href="#" data-page="${currentPage - 1}" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
    `;

    // Page numbers
    let startPage = Math.max(1, currentPage - 1);
    let endPage = Math.min(totalPages, startPage + 2);

    if (startPage > 1) {
      paginationHTML += `
        <li class="page-item">
          <a class="page-link" href="#" data-page="1">1</a>
        </li>
      `;
      if (startPage > 2) {
        paginationHTML += `
          <li class="page-item disabled">
            <a class="page-link" href="#">...</a>
          </li>
        `;
      }
    }

    for (let i = startPage; i <= endPage; i++) {
      paginationHTML += `
        <li class="page-item ${i === currentPage ? 'active' : ''}">
          <a class="page-link" href="#" data-page="${i}">${i}</a>
        </li>
      `;
    }

    if (endPage < totalPages) {
      if (endPage < totalPages - 1) {
        paginationHTML += `
          <li class="page-item disabled">
            <a class="page-link" href="#">...</a>
          </li>
        `;
      }
      paginationHTML += `
        <li class="page-item">
          <a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a>
        </li>
      `;
    }

    // Next button
    paginationHTML += `
      <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
        <a class="page-link" href="#" data-page="${currentPage + 1}" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    `;

    paginationHTML += `
        </ul>
      </nav>
    `;
    // console.log(paginationHTML);
    pagination = paginationHTML;
    setupPaginationListeners
  } else{
    pagination = ``;
  }
  //   let pagination = document.querySelector('.diary-body-right-pagination').innerHTML;
  // pagination = ``;
  // pagination += `
  //           <nav aria-label="Page navigation">
  //             <ul class="pagination">
  //               <li class="page-item">
  //                 <a class="page-link" href="#" aria-label="Previous">
  //                   <span aria-hidden="true">&laquo;</span>
  //                 </a>
  //               </li>
  // `;
  // if (1 < currentPage - 1 && totalPages > currentPage + 1) {
  //   console.log(currentPage);
  //   pagination += `
  //     <li class="page-item"><a class="page-link" href="#">${currentPage - 1}</a></li>
  //     <li class="page-item active"><a class="page-link" href="#">${currentPage}</a></li>
  //     <li class="page-item"><a class="page-link" href="#">${currentPage + 1}</a></li>
  //   `;
  // } else if (currentPage == 1){
  //   pagination += `
  //     <li class="page-item active"><a class="page-link" href="#">${currentPage}</a></li>
  //     <li class="page-item"><a class="page-link" href="#">${currentPage + 1}</a></li>
  //     <li class="page-item"><a class="page-link" href="#">${currentPage + 2}</a></li>
  //   `;
  // } else if (currentPage == totalPages){
  //   pagination += `
  //     <li class="page-item"><a class="page-link" href="#">${currentPage - 2}</a></li>
  //     <li class="page-item"><a class="page-link" href="#">${currentPage - 1}</a></li>
  //     <li class="page-item active"><a class="page-link" href="#">${currentPage}</a></li>
  //   `;
  // }
  // pagination += `                <li class="page-item">
  //                 <a class="page-link" href="#" aria-label="Next">
  //                   <span aria-hidden="true">&raquo;</span>
  //                 </a>
  //               </li>
  //             </ul>
  // </nav>
  // `;
  document.querySelector('.diary-body-right-pagination').innerHTML = pagination;
}

function setupPaginationListeners() {
  const paginationLinks = document.querySelectorAll('.pagination .page-link');
  paginationLinks.forEach(link => {
    link.addEventListener('click', async (e) => {
      e.preventDefault();
      const newPage = parseInt(e.target.closest('.page-link').dataset.page);
      if (!isNaN(newPage) && newPage !== page) {
        // 現在のアクティブなページアイテムからactiveクラスを削除
        const currentActive = document.querySelector('.pagination .page-item.active');
        if (currentActive) {
          currentActive.classList.remove('active');
        }

        // クリックされたページアイテムにactiveクラスを追加
        const clickedItem = e.target.closest('.page-item');
        if (clickedItem) {
          clickedItem.classList.add('active');
        }

        page = newPage;
        skip = (page - 1) * limit;
        
        await setDate(date);
      }
    });
  });
}
