import axios from 'axios'

let shop = '';
let is_public = '';
let selectedDate = '';
let dragSrcEl;

if (document.querySelector('#search_form_shop')) {
    shop = document.querySelector('#search_form_shop').value;

    document.querySelector('#search_form_shop').addEventListener('change', async (e) => {
        e.preventDefault();
        shop = e.target.value;
        await getCastsSchedule(shop,is_public,selectedDate);
    });
}

console.log(window.apiToken);

document.addEventListener('DOMContentLoaded', async function() {
    // 日付ナビゲーション機能
    const scheduleDate = document.querySelector('.schedule-date');

    // 初期表示
    await getCastsSchedule(shop, is_public, selectedDate);

    const container = document.querySelector('.sort-cast-container');
    container.addEventListener('dragover', (e) => e.preventDefault());
    container.addEventListener('drop', async (e) => {
        e.preventDefault();
        if (!dragSrcEl) return;
        
        const isDroppedOnCard = e.target.closest('.cast-card');
        
        if (!isDroppedOnCard) {
            container.appendChild(dragSrcEl);
            const response = await updateCastRanking();
        }
    });
});

function convertDateTimeToTime(dateTime) {
    const date = new Date(dateTime);
    return date.toLocaleTimeString('ja-JP', { hour: '2-digit', minute: '2-digit', hour12: false , hourCycle: 'h23' , separator: ':'});
}

async function updateCastRanking() {
    try {
        const allCastRanking = [];
        document.querySelectorAll('.cast-card').forEach((card, index) => {
            allCastRanking.push({
                id: card.dataset.id,
                rank: index + 1
            })
        })

        // await axios.get('/sanctum/csrf-cookie', { withCredentials: true });
        const response = await axios.post('/api/cast/updateranking', {
            allCastRanking
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
            document.querySelectorAll('.cast-card').forEach((card, index) => {
                card.querySelector("input").value = index + 1
            })
            return response.data;
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

/*
* キャストの出勤・予約を取得する関数
* @param {string} date - 日付
*/
async function getCastsSchedule(shop, is_public, date_l) {
    try {
        console.log('リクエストパラメータ:', {
            shop,
            is_public,
            date_l,
        });
        // await axios.get('/sanctum/csrf-cookie', { withCredentials: true });
        const response = await axios.post('/api/cast/sorted', {
            shop: shop,
            public: is_public,
            date: date_l,
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

            const imgUrl = window.location.origin + '/storage/';
            document.querySelector('.sort-cast-container').innerHTML = casts.map((cast, index) => {
                return `
                    <div class="cast-card" draggable="true" data-id="${cast.id}" data-rank="${cast.rank ? cast.rank : index + 1}">
                        <div class="cast-rank">
                            <input draggable="false" name=${cast.name} type="number" value=${cast.rank ? cast.rank : index + 1} />
                            <a href="/admin/cast/${cast.id}?redirect=/admin/cast/sort" class="btn-edit">
                                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z" fill=""></path>
                                </svg>
                                詳細
                            </a>
                        </div>
                        <div class="cast-info">
                            <div class="cast-avatar">
                                <img src=${imgUrl + cast.gallery_1} />
                            </div>
                            <div class="cast-detail">
                                <p class="cast-name">${cast.name}</p>
                                <p class="cast-joined-at">${cast.joined_at}</p>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');

            document.querySelectorAll('.cast-card').forEach(card => {
                const rankInput = card.querySelector("input");
                rankInput.addEventListener('change', async (e) => {
                    let dstCardNo = parseInt(e.target.value, 10) - 1;
                    const container = card.parentElement;
                    const cards = Array.from(container.querySelectorAll('.cast-card'));
                    const currentIdx = cards.indexOf(card);

                    if (dstCardNo >= 0) {
                        if (dstCardNo == currentIdx) {
                            return
                        }
                        if (dstCardNo > cards.length - 1) {
                            dstCardNo = cards.length - 1; 
                        }
                        // Remove the card from its current position
                        container.removeChild(card);
                        // Insert the card at the new position
                        if (dstCardNo > cards.length - 1) {
                            container.appendChild(card);
                        } else {
                            if (dstCardNo > currentIdx) {
                                container.insertBefore(card, cards[dstCardNo + 1]);
                            } else {
                                container.insertBefore(card, cards[dstCardNo]);
                            }
                        }
                        
                        const response = await updateCastRanking();
                    } else {
                        rankInput.value = parseInt(card.dataset.rank);
                        return
                    }
                })
                rankInput.addEventListener('mousedown', (e) => {
                    e.stopPropagation();
                });
                rankInput.addEventListener('dragstart', (e) => {
                    e.preventDefault();
                });

                card.addEventListener('dragstart', (e) => {
                    const { clientX, clientY } = e;
                    const el = document.elementFromPoint(clientX, clientY);
                    if (el && el.tagName === 'INPUT') {
                        e.preventDefault();
                        return;
                    }
                    dragSrcEl = e.target.closest(".cast-card");
                    dragSrcEl.classList.add('dragging');
                });

                card.addEventListener('dragend', (e) => {
                    e.target.closest(".cast-card").classList.remove('dragging');
                });

                card.addEventListener('dragover', (e) => {
                    e.preventDefault();
                });

                card.addEventListener('drop', async (e) => {
                    e.preventDefault();
                    const dragDstEl = e.target.closest(".cast-card");
                    if (dragSrcEl !== dragDstEl) {
                        if (
                            dragSrcEl.nextSibling === dragDstEl ||
                            dragDstEl.nextSibling === dragSrcEl
                        ) {
                            const parent = dragDstEl.parentNode;
                            if (dragSrcEl.nextSibling === dragDstEl) {
                                parent.insertBefore(dragDstEl, dragSrcEl);
                            } else {
                                parent.insertBefore(dragSrcEl, dragDstEl);
                            }
                        } else {
                            if (dragDstEl.nextSibling) {
                                if (dragSrcEl.compareDocumentPosition(dragDstEl) & Node.DOCUMENT_POSITION_FOLLOWING) {
                                    dragDstEl.parentNode.insertBefore(dragSrcEl, dragDstEl.nextSibling);
                                } else {
                                    dragDstEl.parentNode.insertBefore(dragSrcEl, dragDstEl);
                                }
                            } else {
                                dragDstEl.parentNode.appendChild(dragSrcEl);
                            }
                        }

                        const response = await updateCastRanking();
                    }
                });
            });

            document.querySelectorAll('.cast-card').forEach((card, index) => {
                card.querySelector("input").value = index + 1
            })
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

