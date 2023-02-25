<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class ProfessorPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds with the command: php artisan db:seed --class=CreateAdminUserSeeder
     *
     * @return void
     */
    public function run()
    {
      
        $role = Role::create(['name' => 'professor'])
        ->givePermissionTo(['professor-list',
        'coordinator-list',
        'student-list',
        'semester-list',
        'schedule-list',
        'career-list',
        'section-list',
        'section-delete',
        'course-list',
        'score-list',
        'score-create',
        'score-edit',
        'score-delete',
        'incription-list',]); 
        $admin = User::find(2);
         $admin->assignRole('professor');       
    }
}