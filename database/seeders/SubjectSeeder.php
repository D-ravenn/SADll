<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            ['curiculum' => 'BSCS', 'name' => 'Introduction to Computing', 'code' => 'CS101', 'description' => 'Fundamentals of computing and programming.', 'is_active' => true],
            ['curiculum' => 'BSCS', 'name' => 'Data Structures and Algorithms', 'code' => 'CS201', 'description' => 'Study of data structures and algorithm design.', 'is_active' => true],
            ['curiculum' => 'BSCS', 'name' => 'Database Management Systems', 'code' => 'CS301', 'description' => 'Principles and design of database systems.', 'is_active' => true],
            ['curiculum' => 'BSCS', 'name' => 'Web Development', 'code' => 'CS302', 'description' => 'Frontend and backend web development.', 'is_active' => true],
            ['curiculum' => 'BSIT', 'name' => 'Information Technology Fundamentals', 'code' => 'IT101', 'description' => 'Introduction to IT concepts and practices.', 'is_active' => true],
            ['curiculum' => 'BSIT', 'name' => 'Systems Analysis and Design', 'code' => 'IT201', 'description' => 'Methodologies for system design.', 'is_active' => true],
            ['curiculum' => 'BSIT', 'name' => 'Network Administration', 'code' => 'IT301', 'description' => 'Fundamentals of computer networking.', 'is_active' => true],
            ['curiculum' => 'GEN', 'name' => 'Mathematics in the Modern World', 'code' => 'GEN101', 'description' => 'General education mathematics course.', 'is_active' => true],
            ['curiculum' => 'GEN', 'name' => 'Purposive Communication', 'code' => 'GEN102', 'description' => 'Communication skills for academic and professional use.', 'is_active' => true],
            ['curiculum' => 'GEN', 'name' => 'Understanding the Self', 'code' => 'GEN103', 'description' => 'Self-awareness and human development.', 'is_active' => true],
        ];

        foreach ($subjects as $subject) {
            Subject::firstOrCreate(['code' => $subject['code']], $subject);
        }
    }
}
