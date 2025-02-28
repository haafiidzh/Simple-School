<div>
    <form wire:submit.prevent="store">

        <div class=" w-full">
            {{-- Role --}}
            <div class="mb-5 flex">
                {{-- Deskripsi Role --}}
                <div class="w-1/4 flex flex-row gap-2">
                    {{-- <i class="fa-solid fa-shield p-2"></i> --}}
                    <div class="w-48 flex flex-col gap-2">

                        <div class="flex flex-row">
                            <h2 class="text-lg font-semibold">Identitas </h2>
                            <p class="text-lg"> &nbsp;| Identity</p>
                        </div>

                        <p class="text-sm text-slate-500 tracking-wider">
                            Isi semua form yang disediakan dan pastikan informasi yang dimasukkan sudah benar.
                        </p>
                    </div>
                </div>

                {{-- Form Role --}}
                <div class="w-1/2 px-6 py-4 shadow-md rounded-3xl bg-white">
                    <div class="mb-5">
                        <label for="name" class="block ml-1 font-semibold text-sm text-slate-700 ">Nama Guru</label>
                        <input
                            class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                            type="text" name="name" placeholder="Nama Lengkap Guru" wire:model="name">
                        @error('name')
                            <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="nip" class="block ml-1 font-semibold text-sm text-slate-700 ">NIP</label>
                        <input
                            class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                            type="text" name="nip" placeholder="Nomor Identitas Pegawai Negeri Sipil" wire:model="nip">
                        @error('nip')
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

                    <div class="mb-5">
                        <label for="subject" class="block ml-1 font-semibold text-sm text-slate-700 ">Mata Pelajaran</label>
                        <select
                            class="w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl placeholder:text-slate-400 placeholder:tracking-[0.075rem]"
                            name="subject" placeholder="Kelas" wire:model="subject">
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @error('subject')
                            <div class="mx-1 mt-2 font-semibold text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2"
                        x-data="{open: false}">
                        <label for="classrooms" class="block ml-1 font-semibold text-sm text-slate-700 ">Kelas yang diampu</label>
                        <div class="relative w-full mt-2 px-3 py-3 border border-black text-sm rounded-xl text-slate-400 tracking-[0.075rem]">

                            @if ($selectedClassrooms)
                                <div class="font-semibold flex gap-2 flex-shrink-0 flex-wrap">
                                @foreach ($selectedClassrooms as $item)
                                @php
                                    $dataSelect = App\Models\Classroom::find($item);
                                @endphp
                                    <div class="p-2 bg-blue-500/45 rounded text-gray-800 flex items-center gap-1 tracking-normal">
                                        {{ $dataSelect->name }}
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                Pilih Kelas
                            @endif

                            <div 
                                x-cloack
                                x-show="open"
                                @click.away="open=false"
                                class="border h-40 overflow-auto border-black/50 absolute top-12 rounded-md left-0 w-full bg-gray-100 text-black flex flex-col gap-1">
                                @foreach ($classrooms as $item)
                                <span wire:click="selectClassroom('{{ $item->id }}')"
                                @click="open=false"
                                class="cursor-pointer hover:bg-white p-2 tracking-normal">
                                    {{ $item->name }}
                                </span>
                                @endforeach
                            </div>

                            <span @click="open=true" class="cursor-pointer absolute right-0 {{ $selectedClassrooms ? 'top-5' : '' }} w-10 h-10 pe-2 text-slate-700">
                                <i class="fa-solid fa-circle-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Role --}}
            <div class="mb-5 flex">
                {{-- Deskripsi Role --}}
                <div class="w-1/4 flex flex-row gap-2">
                    {{-- <i class="fa-solid fa-shield p-2"></i> --}}
                    <div class="w-48 flex flex-col gap-2">

                        <div class="flex flex-row">
                            <h2 class="text-lg font-semibold">Contact </h2>
                            <p class="text-lg"> &nbsp;| Kontak</p>
                        </div>

                        <p class="text-sm text-slate-500 tracking-wider">
                            Form untuk kontak yang bisa dihubungi.
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
                            type="text" name="phone" placeholder="Nomor Induk Pegawai Negeri Sipil" wire:model="phone">
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
