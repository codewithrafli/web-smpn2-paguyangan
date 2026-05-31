@props(['id', 'label', 'checked' => false])

<div class="flex items-center gap-3 mb-4">
    <input type="checkbox" id="{{ $id }}" {{ $attributes }}
        class="w-5 h-5 rounded-lg border-2 border-bl-border text-bl-blue focus:ring-bl-blue cursor-pointer">
    <label class="text-sm font-medium cursor-pointer" for="{{ $id }}">
        {{ $label }}
    </label>
</div>
