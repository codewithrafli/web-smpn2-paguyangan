<?php

namespace Database\Seeders;

use App\Models\Graduation;
use Illuminate\Database\Seeder;

class GraduationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Ahmad Fauzi', 'test_number' => '11111111', 'status' => 'passed'],
            ['name' => 'Siti Nurhaliza', 'test_number' => '11111112', 'status' => 'passed'],
            ['name' => 'Budi Santoso', 'test_number' => '11111113', 'status' => 'passed'],
            ['name' => 'Dewi Lestari', 'test_number' => '11111114', 'status' => 'failed'],
            ['name' => 'Rizki Ramadhan', 'test_number' => '11111115', 'status' => 'passed'],
            ['name' => 'Putri Ayu', 'test_number' => '11111116', 'status' => 'passed'],
            ['name' => 'Dimas Prasetyo', 'test_number' => '11111117', 'status' => 'passed'],
            ['name' => 'Nadia Safitri', 'test_number' => '11111118', 'status' => 'failed'],
            ['name' => 'Andi Wijaya', 'test_number' => '11111119', 'status' => 'passed'],
            ['name' => 'Laila Fitriani', 'test_number' => '11111120', 'status' => 'passed'],
        ];

        foreach ($data as $item) {
            Graduation::create($item);
        }
    }
}
