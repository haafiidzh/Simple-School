<div>
    <div class="w-full h-screen flex flex-col items-center justify-center">

        {{-- Session Flash Message --}}
        <x-flash-message></x-flash-message>
        <div class="w-100 px-10 py-7 rounded-xl shadow-xl flex flex-col bg-slate-100">
            <div class="mb-5 flex justify-center text-xl font-bold">
                Verifikasi Email Anda
            </div>

            <div class="text-center text-gray-600">
                <span>Silakan periksa email Anda dan klik link verifikasi yang kami kirimkan.</span>
                <br>
                <span>Jika Anda tidak menerima email, kami dapat mengirim ulang tautan verifikasi.</span>
            </div>

            <div class="flex gap-4 justify-center mt-5 ">
                <a wire:click="resendEmailVerification"
                    class="cursor-pointer w-72 p-2 flex justify-center border border-slate-700 rounded-xl text-md font-semibold hover:bg-slate-300 hover:border-transparent active:bg-slate-400 transition-all duration-150">
                    Kirim Ulang Email Verifikasi &nbsp;<span wire:loading wire:target="resendEmailVerification"><i
                            class="fa-solid fa-circle-notch fa-spin"></i></span>
                </a>
                <a wire:click="logout"
                    class="cursor-pointer w-36 p-2 flex justify-center border bg-slate-400 rounded-xl text-md font-semibold hover:bg-slate-300 hover:border-transparent active:bg-slate-400 transition-all duration-150">
                    Keluar &nbsp;<span wire:loading wire:target="logout"><i
                            class="fa-solid fa-circle-notch fa-spin"></i></span>
                </a>
            </div>
        </div>

    </div>
</div>
