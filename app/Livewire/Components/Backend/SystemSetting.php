<?php

namespace App\Livewire\Components\Backend;

use App\Models\SystemSetting as ModelsSystemSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class SystemSetting extends Component
{
    use WithFileUploads;

    public $website_name;

    public $logo;

    public $oldLogo;

    public $favicon;

    public $oldFavicon;

    public $address;

    public $mobile_no;

    public $email;

    public $facebook_link;

    public $instagram_link;

    public $twitter_link;

    public function mount()
    {
        try {
            $systemSetting = ModelsSystemSetting::first();
            if ($systemSetting) {
                $this->website_name = $systemSetting->website_name;

                $this->oldLogo = $systemSetting->logo;

                $this->oldFavicon = $systemSetting->favicon;

                $this->address = $systemSetting->address;

                $this->mobile_no = $systemSetting->mobile_no;

                $this->email = $systemSetting->email;

                $this->facebook_link = $systemSetting->facebook_link;

                $this->instagram_link = $systemSetting->instagram_link;

                $this->twitter_link = $systemSetting->twitter_link;
            }

        } catch (\Exception $e) {

            session()->flash('error', 'server error'.$e->getMessage());
        }

    }

    public function systemSettingSave()
    {
        $this->validate([
            'website_name' => 'required',
            'email' => 'required|email:dns',
            'mobile_no' => 'required|numeric|digits:10',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        try {
            $logoName = $this->oldLogo;
            $faviconName = $this->oldFavicon;
            if (! empty($this->logo)) {
                $logoPath = 'uploads/sysetmSetting/'.$this->oldLogo;
                if ($this->oldLogo && Storage::disk('public')->exists($logoPath)) {
                    Storage::disk('public')->delete($logoPath);
                }

                $logoName = Str::slug('website_name').'_'.'logo'.'.'.$this->logo->extension();
                $this->logo->storeAs('uploads/systemSetting', $logoName, 'public');
            }

            if (! empty($this->favicon)) {
                $faviconPath = 'uploads/sysetmSetting/'.$this->favicon;
                if ($this->oldFavicon && Storage::disk('public')->exists($faviconPath)) {
                    Storage::disk('public')->delete($faviconPath);
                }

                $faviconName = Str::slug('website_name').'_'.'favicon'.'.'.$this->logo->extension();
                $this->favicon->storeAs('uploads/systemSetting', $faviconName, 'public');
            }

            ModelsSystemSetting::updateOrCreate(['id' => 1],
                [
                    'website_name' => $this->website_name,
                    'logo' => $logoName,
                    'favicon' => $faviconName,
                    'address' => $this->address,
                    'mobile_no' => $this->mobile_no,
                    'email' => $this->email,
                    'facebook_link' => $this->facebook_link,
                    'instagram_link' => $this->instagram_link,
                    'twitter_link' => $this->twitter_link,

                ]);

            session()->flash('success', 'System Setting Successfully Updated');

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    public function render()
    {
        return view('components.backend.system-setting');
    }
}
