<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DummyDataSeeder extends Seeder
{
    /**
     * Seed ALL tables with comprehensive dummy data for SMPN 2 Paguyangan.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->createPlaceholderImages();
        $this->seedWebConfiguration();
        $this->seedBanners();
        $this->seedGalleries();
        $this->seedAchievements();
        $this->seedTeachers();
        $this->seedExtracurriculars();
        $this->seedStudents();
        $this->seedNewsCategories();
        $this->seedNews();
        $this->seedGuestBooks();
        $this->seedGraduations();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Create placeholder images in storage for seeding.
     */
    private function createPlaceholderImages(): void
    {
        $directories = [
            'assets/banners',
            'assets/galleries',
            'assets/teachers',
            'assets/extracurricular',
            'assets/news/thumbnails',
            'assets/web-configurations',
        ];

        foreach ($directories as $dir) {
            Storage::disk('public')->makeDirectory($dir);
        }

        // Generate placeholder images using GD
        $images = [
            // Banners (1200x400)
            'assets/banners/banner-1.jpg' => [1200, 400, [0, 122, 255], 'SMPN 2 Paguyangan'],
            'assets/banners/banner-2.jpg' => [1200, 400, [15, 18, 42], 'Sekolah Unggul'],
            'assets/banners/banner-3.jpg' => [1200, 400, [34, 139, 34], 'Prestasi Gemilang'],
            'assets/banners/banner-1-mobile.jpg' => [600, 800, [0, 122, 255], 'SMPN 2'],
            'assets/banners/banner-2-mobile.jpg' => [600, 800, [15, 18, 42], 'Unggul'],
            'assets/banners/banner-3-mobile.jpg' => [600, 800, [34, 139, 34], 'Prestasi'],

            // Galleries (800x600)
            'assets/galleries/gallery-1.jpg' => [800, 600, [0, 122, 255], 'Upacara Bendera'],
            'assets/galleries/gallery-2.jpg' => [800, 600, [255, 159, 71], 'Lomba Pramuka'],
            'assets/galleries/gallery-3.jpg' => [800, 600, [179, 252, 106], 'Class Meeting'],
            'assets/galleries/gallery-4.jpg' => [800, 600, [242, 80, 34], 'Pentas Seni'],
            'assets/galleries/gallery-5.jpg' => [800, 600, [128, 0, 128], 'Wisuda Kelas 9'],
            'assets/galleries/gallery-6.jpg' => [800, 600, [0, 100, 0], 'Olahraga'],
            'assets/galleries/gallery-7.jpg' => [800, 600, [70, 130, 180], 'Lab Komputer'],
            'assets/galleries/gallery-8.jpg' => [800, 600, [210, 105, 30], 'Perpustakaan'],

            // Teachers (400x500)
            'assets/teachers/teacher-1.jpg' => [400, 500, [51, 51, 51], 'Guru 1'],
            'assets/teachers/teacher-2.jpg' => [400, 500, [68, 68, 68], 'Guru 2'],
            'assets/teachers/teacher-3.jpg' => [400, 500, [85, 85, 85], 'Guru 3'],
            'assets/teachers/teacher-4.jpg' => [400, 500, [51, 51, 51], 'Guru 4'],
            'assets/teachers/teacher-5.jpg' => [400, 500, [68, 68, 68], 'Guru 5'],
            'assets/teachers/teacher-6.jpg' => [400, 500, [85, 85, 85], 'Guru 6'],
            'assets/teachers/teacher-7.jpg' => [400, 500, [51, 51, 51], 'Guru 7'],
            'assets/teachers/teacher-8.jpg' => [400, 500, [68, 68, 68], 'Guru 8'],
            'assets/teachers/teacher-9.jpg' => [400, 500, [85, 85, 85], 'Guru 9'],
            'assets/teachers/teacher-10.jpg' => [400, 500, [51, 51, 51], 'Guru 10'],
            'assets/teachers/teacher-11.jpg' => [400, 500, [68, 68, 68], 'Guru 11'],
            'assets/teachers/teacher-12.jpg' => [400, 500, [85, 85, 85], 'Guru 12'],
            'assets/teachers/teacher-13.jpg' => [400, 500, [51, 51, 51], 'Guru 13'],
            'assets/teachers/teacher-14.jpg' => [400, 500, [68, 68, 68], 'Guru 14'],
            'assets/teachers/teacher-15.jpg' => [400, 500, [85, 85, 85], 'Guru 15'],

            // Extracurricular (800x500)
            'assets/extracurricular/ekskul-1.jpg' => [800, 500, [0, 122, 255], 'Pramuka'],
            'assets/extracurricular/ekskul-2.jpg' => [800, 500, [34, 139, 34], 'Sepak Bola'],
            'assets/extracurricular/ekskul-3.jpg' => [800, 500, [255, 159, 71], 'Bola Voli'],
            'assets/extracurricular/ekskul-4.jpg' => [800, 500, [128, 0, 128], 'Seni Tari'],
            'assets/extracurricular/ekskul-5.jpg' => [800, 500, [242, 80, 34], 'PMR'],
            'assets/extracurricular/ekskul-6.jpg' => [800, 500, [70, 130, 180], 'English Club'],
            'assets/extracurricular/ekskul-7.jpg' => [800, 500, [210, 105, 30], 'Robotik'],
            'assets/extracurricular/ekskul-8.jpg' => [800, 500, [0, 100, 0], 'Pencak Silat'],

            // News thumbnails (800x450)
            'assets/news/thumbnails/news-1.jpg' => [800, 450, [0, 122, 255], 'Berita 1'],
            'assets/news/thumbnails/news-2.jpg' => [800, 450, [34, 139, 34], 'Berita 2'],
            'assets/news/thumbnails/news-3.jpg' => [800, 450, [255, 159, 71], 'Berita 3'],
            'assets/news/thumbnails/news-4.jpg' => [800, 450, [242, 80, 34], 'Berita 4'],
            'assets/news/thumbnails/news-5.jpg' => [800, 450, [128, 0, 128], 'Berita 5'],
            'assets/news/thumbnails/news-6.jpg' => [800, 450, [70, 130, 180], 'Berita 6'],
            'assets/news/thumbnails/news-7.jpg' => [800, 450, [210, 105, 30], 'Berita 7'],
            'assets/news/thumbnails/news-8.jpg' => [800, 450, [0, 100, 0], 'Berita 8'],
            'assets/news/thumbnails/news-9.jpg' => [800, 450, [51, 51, 51], 'Berita 9'],
            'assets/news/thumbnails/news-10.jpg' => [800, 450, [85, 85, 85], 'Berita 10'],

            // Web config
            'assets/web-configurations/logo.png' => [200, 200, [0, 122, 255], 'LOGO'],
            'assets/web-configurations/headmaster.jpg' => [400, 500, [15, 18, 42], 'Kepala Sekolah'],
            'assets/web-configurations/struktur.jpg' => [1000, 700, [240, 240, 240], 'Struktur Organisasi'],
        ];

        foreach ($images as $path => [$w, $h, $color, $text]) {
            $storagePath = Storage::disk('public')->path($path);
            if (!file_exists($storagePath)) {
                $this->createPlaceholderImage($storagePath, $w, $h, $color, $text);
            }
        }

        $this->command->info('Placeholder images created.');
    }

    private function createPlaceholderImage(string $path, int $w, int $h, array $bgColor, string $text): void
    {
        $img = imagecreatetruecolor($w, $h);
        $bg = imagecolorallocate($img, $bgColor[0], $bgColor[1], $bgColor[2]);
        imagefill($img, 0, 0, $bg);

        // Add text
        $white = imagecolorallocate($img, 255, 255, 255);
        $fontSize = 5;
        $textWidth = imagefontwidth($fontSize) * strlen($text);
        $textHeight = imagefontheight($fontSize);
        $x = ($w - $textWidth) / 2;
        $y = ($h - $textHeight) / 2;
        imagestring($img, $fontSize, (int) $x, (int) $y, $text, $white);

        // Add dimensions label
        $dimText = "{$w}x{$h}";
        $dimWidth = imagefontwidth(3) * strlen($dimText);
        imagestring($img, 3, (int)(($w - $dimWidth) / 2), (int)($y + $textHeight + 10), $dimText, $white);

        $dir = dirname($path);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        if (str_ends_with($path, '.png')) {
            imagepng($img, $path);
        } else {
            imagejpeg($img, $path, 85);
        }
        imagedestroy($img);
    }

    private function seedWebConfiguration(): void
    {
        DB::table('web_configurations')->truncate();

        DB::table('web_configurations')->insert([
            'id' => Str::uuid(),
            'name' => 'SMP Negeri 2 Paguyangan',
            'description' => 'SMP Negeri 2 Paguyangan adalah sekolah menengah pertama negeri yang berlokasi di Kecamatan Paguyangan, Kabupaten Brebes, Jawa Tengah. Sekolah ini berkomitmen untuk mencetak generasi muda yang berilmu, berakhlak mulia, dan berprestasi.',
            'email' => 'info@smpn2paguyangan.sch.id',
            'phone' => '(0289) 432156',
            'logo' => 'assets/web-configurations/logo.png',
            'address' => 'Jl. Raya Paguyangan No. 45, Kecamatan Paguyangan, Kabupaten Brebes, Jawa Tengah 52276',
            'theme_color' => '#007AFF',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0!2d109.1!3d-7.2!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTInMDAuMCJTIDEwOcKwMDYnMDAuMCJF!5e0!3m2!1sid!2sid!4v1600000000000" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'facebook' => 'https://facebook.com/smpn2paguyangan',
            'instagram' => 'https://instagram.com/smpn2paguyangan',
            'youtube' => 'https://youtube.com/@smpn2paguyangan',
            'headmaster_name' => 'Drs. H. Supriyadi, M.Pd.',
            'headmaster_image' => 'assets/web-configurations/headmaster.jpg',
            'headmaster_message' => 'Assalamu\'alaikum Wr. Wb. Puji syukur kehadirat Allah SWT atas segala rahmat dan karunia-Nya. Selamat datang di website resmi SMP Negeri 2 Paguyangan. Pendidikan adalah investasi terbaik untuk masa depan. Di SMPN 2 Paguyangan, kami berkomitmen untuk memberikan pendidikan berkualitas yang tidak hanya mengembangkan kecerdasan intelektual, tetapi juga karakter dan akhlak mulia. Kami percaya bahwa setiap siswa memiliki potensi unik yang perlu dikembangkan. Melalui berbagai program akademik dan non-akademik, kami berupaya membentuk generasi muda yang siap menghadapi tantangan masa depan. Semoga website ini dapat menjadi sarana informasi dan komunikasi yang bermanfaat bagi seluruh warga sekolah dan masyarakat. Wassalamu\'alaikum Wr. Wb.',
            'vision' => 'Terwujudnya peserta didik yang beriman, bertakwa, berakhlak mulia, berprestasi, berbudaya lingkungan, dan berwawasan global.',
            'mission' => "1. Melaksanakan pembelajaran dan bimbingan secara efektif untuk mengoptimalkan potensi peserta didik.\n2. Menumbuhkan semangat keunggulan kepada seluruh warga sekolah.\n3. Mendorong dan membantu peserta didik untuk mengenali potensi dirinya agar dapat berkembang secara optimal.\n4. Menumbuhkan penghayatan dan pengamalan ajaran agama yang dianut dan budaya bangsa.\n5. Menerapkan manajemen partisipatif dengan melibatkan seluruh warga sekolah dan komite sekolah.\n6. Mewujudkan sekolah yang bersih, hijau, dan sehat.\n7. Mengembangkan budaya literasi di lingkungan sekolah.\n8. Meningkatkan kompetensi guru dan tenaga kependidikan melalui pelatihan dan pengembangan profesional.",
            'organization_structure' => 'assets/web-configurations/struktur.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info('Web Configuration seeded.');
    }

    private function seedBanners(): void
    {
        DB::table('banners')->truncate();

        $banners = [
            ['desktop_image' => 'assets/banners/banner-1.jpg', 'mobile_image' => 'assets/banners/banner-1-mobile.jpg'],
            ['desktop_image' => 'assets/banners/banner-2.jpg', 'mobile_image' => 'assets/banners/banner-2-mobile.jpg'],
            ['desktop_image' => 'assets/banners/banner-3.jpg', 'mobile_image' => 'assets/banners/banner-3-mobile.jpg'],
        ];

        foreach ($banners as $banner) {
            DB::table('banners')->insert(array_merge($banner, [
                'id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->command->info('Banners seeded (3).');
    }

    private function seedGalleries(): void
    {
        DB::table('galleries')->truncate();

        $galleries = [
            ['title' => 'Upacara Bendera Hari Senin', 'description' => 'Pelaksanaan upacara bendera rutin setiap hari Senin yang diikuti oleh seluruh warga sekolah.', 'image' => 'assets/galleries/gallery-1.jpg'],
            ['title' => 'Lomba Pramuka Tingkat Kabupaten', 'description' => 'Kontingen pramuka SMPN 2 Paguyangan mengikuti lomba tingkat kabupaten Brebes dan meraih juara.', 'image' => 'assets/galleries/gallery-2.jpg'],
            ['title' => 'Class Meeting Semester Ganjil', 'description' => 'Kegiatan class meeting yang diadakan setelah ujian akhir semester ganjil dengan berbagai perlombaan antar kelas.', 'image' => 'assets/galleries/gallery-3.jpg'],
            ['title' => 'Pentas Seni Peringatan Hari Pendidikan', 'description' => 'Penampilan seni budaya dari siswa-siswi dalam rangka memperingati Hari Pendidikan Nasional.', 'image' => 'assets/galleries/gallery-4.jpg'],
            ['title' => 'Wisuda dan Perpisahan Kelas 9', 'description' => 'Acara wisuda dan perpisahan siswa kelas 9 yang dilaksanakan dengan khidmat dan penuh haru.', 'image' => 'assets/galleries/gallery-5.jpg'],
            ['title' => 'Pertandingan Olahraga Antar Sekolah', 'description' => 'Tim olahraga sekolah bertanding dalam kejuaraan antar SMP se-Kecamatan Paguyangan.', 'image' => 'assets/galleries/gallery-6.jpg'],
            ['title' => 'Praktikum di Laboratorium Komputer', 'description' => 'Siswa-siswi melaksanakan praktikum mata pelajaran TIK di laboratorium komputer sekolah.', 'image' => 'assets/galleries/gallery-7.jpg'],
            ['title' => 'Kegiatan Literasi di Perpustakaan', 'description' => 'Program literasi sekolah yang dilaksanakan di perpustakaan dengan kegiatan membaca dan bedah buku.', 'image' => 'assets/galleries/gallery-8.jpg'],
        ];

        foreach ($galleries as $gallery) {
            DB::table('galleries')->insert(array_merge($gallery, [
                'id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->command->info('Galleries seeded (8).');
    }

    private function seedAchievements(): void
    {
        DB::table('achievements')->truncate();

        $achievements = [
            ['name' => 'Tim Pramuka SMPN 2 Paguyangan', 'achievement' => 'Juara 1 Lomba Pramuka Penggalang', 'level' => 'Kabupaten', 'year' => '2025'],
            ['name' => 'Rina Amelia', 'achievement' => 'Juara 2 Lomba Pidato Bahasa Indonesia', 'level' => 'Provinsi', 'year' => '2025'],
            ['name' => 'Muhammad Farhan', 'achievement' => 'Juara 1 Olimpiade Matematika', 'level' => 'Kabupaten', 'year' => '2025'],
            ['name' => 'Siti Aisyah', 'achievement' => 'Juara 3 Lomba Menulis Cerpen', 'level' => 'Provinsi', 'year' => '2024'],
            ['name' => 'Tim Futsal SMPN 2', 'achievement' => 'Juara 1 Turnamen Futsal Antar SMP', 'level' => 'Kecamatan', 'year' => '2024'],
            ['name' => 'Dina Rahmawati', 'achievement' => 'Juara 2 Lomba Cerdas Cermat IPA', 'level' => 'Kabupaten', 'year' => '2024'],
            ['name' => 'Ahmad Rizky', 'achievement' => 'Juara 1 Lomba Tilawatil Quran', 'level' => 'Kecamatan', 'year' => '2024'],
            ['name' => 'Tim Voli Putri', 'achievement' => 'Juara 2 Kejuaraan Bola Voli', 'level' => 'Kabupaten', 'year' => '2023'],
            ['name' => 'Nadia Putri', 'achievement' => 'Juara 1 Lomba Seni Lukis', 'level' => 'Provinsi', 'year' => '2023'],
            ['name' => 'Bagus Prasetyo', 'achievement' => 'Juara 3 Olimpiade IPS', 'level' => 'Kabupaten', 'year' => '2023'],
            ['name' => 'Tim Robotik', 'achievement' => 'Juara 1 Lomba Robotik Tingkat SMP', 'level' => 'Provinsi', 'year' => '2023'],
            ['name' => 'Larasati Dewi', 'achievement' => 'Juara 1 Lomba Tari Tradisional', 'level' => 'Kabupaten', 'year' => '2023'],
            ['name' => 'Fajar Nugroho', 'achievement' => 'Juara 2 Lomba Baca Puisi', 'level' => 'Kecamatan', 'year' => '2022'],
            ['name' => 'Tim PMR', 'achievement' => 'Juara 3 Lomba PMR Madya', 'level' => 'Kabupaten', 'year' => '2022'],
            ['name' => 'Indah Permatasari', 'achievement' => 'Juara 1 Lomba Bahasa Inggris', 'level' => 'Kabupaten', 'year' => '2022'],
        ];

        foreach ($achievements as $achievement) {
            DB::table('achievements')->insert(array_merge($achievement, [
                'id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->command->info('Achievements seeded (15).');
    }

    private function seedTeachers(): void
    {
        DB::table('extracurriculars')->truncate();
        DB::table('teachers')->truncate();

        $teachers = [
            ['name' => 'Drs. H. Supriyadi, M.Pd.', 'gender' => 'L', 'position' => 'Kepala Sekolah', 'nip' => '196508121990031005', 'birthplace' => 'Brebes', 'birthdate' => '1965-08-12', 'phone' => '081234567890', 'address' => 'Jl. Raya Paguyangan No. 10, Brebes', 'image' => 'assets/teachers/teacher-1.jpg', 'status' => 'active'],
            ['name' => 'Hj. Siti Aminah, S.Pd.', 'gender' => 'P', 'position' => 'Wakil Kepala Sekolah', 'nip' => '197003251994032008', 'birthplace' => 'Brebes', 'birthdate' => '1970-03-25', 'phone' => '081234567891', 'address' => 'Ds. Paguyangan, Brebes', 'image' => 'assets/teachers/teacher-2.jpg', 'status' => 'active'],
            ['name' => 'Ahmad Fathoni, S.Pd.', 'gender' => 'L', 'position' => 'Guru Matematika', 'nip' => '198205142006041012', 'birthplace' => 'Tegal', 'birthdate' => '1982-05-14', 'phone' => '081234567892', 'address' => 'Jl. Diponegoro No. 5, Paguyangan', 'image' => 'assets/teachers/teacher-3.jpg', 'status' => 'active'],
            ['name' => 'Rina Wulandari, S.Pd.', 'gender' => 'P', 'position' => 'Guru Bahasa Indonesia', 'nip' => '198507182008042015', 'birthplace' => 'Purwokerto', 'birthdate' => '1985-07-18', 'phone' => '081234567893', 'address' => 'Ds. Winduaji, Paguyangan', 'image' => 'assets/teachers/teacher-4.jpg', 'status' => 'active'],
            ['name' => 'Budi Hartono, S.Pd.', 'gender' => 'L', 'position' => 'Guru IPA', 'nip' => '198009302005011008', 'birthplace' => 'Brebes', 'birthdate' => '1980-09-30', 'phone' => '081234567894', 'address' => 'Jl. Ahmad Yani No. 15, Bumiayu', 'image' => 'assets/teachers/teacher-5.jpg', 'status' => 'active'],
            ['name' => 'Dewi Lestari, S.Pd.', 'gender' => 'P', 'position' => 'Guru IPS', 'nip' => '198712052010042018', 'birthplace' => 'Cilacap', 'birthdate' => '1987-12-05', 'phone' => '081234567895', 'address' => 'Ds. Kedungoleng, Paguyangan', 'image' => 'assets/teachers/teacher-6.jpg', 'status' => 'active'],
            ['name' => 'Agus Setiawan, S.Pd.', 'gender' => 'L', 'position' => 'Guru Bahasa Inggris', 'nip' => '197811222003121006', 'birthplace' => 'Semarang', 'birthdate' => '1978-11-22', 'phone' => '081234567896', 'address' => 'Jl. Sudirman No. 8, Paguyangan', 'image' => 'assets/teachers/teacher-7.jpg', 'status' => 'active'],
            ['name' => 'Nur Hidayah, S.Pd.I.', 'gender' => 'P', 'position' => 'Guru Pendidikan Agama Islam', 'nip' => '198304172007042010', 'birthplace' => 'Brebes', 'birthdate' => '1983-04-17', 'phone' => '081234567897', 'address' => 'Ds. Paguyangan, Brebes', 'image' => 'assets/teachers/teacher-8.jpg', 'status' => 'active'],
            ['name' => 'Eko Prasetyo, S.Pd.', 'gender' => 'L', 'position' => 'Guru PJOK', 'nip' => '198601282009041013', 'birthplace' => 'Brebes', 'birthdate' => '1986-01-28', 'phone' => '081234567898', 'address' => 'Ds. Ragatunjung, Paguyangan', 'image' => 'assets/teachers/teacher-9.jpg', 'status' => 'active'],
            ['name' => 'Sri Mulyani, S.Pd.', 'gender' => 'P', 'position' => 'Guru Seni Budaya', 'nip' => '197906142002122009', 'birthplace' => 'Bumiayu', 'birthdate' => '1979-06-14', 'phone' => '081234567899', 'address' => 'Jl. Gatot Subroto No. 3, Bumiayu', 'image' => 'assets/teachers/teacher-10.jpg', 'status' => 'active'],
            ['name' => 'Hendra Gunawan, S.Kom.', 'gender' => 'L', 'position' => 'Guru TIK', 'nip' => '199002112014041016', 'birthplace' => 'Tegal', 'birthdate' => '1990-02-11', 'phone' => '081234567800', 'address' => 'Ds. Cilibur, Paguyangan', 'image' => 'assets/teachers/teacher-11.jpg', 'status' => 'active'],
            ['name' => 'Tri Wahyuni, S.Pd.', 'gender' => 'P', 'position' => 'Guru PKn', 'nip' => '198108032004042011', 'birthplace' => 'Brebes', 'birthdate' => '1981-08-03', 'phone' => '081234567801', 'address' => 'Ds. Pandansari, Paguyangan', 'image' => 'assets/teachers/teacher-12.jpg', 'status' => 'active'],
            ['name' => 'Darmawan, S.Pd.', 'gender' => 'L', 'position' => 'Guru Prakarya', 'nip' => '197512091999031007', 'birthplace' => 'Brebes', 'birthdate' => '1975-12-09', 'phone' => '081234567802', 'address' => 'Ds. Taraban, Paguyangan', 'image' => 'assets/teachers/teacher-13.jpg', 'status' => 'active'],
            ['name' => 'Ratna Sari, S.Pd.', 'gender' => 'P', 'position' => 'Guru BK', 'nip' => '198904252012042014', 'birthplace' => 'Purwokerto', 'birthdate' => '1989-04-25', 'phone' => '081234567803', 'address' => 'Jl. Veteran No. 7, Paguyangan', 'image' => 'assets/teachers/teacher-14.jpg', 'status' => 'active'],
            ['name' => 'Sutarjo, S.Pd.', 'gender' => 'L', 'position' => 'Guru Bahasa Jawa', 'nip' => '196709181991031004', 'birthplace' => 'Brebes', 'birthdate' => '1967-09-18', 'phone' => '081234567804', 'address' => 'Ds. Paguyangan, Brebes', 'image' => 'assets/teachers/teacher-15.jpg', 'status' => 'inactive'],
        ];

        $teacherIds = [];
        foreach ($teachers as $teacher) {
            $id = Str::uuid();
            $teacherIds[] = $id;
            DB::table('teachers')->insert(array_merge($teacher, [
                'id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Store teacher IDs for extracurricular seeding
        $this->teacherIds = $teacherIds;

        $this->command->info('Teachers seeded (15).');
    }

    private array $teacherIds = [];

    private function seedExtracurriculars(): void
    {
        $extracurriculars = [
            ['name' => 'Pramuka', 'description' => 'Gerakan Pramuka adalah organisasi pendidikan nonformal yang menyelenggarakan pendidikan kepramukaan. Kegiatan meliputi tali-temali, sandi, P3K, berkemah, hiking, dan berbagai permainan edukatif. Ekskul wajib bagi seluruh siswa kelas 7 dan 8.', 'image' => 'assets/extracurricular/ekskul-1.jpg', 'teacher_index' => 8, 'status' => 'active'],
            ['name' => 'Sepak Bola', 'description' => 'Ekstrakurikuler sepak bola bertujuan mengembangkan bakat dan minat siswa di bidang olahraga sepak bola. Latihan rutin dilakukan setiap Selasa dan Kamis sore di lapangan sekolah. Tim sekolah aktif mengikuti kompetisi antar SMP.', 'image' => 'assets/extracurricular/ekskul-2.jpg', 'teacher_index' => 8, 'status' => 'active'],
            ['name' => 'Bola Voli', 'description' => 'Ekskul bola voli membina siswa untuk mengembangkan kemampuan bermain voli. Latihan dilakukan setiap Rabu dan Jumat sore. Tim putra dan putri rutin mengikuti kejuaraan tingkat kecamatan dan kabupaten.', 'image' => 'assets/extracurricular/ekskul-3.jpg', 'teacher_index' => 8, 'status' => 'active'],
            ['name' => 'Seni Tari', 'description' => 'Ekstrakurikuler seni tari mengajarkan berbagai tarian tradisional Jawa dan kreasi baru. Siswa belajar gerakan dasar tari, ekspresi, dan koreografi. Penampilan ditampilkan di berbagai acara sekolah dan lomba.', 'image' => 'assets/extracurricular/ekskul-4.jpg', 'teacher_index' => 9, 'status' => 'active'],
            ['name' => 'PMR (Palang Merah Remaja)', 'description' => 'PMR mengajarkan siswa tentang pertolongan pertama, donor darah, dan kemanusiaan. Anggota PMR aktif dalam kegiatan sosial dan membantu penanganan kesehatan di lingkungan sekolah. Latihan setiap Sabtu pagi.', 'image' => 'assets/extracurricular/ekskul-5.jpg', 'teacher_index' => 13, 'status' => 'active'],
            ['name' => 'English Club', 'description' => 'English Club merupakan wadah bagi siswa untuk meningkatkan kemampuan berbahasa Inggris melalui conversation, debate, storytelling, dan speech contest. Kegiatan dilaksanakan setiap Senin dan Rabu sore.', 'image' => 'assets/extracurricular/ekskul-6.jpg', 'teacher_index' => 6, 'status' => 'active'],
            ['name' => 'Robotik', 'description' => 'Ekskul robotik mengajarkan dasar-dasar pemrograman dan perakitan robot sederhana menggunakan Arduino. Siswa belajar logika pemrograman, elektronika dasar, dan bekerja dalam tim untuk membuat proyek robot.', 'image' => 'assets/extracurricular/ekskul-7.jpg', 'teacher_index' => 10, 'status' => 'active'],
            ['name' => 'Pencak Silat', 'description' => 'Ekstrakurikuler pencak silat melatih siswa dalam bela diri tradisional Indonesia. Siswa belajar jurus dasar, teknik pertahanan, dan nilai-nilai budaya. Latihan setiap Selasa dan Kamis sore di aula sekolah.', 'image' => 'assets/extracurricular/ekskul-8.jpg', 'teacher_index' => 8, 'status' => 'active'],
        ];

        foreach ($extracurriculars as $ekskul) {
            $teacherIndex = $ekskul['teacher_index'];
            unset($ekskul['teacher_index']);

            DB::table('extracurriculars')->insert(array_merge($ekskul, [
                'id' => Str::uuid(),
                'teacher_id' => $this->teacherIds[$teacherIndex] ?? $this->teacherIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->command->info('Extracurriculars seeded (8).');
    }

    private function seedStudents(): void
    {
        DB::table('students')->truncate();

        $students = [
            // Kelas 7
            ['name' => 'Aisyah Putri Ramadhani', 'class' => '7A', 'status' => 'active'],
            ['name' => 'Bima Aditya Pratama', 'class' => '7A', 'status' => 'active'],
            ['name' => 'Citra Dewi Anggraeni', 'class' => '7A', 'status' => 'active'],
            ['name' => 'Daffa Rizky Maulana', 'class' => '7B', 'status' => 'active'],
            ['name' => 'Eka Safitri', 'class' => '7B', 'status' => 'active'],
            ['name' => 'Farhan Dwi Nugroho', 'class' => '7B', 'status' => 'active'],
            ['name' => 'Gita Aulia Zahra', 'class' => '7C', 'status' => 'active'],
            ['name' => 'Haikal Firmansyah', 'class' => '7C', 'status' => 'active'],
            ['name' => 'Intan Permata Sari', 'class' => '7C', 'status' => 'active'],
            ['name' => 'Joko Susanto', 'class' => '7D', 'status' => 'active'],
            // Kelas 8
            ['name' => 'Kartika Sari Dewi', 'class' => '8A', 'status' => 'active'],
            ['name' => 'Lutfi Hakim', 'class' => '8A', 'status' => 'active'],
            ['name' => 'Maharani Putri', 'class' => '8A', 'status' => 'active'],
            ['name' => 'Naufal Abdillah', 'class' => '8B', 'status' => 'active'],
            ['name' => 'Olivia Rahma', 'class' => '8B', 'status' => 'active'],
            ['name' => 'Prasetyo Adi', 'class' => '8B', 'status' => 'active'],
            ['name' => 'Qonita Zahra', 'class' => '8C', 'status' => 'active'],
            ['name' => 'Rangga Saputra', 'class' => '8C', 'status' => 'active'],
            ['name' => 'Salma Khoirunnisa', 'class' => '8C', 'status' => 'active'],
            ['name' => 'Taufik Hidayat', 'class' => '8D', 'status' => 'active'],
            // Kelas 9
            ['name' => 'Umi Habibah', 'class' => '9A', 'status' => 'active'],
            ['name' => 'Vino Bastian', 'class' => '9A', 'status' => 'active'],
            ['name' => 'Wulan Dari', 'class' => '9A', 'status' => 'active'],
            ['name' => 'Yusuf Maulana', 'class' => '9B', 'status' => 'active'],
            ['name' => 'Zahra Aulia', 'class' => '9B', 'status' => 'active'],
            ['name' => 'Arif Rahman', 'class' => '9B', 'status' => 'active'],
            ['name' => 'Bella Safira', 'class' => '9C', 'status' => 'active'],
            ['name' => 'Cahyo Wibowo', 'class' => '9C', 'status' => 'active'],
            ['name' => 'Dinda Ayu', 'class' => '9C', 'status' => 'active'],
            ['name' => 'Ega Pratama', 'class' => '9D', 'status' => 'active'],
            // Alumni
            ['name' => 'Fitriani Rahayu', 'class' => 'Alumni 2024', 'status' => 'inactive'],
            ['name' => 'Galang Setiawan', 'class' => 'Alumni 2024', 'status' => 'inactive'],
            ['name' => 'Hesti Wulandari', 'class' => 'Alumni 2024', 'status' => 'inactive'],
            ['name' => 'Irfan Maulana', 'class' => 'Alumni 2023', 'status' => 'inactive'],
            ['name' => 'Julia Putri', 'class' => 'Alumni 2023', 'status' => 'inactive'],
        ];

        foreach ($students as $student) {
            DB::table('students')->insert(array_merge($student, [
                'id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->command->info('Students seeded (35).');
    }

    private function seedNewsCategories(): void
    {
        DB::table('news')->truncate();
        DB::table('news_categories')->truncate();

        $categories = [
            ['title' => 'Kegiatan Sekolah', 'slug' => 'kegiatan-sekolah', 'description' => 'Berita seputar kegiatan dan acara yang diselenggarakan di sekolah'],
            ['title' => 'Prestasi', 'slug' => 'prestasi', 'description' => 'Berita tentang pencapaian dan prestasi siswa maupun sekolah'],
            ['title' => 'Akademik', 'slug' => 'akademik', 'description' => 'Informasi terkait kegiatan belajar mengajar dan akademik'],
            ['title' => 'Pengumuman', 'slug' => 'pengumuman', 'description' => 'Pengumuman resmi dari sekolah untuk siswa dan wali murid'],
            ['title' => 'Ekstrakurikuler', 'slug' => 'ekstrakurikuler', 'description' => 'Berita seputar kegiatan ekstrakurikuler sekolah'],
        ];

        $categoryIds = [];
        foreach ($categories as $category) {
            $id = Str::uuid();
            $categoryIds[] = $id;
            DB::table('news_categories')->insert(array_merge($category, [
                'id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->newsCategoryIds = $categoryIds;

        $this->command->info('News Categories seeded (5).');
    }

    private array $newsCategoryIds = [];

    private function seedNews(): void
    {
        $newsItems = [
            [
                'title' => 'SMPN 2 Paguyangan Raih Juara 1 Lomba Pramuka Kabupaten',
                'slug' => 'smpn-2-paguyangan-raih-juara-1-lomba-pramuka-kabupaten',
                'content' => "Tim Pramuka SMP Negeri 2 Paguyangan berhasil meraih Juara 1 dalam Lomba Pramuka Penggalang tingkat Kabupaten Brebes yang diselenggarakan pada tanggal 15-17 Mei 2025 di Bumi Perkemahan Kaligua.\n\nLomba yang diikuti oleh 45 regu dari berbagai SMP se-Kabupaten Brebes ini menguji berbagai keterampilan kepramukaan seperti tali-temali, sandi, pioneering, P3K, dan pengetahuan umum.\n\n## Persiapan Matang\n\nMenurut Pembina Pramuka, Eko Prasetyo S.Pd., keberhasilan ini merupakan hasil latihan intensif selama 3 bulan. \"Anak-anak berlatih setiap hari Sabtu dan beberapa kali latihan tambahan di hari biasa. Mereka sangat antusias dan bersemangat,\" ungkapnya.\n\n## Prestasi Membanggakan\n\nKepala Sekolah Drs. H. Supriyadi, M.Pd. menyampaikan rasa bangga atas pencapaian ini. \"Ini membuktikan bahwa siswa-siswi kami tidak hanya unggul di bidang akademik, tetapi juga di bidang non-akademik. Kami akan terus mendukung pengembangan potensi siswa,\" katanya.\n\nTim pramuka SMPN 2 Paguyangan akan mewakili Kabupaten Brebes dalam Lomba Pramuka tingkat Provinsi Jawa Tengah yang akan dilaksanakan bulan depan.",
                'category_index' => 1,
                'thumbnail' => 'assets/news/thumbnails/news-1.jpg',
                'is_published' => true,
                'published_at' => '2025-05-20',
            ],
            [
                'title' => 'Pelaksanaan Ujian Akhir Semester Genap 2024/2025',
                'slug' => 'pelaksanaan-ujian-akhir-semester-genap-2024-2025',
                'content' => "SMP Negeri 2 Paguyangan melaksanakan Ujian Akhir Semester (UAS) Genap Tahun Pelajaran 2024/2025 yang berlangsung selama satu minggu, mulai tanggal 2 hingga 7 Juni 2025.\n\nUjian diikuti oleh seluruh siswa kelas 7 dan 8 dengan total 480 peserta. Pelaksanaan ujian berjalan lancar dan tertib sesuai dengan protokol yang telah ditetapkan.\n\n## Jadwal Ujian\n\nUjian dilaksanakan selama 5 hari efektif dengan masing-masing 2 mata pelajaran per hari. Mata pelajaran yang diujikan meliputi:\n- Bahasa Indonesia\n- Matematika\n- IPA\n- IPS\n- Bahasa Inggris\n- PKn\n- Pendidikan Agama Islam\n- Seni Budaya\n- PJOK\n- Prakarya\n\n## Pengawasan Ketat\n\nPanitia ujian telah menyiapkan pengawasan yang ketat untuk menjamin kejujuran dan kelancaran pelaksanaan ujian. Setiap ruang ujian diawasi oleh 2 orang pengawas.\n\nHasil ujian akan diumumkan bersamaan dengan pembagian rapor pada akhir bulan Juni 2025.",
                'category_index' => 2,
                'thumbnail' => 'assets/news/thumbnails/news-2.jpg',
                'is_published' => true,
                'published_at' => '2025-06-01',
            ],
            [
                'title' => 'Workshop Peningkatan Kompetensi Guru dalam Kurikulum Merdeka',
                'slug' => 'workshop-peningkatan-kompetensi-guru-kurikulum-merdeka',
                'content' => "SMP Negeri 2 Paguyangan menyelenggarakan Workshop Peningkatan Kompetensi Guru dalam Implementasi Kurikulum Merdeka pada hari Sabtu, 10 Mei 2025 di Aula Sekolah.\n\nWorkshop ini diikuti oleh seluruh guru dan tenaga kependidikan SMPN 2 Paguyangan dengan menghadirkan narasumber dari Dinas Pendidikan Kabupaten Brebes.\n\n## Materi Workshop\n\nBeberapa materi yang disampaikan dalam workshop ini antara lain:\n1. Pemahaman Filosofi Kurikulum Merdeka\n2. Penyusunan Modul Ajar\n3. Asesmen Diagnostik dan Formatif\n4. Diferensiasi Pembelajaran\n5. Projek Penguatan Profil Pelajar Pancasila (P5)\n\n## Tujuan\n\nWorkshop ini bertujuan untuk meningkatkan pemahaman dan keterampilan guru dalam mengimplementasikan Kurikulum Merdeka secara efektif di kelas. Diharapkan setelah mengikuti workshop ini, guru dapat lebih kreatif dan inovatif dalam merancang pembelajaran yang berpusat pada siswa.",
                'category_index' => 2,
                'thumbnail' => 'assets/news/thumbnails/news-3.jpg',
                'is_published' => true,
                'published_at' => '2025-05-12',
            ],
            [
                'title' => 'Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2025/2026',
                'slug' => 'ppdb-tahun-ajaran-2025-2026',
                'content' => "SMP Negeri 2 Paguyangan membuka Penerimaan Peserta Didik Baru (PPDB) untuk Tahun Ajaran 2025/2026. Pendaftaran dibuka mulai tanggal 1 Juli hingga 15 Juli 2025.\n\n## Persyaratan\n\n1. Lulusan SD/MI tahun 2025 atau maksimal 2 tahun sebelumnya\n2. Berusia maksimal 15 tahun pada tanggal 1 Juli 2025\n3. Memiliki ijazah atau surat keterangan lulus\n4. Kartu Keluarga (KK) asli dan fotokopi\n5. Akta kelahiran asli dan fotokopi\n6. Pas foto 3x4 sebanyak 4 lembar\n\n## Jalur Pendaftaran\n\n- **Jalur Zonasi**: 60% dari daya tampung\n- **Jalur Afirmasi**: 15% dari daya tampung\n- **Jalur Perpindahan Tugas Orang Tua**: 5% dari daya tampung\n- **Jalur Prestasi**: 20% dari daya tampung\n\n## Daya Tampung\n\nTahun ajaran 2025/2026, SMPN 2 Paguyangan menerima 160 siswa baru yang akan dibagi ke dalam 5 rombongan belajar.\n\nInformasi lebih lanjut dapat menghubungi panitia PPDB di nomor (0289) 432156 pada jam kerja.",
                'category_index' => 3,
                'thumbnail' => 'assets/news/thumbnails/news-4.jpg',
                'is_published' => true,
                'published_at' => '2025-06-15',
            ],
            [
                'title' => 'English Club Gelar English Day di Lingkungan Sekolah',
                'slug' => 'english-club-gelar-english-day',
                'content' => "English Club SMP Negeri 2 Paguyangan menggelar kegiatan English Day pada hari Rabu, 7 Mei 2025. Kegiatan ini bertujuan untuk meningkatkan kemampuan berbahasa Inggris siswa dalam kehidupan sehari-hari.\n\n## Rangkaian Kegiatan\n\nEnglish Day dilaksanakan dengan berbagai aktivitas menarik:\n- **Morning Greeting**: Penyambutan siswa di gerbang sekolah menggunakan Bahasa Inggris\n- **English Zone**: Area khusus di kantin dan taman sekolah di mana siswa wajib berbahasa Inggris\n- **Storytelling Contest**: Lomba bercerita dalam Bahasa Inggris\n- **Spelling Bee**: Lomba mengeja kata Bahasa Inggris\n- **English Song Competition**: Lomba menyanyi lagu berbahasa Inggris\n\n## Antusiasme Siswa\n\nKegiatan ini mendapat respon positif dari siswa. \"Saya senang sekali dengan English Day ini. Jadi lebih berani berbicara Bahasa Inggris dan menambah kosakata baru,\" ujar Zahra, siswa kelas 8B.\n\nGuru Pembina English Club, Agus Setiawan S.Pd., berencana menjadikan English Day sebagai kegiatan rutin yang dilaksanakan setiap bulan.",
                'category_index' => 4,
                'thumbnail' => 'assets/news/thumbnails/news-5.jpg',
                'is_published' => true,
                'published_at' => '2025-05-08',
            ],
            [
                'title' => 'Tim Robotik SMPN 2 Paguyangan Tampil di Lomba Provinsi',
                'slug' => 'tim-robotik-tampil-di-lomba-provinsi',
                'content' => "Tim Robotik SMP Negeri 2 Paguyangan berhasil lolos seleksi dan tampil di Lomba Robotik Tingkat Provinsi Jawa Tengah yang diselenggarakan di Semarang pada 20-22 April 2025.\n\nTim yang terdiri dari 4 siswa ini membawa robot line follower yang mereka rancang dan rakit sendiri selama 2 bulan persiapan.\n\n## Anggota Tim\n\n1. Haikal Firmansyah (Kelas 7C) - Programmer\n2. Rangga Saputra (Kelas 8C) - Mekanik\n3. Bella Safira (Kelas 9C) - Desainer\n4. Naufal Abdillah (Kelas 8B) - Operator\n\n## Hasil Kompetisi\n\nMeskipun belum berhasil masuk 3 besar, tim robotik SMPN 2 Paguyangan menunjukkan performa yang sangat baik dan mendapat apresiasi dari juri. \"Untuk sekolah yang baru membentuk ekskul robotik 2 tahun lalu, pencapaian ini sangat luar biasa,\" kata Hendra Gunawan S.Kom., guru pembimbing.\n\n## Rencana Ke Depan\n\nTim robotik akan terus berlatih dan bersiap untuk kompetisi tahun depan dengan target meraih medali di tingkat provinsi.",
                'category_index' => 1,
                'thumbnail' => 'assets/news/thumbnails/news-6.jpg',
                'is_published' => true,
                'published_at' => '2025-04-25',
            ],
            [
                'title' => 'Peringatan Hari Pendidikan Nasional di SMPN 2 Paguyangan',
                'slug' => 'peringatan-hari-pendidikan-nasional',
                'content' => "SMP Negeri 2 Paguyangan memperingati Hari Pendidikan Nasional (Hardiknas) yang jatuh pada tanggal 2 Mei 2025 dengan menggelar upacara bendera dan berbagai kegiatan edukatif.\n\nUpacara bendera dilaksanakan dengan khidmat di lapangan sekolah yang diikuti oleh seluruh siswa, guru, dan tenaga kependidikan.\n\n## Rangkaian Kegiatan\n\n- Upacara Bendera Peringatan Hardiknas\n- Pembacaan Pidato Menteri Pendidikan\n- Pentas Seni Siswa\n- Lomba Mading Kreatif\n- Lomba Kebersihan Kelas\n\n## Sambutan Kepala Sekolah\n\nDalam sambutannya, Kepala Sekolah Drs. H. Supriyadi, M.Pd. menyampaikan pentingnya semangat belajar dan terus berinovasi. \"Kita harus menjadi generasi yang tidak hanya cerdas secara akademik, tetapi juga berkarakter dan berbudaya. Itulah esensi dari pendidikan yang sesungguhnya,\" ujarnya.\n\nKegiatan berlangsung meriah dan penuh semangat hingga siang hari.",
                'category_index' => 0,
                'thumbnail' => 'assets/news/thumbnails/news-7.jpg',
                'is_published' => true,
                'published_at' => '2025-05-02',
            ],
            [
                'title' => 'Program Literasi Sekolah: Gerakan Membaca 15 Menit Sebelum Belajar',
                'slug' => 'program-literasi-gerakan-membaca-15-menit',
                'content' => "SMPN 2 Paguyangan meluncurkan program Gerakan Membaca 15 Menit sebelum kegiatan belajar mengajar dimulai. Program ini merupakan implementasi dari Gerakan Literasi Sekolah (GLS) yang dicanangkan oleh Kementerian Pendidikan.\n\n## Pelaksanaan\n\nSetiap pagi sebelum jam pelajaran pertama, siswa diwajibkan membaca buku non-pelajaran selama 15 menit. Buku yang dibaca bisa berupa novel, cerpen, biografi, atau buku pengetahuan umum.\n\n## Fasilitas Pendukung\n\nSekolah telah menyediakan:\n- Pojok baca di setiap kelas\n- Perpustakaan dengan koleksi lebih dari 3.000 buku\n- Donasi buku dari alumni dan orang tua siswa\n\n## Dampak Positif\n\nSetelah berjalan selama 3 bulan, program ini menunjukkan dampak positif. Minat baca siswa meningkat secara signifikan. \"Dulu perpustakaan sepi, sekarang selalu ramai saat istirahat,\" cerita Ibu Rina Wulandari S.Pd., guru Bahasa Indonesia.\n\nKedepannya, sekolah berencana mengadakan program bedah buku dan lomba resensi buku setiap bulannya.",
                'category_index' => 2,
                'thumbnail' => 'assets/news/thumbnails/news-8.jpg',
                'is_published' => true,
                'published_at' => '2025-03-15',
            ],
            [
                'title' => 'Siswa SMPN 2 Paguyangan Juara Olimpiade Matematika Tingkat Kabupaten',
                'slug' => 'juara-olimpiade-matematika-kabupaten',
                'content' => "Muhammad Farhan, siswa kelas 8A SMP Negeri 2 Paguyangan, berhasil meraih Juara 1 dalam Olimpiade Matematika tingkat Kabupaten Brebes yang diselenggarakan pada 22 Maret 2025.\n\nOlimpiade yang diikuti oleh 120 siswa terbaik dari seluruh SMP di Kabupaten Brebes ini terdiri dari 3 babak: penyisihan, semifinal, dan final.\n\n## Perjalanan Kompetisi\n\nFarhan berhasil melewati babak penyisihan dengan skor tertinggi, lalu tampil cemerlang di semifinal. Di babak final, ia berhasil menyelesaikan 8 dari 10 soal dengan benar dan meraih skor tertinggi.\n\n## Persiapan\n\n\"Saya belajar lebih intensif selama 2 bulan terakhir. Bapak Ahmad Fathoni sangat membantu saya dengan memberikan latihan soal dan pembahasan setiap sore setelah pulang sekolah,\" ungkap Farhan.\n\n## Penghargaan\n\nFarhan mendapatkan medali emas, piagam penghargaan, dan beasiswa pendidikan senilai Rp 2.000.000. Ia juga akan mewakili Kabupaten Brebes dalam Olimpiade Matematika tingkat Provinsi Jawa Tengah.",
                'category_index' => 1,
                'thumbnail' => 'assets/news/thumbnails/news-9.jpg',
                'is_published' => true,
                'published_at' => '2025-03-25',
            ],
            [
                'title' => 'Class Meeting Semester Ganjil: Ajang Kreativitas dan Sportivitas',
                'slug' => 'class-meeting-semester-ganjil',
                'content' => "SMP Negeri 2 Paguyangan menggelar kegiatan Class Meeting Semester Ganjil Tahun Pelajaran 2024/2025 yang berlangsung selama 3 hari, dari tanggal 16-18 Desember 2024.\n\nKegiatan ini diselenggarakan setelah pelaksanaan Ujian Akhir Semester (UAS) sebagai ajang refreshing sekaligus mengembangkan bakat dan minat siswa.\n\n## Cabang Lomba\n\n1. **Olahraga**: Futsal, Bola Voli, Tarik Tambang, Estafet Kelereng\n2. **Seni**: Menyanyi Solo, Fashion Show, Stand Up Comedy\n3. **Akademik**: Cerdas Cermat, Debat Bahasa Indonesia\n4. **Kreativitas**: Mading Kreatif, Menghias Kelas, Memasak\n\n## Juara Umum\n\nSetelah melalui persaingan ketat selama 3 hari, Kelas 8A berhasil keluar sebagai Juara Umum Class Meeting dengan mengumpulkan poin terbanyak, disusul Kelas 9B di posisi kedua dan Kelas 7A di posisi ketiga.\n\n\"Class Meeting ini sangat penting untuk mengembangkan soft skill siswa seperti kerjasama, leadership, dan sportivitas,\" kata Wakil Kepala Sekolah Hj. Siti Aminah S.Pd.",
                'category_index' => 0,
                'thumbnail' => 'assets/news/thumbnails/news-10.jpg',
                'is_published' => true,
                'published_at' => '2024-12-20',
            ],
        ];

        foreach ($newsItems as $news) {
            $categoryIndex = $news['category_index'];
            unset($news['category_index']);

            DB::table('news')->insert(array_merge($news, [
                'id' => Str::uuid(),
                'news_category_id' => $this->newsCategoryIds[$categoryIndex],
                'created_at' => Carbon::parse($news['published_at']),
                'updated_at' => Carbon::parse($news['published_at']),
            ]));
        }

        $this->command->info('News seeded (10).');
    }

    private function seedGuestBooks(): void
    {
        DB::table('guest_books')->truncate();

        $guestBooks = [
            ['name' => 'Budi Santoso', 'address' => 'Ds. Paguyangan RT 01/02, Brebes', 'phone' => '081234567001', 'date' => '2025-05-28'],
            ['name' => 'Siti Maryam', 'address' => 'Ds. Winduaji, Paguyangan, Brebes', 'phone' => '081234567002', 'date' => '2025-05-25'],
            ['name' => 'Hendri Kurniawan', 'address' => 'Jl. Raya Bumiayu No. 12, Brebes', 'phone' => '081234567003', 'date' => '2025-05-20'],
            ['name' => 'Nurul Hidayah', 'address' => 'Ds. Kedungoleng, Paguyangan, Brebes', 'phone' => '081234567004', 'date' => '2025-05-18'],
            ['name' => 'Ahmad Fauzan', 'address' => 'Ds. Ragatunjung, Paguyangan, Brebes', 'phone' => '081234567005', 'date' => '2025-05-15'],
            ['name' => 'Dewi Ratnasari', 'address' => 'Jl. Ahmad Yani No. 5, Bumiayu', 'phone' => '081234567006', 'date' => '2025-05-10'],
            ['name' => 'Eko Purnomo', 'address' => 'Ds. Cilibur, Paguyangan, Brebes', 'phone' => '081234567007', 'date' => '2025-05-08'],
            ['name' => 'Fitri Handayani', 'address' => 'Ds. Pandansari, Paguyangan, Brebes', 'phone' => '081234567008', 'date' => '2025-05-05'],
            ['name' => 'Gunawan Wicaksono', 'address' => 'Jl. Sudirman No. 20, Paguyangan', 'phone' => '081234567009', 'date' => '2025-04-28'],
            ['name' => 'Herni Yuliana', 'address' => 'Ds. Taraban, Paguyangan, Brebes', 'phone' => '081234567010', 'date' => '2025-04-25'],
            ['name' => 'Irwan Setiadi', 'address' => 'Ds. Paguyangan, Brebes', 'phone' => '081234567011', 'date' => '2025-04-20'],
            ['name' => 'Jamilah', 'address' => 'Ds. Kedungoleng RT 03/01, Brebes', 'phone' => '081234567012', 'date' => '2025-04-15'],
        ];

        foreach ($guestBooks as $guestBook) {
            DB::table('guest_books')->insert(array_merge($guestBook, [
                'id' => Str::uuid(),
                'created_at' => Carbon::parse($guestBook['date']),
                'updated_at' => Carbon::parse($guestBook['date']),
            ]));
        }

        $this->command->info('Guest Books seeded (12).');
    }

    private function seedGraduations(): void
    {
        DB::table('graduations')->truncate();

        $graduations = [
            ['name' => 'Ahmad Fauzi', 'test_number' => '11111111', 'status' => 'passed'],
            ['name' => 'Siti Nurhaliza', 'test_number' => '11111112', 'status' => 'passed'],
            ['name' => 'Budi Santoso', 'test_number' => '11111113', 'status' => 'passed'],
            ['name' => 'Dewi Lestari', 'test_number' => '11111114', 'status' => 'failed'],
            ['name' => 'Rizki Ramadhan', 'test_number' => '11111115', 'status' => 'passed'],
            ['name' => 'Putri Ayu Wulandari', 'test_number' => '11111116', 'status' => 'passed'],
            ['name' => 'Dimas Prasetyo', 'test_number' => '11111117', 'status' => 'passed'],
            ['name' => 'Nadia Safitri', 'test_number' => '11111118', 'status' => 'failed'],
            ['name' => 'Andi Wijaya', 'test_number' => '11111119', 'status' => 'passed'],
            ['name' => 'Laila Fitriani', 'test_number' => '11111120', 'status' => 'passed'],
            ['name' => 'Fajar Ramadhan', 'test_number' => '11111121', 'status' => 'passed'],
            ['name' => 'Nur Aini', 'test_number' => '11111122', 'status' => 'passed'],
            ['name' => 'Rendi Pratama', 'test_number' => '11111123', 'status' => 'passed'],
            ['name' => 'Sinta Dewi', 'test_number' => '11111124', 'status' => 'failed'],
            ['name' => 'Yoga Aditya', 'test_number' => '11111125', 'status' => 'passed'],
            ['name' => 'Anisa Rahma', 'test_number' => '11111126', 'status' => 'passed'],
            ['name' => 'Bagas Setiawan', 'test_number' => '11111127', 'status' => 'passed'],
            ['name' => 'Cantika Putri', 'test_number' => '11111128', 'status' => 'passed'],
            ['name' => 'Doni Ardiansyah', 'test_number' => '11111129', 'status' => 'passed'],
            ['name' => 'Eva Susanti', 'test_number' => '11111130', 'status' => 'passed'],
        ];

        foreach ($graduations as $graduation) {
            DB::table('graduations')->insert(array_merge($graduation, [
                'id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->command->info('Graduations seeded (20).');
    }
}
