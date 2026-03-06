import axios from 'axios'

let page = 1;
let limit = 30;
let skip = 0;
let pages = 0;
let total = 0;
let shop = '';
let is_public = '';
let castName = '';
let selectedDate = '';

console.log(window.apiToken);
// 時間オプションを生成する関数
function generateTimeOptions(strTime) {
    if (strTime === "00:00")
        strTime = "23:59";

    let options = '';
    for (let hour = 8; hour <= 24; hour++) {
        for (let min = 0; min < 60; min += 30) {
            let timeStr = '';
            let timeContext = '';
            if (hour === 24 && min === 30) continue;
            if (hour === 24 && min === 0){
                timeStr = "23:59";
                timeContext = '24:00';
            } else {
                timeStr = `${hour.toString().padStart(2, '0')}:${min.toString().padStart(2, '0')}`;
                timeContext = timeStr;
            }
            // const timeStr = `${hour.toString().padStart(2, '0')}:${min.toString().padStart(2, '0')}`;
            if (strTime && strTime === timeStr) {
                options += `<option value="${timeStr}" selected>${timeContext}</option>`;
            } else {
                options += `<option value="${timeStr}">${timeContext}</option>`;
            }
        }
    }
    return options;
}
document.addEventListener('DOMContentLoaded', async function() {
    // 日付ナビゲーション機能
    const scheduleDate = document.querySelector('.schedule-date');
    const prevWeekBtn = document.querySelector('.prev-week-btn');
    const nextWeekBtn = document.querySelector('.next-week-btn');
    const dateTabs = document.querySelector('.date-tabs');

    // 現在の日付を設定（テスト用：6/9）
    let currentDate = new Date();
    console.log({currentDate});
    // currentDate.setMonth(5); // 6月（0から始まるため5）
    // currentDate.setDate(9);

    let currentWeekStart = getWeekStart(currentDate);
    console.log({currentWeekStart});
    // 週の開始日を取得する関数
    function getWeekStart(date) {
        // const day = date.getDay();
        // console.log({day});
        // const diff = date.getDate() - day;
        // console.log('date: ', date.getDate());
        // console.log({diff});
        const weekStart = new Date(date);
        // weekStart.setDate(diff);
        return weekStart;
    }

    // 日付をフォーマットする関数
    function formatDate(date) {
        const year = date.getFullYear();
        const month = date.getMonth() + 1;
        const day = date.getDate();
        const weekdays = ['日', '月', '火', '水', '木', '金', '土'];
        const weekday = weekdays[date.getDay()];
        return `${year}年${month}月${day}日(${weekday})`;
    }

    // 先週ボタンの無効化状態を更新する関数
    function updatePrevWeekButtonState() {
        const today = new Date();
        // today.setMonth(5); // 6月（0から始まるため5）
        // today.setDate(9);
        const todayWeekStart = getWeekStart(today);
        // console.log({todayWeekStart});
        // console.log({currentWeekStart});
        // console.log(currentWeekStart.getDate());
        // console.log(todayWeekStart.getDate());
        if (currentWeekStart.getMonth() === todayWeekStart.getMonth() && currentWeekStart.getDate() === todayWeekStart.getDate()) {
            prevWeekBtn.classList.add('week-btn-disabled');
        } else {
            prevWeekBtn.classList.remove('week-btn-disabled');
        }
    }

    // 日付タブを生成する関数
    function generateDateTabs(startDate) {
        dateTabs.innerHTML = '';
        for (let i = 0; i < 7; i++) {
            const date = new Date(startDate);
            date.setDate(startDate.getDate() + i);
            const month = date.getMonth() + 1;
            const day = date.getDate();
            const weekdays = ['日', '月', '火', '水', '木', '金', '土'];
            const weekday = weekdays[date.getDay()];

            const tab = document.createElement('div');
            tab.className = 'date-tab';

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

            tab.addEventListener('click', async () => {
                // アクティブなタブを更新
                document.querySelectorAll('.date-tab').forEach(t => {
                    t.classList.remove('active');
                    t.innerHTML = t.textContent;
                });
                tab.classList.add('active');
                tab.innerHTML = `${month}/${day}(${weekday})<div class="active-indicator"></div>`;

                // スケジュール日付を更新
                scheduleDate.textContent = `${formatDate(date)}の予約状況`;
                selectedDate = date.toDateString()
                await getCastsSchedule(castName, shop, is_public, selectedDate, page, limit, skip, pages, total);
                await generateScheduleCasts();
                await generateScheduleCastsPagination(page, limit, skip, pages, total,selectedDate);
            });

            dateTabs.appendChild(tab);
        }
    }

    // 初期表示
    generateDateTabs(currentWeekStart);
    console.log(currentWeekStart);
    selectedDate = currentDate.toDateString();
    limit = document.getElementById('search_form_limit').value;
    await getCastsSchedule(castName, shop, is_public, selectedDate, page, limit, skip, pages, total);
    await generateScheduleCasts();
    await generateScheduleCastsPagination(page, limit, skip, pages, total,selectedDate);
    scheduleDate.textContent = `${formatDate(currentWeekStart)}の予約状況`;
    updatePrevWeekButtonState();
    // await generateScheduleCasts();
    // 先週ボタンのクリックイベント
    prevWeekBtn.addEventListener('click', async () => {
        if (prevWeekBtn.classList.contains('week-btn-disabled')) {
            return;
        }

        const newWeekStart = new Date(currentWeekStart);
        newWeekStart.setDate(currentWeekStart.getDate() - 7);
        currentWeekStart = newWeekStart;

        generateDateTabs(currentWeekStart);
        scheduleDate.textContent = `${formatDate(currentWeekStart)}の予約状況`;
        updatePrevWeekButtonState();

        selectedDate = currentWeekStart.toDateString();
        await getCastsSchedule(castName, shop, is_public, selectedDate, page, limit, skip, pages, total);
        await generateScheduleCasts();
        await generateScheduleCastsPagination(page, limit, skip, pages, total,selectedDate);
    });

    // 翌週ボタンのクリックイベント
    nextWeekBtn.addEventListener('click', async () => {
        const newWeekStart = new Date(currentWeekStart);
        newWeekStart.setDate(currentWeekStart.getDate() + 7);
        currentWeekStart = newWeekStart;

        generateDateTabs(currentWeekStart);
        scheduleDate.textContent = `${formatDate(currentWeekStart)}の予約状況`;
        updatePrevWeekButtonState();

        selectedDate = currentWeekStart.toDateString();
        await getCastsSchedule(castName, shop, is_public, selectedDate, page, limit, skip, pages, total);
        await generateScheduleCasts();
        await generateScheduleCastsPagination(page, limit, skip, pages, total,selectedDate);
    });



});



// 時間軸のラベルを生成する関数
function generateTimeAxisLabels() {
    let labels = '';
    for (let hour = 8; hour < 24; hour++) {
        labels += `<div class="time-label">${hour}時</div>`;
    }
    return labels;
}

// 時間グリッドのセルを生成する関数
function generateTimeGridCells() {
    let cells = '';
    for (let i = 0; i < 32; i++) {
        const hour = 8 + Math.floor(i / 2);
        const minute = (i % 2 === 0) ? '00' : '30';
        const isHour = (i % 2 === 0);
        const border = isHour ? '1px solid #ccc' : '2px solid #000';
        const cellClass = isHour ? 'half-hour-cell' : 'hour-cell';
        const cellContent = isHour ? '' : minute;
        cells += `<div class="grid-cell ${cellClass}"></div>`;
    }
    return cells;
}
function reDrawScheduleCasts() {
    document.querySelectorAll('.schedule-cast-section').forEach(section => {
        const startTimeSelect = section.querySelector('.start-time');
        const endTimeSelect = section.querySelector('.end-time');
        const gridCells = section.querySelector('.grid-cells');

        const startTime = startTimeSelect.value;
        const endTime = endTimeSelect.value;

        console.log(startTime, endTime)
        // 時間を分に変換する関数
        function timeToMinutes(timeStr) {
            const [hours, minutes] = timeStr.split(':').map(Number);
            return hours * 60 + minutes;
        }

        // 選択された時間を分に変換
        const startMinutes = timeToMinutes(startTime);
        const endMinutes = timeToMinutes(endTime);

        // グリッドセルを取得
        const cells = gridCells.querySelectorAll('.grid-cell');

        // すべてのセルの背景色をリセット
        cells.forEach(cell => {
            cell.style.backgroundColor = '#eee';
        });

        // まず出勤時間の背景色を更新
        cells.forEach((cell, index) => {
            const cellStartMinutes = 8 * 60 + index * 30;
            const cellEndMinutes = cellStartMinutes + 30;

            if (cellStartMinutes < endMinutes && cellEndMinutes > startMinutes) {
                cell.style.backgroundColor = 'red';
            }
        });

        // 次に登録済みのフォームの時間範囲を表示
        const registeredForms = section.querySelectorAll('.schedule-form.registered');
        registeredForms.forEach(form => {
            const formStartTime = form.querySelector('.form-start-time').value;
            const formEndTime = form.querySelector('.form-end-time').value;

            const formStartMinutes = timeToMinutes(formStartTime);
            const formEndMinutes = timeToMinutes(formEndTime);

            cells.forEach((cell, index) => {
                const cellStartMinutes = 8 * 60 + index * 30;
                const cellEndMinutes = cellStartMinutes + 30;

                if (cellStartMinutes < formEndMinutes && cellEndMinutes > formStartMinutes) {
                    const currentColor = cell.style.backgroundColor;
                    if (currentColor === 'red') {
                        cell.style.backgroundColor = 'rgba(0, 0, 255, 0.3)';
                    }
                }
            });
        });
    });
}
function generateScheduleCasts() {
    // 各キャストセクションの処理
    document.querySelectorAll('.schedule-cast-section').forEach(section => {
        // 時間選択の要素を取得
        const startTimeSelect = section.querySelector('.start-time');
        const endTimeSelect = section.querySelector('.end-time');
        const gridCells = section.querySelector('.grid-cells');

        // 時間グリッドのドラッグ機能
        let isDragging = false;
        let startCellIndex = -1;
        let endCellIndex = -1;

        // セルのインデックスを取得する関数
        function getCellIndex(cell) {
            return Array.from(gridCells.querySelectorAll('.grid-cell')).indexOf(cell);
        }

        // 時間を分に変換する関数
        function timeToMinutes(timeStr) {
            const [hours, minutes] = timeStr.split(':').map(Number);
            return hours * 60 + minutes;
        }

        // 分を時間文字列に変換する関数
        function minutesToTimeString(minutes) {
            const hours = Math.floor(minutes / 60);
            const mins = minutes % 60;
            return `${hours.toString().padStart(2, '0')}:${mins.toString().padStart(2, '0')}`;
        }

        // 選択範囲の時間を更新する関数
        async function updateSelectedTime() {
            if (startCellIndex === -1 || endCellIndex === -1) return;

            const startMinutes = 8 * 60 + Math.min(startCellIndex, endCellIndex) * 30;
            const endMinutes = 8 * 60 + (Math.max(startCellIndex, endCellIndex) + 1) * 30;

            const startTimeStr = minutesToTimeString(startMinutes);
            const endTimeStr = minutesToTimeString(endMinutes);

            // 開始時間と終了時間のセレクトボックスを更新
            startTimeSelect.value = startTimeStr;
            endTimeSelect.value = endTimeStr;



            // グリッドの背景色を更新
            updateGridBackground();
        }

        // セルの背景色を更新する関数
        function updateCellsBackground() {
            gridCells.querySelectorAll('.grid-cell').forEach((cell, index) => {
                if (startCellIndex === -1 || endCellIndex === -1) {
                    cell.style.backgroundColor = '#eee';
                    return;
                }

                const minIndex = Math.min(startCellIndex, endCellIndex);
                const maxIndex = Math.max(startCellIndex, endCellIndex);

                if (index >= minIndex && index <= maxIndex) {
                    cell.style.backgroundColor = 'rgba(255, 0, 0, 0.3)';
                } else {
                    cell.style.backgroundColor = '#eee';
                }
            });
        }

        // マウスイベントの設定
        // gridCells.querySelectorAll('.grid-cell').forEach(cell => {
        //     cell.addEventListener('mousedown', (e) => {
        //         isDragging = true;
        //         startCellIndex = getCellIndex(cell);
        //         endCellIndex = startCellIndex;
        //         updateCellsBackground();
        //     });

        //     cell.addEventListener('mouseover', (e) => {
        //         if (isDragging) {
        //             endCellIndex = getCellIndex(e.target);
        //             updateCellsBackground();
        //         }
        //     });
        // });

        // // マウスアップ時の処理
        // gridCells.addEventListener('mouseup', async (event) => {
        //     event.stopPropagation();
        //     if (isDragging) {
        //         event.stopPropagation();
        //         isDragging = false;
        //         updateSelectedTime();
        //         startCellIndex = -1;
        //         endCellIndex = -1;


        //     }
        // });

        // グリッドセルの背景色を更新する関数
        async function updateGridBackground(){
            try {
                const startTime = startTimeSelect.value;
                const endTime = endTimeSelect.value;

                const cast_id = section.querySelector('#cast-id').value;
                const attendance_public = section.querySelector('#is_public').value;
                let attendance_id = section.querySelector('#attendance-id').value;
                const startWorking = timeToMinutes(startTime);
                const endWorking = timeToMinutes(endTime);
                if (startWorking > endWorking){
                    // alert("出勤時間が不正です");
                    return;
                }else if (startWorking == endWorking){
                    return;
                }
                attendance_id = await updateAttendanceTime(cast_id, attendance_id, startTime, endTime, attendance_public, selectedDate);
                section.querySelector('#attendance-id').value = attendance_id;

                // 選択された時間を分に変換
                const startMinutes = timeToMinutes(startTime);
                const endMinutes = timeToMinutes(endTime);

                // グリッドセルを取得
                const cells = gridCells.querySelectorAll('.grid-cell');

                // すべてのセルの背景色をリセット
                cells.forEach(cell => {
                    cell.style.backgroundColor = '#eee';
                });

                // まず出勤時間の背景色を更新
                cells.forEach((cell, index) => {
                    const cellStartMinutes = 8 * 60 + index * 30;
                    const cellEndMinutes = cellStartMinutes + 30;

                    if (cellStartMinutes < endMinutes && cellEndMinutes > startMinutes) {
                        cell.style.backgroundColor = 'red';
                    }
                });

                // 次に登録済みのフォームの時間範囲を表示
                const registeredForms = section.querySelectorAll('.schedule-form.registered');
                registeredForms.forEach(form => {
                    const formStartTime = form.querySelector('.form-start-time').value;
                    const formEndTime = form.querySelector('.form-end-time').value;

                    const formStartMinutes = timeToMinutes(formStartTime);
                    const formEndMinutes = timeToMinutes(formEndTime);

                    cells.forEach((cell, index) => {
                        const cellStartMinutes = 8 * 60 + index * 30;
                        const cellEndMinutes = cellStartMinutes + 30;

                        if (cellStartMinutes < formEndMinutes && cellEndMinutes > formStartMinutes) {
                            const currentColor = cell.style.backgroundColor;
                            if (currentColor === 'red') {
                                cell.style.backgroundColor = 'rgba(0, 0, 255, 0.3)';
                            }
                        }
                    });
                });
            } catch (error) {
                console.error('エラーが発生しました:', error);
                alert('更新中にエラーが発生しました。ページを更新して再度お試しください。');
            }
        };

        // 時間選択の変更を監視
        startTimeSelect.addEventListener('change', async () => {
            await updateGridBackground();
        });
        endTimeSelect.addEventListener('change', async () => {
            await updateGridBackground();
        });
        section.querySelector('#is_public').addEventListener('change', updateGridBackground);

        // フォームの追加と削除の機能
        const scheduleForms = section.querySelector('.schedule-forms');

        // フォームの追加と削除のイベントを設定する関数
        function setupFormEvents(form) {
            const deleteBtn = form.querySelector('.delete-form-btn');
            const startTimeSelect = form.querySelector('.form-start-time');
            const endTimeSelect = form.querySelector('.form-end-time');
            const registerBtn = form.querySelector('.register-btn');

            // 時間を分に変換する関数
            function timeToMinutes(timeStr) {
                const [hours, minutes] = timeStr.split(':').map(Number);
                return hours * 60 + minutes;
            }

            // グリッドセルの背景色を更新する関数
            function updateGridBackground() {
                const startTime = startTimeSelect.value;
                const endTime = endTimeSelect.value;

                // 選択された時間を分に変換
                const startMinutes = timeToMinutes(startTime);
                const endMinutes = timeToMinutes(endTime);

                // グリッドセルを取得
                const cells = gridCells.querySelectorAll('.grid-cell');

                // すべてのセルの背景色をリセット
                cells.forEach(cell => {
                    cell.style.backgroundColor = '#eee';
                });

                // 出勤時間の背景色を更新
                const workStartTime = section.querySelector('.start-time').value;
                const workEndTime = section.querySelector('.end-time').value;
                const workStartMinutes = timeToMinutes(workStartTime);
                const workEndMinutes = timeToMinutes(workEndTime);

                cells.forEach((cell, index) => {
                    const cellStartMinutes = 8 * 60 + index * 30;
                    const cellEndMinutes = cellStartMinutes + 30;

                    if (cellStartMinutes < workEndMinutes && cellEndMinutes > workStartMinutes) {
                        cell.style.backgroundColor = 'red';
                    }
                });

                // 登録済みのフォームの時間範囲を表示
                const registeredForms = section.querySelectorAll('.schedule-form.registered');
                registeredForms.forEach(registeredForm => {
                    const formStartTime = registeredForm.querySelector('.form-start-time').value;
                    const formEndTime = registeredForm.querySelector('.form-end-time').value;

                    const formStartMinutes = timeToMinutes(formStartTime);
                    const formEndMinutes = timeToMinutes(formEndTime);

                    cells.forEach((cell, index) => {
                        const cellStartMinutes = 8 * 60 + index * 30;
                        const cellEndMinutes = cellStartMinutes + 30;

                        if (cellStartMinutes < formEndMinutes && cellEndMinutes > formStartMinutes) {
                            const currentColor = cell.style.backgroundColor;
                            if (currentColor === 'red') {
                                cell.style.backgroundColor = 'rgba(0, 0, 255, 0.3)';
                            }
                        }
                    });
                });
            }

            // 時間選択の変更を監視
            startTimeSelect.addEventListener('change', updateGridBackground);
            endTimeSelect.addEventListener('change', updateGridBackground);
            section.querySelector('#is_public').addEventListener('change', updateGridBackground);
            // 登録ボタンのクリックイベント
            registerBtn.addEventListener('click', async function() {
                const startTime = startTimeSelect.value;
                const endTime = endTimeSelect.value;

                // 選択された時間を分に変換
                const startMinutes = timeToMinutes(startTime);
                const endMinutes = timeToMinutes(endTime);

                const form_startMinutes = timeToMinutes(section.querySelector('.start-time').value);
                const form_endMinutes = timeToMinutes(section.querySelector('.end-time').value);
                console.log({startMinutes, endMinutes,form_startMinutes,form_endMinutes});
                if (form_startMinutes == form_endMinutes){
                    alert("出勤時間を選択してください。");
                    return;
                }
                else if ( startMinutes < form_startMinutes || endMinutes > form_endMinutes){
                    alert("出勤時間と予約時間が重複しています");
                    return;
                }else if ( startMinutes > endMinutes){
                    alert("予約時間が不正です");
                    return;
                }

                const startTime_working = section.querySelector('.start-time').value;
                const endTime_working = section.querySelector('.end-time').value;
                const startTime_form = form.querySelector('.form-start-time').value;
                const endTime_form = form.querySelector('.form-end-time').value;

                const cast_id = section.querySelector('#cast-id').value;
                const attendance_public = section.querySelector('#is_public').value;
                const attendance_id = section.querySelector('#attendance-id').value;

                let reservation_id = await  updateReservationTime(cast_id, attendance_id, startTime_working, endTime_working, startTime_form, endTime_form , attendance_public, selectedDate);
                if (reservation_id != null){
                    form.querySelector('#reservation-id').value = reservation_id;
                }else{
                    return;
                }
                // const workStartTime = section.querySelector('.start-time').value;
                // const workEndTime = section.querySelector('.end-time').value;
                // const workStartMinutes = timeToMinutes(workStartTime);
                // const workEndMinutes = timeToMinutes(workEndTime);

                // グリッドセルを取得
                const cells = gridCells.querySelectorAll('.grid-cell');

                // すべてのセルの背景色をリセット
                cells.forEach(cell => {
                    cell.style.backgroundColor = '#eee';
                });

                // 1. まず出勤時間の背景色を更新
                const workStartTime = section.querySelector('.start-time').value;
                const workEndTime = section.querySelector('.end-time').value;
                const workStartMinutes = timeToMinutes(workStartTime);
                const workEndMinutes = timeToMinutes(workEndTime);

                cells.forEach((cell, index) => {
                    const cellStartMinutes = 8 * 60 + index * 30;
                    const cellEndMinutes = cellStartMinutes + 30;

                    if (cellStartMinutes < workEndMinutes && cellEndMinutes > workStartMinutes) {
                        cell.style.backgroundColor = 'red';
                    }
                });

                // 2. クリックしたフォームの時間範囲の背景色を更新
                cells.forEach((cell, index) => {
                    const cellStartMinutes = 8 * 60 + index * 30;
                    const cellEndMinutes = cellStartMinutes + 30;

                    if (cellStartMinutes < endMinutes && cellEndMinutes > startMinutes) {
                        const currentColor = cell.style.backgroundColor;
                        if (currentColor === 'red') {
                            cell.style.backgroundColor = 'rgba(0, 0, 255, 0.3)';
                        }else{
                            return;
                        }
                    }else{
                        return;
                    }
                });

                // 3. 登録済みのフォームの時間範囲を表示
                const registeredForms = section.querySelectorAll('.schedule-form.registered');
                registeredForms.forEach(registeredForm => {
                    const formStartTime = registeredForm.querySelector('.form-start-time').value;
                    const formEndTime = registeredForm.querySelector('.form-end-time').value;

                    const formStartMinutes = timeToMinutes(formStartTime);
                    const formEndMinutes = timeToMinutes(formEndTime);

                    cells.forEach((cell, index) => {
                        const cellStartMinutes = 8 * 60 + index * 30;
                        const cellEndMinutes = cellStartMinutes + 30;

                        if (cellStartMinutes < formEndMinutes && cellEndMinutes > formStartMinutes) {
                            const currentColor = cell.style.backgroundColor;
                            if (currentColor === 'red') {
                                cell.style.backgroundColor = 'rgba(0, 0, 255, 0.3)';
                            }
                        }
                    });
                });

                // 登録済み状態に変更
                registerBtn.textContent = '登録済';
                registerBtn.classList.add('registered');
                form.classList.add('registered');


                // updateAttendanceTime(cast_id, attendance_id, startTime_working, endTime_working, attendance_public, selectedDate);
            });

            deleteBtn.addEventListener('click', async function() {
                // フォームが登録済みの場合のみ時間グリッドを更新
                if (form.classList.contains('registered')) {
                    if (confirm('予約を削除しますか？')){
                        const reservation_id = form.querySelector('#reservation-id').value;
                        if (reservation_id != ''){
                            await deleteReservationTime(reservation_id);
                        }
                    }else{
                        return;
                    }
                    // グリッドセルを取得
                    const cells = gridCells.querySelectorAll('.grid-cell');

                    // すべてのセルの背景色をリセット
                    cells.forEach(cell => {
                        cell.style.backgroundColor = '#eee';
                    });

                    // 出勤時間の背景色を更新
                    const workStartTime = section.querySelector('.start-time').value;
                    const workEndTime = section.querySelector('.end-time').value;
                    const workStartMinutes = timeToMinutes(workStartTime);
                    const workEndMinutes = timeToMinutes(workEndTime);

                    cells.forEach((cell, index) => {
                        const cellStartMinutes = 8 * 60 + index * 30;
                        const cellEndMinutes = cellStartMinutes + 30;

                        if (cellStartMinutes < workEndMinutes && cellEndMinutes > workStartMinutes) {
                            cell.style.backgroundColor = 'red';
                        }
                    });

                    // 登録済みのフォームの時間範囲を表示
                    const registeredForms = section.querySelectorAll('.schedule-form.registered');
                    registeredForms.forEach(registeredForm => {
                        // 削除対象のフォームは除外
                        if (registeredForm === form) return;

                        const formStartTime = registeredForm.querySelector('.form-start-time').value;
                        const formEndTime = registeredForm.querySelector('.form-end-time').value;

                        const formStartMinutes = timeToMinutes(formStartTime);
                        const formEndMinutes = timeToMinutes(formEndTime);

                        cells.forEach((cell, index) => {
                            const cellStartMinutes = 8 * 60 + index * 30;
                            const cellEndMinutes = cellStartMinutes + 30;

                            if (cellStartMinutes < formEndMinutes && cellEndMinutes > formStartMinutes) {
                                const currentColor = cell.style.backgroundColor;
                                if (currentColor === 'red') {
                                    cell.style.backgroundColor = 'rgba(0, 0, 255, 0.3)';
                                }
                            }
                        });
                    });
                }

                // フォームを削除して追加ボタンに置き換え
                const addBtn = createAddButton();
                form.replaceWith(addBtn);
                setupAddButtonEvents(addBtn);
            });
        }

        // 新しいフォームを作成する関数
        function createNewForm() {
            const newForm = document.createElement('div');
            newForm.className = 'schedule-form active';
            newForm.innerHTML = `
                <button class="delete-form-btn">×</button>
                <input type="hidden" id="reservation-id" class="reservation-id" value="">
                <div class="form-time-selector">
                    <select class="form-start-time">
                        ${generateTimeOptions()}
                    </select>
                    <span class="form-time-separator">～</span>
                    <select class="form-end-time">
                        ${generateTimeOptions()}
                    </select>
                </div>
                <button class="register-btn">登録</button>
            `;
            return newForm;
        }

        // 追加ボタンを作成する関数
        function createAddButton() {
            const addBtn = document.createElement('div');
            addBtn.className = 'add-form-btn';
            addBtn.textContent = '＋';
            return addBtn;
        }

        // 追加ボタンのイベントを設定する関数
        function setupAddButtonEvents(addBtn) {
            addBtn.addEventListener('click', function() {
                const newForm = createNewForm();
                this.replaceWith(newForm);
                setupFormEvents(newForm);
            });
        }

        // 既存の追加ボタンにイベントを設定
        const addButtons = scheduleForms.querySelectorAll('.add-form-btn');
        addButtons.forEach(addButton => {
            setupAddButtonEvents(addButton);
        });

        // 既存のフォームの削除ボタンにイベントを設定
        const deleteButtons = scheduleForms.querySelectorAll('.delete-form-btn');
        deleteButtons.forEach(deleteButton => {
            const form = deleteButton.closest('.schedule-form');
            setupFormEvents(form);
        });
    });

}

function convertDateTimeToTime(dateTime) {
    const date = new Date(dateTime);
    return date.toLocaleTimeString('ja-JP', { hour: '2-digit', minute: '2-digit', hour12: false , hourCycle: 'h23' , separator: ':'});
}
function formatTimeTotime(time) {
    return time.substring(0, 5);
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
async function getCastsSchedule(castName, shop, is_public, date_l, page_l, limit_l, skip_l, pages_l, total_l) {
    try {
        console.log('リクエストパラメータ:', {
            castName,
            shop,
            is_public,
            date_l,
            page_l,
            limit_l,
            skip_l,
            pages_l,
            total_l
        });
        // await axios.get('/sanctum/csrf-cookie', { withCredentials: true });
        const response = await axios.post('/api/schedule', {
            castName: castName,
            shop: shop,
            public: is_public,
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
            // credentials: 'include'
            // withCredentials: true
        });

        console.log('サーバーレスポンス:', response.data);

        if (response.data.status === 'success') {
            console.log('取得成功:', response.data);
            const casts = response.data.casts;
            const attendances = response.data.attendances;
            const reservations = response.data.reservations;
            page = response.data.page;
            limit = response.data.limit;
            skip = response.data.skip;
            pages = response.data.pages;
            total = response.data.total;
            selectedDate = response.data.date;

            const imgUrl = window.location.origin + '/storage/';
            document.querySelector('.schedule-casts').innerHTML = casts.map(cast => {
                let attendanceStartTime = '';
                let attendanceEndTime = '';
                // console.log(cast);
                const attendance = attendances.find(attendance => attendance.cast_id === cast.id);
                // console.log('attendance:', attendance);
                let reservationHTML = '';
                if (attendance) {
                    attendanceStartTime = attendance.start_datetime;
                    attendanceEndTime = attendance.end_datetime;
                    attendanceStartTime = convertDateTimeToTime(attendanceStartTime);
                    attendanceEndTime = convertDateTimeToTime(attendanceEndTime);

                    const reservationTimes = reservations.filter(reservation => reservation.attendance_id === attendance.id);
                    console.log({reservationTimes});
                    if (reservationTimes.length > 0) {
                        reservationTimes.forEach(reservation => {
                            const reservationStartTime = convertDateTimeToTime(reservation.start_time);
                            const reservationEndTime = convertDateTimeToTime(reservation.end_time);
                            const newForm = document.createElement('div');
                            newForm.className = 'schedule-form registered';
                            newForm.innerHTML = `
                                <input type="hidden" id="reservation-id" class="reservation-id" value="${reservation.id}">
                                <button class="delete-form-btn">×</button>
                                <div class="form-time-selector">
                                    <select class="form-start-time">
                                        ${generateTimeOptions(reservationStartTime)}
                                    </select>
                                    <span class="form-time-separator">～</span>
                                    <select class="form-end-time">
                                        ${generateTimeOptions(reservationEndTime)}
                                    </select>
                                </div>
                                <button class="register-btn registered">登録済</button>
                            `;

                            reservationHTML += newForm.outerHTML;
                        });
                        for ( var i = 0 ; i < ( 10 - reservationTimes.length ) ; i++ ){
                            reservationHTML += `<div class="add-form-btn">＋</div>`;
                        }
                    }else{
                        reservationHTML = `
                            <div class="add-form-btn">＋</div>
                            <div class="add-form-btn">＋</div>
                            <div class="add-form-btn">＋</div>
                            <div class="add-form-btn">＋</div>
                            <div class="add-form-btn">＋</div>
                            <div class="add-form-btn">＋</div>
                            <div class="add-form-btn">＋</div>
                            <div class="add-form-btn">＋</div>
                            <div class="add-form-btn">＋</div>
                            <div class="add-form-btn">＋</div>
                        `;
                    }
                }else{
                    reservationHTML = `
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                    `;

                }
                return `
                <div class="schedule-cast-section">
                    <div class="schedule-row">
                        <div class="cast-info">
                            <img class="cast-image" src="${cast.gallery_1 ? imgUrl + cast.gallery_1 : 'https://placehold.jp/100x130.png'}" alt="${cast.name}">
                            <div class="cast-name">${cast.name}</div>
                            <input type="hidden" id="cast-id" class="cast-id" value="${cast.id}">
                        </div>
                        <div class="schedule-area">
                            <div class="time-selector" style="display: none">
                                ${attendance ? `<input type="hidden" id="attendance-id" class="attendance-id" value="${attendance.id}">` : `<input type="hidden" id="attendance-id" class="attendance-id" value="">`}
                                <select class="start-time">
                                    ${generateTimeOptions(attendanceStartTime)}
                                </select>
                                <span class="time-separator">-</span>
                                <select class="end-time">
                                    ${generateTimeOptions(attendanceEndTime)}
                                </select>
                                <select class="visibility-status" id="is_public">
                                    <option value="1" ${attendance && attendance.is_public == '1' ? 'selected' : ''}>公開</option>
                                    <option value="0" ${attendance && attendance.is_public == '0' ? 'selected' : ''}>非公開</option>
                                </select>
                            </div>
                            <div class="time-axis">
                                <div class="time-axis-spacer"></div>
                                <div class="time-axis-labels">
                                    ${generateTimeAxisLabels()}
                                </div>
                            </div>
                            <div class="time-grid">
                                <div class="grid-spacer"></div>
                                <div class="grid-cells">
                                    ${generateTimeGridCells()}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="schedule-row">
                        <div class="reservation-info">
                            <div class="reservation-title">予約情報</div>
                            <div class="reservation-content">（ここに予約情報を表示）</div>
                        </div>
                        <div class="schedule-form-area">
                            <div class="schedule-forms">
                                ${reservationHTML}
                            </div>
                        </div>
                    </div>

                </div>
            `;
            }).join('');

            await reDrawScheduleCasts();


            return {page, limit, skip, pages, total,selectedDate};
            // window.scrollTo({top:0, behavior: 'smooth'});
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

function generateScheduleCastsPagination(page_l, limit_l, skip_l, pages_l, total_l,date_l){
    let paginationHTML = '';
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
    console.log({start});
    console.log({end});
    console.log({page_l});
    for ( var i = start ; i <= end ; i++ ){
        if ( i === page_l ){
            paginationHTML += `<span class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 bg-gray-100 dark:bg-gray-800 dark:text-white">${i}</span>`;
        }else{
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
        paginationHTML += `<button class=" pagination flex items-center justify-center w-10 h-10 border-l border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800" data-date="${date_l}" data-page="${page_l + 1}" data-limit="${limit_l}" data-skip="${skip_l}" data-pages="${pages_l}" data-total="${total_l}"><svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"></path>
        </svg></button>`;
    }else{
        paginationHTML += `<span class="flex items-center justify-center w-10 h-10"><svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
        </svg></span>`;
    }
    document.querySelector('.pagination-container').innerHTML = `<div class="pagination-button">${paginationHTML}</div></div>`;
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
            await getCastsSchedule(castName, shop, is_public, selectedDate, page, limit, skip, pages, total);
            await generateScheduleCasts();
            await generateScheduleCastsPagination(page, limit, skip, pages, total,selectedDate);
        });
    });

}

document.querySelector('#search_form').addEventListener('submit', async function(e){
    e.preventDefault();
    console.log('submit');
    console.log(e.target);
    shop = e.target.shop? e.target.shop.value : '';
    // is_public = e.target.public.value;
    castName = e.target.cast.value;
    page = 1;
    await getCastsSchedule(castName,shop,is_public,selectedDate, page, limit, skip, pages, total);
    await generateScheduleCasts();
    console.log({pages});
    await generateScheduleCastsPagination(page, limit, skip, pages, total,selectedDate);
});
document.querySelector('#search_shop').addEventListener('change', function(e){
    e.preventDefault();
    console.log(e.target.value);
});

// document.querySelector('#search_public').addEventListener('change', function(e){
//     e.preventDefault();
//     console.log(e.target);
// });

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

async function updateReservationTime(cast_id, attendance_id, startTime_working, endTime_working, startTime_form, endTime_form, attendance_public, date) {
    try {
        // await axios.get('/sanctum/csrf-cookie', { withCredentials: true });
        const response = await axios.post('/api/schedule/updatereservation', {
            date: date,
            cast_id: cast_id,
            attendance_id: attendance_id,
            startTime_working: startTime_working,
            endTime_working: endTime_working,
            startTime_form: startTime_form,
            endTime_form: endTime_form,
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

        if (response.data.status === 'success') {
            console.log('予約更新成功:', response.data);
            return response.data.reservation_id;
        } else if (response.data.status === 'error') {
            console.log('予約更新エラー:', response.data);
            alert(response.data.message);
            return null;
        } else {
            throw new Error('予約の更新に失敗しました');
        }
    } catch (error) {
        console.error('エラーが発生しました:', error);
        if (error.response) {
            console.error('エラーレスポンス:', error.response.data);
            alert('予約の更新中にエラーが発生しました: ' + (error.response.data.message || error.message));
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
async function deleteReservationTime(reservation_id) {
    try {
        // await axios.get('/sanctum/csrf-cookie', { withCredentials: true });
        const response = await axios.post('/api/schedule/deletereservation', {
            reservation_id: reservation_id,
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

        if (response.data.status === 'success') {
            console.log('予約削除成功:', response.data);
            return;
        } else {
            throw new Error('予約の削除に失敗しました');
        }
    } catch (error) {
        console.error('エラーが発生しました:', error);
        if (error.response) {
            console.error('エラーレスポンス:', error.response.data);
            alert('予約の削除中にエラーが発生しました: ' + (error.response.data.message || error.message));
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
