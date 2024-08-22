<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            承諾
        </h2>
    </x-slot>
    <h2 class = "mu-10">
        進行中の投稿
    </h2>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 p-6 block w-full
        font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
            <h3>
                <h4>
                    住所：{{ $post->distination_address }}</br>
                    合流時間：{{ $post->meet_up_time}}</br>
                    状態：{{ $post->body_condition }}</br>
                <h4>
                
                </h4>
                </h4>
            </h3>
        </div>
    </div>

    <div style="background-color: black; 
  width: 40px;
  height: 30px;
  clip-path: polygon(0 0, 100% 0%, 50% 100%);
  margin: 20px auto;"></div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h4>
              {{ $post->supportUser->name }}</br>
              </br>連絡先</br>
              {{ $post->supportUser->phone_number }}
              
            </h4>
            </div>
        </div>
    </div>
</x-app-layout>
