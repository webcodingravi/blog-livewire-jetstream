<div>
    <div class=" py-8  w-full px-4" x-data="{ activeTab: 'system' }">
        <div class=" flex justify-center">
            <x-alert-message />
        </div>
        <div class="mb-8">
            <h3 class="text-3xl font-medium text-gray-700 inline-flex gap-2 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-folder-cog-icon lucide-folder-cog">
                    <path
                        d="M10.3 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.98a2 2 0 0 1 1.69.9l.66 1.2A2 2 0 0 0 12 6h8a2 2 0 0 1 2 2v3.3" />
                    <path d="m14.305 19.53.923-.382" />
                    <path d="m15.228 16.852-.923-.383" />
                    <path d="m16.852 15.228-.383-.923" />
                    <path d="m16.852 20.772-.383.924" />
                    <path d="m19.148 15.228.383-.923" />
                    <path d="m19.53 21.696-.382-.924" />
                    <path d="m20.772 16.852.924-.383" />
                    <path d="m20.772 19.148.924.383" />
                    <circle cx="18" cy="18" r="3" />
                </svg>
                Settings
            </h3>

        </div>
        <div class="flex lg:flex-row flex-col justify-between gap-12 l">
            <div class=" bg-white shadow-md flex flex-col gap-2 w-[400px] rounded-lg justify-center">
                <button @click="activeTab = 'system'"
                    :class="activeTab === 'system'
                        ?
                        'bg-gray-100 text-gray-700' :
                        'text-gray-700 hover:bg-gray-100'"
                    class="inline-flex gap-2 font-medium text-sm rounded px-7 py-4 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-monitor-cog-icon lucide-monitor-cog">
                        <path d="M12 17v4" />
                        <path d="m14.305 7.53.923-.382" />
                        <path d="m15.228 4.852-.923-.383" />
                        <path d="m16.852 3.228-.383-.924" />
                        <path d="m16.852 8.772-.383.923" />
                        <path d="m19.148 3.228.383-.924" />
                        <path d="m19.53 9.696-.382-.924" />
                        <path d="m20.772 4.852.924-.383" />
                        <path d="m20.772 7.148.924.383" />
                        <path d="M22 13v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7" />
                        <path d="M8 21h8" />
                        <circle cx="18" cy="6" r="3" />
                    </svg>
                    System Setting
                </button>


                <button @click="activeTab = 'smtp'"
                    :class="activeTab === 'smtp'
                        ?
                        'bg-gray-100 text-gray-700' :
                        'text-gray-700 hover:bg-gray-100'"
                    class="inline-flex gap-2 font-medium text-sm rounded px-7 py-4 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-cog-icon lucide-cog">
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
                    SMTP Setting
                </button>
            </div>
            <div class="flex-1">
                <template x-if="activeTab === 'system'">
                    <div class="w-full shadow-md p-6 rounded-lg bg-white" x-transition.opacity>
                        <livewire:components.backend.system-setting />
                    </div>
                </template>

                <template x-if="activeTab === 'smtp'">
                    <div class="w-full shadow-md p-6 rounded-lg bg-white" x-transition.opacity>
                        <livewire:components.backend.smtp-setting />
                    </div>
                </template>
            </div>
        </div>
    </div>

</div>
