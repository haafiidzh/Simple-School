@extends('administrator.layouts.master')

@section('title')
    Siswa    
@endsection

@section('content')
    <x-breadcrumb :items="[
                ['title' => 'Siswa', 'route' => 'administrator.student'],
                ['title' => 'Detail'],
            ]" />
    <div class="mb-7 py-3 flex justify-between">
        <h1 class="font-bold text-3xl">Detail</h1>
        {{-- @can('view-users') --}}
        <button onclick="window.history.back()"
            class="px-2 py-2 rounded-md flex items-center text-slate-700 font-medium border-2 border-black hover:bg-white hover:text-black hover:border-transparent hover:shadow-md active:bg-slate-300 transition-all">
            <i class="text-xs fa-solid fa-arrow-left"></i> &nbsp; Kembali
        </button>
        {{-- @endcan --}}
    </div>

    <livewire:administrator.student.detail :classroomId="$classroomId" :studentId="$studentId" />
@endsection
