<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = User::create([
            'name' => 'root',
            'email' => 'esoftgreat@gmail.com',
            'password' => bcrypt('root')
        ]);
        $root->assignRole('root');

        $admin = User::create([
            'name' => 'admin',
            'email' => 'iwansafr@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $admin->assignRole('admin');
        
        $editor = User::create([
            'name' => 'editor',
            'email' => 'editor@esoftgreat.com',
            'password' => bcrypt('editor')
        ]);
        $editor->assignRole('editor');
    }
}
