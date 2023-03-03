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
        $user->assignRole('coordinator');   
        $user = User::find(3);
        $user->assignRole('student'); 
        $user = User::find(4);
        $user->assignRole('professor'); 
        $user = User::find(5);
        $user->assignRole('professor'); 
        $user = User::find(6);
        $user->assignRole('student'); 
        $user = User::find(7);
        $user->assignRole('student'); 
        $user = User::find(8);
        $user->assignRole('student'); 
        $user = User::find(9);
        $user->assignRole('student'); 
        $user = User::find(10);
        $user->assignRole('student'); 
        $user = User::find(11);
        $user->assignRole('student'); 
    }
    //Crea una tabla para el coordinaror, una para el profesor une de un semestre, la carrera y 3 estudiantes.
    public function estudiantes()
    {
       
        DB::table('coordinators')->insert([
            'id' => '2',
            'appointment' => 'Coordinador General',
            'date_admission' => '2022-01-12'
        ]);


        $professor = [
            [
                'id' => '4',
                'profession' => 'Ingeniero Mecanico',
                'professor_type' => 'Pregrado', 
                'date_admission' => '2023-01-02' 
            ],
            [
                'id' => '5',
                'profession' => 'Contador',
                'professor_type' => 'Pregrado', 
                'date_admission' => '2023-01-02' 
            ]
        ];
        DB::table('professors')->insert($professor);


        $semester = [
            [
                'id' => '1',
                'semester_number' => 'Primer semestre'
            ],
            [
                'id' => '2',
                'semester_number' => 'Segundo semestre'

            ],
            [
                'id' => '3',
                'semester_number' => 'Tercero semestre'
            ],
            [
                'id' => '4',
                'semester_number' => 'Cuarto semestre'
            ],
            [
                'id' => '5',
                'semester_number' => 'Quinto semestre'
            ],
            [
                'id' => '6',
                'semester_number' => 'Sexto semestre'
            ],
            [
                'id' => '7',
                'semester_number' => 'Septimo semestre'
            ],
            [
                'id' => '8',
                'semester_number' => 'Octavo semestre'
            ],
            [
                'id' => '9',
                'semester_number' => 'Noveno semestre'
            ],
            [
                'id' => '10',
                'semester_number' => 'Decimo semestre'
            ],
        ];
        DB::table('semesters')->insert($semester);


        $career = [
            [
                'id' => '1',
                'career_type' => 'Pregrado',
                'name' => 'Ingenieria Informatica',
                'coordinator_id' => '2' 
            ],
            [
                'id' => '2',
                'career_type' => 'Pregrado',
                'name' => 'Contaduria',
                'coordinator_id' => '2' 
            ]
        ];
        DB::table('careers')->insert($career);


        $section = [
            [
                'id' => '1',
                'career_id' => '1',
                'semesters_id' => '1',
                'section_number' => 'Seccion 1'

            ],
            [
                'id' => '2',
                'career_id' => '1',
                'semesters_id' => '1',
                'section_number' => 'Seccion 2'

            ],
            [
                'id' => '3',
                'career_id' => '2',
                'semesters_id' => '1',
                'section_number' => 'Seccion 1'

            ],
        ];
        DB::table('sections')->insert($section);


        $schedule = [
            [
                'id' => '1',
                'day'=> 'Lunes',
                'entry_time' => '07:05:00',
                'departure_time' => '08:35:00'

            ],
            [
                'id' => '2',
                'day'=> 'Lunes',
                'entry_time' => '08:40:00',
                'departure_time' => '10:00:00'

            ],
            [
                'id' => '3',
                'day'=> 'Martes',
                'entry_time' => '07:05:00',
                'departure_time' => '08:35:00'

            ],
            [
                'id' => '4',
                'day'=> 'Martes',
                'entry_time' => '08:40:00',
                'departure_time' => '10:00:00'

            ],
            [
                'id' => '5',
                'day'=> 'Lunes',
                'entry_time' => '09:05:00',
                'departure_time' => '10:30:00'

            ]
            
        ];
        DB::table('schedules')->insert($schedule);


        $course = [
            [
                'professor_id' => '5',
                'section_id'=> '1',
                'career_id' => '1',
                'schedules_id'=> '1',
                'course_type' => 'Matematicas I',
                'credit_units' => '4'
            ],
            [
                'professor_id' => '5',
                'section_id'=> '2',
                'career_id' => '1',
                'schedules_id'=> '2',
                'course_type' => 'Matematicas I',
                'credit_units' => '4'
            ],
            [
                'professor_id' => '4',
                'section_id'=> '1',
                'career_id' => '1',
                'schedules_id'=> '2',
                'course_type' => 'Programación I',
                'credit_units' => '4'
            ],
            [
                'professor_id' => '4',
                'section_id'=> '2',
                'career_id' => '1',
                'schedules_id'=> '3',
                'course_type' => 'Programación I',
                'credit_units' => '4'
            ],
            [
                'professor_id' => '5',
                'section_id'=> '3',
                'career_id' => '2',
                'schedules_id'=> '3',
                'course_type' => 'Contaduria I',
                'credit_units' => '3'
            ],
            [
                'professor_id' => '5',
                'section_id'=> '3',
                'career_id' => '2',
                'schedules_id'=> '1',
                'course_type' => 'Orientación',
                'credit_units' => '2'
            ],
            [
                'professor_id' => '4',
                'section_id'=> '1',
                'career_id' => '1',
                'schedules_id'=> '4',
                'course_type' => 'Logica Computacional',
                'credit_units' => '3'
            ],
        ];
        DB::table('courses')->insert($course);
    
        $student = [
            [
                'semester_id' => '1',
                'date_admission' => '2023-01-02',
                'career_id' => '2',
                'status' => 'Inscrito',
                'id' => '3'
            ],
            [
                'semester_id' => '2',
                'date_admission' => '2022-01-12',
                'career_id' => '1',
                'status' => 'No inscrito',
                'id' => '6'
            ],
            [
                'semester_id' => '1',
                'date_admission' => '2023-02-01',
                'career_id' => '2',
                'status' => 'Inscrito',
                'id' => '7'
            ],
            [
                'semester_id' => '1',
                'date_admission' => '2023-02-01',
                'career_id' => '1',
                'status' => 'Inscrito',
                'id' => '8'
            ],
            [
                'semester_id' => '1',
                'date_admission' => '2023-02-01',
                'career_id' => '1',
                'status' => 'Inscrito',
                'id' => '9'
            ],
            [
                'semester_id' => '1',
                'date_admission' => '2023-02-08',
                'career_id' => '2',
                'status' => 'Inscrito',
                'id' => '10'
            ],
            [
                'semester_id' => '1',
                'date_admission' => '2023-02-01',
                'career_id' => '1',
                'status' => 'Inscrito',
                'id' => '11'
            ],
        ]; 
        DB::table('students')->insert($student);


        $incription = [
            [
                'id' => '4',
                'student_id' => '3',
                'fecha'=> '2023-01-10'
            ],
            [
                'id' => '8',
                'student_id' => '9',
                'fecha'=>'2023-02-07'
            ],
            [
                'id' => '9',
                'student_id' => '10',
                'fecha'=> '2023-02-08'
            ],
            [
                'id' => '11',
                'student_id' => '11',
                'fecha'=> '2023-02-08'
            ],
            [
                'id' => '19',
                'student_id' => '7',
                'fecha'=> '2023-02-09'
            ],
            [
                'id' => '35',
                'student_id' => '8',
                'fecha'=> '2023-02-10'
            ],      
        ];
        DB::table('incriptions')->insert($incription);
        
        $control_incription = [
            [
                'id' => '4',
                'incription_id' => '4',
                'course_id'=> '6'
            ],
            [
                'id' => '15',
                'incription_id' => '8',
                'course_id'=> '4'
            ],
            [
                'id' => '16',
                'incription_id' => '9',
                'course_id'=> '6'
            ],
            [
                'id' => '18',
                'incription_id' => '11',
                'course_id'=> '2'
            ],
            [
                'id' => '29',
                'incription_id' => '19',
                'course_id'=> '5'
            ],
            [
                'id' => '44',
                'incription_id' => '19',
                'course_id'=> '6'
            ],
            [
                'id' => '49',
                'incription_id' => '35',
                'course_id'=> '2'
            ],
            [
                'id' => '50',
                'incription_id' => '35',
                'course_id'=> '4'
            ],
            [
                'id' => '51',
                'incription_id' => '35',
                'course_id'=> '7'
            ],
        ];
        DB::table('controls_incriptions')->insert($control_incription);
        
        $score = [
            [
                'id' => '3',
                'course_id' => '5',
                'student_id' => '3',
                'description' => 'None',
                'score' => '15',
                'score_date' => '2023-01-03',
            ],
            [
                'id' => '4',
                'course_id' => '5',
                'student_id' => '3',
                'description' => 'None',
                'score' => '15',
                'score_date' => '2023-01-04',
            ],
        ];
        DB::table('scores')->insert($score);

    }
    public function usuario()
    {
        
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Eduard',
                'email' => 'guevara_cordinador@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Maria',
                'email' => 'maria_estudiante@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Yasiria',
                'email' => 'yasiria_profesor@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Edgar',
                'email' => 'edgar_profesor@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Luis',
                'email' => 'luis_estudiante@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Jose',
                'email' => 'jose_estudiante@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sara',
                'email' => 'sara_estudiante@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Daniel',
                'email' => 'daniel_estudiante@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Vanesa',
                'email' => 'vanesa_estudiante@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Jhonnielys',
                'email' => 'jonnielys_estudiante@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('users')->insert($user);


    
    }
    public function Personas()
    {
        $people = [
            [
                'ci' => '26030809',
                'name' => 'Eduard',
                'last_name' =>  'Guevara',
                'phone_number' => '04142151238',
                'address' =>  'Upata',
                'email' =>  'guevara@gmail.com',
                'id' => '2'
            ],
            [
                'ci' => '26030811',
                'name' => 'Mariangelys',
                'last_name' => 'Giron',
                'phone_number' => '04263903633',
                'address' =>   'Bolivar',
                'email' =>  'maria@gmail.com',
                'id' => '3'
            ],
            [
                'ci' => '12560668',
                'name' => 'Yasiria',
                'last_name' => 'Lisboa',
                'phone_number' => '04253603633',
                'address' =>  'Pto Ordaz',
                'email' => 'yasiria@gmail.com',
                'id' => '4'
            ],
            [
                'ci' => '12875309',
                'name' => 'Edgar',
                'last_name' => 'Guevara',
                'phone_number' => '04152525336',
                'address' =>  'Pto ordaz',
                'email' =>  'edgar@gmail.com',
                'id' => '5'
            ],
            [
                'ci' => '25360623',
                'name' => 'Luis',
                'last_name' =>  'Barreto',
                'phone_number' => '0425142525',
                'address' =>  'Madrid',
                'email' =>  'luis@gmail.com',
                'id' => '6'
            ],
            [
                'ci' => '21523663',
                'name' => 'Jose',
                'last_name' =>  'Marquez',
                'phone_number' => '04142514252',
                'address' =>  'Upata',
                'email' =>  'jose@gmail.com',
                'id' => '7'
            ],
            [
                'ci' => '25696996',
                'name' => 'Sara',
                'last_name' =>  'Rengel',
                'phone_number' => '04153223635',
                'address' =>  'San Felix',
                'email' =>  'sara@gmail.com',
                'id' => '8'
            ],
            [
                'ci' => '45202010',
                'name' => 'Daniel',
                'last_name' =>  'Hernandez',
                'phone_number' => '04125352142',
                'address' =>  'Bella Vista',
                'email' =>  'daniel@gmail.com',
                'id' => '9'
            ],
            [
                'ci' => '12875989',
                'name' => 'Vanesa',
                'last_name' =>  'Giron',
                'phone_number' => '04125436333',
                'address' =>  'San Felix',
                'email' =>  'Vanesa@gmail.com',
                'id' => '10'
            ],
            [
                'ci' => '11252514',
                'name' => 'Jhonnielys',
                'last_name' =>  'Lisboa',
                'phone_number' => '04142536412',
                'address' => 'Upata',
                'email' =>  'jhonielys@gmail.com',
                'id' => '11'
            ],
           
        ]; 
        DB::table('people')->insert($people);      
    }
}
