<div>
    {{-- model --}}

    @if ($isOpen)
        <div
            class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 min-h-screen animate__animated animate__fadeIn">
            <!-- Modal Box -->
            <div class="w-11/12 p-6 mx-auto bg-white rounded-xl shadow-xl md:max-w-md animate__animated animate__zoomIn">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="mb-4 text-xl font-semibold">Profile Edit</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        wire:click="closeModal" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-x-icon lucide-x cursor-pointer">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>

                </div>

                <!-- Main Content -->

                <!-- Profile Section -->
                <section id="profile" class="bg-white ">
                    <div class="space-y-6">
                        <x-alert-message />
                        <!-- Profile Avatar -->
                        <div class="flex items-center space-x-6">
                            <div class="relative">
                                <img src="{{ $profile_photo ? $profile_photo->temporaryUrl() : ($currentProfilePhoto ? asset('storage/' . $currentProfilePhoto) : asset('https://www.twtf.org.uk/wp-content/uploads/2024/01/dummy-image.jpg')) }}"
                                    alt="Profile" class="w-24 h-24 rounded-full border-4 border-blue-100">


                                <div
                                    class="absolute bottom-0 right-0 bg-gradient-to-br from-[#24bad8] to-[#0b7a93] text-white p-2 rounded-full transition shadow-lg">
                                    <input type="file" wire:model="profile_photo"
                                        class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*">
                                    <span>
                                        <i class="ri-camera-line cursor-pointer"></i>
                                    </span>
                                </div>

                            </div>
                            <div>
                                <p class="text-gray-900 font-medium">{{ Auth::user()->name }}</p>
                                <p class="text-gray-600 text-sm">{{ Auth::user()->email }}</p>
                                <div wire:loading wire:target="profile_photo" class="text-sm text-gray-500">
                                    Uploading...
                                </div>


                            </div>
                        </div>

                        <!-- Form Fields -->
                        <form wire:submit.prevent="EditProfile" class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Name</label>
                                <input type="text" wire:model="name" placeholder="Enter Name.."
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="text" placeholder="Enter Email Id.."
                                    wire:model.live.debounce.500ms="email"
                                    class="disabled:opacity-50 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                            </div>

                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror


                            <div>
                                <hr class="mb-2" />
                                <span class="text-sm text-rose-500 py-2"> If you change the password, please fill the
                                    field.
                                </span>
                                <label class="block text-sm font-medium text-gray-700 my-2">New
                                    Password</label>
                                <input type="password" placeholder="●●●●●●●●" wire:model.live.debounce.500ms="password"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition placeholder:text-[10px]">

                                @error('password')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm
                                    Password</label>
                                <input type="password" placeholder="●●●●●●●●"
                                    wire:model.live.lazy.500ms="password_confirmation"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition placeholder:text-[10px]">
                                @error('password_confirmation')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Save Button -->
                            <div class="pt-4 border-t border-gray-200 flex justify-end gap-3">
                                <button type="submit" wire:loading.attr="disabled" wire:target="EditProfile"
                                    wire:loading.class="cursor-not-allowed opacity-50"
                                    class="px-6 py-2 bg-gradient-to-br from-[#24bad8] to-[#0b7a93] rounded active:scale-95 duration-300 text-white transition-all font-medium flex items-center">
                                    <i class="ri-save-line mr-2"></i>
                                    Save Changes
                                </button>
                            </div>

                        </form>
                    </div>
                </section>

            </div>

        </div>
    @endif
</div>
