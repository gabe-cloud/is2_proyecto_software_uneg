<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseStudentsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->usuario();
        $this->Personas();
        $this->estudiantes();
        $Admin = User::find(1); //Hace que el primer usuario sea admin
        $Admin->assignRole('Admin'); 
        $user = User::find(2);
        $user->assignRole('professor');   
        $user = User::find(3);
        $user->assignRole('student'); 
        $user = User::find(4);
        $user->assignRole('student'); 
        $user = User::find(5);
        $user->assignRole('student'); 
        $user = User::find(6);
        $user->assignRole('coordinator'); 
    }
    //Crea una tabla para el coordinaror, una para el profesor une de un semestre, la carrera y 3 estudiantes.
    public function estudiantes()
    {
       
        DB::table('coordinators')->insert([
            'id' => '6',
            'appointment' => 'Ingeneria en informatica',
            'date_admission' => now()
        ]);
        DB::table('professors')->insert([
            'id' => '2',
            'profession' => 'Maestria en matematicas',
            'professor_type' => 'normal', 
            'date_admission' => now()
        ]);
        DB::table('semesters')->insert([
            'id' => '1',
            'semester_number' => '1'
        ]);
        DB::table('careers')->insert([
            'id' => '1',
            'career_type' => 'tecnologica',
            'name' => 'ingeneria en informatica',
            'coordinator_id' => '6'
        ]);
        DB::table('sections')->insert([
            'id' => '1',
            'career_id' => '1',
            'semesters_id' => '1',
            'section_number' => '1'
        ]);
        DB::table('schedules')->insert([
            'id' => '1',
            'day'=> 'lunes',
            'entry_time' => '13:09:08',
            'departure_time' => '13:09:09'
        ]);
        DB::table('courses')->insert([
            'professor_id' => '2',
            'section_id'=> '1',
            'schedules_id'=> '1',
            'course_type' => 'matematica',
            'career_id' => '1',
            'credit_units' => '4',
        ]);
        $student = [
            [
                'semester_id' => '1',
                'date_admission' => now(),
                'career_id' => '1',
                'status' => 'Inscrito',
                'id' => '3'
            ],
            [
                'semester_id' => '1',
                'date_admission' => now(),
                'career_id' => '1',
                'status' => 'Inscrito',
                'id' => '4'
            ],
            [
                'semester_id' => '1',
                'date_admission' => now(),
                'career_id' => '1',
                'status' => 'Inscrito',
                'id' => '5'
            ],
        ]; 
        DB::table('students')->insert($student);
        DB::table('incriptions')->insert([
            'id' => '3',
            'student_id' => '3',
            'fecha'=> now()
        ]);
        DB::table('incriptions')->insert([
            'id' => '4',
            'student_id' => '4',
            'fecha'=> now()
        ]);    
        DB::table('incriptions')->insert([
            'id' => '5',
            'student_id' => '5',
            'fecha'=> now()
        ]);
        DB::table('controls_incriptions')->insert([
            'id' => '3',
            'incription_id' => '3',
            'course_id'=> '1'
        ]);
        DB::table('controls_incriptions')->insert([
            'id' => '4',
            'incription_id' => '4',
            'course_id'=> '1'
        ]);     
        DB::table('controls_incriptions')->insert([
            'id' => '5',
            'incription_id' => '5',
            'course_id'=> '1'
        ]);                 
    }
    public function usuario()
    {
        
        $user = [
            [
                'name' => 'admin',
                'email' => 'Admin@uneg.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'professor',
                'email' => 'professor@uneg.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'prueba3',
                'email' => 'student1@uneg.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'prueba4',
                'email' => 'student2@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'gprueba5',
                'email' => 'student3@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'gprueba6',
                'email' => 'coord@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('users')->insert($user);


    
    }
    public function Personas()
    {
        $people = [
            [
                'ci' => '1',
                'name' => 'Helvis',
                'last_name' =>  Str::random(5),
                'phone_number' => Str::random(10),
                'address' =>  Str::random(10),
                'email' =>  Str::random(10),
                'id' => '1'
            ],
            [
                'ci' => '12',
                'name' => 'Jose',
                'last_name' =>  Str::random(5),
                'phone_number' => Str::random(10),
                'address' =>  Str::random(10),
                'email' =>  Str::random(10),
                'id' => '2'
            ],
            [
                'ci' => '123',
                'name' => 'Gabriel',
                'last_name' =>  Str::random(5),
                'phone_number' => Str::random(10),
                'address' =>  Str::random(10),
                'email' =>  Str::random(10),
                'id' => '3'
            ],
            [
                'ci' => '1234',
                'name' => 'Gabriel',
                'last_name' =>  Str::random(5),
                'phone_number' => Str::random(10),
                'address' =>  Str::random(10),
                'email' =>  Str::random(10),
                'id' => '4'
            ],
            [
                'ci' => '12345',
                'name' => 'Gabriel',
                'last_name' =>  Str::random(5),
                'phone_number' => Str::random(10),
                'address' =>  Str::random(10),
                'email' =>  Str::random(10),
                'id' => '5'
            ],
            [
                'ci' => '123458',
                'name' => 'Gregory',
                'last_name' =>  Str::random(5),
                'phone_number' => Str::random(10),
                'address' =>  Str::random(10),
                'email' =>  Str::random(10),
                'id' => '6'
            ],
        ]; 
        DB::table('people')->insert($people);      
    }
}
