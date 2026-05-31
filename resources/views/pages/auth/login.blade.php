<x-layouts.auth title="Masuk">
    <div class="flex min-h-screen bg-bl-grey justify-end">
        <!-- Form Side -->
        <main class="flex items-center flex-1 px-6 lg:pl-[calc(((100%-1280px)/2)+115px)] py-[100px]">
            <form action="{{ route('login') }}" method="POST" class="w-full max-w-[450px]">
                @csrf
                <div class="flex w-full h-fit shrink-0 flex-col gap-[40px] z-20 relative bg-white rounded-[20px] p-6">
                    <!-- Logo -->
                    <section>
                        <img src="{{ asset(getWebConfiguration()->logo) }}" alt="logo" class="h-12">
                    </section>

                    <!-- Header -->
                    <header>
                        <h1 class="font-bold text-[22px] leading-[33px] text-bl-black">Masuk ke Akun Anda</h1>
                        <p class="text-sm leading-[24px] text-[#5E6075]">Silahkan login dengan akun admin Anda</p>
                    </header>

                    <!-- Inputs -->
                    <section class="flex flex-col gap-4">
                        <div class="flex flex-col gap-2">
                            <label for="email" class="font-semibold">Email</label>
                            <div class="group w-full rounded-full border border-[#E0E1EA] px-6 flex items-center gap-[10px] transition-all duration-300 focus-within:ring-2 focus-within:ring-[#007AFF]">
                                <svg class="w-5 h-5 shrink-0 text-bl-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="appearance-none outline-none w-full my-3 font-bold placeholder:font-normal placeholder:text-[#181C39] bg-transparent" placeholder="Masukkan email Anda">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="password" class="font-semibold">Password</label>
                            <div class="group w-full rounded-full border border-[#E0E1EA] px-6 flex items-center gap-[10px] transition-all duration-300 focus-within:ring-2 focus-within:ring-[#007AFF]">
                                <svg class="w-5 h-5 shrink-0 text-bl-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <input type="password" name="password" id="password" class="appearance-none outline-none w-full my-3 font-bold placeholder:font-normal placeholder:text-[#181C39] bg-transparent" placeholder="Masukkan password Anda">
                            </div>
                            @error('password')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </section>

                    <!-- CTA -->
                    <section>
                        <button type="submit" class="rounded-full bg-bl-blue py-3 text-white w-full font-semibold transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center">
                            Masuk
                        </button>
                    </section>
                </div>
            </form>
        </main>

        <!-- Animated Background Images (hidden on mobile) -->
        <section class="hidden lg:block fixed top-0 right-5 h-screen w-full max-w-[580px] overflow-hidden">
            <div class="flex justify-center gap-5">
                <div class="flex flex-col w-[280px] h-max flex-nowrap shrink-0">
                    <div class="slider w-full h-max">
                        <div class="slide-top flex flex-col gap-5 pb-5">
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="flex justify-center items-center overflow-hidden rounded-[50px] w-[280px]">
                                    <img src="{{ asset('bwalajar-main/src/assets/images/backgrounds/signup-' . $i . '.png') }}" alt="image" class="size-full object-cover">
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="slider w-full h-max">
                        <div class="slide-top flex flex-col gap-5 pb-5">
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="flex justify-center items-center overflow-hidden rounded-[50px] w-[280px]">
                                    <img src="{{ asset('bwalajar-main/src/assets/images/backgrounds/signup-' . $i . '.png') }}" alt="image" class="size-full object-cover">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-[280px] h-max flex-nowrap shrink-0">
                    <div class="slider w-full h-max">
                        <div class="slide-bottom flex flex-col gap-5 pb-5">
                            @for ($i = 5; $i <= 8; $i++)
                                <div class="flex justify-center items-center overflow-hidden rounded-[50px] w-[280px]">
                                    <img src="{{ asset('bwalajar-main/src/assets/images/backgrounds/signup-' . $i . '.png') }}" alt="image" class="size-full object-cover">
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="slider w-full h-max">
                        <div class="slide-bottom flex flex-col gap-5 pb-5">
                            @for ($i = 5; $i <= 8; $i++)
                                <div class="flex justify-center items-center overflow-hidden rounded-[50px] w-[280px]">
                                    <img src="{{ asset('bwalajar-main/src/assets/images/backgrounds/signup-' . $i . '.png') }}" alt="image" class="size-full object-cover">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.auth>
