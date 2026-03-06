<x-error-layout>
<div class="error-page">
  <div class="error-page__content">
    <h1 class="error-page__title">403</h1>
    <p class="error-page__text">アクセス権限がありません</p>
    <p class="error-page__description">
      申し訳ありませんが、このページにアクセスする権限がありません。<br>
      お探しのページが見つからない場合は、以下のリンクからログインページに戻ることができます。
    </p>
    <a href="{{ route('admin.login') }}" class="error-page__link">ログインページに戻る</a>
  </div>
</div>
</x-error-layout>
