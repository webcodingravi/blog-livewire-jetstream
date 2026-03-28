<?php

namespace App\Livewire\Components\Backend;

use App\Models\SmtpSetting as ModelsSmtpSetting;
use Livewire\Component;

class SmtpSetting extends Component
{
    public $website_name;

    public $mail_mailer;

    public $mail_host;

    public $mail_port;

    public $mail_username;

    public $mail_password;

    public $mail_encryption;

    public $mail_from_address;

    public function mount()
    {
        try {
            $smtpSetting = ModelsSmtpSetting::first();
            if ($smtpSetting) {
                $this->website_name = $smtpSetting->website_name;

                $this->mail_mailer = $smtpSetting->mail_mailer;

                $this->mail_host = $smtpSetting->mail_host;

                $this->mail_port = $smtpSetting->mail_port;

                $this->mail_username = $smtpSetting->mail_username;

                $this->mail_password = $smtpSetting->mail_password;

                $this->mail_encryption = $smtpSetting->mail_encryption;

                $this->mail_from_address = $smtpSetting->mail_from_address;
            }

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }

    }

    public function SmtpSettingSave()
    {
        $this->validate([
            'website_name' => 'required',
            'mail_port' => 'nullable|numeric',
        ]);
        try {

            ModelsSmtpSetting::updateOrCreate(['id' => 1],
                [
                    'website_name' => $this->website_name,
                    'mail_mailer' => $this->mail_mailer,
                    'mail_host' => $this->mail_host,
                    'mail_port' => $this->mail_port,
                    'mail_username' => $this->mail_username,
                    'mail_password' => $this->mail_password,
                    'mail_encryption' => $this->mail_encryption,
                    'mail_from_address' => $this->mail_from_address,

                ]);

            session()->flash('success', 'SMTP Setting Successfully Updated');

        } catch (\Exception $e) {
            session()->flash('error', 'server error'.$e->getMessage());
        }
    }

    public function render()
    {
        return view('components.backend.smtp-setting');
    }
}
