<div>
    <div class="w-full">
        <div class="flex-grow">
            <div class="bg-white rounded-lg">
                <h2 class="px-8 pt-4 text-xl font-semibold text-slate-800 tracking-wider">Overview</h2>
                <div class="p-6 grid grid-cols-3 gap-6">
                    <a href="{{ route('administrator.teacher') }}">
                        <div class="group cursor-pointer bg-gray-200 hover:bg-green-300 hover:shadow-sm py-3 px-5 flex gap-4 rounded-lg items-center transition-colors duration-300">
                            <div class="w-14 h-14 group-hover:bg-white bg-green-300 flex items-center justify-center rounded-md transition-colors duration-300">
                                <i class="fa-solid fa-user fa-lg text-black"></i>
                            </div>
                            <div class="flex flex-grow justify-between">
                                <h3 class="font-semibold text-xl">Guru</h3>
                                <p class="text-lg">{{ $teachers }}</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="{{ route('administrator.classroom') }}">
                        <div class="group cursor-pointer bg-gray-200 hover:bg-indigo-300 hover:shadow-sm py-3 px-5 flex gap-4 rounded-lg items-center transition-colors duration-300">
                            <div class="w-14 h-14 group-hover:bg-white bg-indigo-300 flex items-center justify-center rounded-md transition-colors duration-300">
                                <i class="fa-solid fa-shapes fa-lg text-black"></i>
                            </div>
                            <div class="flex flex-grow justify-between">
                                <h3 class="font-semibold text-xl">Kelas</h3>
                                <p class="text-lg">{{ $classrooms }}</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="{{ route('administrator.student') }}">
                        <div class="group cursor-pointer bg-gray-200 hover:bg-blue-300 hover:shadow-sm py-3 px-5 flex gap-4 rounded-lg items-center transition-colors duration-300">
                            <div class="w-14 h-14 group-hover:bg-white bg-blue-300 flex items-center justify-center rounded-md transition-colors duration-300">
                                <i class="fa-solid fa-graduation-cap fa-lg text-black"></i>
                            </div>
                            <div class="flex flex-grow justify-between">
                                <h3 class="font-semibold text-xl">Siswa</h3>
                                <p class="text-lg">{{ $students }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
