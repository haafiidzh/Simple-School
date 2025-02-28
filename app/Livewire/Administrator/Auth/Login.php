<?php

namespace App\Livewire\Administrator\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;


class Login extends Component
{
    public $email;
    public $showPassword = false;
    public $password = '';
    public $loginError;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $key = 'login-attempts:' . $this->email;

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->loginError = 'Too many login attempts. Please try again in ' . RateLimiter::availableIn($key) . ' seconds.';
            session()->flash('error', $this->loginError);
            return;
        }

        $cekKebenaran = [
            // ini dicocokkan dengan database
            'email' => $this->email,
            'password' => $this->password,
        ];

        // lalu coba login dengan inputan di form
        if (Auth::attempt($cekKebenaran)) {
            RateLimiter::clear($key);
            return redirect()->route('administrator.dashboard');
            session()->flash('message', 'Login successful!');
        } else {
            RateLimiter::hit($key, 60);
            $this->loginError = 'Invalid email or password.';
            session()->flash('error', 'Invalid email or password.');
        }
    }

    public function togglePasswordVisibility()
    {
        // Toggle untuk show/hide password
        $this->showPassword = !$this->showPassword;
    }

    public function render()
    {
        return view('livewire.administrator.auth.login');
    }
}
