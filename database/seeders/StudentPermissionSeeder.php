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

        'schedule-list',
        'course-list',
        'score-list',
        'incription-list',
        'incription-create',
        'incription-edit',
        'incription-delete']);    

    }
}