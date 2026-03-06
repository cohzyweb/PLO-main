<x-guest-layout>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-4 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-2xl font-bold text-center mb-4">{{ __('Terms and Policy') }}</div>

            <div class="mb-4 text-sm text-gray-600">
                <p class="mb-2 font-bold">会員番号利用規約</p>
                <p class="mb-2">
                    本サービスの利用にあたり、会員番号の発行および利用に関する以下の規約に同意いただく必要があります。
                </p>
                <ul class="list-disc pl-5 mb-2 text-sm">
                    <li>会員番号は本人のみが利用でき、第三者への譲渡・貸与は禁止します。</li>
                    <li>会員番号を利用して行われた全ての行為は、会員本人の責任となります。</li>
                    <li>会員番号の不正利用が判明した場合、当社は利用停止等の措置を取ることがあります。</li>
                    <li>会員番号やパスワードの管理は会員の責任で行ってください。</li>
                    <li>規約の詳細は、当社が別途定める利用規約・プライバシーポリシーをご参照ください。</li>
                </ul>
                <p>
                    上記内容に同意の上、「同意して進む」ボタンを押してください。
                </p>
            </div>

            <form method="GET" action="{{ route('sms.verify.show') }}">
            {{-- <form method="GET" action="{{ route('register') }}"> --}}
                    @csrf
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('同意して進む') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>