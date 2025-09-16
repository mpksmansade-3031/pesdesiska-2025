<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'nama' => 'Reno Dwi',
            'kelas' => '12 IPA 1',
            'nis' => '123456',
            'role' => 'siswa',
        ]);
    }
}
