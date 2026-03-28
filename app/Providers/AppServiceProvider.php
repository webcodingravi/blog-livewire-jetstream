<?php

namespace App\Providers;

use App\Models\SmtpSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $mailSetting = SmtpSetting::first();
        if (! empty($mailSetting)) {
            $data_mail = [
                'driver' => $mailSetting->mail_mailer,
                'host' => $mailSetting->mail_host,
                'port' => $mailSetting->mail_port,
                'encryption' => $mailSetting->mail_encryption,
                'username' => $mailSetting->mail_username,
                'password' => $mailSetting->password,
                'from' => [
                    'address' => $mailSetting->mail_from_address,
                    'name' => $mailSetting->website_name,
                ],
            ];

            Config::set('mail', $data_mail);
        }
    }
}
