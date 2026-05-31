<x-layouts.frontend title="Pengumuman Kelulusan">
    <x-frontend.header>
        <x-slot name="title">Pengumuman Kelulusan</x-slot>
        <x-slot name="description">Pengumuman kelulusan {{ getWebConfiguration()->name }}</x-slot>
    </x-frontend.header>

    <section class="w-full max-w-[1130px] mx-auto px-4 py-[60px]">
        <div class="max-w-[520px] mx-auto">
            <div class="rounded-3xl bg-white border border-bl-border p-[40px]">
                <h3 class="font-bold text-[22px] leading-[33px] mb-1">Cek Hasil Kelulusan</h3>
                <p class="text-bl-secondary text-sm mb-6">Masukkan nomor ujian untuk melihat hasil kelulusan</p>
                <div class="relative">
                    <input type="text" id="search" placeholder="Masukkan nomor ujian..." autocomplete="off"
                        class="w-full rounded-full border border-bl-border px-6 py-3 pr-[130px] outline-none transition-all duration-300 focus:ring-2 focus:ring-bl-blue focus:border-transparent font-semibold placeholder:font-normal placeholder:text-bl-secondary">
                    <button id="btn" class="absolute right-2 top-1/2 -translate-y-1/2 rounded-full bg-bl-blue text-white font-semibold py-2 px-6 transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] disabled:opacity-50">
                        Cek Hasil
                    </button>
                </div>
            </div>
            <div class="mt-7" id="resultArea" style="display:none;"></div>
        </div>
    </section>

    @push('styles')
        <style>
            .result-card { border-radius: 24px; overflow: hidden; }
            .result-card.passed { border: 2px solid #22c55e; }
            .result-card.failed { border: 2px solid #ef4444; }
            .result-header { padding: 20px 24px; text-align: center; color: #fff; }
            .result-card.passed .result-header { background: linear-gradient(135deg, #22c55e, #16a34a); }
            .result-card.failed .result-header { background: linear-gradient(135deg, #ef4444, #dc2626); }
            .result-body { background: #fff; padding: 28px 24px; }
            .student-photo { width: 72px; height: 72px; border-radius: 50%; object-fit: cover; border: 3px solid #e5e7eb; flex-shrink: 0; }
            .student-photo-placeholder { width: 72px; height: 72px; border-radius: 50%; background: #f3f4f6; display: flex; align-items: center; justify-content: center; flex-shrink: 0; border: 3px solid #e5e7eb; }
            .doc-btn { flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 16px; border-radius: 14px; border: 2px solid #e5e7eb; background: #f9fafb; font-weight: 600; font-size: .85rem; text-decoration: none; transition: all .2s; color: #181C39; }
            .doc-btn:hover { border-color: #007AFF; color: #007AFF; }
        </style>
    @endpush

    @push('plugin-scripts')
        <script src="https://cdn.jsdelivr.net/npm/tsparticles-confetti@2.10.1/tsparticles.confetti.bundle.min.js"></script>
    @endpush

    @push('custom-scripts')
        <script>
            const sound = new Audio('{{ asset('frontend/assets/win.mp3') }}');

            function renderResult(data) {
                const isPassed = data.status === 'passed';
                const statusClass = isPassed ? 'passed' : 'failed';
                const statusIcon = isPassed ? 'bi-check-circle-fill' : 'bi-x-circle-fill';
                const statusMsg = isPassed ? 'Selamat! Kamu dinyatakan lulus.' : 'Mohon maaf, kamu dinyatakan tidak lulus.';
                let photoHtml = data.photo
                    ? `<img src="${data.photo}" alt="Foto" class="student-photo">`
                    : `<div class="student-photo-placeholder"><i class="bi bi-person-fill" style="font-size:2rem;color:#9ca3af"></i></div>`;
                let docsHtml = '';
                if (isPassed) {
                    const sklBtn = data.skl_file ? `<a href="${data.skl_file}" target="_blank" class="doc-btn"><i class="bi bi-file-earmark-text"></i> Download SKL</a>` : `<span class="doc-btn" style="opacity:.4;cursor:default"><i class="bi bi-file-earmark-text"></i> SKL belum tersedia</span>`;
                    const sknBtn = data.skn_file ? `<a href="${data.skn_file}" target="_blank" class="doc-btn"><i class="bi bi-file-earmark-ruled"></i> Download Nilai</a>` : `<span class="doc-btn" style="opacity:.4;cursor:default"><i class="bi bi-file-earmark-ruled"></i> Nilai belum tersedia</span>`;
                    docsHtml = `<div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:20px">${sklBtn}${sknBtn}</div>`;
                }
                return `<div class="result-card ${statusClass}"><div class="result-header"><div style="font-size:2.2rem;margin-bottom:4px"><i class="bi ${statusIcon}"></i></div><h4 style="font-weight:700;color:#fff;margin:0">${statusMsg}</h4></div><div class="result-body"><div style="display:flex;align-items:center;gap:18px;margin-bottom:20px">${photoHtml}<div><h3 style="font-size:1.2rem;font-weight:700;margin:0 0 4px">${data.name}</h3><span style="font-size:.85rem;color:#6b7280">No. Ujian: ${data.test_number}</span></div></div>${docsHtml}</div></div>`;
            }

            function renderNotFound() {
                return `<div style="background:#fff;border-radius:24px;border:2px solid #e5e7eb;padding:40px 24px;text-align:center"><i class="bi bi-search" style="font-size:2.5rem;color:#d1d5db;display:block;margin-bottom:12px"></i><h5 style="font-weight:700;margin-bottom:4px">Data Tidak Ditemukan</h5><p style="color:#6b7280;font-size:.9rem;margin:0">Pastikan nomor ujian yang dimasukkan sudah benar</p></div>`;
            }

            $(document).ready(function() {
                $('#search').on('keypress', function(e) { if (e.which === 13) $('#btn').click(); });
                $('#btn').click(function() {
                    var test_number = $('#search').val().trim();
                    if (!test_number) return;
                    var $btn = $(this);
                    $btn.prop('disabled', true).html('<span class="inline-block w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></span>');
                    $.ajax({
                        url: "/api/graduation", method: "GET", data: { test_number: test_number },
                        success: function(data) {
                            var $area = $('#resultArea');
                            if (data.message === 'Data ditemukan') {
                                $area.html(renderResult(data.data)).fadeIn(300);
                                if (data.data.status === 'passed') { confetti({ particleCount: 300, spread: 200, origin: { y: 0.6 } }); sound.play(); }
                            } else { $area.html(renderNotFound()).fadeIn(300); }
                        },
                        error: function() { $('#resultArea').html(renderNotFound()).fadeIn(300); },
                        complete: function() { $btn.prop('disabled', false).html('Cek Hasil'); }
                    });
                });
            });
        </script>
    @endpush
</x-layouts.frontend>
