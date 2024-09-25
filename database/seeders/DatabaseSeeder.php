<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\StudentFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Grade::factory()->recycle([Student::factory()])create();
        // Student::factory(100)->create();
        // Teacher::factory(32)->create();
        // Subject::factory(8)->create();
        User::factory()->create([
                'name' => 'Admin',
                'username' => 'Admin',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'password',
            ]);
        Grade::create(
            [
                'category' => '1A',
                'teacher' => 'Yuni Wulandari, S.Pd.',
                'assistant' => 'Putu Indah Bintari, M.Th.',
            ]
            );
        Grade::create(
            [
                'category' => '1B',
                'teacher' => 'Dinar Gultom, S.Pd.',
                'assistant' => 'Yustina Sri Mulyani, S.Pd.',
            ]
            );
        Grade::create(
            [
                'category' => '1C',
                'teacher' => 'Sus Anggrini Putri, S.Pd',
                'assistant' => 'Stevanus Ratu Perwira Kusuma Brata, S.Kom',
            ]
            );
        Grade::create(
            [
                'category' => '1D',
                'teacher' => 'Julius Caesario Imanuel Bofe,S.Pd',
                'assistant' => 'Putu Christin Mellyani,S.Pd.',
            ]
            );
    }
}
