<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds with the command: php artisan db:seed --class=CreateAdminUserSeeder
     *
     * @return void
     */
    public function run()
    {
        /*$user = User::create([
            'name' => 'admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
      
        $role = Role::create(['name' => 'Admin']);
       
        $permissions = Permission::pluck('id','id')->all();
     
        $role->syncPermissions($permissions);
       
        $user->assignRole([$role->id]);
        */
        $role = Role::create(['name' => 'Admin'])
        ->givePermissionTo([
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
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
            'course-delete']); 
    }
}