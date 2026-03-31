<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ResetPassword extends Component
{
    public $token;

    public $password;

    public $password_confirmation;

    public $email;

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->email;

    }

    protected $rules = [
        'password' => 'required|min:8|max:40|confirmed',
        'password_confirmation' => 'required',
        'token' => 'required|string',
    ];

    public function updatedPassword()
    {
        $this->validateOnly('password');

    }

    public function updatedPasswordConfirmation()
    {
        if ($this->password) {
            $this->validateOnly('password');
        }
    }

    public function resetPassword()
    {
        $this->validate();

        try {
            $status = Password::reset(
                ['email' => $this->email,
                    'password' => $this->password,
                    'password_confirmation' => $this->password_confirmation,
                    'token' => $this->token,
                ],

                function (User $user) {
                    $user->password = Hash::make($this->password);
                    $user->save();

                }
            );

            if ($status == Password::PASSWORD_RESET) {
                session()->flash('success', 'Password Successfully Reset');

                return $this->redirectRoute('login', navigate: true);
            } else {
                session()->flash('error', 'Reset Failed');
            }

        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while resetting the password. Please try again.');

        }
    }

    public function render()
    {
        return view('auth.reset-password')->layout('layouts.guest')->layoutData(['metaTitle' => 'Reset Password']);
    }
}
