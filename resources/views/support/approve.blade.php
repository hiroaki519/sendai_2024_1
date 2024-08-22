<x-support-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿一覧') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">

        <div class="my-4">
            @if (!empty($posts))
                <ul>
                    @foreach ($posts as $post)
                        <li class="mb-6 bg-white border rounded-lg p-4">
                            <h3 class="text-lg font-bold mb-2 border-bottom">{{ $post->title }}</h3>
                            <p class="text-gray-1000 mt-4">{{ $post->body }}</p>
                            <div class="flex justify-between mt-8">
                            <br><strong>現在の住所:</strong> {{ $post->prefecture }} {{ $post->city }}</p>
                            <p><strong>それ以降:</strong> {{ $post->current_location_address }}</p>
                            <p><strong>合流時間:</strong> {{ $post->meet_up_time }}</p>
                            <p><strong>状態:</strong> {{ $post->body_condition }}</p>
                            <p><strong>人数:</strong> {{ $post->person_number }}</p>
                            </div>
                            <form action="{{ route('support.approve', ['id' => $post->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn-danger" onclick="return confirm('本当に承諾しますか？')">
                                    {{ __('承諾') }}
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">投稿はありません。</p>
                </div>
            @endif
        </div>
    </div>
</x-support-layout>
