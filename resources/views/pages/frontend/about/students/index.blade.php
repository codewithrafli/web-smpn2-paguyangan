<x-layouts.frontend title="Siswa">
    <x-frontend.header>
        @php $status = request()->status ?? 'active'; @endphp
        <x-slot name="title">{{ $status == 'inactive' ? 'Alumni' : 'Siswa' }}</x-slot>
        <x-slot name="description">{{ $status == 'inactive' ? 'Alumni' : 'Siswa' }} {{ getWebConfiguration()->name }}</x-slot>
    </x-frontend.header>

    <div class="w-full max-w-[1130px] mx-auto px-4 mt-[50px] mb-[100px]">
        <!-- Tab Toggle -->
        <div class="flex items-center gap-3 mb-8 justify-center">
            <a href="{{ route('student', ['status' => 'active']) }}" class="rounded-full py-3 px-6 font-semibold transition-all duration-300 {{ $status == 'active' ? 'bg-bl-blue text-white shadow-[0_8px_20px_0_#007AFF91]' : 'bg-white border border-bl-border text-bl-secondary hover:ring-2 hover:ring-bl-blue' }}">Siswa</a>
            <a href="{{ route('student', ['status' => 'inactive']) }}" class="rounded-full py-3 px-6 font-semibold transition-all duration-300 {{ $status == 'inactive' ? 'bg-bl-blue text-white shadow-[0_8px_20px_0_#007AFF91]' : 'bg-white border border-bl-border text-bl-secondary hover:ring-2 hover:ring-bl-blue' }}">Alumni</a>
        </div>

        <!-- Search -->
        <div class="max-w-[500px] mx-auto mb-8">
            <form action="{{ route('student') }}" method="GET">
                <input type="hidden" name="status" value="{{ $status }}">
                <div class="relative">
                    <input type="text" name="q" value="{{ request()->q }}" placeholder="Cari {{ $status == 'inactive' ? 'alumni' : 'siswa' }}..."
                        class="w-full rounded-full border border-bl-border px-6 py-3 pr-14 outline-none transition-all duration-300 focus:ring-2 focus:ring-bl-blue focus:border-transparent font-semibold placeholder:font-normal placeholder:text-bl-secondary">
                    <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-bl-secondary hover:text-bl-blue transition-colors">
                        <i class="bi bi-search text-lg"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="rounded-3xl bg-white border border-bl-border overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-bl-grey text-left">
                        <th class="px-6 py-4 font-semibold text-sm">No</th>
                        <th class="px-6 py-4 font-semibold text-sm">Nama</th>
                        <th class="px-6 py-4 font-semibold text-sm">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="border-t border-bl-border hover:bg-bl-grey transition-colors duration-200">
                            <td class="px-6 py-4 text-sm">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-sm font-semibold">{{ $student->name }}</td>
                            <td class="px-6 py-4 text-sm">{{ $student->class }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.frontend>
