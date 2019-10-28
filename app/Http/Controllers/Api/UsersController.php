<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use App\User;
use DB;
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
        $users = $this->user->all();
        return response()->json(['data' => $users]);

        /*$select = DB::table('users as u')
            ->leftJoin('likes as l', 'l.users_id', '=', 'u.id')
            ->get();*/
    }

    public function store(Request $request)
    {
        try{
            $username = $request->username;
            $password = sha1($request->password);
        
            $client = new Client();
            $res = $client->request('GET', 'https://api.github.com/users/'.$username.'');

            $body = $res->getBody();
    
            $json = json_decode($body, true);
    
            $user = $json['login'];
            $avatar = $json['avatar_url'];
            $bio = $json['bio'];
            $name = $json['name'];

            if (DB::table('users')->where('user', $user)->count() == 0) {
                DB::table('users')->insert([
                    'name' => $name, 
                    'bio' => $bio, 
                    'user' => $user, 
                    'password' => $password,
                    'avatar' => $avatar
                ]);
                
                return response()->json(['data'=> 'Cadastrado com sucesso'], 200);
            }else{
                return response()->json(['data'=> 'Já cadastrado'], 200);
            }

        } catch (Exception $e) {
            echo 'Errno: ',  $e->getMessage(), "\n";
        }
        
    }
}
