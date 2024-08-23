<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            トップページ
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <h2>
            投稿例
        </h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white border-b border-gray-200 p-6 block w-full
            font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                <h3>
                    〇〇病院
                    <h4>
                        住所：〇〇県〇〇市〇ー〇ー〇</br>
                        合流時間：17時</br>
                        状態：歩行可能</br>
                    <h4>
                        ほげ太郎
                    </h4>
                    </h4>
                </h3>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('post.index') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    依頼を投稿する
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
