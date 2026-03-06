import axios from 'axios'

let page = 1;
let limit = 12;
let skip = 0;
let pages = 0;
let total = 0;

document.addEventListener('DOMContentLoaded', async function() {
  const results = await getCastsSchedule(date, page, limit, skip, pages, total);
  // console.log(results);
  page = results.page;
  limit = results.limit;
  skip = results.skip;
  pages = results.pages;
  total = results.total;
  date = results.date;
  drawPagination(page, pages);
  // drawCastsSchedule(results.casts);
  // drawCastsSchedule(results.casts);
  // document.querySelector('.schedule-shop-list-title').innerHTML = `${document.querySelector('.schedule-week-day-date').dataset.weekday}出勤女性`;
  
  // 曜日ボタンのイベントリスナー
  document.querySelectorAll('.schedule-weeks-day-date').forEach(button => {
    button.addEventListener('click', async (e) => {
      // アクティブ状態の切り替え
      document.querySelectorAll('.schedule-weeks-day-date').forEach(btn => {
        btn.classList.remove('active');
      });
      e.target.classList.add('active');
      
      date = e.target.value;
      const results = await getCastsSchedule(date, page, limit, skip, pages, total);
      page = results.page;
      limit = results.limit;
      skip = results.skip;
      pages = results.pages;
      total = results.total;
      date = results.date;
      drawPagination(page, pages);
      // document.querySelector('.schedule-shop-list-title').innerHTML = `${e.target.dataset.weekday}出勤女性`;
    });
  });
  
//   // 店舗ボタンのイベントリスナー
//   document.querySelectorAll('.schedule-shop-list-item-button').forEach(button => {
//     button.addEventListener('click', async (e) => {
//       // アクティブ状態の切り替え
//       document.querySelectorAll('.schedule-shop-list-item-button').forEach(btn => {
//         btn.classList.remove('active');
//       });
//       e.target.classList.add('active');
      
//       shopID = e.target.value;
//       await getCastsSchedule(date, page, limit, skip, pages, total);
//       drawPagination(page, pages);
//     });
//   });
// });
});
async function getCastsSchedule(date, page, limit, skip, pages, total) {
    try {
        const response = await axios.post(`/api/casts-schedule-shop`, {
            date: date,
            page: page,
            limit: limit,
            skip: skip,
            pages: pages,
            total: total,
            shopID: shopID
        },
        {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            }
        }
      );
        console.log(response.data);
        if (response.data.status == 'success'){
          const casts = response.data.casts;
          page = response.data.page;
          limit = response.data.limit;
          skip = response.data.skip;
          pages = response.data.pages;
          total = response.data.total;
          date = response.data.date;
          // console.log(page, limit, skip, pages, total);
          if (casts.length > 0){
            drawCastsSchedule(casts);
          }else{
            // document.querySelector('.schedule-person-info-list').innerHTML = '<div class="schedule-person-info-list-item">出勤女性はいません</div>';
            document.querySelector('.schedule-person-info-list').style.display = 'none';
          }
        }
        return response.data;
    } catch (error) {
        console.error('Error fetching casts schedule:', error);
    }
}

function drawCastsSchedule(casts){
  const castsSchedule = document.querySelector('.schedule-person-info-list');
  castsSchedule.innerHTML = '';
  casts.forEach(cast => {
    const castItem = document.createElement('div');
    castItem.classList.add('schedule-person-info-list-item');
    castItem.innerHTML = `
    <a href="${window.location.origin}/${cast.shop_slug}/cast/${cast.cast_id}">
      <div class="schedule-person-info-photo --${cast.shop_slug}">
        <img src="${window.location.origin}/storage/${cast.gallery_1}" alt="${cast.cast_name}">
      </div>
      <div class="schedule-person-info-items">
        <div class="schedule-person-info-shop-working --${cast.shop_slug}">
          ${cast.start_datetime} - ${cast.end_datetime}
        </div>
        <div class="schedule-person-info-name --${cast.shop_slug}">
          ${cast.cast_name}
        </div>
        <div class="schedule-person-info-property --${cast.shop_slug}">
          ${cast.age}歳/T.${cast.height} B.${cast.bust} W.${cast.waist} H.${cast.hip}
        </div>
        <div class="schedule-person-info-message --${cast.shop_slug}">
          ${cast.appeal_point == null ? '' : cast.appeal_point}
        </div>
      </div>
    </a>
    `;
    castsSchedule.appendChild(castItem);
  });
}

function drawPagination(currentPage, totalPages) {
  const pagination = document.querySelector('.schedule-pagination');
  console.log(currentPage, totalPages);
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

    pagination.innerHTML = paginationHTML;
    setupPaginationListeners();
  } else {
    pagination.innerHTML = '';
  }
}

function setupPaginationListeners() {
  const paginationLinks = document.querySelectorAll('.pagination .page-link');
  paginationLinks.forEach(link => {
    link.addEventListener('click', async (e) => {
      e.preventDefault();
      const newPage = parseInt(e.target.closest('.page-link').dataset.page);
      if (!isNaN(newPage) && newPage !== page) {
        page = newPage;
        skip = (page - 1) * limit;
        const results = await getCastsSchedule(date, page, limit, skip, pages, total);
        page = results.page;
        limit = results.limit;
        skip = results.skip;
        pages = results.pages;
        total = results.total;
        date = results.date;
        drawPagination(page, pages);
      }
    });
  });
}

