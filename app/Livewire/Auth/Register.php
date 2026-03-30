<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;

    public $email;

    public $password;

    public $password_confirmation;

    public $want_author = false;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|string|email:dns|unique:users,email',
        'password' => 'required|min:6|max:40|confirmed',
    ];

    public function updatedPasswordConfirmation()
    {
        if ($this->password) {
            $this->validateOnly('password');
        }
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function register()
    {
        $validated = $this->validate();
        DB::beginTransaction();
        try {
            $validated['password'] = Hash::make($validated['password']);
            $validated['status'] = $this->want_author ? 'pending' : 'approved';
            $user = User::create($validated);

            if ($this->want_author) {
                $user->assignRole('user');
            } else {
                $user->assignRole('user');
            }

            DB::commit();
            session()->flash('success', $this->want_author ? 'Registration successful. Author request sent for approval' : 'Registration successful. You can login now');

            return $this->redirectRoute('login', navigate: true);
            $this->reset(['name', 'email', 'password', 'want_author']);

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    public function render()
    {
        return view('auth.register')->layout('layouts.guest')->layoutData(['metaTitle' => 'Register']);
    }
}
