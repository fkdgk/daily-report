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
        $now = date('Y-m-d H:i:s');
        $faker = \Faker\Factory::create('ja_JP');

        $divisions = [
            "ソリューション部",
            "マーケティング部",
            "ITマネジメント部",
            "システム部",
            "CSR部",
            // "IT部",
            "生産安全基盤部",
            "新事業企画部",
            "品質保証部",
            "知的財産部",
            "販売促進部",
            "企画開発部",
            "営業推進部",
            "生産技術部",
            // "流通部門",
            // "人事部",
            // "物流部",
            // "財務部",
            // "技術部",
            // "購買部",
            // "製造部",
            // "開発部",
            // "経理部",
            // "資材部",
            // "法務部",
            // "広報部",
            // "研究室",
            // "調査部",
            // "調達課",
            // "総務部",
            // "社長室",
            // "営業部",
            // "秘書室",
            // "宣伝部",
            // "輸出部",
        ];

        $count_divisions = count($divisions);

        foreach ($divisions as $index => $division) {
            Division::create(['name' => $division]);
        }

        /*
         * -----------------------------------
         * create demo user
         * 
         */
        User::create([
            'img' => $faker -> numberBetween(1, 5) . '.jpg',
            'name' => $faker -> name,
            'role' => 'admin',
            'email' => 'demo@example.com',
            'division_id' => $faker -> numberBetween(1 ,$count_divisions),
            'password' => bcrypt('pw1234'),
        ]);


        /*
         * -----------------------------------
         * users
         * 
         */

        $user_count = 15; // ユーザ数
        $photo_count = 22; // public/imgに保存されている画像

        for ($i=0; $i < $user_count; $i++) { 

            /* ユーザ権限 */
            if(($i % 5) ==0 ){
                $role = 'admin';
            }else{
                $role = 'user';
            }

            /* ユーザ権限 */
            if(($i % 3) == 0 ){
                $active = 0;
            }else{
                $active = 1;
            }

            $user_values[] = [
                'name' => $faker -> name,
                'email' => $faker -> safeEmail,
                'role' => $role,
                'active' => $active,
                'img' => $faker->unique() -> numberBetween(6, $photo_count) . '.jpg',
                'division_id' => $faker -> numberBetween(1, $count_divisions),
                'password' => bcrypt('pw1234'),
                'created_at' => $now,
            ];
        }

        User::insert($user_values);

        /* 
         *   ----------------------------------------------------------
         *   posts
         */

        for ($i=0; $i < 200; $i++) {
            $post_values[] = [
                'work_date' => Carbon::parse(date('Y-m-d'))->addDay( - $faker->randomNumber(2)) -> format('Y-m-d'),
                'start_time' => $faker -> numberBetween(9,10) . ':' . $faker ->  numberBetween(1,59) . ':' . '00',
                'finish_time' => $faker -> numberBetween(16,19) . ':' . $faker -> numberBetween(1,59) . ':' . '00',
                'body' => $faker -> realText,
                'user_id' => $faker -> numberBetween(1, $user_count+1),
                'created_at' => $now,
            ];
        }

        Post::insert($post_values);

        /* 
         *   ----------------------------------------------------------
         *   projects
         */
        $projects = [
            'ギャラクシー 打合せ',
            'ハック プロジェクト',
            'シンクロニシティ 開発',
            'エンペラー 開発',
            'ペルソナ ミーティング',
            'アビス 開発',
            'クロニクル 運用',
            'スマートリアル 要件定義',
            'データチェック 作業',
            'プリロード 設定',
            'その他',
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
            $work_count = 0;
            for ($i=1; $i <= $projects_count; $i++) {
                if($faker -> boolean && $work_count < 3){
                    Work::create([
                        'project_id' => $i,
                        'post_id' => $post,
                        'work_time' => $faker -> numberBetween(0,3).':'. $faker -> numberBetween(0,59)  .':00',
                        'progress' => $faker -> numberBetween(0,100),
                        'limit' => Carbon::parse(date('Y-m-d'))->addDay($faker->randomNumber(2)) -> format('Y-m-d'),
                    ]);
                    $work_count ++;
                }
            }   
        }

        /*
        * ----------------------------------------------------------
        * comments
        */
        $users = User::all()->pluck('id')->toArray();
        
        foreach ($posts as $post) {
            $comment_count = 0;
            foreach ($users as $index => $user) {
                if($comment_count == 3) break ;
                if($faker -> boolean){
                    $time = $faker -> time();
                    Comment::create([
                        'post_id' => $post,
                        'user_id' => $user,
                        'body' => $faker -> realText(100),
                        'created_at' => Carbon::parse(date('Y-m-d'))->addDay(-$index) -> format('Y-m-d ' . $time),
                    ]);
                    $comment_count ++;
                }
            }
        }

    }
}
