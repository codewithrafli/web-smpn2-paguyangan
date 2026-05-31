<button type="{{ $attributes->get('type', 'button') }}" {{ $attributes->merge(['class' => 'rounded-full py-3 px-6 bg-bl-blue text-white font-semibold transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center']) }}>
    {{ $slot }}
</button>
