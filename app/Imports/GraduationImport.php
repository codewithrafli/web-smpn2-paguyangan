<?php

namespace App\Imports;

use App\Models\Graduation;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GraduationImport implements ToCollection, WithHeadingRow
{
    public int $importedCount = 0;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (empty($row['nisn']) && empty($row['nama_peserta'])) {
                continue;
            }

            $birthdate = null;
            if (!empty($row['tanggal_lahir_dd_mm_yyyy'])) {
                try {
                    $birthdate = Carbon::createFromFormat('d-m-Y', $row['tanggal_lahir_dd_mm_yyyy']);
                } catch (\Exception $e) {
                    try {
                        $birthdate = Carbon::parse($row['tanggal_lahir_dd_mm_yyyy']);
                    } catch (\Exception $e) {
                        $birthdate = null;
                    }
                }
            }

            $student = Student::updateOrCreate(
                ['nisn' => $row['nisn']],
                [
                    'name' => $row['nama_peserta'],
                    'gender' => $row['jenis_kelamin_lp'] ?? null,
                    'birthplace' => $row['tempat_lahir'] ?? null,
                    'birthdate' => $birthdate,
                    'parent_name' => $row['nama_orang_tua'] ?? null,
                    'nomor_induk' => $row['nomor_induk'] ?? null,
                    'class' => '-',
                    'status' => 'active',
                ]
            );

            Graduation::updateOrCreate(
                ['student_id' => $student->id],
                [
                    'name' => $row['nama_peserta'],
                    'test_number' => $row['nisn'],
                    'status' => 'passed',
                ]
            );

            $this->importedCount++;
        }
    }
}
