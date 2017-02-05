<?php

namespace App\Http\Controllers;

use App\Test;
use Barryvdh\Debugbar\Middleware\Debugbar;
use ClassesWithParents\D;
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
       /* $db = DB::table('test')
            ->orderBy('name', 'desc')
            ->get();*/

       // $db = DB::table('test')->select('email', 'name as n')->distinct()->get();
        // $db = DB::table('test')->select(DB::raw('email, sum(age) as age'))->groupBy('email')->get();

        /*$db = DB::table('test')
            ->crossJoin('users')
            ->select('test.age', 'users.email', 'users.password')
            ->get();*/

        //$db = DB::table('test')->whereNotBetween('age', [18, 30])->get();
        //$db = DB::table('test')->whereMonth('updated_at', '4')->get();
        // $db = DB::table('test')->whereColumn('created_at', '>', 'updated_at')->get();
        // $db = DB::table('test')->latest('id')->get();
        // $db = DB::table('test')->skip(5)->take(4)->get();
        $db = DB::table('test')->max('age');
        $db = DB::table('test')->sum('age');

        \Debugbar::info($db);

        return view('db.all');
    }

    public function showForm()
    {
        return view('db.show-form');
    }

    public function storeForm(Request $request)
    {
        // DB::table('test')->insert($request->except('_token'));
        // $model = new Test($request->except('_token'));
        /*$model = new Test();

        $model->email = $request->get('email');
        $model->name = $request->get('name');
        $model->user_role = $request->get('user_role');
        $model->age = $request->get('age');*/

        $model = Test::firstOrNew($request->except('_token'));

        $model->save();

        return view('db.all');
    }

    public function editForm($id)
    {
        $model = DB::table('test')->whereId($id)->first();

        return view('db.edit', compact('model'));
    }

    public function updateForm(Request $request, $id)
    {
        DB::table('test')->whereId($id)->update($request->except('_token', '_method'));

        return redirect()->back();
    }

    public function selectModel()
    {
        $r = Test::first();


        dd($r->full_name);


        return view('db.all');
    }

    public function relations()
    {
        /*$test = \App\Test::with('address')->get();

        foreach ($test as $user) {
            echo "<h2>{$user->name}</h2>";
            if ($user->address->count()){
                echo "<ul>";
                foreach ($user->address as $a) {
                    echo "<li>{$a->address}</li>";
                }
                echo "</ul>";
            }
        }*/

        /*$address = \App\Address::first();

        dd($address->test->name);*/

        \App\Test::first()->address()->create([
            'address' => 'Manhattan street 10'
        ]);

        return view('db.all');
    }
}
