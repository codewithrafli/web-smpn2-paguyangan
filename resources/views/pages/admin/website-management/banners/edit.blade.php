<x-layouts.admin title="Edit Banner">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Edit Banner</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Website / Banner / Edit</p>
        </div>
        <a href="{{ route('admin.banners.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>
    <x-admin.card title="Edit Banner">
        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img src="{{ $banner->desktop_image }}" alt="desktop" class="mb-2 max-w-[400px] rounded"
                id="desktop_image_preview">
            <x-input.file label="Desktop Image" name="desktop_image" />
            <img src="{{ $banner->mobile_image }}" alt="desktop" class="mb-2 max-w-[400px] rounded"
                id="mobile_image_preview">
            <x-input.file label="Mobile Image" name="mobile_image" />
            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">Update</x-button.primary>
            </div>
        </form>
    </x-admin.card>

    @push('custom-scripts')
        <script>
            // preview image
            function previewImage(input, element) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(element).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            // preview desktop image
            $("#desktop_image").change(function() {
                previewImage(this, '#desktop_image_preview');
            });

            // preview mobile image
            $("#mobile_image").change(function() {
                previewImage(this, '#mobile_image_preview');
            });
        </script>
    @endpush
</x-layouts.admin>
