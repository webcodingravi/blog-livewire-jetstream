<div>
    <div class="flex h-[700px] w-full">
        <div class="w-full hidden md:inline-block">
            <img class="h-full"
                src="https://images.unsplash.com/photo-1588702547981-5f8fed370e68?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="leftSideImage">
        </div>


        <div class="absolute top-4 left-4  text-gray-500/80 text-sm">
            <a href="{{ route('home') }}" wire:navigate
                class="inline-flex gap-2 hover:text-gray-800 active:scale-95 duration-300 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-arrow-left-icon lucide-arrow-left">
                    <path d="m12 19-7-7 7-7" />
                    <path d="M19 12H5" />
                </svg>
                Home
            </a>
        </div>

        <div class="w-full flex flex-col items-center justify-center">
            <div class="mb-4">
                <x-alert-message />
            </div>
            <form class="md:w-96 w-80 flex flex-col items-center justify-center" wire:submit.prevent="login">
                <h2 class="text-4xl text-gray-900 font-extrabold">Login</h2>
                <p class="text-sm text-gray-500/90 mt-3">Welcome back! Please Login to continue</p>

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

                <div class="w-full relative mt-6" x-data="{ show: false }">
                    <div>
                        <input :type="show ? 'text' : 'password'" placeholder="Password..."
                            wire:model.live.debounce.500ms="password"
                            class="ps-12 bg-transparent text-gray-500/80 placeholder-gray-500/80 text-sm w-full h-full py-3.5 rounded-full focus:ring-0 focus:outline-none focus:border-gray-300 border-gray-300">

                        <svg width="13" height="17" viewBox="0 0 13 17" fill="none"
                            class="absolute top-4 left-6" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13 8.5c0-.938-.729-1.7-1.625-1.7h-.812V4.25C10.563 1.907 8.74 0 6.5 0S2.438 1.907 2.438 4.25V6.8h-.813C.729 6.8 0 7.562 0 8.5v6.8c0 .938.729 1.7 1.625 1.7h9.75c.896 0 1.625-.762 1.625-1.7zM4.063 4.25c0-1.406 1.093-2.55 2.437-2.55s2.438 1.144 2.438 2.55V6.8H4.061z"
                                fill="#6B7280" />
                        </svg>

                        <div @click="show = !show" class="absolute right-5 top-4 text-gray-500 cursor-pointer">
                            <!-- Eye (show password) -->
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>

                            <!-- Eye Off (hide password) -->
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M10.733 5.076A10.744 10.744 0 0 1 12 5c5 0 9.27 3.11 10.938 7a1 1 0 0 1 0 .696 10.75 10.75 0 0 1-4.043 4.568" />
                                <path d="M14.12 14.12a3 3 0 1 1-4.243-4.243" />
                                <path d="M2 2l20 20" />
                                <path
                                    d="M4.94 4.94A10.75 10.75 0 0 0 1.062 12c1.668 3.89 5.938 7 10.938 7 1.44 0 2.82-.29 4.06-.82" />
                            </svg>
                        </div>
                    </div>

                    @error('password')
                        <span class="text-sm text-rose-500">{{ $message }}</span>
                    @enderror
                </div>



                <div class="w-full flex items-center justify-between mt-8 text-gray-500/80">
                    <div class="flex items-center gap-2">
                        <input class="w-4 h-4 focus:outline-none focus:ring-0 focus:border-0 cursor-pointer rounded"
                            type="checkbox" id="checkbox" wire:model="remember_me">
                        <label class="text-sm" for="checkbox">Remember me</label>
                    </div>
                    <a class="text-sm underline" href="{{ route('forgot-password') }}" wire:navigate>Forgot
                        password?</a>
                </div>

                <button type="submit" wire:loading.attr="disabled" wire:target="login"
                    wire:loading.class="cursor-not-allowed opacity-50"
                    class="mt-8 w-full h-11 rounded-full text-white bg-gray-800 hover:opacity-90 transition-opacity">
                    <span wire:target="login" wire:loading.remove> Login</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-loader-icon lucide-loader animate-spin"
                        wire:loading wire:target="login">
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


                <div class="flex items-center w-full my-5">
                    <div class="w-full h-px bg-gray-300/90"></div>
                    <p class="w-full text-nowrap text-sm text-gray-500/90 text-center">OR</p>
                    <div class="w-full h-px bg-gray-300/90"></div>
                </div>

                <button type="button"
                    class="w-full mt-8 bg-gray-500/10 flex items-center justify-center h-12 rounded-full">
                    <img src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/login/googleLogo.svg"
                        alt="googleLogo">
                </button>
            </form>

            <p class="text-gray-500/90 text-sm mt-4">Don't Have an account? <a class="text-indigo-400 hover:underline"
                    href="{{ route('register') }}" wire:navigate>Register</a></p>

        </div>
    </div>


</div>
