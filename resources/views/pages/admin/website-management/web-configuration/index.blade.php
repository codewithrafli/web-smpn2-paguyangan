<x-layouts.admin title="Konfigurasi Web">
    @push('plugin-styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    @endpush

    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Konfigurasi Web</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Website / Konfigurasi</p>
        </div>
    </header>
    <x-admin.card title="Data Konfigurasi">
        <form action="{{ route('admin.web-configuration.update', $webConfiguration->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <x-input.text value="{{ $webConfiguration->name }}" label="Nama Sekolah" name="name" />

                    <x-input.text value="{{ $webConfiguration->headmaster_name }}" label="Nama Kepala Sekolah"
                        name="headmaster_name" />
                    <img src="{{ asset($webConfiguration->headmaster_image) }}" alt="logo" class="w-[98px] mb-2">
                    <x-input.file name="headmaster_image" label="Foto Kepala Sekolah" />
                    <x-input.textarea value="{{ $webConfiguration->headmaster_message }}"
                        label="Pesan Kepala Sekolah" name="headmaster_message" id="headmaster_message" />
                    <x-input.textarea value="{{ $webConfiguration->description }}" label="Deskripsi Website"
                        name="description" />
                    <x-input.textarea value="{{ $webConfiguration->vision }}" label="Visi" name="vision"
                        id="vision" />
                    <x-input.textarea value="{{ $webConfiguration->mission }}" label="Misi" name="mission"
                        id="mission" />
                </div>
                <div>
                    <img src="{{ asset($webConfiguration->organization_structure) }}" alt="logo"
                        class="w-[98px] mb-2">
                    <x-input.file name="organization_structure" label="Struktur Organisasi" />
                    <x-input.text value="{{ $webConfiguration->email }}" label="Email Website" name="email" />
                    <x-input.text value="{{ $webConfiguration->phone }}" label="Nomor Telepon Website"
                        name="phone" />
                    <x-input.textarea value="{{ $webConfiguration->address }}" label="Alamat Website"
                        name="address" />
                    <x-input.text value="{{ $webConfiguration->map }}" label="Map Website" name="map" />
                    <img src="{{ asset($webConfiguration->logo) }}" alt="logo" class="w-[98px] mb-2">
                    <x-input.file name="logo" label="Logo Website" />
                    <x-input.text value="{{ $webConfiguration->facebook }}" label="Facebook Website"
                        name="facebook" />
                    <x-input.text value="{{ $webConfiguration->instagram }}" label="Instagram Website"
                        name="instagram" />
                    <x-input.text value="{{ $webConfiguration->youtube }}" label="Youtube Website"
                        name="youtube" />
                    <x-input.text type="datetime-local"
                        value="{{ $webConfiguration->graduation_datetime ? $webConfiguration->graduation_datetime->format('Y-m-d\TH:i') : '' }}"
                        label="Tanggal & Jam Pengumuman Kelulusan" name="graduation_datetime" />
                    <x-input.text value="{{ $webConfiguration->theme_color }}" label="Warna Website"
                        name="theme_color" />
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">Update</x-button.primary>
            </div>
        </form>
    </x-admin.card>

    @push('plugin-scripts')
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    @endpush

    @push('custom-scripts')
        <script>
            var simplemde = new SimpleMDE({
                element: document.getElementById("headmaster_message"),
            });

            var simplemde = new SimpleMDE({
                element: document.getElementById("vision"),
            });

            var simplemde = new SimpleMDE({
                element: document.getElementById("mission"),
            });
        </script>
    @endpush
</x-layouts.admin>
