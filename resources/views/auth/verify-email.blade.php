<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('ご登録ありがとうございます。開始する前に、メールでお送りしたリンクをクリックし、メールアドレスを確認していただけますか？メールが届かない場合は、喜んで別のメールをお送りします。') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('登録時に指定されたEメールアドレスに、新しい確認リンクが送信されました。') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('確認メールを再送') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('ログアウト') }}
            </button>
        </form>
    </div>
</x-guest-layout>
