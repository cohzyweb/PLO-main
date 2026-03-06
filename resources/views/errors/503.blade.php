<x-error-layout>

<div class="error-page">
  <div class="error-page__content">
    <h1 class="error-page__title">503</h1>
    <p class="error-page__text">メンテナンス中です</p>
    <p class="error-page__description">
      申し訳ありませんが、現在システムのメンテナンスを行っています。<br>
      しばらく時間をおいて再度アクセスしてください。<br>
      ご不便をおかけして申し訳ございません。
    </p>
    <a href="{{ route('public.group.home') }}" class="error-page__link">トップページに戻る</a>
  </div>
</div>

</x-error-layout>
