<?php

namespace App\Livewire\Administrator\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notice extends Component
{
    public $isLoggedIn = false;


    public function mount()
    {
        $this->isLoggedIn = Auth::check();
    }
    
    public function resendEmailVerification()
    {
        Auth::user()->sendEmailVerificationNotification();
        // Abaikan eror sendEmailVerificationNotification(), ini berfungsi
        
        session()->flash('flash_message', [
            'type' => 'created',
            'message' => 'Email verifikasi berhasil dikirim ulang',
        ]);

        return redirect()->route('verification.notice');
    }

    public function logout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();
        $this->isLoggedIn = false;
        
        return redirect()->route('administrator.login');
    }

    public function render()
    {

        return view('livewire.administrator.auth.notice');
    }

}
