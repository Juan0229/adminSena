<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Area;
use App\Models\Category;
use App\Models\Computer;
use App\Models\Training;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Apprentice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Áreas
        $sistemas = Area::create(['name' => 'Sistemas de Información']);
        $diseno = Area::create(['name' => 'Diseño Gráfico']);
        $mecanica = Area::create(['name' => 'Mecánica Industrial']);
        $electricidad = Area::create(['name' => 'Electricidad']);

        // Categorías
        Category::create(['name' => 'Tecnología']);
        Category::create(['name' => 'Educación']);
        Category::create(['name' => 'Electrónica']);

        // Computadores
        $c1 = Computer::create(['number' => 'C-001', 'brand' => 'Dell']);
        $c2 = Computer::create(['number' => 'C-002', 'brand' => 'HP']);
        $c3 = Computer::create(['number' => 'C-003', 'brand' => 'Lenovo']);
        Computer::create(['number' => 'C-004', 'brand' => 'Asus']);

        // Centros de formación
        $centro1 = Training::create(['name' => 'Centro Industrial de Mantenimiento', 'location' => 'Sogamoso']);
        $centro2 = Training::create(['name' => 'Centro de Gestión Industrial', 'location' => 'Bogotá']);
        $centro3 = Training::create(['name' => 'Centro de Comercio y Servicios', 'location' => 'Tunja']);

        // Instructores
        $carlos = Teacher::create([
            'name' => 'Carlos Pérez',
            'email' => 'carlos.perez@sena.edu.co',
            'area_id' => $sistemas->id,
            'training_center_id' => $centro1->id,
        ]);
        $maria = Teacher::create([
            'name' => 'María Gómez',
            'email' => 'maria.gomez@sena.edu.co',
            'area_id' => $diseno->id,
            'training_center_id' => $centro2->id,
        ]);
        $luis = Teacher::create([
            'name' => 'Luis Rodríguez',
            'email' => 'luis.rodriguez@sena.edu.co',
            'area_id' => $mecanica->id,
            'training_center_id' => $centro1->id,
        ]);

        // Cursos
        $curso1 = Course::create([
            'course_number' => 'MIS-101',
            'day' => 'Lunes y Miércoles',
            'area_id' => $sistemas->id,
            'training_center_id' => $centro1->id,
        ]);
        $curso2 = Course::create([
            'course_number' => 'DGR-201',
            'day' => 'Martes y Jueves',
            'area_id' => $diseno->id,
            'training_center_id' => $centro2->id,
        ]);
        $curso3 = Course::create([
            'course_number' => 'MEC-301',
            'day' => 'Viernes',
            'area_id' => $mecanica->id,
            'training_center_id' => $centro1->id,
        ]);

        // Relación cursos-instructores (tabla pivote)
        DB::table('courses_teacher')->insert([
            ['course_id' => $curso1->id, 'teacher_id' => $carlos->id, 'created_at' => now(), 'updated_at' => now()],
            ['course_id' => $curso2->id, 'teacher_id' => $maria->id, 'created_at' => now(), 'updated_at' => now()],
            ['course_id' => $curso3->id, 'teacher_id' => $luis->id, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Aprendices
        Apprentice::create([
            'name' => 'Ana Martínez',
            'email' => 'ana.martinez@misena.edu.co',
            'cell_number' => '3001112223',
            'course_id' => $curso1->id,
            'computer_id' => $c1->id,
        ]);
        Apprentice::create([
            'name' => 'Julián Torres',
            'email' => 'julian.torres@misena.edu.co',
            'cell_number' => '3112223334',
            'course_id' => $curso2->id,
            'computer_id' => $c2->id,
        ]);
        Apprentice::create([
            'name' => 'Valentina Rojas',
            'email' => 'valentina.rojas@misena.edu.co',
            'cell_number' => '3223334445',
            'course_id' => $curso3->id,
            'computer_id' => $c3->id,
        ]);
    }
}