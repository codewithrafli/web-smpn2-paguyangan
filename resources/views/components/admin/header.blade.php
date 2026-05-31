<section class="flex w-full items-center justify-between bg-white p-4 rounded-3xl shadow-sm">
    <div class="flex items-center gap-3">
        <span class="text-bl-secondary text-sm">Admin Panel</span>
    </div>
    <div class="flex items-center gap-5">
        <div class="flex items-center gap-[14px]">
            <div class="flex text-right flex-col gap-0.5">
                <p class="text-sm text-bl-secondary">Howdy,</p>
                <p class="font-semibold text-sm">{{ auth()->user()->name }}</p>
            </div>
            <div class="flex rounded-full size-[40px] overflow-hidden bg-bl-blue items-center justify-center text-white font-bold">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
        </div>
    </div>
</section>
