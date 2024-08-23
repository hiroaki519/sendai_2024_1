<x-support-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('サポート中') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">

        <div class="my-4">
            @if (!empty($post))
                
                    
                        <ul class="mb-6 bg-white border rounded-lg p-4">
    
                            
                            <li><strong>目的地の住所:</strong> {{ $post->distination_address }}</li>
                            <li><strong>今いる場所の住所:</strong> {{ $post->prefecture }} {{ $post->city }} {{ $post->current_location_address }}</li>
                            <li><strong>合流時間:</strong> {{ $post->meet_up_time }}</li>
                            <li><strong>状態:</strong> {{ $post->body_condition }}</li>
                            <li><strong>人数:</strong> {{ $post->person_number }}</li>
                            <li><strong>連絡先</strong> {{ $post->user->phone_number }}</li>
                            <li><strong>名前:</strong> {{ $post->user->name }}</li>                      
                            
                        </ul>

                        <form action="{{ route('supported') }}" method="post">
                                @csrf
                                <div class='text-right'>
                                <button type="submit" class="btn-secondary btn" onclick="return confirm('サポートを終了しますか？')">
                                    {{ __('完了') }}
                                </button>
                                </div>
                            </form>
                   
                
            @else
                <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">現在サポート中の依頼はありません。</p>
                </div>
            @endif
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('support.home') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    トップページへ戻る
                </a>
            </div>
        </div>
    </div>
</x-support-layout>
