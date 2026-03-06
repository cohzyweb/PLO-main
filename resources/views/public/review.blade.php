<x-mypage-layout>
  <div class="review-container">
      <div class="max-w-2xl mx-auto p-4 bg-white border rounded shadow mt-6">
      <form x-data="reviewForm()" @submit.prevent="submitReview">
          <div class="flex items-center mb-4">
            <label class="w-32 font-semibold text-sm">遊んだ女の子</label>
            <label class="flex items-center mr-2">{{ $cast->name }}</label>

          </div>
          
          <!-- 女の子満足度 -->
          <div class="flex items-center mb-4">
              <label class="w-32 font-semibold text-sm">女の子満足度</label>
              <div class="flex items-center mr-2">
                  <template x-for="i in 5" :key="'girl-'+i">
                      <span
                          @click="castPoint = i"
                          :class="castPoint >= i ? 'text-red-400' : 'text-gray-300'"
                          class="text-2xl cursor-pointer select-none"
                          >★</span>
                  </template>
              </div>
              <select class="w-40 ml-2 border rounded px-2 py-1 text-sm" x-model.number="castPoint">
                  <option value="1">1.0 微妙</option>
                  <option value="2">2.0 まあまあ</option>
                  <option value="3">3.0 まあ普通</option>
                  <option value="4">4.0 良かった</option>
                  <option value="5">5.0 最高</option>
              </select>
          </div>
          <!-- プレイ満足度 -->
          <div class="flex items-center mb-4">
              <label class="w-32 font-semibold text-sm">プレイ満足度</label>
              <div class="flex items-center mr-2">
                  <template x-for="i in 5" :key="'play-'+i">
                      <span
                          @click="playPoint = i"
                          :class="playPoint >= i ? 'text-red-400' : 'text-gray-300'"
                          class="text-2xl cursor-pointer select-none"
                          >★</span>
                  </template>
              </div>
              <select class="w-40 ml-2 border rounded px-2 py-1 text-sm" x-model.number="playPoint">
                  <option value="1">1.0 微妙</option>
                  <option value="2">2.0 まあまあ</option>
                  <option value="3">3.0 満足できた</option>
                  <option value="4">4.0 良かった</option>
                  <option value="5">5.0 最高</option>
              </select>
          </div>
          <!-- 料金納得度 -->
          <div class="flex items-center mb-4">
              <label class="w-32 font-semibold text-sm">料金納得度</label>
              <div class="flex items-center mr-2">
                  <template x-for="i in 5" :key="'price-'+i">
                      <span
                          @click="pricePoint = i"
                          :class="pricePoint >= i ? 'text-red-400' : 'text-gray-300'"
                          class="text-2xl cursor-pointer select-none"
                          >★</span>
                  </template>
              </div>
              <select class="w-40 ml-2 border rounded px-2 py-1 text-sm" x-model.number="pricePoint">
                  <option value="1">1.0 微妙</option>
                  <option value="2">2.0 まあまあ</option>
                  <option value="3">3.0 妥当だと思う</option>
                  <option value="4">4.0 安い</option>
                  <option value="5">5.0 最高</option>
              </select>
          </div>
          <!-- スタッフ対応度 -->
          <div class="flex items-center mb-4">
              <label class="w-32 font-semibold text-sm">スタッフ対応度</label>
              <div class="flex items-center mr-2">
                  <template x-for="i in 5" :key="'stuff-'+i">
                      <span
                          @click="stuffPoint = i"
                          :class="stuffPoint >= i ? 'text-red-400' : 'text-gray-300'"
                          class="text-2xl cursor-pointer select-none"
                          >★</span>
                  </template>
              </div>
              <select class="w-40 ml-2 border rounded px-2 py-1 text-sm" x-model.number="stuffPoint">
                  <option value="1">1.0 微妙</option>
                  <option value="2">2.0 まあまあ</option>
                  <option value="3">3.0 特に問題なし</option>
                  <option value="4">4.0 良かった</option>
                  <option value="5">5.0 最高</option>
              </select>
          </div>
          <!-- 写真信頼度 -->
          <div class="flex items-center mb-4">
              <label class="w-32 font-semibold text-sm">写真信頼度</label>
              <div class="flex items-center mr-2">
                  <template x-for="i in 5" :key="'photo-'+i">
                      <span
                          @click="photoPoint = i"
                          :class="photoPoint >= i ? 'text-red-400' : 'text-gray-300'"
                          class="text-2xl cursor-pointer select-none"
                          >★</span>
                  </template>
              </div>
              <select class="w-40 ml-2 border rounded px-2 py-1 text-sm" x-model.number="photoPoint">
                  <option value="1">1.0 微妙</option>
                  <option value="2">2.0 まあまあ</option>
                  <option value="3">3.0 許容範囲</option>
                  <option value="4">4.0 良かった</option>
                  <option value="5">5.0 最高</option>
              </select>
          </div>
          <!-- 評価点 (Average) -->
          <div class="flex items-center mb-4">
              <label class="w-32 font-semibold text-sm">評価点</label>
              <div class="flex items-center mr-2">
                  <template x-for="i in 5" :key="'avg-'+i">
                      <span
                          :class="averagePoint >= i ? 'text-orange-400' : 'text-gray-300'"
                          class="text-2xl select-none"
                          >★</span>
                  </template>
              </div>
              <span class="ml-2 text-2xl font-bold text-orange-500" x-text="averagePoint.toFixed(1)"></span>
          </div>

          <input type="text"
                 x-model="title"
                 maxlength="32"
                 placeholder="タイトルを入力してください（32文字以下）"
                 class="w-full border border-solid rounded px-2 py-1 mb-2 text-sm" />
          <div x-show="errors.title" class="text-red-500 text-sm mt-1" x-text="errors.title"></div>

          <textarea
              x-model="content"
              rows="5"
              maxlength="2000"
              placeholder="・初めて利用する方は参考です。\n・スタッフの対応がとても親切で助かりました。\n・この方が新人講習してるとても安心できました。\n・スライム体験が思ったほどはっきりしません。\n・次回も指名で参加したいです。\n・お得なイベントで本当に楽しかった。\n（200文字以上 2000文字以下）"
              class="w-full border border-solid rounded px-2 py-1 text-sm"
              :class="{'border-red-500': errors.content}"></textarea>
          <div class="text-right text-xs text-gray-500 mt-1" x-text="`現在${content.length}文字`"></div>

          <!-- エラーメッセージ表示エリア -->
          <div x-show="errors.content" class="text-red-500 text-sm mt-1" x-text="errors.content"></div>

          <div class="flex justify-center mt-6">
              <button type="submit"
                      class="border border-red-400 text-red-500 rounded-full px-8 py-2 text-sm hover:bg-red-50"
                      :disabled="isSubmitting">
                  <span x-show="!isSubmitting">ガイドラインに同意して投稿する</span>
                  <span x-show="isSubmitting">送信中...</span>
              </button>
          </div>
      </form>
</div>
  </div>
</x-mypage-layout>
@once
@vite(['resources/scss/review.scss'])
@endonce
<script>
const token = '{{ $token }}';
const member = @json($member);
const history_id = '{{ $history_id }}';

function reviewForm() {
  return {
      castPoint: 3,
      playPoint: 3,
      pricePoint: 3,
      stuffPoint: 3,
      photoPoint: 3,
      title: '',
      content: '',
      errors: {},
      isSubmitting: false,

      get averagePoint() {
          return (
              (this.castPoint +
              this.playPoint +
              this.pricePoint +
              this.stuffPoint +
              this.photoPoint) / 5
          );
      },

      validate() {
          this.errors = {};

          if (!this.title.trim()) {
              this.errors.title = 'タイトルを入力してください';
          } else if (this.title.length > 32) {
              this.errors.title = 'タイトルは32文字以下で入力してください';
          }

          if (!this.content.trim()) {
              this.errors.content = 'レビュー内容を入力してください';
          } else if (this.content.length < 200) {
              this.errors.content = '200文字以上入力してください';
          } else if (this.content.length > 2000) {
              this.errors.content = '2000文字以下で入力してください';
          }

          return Object.keys(this.errors).length === 0;
      },

      async submitReview() {
          if (!this.validate()) {
              return;
          }

          this.isSubmitting = true;

          try {
              const response = await fetch('/api/review/create', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                      'Accept': 'application/json',
                      'X-Requested-With': 'XMLHttpRequest',
                      'Authorization': `Bearer ${token}`
                  },
                  body: JSON.stringify({
                      title: this.title,
                      content: this.content,
                      cast_point: this.castPoint,
                      play_point: this.playPoint,
                      price_point: this.pricePoint,
                      stuff_point: this.stuffPoint,
                      photo_point: this.photoPoint,
                      average_point: this.averagePoint,
                      member_id: member.id,
                      history_id: history_id
                  })
              });

              if (!response.ok) {
                  throw new Error('レビューの投稿に失敗しました');
              }

              // 成功時の処理
              window.location.href = '/mypage'; // マイページにリダイレクト
          } catch (error) {
              alert('エラーが発生しました。もう一度お試しください。');
              console.error('Review submission error:', error);
          } finally {
              this.isSubmitting = false;
          }
      }
  }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
