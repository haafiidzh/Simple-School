<div x-data="{ openFilter: false }">
    {{-- Session Flash Message --}}
    <x-flash-message></x-flash-message>

    <div class="w-full">
        <div class="w-full bg-slate-100 rounded-xl shadow-md">
            <div class="p-2">
                <div class="p-1 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-search text-sm"></i>
                        <input placeholder="Cari Kelas..." id="search" type="text" class="text-sm p-1 rounded-md"
                            wire:model.lazy="search">
                    </div>
                    <div @click="openFilter = true"
                        class="cursor-pointer px-3 py-1 bg-white flex gap-2 items-center text-sm rounded-md shadow-sm hover:bg-slate-200 transition-all active:bg-slate-300">
                        <i class="fa-solid fa-filter text-sm"></i>
                        <span class="font-semibold tracking-wider"> Filter</span>
                    </div>

                </div>
            </div>
            <table class="w-full">
                <thead class="bg-gray-300 rounded-t-md ">
                    <th class="px-1 py-2 text-center">No.</th>
                    <th class="px-4 py-2 text-left">Nama Kelas</th>
                    <th class="px-4 py-2 text-left">Tingkat</th>
                    <th class="px-4 py-2 text-left">Jurusan</th>
                    <th class="px-4 py-2 text-left">Dibuat Pada</th>
                    <th class="px-4 py-2 text-center">Action</th>
                </thead>
                <tbody class="text-sm">
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($datas as $index => $data)
                        {{-- tanpa pagination --}}
                        {{-- <td>{{ $i++ }}</td>  --}}

                        {{-- pakai pagination --}}
                        <tr class="hover:bg-gray-200 {{ $loop->last ? '' : 'border-b border-gray-200' }}">
                            <td class="px-1 py-2 text-center">{{ $datas->firstItem() + $index }}</td>
                            <td class="px-4 py-2 text-left">{{ $data->name }}</td>
                            <td class="px-4 py-2 text-left">{{ $data->grade->grade }}</td>

                            <td class="px-4 py-2 text-left">{{ $data->major->name }}</td>
                            <td class="px-4 py-2 text-left">{{ $data->created_at->format('H.i , d M Y') }}</td>
                            <td class="px-4 py-2">
                                <div class="flex gap-2 justify-center">
                                    {{-- @can('detail-users')
                                            <a href="{{ route('administrator.users.detail', ['id' => $user->id]) }}"
                                                class="py-[0.15rem] px-[0.37rem] rounded-full border-2 border-slate-700 text-slate-700 hover:text-black hover:shadow-xl hover:bg-slate-300 hover:border-transparent transition-all active:bg-slate-400"><i
                                                    class="fa-solid fa-eye text-xs "></i></a>
                                        @endcan --}}
                                        {{-- @can('edit-users') --}}
                                            <a href="{{ route('administrator.classroom.edit', ['id' => $data->id]) }}"
                                                class="py-[0.15rem] px-[0.40rem] rounded-full border-2 border-slate-700 text-slate-700 hover:text-black hover:shadow-xl hover:bg-slate-300 hover:border-transparent transition-all active:bg-slate-400"><i
                                                    class="fa-solid fa-eye-dropper text-xs"></i></a>
                                        {{-- @endcan --}}
                                        {{-- @can('delete-users') --}}
                                            <a onclick="confirmDelete('{{ $data->id }}')"
                                                class="cursor-pointer py-[0.15rem] px-[0.40rem] rounded-full border-2 border-slate-700 text-slate-700 hover:text-black hover:shadow-xl hover:bg-slate-300 hover:border-transparent transition-all active:bg-slate-400"><i
                                                    class="fa-solid fa-trash text-xs"></i></a>
                                        {{-- @endcan --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-3">Data yang kamu cari tidak kami temukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="my-5">
            {{ $datas->links('vendor.livewire.tailwind') }}
        </div>
    </div>

    <div x-cloak 
        x-show="openFilter"
        @click.away="openFilter = false" 
        x-transition:enter="transition-transform transition-opacity duration-300"
        x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transition-transform transition-opacity duration-300"
        x-transition:leave-start="translate-x-0 opacity-100" x-transition:leave-end="translate-x-full opacity-0"
        class="fixed pt-[85px] right-0 top-0 z-20 h-full w-64">
        <div class="bg-gray-50 h-full p-5 shadow-md">
            <div class="flex justify-between items-center mb-5">
                <h2 class="text-lg text-slate-600 font-semibold">Filter</h2>
                <span @click="openFilter = false"
                    class="cursor-pointer text-slate-600 text-base w-8 h-8 rounded-full flex items-center justify-center hover:bg-white transition-colors">
                    <i class="fa-regular fa-x"></i>
                </span>
            </div>

            <div class="flex flex-col gap-5">
                <div class="flex flex-col gap-1">

                    <label class="font-semibold text-slate-600 text-sm px-2" for="grade">Tingkat</label>
                    <select class="text-sm px-2 py-2 w-full rounded-lg border-2 border-slate-600" name="grade"
                        id="grade" wire:model.defer="grade">
                        <option value="">Pilih Tingkat</option>
                        @foreach ($grades as $item)
                            <option value="{{ $item->grade }}">{{ $item->grade }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1">

                    <label class="font-semibold text-slate-600 text-sm px-2" for="major">Jurusan</label>
                    <select class="text-sm px-2 py-2 w-full rounded-lg border-2 border-slate-600" name="major"
                        id="major" wire:model.defer="major">
                        <option value="">Pilih Jurusan</option>
                        @foreach ($majors as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class=" flex flex-col gap-3 pt-5">

                    <div wire:click="resetFilter"
                        @click="openFilter = false"
                        class="cursor-pointer font-semibold py-2 text-sm rounded-lg bg-gray-200 border border-slate-600 hover:border-transparent hover:bg-gray-300 transition-colors text-slate-800">
                        <div class="flex items-center gap-2 justify-center">
                            <i class="fa-solid fa-arrow-rotate-right text-xs"></i>
                            <span>Reset Filter</span>
                        </div>
                    </div>
                    <div wire:click="filter"
                        @click="openFilter = false"
                        class="cursor-pointer font-semibold py-2 text-sm rounded-lg bg-gray-200 border border-slate-600 hover:border-transparent hover:bg-gray-300 transition-colors text-slate-800">
                        <div class="flex items-center gap-2 justify-center">
                            <i class="fas fa-search text-xs"></i>
                            <span>Terapkan</span>
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
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin Bos?',
                text: "Data tidak dapat dikembalikan setelah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('delete', id)
                }
            })
        };
    </script>
@endpush
