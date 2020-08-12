<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user
        ->leftJoin('likes as l', 'l.target_id', '=', 'users.id')
        ->whereNull('l.users_id')
        ->get();

        return response()->json(['data' => $users]);
    }

    public function store(Request $request)
    {
        try{

            $client = new Client();
            $res = $client->request('GET', 'https://api.github.com/users/'.$request['username'].'');

            $body = $res->getBody();
            $json = json_decode($body, true);

            if ($this->user->where('user', $json['login'])->count() == 0) {
                $this->user->create([
                    'name' => $json['name'],
                    'bio' => $json['bio'],
                    'email' => $json['login'],
                    'avatar' => $json['avatar_url'],
                    'password' => bcrypt($request['password'])
                ]);

                return response()->json(['data'=> 'Cadastrado com sucesso'], 201);
            }
            
            return response()->json(['data'=> 'Já cadastrado'], 200);

        } catch (Exception $e) {
            echo 'Erno: ',  $e->getMessage(), "\n";
        }
        
    }

    public function login(Request $request)
    {
        // $password = bcrypt($request['password']);

        $checkLogin = $this->user->where([
            ['user', $request['username']],
            ['password', $request['password']]
        ]);
dd($checkLogin->count());
        if(!$checkLogin){
            return response()->json(['data'=> 'Usuário não encontrado!'], 500);
        }

        return response()->json(['success'=> true], 200);
    }
}
