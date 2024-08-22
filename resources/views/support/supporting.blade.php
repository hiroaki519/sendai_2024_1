<x-support-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('サポート中') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">

        <div class="my-4">
            @if (!empty($post))
                <ul>
                    
                        <li class="mb-6 bg-white border rounded-lg p-4">
    
                            
                            <div class="flex justify-between mt-8">
                            <br><strong>現在の住所:</strong> {{ $post->prefecture }} {{ $post->city }}</p>
                            <p><strong>それ以降:</strong> {{ $post->current_location_address }}</p>
                            <p><strong>合流時間:</strong> {{ $post->meet_up_time }}</p>
                            <p><strong>状態:</strong> {{ $post->body_condition }}</p>
                            <p><strong>人数:</strong> {{ $post->person_number }}</p>
                            </div>
                            <form action="{{ route('support.home') }}">
                                @csrf
                                <button type="submit" class="btn-danger" onclick="return confirm('サポートを終了しますか？')">
                                    {{ __('完了') }}
                                </button>
                            </form>
                        </li>
                   
                </ul>
            @else
                <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">投稿はありません。</p>
                </div>
            @endif
        </div>
    </div>
</x-support-layout>
