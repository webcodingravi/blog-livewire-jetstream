<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;

    public $password;

    public $remember_me = false;

    protected $rules = [
        'email' => 'required|exists:users,email',
        'password' => 'required',
    ];

    public function mount()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->status === 'pending') {
                return $this->redirectRoute('author.pending');
            }

            if ($user->role === 'admin') {
                return $this->redirectRoute('admin.dashboard');
            }

            if ($user->role === 'author' && $user->status === 'approved') {
                return $this->redirectRoute('author.dashboard');
            }

            return $this->redirectRoute('home');
        }
    }

    public function login()
    {
        $validated = $this->validate();
        try {
            if (Auth::attempt($validated, $this->remember_me)) {
                session()->regenerate();

                $user = Auth::user();

                if ($user->status === 'pending') {
                    return $this->redirectRoute('author.pending');
                }

                if ($user->role === 'admin') {
                    return $this->redirectRoute('admin.dashboard');
                }

                if ($user->role === 'author') {
                    return $this->redirectRoute('author.dashboard');
                }

                return $this->redirectRoute('home');

            } else {
                session()->flash('error', 'Email or Password Not matched');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    public function render()
    {
        return view('auth.login')->layout('layouts.guest')->layoutData(['metaData' => 'Blog - Register']);
    }
}
