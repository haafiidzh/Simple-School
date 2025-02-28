<div class="flex gap-5 mb-5">

    <div class="w-1/3 gap-5 flex flex-col">
        {{-- <div class="py-3 rounded-xl bg-white">
            <h2 class="px-6 font-semibold text-xl pb-3">Foto</h2>
            <div class="border-b border-slate-700"></div>

            <h3 class="text-lg py-3 px-6 font-semibold">{{ $data->name }}</h3>

            
        </div> --}}
        <div class="py-3 rounded-xl bg-white">
            <h2 class="px-6 font-semibold text-xl pb-3">Informasi Kontak</h2>
            <div class="border-b border-slate-700"></div>
            <div class="pt-3 px-6 mb-1">
                <div class="flex justify-between text-sm mb-3">
                    <span class="font-semibold text-slate-600">Telepon</span>
                    <span class="font-semibold">{{ $data->phone ?: '-' }}</span>
                </div>
                <div class="flex justify-between text-sm mb-3">
                    <span class="font-semibold text-slate-600">Email</span>
                    <span class="font-semibold">{{ $data->email ?: '-' }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="w-2/3 gap-5 flex flex-col">
        <div class="py-3 rounded-xl bg-white ">
            <h2 class="px-6 font-semibold text-xl pb-3">Identitas Diri</h2>
            <div class="border-b border-slate-700"></div>
            <div class="pt-3 px-6 mb-1">
                <div class="flex justify-between text-sm mb-3">
                    <span class="font-semibold text-slate-600">Nama</span>
                    <span class="max-w-2/3 text-right font-semibold">{{ $data->name }}</span>
                </div>
                <div class="flex justify-between text-sm mb-3">
                    <span class="font-semibold text-slate-600">NIP</span>
                    <span class="max-w-2/3 text-right font-semibold">{{ $data->nip ?: '-' }}</span>
                </div>
                <div class="flex justify-between text-sm mb-3">
                    <span class="font-semibold text-slate-600">Jenis Kelamin</span>
                    <span class="font-semibold max-w-2/3 text-right">
                        @if ($data->gender === 'L')
                            Laki-laki
                        @elseif (($data->gender === 'P'))
                            Perempuan
                        @else
                            Tidak Diketahui
                        @endif
                        
                    </span>
                </div>
                <div class="flex justify-between text-sm mb-3">
                    <span class="font-semibold text-slate-600">Agama</span>
                    <span class="max-w-2/3 text-right font-semibold">{{ $data->religion ?: '-' }}</span>
                </div>
                <div class="flex justify-between text-sm mb-3">
                    <span class="font-semibold text-slate-600">Tempat/Tanggal Lahir</span>
                    <span class="max-w-2/3 text-right font-semibold">{{ $data->birth_place ?: '' }}, {{ getDateOnly($data->birth_date) ?: '' }}</span>
                </div>
                <div class="flex justify-between text-sm mb-3">
                    <span class="font-semibold text-slate-600">Alamat</span>
                    <span class="max-w-2/3 text-right font-semibold">{{ $data->address ?: '-' }}</span>
                </div>
            </div>
        </div>
        
        <div class="py-3 rounded-xl bg-white">
            <h2 class="px-6 font-semibold text-xl pb-3">Informasi Akademik</h2>
            <div class="border-b border-slate-700"></div>
            <div class="pt-3 px-6 mb-1">
                <div class="flex justify-between text-sm mb-3">
                    <span class="font-semibold text-slate-600">Mata Pelajaran</span>
                    <span class="font-semibold">{{ $data->subject->name }}</span>
                </div>
                <div class="flex flex-col text-sm mb-3 gap-2">
                    <span class="font-semibold text-slate-600">Kelas yang diampu</span>
                    <span class="font-semibold flex gap-2">
                    @foreach ($data->classrooms as $item)
                        <div class="p-2 bg-blue-500/45 rounded text-gray-800">{{ $item->name }}</div>
                    @endforeach
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
