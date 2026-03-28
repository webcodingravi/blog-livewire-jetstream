<?php

namespace App\Livewire\Components\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccountSetting extends Component
{
    use WithFileUploads;

    protected $listeners = ['openEditProfile' => 'openModal'];

    public $isOpen = false;

    public $profile_photo;

    public $name;

    public $email;

    public $password;

    public $password_confirmation;

    public $currentProfilePhoto;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    protected function rules()
    {
        return [
            'name' => 'required|max:250',
            'email' => 'required|email:dns|unique:users,email,'.Auth::id(),
            'profile_photo' => 'nullable|image|max:2048',
            'password' => 'nullable|min:8|max:40|confirmed',
        ];
    }

    public function updatedPassword()
    {
        $this->validateOnly('password');
    }

    public function updatedEmail()
    {
        $this->validateOnly('email');
    }

    public function updatedPasswordConfirmation()
    {
        if ($this->password) {
            $this->validateOnly('password');

        }
    }

    public function updatedProfilePhoto()
    {

        try {
            $this->validateOnly('profile_photo');
            $user = User::findOrFail(Auth::id());

            if (! empty($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $this->profile_photo->store('profile-photos', 'public');
            $user->update(['profile_photo_path' => $path]);

            $this->currentProfilePhoto = $path;
            session()->flash('success', 'Profile Photo successfully Updated');
            $this->reset('profile_photo');
        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    public function EditProfile()
    {
        $this->validate();
        try {
            $user = User::findOrFail(Auth::id());
            $data = $this->only(['name', 'email']);

            if ($this->password) {

                if (Hash::check($this->password, $user->password)) {
                    session()->flash('error', 'New password must be different from old password.');

                    return;
                }

                $data['password'] = Hash::make($this->password);
            }

            $user->update($data);
            session()->flash('success', 'Profile updated successfully');
            $this->reset(['password', 'password_confirmation']);
            $this->closeModal();
            $this->dispatch('profileUpdated');

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }

    }

    public function mount()
    {
        try {
            $user = User::findOrFail(Auth::id());
            $this->name = $user->name;
            $this->email = $user->email;
            $this->currentProfilePhoto = Auth::user()->profile_photo_path;

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    public function render()
    {
        return view('components.backend.account-setting');
    }
}
