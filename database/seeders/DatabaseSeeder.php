<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Division;
use App\Models\User;
use App\Models\Project;
use App\Models\Work;
use App\Models\Comment;
use Carbon\Carbon;
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

        $divisions = [
            "ITマネジメント部",
            "ソリューション部",
            "人事部",
            "経理部",
            "営業部",
            "マーケティング部",
            "システム部",
            "製造部",
        ];

        $count_divisions = count($divisions);

        foreach ($divisions as $division) {
            Division::create(['name'=>$division]);
        }

        User::create([
            'img' => $faker -> numberBetween(1,10) . '.jpg',
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
                'img' => $faker->unique() -> numberBetween(10,21) . '.jpg',
                // 'img' => $i . '.png',
                'division_id' => $faker -> numberBetween(1,$count_divisions),
                'password' => bcrypt('pw1234'),
            ]);
        }

        for ($i=0; $i < 100; $i++) { 
            Post::create([
                'work_date' => Carbon::parse(date('Y-m-d'))->addDay( - $faker->randomNumber(2)) -> format('Y-m-d'),
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

        $projects_count = count($projects);

        /*
        * ----------------------------------------------------------
        * works
        */
        $posts = Post::all()->pluck('id')->toArray();
        foreach ($posts as $post) {
            for ($i=1; $i <= $projects_count; $i++) {
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
