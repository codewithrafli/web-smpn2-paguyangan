<x-layouts.frontend title="Pengumuman Kelulusan">

    <x-frontend.header>
        <x-slot name="title">
            Pengumuman Kelulusan
        </x-slot>
        <x-slot name="description">
            Pengumuman kelulusan {{ getWebConfiguration()->name }}
        </x-slot>
    </x-frontend.header>

    @push('styles')
        <style>
            .graduation-search-section {
                padding: 60px 0;
            }
            .search-card {
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 4px 24px rgba(0,0,0,.06);
                padding: 40px;
                max-width: 520px;
                margin: 0 auto;
            }
            .search-card h3 {
                font-size: 1.3rem;
                font-weight: 700;
                color: var(--black);
                margin-bottom: 6px;
            }
            .search-card p {
                color: #6b7280;
                font-size: .9rem;
                margin-bottom: 24px;
            }
            .search-input-wrap {
                position: relative;
            }
            .search-input-wrap input {
                width: 100%;
                padding: 14px 130px 14px 18px;
                border: 2px solid #e5e7eb;
                border-radius: 12px;
                font-size: 1rem;
                transition: border-color .2s;
                outline: none;
            }
            .search-input-wrap input:focus {
                border-color: var(--primary);
            }
            .search-input-wrap button {
                position: absolute;
                right: 6px;
                top: 50%;
                transform: translateY(-50%);
                padding: 10px 24px;
                border-radius: 10px;
                border: none;
                background: var(--primary);
                color: #fff;
                font-weight: 600;
                font-size: .9rem;
                cursor: pointer;
                transition: opacity .2s;
            }
            .search-input-wrap button:hover {
                opacity: .85;
            }
            .search-input-wrap button:disabled {
                opacity: .5;
                cursor: not-allowed;
            }

            /* Result Card */
            .result-area {
                max-width: 520px;
                margin: 28px auto 0;
                display: none;
            }
            .result-card {
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 24px rgba(0,0,0,.06);
            }
            .result-card.passed {
                border: 2px solid #22c55e;
            }
            .result-card.failed {
                border: 2px solid #ef4444;
            }
            .result-header {
                padding: 20px 24px;
                text-align: center;
                color: #fff;
            }
            .result-card.passed .result-header {
                background: linear-gradient(135deg, #22c55e, #16a34a);
            }
            .result-card.failed .result-header {
                background: linear-gradient(135deg, #ef4444, #dc2626);
            }
            .result-header .status-icon {
                font-size: 2.2rem;
                margin-bottom: 4px;
            }
            .result-header h4 {
                font-size: 1.1rem;
                font-weight: 700;
                margin: 0;
                color: #fff;
            }
            .result-body {
                background: #fff;
                padding: 28px 24px;
            }
            .student-info {
                display: flex;
                align-items: center;
                gap: 18px;
                margin-bottom: 20px;
            }
            .student-photo {
                width: 72px;
                height: 72px;
                border-radius: 50%;
                object-fit: cover;
                border: 3px solid #e5e7eb;
                flex-shrink: 0;
            }
            .student-photo-placeholder {
                width: 72px;
                height: 72px;
                border-radius: 50%;
                background: #f3f4f6;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
                border: 3px solid #e5e7eb;
            }
            .student-photo-placeholder i {
                font-size: 2rem;
                color: #9ca3af;
            }
            .student-detail h3 {
                font-size: 1.2rem;
                font-weight: 700;
                color: var(--black);
                margin: 0 0 4px;
            }
            .student-detail span {
                font-size: .85rem;
                color: #6b7280;
            }
            .doc-downloads {
                display: flex;
                gap: 10px;
            }
            .doc-btn {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                padding: 12px 16px;
                border-radius: 10px;
                border: 2px solid #e5e7eb;
                background: #f9fafb;
                color: var(--black);
                font-weight: 600;
                font-size: .85rem;
                text-decoration: none;
                transition: all .2s;
            }
            .doc-btn:hover {
                border-color: var(--primary);
                color: var(--primary);
                background: #fff;
            }
            .doc-btn i {
                font-size: 1.1rem;
            }

            /* Not Found */
            .not-found-card {
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 4px 24px rgba(0,0,0,.06);
                padding: 40px 24px;
                text-align: center;
                border: 2px solid #e5e7eb;
            }
            .not-found-card i {
                font-size: 2.5rem;
                color: #d1d5db;
                margin-bottom: 12px;
            }
            .not-found-card h5 {
                font-weight: 700;
                color: var(--black);
                margin-bottom: 4px;
            }
            .not-found-card p {
                color: #6b7280;
                font-size: .9rem;
                margin: 0;
            }

            /* Loading */
            .spinner-border-sm {
                width: 1rem;
                height: 1rem;
            }

            @media (max-width: 576px) {
                .search-card {
                    padding: 24px 20px;
                }
                .doc-downloads {
                    flex-direction: column;
                }
                .student-info {
                    gap: 14px;
                }
                .student-photo, .student-photo-placeholder {
                    width: 56px;
                    height: 56px;
                }
            }
        </style>
    @endpush

    <section class="graduation-search-section">
        <div class="container">
            <div class="search-card">
                <h3>Cek Hasil Kelulusan</h3>
                <p>Masukkan nomor ujian untuk melihat hasil kelulusan</p>
                <div class="search-input-wrap">
                    <input type="text" id="search" placeholder="Masukkan nomor ujian..." autocomplete="off">
                    <button id="btn">Cek Hasil</button>
                </div>
            </div>

            <div class="result-area" id="resultArea">
                {{-- Result will be injected here --}}
            </div>
        </div>
    </section>

    @push('plugin-scripts')
        <script src="https://cdn.jsdelivr.net/npm/tsparticles-confetti@2.10.1/tsparticles.confetti.bundle.min.js"></script>
    @endpush

    @push('custom-scripts')
        <script>
            const sound = new Audio('{{ asset('frontend/assets/win.mp3') }}');

            function renderResult(data) {
                const isPassed = data.status === 'passed';
                const statusClass = isPassed ? 'passed' : 'failed';
                const statusText = isPassed ? 'LULUS' : 'TIDAK LULUS';
                const statusIcon = isPassed ? 'bi-check-circle-fill' : 'bi-x-circle-fill';
                const statusMsg = isPassed
                    ? 'Selamat! Kamu dinyatakan lulus.'
                    : 'Mohon maaf, kamu dinyatakan tidak lulus.';

                let photoHtml = '';
                if (data.photo) {
                    photoHtml = `<img src="${data.photo}" alt="Foto" class="student-photo">`;
                } else {
                    photoHtml = `<div class="student-photo-placeholder"><i class="bi bi-person-fill"></i></div>`;
                }

                let docsHtml = '';
                if (isPassed) {
                    const sklBtn = data.skl_file
                        ? `<a href="${data.skl_file}" target="_blank" class="doc-btn"><i class="bi bi-file-earmark-text"></i> Download SKL</a>`
                        : `<span class="doc-btn" style="opacity:.4;cursor:default"><i class="bi bi-file-earmark-text"></i> SKL belum tersedia</span>`;
                    const sknBtn = data.skn_file
                        ? `<a href="${data.skn_file}" target="_blank" class="doc-btn"><i class="bi bi-file-earmark-ruled"></i> Download Nilai</a>`
                        : `<span class="doc-btn" style="opacity:.4;cursor:default"><i class="bi bi-file-earmark-ruled"></i> Nilai belum tersedia</span>`;
                    docsHtml = `<div class="doc-downloads">${sklBtn}${sknBtn}</div>`;
                }

                return `
                    <div class="result-card ${statusClass}">
                        <div class="result-header">
                            <div class="status-icon"><i class="bi ${statusIcon}"></i></div>
                            <h4>${statusMsg}</h4>
                        </div>
                        <div class="result-body">
                            <div class="student-info">
                                ${photoHtml}
                                <div class="student-detail">
                                    <h3>${data.name}</h3>
                                    <span>No. Ujian: ${data.test_number}</span>
                                </div>
                            </div>
                            ${docsHtml}
                        </div>
                    </div>
                `;
            }

            function renderNotFound() {
                return `
                    <div class="not-found-card">
                        <i class="bi bi-search"></i>
                        <h5>Data Tidak Ditemukan</h5>
                        <p>Pastikan nomor ujian yang dimasukkan sudah benar</p>
                    </div>
                `;
            }

            $(document).ready(function() {
                $('#search').on('keypress', function(e) {
                    if (e.which === 13) $('#btn').click();
                });

                $('#btn').click(function() {
                    var test_number = $('#search').val().trim();
                    if (!test_number) return;

                    var $btn = $(this);
                    $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

                    $.ajax({
                        url: "/api/graduation",
                        method: "GET",
                        data: { test_number: test_number },
                        success: function(data) {
                            var $area = $('#resultArea');

                            if (data.message === 'Data ditemukan') {
                                $area.html(renderResult(data.data)).fadeIn(300);

                                if (data.data.status === 'passed') {
                                    confetti({
                                        particleCount: 300,
                                        spread: 200,
                                        origin: { y: 0.6 },
                                    });
                                    sound.play();
                                }
                            } else {
                                $area.html(renderNotFound()).fadeIn(300);
                            }
                        },
                        error: function() {
                            $('#resultArea').html(renderNotFound()).fadeIn(300);
                        },
                        complete: function() {
                            $btn.prop('disabled', false).html('Cek Hasil');
                        }
                    });
                });
            });
        </script>
    @endpush
</x-layouts.frontend>
