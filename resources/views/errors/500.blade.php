<x-error-layout>
<div class="error-page">
  <div class="error-page__content">
    <h1 class="error-page__title">500</h1>
    <p class="error-page__text">サーバーエラーが発生しました</p>
    <p class="error-page__description">
      申し訳ありませんが、サーバーでエラーが発生しました。<br>
      しばらく時間をおいて再度アクセスしてください。<br>
      問題が解決しない場合は、管理者にお問い合わせください。
    </p>
    <a href="{{ route('public.group.home') }}" class="error-page__link">トップページに戻る</a>
  </div>
</div>
</x-error-layout>
