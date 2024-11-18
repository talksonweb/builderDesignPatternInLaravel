<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Leave;
use App\Http\Service\FileReader;
use App\Http\Requests\LeaveStoreRequest;
use App\Http\Builders\SqlBuilder\SqlDirector;
use App\Http\Builders\MySqlConstructorExample;
use App\Http\Builders\SqlBuilder\SqliteExample;
use App\Http\Service\SocialAuth\SocialAuthFactory;
use App\Http\Builders\SqlBuilder\Providers\MySqlBasicExample;
use App\Http\Builders\SqlBuilder\Providers\SqliteBasicExample;

class LeaveController extends Controller
{
    public function index()
    {
        // Eloquent
        $userQuery = User::where('id', '>=', 2)
            ->where('id', '<=', 8)
            ->limit(4)
            ->orderBy('name')
            ->toSql(); 

        // Collections - Array on Steriods
        $users = [
            ['name' => 'Jane', 'age' => 3],
            ['name' => 'Sally', 'age' => 4],
            ['name' => 'Tammy', 'age' => 5],
        ];

        // Collections
        $collectionOutpt = collect($users)
            ->pluck('name')
            ->map(function($name) { return $name . '! '; })
            ->all();

        return view('index', ['query' => $userQuery, 'users' => $collectionOutpt]);
    }

    // Illuminate\Validation\Rules\Password 
    public function store(LeaveStoreRequest $request)
    {
        Leave::create($request->validated());
    }

    public function callingMethodExample()
    {
        // $mysqlBasicExample = new MySqlBasicExample();
        // $mysqlBasicExample->select('users', ['id', 'name', 'email']);
        // $mysqlBasicExample->where('id', '>=', 2);
        // $mysqlBasicExample->orWhere('name', '=', 'sam');
        // $mysqlBasicExample->orWhere('name', '=', 'jill');
        // $mysqlBasicExample->limit(0, 6);

        $mysqlBasicExample = new MySqlBasicExample();
        // $mysqlBasicExample = new SqliteBasicExample();
        $generatedSql = $mysqlBasicExample->select('users', ['id', 'name', 'email'])
            ->where('id', '>=', 2)
            ->orWhere('name', '=', 'sam')
            ->orWhere('name', '=', 'jill')
            ->limit(0, 6)
            ->getSQL();

        return view('show', ['query' => $generatedSql]);
    }    

    public function  getEarlyJoiners()
    {
        // $mysqlBasicExample = new MySqlBasicExample();
        $mysqlBasicExample = new SqliteBasicExample();
        $sqlDirectorObj = new SqlDirector($mysqlBasicExample);

        // $generatedSql = $mysqlBasicExample->select('users', ['id', 'name', 'email'])
        //     ->where('id', '>=', 2)
        //     ->orWhere('name', '=', 'sam')
        //     ->orWhere('name', '=', 'jill')
        //     ->limit(0, 6)
        //     ->getSQL();
        $generatedSql = $sqlDirectorObj->getEarliestEmployees();

        return view('early_joiners', ['query' => $generatedSql]);
    }

    public function earlyJoinersReport()
    {
        $mysqlBasicExample = new MySqlBasicExample();
        // $mysqlBasicExample = new SqliteBasicExample();
        $sqlDirectorObj = new SqlDirector($mysqlBasicExample);
        // $generatedSql = $mysqlBasicExample->select('users', ['id', 'name', 'email'])
        //     ->where('id', '>=', 2)
        //     ->orWhere('name', '=', 'sam')
        //     ->orWhere('name', '=', 'jill')
        //     ->limit(0, 6)
        //     ->getSQL();
        $generatedSql = $sqlDirectorObj->getEarliestEmployees();


        return view('early_joiners_report', ['query' => $generatedSql]);
    }
}
