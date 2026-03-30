<div>
    <div class="flex h-[700px] w-full">
        <div class="w-full hidden md:inline-block">
            <img class="h-full"
                src="https://images.unsplash.com/photo-1588702547981-5f8fed370e68?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="leftSideImage">
        </div>

        <div class="absolute top-4 left-4  text-gray-500/80 text-sm">
            <a href="{{ route('login') }}" wire:navigate
                class="inline-flex gap-2 hover:text-gray-800 active:scale-95 duration-300 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-arrow-left-icon lucide-arrow-left">
                    <path d="m12 19-7-7 7-7" />
                    <path d="M19 12H5" />
                </svg>
                Login
            </a>
        </div>

        <div class="w-full flex flex-col items-center justify-center">
            <div class="mb-4">
                <x-alert-message />
            </div>
            <form class="md:w-96 w-80 flex flex-col items-center justify-center" wire:submit.prevent="sendResetLink">
                <h2 class="text-4xl text-gray-900 font-extrabold">Forgot Password</h2>
                <p class="text-sm text-gray-500/90 mt-3">Enter your email to reset your password</p>

                <div class="w-full relative mt-6">
                    <div>
                        <input type="email" placeholder="Email id" wire:model.live.debounce.500ms="email"
                            class="ps-12 bg-transparent text-gray-500/80 placeholder-gray-500/80 text-sm w-full h-full py-3.5 rounded-full focus:ring-0 focus:outline-none focus:border-gray-300 border-gray-300">
                        <svg width="16" height="11" viewBox="0 0 16 11" fill="none"
                            class="absolute top-5 left-6" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 .55.571 0H15.43l.57.55v9.9l-.571.55H.57L0 10.45zm1.143 1.138V9.9h13.714V1.69l-6.503 4.8h-.697zM13.749 1.1H2.25L8 5.356z"
                                fill="#6B7280" />
                        </svg>
                    </div>
                    @error('email')
                        <span class="text-sm text-rose-500">{{ $message }}</span>
                    @enderror
                </div>



                <button type="submit" wire:loading.attr="disabled" wire:target="sendResetLink"
                    wire:loading.class="cursor-not-allowed opacity-50"
                    class="mt-8 w-full h-11 rounded-full text-white bg-gray-800 hover:opacity-90 transition-opacity cursor-pointer">
                    <span wire:target="sendResetLink" wire:loading.remove> Send Reset Link</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-loader-icon lucide-loader animate-spin"
                        wire:loading wire:target="sendResetLink">
                        <path d="M12 2v4" />
                        <path d="m16.2 7.8 2.9-2.9" />
                        <path d="M18 12h4" />
                        <path d="m16.2 16.2 2.9 2.9" />
                        <path d="M12 18v4" />
                        <path d="m4.9 19.1 2.9-2.9" />
                        <path d="M2 12h4" />
                        <path d="m4.9 4.9 2.9 2.9" />
                    </svg>
                </button>





            </form>


        </div>
    </div>


</div>
