<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run()
    {
        $admin = [
            'name' => 'Adnane ennachat',
            'email' => 'admin@gamingforyou.com',
            'password' => bcrypt('Adnanecasa2019')
        ];
        Admin::create($admin);
    }
}
