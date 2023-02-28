<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
class DatabaseSeeder extends Seeder
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
        $this->call([
            PermissionTableSeeder::class,
            ProfessorPermissionSeeder::class,
            CoordinatorPermissionSeeder::class,
            StudentPermissionSeeder::class,
            CreateAdminUserSeeder::class, 
            
            DatabaseStudentsSeeder::class //Esta clase crea la tabla para los estudiantes profesores, y el coordinador, si quieres
            //que esta tabla no este, solo comenta 
            
        ]);
        /*
        $user = [
            [
                'name' => 'admin',
                'email' => 'Admin@uneg.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('users')->insert($user);
        $Admin = User::find(1); //Hace que el primer usuario sea admin
        $Admin->assignRole('Admin'); 
        */ //En caso de que quieras que halla un solo usuario de admin
    }
}
