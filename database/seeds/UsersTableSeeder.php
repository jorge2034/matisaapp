<?php

use App\User;
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,20)->create();
        User::create([
            'name'  =>'Jorge',
            'lastname'  =>'Arce',
            'email'  =>'jorge2034@gmail.com',
            'password'   => '$2y$10$/OJloVuiNcrDgctE/VQtDOsDczpcVNawjNJn7JKr7AqC47rYHRvWe',//5259344or
            'fullname'  =>'Jorge Arce',
            'company_id' => 1,
            'remember_token' => 'raPTp9a3ls5j0QgVV8oAmiagjfAjgpX49vrHXoUbJMuvZZfnXtSarLWJrgZc',
            'created_at' => '2019-03-27 16:40:08',
            'updated_at' => '2019-03-27 16:40:08',
        ]);
        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'company_id' => 1,
            'special'=>'all-access'
        ]);
    }
}
