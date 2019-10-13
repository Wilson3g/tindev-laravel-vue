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
        // $users = $this->user->all();
        // return response()->json(['data' => $users]);

        $select = DB::table('users as u')
            ->leftJoin('likes as l', 'l.users_id', '=', 'u.id')
            ->get();

        
    }

    public function store(Request $request)
    {
        try{
            $username = $request->username;
        
            $client = new Client();
            $res = $client->request('GET', 'https://api.github.com/users/'.$username.'');

            $body = $res->getBody();
    
            $json = json_decode($body, true);
    
            $user = $json['login'];
            $avatar = $json['avatar_url'];
            $bio = $json['bio'];
            $name = $json['name'];
    
            $userExists = $this->user->where('user', $user);

            if($userExists == $username){
                return response()->json(['data'=> 'Já cadastrado!']);
                throw new \Exception('Já cadastrado!');
            }

            DB::table('users')->insert([
                'name' => $name, 
                'bio' => $bio, 
                'user' => $user, 
                'avatar' => $avatar
            ]);
    
            return response()->json(['data'=> 'Cadastrado com sucesso'], 200);

        } catch (Exception $e) {
            echo 'Errno: ',  $e->getMessage(), "\n";
        }
        
    }
}
