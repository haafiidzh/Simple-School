@extends('administrator.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
<div x-data="{greetings: true}">
    <div class="w-full mb-4"
    x-cloak
    x-show="greetings">
        <div class="flex-grow">
            <div class="bg-white rounded-lg">
                <div class="flex justify-between items-center px-8 pt-4">
                    <h2 class=" text-xl font-semibold text-slate-800 tracking-wider">Selamat {{ $time }}, {{ Auth::user()->name }}👋</h2>
                    <span @click="greetings=false" class="cursor-pointer rounded-md flex w-10 h-10 justify-center items-center border border-transparent hover:border-black/50 hover:bg-gray-200 transition-colors">
                        <i  class="fa-regular fa-x"></i>
                    </span>
                </div>
                <p class="px-8 pt-3 pb-5 font-semibold text-gray-600">Sudah siap untuk bekerja hari ini? Semoga harimu menyenangkan!</p>
            </div>
        </div>
    </div>
    <livewire:administrator.dashboard.overview />
</div>
@endsection
