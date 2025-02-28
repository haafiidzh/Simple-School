<div>
    <form wire:submit.prevent="update">

        <div class=" w-full">
            {{-- Role --}}
            <div class="mb-5 flex">
                {{-- Deskripsi Role --}}
                <div class="w-1/4 flex flex-row gap-2">
                    {{-- <i class="fa-solid fa-shield p-2"></i> --}}
                    <div class="w-48 flex flex-col gap-2">

                        <div class="flex flex-row">
                            <h2 class="text-lg font-semibold">Information </h2>
                            <p class="text-lg"> &nbsp;| Informasi</p>
                        </div>

                        <p class="text-sm text-slate-500 tracking-wider">
                            Isi semua form yang disediakan dan pastikan informasi yang dimasukkan sudah benar.
                        </p>
                    </div>
                </div>

                {{-- Form Role --}}
                <div class="w-1/2 px-6 py-4 shadow-md rounded-3xl bg-white">
                    <div class="mb-5">
                        <label for="name" class="block ml-1 font-semibold text-sm text-slate-700 ">Nama Mata Pelajaran</label>
                        <input
                            class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                            type="text" name="name" placeholder="Nama Mata Pelajaran" wire:model="name">
                        @error('name')
                            <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="description" class="block ml-1 font-semibold text-sm text-slate-700 ">Deskripsi Mata Pelajaran</label>
                        <input
                            class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                            type="text" name="description" placeholder="Deskripsi Mata Pelajaran" wire:model="description">
                        @error('description')
                            <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            
            <div class="pb-14 w-1/2 flex justify-center mx-auto">
                <button type="submit"
                    class="w-1/2 px-6 py-3 rounded-lg border-2 text-lg font-medium text-slate-700 border-black hover:text-black hover:border-transparent hover:bg-white hover:shadow-md active:bg-slate-300 transition-all">
                    <span wire:loading.remove wire:target="store">
                        Simpan <i class="text-xs fa-solid fa-arrow-right"></i>
                    </span>
                
                    <span wire:loading wire:target="store" class="pointer-events-none">
                        Loading <i class="fa-solid fa-circle-notch fa-spin"></i> 
                    </span>
                </button>
            </div>
        </div>
    </form>
</div>
