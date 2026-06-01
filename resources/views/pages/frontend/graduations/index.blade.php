<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengumuman Kelulusan - {{ getWebConfiguration()->name }}</title>
    <link rel="shortcut icon" href="{{ asset(getWebConfiguration()->logo) }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: "Poppins", sans-serif; }

        .grad-bg {
            min-height: 100vh;
            background: linear-gradient(135deg, #0F122A 0%, #1a1f4e 50%, #0F122A 100%);
            position: relative;
            overflow: hidden;
        }
        .grad-bg::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(ellipse at 30% 20%, rgba(0, 122, 255, 0.15) 0%, transparent 50%),
                        radial-gradient(ellipse at 70% 80%, rgba(179, 252, 106, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        .search-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .result-card { border-radius: 24px; overflow: hidden; }
        .result-card.passed { border: 2px solid #22c55e; }
        .result-card.failed { border: 2px solid #ef4444; }
        .result-header { padding: 24px; text-align: center; color: #fff; }
        .result-card.passed .result-header { background: linear-gradient(135deg, #22c55e, #16a34a); }
        .result-card.failed .result-header { background: linear-gradient(135deg, #ef4444, #dc2626); }
        .result-body { background: #fff; padding: 28px 24px; }
        .student-photo { width: 72px; height: 72px; border-radius: 50%; object-fit: cover; border: 3px solid #e5e7eb; flex-shrink: 0; }
        .student-photo-placeholder { width: 72px; height: 72px; border-radius: 50%; background: #f3f4f6; display: flex; align-items: center; justify-content: center; flex-shrink: 0; border: 3px solid #e5e7eb; }
        .doc-btn { flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 16px; border-radius: 14px; border: 2px solid #e5e7eb; background: #f9fafb; font-weight: 600; font-size: .85rem; text-decoration: none; transition: all .2s; color: #181C39; }
        .doc-btn:hover { border-color: #007AFF; color: #007AFF; }

        .float-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.06;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="grad-bg">
        <!-- Floating decorative circles -->
        <div class="float-circle" style="width:400px;height:400px;background:#007AFF;top:-100px;right:-100px;"></div>
        <div class="float-circle" style="width:300px;height:300px;background:#B3FC6A;bottom:-80px;left:-80px;"></div>
        <div class="float-circle" style="width:200px;height:200px;background:#007AFF;bottom:20%;right:10%;"></div>

        <div class="relative z-10 flex flex-col items-center justify-center min-h-screen px-4 py-12">
            <!-- Logo & School Name -->
            <div class="text-center mb-8">
                <img src="{{ asset(getWebConfiguration()->logo) }}" alt="Logo" class="h-20 w-20 mx-auto rounded-full bg-white p-1 shadow-lg mb-4">
                <h1 class="text-white font-bold text-2xl md:text-3xl mb-1">Pengumuman Kelulusan</h1>
                <p class="text-white/60 text-sm md:text-base">{{ getWebConfiguration()->name }}</p>
            </div>

            <div class="w-full max-w-[480px]">
                <!-- Search Card -->
                <div id="searchCard" class="search-card rounded-3xl p-8">
                    <h3 class="text-white font-bold text-lg mb-1">Cek Hasil Kelulusan</h3>
                    <p class="text-white/50 text-sm mb-6">Masukkan NISN dan Tanggal Lahir untuk verifikasi</p>

                    <div class="flex flex-col gap-3">
                        <input type="text" id="search" placeholder="NISN / Nomor Ujian" autocomplete="off"
                            class="w-full rounded-2xl bg-white/10 border border-white/20 px-5 py-4 text-white font-semibold placeholder:text-white/30 outline-none transition-all duration-300 focus:ring-2 focus:ring-bl-blue focus:border-transparent focus:bg-white/15">
                        <input type="date" id="birthdate" autocomplete="off"
                            class="w-full rounded-2xl bg-white/10 border border-white/20 px-5 py-4 text-white font-semibold placeholder:text-white/30 outline-none transition-all duration-300 focus:ring-2 focus:ring-bl-blue focus:border-transparent focus:bg-white/15">
                    </div>
                    <button id="btn" class="w-full mt-4 rounded-2xl bg-bl-blue text-white font-semibold py-4 px-6 transition-all duration-300 hover:shadow-[0_8px_30px_0_#007AFF80] disabled:opacity-50 text-sm">
                        Cek Hasil Kelulusan
                    </button>
                </div>

                <!-- Result Area (replaces search card) -->
                <div id="resultArea" style="display:none;"></div>
            </div>

            <!-- Back to home -->
            <a href="{{ route('home') }}" class="mt-8 text-white/40 text-sm hover:text-white/70 transition-colors flex items-center gap-2">
                <i class="bi bi-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles-confetti@2.10.1/tsparticles.confetti.bundle.min.js"></script>

    <script>
        const sound = new Audio('{{ asset('frontend/assets/win.mp3') }}');

        function renderResult(data) {
            const isPassed = data.status === 'passed';
            const statusClass = isPassed ? 'passed' : 'failed';
            const statusIcon = isPassed ? 'bi-check-circle-fill' : 'bi-x-circle-fill';
            const statusMsg = isPassed ? 'Selamat! Kamu dinyatakan LULUS' : 'Mohon maaf, kamu dinyatakan TIDAK LULUS';
            let photoHtml = data.photo
                ? `<img src="${data.photo}" alt="Foto" class="student-photo">`
                : `<div class="student-photo-placeholder"><i class="bi bi-person-fill" style="font-size:2rem;color:#9ca3af"></i></div>`;
            let docsHtml = '';
            if (isPassed) {
                const sklBtn = data.skl_file
                    ? `<a href="${data.skl_file}" target="_blank" class="doc-btn"><i class="bi bi-file-earmark-text"></i> Download SKL</a>`
                    : `<span class="doc-btn" style="opacity:.4;cursor:default"><i class="bi bi-file-earmark-text"></i> SKL belum tersedia</span>`;
                const sknBtn = data.skn_file
                    ? `<a href="${data.skn_file}" target="_blank" class="doc-btn"><i class="bi bi-file-earmark-ruled"></i> Download Nilai</a>`
                    : `<span class="doc-btn" style="opacity:.4;cursor:default"><i class="bi bi-file-earmark-ruled"></i> Nilai belum tersedia</span>`;
                docsHtml = `<div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:20px">${sklBtn}${sknBtn}</div>`;
            }
            return `<div class="result-card ${statusClass}">
                <div class="result-header">
                    <div style="font-size:2.5rem;margin-bottom:8px"><i class="bi ${statusIcon}"></i></div>
                    <h4 style="font-weight:700;color:#fff;margin:0;font-size:1.1rem">${statusMsg}</h4>
                </div>
                <div class="result-body">
                    <div style="display:flex;align-items:center;gap:18px;margin-bottom:20px">
                        ${photoHtml}
                        <div>
                            <h3 style="font-size:1.15rem;font-weight:700;margin:0 0 4px">${data.name}</h3>
                            <span style="font-size:.85rem;color:#6b7280">No. Ujian: ${data.test_number}</span>
                        </div>
                    </div>
                    ${docsHtml}
                </div>
            </div>`;
        }

        function renderNotFound() {
            return `<div style="background:#fff;border-radius:24px;border:2px solid #e5e7eb;padding:40px 24px;text-align:center">
                <i class="bi bi-search" style="font-size:2.5rem;color:#d1d5db;display:block;margin-bottom:12px"></i>
                <h5 style="font-weight:700;margin-bottom:4px">Data Tidak Ditemukan</h5>
                <p style="color:#6b7280;font-size:.9rem;margin:0">Pastikan NISN dan tanggal lahir yang dimasukkan sudah benar</p>
            </div>`;
        }

        function showResult(html) {
            $('#searchCard').fadeOut(200, function() {
                var backBtn = `<button id="btnBack" style="display:flex;align-items:center;gap:8px;margin-top:16px;padding:12px 24px;border-radius:9999px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);color:rgba(255,255,255,0.6);font-size:.85rem;font-weight:600;cursor:pointer;transition:all .2s;width:100%;justify-content:center;" onmouseover="this.style.background='rgba(255,255,255,0.15)';this.style.color='#fff'" onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='rgba(255,255,255,0.6)'"><i class="bi bi-arrow-left"></i> Cek Lagi</button>`;
                $('#resultArea').html(html + backBtn).fadeIn(300);
                $('#btnBack').click(function() {
                    $('#resultArea').fadeOut(200, function() {
                        $(this).empty();
                        $('#search').val('');
                        $('#birthdate').val('');
                        $('#searchCard').fadeIn(300);
                    });
                });
            });
        }

        $(document).ready(function() {
            $('#birthdate').on('keypress', function(e) { if (e.which === 13) $('#btn').click(); });
            $('#search').on('keypress', function(e) { if (e.which === 13) $('#btn').click(); });
            $('#btn').click(function() {
                var test_number = $('#search').val().trim();
                var birthdate = $('#birthdate').val();
                if (!test_number || !birthdate) return;
                var $btn = $(this);
                $btn.prop('disabled', true).html('<span style="display:inline-block;width:16px;height:16px;border:2px solid #fff;border-top-color:transparent;border-radius:50%;animation:spin .6s linear infinite"></span>');
                $.ajax({
                    url: "/api/graduation", method: "GET",
                    data: { test_number: test_number, birthdate: birthdate },
                    success: function(data) {
                        if (data.message === 'Data ditemukan') {
                            showResult(renderResult(data.data));
                            if (data.data.status === 'passed') {
                                setTimeout(function() {
                                    confetti({ particleCount: 300, spread: 200, origin: { y: 0.6 } });
                                    sound.play();
                                }, 250);
                            }
                        } else {
                            showResult(renderNotFound());
                        }
                    },
                    error: function() { showResult(renderNotFound()); },
                    complete: function() { $btn.prop('disabled', false).html('Cek Hasil Kelulusan'); }
                });
            });
        });
    </script>

    <style>
        @keyframes spin { to { transform: rotate(360deg); } }
        input[type="date"]::-webkit-calendar-picker-indicator { filter: invert(1) opacity(0.5); cursor: pointer; }
        input[type="date"]:invalid::-webkit-datetime-edit { color: rgba(255,255,255,0.3); }
    </style>
</body>
</html>
