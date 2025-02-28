<div>
    <form wire:submit.prevent="store">

        <div class=" w-full">
            {{-- Role --}}
            <div class="mb-5 flex">
                {{-- Deskripsi Role --}}
                <div class="w-1/4 flex flex-row gap-2">
                    <i class="fa-solid fa-shield p-2"></i>
                    <div class="w-48 flex flex-col gap-2">

                        <div class="flex flex-row">
                            <h2 class="text-lg font-semibold">Role </h2>
                            <p class="text-lg"> &nbsp;| Peran User</p>
                        </div>

                        <p class="text-sm text-slate-500 tracking-wider">
                            Isi semua form yang disediakan dan pastikan informasi yang dimasukkan sudah benar.
                        </p>
                    </div>
                </div>

                {{-- Form Role --}}
                <div class="w-1/2 px-6 py-4 shadow-md rounded-3xl bg-white">
                    <div class="mb-5">
                        <label for="name" class="block ml-1 font-semibold text-sm text-slate-700 ">Nama Siswa</label>
                        <input
                            class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                            type="text" name="name" placeholder="Nama Siswa" wire:model="name">
                        @error('name')
                            <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="nis" class="block ml-1 font-semibold text-sm text-slate-700 ">NISN</label>
                        <input
                            class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                            type="text" name="nis" placeholder="Nomor Induk Siswa Nasional" wire:model="nis">
                        @error('nis')
                            <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex mb-5 gap-4">
                        <div class=" flex flex-grow flex-col">
                            <label for="birth_place" class="block ml-1 font-semibold text-sm text-slate-700 ">Tempat Lahir</label>
                            <input
                                class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                                type="text" name="birth_place" placeholder="Nomor Induk Siswa Nasional" wire:model="birth_place">
                            @error('birth_place')
                                <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" flex flex-grow flex-col">
                            <label for="birth_date" class="block ml-1 font-semibold text-sm text-slate-700 ">Tanggal Lahir</label>
                            <input
                                class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                                type="date" name="birth_date" placeholder="Nomor Induk Siswa Nasional" wire:model="birth_date">
                            @error('birth_date')
                                <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex gap-5 mb-5">
                        <div class="flex flex-col gap-2 justify-center">
                            <span class="font-semibold text-sm text-slate-700">Jenis Kelamin</span>
                            <div class="flex gap-4 p-2 bg-gray-200 rounded">
                                <div class="flex gap-2">
                                    <input type="radio" name="male" id="male" wire:model="gender" value="L">
                                    <label  class="font-semibold text-sm text-gray-700" for="male">Laki-laki</label>
                                </div>
                                <div class="flex gap-2">
                                    <input type="radio" name="female" id="female" wire:model="gender" value="P">
                                    <label  class="font-semibold text-sm text-gray-700" for="female">Perempuan</label>
                                </div>
                            </div>
                            @error('gender')
                                <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex flex-col flex-grow">
                            <label for="religion" class="block ml-1 font-semibold text-sm text-slate-700 ">Agama</label>
                            <select
                                class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                                name="religion" placeholder="Kelas" wire:model="religion">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghuchu">Konghuchu</option>
                                
                            </select>
                            @error('religion')
                                <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="address" class="block ml-1 font-semibold text-sm text-slate-700 ">Alamat Lengkap</label>
                        <textarea rows="4"
                            class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                            name="address" placeholder="Nomor Induk Siswa Nasional" wire:model="address">
                        </textarea>
                        @error('address')
                            <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="classroom" class="block ml-1 font-semibold text-sm text-slate-700 ">Kelas</label>
                        <select
                            class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                            name="classroom" placeholder="Kelas" wire:model="classroom">
                            <option value="">Pilih Kelas</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                        @error('classroom')
                            <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- Role --}}
            <div class="mb-5 flex">
                {{-- Deskripsi Role --}}
                <div class="w-1/4 flex flex-row gap-2">
                    <i class="fa-solid fa-shield p-2"></i>
                    <div class="w-48 flex flex-col gap-2">

                        <div class="flex flex-row">
                            <h2 class="text-lg font-semibold">Contact </h2>
                            <p class="text-lg"> &nbsp;| Kontak</p>
                        </div>

                        <p class="text-sm text-slate-500 tracking-wider">
                            Isi semua form yang disediakan dan pastikan informasi yang dimasukkan sudah benar.
                        </p>
                    </div>
                </div>

                {{-- Form Role --}}
                <div class="w-1/2 px-6 py-4 shadow-md rounded-3xl bg-white">
                    <div class="mb-5">
                        <label for="email" class="block ml-1 font-semibold text-sm text-slate-700 ">Email</label>
                        <input
                            class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                            type="text" name="email" placeholder="Email" wire:model="email">
                        @error('email')
                            <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="phone" class="block ml-1 font-semibold text-sm text-slate-700 ">Telepon</label>
                        <input
                            class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                            type="text" name="phone" placeholder="Nomor Induk Siswa Nasional" wire:model="phone">
                        @error('phone')
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
