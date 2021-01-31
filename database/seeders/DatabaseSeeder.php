<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Division;
use App\Models\User;
use App\Models\Project;
use App\Models\Work;
use App\Models\Comment;
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

        for ($i=0; $i < 100; $i++) { 
            Post::create([
                'work_date' => $faker -> date(),
                'start_time' => $faker -> numberBetween(9,10) . ':' . $faker ->  numberBetween(1,59) . ':' . '00',
                'finish_time' => $faker -> numberBetween(16,19) . ':' . $faker -> numberBetween(1,59) . ':' . '00',
                'body' => $faker -> realText,
                'user_id' => $faker -> numberBetween(1,10),
            ]);
        }

        /* 
         *   ----------------------------------------------------------
         *   projects
         */
        $projects = [
            'ギャラクシー 打合せ', // 10
            'ハック プロジェクト', // 9
            'シンクロニシティ 開発', // 8
            'エンペラー 開発', // 7
            'ペルソナ ミーティング', // 6
            'アビス 開発', // 5
            'クロニクル 運用', // 4
            'スマートリアル 要件定義', // 3
            'データチェック 作業', // 2
            'プリロード 設定', // 1
        ];
        foreach ($projects as $project) {
            Project::create([
                'name' => $project,
            ]);
        }

        /*
        * ----------------------------------------------------------
        * works
        */
        $posts = Post::all()->pluck('id')->toArray();
        foreach ($posts as $post) {
            for ($i=1; $i <= 10; $i++) { 
                if($faker -> boolean){
                    Work::create([
                        'project_id' => $i,
                        'post_id' => $post,
                        'work_time' => $faker -> numberBetween(0,3).':'. $faker -> numberBetween(0,59)  .':00',
                        'progress' => $faker -> numberBetween(0,100),
                        'limit' => $faker -> date,
                    ]);
                }
            }   
        }

        /*
        * ----------------------------------------------------------
        * works
        */
        $users = User::all()->pluck('id')->toArray();
        foreach ($posts as $post) {
            foreach ($users as $user) {
                if($faker -> boolean){
                    Comment::create([
                        'post_id' => $post,
                        'user_id' => $user,
                        'body' => $faker -> realText(),
                    ]);
                }
            }
        }

    }
}
