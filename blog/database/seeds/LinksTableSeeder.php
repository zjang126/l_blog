<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {//php artisan make:seeder LinksTableSeeder  填充测试数据
        $data=[
            [
                'link_name'=>'百度',
                'link_title'=>'国内口碑最好的搜索引擎',
                'link_url'=>'https://www.baidu.com',
                'link_order'=>'1'//排序
            ],
            [
            'link_name'=>'搜狐',
            'link_title'=>'国内口碑最好的搜索引擎',
            'link_url'=>'https://www.souhu.com',
            'link_order'=>'2'//排序
        ]
        ];
        DB::table('links')->insert($data);

    }
}
