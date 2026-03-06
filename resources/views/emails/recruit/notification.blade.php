新しい応募がありました。

【応募情報】
種類: {{ $application->type === 'male' ? '男性' : '女性' }}
店舗: {{ $application->shop }}
氏名: {{ $application->name }}
フリガナ: {{ $application->furigana ?? 'N/A' }}
メール: {{ $application->email }}
電話: {{ $application->phone ?? 'N/A' }}
年齢: {{ $application->age ?? 'N/A' }}
経験: {{ $application->experience ?? 'N/A' }}
@if($application->subject)
件名: {{ $application->subject }}
@endif

【問い合わせ内容】
{{ $application->inquiry }}

応募日時: {{ $application->created_at->format('Y-m-d H:i:s') }}
