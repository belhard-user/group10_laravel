<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Middleware\Debugbar;
use DB;
use Faker\Factory;
use Illuminate\Http\Request;

class DBController extends Controller
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function insert()
    {
        $db = DB::table('test');

        /*$data = [
            'age' => 23,
            'name' => 'Neo',
            'email' => 'neo@gmail.com',
            'user_role' => 'the one',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ];*/

        $data = [];

        for($i = 0; $i < 15; $i++){
            $data[] = [
                'age' => $this->faker->numberBetween(18, 65),
                'name' => $this->faker->firstName(),
                'email' => $this->faker->email,
                'user_role' => $this->faker->tld,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ];
        }

        $db->insert($data);


        return view('db.all');
    }

    public function update()
    {
        /*DB::table('test')
            ->where('id', 1)
            ->update([
            'age' => 222,
            'updated_at'  => new \DateTime('12 years ago')
        ]);*/

        DB::table('test')->where('id', 14)->decrement('age', 1, ['name' => 'dura']);

        return view('db.all');
    }

    public function delete()
    {
        $r = DB::table('test')->where('id', '>', 14)->delete();

        \Debugbar::info('Count deleted: ' . $r);

        return view('db.all');
    }

    public function select()
    {
        $db = DB::table('test')
            ->orderBy('name', 'desc')
            ->get();

        \Debugbar::info($db);

        return view('db.all');
    }
}
