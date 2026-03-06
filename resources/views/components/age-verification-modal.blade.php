@props(['id' => 'age-verification-modal'])

<div id="{{ $id }}" class="age-verification-modal" style="display: none;">
    <div class="age-verification-overlay"></div>
    <div class="age-verification-content">
        <div class="age-verification-header">
            <div class="age-verification-logo">
                <img src="{{ asset('assets/img/age.png') }}" alt="年齢確認ロゴ">
            </div>
            {{-- <h2 class="age-verification-title">年齢確認</h2> --}}
        </div>
        <div class="age-verification-body">
            <div class="age-verification-message">
                <p>このサイトは風俗サイトです</p>
                <p>18歳未満の方はEXITへ</p>
            </div>
            <div class="age-verification-buttons">
                <button type="button" class="age-verification-btn age-verification-btn-yes" onclick="confirmAge(true)">
                    ENTER
                </button>
                <button type="button" class="age-verification-btn age-verification-btn-no" onclick="confirmAge(false)">
                    EXIT
                </button>
            </div>
        </div>
    </div>
</div>
@once
  @vite('resources/scss/global/age.scss')
@endonce

<script>
function confirmAge(isAdult) {
    const modal = document.getElementById('{{ $id }}');

    // return false;
    if (isAdult) {
        // 18歳以上の場合
        // localStorage.setItem('ageVerified', 'true');
        sessionStorage.setItem('ageVerified', 'true');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    } else {
        // 18歳未満の場合
        alert('申し訳ございませんが、18歳未満の方はご利用いただけません。');
        window.location.href = 'https://www.google.com';
    }
}

// ページ読み込み時に年齢確認をチェック
document.addEventListener('DOMContentLoaded', function() {
    // const ageVerified = localStorage.getItem('ageVerified');
    const ageVerified = sessionStorage.getItem('ageVerified');
    const modal = document.getElementById('{{ $id }}');

    if (!ageVerified || ageVerified == 'false') {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
});
// マウスのダブルクリックを無効化
// document.addEventListener('dblclick', function(e) {
//     e.preventDefault();
//     if (e.target.classList.contains('age-verification-btn')) {
//         return;
//     }
//     const modal = document.getElementById('{{ $id }}');
//     sessionStorage.setItem('ageVerified', 'true');
//     modal.style.display = 'none';
//     document.body.style.overflow = 'auto';

// }, { passive: false });

</script>