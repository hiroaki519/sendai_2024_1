<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規投稿') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        <div class="my-4">
            <div class="bg-white shadow p-6 rounded-lg">
                <form action="{{ route('post.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="distination_address" :value="__('目的地の住所')"/> 
                        <x-text-input type="text" name="distination_address" id="distination_address" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required/>
                        <x-input-error :messages="$errors->get('distination_address')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="prefecture" :value="__('現在の住所 都道府県')" />
                        <x-text-input type="text" name="prefecture" id="prefecture" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required/>
                        <x-input-error :messages="$errors->get('prefecture')" class="mt-2" />
                    </div>                    
                    <div class="mb-4">
                        <x-input-label for="city" :value="__('市区町村')" />
                        <x-text-input type="text" name="city" id="city" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required/>
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="current_location_address" :value="__('それ以降')" />
                        <x-text-input type="text" name="current_location_address" id="current_location_address" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required/>
                        <x-input-error :messages="$errors->get('current_location_address')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="meet_up_time" :value="__('合流時間')" />
                        <x-text-input type="datetime-local" name="meet_up_time" id="meet_up_time" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required/>
                        <x-input-error :messages="$errors->get('meet_up_time')" class="mt-2" />
                    </div>                    
                    <div class="mb-4">
                        <x-input-label for="body_condition" :value="__('状態')"/>
                        <x-text-input type="text" name="body_condition" id="body_condition" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required/>
                        <x-input-error :messages="$errors->get('body_condition')" class="mt-2" />
                    </div>                    
                    <div class="mb-4">
                        <x-input-label for="person_number" :value="__('人数')"/>
                        <x-text-input type="number" name="person_number" id="person_number" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required/>
                        <x-input-error :messages="$errors->get('person_number')" class="mt-2" />
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="py-2 px-4 btn btn-primary">投稿する</button>
                        <a href="{{ route('post.index') }}" class="py-2 px-4 ml-4 btn btn-secondary">キャンセル</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
