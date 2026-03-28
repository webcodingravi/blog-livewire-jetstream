<div>
    <div class="inline-flex gap-2 items-center font-medium text-gray-800 mb-8"> <svg xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-monitor-cog-icon lucide-monitor-cog">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-cog-icon lucide-cog">
                <path d="M11 10.27 7 3.34" />
                <path d="m11 13.73-4 6.93" />
                <path d="M12 22v-2" />
                <path d="M12 2v2" />
                <path d="M14 12h8" />
                <path d="m17 20.66-1-1.73" />
                <path d="m17 3.34-1 1.73" />
                <path d="M2 12h2" />
                <path d="m20.66 17-1.73-1" />
                <path d="m20.66 7-1.73 1" />
                <path d="m3.34 17 1.73-1" />
                <path d="m3.34 7 1.73 1" />
                <circle cx="12" cy="12" r="2" />
                <circle cx="12" cy="12" r="8" />
            </svg>
        </svg>SMTP Setting</div>


    <form wire:submit.prevent="SmtpSettingSave">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Website Name
            </label>

            <input type="text" wire:model="website_name"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Website Name....">

            @error('website_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Mail Mailer
            </label>

            <input type="text" wire:model="mail_mailer"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Mail Mailer....">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Mail Host
            </label>

            <input type="text" wire:model="mail_host"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Mail Host....">
        </div>



        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Mail Port
            </label>

            <input type="text" wire:model="mail_port"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Mail Port....">

                  @error('mail_port')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        </div>


        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Mail Username
            </label>

            <input type="text" wire:model="mail_username"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Mail Username....">
        </div>


        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Mail Password
            </label>

            <input type="text" wire:model="mail_password"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Mail Password....">
        </div>


        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Mail Encryption
            </label>

            <input type="text" wire:model="mail_encryption"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Mail Password....">
        </div>


        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Mail from address
            </label>

            <input type="text" wire:model="mail_from_address"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                placeholder="Mail from address....">
        </div>


                <button type="submit" wire:loading.attr="disabled" wire:target="SmtpSettingSave"
            wire:loading.class="cursor-not-allowed opacity-50"
            class="px-4 py-2 font-medium text-white bg-gray-950 rounded-md hover:bg-gray-800 active:scale-95 duration-300 transition-all">
            <span wire:target="SmtpSettingSave" wire:loading.remove> Update SMTP</span>

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" wire:loading
                wire:target="SmtpSettingSave" stroke-linejoin="round"
                class="lucide lucide-loader-icon lucide-loader animate-spin">
                <path d="M12 2v4" />
                <path d="m16.2 7.8 2.9-2.9" />
                <path d="M18 12h4" />
                <path d="m16.2 16.2 2.9 2.9" />
                <path d="M12 18v4" />
                <path d="m4.9 19.1 2.9-2.9" />
                <path d="M2 12h4" />
                <path d="m4.9 4.9 2.9 2.9" />
            </svg>
</div>
</form>
</div>
