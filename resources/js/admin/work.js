import axios from 'axios'

let page = 1;
let limit = 30;
let skip = 0;
let pages = 0;
let total = 0;
let shop = '';
let selectedDate = '';

console.log(window.apiToken);

document.addEventListener('DOMContentLoaded', async function() {
    // 日付ナビゲーション機能
    const prevWeekBtn = document.querySelector('.prev-week-btn');
    const nextWeekBtn = document.querySelector('.next-week-btn');
    const tableCols = document.querySelector('.table-cols');


    // 現在の日付を設定（テスト用：6/9）
    let currentDate = new Date();
    console.log({currentDate});

    let currentWeekStart = getWeekStart(currentDate);
    console.log({currentWeekStart});
    // 週の開始日を取得する関数
    function getWeekStart(date) {
        const weekStart = new Date(date);
        return weekStart;
    }

    // 先週ボタンの無効化状態を更新する関数
    function updatePrevWeekButtonState() {
        const today = new Date();
        const todayWeekStart = getWeekStart(today);
        if (currentWeekStart.getMonth() === todayWeekStart.getMonth() && currentWeekStart.getDate() === todayWeekStart.getDate()) {
            prevWeekBtn.classList.add('week-btn-disabled');
        } else {
            prevWeekBtn.classList.remove('week-btn-disabled');
        }
    }

    // 日付タブを生成する関数
    async function generateDateHeaders(startDate) {
        tableCols.innerHTML = '';
        tableCols.innerHTML += `<div class="date-col cast-col">キャスト</div>`;

        for (let i = 0; i < 7; i++) {
            const date = new Date(startDate);
            date.setDate(startDate.getDate() + i);
            const month = date.getMonth() + 1;
            const day = date.getDate();
            const weekdays = ['日', '月', '火', '水', '木', '金', '土'];
            const weekday = weekdays[date.getDay()];

            const tab = document.createElement('div');
            tab.className = 'date-col';

            // 土曜日と日曜日のクラスを追加
            if (date.getDay() === 0) { // 日曜日
                tab.classList.add('sunday');
            } else if (date.getDay() === 6) { // 土曜日
                tab.classList.add('saturday');
            }

            if (i === 0) {
                tab.classList.add('active');
                tab.innerHTML = `${month}/${day}(${weekday})<div class="active-indicator"></div>`;
            } else {
                tab.textContent = `${month}/${day}(${weekday})`;
            }

            tableCols.appendChild(tab);
        }
        selectedDate = (new Date(startDate)).toDateString();
        await getCastsWork(shop, selectedDate, page, limit, skip, pages, total);
        updatePrevWeekButtonState();
        await generateScheduleCastsPagination(page, limit, skip, pages, total, selectedDate);
    }

    // 初期表示
    generateDateHeaders(currentWeekStart);

    prevWeekBtn.addEventListener('click', () => {
        if (prevWeekBtn.classList.contains('week-btn-disabled')) {
            return;
        }

        const newWeekStart = new Date(currentWeekStart);
        newWeekStart.setDate(currentWeekStart.getDate() - 7);
        currentWeekStart = newWeekStart;

        generateDateHeaders(currentWeekStart);
    });

    // 翌週ボタンのクリックイベント
    nextWeekBtn.addEventListener('click', () => {
        const newWeekStart = new Date(currentWeekStart);
        newWeekStart.setDate(currentWeekStart.getDate() + 7);
        currentWeekStart = newWeekStart;

        generateDateHeaders(currentWeekStart);
    });


});

function convertDateTimeToTime(dateTime) {
    const date = new Date(dateTime);
    return date.toLocaleTimeString('ja-JP', { hour: '2-digit', minute: '2-digit', hour12: false , hourCycle: 'h23' , separator: ':'});
}

async function deleteAttendance(workAttendance, attendance_date) {
    let confirmMsg = "出勤を削除しますか？";
    if (workAttendance.nextElementSibling.textContent !== '') {
        confirmMsg = "予約が入っています。出勤を削除しますか？";
    }

    if (confirm(confirmMsg)) {
        let attendance_id = workAttendance.dataset.id;
        attendance_id = await deleteAttendanceTime(attendance_id);
        if (attendance_id) {
            workAttendance.dataset.id = "";
            workAttendance.querySelector(".attendance-time").textContent = "---";
            workAttendance.querySelector(".attendance-close").remove();
            workAttendance.nextElementSibling.textContent = '';
        }
    } else {
        return;
    }
}

function generateCell(day) {
    let cellContent = '';

    if (day.attendance && day.attendance.start_datetime) {
        let attendanceStartTime = convertDateTimeToTime(day.attendance.start_datetime);
        let attendanceEndTime = convertDateTimeToTime(day.attendance.end_datetime);
        if (attendanceEndTime === '00:00') {
            attendanceEndTime = '24:00';
        }
        if (attendanceEndTime === '23:59') {
            attendanceEndTime = '24:00';
        }
        if (attendanceStartTime === '23:59') {
            attendanceStartTime = '24:00';
        }
        cellContent += `
            <div class="work-attendance" data-date="${day.date}" data-id="${day.attendance.id}">
                <p class="attendance-time">${attendanceStartTime} - ${attendanceEndTime}</p>
                <span class="attendance-close">&times;</span>
            </div>`;
    } else {
        cellContent += `
            <div class="work-attendance">
                <p class="attendance-time" data-date="${day.date}">- - -</p>
            </div>`;
    }
    if (day.reservation_count) {
        cellContent += `<p class="reservation-count">予約: ${day.reservation_count}</p>`;
    } else {
        cellContent += `<p class="reservation-count"></p>`;
    }

    return cellContent;
}
/*
* キャストの出勤・予約を取得する関数
* @param {string} date - 日付
* @param {int} page - ページ番号
* @param {int} limit - ページあたりの件数
* @param {int} skip - スキップする件数
* @param {int} pages - ページ数
* @param {int} total - 総件数
*/
async function getCastsWork(shop, date_l, page_l, limit_l, skip_l, pages_l, total_l) {
    try {
        console.log('リクエストパラメータ:', {
            shop,
            date_l,
            page_l,
            limit_l,
            skip_l,
            pages_l,
            total_l
        });
        // await axios.get('/sanctum/csrf-cookie', { withCredentials: true });
        const response = await axios.post('/api/work', {
            shop: shop,
            date: date_l,
            page: page_l,
            limit: limit_l,
            skip: skip_l,
            pages: pages_l,
            total: total_l,
        }, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'Authorization': 'Bearer ' + window.apiToken
            },
        });

        console.log('サーバーレスポンス:', response.data);

        if (response.data.status === 'success') {
            console.log('取得成功:', response.data);
            page = response.data.page;
            limit = response.data.limit;
            skip = response.data.skip;
            pages = response.data.pages;
            total = response.data.total;

            const casts = response.data.casts;
            // const dates = response.data.date_range
            //     ? [dates.start, dates.end]
            //     : casts[0]?.schedule.map(s => s.date); // fallback if date_range missing

            let tableHTML = `<div class="work-table">`;

            casts.forEach(cast => {
                // Add cast image (gallery_1) before the cast name
                let castImageHtml = '';
                if (cast.gallery_1) {
                    castImageHtml = `<img src="${window.location.origin + '/storage/' + cast.gallery_1}" alt="${cast.name}" >`;
                }
                tableHTML += `<div class="work-row" data-cast="${cast.id}"><div class="work-cell">${castImageHtml}<p>${cast.name}</p></div>`;
                cast.schedule.forEach(day => {
                    tableHTML += `<div class="work-cell">${generateCell(day)}</div>`;
                });
                tableHTML += `</div>`;
            });
            tableHTML += `</div>`;

            // Render
            document.querySelector('.work-content').innerHTML = tableHTML;

            document.querySelectorAll('.attendance-time').forEach(attendanceTime => {
                let workAttendance = attendanceTime.closest(".work-attendance");

                attendanceTime.addEventListener('click', (e) => {
                    let onlyTimeText = attendanceTime.textContent.trim();;
                    const [start, end] = onlyTimeText.split(' - ');
                    const attendanceDate = attendanceTime.dataset.date;
                    
                    showAttendanceTimeModal(start, end, async function(selectedStart, selectedEnd) {
                        let attendance_id = workAttendance.dataset.id;
                        const cast_id = workAttendance.closest('.work-row').dataset.cast;
                        attendance_id = await updateAttendanceTime(cast_id, attendance_id, selectedStart, selectedEnd, 1, attendanceDate);
                        if (attendance_id) {
                            if (selectedEnd === '23:59') {
                                selectedEnd = '24:00';
                            }
                            if (selectedStart === '23:59') {
                                selectedStart = '24:00';
                            }
                            workAttendance.querySelector('.attendance-time').textContent = `${selectedStart} - ${selectedEnd}`;
                            workAttendance.dataset.id = attendance_id;

                            if (!workAttendance.querySelector('span')) {
                                const closeSpan = document.createElement('span');
                                closeSpan.className = 'attendance-close';
                                closeSpan.innerHTML = '&times;';
                                workAttendance.appendChild(closeSpan);
                                closeSpan.addEventListener('click', async (e) => {
                                    deleteAttendance(workAttendance, attendanceDate);
                                })
                            }
                        }
                    }, attendanceDate);
                });
            });

            document.querySelectorAll('.attendance-close').forEach(attendanceClose => {
                attendanceClose.addEventListener('click', async (e) => {
                    const workAttendance = attendanceClose.closest(".work-attendance");
                    const date = workAttendance.querySelector(".attendance-time").dataset.date;
                    deleteAttendance(workAttendance, date);
                })
            });

            // await generateScheduleCastsPagination(page, limit, skip, pages, total, selectedDate);
            // await generateScheduleCastsPagination(page, limit, skip, pages, total, date_l);

            return {page, limit, skip, pages, total};
        } else {
            throw new Error(response.data.message || 'データの取得に失敗しました');
        }
    } catch (error) {
        console.error('エラーが発生しました:', error);
        if (error.response) {
            // サーバーからのエラーレスポンス
            console.error('エラーレスポンス:', error.response.data);
            alert('データの取得中にエラーが発生しました: ' + (error.response.data.message || error.message));
        } else if (error.request) {
            // リクエストは送信されたがレスポンスがない
            console.error('リクエストエラー:', error.request);
            alert('サーバーからの応答がありません。ネットワーク接続を確認してください。');
        } else {
            // リクエストの設定中にエラーが発生
            console.error('リクエスト設定エラー:', error.message);
            alert('リクエストの処理中にエラーが発生しました: ' + error.message);
        }
    }
}

async function generateScheduleCastsPagination(page_l, limit_l, skip_l, pages_l, total_l, date_l){
    let paginationHTML = '<div class="pagination-button">';
    paginationHTML += `<div class="flex align-center rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">`;
    if ( page_l > 1 ) {
        paginationHTML += `<button  class="pagination flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800" data-date="${date_l}" data-page="${page_l - 1}" data-limit="${limit_l}" data-skip="${skip_l}" data-pages="${pages_l}" data-total="${total_l}"><svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
        </svg></button>`;
    }else{
        paginationHTML += `<span class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800"><svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
        </svg></span>`;
    }
    console.log({pages_l});
    
    // ページネーションの範囲を計算
    let start, end;
    
    if (pages_l <= 7) {
        // 7ページ以下の場合は全て表示
        start = 1;
        end = pages_l;
    } else {
        // 8ページ以上の場合は適切に省略
        if (page_l <= 4) {
            // 1-4ページの場合: 1,2,3,4,5,...,最後
            start = 1;
            end = 5;
        } else if (page_l >= pages_l - 3) {
            // 最後の4ページの場合: 1,...,最後の5ページ
            start = pages_l - 4;
            end = pages_l;
        } else {
            // 中間の場合: 1,...,現在-1,現在,現在+1,...,最後
            start = page_l - 1;
            end = page_l + 1;
        }
    }
    
    // 1ページ目を表示（現在のページが1でない場合）
    if (start > 1) {
        paginationHTML += `<button class="pagination flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800" data-date="${date_l}" data-page="1" data-limit="${limit_l}" data-skip="${skip_l}" data-pages="${pages_l}" data-total="${total_l}">1</button>`;
        if (start > 2) {
            paginationHTML += `<span class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800">...</span>`;
        }
    }
    
    // 中央のページ番号を表示
    for (let i = start; i <= end; i++) {
        if (i === page_l) {
            paginationHTML += `<span class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 bg-gray-100 dark:bg-gray-800 dark:text-white">${i}</span>`;
        } else {
            paginationHTML += `<button class="pagination flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800" data-date="${date_l}" data-page="${i}" data-limit="${limit_l}" data-skip="${skip_l}" data-pages="${pages_l}" data-total="${total_l}">${i}</button>`;
        }
    }
    
    // 最後のページを表示（現在のページが最後でない場合）
    if (end < pages_l) {
        if (end < pages_l - 1) {
            paginationHTML += `<span class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800">...</span>`;
        }
        paginationHTML += `<button class="pagination flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800" data-date="${date_l}" data-page="${pages_l}" data-limit="${limit_l}" data-skip="${skip_l}" data-pages="${pages_l}" data-total="${total_l}">${pages_l}</button>`;
    }
    if ( page_l < pages_l ){
        paginationHTML += `<button class="pagination flex items-center justify-center w-10 h-10 border-l border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800" data-date="${date_l}" data-page="${page_l + 1}" data-limit="${limit_l}" data-skip="${skip_l}" data-pages="${pages_l}" data-total="${total_l}"><svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"></path>
        </svg></button>`;
    }else{
        paginationHTML += `<span class="flex items-center justify-center w-10 h-10"><svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
        </svg></span>`;
    }
    paginationHTML += '</div></div>';
    // document.querySelector('.pagination-container').innerHTML = `<div class="pagination-button">${paginationHTML}</div>`;
    document.querySelector('.pagination-container').innerHTML = paginationHTML;
    await generateScheduleCastsPaginationListener();
    // document.querySelectorAll('.pagination').forEach(pagination => {
    //     pagination.addEventListener('click', async function(e){
    //         e.preventDefault();
    //         selectedDate = e.target.dataset.date;
    //         page = e.target.dataset.page;
    //         limit = e.target.dataset.limit;
    //         skip = e.target.dataset.skip;
    //         pages = e.target.dataset.pages;
    //         total = e.target.dataset.total;
    //         // window.scrollTo({top:0, behavior: 'smooth'});
    //         await getCastsWork(shop, selectedDate, page, limit, skip, pages, total);
    //         await generateScheduleCastsPagination(page, limit, skip, pages, total, selectedDate);
    //     });
    // });
}
async function generateScheduleCastsPaginationListener(){
    document.querySelectorAll('.pagination').forEach(pagination => {
        pagination.addEventListener('click', async function(e){
            e.preventDefault();
            
            // SVGアイコンをクリックした場合、親要素のbuttonからdatasetを取得
            let targetElement = e.target;
            if (targetElement.tagName === 'svg' || targetElement.tagName === 'path') {
                targetElement = e.currentTarget; // button要素を取得
            }
            
            selectedDate = targetElement.dataset.date;
            page = targetElement.dataset.page;
            limit = targetElement.dataset.limit;
            skip = targetElement.dataset.skip;
            pages = targetElement.dataset.pages;
            total = targetElement.dataset.total;
            
            // window.scrollTo({top:0, behavior: 'smooth'});
            await getCastsWork(shop, selectedDate, page, limit, skip, pages, total);
            await generateScheduleCastsPagination(page, limit, skip, pages, total, selectedDate);
        });
    });
}
document.querySelector('#search_shop').addEventListener('change', async function(e) {
    e.preventDefault();
    shop = e.target.value ? e.target.value : '';
    console.log('shop:', shop);
    page = 1;
    await getCastsWork(shop, selectedDate, page, limit, skip, pages, total);
    await generateScheduleCastsPagination(page, limit, skip, pages, total, selectedDate);
});

document.querySelector('#search_limit').addEventListener('change', async function(e) {
    e.preventDefault();
    limit = e.target.value ? e.target.value : '';
    console.log('shop:', shop);
    page = 1;
    await getCastsWork(shop, selectedDate, page, limit, skip, pages, total);
    await generateScheduleCastsPagination(page, limit, skip, pages, total, selectedDate);
});

async function updateAttendanceTime(cast_id, attendance_id, startTime, endTime, attendance_public, date) {
    try {
        console.log('更新リクエスト:', {
            cast_id,
            attendance_id,
            startTime,
            endTime,
            attendance_public,
            date
        });
        // await axios.get('/sanctum/csrf-cookie', { withCredentials: true });
        const response = await axios.post('/api/schedule/updateattendance', {
            date: date,
            cast_id: cast_id,
            attendance_id: attendance_id,
            startTime: startTime,
            endTime: endTime,
            attendance_public: attendance_public,
        }, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'Authorization': 'Bearer ' + window.apiToken
            },
            // credentials: 'include'
            // withCredentials: true
        });

        console.log('サーバーレスポンス:', response.data);

        if (response.data.status === 'success') {
            console.log('更新成功:', response.data);
            return response.data.attendance_id;
        } else {
            throw new Error(response.data.message || '更新に失敗しました');
        }
    } catch (error) {
        console.error('エラーが発生しました:', error);
        if (error.response) {
            console.error('エラーレスポンス:', error.response.data);
            alert('更新中にエラーが発生しました: ' + (error.response.data.message || error.message));
        } else if (error.request) {
            console.error('リクエストエラー:', error.request);
            alert('サーバーからの応答がありません。ネットワーク接続を確認してください。');
        } else {
            console.error('リクエスト設定エラー:', error.message);
            alert('リクエストの処理中にエラーが発生しました: ' + error.message);
        }
        throw error;
    }
}

async function deleteAttendanceTime(attendance_id) {
    try {
        console.log('更新リクエスト:', {
            attendance_id,
        });
        const response = await axios.post('/api/work/deleteattendance', {
            attendance_id: attendance_id,
        }, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'Authorization': 'Bearer ' + window.apiToken
            },
        });

        console.log('サーバーレスポンス:', response.data);

        if (response.data.status === 'success') {
            console.log('更新成功:', response.data);
            return response.data.attendance_id;
        } else {
            throw new Error(response.data.message || '更新に失敗しました');
        }
    } catch (error) {
        console.error('エラーが発生しました:', error);
        if (error.response) {
            console.error('エラーレスポンス:', error.response.data);
            alert('更新中にエラーが発生しました: ' + (error.response.data.message || error.message));
        } else if (error.request) {
            console.error('リクエストエラー:', error.request);
            alert('サーバーからの応答がありません。ネットワーク接続を確認してください。');
        } else {
            console.error('リクエスト設定エラー:', error.message);
            alert('リクエストの処理中にエラーが発生しました: ' + error.message);
        }
        throw error;
    }
}

// Modal logic for attendance time
function generateTimeOptions() {
    const options = [];
    let hour = 8;
    let minute = 0;
    while (hour < 24 || (hour === 24 && minute === 0)) {
        const h = hour.toString().padStart(2, '0');
        const m = minute.toString().padStart(2, '0');
        options.push(`${h}:${m}`);
        minute += 30;
        if (minute === 60) {
            minute = 0;
            hour++;
        }
        if (hour === 24 && minute > 0) break;
    }
    return options;
}

function populateTimeSelect(select, selectedValue) {
    select.innerHTML = '';
    generateTimeOptions().forEach(time => {
        const option = document.createElement('option');
        if (time === '24:00'){
            
            option.value = '23:59';
            option.textContent = '23:59';
        } else {
            option.value = time;
            option.textContent = time;
        }
        // option.value = time;
        option.textContent = time;
        if (selectedValue && selectedValue === time) option.selected = true;
        select.appendChild(option);
    });
}

function showAttendanceTimeModal(startTime, endTime, onSave, attendanceDate) {
    const modal = document.getElementById('attendanceTimeModal');
    const startSelect = document.getElementById('attendanceStartTime');
    const endSelect = document.getElementById('attendanceEndTime');
    const saveBtn = document.getElementById('attendanceTimeSave');
    const closeBtn = document.getElementById('attendanceTimeClose');
    const dateLabel = document.getElementById('attendanceDate');
    const errorMsg = modal.querySelector('.attendance-time-error');

    // Add or get error message element
    errorMsg.textContent = '';

    populateTimeSelect(startSelect, startTime);
    populateTimeSelect(endSelect, endTime);

    if (attendanceDate && dateLabel) {
        dateLabel.textContent = formatDate(attendanceDate);
    } else if (dateLabel) {
        dateLabel.textContent = '出勤時間の編集';
    }

    modal.classList.remove('hidden');

    function closeModal() {
        modal.classList.add('hidden');
        saveBtn.removeEventListener('click', onSaveClick);
        modal.removeEventListener('click', onOverlayClick);
        if (closeBtn) closeBtn.removeEventListener('click', onCloseClick);
    }

    function onSaveClick() {
        const selectedStart = startSelect.value;
        const selectedEnd = endSelect.value;
        // Validation: start must be before end
        if (selectedStart >= selectedEnd) {
            // errorMsg.textContent = '開始時間は終了時間より早く設定してください。';
            errorMsg.textContent = '時間を正しくに設定してください。';
            return;
        }
        errorMsg.textContent = '';
        if (onSave) onSave(selectedStart, selectedEnd);
        closeModal();
    }

    function onOverlayClick(e) {
        // Only close if click is on the overlay, not the modal content
        if (e.target === modal) {
            closeModal();
        }
    }
    function onCloseClick() {
        closeModal();
    }

    saveBtn.addEventListener('click', onSaveClick);
    modal.addEventListener('click', onOverlayClick);
    if (closeBtn) closeBtn.addEventListener('click', onCloseClick);
}

// 日付をフォーマットする関数
function formatDate(dateString) {
    const date = new Date(dateString)
    const year = date.getFullYear();
    const month = date.getMonth() + 1;
    const day = date.getDate();
    const weekdays = ['日', '月', '火', '水', '木', '金', '土'];
    const weekday = weekdays[date.getDay()];
    return `${year}年${month}月${day}日(${weekday})`;
}