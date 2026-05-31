<x-layouts.frontend title="Prestasi">
    <x-frontend.header>
        <x-slot name="title">Prestasi</x-slot>
        <x-slot name="description">Prestasi yang telah diraih oleh {{ getWebConfiguration()->name }}</x-slot>
    </x-frontend.header>

    <div class="w-full max-w-[1130px] mx-auto px-4 mt-[50px] mb-[100px]">
        <div class="rounded-3xl bg-white border border-bl-border overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-bl-grey text-left">
                        <th class="px-6 py-4 font-semibold text-sm">No</th>
                        <th class="px-6 py-4 font-semibold text-sm">Nama</th>
                        <th class="px-6 py-4 font-semibold text-sm">Prestasi</th>
                        <th class="px-6 py-4 font-semibold text-sm">Tingkat</th>
                        <th class="px-6 py-4 font-semibold text-sm">Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($achievements as $achievement)
                        <tr class="border-t border-bl-border hover:bg-bl-grey transition-colors duration-200">
                            <td class="px-6 py-4 text-sm">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-sm font-semibold">{{ $achievement->name }}</td>
                            <td class="px-6 py-4 text-sm">{{ $achievement->achievement }}</td>
                            <td class="px-6 py-4 text-sm">{{ $achievement->level }}</td>
                            <td class="px-6 py-4 text-sm">{{ $achievement->year }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-bl-secondary">Kami belum memiliki prestasi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.frontend>
