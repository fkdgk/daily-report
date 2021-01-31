<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ja_JP');

        $sdivisions = [
            "総務部", // 1
            "人事部", // 2
            "経理部", // 3
            "営業部", // 4
            "開発部", // 5
            "事業部", // 6
            "製造部", // 7
        ];

        foreach ($sdivisions as $sivision) {
            Division::create(['name'=>$sivision]);
        }

        User::create([
            'img' => 'profile.png',
            'name' => $faker -> name,
            'role' => 'admin',
            'email' => 'demo@example.com',
            'division_id' => 1,
            'password' => bcrypt('pw1234'),
        ]);

        for ($i=0; $i < 9; $i++) { 

            /* ユーザ権限 */
            if(($i % 5)==0 ){
                $role = 'admin';
            }else{
                $role = 'user';
            }

            /* ユーザ権限 */
            if(($i % 3)==0 ){
                $active = 0;
            }else{
                $active = 1;
            }

            User::create([
                'name' => $faker -> name,
                'email' => $faker -> safeEmail,
                'role' => $role,
                'active' => $active,
                'img' => $i . '.png',
                'division_id' => $faker -> numberBetween(1,7),
                'password' => bcrypt('pw1234'),
            ]);
        }
        
        for ($i=0; $i < 200; $i++) { 
            Post::create([
                'work_date' => $faker -> date(),
                'start_time' => $faker -> numberBetween(9,10) . ':' . $faker ->  numberBetween(1,59) . ':' . '00',
                'finish_time' => $faker -> numberBetween(16,19) . ':' . $faker -> numberBetween(1,59) . ':' . '00',
                'body' => $faker -> realText,
                'user_id' => $faker -> numberBetween(1,10),
            ]);
        }



    }
}
