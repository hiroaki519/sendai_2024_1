<x-guest-layout>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            どちらで利用しますか？
        </h1>

    <div class="flex flex-col items-center py-12 space-y-4">
        <!-- 高齢者 ボタン -->
                <a href="{{ route('register') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    高齢者
                </a>
        
        <!-- サポーター ボタン -->
                <a href="{{ route('support.register') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    サポーター
                </a>
    
    </div>
</x-guest-layout>
