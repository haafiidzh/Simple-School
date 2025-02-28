<div x-cloak :class="isOpen ? 'ml-52' : 'ml-20'" class="flex-grow transition-all duration-300 sticky top-0 z-30 bg-white">
    <div class=" shadow-md flex justify-between ">
        <div class="pl-4 flex items-center">
            <div @click="isOpen = !isOpen"
                class="cursor-pointer h-10 w-10  flex items-center justify-center rounded-full hover:bg-slate-200 active:bg-slate-400 transition-all duration-300">
                <i class="fa-solid fa-bars fa-lg text-gray-700"></i>
            </div>
        </div>
        <div x-data="{ open: false }">
            <div class="flex items-center">
                {{-- <div class="flex items-center px-4 border-r-2 h-full">
                    <a href="#"><i class="text-2xl fa-regular fa-bell"></i></a>
                </div> --}}
                <div class="my-3 flex px-4 gap-4">
                    <div class="relative py-2 flex flex-col">
                        <div class="text-md text-center border-b-[1px] font-semibold text-slate-800 border-gray-700">
                            <span>Hi, {{ Auth::user()->name }}</span>
                        </div>
                        <span class="text-center text-sm text-slate-600">
                            {{-- {{ Auth::user()->roles->first()->name }} --}}
                            Admin
                        </span>
                        <div x-show="open" 
                            x-cloak
                            x-transition:enter="transition translate-y-0 ease-out duration-100"
                            x-transition:enter-start="opacity-0 -bottom-10"
                            x-transition:enter-end="opacity-100 bottom-0 "
                            x-transition:leave="transition translate-y-0 ease-in duration-100"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            @click.away="open = false">

                            <div class="absolute mt-6 -ml-10 w-40 rounded-md flex-col text-sm bg-white shadow-md">
                                {{-- <a wire:navigate href="{{ route('administrator.profile') }}">
                                    <div
                                        class="px-4 py-3 flex gap-2 rounded items-center hover:bg-slate-200 transition-all active:bg-gray-400">
                                        <i class="fa-solid fa-user"></i>
                                        <span>
                                            Profile
                                        </span>
                                    </div>
                                </a> --}}
                                <div onclick="confirmLogout()"
                                    class="px-4 py-3 flex gap-2 rounded cursor-pointer items-center hover:bg-gray-200 transition-all active:bg-gray-400">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span>
                                        Log Out
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div @click="open = !open" class="flex items-center">
                        <div
                            class="w-12 h-12 mr-1 text-xl font-medium flex items-center justify-center rounded-full shadow-sm bg-gray-300 cursor-pointer">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ count(explode(' ', Auth::user()->name)) > 1 ? strtoupper(substr(last(explode(' ', Auth::user()->name)), 0, 1)) : '' }}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmLogout(id) {
            Swal.fire({
                title: 'Logout',
                text: "Anda yakin ingin keluar?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Keluar',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('logout', id);
                }
            })
        };
    </script>
@endpush
