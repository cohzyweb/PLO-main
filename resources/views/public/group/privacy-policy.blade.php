<x-public-front-layout>

  <!-- Main Visual -->
  <x-public.group.mv />

  <!-- privacy policy -->
  <div class="privacy-policy">
    <div class="privacy-policy-title">
      <div class="privacy-policy-title-text-en title-font front-title">
        <span>P</span><span>R</span><span>I</span><span>V</span><span>A</span><span>C</span><span>Y</span> <span>P</span><span>O</span><span>L</span><span>I</span><span>C</span><span>Y</span>
      </div>
      <h2 class="privacy-policy-title-text-ja title-font-sm">プライバシーポリシー</h2>
    </div>
    <div class="privacy-policy-content content-wrapper">
    {{-- <p style="white-space: pre-line; text-align: left; font-size: clamp(1rem, 4vw, 1.125rem); line-height: 1.75; padding: 0 1rem;"> --}}
      <div class="privacy-policy-content-title-h3">■プライバシーポリシー</div>
      本ウェブサイト（以下「当サイト」）はPLOグループ（以下「当店」）が運営しています。
      会員のみなさまに安心してご利用いただくため、個人情報の保護に関して次のとおり定めます。

      <div class="privacy-policy-content-title-h3">1. 個人情報の定義</div>
      個人情報保護法にいう「個人情報」とは、生存する個人に関する情報であり、氏名・住所・電話番号・メールアドレスなど、特定の個人を識別できるものを指します。ハンドルネームであっても、他の情報と照合することで個人を特定し得るときには個人情報として扱います。

      <div class="privacy-policy-content-title-h3">2. 取得する情報と方法</div>
      会員登録時

      ハンドルネーム

      メールアドレス

      電話番号（SMS 認証や緊急連絡に限定）

      氏名は求めていません。

      サイト利用時

      IP アドレス、端末情報、閲覧履歴など（Cookie や類似技術を通じ自動取得）

      お問い合わせフォーム等で入力された内容

      Google Analytics により収集されるアクセスログ・行動履歴

      Google マップ埋め込み時に取得される位置情報・検索履歴（Google への送信が発生）

      <div class="privacy-policy-content-title-h3">3. 利用目的</div>
      取得した情報は、以下の目的の範囲内で利用します。

      会員ログイン認証および本人確認

      予約確認や緊急連絡を含むサービス提供

      サイト機能改善のための統計分析

      広告・マーケティング効果測定（Google Analytics を使用）

      店舗案内や経路表示（Google マップを利用）

      お問い合わせ対応

      法令または公的機関からの要請への対応

      目的を超えて利用する場合には、あらかじめ本人の同意を取得します。

      <div class="privacy-policy-content-title-h3">4. 管理体制</div>
      SSL／TLS による通信の暗号化

      ファイアウォールおよびアクセス権限の最小化

      従業員に対する情報管理教育

      漏えい・滅失・毀損の防止に取り組みます。

      <div class="privacy-policy-content-title-h3">5. 第三者提供</div>
      本人の同意がある場合、または法令で許容される場合を除き、第三者に個人情報を提供しません。外部業者へ業務を委託する際は適切な監督を行います。

      <div class="privacy-policy-content-title-h3">6. Cookie と Google サービスの利用</div>
      <div class="privacy-policy-content-title-h4">6-1. Cookie 等</div>
      当サイトは利便性向上とアクセス解析のため Cookie を使用します。ブラウザ設定で Cookie を拒否できますが、ログイン等が制限される場合があります。

      <div class="privacy-policy-content-title-h4">6-2. Google Analytics</div>
      当サイトは Google Analytics を通じて利用状況を分析しています。Google が発行する Cookie により IP アドレス等が自動取得され、米国を含む Google のサーバーへ送信・保管されることがあります。Google のプライバシーポリシーおよびオプトアウト方法については Google が提供するページをご参照ください。

      <div class="privacy-policy-content-title-h4">6-3. Google マップ</div>
      店舗所在地を表示する目的で Google マップを埋め込んでいます。マップ表示中、Google は利用者の位置情報・検索クエリ等を収集する場合があります。詳細は Google のプライバシーポリシーをご確認ください。

      <div class="privacy-policy-content-title-h3">7. 未成年の利用</div>
      18歳未満の方は会員登録および利用をお断りします。年齢確認に虚偽が判明した場合、直ちに退会処理を行います。

      <div class="privacy-policy-content-title-h3">8. 開示・訂正・削除等の請求</div>
      保有個人データに関する開示・訂正・利用停止・削除の請求には、本人確認のうえ合理的な範囲で対応します。

      <div class="privacy-policy-content-title-h3">9. 改定</div>
      法令改正やサービス変更に伴い、本ポリシーを予告なく改定することがあります。重要な変更は当サイト上で告知し、継続利用された場合は変更に同意したものとみなします。

      <div class="privacy-policy-content-title-h3">10. お問い合わせ窓口</div>
      担当：個人情報保護管理者
      メール：info@plo-group.jp
      {{-- </p> --}}
    </div>
  </div>
</x-public-front-layout>
@production
  @vite('resources/scss/group/privacy.scss')
@endonce
