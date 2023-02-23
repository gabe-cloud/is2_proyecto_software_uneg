<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds with the command: php artisan db:seed --class=PermissionTableSeeder
     * 
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'person-list',
           'person-create',
           'person-edit',
           'person-delete',
           'professor-list',
           'professor-create',
           'professor-edit',
           'professor-delete',
           'coordinator-list',
           'coordinator-create',
           'coordinator-edit',
           'coordinator-delete',
           'student-list',
           'student-create',
           'student-edit',
           'student-delete',
           'semester-list',
           'semester-create',
           'semester-edit',
           'semester-delete',
           'schedule-list',
           'schedule-create',
           'schedule-edit',
           'schedule-delete',
           'career-list',
           'career-create',
           'career-edit',
           'career-delete',
           'section-list',
           'section-create',
           'section-edit',
           'section-delete',
           'course-list',
           'course-create',
           'course-edit',
           'course-delete',
           'score-list',
           'score-create',
           'score-edit',
           'score-delete',          
           'incription-list',
           'incription-create',
           'incription-edit',
           'incription-delete'
        ];
      
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}