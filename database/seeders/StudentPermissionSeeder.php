<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class StudentPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds with the command: php artisan db:seed --class=CreateAdminUserSeeder
     *
     * @return void
     */
    public function run()
    {
      
        $role = Role::create(['name' => 'student'])
        ->givePermissionTo(['professor-list',
        'coordinator-list',
        'student-list',
        'semester-list',
        'schedule-list',
        'career-list',
        'section-list',
        'section-delete',
        'course-list',
        'incription-list',
        'incription-create',
        'incription-edit',
        'incription-delete',]);       
    }
    $admin = User::find(3);
    $admin->assignRole('student'); 
    $admin = User::find(4);
    $admin->assignRole('student'); 
    $admin = User::find(5);
    $admin->assignRole('student'); 
}